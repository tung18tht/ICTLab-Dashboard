<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News_Events_Model extends CI_Model {
    function __construct() {
        parent::__construct();
    }

    public function get_news() {
        return $this->db->get('news')->result_array();
    }

    public function get_news_row($id) {
        return $this->db->get_where('news', array('id' => $id))->row_array();
    }

    public function get_events() {
        return $this->db->get('events')->result_array();
    }

    public function get_event_row($id) {
        return $this->db->get_where('events', array('id' => $id))->row_array();
    }

    public function add_news($name, $content) {
        $data = array(
            'name' => $name,
            'content' => $content
        );
        $this->db->insert('news', $data);
    }

    public function add_event($speaker, $topic, $location, $date, $content) {
        $data = array(
            'speaker' => $speaker,
            'topic' => $topic,
            'location' => $location,
            'date' => $date,
            'content' => $content
        );
        $this->db->insert('events', $data);
    }

    public function update_news($id, $name, $content) {
        $data = array(
            'name' => $name,
            'content' => $content
        );
        $this->db->update('news', $data, "id = " . $id);
    }

    public function delete_seminar($id) {
        $this->db->delete('seminars', array('id' => $id));
    }
}