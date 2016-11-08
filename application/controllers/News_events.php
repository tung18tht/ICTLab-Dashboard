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
}