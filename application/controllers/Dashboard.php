<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Dashboard extends Auth_Controller {
    public function index() {
        $this->data['page_title'] = 'Dashboard';

        $this->render('dashboard/index_view');
    }
}