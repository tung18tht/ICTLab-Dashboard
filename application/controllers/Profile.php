<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Profile extends Auth_Controller {
    function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->data['page_title'] = 'Profile';

        $this->render('profile/index_view');
    }
}