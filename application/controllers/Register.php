<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Register extends MY_Controller {
    public function index() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('first_name', 'First name','trim|required');
        $this->form_validation->set_rules('last_name', 'Last name','trim|required');
        $this->form_validation->set_rules('email','Email','trim|valid_email|required|is_unique[users.email]');
        $this->form_validation->set_rules('password','Password','min_length[8]|max_length[20]|required');
        $this->form_validation->set_rules('confirm_password','Confirm password','matches[password]|required');

        if($this->form_validation->run()===FALSE) {
            $this->load->helper('form');
            $this->render('register/index_view');
        } else {
            $first_name = $this->input->post('first_name');
            $last_name = $this->input->post('last_name');
            $email = $this->input->post('email');
            $password = $this->input->post('password');
 
            $additional_data = array(
                'first_name' => $first_name,
                'last_name' => $last_name
            );
 
            $this->load->library('ion_auth');
            if($this->ion_auth->register($email,$password,$email,$additional_data)) {
                $_SESSION['auth_message'] = 'The account has been created. You may now login.';
                $this->session->mark_as_flash('auth_message');
                redirect('user/login');
            } else {
                $_SESSION['auth_message'] = $this->ion_auth->errors();
                $this->session->mark_as_flash('auth_message');
                redirect('register');
            }
        }
    }
}