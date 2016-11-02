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
                $_SESSION['auth_message'] = $this->ion_auth->messages();
                $this->session->mark_as_flash('auth_message');
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

    public function forgot_password() {
        $this->data['title'] = "Forgot Password";
        
        $this->load->library('form_validation');
        $this->form_validation->set_rules('email', 'Email', 'trim|valid_email|required');
        if ($this->form_validation->run() === FALSE) {
            $this->load->helper('form');
            $this->render('user/forgot_password_view');
        } else {
            if ($this->ion_auth->forgotten_password($this->input->post('email'))) {
                $_SESSION['auth_message'] = $this->ion_auth->messages();
                $this->session->mark_as_flash('auth_message');
                redirect("user/login");
            } else {
                $_SESSION['auth_message'] = $this->ion_auth->errors();
                $this->session->mark_as_flash('auth_message');
                redirect("user/forgot_password");
            }
        }
    }

    // //reset password - final step for forgotten password
    // public function reset_password($code)
    // {
    //     $reset = $this->ion_auth->forgotten_password_complete($code);
    //     if ($reset)
    //     {  //if the reset worked then send them to the login page
    //         $this->session->set_flashdata('message', $this->ion_auth->messages());
    //         redirect("auth/login", 'refresh');
    //     }
    //     else
    //     { //if the reset didnt work then send them back to the forgot password page
    //         $this->session->set_flashdata('message', $this->ion_auth->errors());
    //         redirect("auth/forgot_password", 'refresh');
    //     }
    // }
}