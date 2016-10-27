<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Register extends MY_Controller {
    public function index() {
        $this->load->helper('form');
        $this->render('register/index_view');

        $this->load->library('form_validation');
        $this->form_validation->set_rules('first_name', 'First name','trim|required');
        $this->form_validation->set_rules('last_name', 'Last name','trim|required');
        $this->form_validation->set_rules('email','Email','trim|valid_email|required|is_unique[users.email]');
        $this->form_validation->set_rules('password','Password','min_length[8]|max_length[20]|required');
        $this->form_validation->set_rules('confirm_password','Confirm password','matches[password]|required');
    }
}