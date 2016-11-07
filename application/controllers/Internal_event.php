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

    public function delete_seminar($id) {
        $this->internal_event_model->delete_seminar($id);
        
        $_SESSION['auth_message'] = 'Seminar deleted.';
        $this->session->mark_as_flash('auth_message');
        redirect("internal_event#seminar");
    }

    public function delete_meeting($id) {
        $this->internal_event_model->delete_meeting($id);
        
        $_SESSION['auth_message'] = 'Meeting deleted.';
        $this->session->mark_as_flash('auth_message');
        redirect("internal_event#meeting");
    }

    public function delete_discussion($id) {
        $this->internal_event_model->delete_discussion($id);
        
        $_SESSION['auth_message'] = 'Discussion deleted.';
        $this->session->mark_as_flash('auth_message');
        redirect("internal_event#discussion");
    }
}