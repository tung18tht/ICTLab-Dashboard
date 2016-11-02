<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class User extends Public_Controller {
    function __construct() {
        parent::__construct();
        $this->load->library('ion_auth');
    }
 
    public function index() {
        redirect('dashboard');
    }

    public function login() {
        $this->data['title'] = "Login";
        
        $this->load->library('form_validation');
        $this->form_validation->set_rules('email', 'Email', 'trim|valid_email|required');
        $this->form_validation->set_rules('password', 'Password', 'min_length[8]|max_length[20]|required');
        if ($this->form_validation->run() === FALSE) {
            $this->load->helper('form');
            $this->render('user/login_view');
        } else {
            $remember = (bool) $this->input->post('remember');
            if ($this->ion_auth->login($this->input->post('email'), $this->input->post('password'), $remember)) {
                redirect('dashboard');
            } else {
                $_SESSION['auth_message'] = $this->ion_auth->errors();
                $this->session->mark_as_flash('auth_message');
                redirect('user/login');
            }
        }
    }
 
    public function logout() {
        $this->ion_auth->logout();
        redirect('user/login');
    }
}