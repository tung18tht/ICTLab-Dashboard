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

    public function add_seminar() {
        $this->data['page_title'] = "Add Seminar";
        
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('place', 'Place', 'trim|required');
        $this->form_validation->set_rules('date', 'Date', 'trim|required');
        $this->form_validation->set_rules('start_time', 'Start time', 'trim|required');
        $this->form_validation->set_rules('end_time', 'End time', 'trim|required');
        if ($this->form_validation->run() === FALSE) {
            $this->load->helper('form');
            $this->render('internal_event/add_seminar_view');
        } else {
            $this->internal_event_model->add_seminar($this->input->post('name'),
                                                     $this->input->post('place'),
                                                     $this->input->post('date'),
                                                     $this->input->post('start_time'),
                                                     $this->input->post('end_time'));
            $_SESSION['auth_message'] = 'New seminar added.';
            $this->session->mark_as_flash('auth_message');
            redirect("internal_event#seminar");
        }
    }

    public function add_meeting() {
        $this->data['page_title'] = "Add Meeting";
        
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('place', 'Place', 'trim|required');
        $this->form_validation->set_rules('date', 'Date', 'trim|required');
        $this->form_validation->set_rules('start_time', 'Start time', 'trim|required');
        $this->form_validation->set_rules('end_time', 'End time', 'trim|required');
        if ($this->form_validation->run() === FALSE) {
            $this->load->helper('form');
            $this->render('internal_event/add_meeting_view');
        } else {
            $this->internal_event_model->add_meeting($this->input->post('name'),
                                                     $this->input->post('place'),
                                                     $this->input->post('date'),
                                                     $this->input->post('start_time'),
                                                     $this->input->post('end_time'));
            $_SESSION['auth_message'] = 'New meeting added.';
            $this->session->mark_as_flash('auth_message');
            redirect("internal_event#meeting");
        }
    }

    public function add_discussion() {
        $this->data['page_title'] = "Add Discussion";
        
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('place', 'Place', 'trim|required');
        $this->form_validation->set_rules('date', 'Date', 'trim|required');
        $this->form_validation->set_rules('start_time', 'Start time', 'trim|required');
        $this->form_validation->set_rules('end_time', 'End time', 'trim|required');
        if ($this->form_validation->run() === FALSE) {
            $this->load->helper('form');
            $this->render('internal_event/add_discussion_view');
        } else {
            $this->internal_event_model->add_discussion($this->input->post('name'),
                                                        $this->input->post('place'),
                                                        $this->input->post('date'),
                                                        $this->input->post('start_time'),
                                                        $this->input->post('end_time'));
            $_SESSION['auth_message'] = 'New discussion added.';
            $this->session->mark_as_flash('auth_message');
            redirect("internal_event#discussion");
        }
    }

    public function edit_seminar($id) {
        $this->data['page_title'] = "Edit Seminar";

        $this->data['seminar'] = $this->internal_event_model->get_seminar_row($id);
        
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('place', 'Place', 'trim|required');
        $this->form_validation->set_rules('date', 'Date', 'trim|required');
        $this->form_validation->set_rules('start_time', 'Start time', 'trim|required');
        $this->form_validation->set_rules('end_time', 'End time', 'trim|required');
        if ($this->form_validation->run() === FALSE) {
            $this->load->helper('form');
            $this->render('internal_event/edit_seminar_view');
        } else {
            $this->internal_event_model->update_seminar($id,
                                                        $this->input->post('name'),
                                                        $this->input->post('place'),
                                                        $this->input->post('date'),
                                                        $this->input->post('start_time'),
                                                        $this->input->post('end_time'));
            $_SESSION['auth_message'] = 'Seminar updated.';
            $this->session->mark_as_flash('auth_message');
            redirect("internal_event#seminar");
        }
    }

    public function edit_meeting($id) {
        $this->data['page_title'] = "Edit Meeting";

        $this->data['meeting'] = $this->internal_event_model->get_meeting_row($id);
        
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('place', 'Place', 'trim|required');
        $this->form_validation->set_rules('date', 'Date', 'trim|required');
        $this->form_validation->set_rules('start_time', 'Start time', 'trim|required');
        $this->form_validation->set_rules('end_time', 'End time', 'trim|required');
        if ($this->form_validation->run() === FALSE) {
            $this->load->helper('form');
            $this->render('internal_event/edit_meeting_view');
        } else {
            $this->internal_event_model->update_meeting($id,
                                                        $this->input->post('name'),
                                                        $this->input->post('place'),
                                                        $this->input->post('date'),
                                                        $this->input->post('start_time'),
                                                        $this->input->post('end_time'));
            $_SESSION['auth_message'] = 'Meeting updated.';
            $this->session->mark_as_flash('auth_message');
            redirect("internal_event#meeting");
        }
    }

    public function edit_discussion($id) {
        $this->data['page_title'] = "Edit Discussion";

        $this->data['discussion'] = $this->internal_event_model->get_discussion_row($id);
        
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('place', 'Place', 'trim|required');
        $this->form_validation->set_rules('date', 'Date', 'trim|required');
        $this->form_validation->set_rules('start_time', 'Start time', 'trim|required');
        $this->form_validation->set_rules('end_time', 'End time', 'trim|required');
        if ($this->form_validation->run() === FALSE) {
            $this->load->helper('form');
            $this->render('internal_event/edit_discussion_view');
        } else {
            $this->internal_event_model->update_seminar($id,
                                                        $this->input->post('name'),
                                                        $this->input->post('place'),
                                                        $this->input->post('date'),
                                                        $this->input->post('start_time'),
                                                        $this->input->post('end_time'));
            $_SESSION['auth_message'] = 'Discussion updated.';
            $this->session->mark_as_flash('auth_message');
            redirect("internal_event#discussion");
        }
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