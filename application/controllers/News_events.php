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