<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Home extends CI_Controller {

    protected $limit = 10;

    function __construct() {
        parent::__construct();
        $this->tpl['TContent'] = null;
        $this->load->helper('url');
        $this->load->database();
    }

    function index() {
        $content['title'] = "Overview";
        $content['modules'] = "Welcome to Think.Ear";
        $content['parent'] = 'home';
/*
        $this->db->select('id, twitter_uid, twitter_username');
        $this->db->order_by('twitter_username', 'asc');
        $content['twitter_account'] = $this->db->get('twitter')->result();

        $this->db->select('id, pages_uid, pages_name');
        $this->db->where('pages_status', 1);
        $this->db->order_by('pages_name', 'asc');
        $content['facebook_pages'] = $this->db->get('facebook_pages')->result();
*/
        $this->load->view('body', $content);
    }

    function twitterconnect() {
        $sesi = $this->session->userdata('idadmin');
        $name = $this->session->userdata('display');

        if ($sesi == "") {
            redirect('home/login');
        }

        include(APPPATH . 'third_party/tmhOAuth.php');
        $tmhOAuth = new tmhOAuth(array(
                    'consumer_key' => $this->config->item('tweet_consumer_key'),
                    'consumer_secret' => $this->config->item('tweet_consumer_secret')
                ));

        if (isset($_REQUEST['oauth_verifier'])) {
            /* oauth_verifier */
            $tmhOAuth->config['user_token'] = $_SESSION['oauth']['oauth_token'];
            $tmhOAuth->config['user_secret'] = $_SESSION['oauth']['oauth_token_secret'];

            $code = $tmhOAuth->request('POST', $tmhOAuth->url('oauth/access_token', ''), array(
                        'oauth_verifier' => $_REQUEST['oauth_verifier']
                    ));

            if ($code == 200) {
                /* oauth verifier success */
                $access_token = $tmhOAuth->extract_params($tmhOAuth->response['response']);
                if (is_array($access_token) && count($access_token) != '0') {
                    /* get additional user data */
                    $tmhOAuth->config['user_token'] = $access_token['oauth_token'];
                    $tmhOAuth->config['user_secret'] = $access_token['oauth_token_secret'];

                    $code = $tmhOAuth->request('GET', $tmhOAuth->url('1/account/verify_credentials'));
                    if ($code == 200) {
                        /* get data success */
                        $response = json_decode($tmhOAuth->response['response']);

                        $data = array(
                            'account_id' => $sesi,
                            'twitter_uid' => $response->id,
                            'twitter_name' => $response->name,
                            'twitter_username' => $response->screen_name,
                            'twitter_token' => $access_token['oauth_token'],
                            'twitter_secret' => $access_token['oauth_token_secret'],
                            'profile_image_url' => $response->profile_image_url,
                            'description' => $response->description,
                            'created_at' => date('Y-m-d h:i:s', strtotime($response->created_at)),
                            'time_zone' => $response->time_zone,
                            'lang' => $response->lang,
                            'verified' => $response->verified,
                            'protected' => $response->protected
                        );
                        $this->db->select('id');
                        $check_account = $this->db->get_where('twitter', array('twitter_uid' => $response->id))->row();
                        if (!$check_account) {
                            $this->db->insert('twitter', $data);
                        } else {
                            $this->db->where('id', $check_account->id);
                            $this->db->update('twitter', $data);
                        }
                        redirect('auto/twGetFirstData/' . $response->id);
                    }
                }
                unset($_SESSION['oauth']);
            }
        } else {
            /* twitter connect start */
            $callback = site_url('home/twitterconnect');

            $params = array('oauth_callback' => $callback);
            $code = $tmhOAuth->request('POST', $tmhOAuth->url('oauth/request_token', ''), $params);
            if ($code == 200) {
                /* token request available */
                $_SESSION['oauth'] = $tmhOAuth->extract_params($tmhOAuth->response['response']);
                $url = $tmhOAuth->url('oauth/authorize', '') . "?oauth_token={$_SESSION['oauth']['oauth_token']}&force_login=1";
                redirect($url);
            } else {
                echo $code;
            }
        }
        redirect();
    }

    function gaconnect() {
        $sesi = $this->session->userdata('idadmin');
        $name = $this->session->userdata('display');

        if ($sesi == "") {
            redirect('home/login');
        }

        require APPPATH . 'third_party/google-api-php-client/src/apiClient.php';
        require APPPATH . 'third_party/google-api-php-client/src/contrib/apiOauth2Service.php';

        $cache_path = $this->config->item('cache_path');
        $GLOBALS['apiConfig']['ioFileCache_directory'] = ($cache_path == '') ? APPPATH . 'cache/' : $cache_path;

        $googleauth = new apiClient();
        $googleauth->setApplicationName($this->config->item('application_name', 'analytics'));
        $googleauth->setClientId($this->config->item('client_id', 'analytics'));
        $googleauth->setClientSecret($this->config->item('client_secret', 'analytics'));
        $googleauth->setRedirectUri($this->config->item('redirect_uri', 'analytics'));
        $googleauth->setDeveloperKey($this->config->item('api_key', 'analytics'));
        $googleauth->setAccessType($this->config->item('access_type', 'analytics'));
        $googleauth->setScopes($this->config->item('scopes', 'analytics'));

        $userdata = new apiOauth2Service($googleauth);

        if (isset($_GET['code'])) {
            $googleauth->authenticate();
            $token = $googleauth->getAccessToken();
            $token_data = json_decode($token, true);
            $user = $userdata->userinfo->get();
            if ($token_data && $user) {
                $db['name'] = $user['name'];
                $db['username'] = $user['email'];
                $db['acc_token'] = $token;
                $db['acc_access_token'] = $token_data['access_token'];
                $db['acc_token_type'] = $token_data['token_type'];
                $db['acc_expires_in'] = $token_data['expires_in'];
                $db['acc_id_token'] = $token_data['id_token'];
                $db['acc_refresh_token'] = $token_data['refresh_token'];
                $db['acc_created'] = $token_data['created'];
                $db['acc_id'] = $user['id'];
                $db['acc_verified_email'] = $user['verified_email'];

                if (isset($user['link']) && $user['link'] != '')
                    $db['acc_link'] = $user['link'];
                if (isset($user['picture']) && $user['picture'] != '')
                    $db['acc_picture'] = $user['picture'];
                if (isset($user['gender']) && $user['gender'] != '')
                    $db['acc_gender'] = $user['gender'];
                if (isset($user['locale']) && $user['locale'] != '')
                    $db['acc_locale'] = $user['locale'];

                $db['postdate'] = date('Y-m-d H:i:s');

                $this->db->select('id');
                $check_account = $this->db->get_where('ga_account', array('username' => $db['username']))->row();
                if (!$check_account) {
                    $this->db->insert('ga_account', $db);
                    $id = $this->db->insert_id();
                } else {
                    $this->db->where('id', $check_account->id);
                    $this->db->update('ga_account', $db);
                    $id = $check_account->id;
                }
                redirect('ganalytics/manage/' . $id);
            } else {
                redirect();
            }
        } else {
            $authUrl = $googleauth->createAuthUrl();
            redirect($authUrl);
        }
    }

}
