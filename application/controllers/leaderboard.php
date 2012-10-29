<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Leaderboard extends CI_Controller {

    protected $limit = 10;

    function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->library('fungsi');
        $this->load->library('curl');
        $this->load->helper('url');
        $this->load->database();
        $this->load->model('user');

        $this->load->library('facebook', array(
            'appId' => $this->config->item('facebook_application_id'),
            'secret' => $this->config->item('facebook_secret_key'),
            'cookie' => true
        ));
    }

    function index() {
        redirect('leaderboard/facebook');
    }

    function facebook() {
        $sesi = $this->session->userdata('idadmin');
        $name = $this->session->userdata('display');

        $content['admin'] = $sesi;
        $content['names'] = $name;
        $content['sec1'] = 'facebook';

        $content['title'] = 'Facebook Leaderboard';
        $content['parent'] = 'leaderboard';
        $content['current'] = 'leaderboard/facebook';

        if ($sesi == "") {
            redirect('home/login');
        }

        $sec2 = $this->uri->segment(3, '');
        $content['sec2'] = $sec2;
        switch ($sec2) {
            case 'fans' :
                $content['title'] = 'Fans &mdash; ' . $content['title'];
                break;
            default :
                $content['title'] = 'Overview &mdash; ' . $content['title'];
                break;
        }

        $this->db->select('id, twitter_uid, twitter_username');
        $this->db->order_by('twitter_username', 'asc');
        $content['twitter_account'] = $this->db->get('twitter')->result();

        $this->db->select('id, pages_uid, pages_name');
        $this->db->where('pages_status', 1);
        $this->db->order_by('pages_name', 'asc');
        $content['facebook_pages'] = $this->db->get('facebook_pages')->result();

        $content['content'] = $this->load->view('leaderboard/facebook', $content, true);

        $this->load->view('body', $content);
    }

    function twitter() {
        $sesi = $this->session->userdata('idadmin');
        $name = $this->session->userdata('display');

        $content['admin'] = $sesi;
        $content['names'] = $name;
        $content['sec1'] = 'twitter';

        $content['title'] = 'Twitter Leaderboard';
        $content['parent'] = 'leaderboard';
        $content['current'] = 'leaderboard/twitter';

        if ($sesi == "") {
            redirect('home/login');
        }

        $sec2 = $this->uri->segment(3, '');
        $content['sec2'] = $sec2;
        switch ($sec2) {
            case 'followers' :
                $content['title'] = 'Followers &mdash; ' . $content['title'];
                break;
            default :
                $content['title'] = 'Overview &mdash; ' . $content['title'];
                break;
        }

        $q = $this->db->query("SELECT a.followers_count, a.friends_count, b.twitter_username FROM ear_twitter_credentials a, ear_twitter b WHERE a.twitter_uid = b.twitter_uid AND a.date_add LIKE '" . date('Y-m-d') . "%' ORDER BY a.followers_count DESC");
        $content['twitter_account'] = $q->result();

        xdebug($q); die();
        
        $content['content'] = $this->load->view('leaderboard/twitter', $content, true);

        $this->load->view('body', $content);
    }

    function website() {
        $sesi = $this->session->userdata('idadmin');
        $name = $this->session->userdata('display');

        $content['admin'] = $sesi;
        $content['names'] = $name;
        $content['sec1'] = 'website';

        $content['title'] = 'Google Analytics Leaderboard';
        $content['parent'] = 'leaderboard';
        $content['current'] = 'leaderboard/website';

        if ($sesi == "") {
            redirect('home/login');
        }

        $sec2 = $this->uri->segment(3, '');
        $content['sec2'] = $sec2;
        switch ($sec2) {
            case 'followers' :
                $content['title'] = 'Followers &mdash; ' . $content['title'];
                break;
            default :
                $content['title'] = 'Overview &mdash; ' . $content['title'];
                break;
        }

        $this->db->select('id, twitter_uid, twitter_username');
        $this->db->order_by('twitter_username', 'asc');
        $content['twitter_account'] = $this->db->get('twitter')->result();

        $this->db->select('id, pages_uid, pages_name');
        $this->db->where('pages_status', 1);
        $this->db->order_by('pages_name', 'asc');
        $content['facebook_pages'] = $this->db->get('facebook_pages')->result();

        $content['content'] = $this->load->view('leaderboard/website', $content, true);

        $this->load->view('body', $content);
    }

}
