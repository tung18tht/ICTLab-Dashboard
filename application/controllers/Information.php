<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Information extends Auth_Controller {
    function __construct() {
        parent::__construct();

        $this->load->model('information_model');
    }

    public function index() {
        redirect("information/about");
    }

    public function about() {
        $this->data['page_title'] = "About";
        $this->data['content'] = $this->information_model->get_about()['content'];
        $this->render('information/about_view');
    }

    public function contact() {
        $this->data['page_title'] = "Contact";
        $this->data['content'] = $this->information_model->get_contact()['content'];
        $this->render('information/contact_view');
    }

    public function research_topic() {
        $this->data['page_title'] = "Research Topics";
        $this->data['content'] = $this->information_model->get_research_topic()['content'];
        $this->render('information/research_topic_view');
    }

    public function swarms() {
        $this->data['page_title'] = "SWARMS";
        $this->data['content'] = $this->information_model->get_swarms()['content'];
        $this->render('information/swarms_view');
    }

    public function archives() {
        $this->data['page_title'] = "ARCHIVES";
        $this->data['content'] = $this->information_model->get_archives()['content'];
        $this->render('information/archives_view');
    }

    public function edit_about() {
        if (!($this->ion_auth->is_admin())) {
            redirect("information/about");
        }

        $this->data['page_title'] = "Edit About";

        $this->data['content'] = $this->information_model->get_about()['content'];
        
        $this->load->library('form_validation');
        $this->form_validation->set_rules('content', 'Content', 'trim|required');
        if ($this->form_validation->run() === FALSE) {
            $this->load->helper('form');
            $this->render('information/edit_about_view');
        } else {
            $this->information_model->update_about($this->input->post('content'));
            $_SESSION['auth_message'] = 'About updated.';
            $this->session->mark_as_flash('auth_message');
            redirect("information/about");
        }
    }

    public function edit_contact() {
        if (!($this->ion_auth->is_admin())) {
            redirect("information/contact");
        }

        $this->data['page_title'] = "Edit Contact";

        $this->data['content'] = $this->information_model->get_contact()['content'];
        
        $this->load->library('form_validation');
        $this->form_validation->set_rules('content', 'Content', 'trim|required');
        if ($this->form_validation->run() === FALSE) {
            $this->load->helper('form');
            $this->render('information/edit_contact_view');
        } else {
            $this->information_model->update_contact($this->input->post('content'));
            $_SESSION['auth_message'] = 'Contact updated.';
            $this->session->mark_as_flash('auth_message');
            redirect("information/contact");
        }
    }

    public function edit_research_topic() {
        if (!($this->ion_auth->is_admin())) {
            redirect("information/research_topic");
        }

        $this->data['page_title'] = "Edit Research Topics";

        $this->data['content'] = $this->information_model->get_research_topic()['content'];
        
        $this->load->library('form_validation');
        $this->form_validation->set_rules('content', 'Content', 'trim|required');
        if ($this->form_validation->run() === FALSE) {
            $this->load->helper('form');
            $this->render('information/edit_research_topic_view');
        } else {
            $this->information_model->update_research_topic($this->input->post('content'));
            $_SESSION['auth_message'] = 'Research Topics updated.';
            $this->session->mark_as_flash('auth_message');
            redirect("information/research_topic");
        }
    }

    public function edit_swarms() {
        if (!($this->ion_auth->is_admin())) {
            redirect("information/swarms");
        }

        $this->data['page_title'] = "Edit SWARMS";

        $this->data['content'] = $this->information_model->get_swarms()['content'];
        
        $this->load->library('form_validation');
        $this->form_validation->set_rules('content', 'Content', 'trim|required');
        if ($this->form_validation->run() === FALSE) {
            $this->load->helper('form');
            $this->render('information/edit_swarms_view');
        } else {
            $this->information_model->update_swarms($this->input->post('content'));
            $_SESSION['auth_message'] = 'SWARMS updated.';
            $this->session->mark_as_flash('auth_message');
            redirect("information/swarms");
        }
    }

    public function edit_archives() {
        if (!($this->ion_auth->is_admin())) {
            redirect("information/archives");
        }

        $this->data['page_title'] = "Edit ARCHIVES";

        $this->data['content'] = $this->information_model->get_archives()['content'];
        
        $this->load->library('form_validation');
        $this->form_validation->set_rules('content', 'Content', 'trim|required');
        if ($this->form_validation->run() === FALSE) {
            $this->load->helper('form');
            $this->render('information/edit_archives_view');
        } else {
            $this->information_model->update_archives($this->input->post('content'));
            $_SESSION['auth_message'] = 'ARCHIVES updated.';
            $this->session->mark_as_flash('auth_message');
            redirect("information/archives");
        }
    }
}