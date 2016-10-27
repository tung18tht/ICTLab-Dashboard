<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class User extends MY_Controller {
    function __construct() {
        parent::__construct();
        $this->load->library('ion_auth');
    }
 
    public function index() {
        $this->load->view('welcome_message');
    }
 
    public function login() {
        $this->data['message'] = 'here will be the login form';
        $this->render('user/login_view');
    }
 
    public function logout() {
        echo 'here we will do the logout';
    }
}