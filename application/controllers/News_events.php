<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class News_events extends Auth_Controller {
    function __construct() {
        parent::__construct();

        $this->load->model('news_events_model');
    }

    public function news() {
        $this->data['page_title'] = 'News';

        $this->data['news'] = $this->news_events_model->get_news();

        $this->render('news_events/news_view');
    }

    public function view_news($id) {
        $this->data['page_title'] = 'News';

        $this->data['news'] = $this->news_events_model->get_news_row($id);

        $this->render('news_events/view_news_view');
    }

    public function events() {
        $this->data['page_title'] = 'Events';

        $this->data['events'] = $this->news_events_model->get_events();

        $this->render('news_events/events_view');
    }

    public function view_event($id) {
        $this->data['page_title'] = 'Event';

        $this->data['event'] = $this->news_events_model->get_event_row($id);

        $this->render('news_events/view_event_view');
    }

    public function add_news() {
        if (!($this->ion_auth->is_admin())) {
            redirect("news_events/news");
        }

        $this->data['page_title'] = "Add News";
        
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('content', 'Content', 'trim|required');
        if ($this->form_validation->run() === FALSE) {
            $this->load->helper('form');
            $this->render('news_events/add_news_view');
        } else {
            $this->news_events_model->add_news($this->input->post('name'),
                                               $this->input->post('content'));
            $_SESSION['auth_message'] = 'News added.';
            $this->session->mark_as_flash('auth_message');
            redirect("news_events/news");
        }
    }

    public function add_event() {
        if (!($this->ion_auth->is_admin())) {
            redirect("news_events/events");
        }

        $this->data['page_title'] = "Add Event";
        
        $this->load->library('form_validation');
        $this->form_validation->set_rules('speaker', 'Speaker', 'trim|required');
        $this->form_validation->set_rules('topic', 'Topic', 'trim|required');
        $this->form_validation->set_rules('location', 'Location', 'trim|required');
        $this->form_validation->set_rules('date', 'Date', 'trim|required');
        $this->form_validation->set_rules('content', 'Content', 'trim|required');
        if ($this->form_validation->run() === FALSE) {
            $this->load->helper('form');
            $this->render('news_events/add_event_view');
        } else {
            $this->news_events_model->add_event($this->input->post('speaker'),
                                                $this->input->post('topic'),
                                                $this->input->post('location'),
                                                $this->input->post('date'),
                                                $this->input->post('content'));
            $_SESSION['auth_message'] = 'New event added.';
            $this->session->mark_as_flash('auth_message');
            redirect("news_events/events");
        }
    }

    public function edit_news($id) {
        $this->data['page_title'] = "Edit News";

        $this->data['news'] = $this->news_events_model->get_news_row($id);
        
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('content', 'Content', 'trim|required');
        if ($this->form_validation->run() === FALSE) {
            $this->load->helper('form');
            $this->render('news_events/edit_news_view');
        } else {
            $this->news_events_model->update_news($id,
                                                  $this->input->post('name'),
                                                  $this->input->post('content'));
            $_SESSION['auth_message'] = 'News updated.';
            $this->session->mark_as_flash('auth_message');
            redirect("news_events/news");
        }
    }

    public function edit_event($id) {
        $this->data['page_title'] = "Edit Event";

        $this->data['event'] = $this->news_events_model->get_event_row($id);
        
        $this->load->library('form_validation');
        $this->form_validation->set_rules('speaker', 'Speaker', 'trim|required');
        $this->form_validation->set_rules('topic', 'Topic', 'trim|required');
        $this->form_validation->set_rules('location', 'Location', 'trim|required');
        $this->form_validation->set_rules('date', 'Date', 'trim|required');
        $this->form_validation->set_rules('content', 'Content', 'trim|required');
        if ($this->form_validation->run() === FALSE) {
            $this->load->helper('form');
            $this->render('news_events/edit_event_view');
        } else {
            $this->news_events_model->update_event($id,
                                                   $this->input->post('speaker'),
                                                   $this->input->post('topic'),
                                                   $this->input->post('location'),
                                                   $this->input->post('date'),
                                                   $this->input->post('content'));
            $_SESSION['auth_message'] = 'Event updated.';
            $this->session->mark_as_flash('auth_message');
            redirect("news_events/events");
        }
    }

    public function delete_news($id) {
        if (!($this->ion_auth->is_admin())) {
            redirect("news_events/view_news/".$id);
        }
        $this->news_events_model->delete_news($id);
        
        $_SESSION['auth_message'] = 'News deleted.';
        $this->session->mark_as_flash('auth_message');
        redirect("news_events/news");
    }

    public function delete_event($id) {
        if (!($this->ion_auth->is_admin())) {
            redirect("news_events/view_event/".$id);
        }
        $this->news_events_model->delete_event($id);
        
        $_SESSION['auth_message'] = 'Event deleted.';
        $this->session->mark_as_flash('auth_message');
        redirect("news_events/events");
    }
}