<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Information extends Auth_Controller {
    function __construct() {
        parent::__construct();
    }

    public function index() {
        redirect("information/about");
    }

    public function about() {
        
    }

    public function contact() {
        
    }

    public function research_topic() {
        
    }
}