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


    // //forgot password
    // function forgot_password()
    // {
    //     $this->form_validation->set_rules('email', 'Email Address', 'required');
    //     if ($this->form_validation->run() == false)
    //     {
    //         //setup the input
    //         $this->data['email'] = array('name' => 'email',
    //             'id' => 'email',
    //         );
    //         //set any errors and display the form
    //         $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
    //         $this->render();
    //     }
    //     else
    //     {
    //         //run the forgotten password method to email an activation code to the user
    //         $forgotten = $this->ion_auth->forgotten_password($this->input->post('email'));
    //         if ($forgotten)
    //         { //if there were no errors
    //             $this->session->set_flashdata('message', $this->ion_auth->messages());
    //             redirect("auth/login", 'refresh'); //we should display a confirmation page here instead of the login page
    //         }
    //         else
    //         {
    //             $this->session->set_flashdata('message', $this->ion_auth->errors());
    //             redirect("auth/forgot_password", 'refresh');
    //         }
    //     }
    // }
    
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