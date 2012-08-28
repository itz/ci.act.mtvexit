<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Home extends CI_Controller {

    protected $limit = 10;

    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->database();
    }

    function index() {
        $this->_page_view_counter(1);
        
        $content['title'] = 'act.mtvexit.org | Join The Fight';
        $content['data'] = '';
        $content['content'] = $this->load->view('default', $content, true);
        $this->load->view('body', $content);
    }

    function twitterconnect() {
        redirect();
    }
    
    function actvideo() {
        ?>        
        <html xmlns="http://www.w3.org/1999/xhtml" xmlns:fb="http://www.facebook.com/2008/fbml" xmlns:og="http://opengraph.org/schema/">
            <head>
                <title>Act.MTV.Exit | Join The Fight</title> 
                <meta property="og:title" content="Video - Act.MTV.Exit | Join The Fight"/>
                <meta property="og:site_name" content="act.mtvexit.org"/>
                <meta property="og:image " content="act.mtvexit.org"/>
                <meta property="og:description" content="Saya baru saja melihat video dan mendukung #stophumantrafficking. Ikutan aksi nyata http://facebook.com/mtvexitindonesia yuk, klik http://act.mtvexit.org untuk ikutan lihat video dan mendukung aksi lainnya."/>
                <meta http-equiv="refresh" content="0;url=http://act.mtvexit.org#actVideo">
            </head>
            <body></body>
        </html>
        <?php
    }

    function infografik() {
        $this->_page_view_counter(1);
        
        $content['title'] = 'Infografik | act.mtvexit.org | Join The Fight';
        $content['data'] = '';
        $content['content'] = $this->load->view('infografik', $content, true);
        $this->load->view('body', $content);
    }

    function youthleadertoolkit() {
        $this->load->helper(array('form'));
        $this->load->library('form_validation');
        $this->load->library('session');
        $view_id = $this->session->userdata('aidi');

        $content['title'] = 'Youth Leader Toolkit | act.mtvexit.org | Join The Fight';
        $content['data'] = '';

        if (!$view_id) {
            $this->form_validation->set_rules('tool_name', 'Name', 'trim|required|min_length[6]|max_length[20]|callback__alpha_dash_space');
            $this->form_validation->set_rules('tool_email', 'Email', 'trim|required|valid_email');
            if ($this->form_validation->run() === TRUE) {
                $data['tool_name'] = $this->input->post('tool_name', true);
                $data['tool_email'] = $this->input->post('tool_email', true);

                $this->db->insert('toolkit', $data);
                $keyword['aidi'] = $this->db->insert_id();
                $this->session->set_userdata($keyword);

                redirect('youthleadertoolkitview');
            } else {
                $this->_page_view_counter(1);

                $content['content'] = $this->load->view('youthleadertoolkit', $content, true);
            }
        } else {
            redirect('youthleadertoolkitview');
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
            redirect('youthleadertoolkit');
        }

        $content['title'] = 'Youth Leader Toolkit | act.mtvexit.org | Join The Fight';
        $content['data'] = '';
        $content['content'] = $this->load->view('youthleadertoolkitview', $content, true);
        $this->load->view('body', $content);
    }

    function gaconnect() {
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

    function _alpha_dash_space($str_in = '') {
        if (!preg_match("/^([-a-z0-9_ ])+$/i", $str_in)) {
            $this->form_validation->set_message('_alpha_dash_space', 'The %s field may only contain alpha-numeric characters, spaces, underscores, and dashes.');
            return FALSE;
        } else {
            return TRUE;
        }
    }

    function _page_view_counter($id) {
        $q = $this->db->query("UPDATE act_counter SET data_values = data_values + 1 WHERE id = '".$id."'");
    }

    function jobdone() {
        $id = $this->uri->segment(3,0);
        if(is_numeric($id) && $id != 0 ) {
            $this->_page_view_counter($id);
        }
    }

    
}
