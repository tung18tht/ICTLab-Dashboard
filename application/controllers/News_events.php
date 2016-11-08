<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class News_events extends Auth_Controller {
    function __construct() {
        parent::__construct();

        $this->load->model('news_events_model');
    }

    public function
}