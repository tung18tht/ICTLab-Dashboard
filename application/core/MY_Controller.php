<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Public_Controller extends CI_Controller {
    protected $data = array();
    function __construct() {
        parent::__construct();
        $this->data['page_title'] = '';
        $this->data['before_closing_head'] = '';
        $this->data['before_closing_body'] = '';
    }
 
    protected function render($the_view = NULL, $template = 'public_master') {
        if(is_null($template)) {
            $this->load->view($the_view,$this->data);
        } else {
            $this->data['the_view_content'] = (is_null($the_view)) ? '' : $this->load->view($the_view, $this->data, TRUE);
            $this->load->view('templates/' . $template . '_view', $this->data);
        }
    }
}

class Auth_Controller extends Public_Controller {
    function __construct() {
        parent::__construct();
        
        $this->load->library('ion_auth');
        if($this->ion_auth->logged_in()===FALSE) {
            redirect('user/login');
        }

        $user = $this->ion_auth->user()->row();
        $this->data['user'] = $user;

        $this->load->model('profile_model');
        $profile = $this->profile_model->profile($user->id);
        $this->data['profile'] = $profile;

    }
    
    protected function render($the_view = NULL, $template = 'auth_master') {
        parent::render($the_view, $template);
    }
}