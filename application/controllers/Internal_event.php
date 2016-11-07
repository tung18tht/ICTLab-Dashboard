<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Internal_event extends Auth_Controller {
    function __construct() {
        parent::__construct();

        if($this->ion_auth->is_admin()===FALSE) {
            redirect('dashboard');
        }

        $this->load->model('internal_event_model');
    }

    public function index() {
        $this->data['page_title'] = 'Internal Events';

        $this->data['seminars'] = $this->internal_event_model->get_seminars();
        $this->data['meetings'] = $this->internal_event_model->get_meetings();
        $this->data['discussions'] = $this->internal_event_model->get_discussions();

        $this->render('internal_event/index_view');
    }
}