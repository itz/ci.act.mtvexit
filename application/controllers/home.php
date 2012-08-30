<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Home extends CI_Controller {

    protected $limit = 10;

    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->database();

        include(APPPATH . 'third_party/tmhOAuth.php');
        $this->tmhOAuth = new tmhOAuth(array(
                    'consumer_key' => $this->config->item('tweet_consumer_key'),
                    'consumer_secret' => $this->config->item('tweet_consumer_secret')
                ));
    }

    function index() {
        $this->_page_view_counter(1);
        $count = $this->db->query('SELECT SUM(data_values) AS jumlah FROM act_counter')->row();
        $content['data'] = $count->jumlah;

        $content['title'] = '';
        $content['content'] = $this->load->view('default', $content, true);
        $this->load->view('body', $content);
    }

    function twitterconnect() {
        redirect();
    }

    function acttweet() {
        $this->_page_view_counter(1);

        $data = $this->db->query('SELECT * FROM act_tweet ORDER BY created_at DESC LIMIT 20')->result();

        $content['title'] = 'List of Tweets &mdash;';
        $content['data'] = $data;
        $content['content'] = $this->load->view('tweet', $content, true);
        $this->load->view('body', $content);
    }

    function gettweet() {
        $this->tmhOAuth->config['user_token'] = $this->config->item('tweet_token_key');
        $this->tmhOAuth->config['user_secret'] = $this->config->item('tweet_token_secret');

        $this->__twGetHash();
    }

    function actvideo() {
        $this->_page_view_counter(1);
        $count = $this->db->query('SELECT SUM(data_values) AS jumlah FROM act_counter')->row();
        $content['data'] = $count->jumlah;
        $content['title'] = 'Safe Migration Video &mdash;';
        $content['content'] = $this->load->view('video', $content, true);
        $this->load->view('body', $content);
    }

    function actevent() {
        $this->_page_view_counter(1);
        $count = $this->db->query('SELECT SUM(data_values) AS jumlah FROM act_counter')->row();
        $content['data'] = $count->jumlah;
        $content['title'] = '#JoinTheFightDay &mdash;';
        $content['content'] = $this->load->view('event', $content, true);
        $this->load->view('body', $content);
    }

    function infografik() {
        $this->_page_view_counter(1);

        $content['title'] = 'Infographic &mdash;';
        $content['content'] = $this->load->view('infografik', $content, true);
        $this->load->view('body', $content);
    }

    function youthleadertoolkit() {
        $this->load->helper(array('form'));
        $this->load->library('form_validation');
        $this->load->library('session');
        $view_id = $this->session->userdata('aidi');

        $content['title'] = 'Youth Leader Toolkit &mdash;';

        if (!$view_id) {
            $this->form_validation->set_rules('tool_name', 'Name', 'trim|required|min_length[6]|max_length[20]|callback__alpha_dash_space');
            $this->form_validation->set_rules('tool_email', 'Email', 'trim|required|valid_email');
            if ($this->form_validation->run() === TRUE) {
                $data['tool_name'] = $this->input->post('tool_name', true);
                $data['tool_email'] = $this->input->post('tool_email', true);

                $this->db->insert('toolkit', $data);
                $keyword['aidi'] = $this->db->insert_id();
                $this->session->set_userdata($keyword);

                redirect('act4s');
            } else {
                $this->_page_view_counter(1);

                $content['content'] = $this->load->view('youthleadertoolkit', $content, true);
            }
        } else {
            redirect('act4s');
        }

        $this->load->view('body', $content);
    }

    function youthleadertoolkitview() {
        $this->_page_view_counter(1);

        $this->load->helper(array('form'));
        $this->load->library('form_validation');
        $this->load->library('session');
        $view_id = $this->session->userdata('aidi');

        if (!$view_id) {
            redirect('act4');
        }

        $content['title'] = 'Youth Leader Toolkit &mdash;';
        $content['content'] = $this->load->view('youthleadertoolkitview', $content, true);
        $this->load->view('body', $content);
    }

    function _alpha_dash_space($str_in = '') {
        if (!preg_match("/^([-a-z0-9_ ])+$/i", $str_in)) {
            $this->form_validation->set_message('_alpha_dash_space', 'The %s field may only contain alpha-numeric characters, spaces, underscores, and dashes.');
            return FALSE;
        } else {
            return TRUE;
        }
    }

    function _text_formatter($source) {
        $source = strip_tags(stripslashes($source));
        $source = preg_replace('/<(.*?)>/ie', "'<'.stripslashes('\\1').'>'", $source);
        return $source;
    }

    function _page_view_counter($id) {
        $q = $this->db->query("UPDATE act_counter SET data_values = data_values + 1 WHERE id = '" . $id . "'");
    }

    function jobdone() {
        $id = $this->uri->segment(3, 0);
        if (is_numeric($id) && $id != 0) {
            $this->_page_view_counter($id);
        }
    }

    function __twGetHash($max = false) {
        $params = array(
            'include_entities' => true,
            'show_user' => true,
            'q' => '#stophumantrafficking',
            'result_type' => 'recent',
            'rpp' => 10
        );
        if ($max) {
            $params['max_id'] = $max;
        }
        $code = $this->tmhOAuth->request('GET', 'http://search.twitter.com/search.json', $params);
        $response = json_decode($this->tmhOAuth->response['response'], true);
        if ($code == 200) {
            $count = count($response);
            if ($count != 0) {
                $max_id = $this->__twProcessHash($response['results']);
                if ($max_id != 0) {
                    usleep(50000);
                    $jumlah = $this->__twGetHash($max_id);
                }
            }
        } else {
            error_log('twitter get hashtag ' . json_encode($response));
        }
    }

    function __twProcessHash($data) {
        $x = 0;
        $y = count($data);
        foreach ($data as $tweet) {
            $max_id = $tweet['id_str'];
            $tweet_data = array(
                'tweet_id' => $tweet['id_str'],
                'from_id' => $tweet['from_user_id_str'],
                'from_name' => $tweet['from_user'],
                'text' => $tweet['text'],
                'created_at' => date('Y-m-d H:i:s', strtotime($tweet['created_at'])),
                'source' => $this->_text_formatter(strip_tags(html_entity_decode($tweet['source'])))
            );
            if (isset($tweet['entities'])) {
                if (isset($tweet['entities']['media']) && isset($tweet['entities']['media'][0]['media_url']) && $tweet['entities']['media'][0]['media_url'] != '') {
                    $tweet_data['ent_media'] = $tweet['entities']['media'][0]['media_url'];
                }
                if (isset($tweet['entities']['urls']) && isset($tweet['entities']['urls'][0]['expanded_url']) && $tweet['entities']['urls'][0]['expanded_url'] != '') {
                    $tweet_data['ent_urls'] = $tweet['entities']['urls'][0]['expanded_url'];
                }
            }
#            $this->_xd($tweet_data);
            $check_data = $this->db->get_where('tweet', array('tweet_id' => $tweet_data['tweet_id']))->row();
            if ($check_data) {
                $x++;
            } else {
                $this->db->insert('tweet', $tweet_data);
            }
        }
        if ($x == $y) {
            $max_id = 0;
        }
        return $max_id;
    }

}
