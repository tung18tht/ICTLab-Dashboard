<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Dashboard extends Auth_Controller {
    public function index() {
        $this->data['page_title'] = 'Dashboard';

        $this->render('dashboard/index_view');
    }

    public function staff() {
        $this->data['page_title'] = 'Staffs';

        $this->load->model('staff_model');
        $this->data['position_groups'] = $this->staff_model->get_staffs_in_position_groups();

        $this->render('dashboard/staff_view');
    }
}