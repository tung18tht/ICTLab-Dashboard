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
        echo 'Here we will make the login form';
    }
 
    public function logout() {
        echo 'here we will do the logout';
    }
}