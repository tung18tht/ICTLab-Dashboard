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
}