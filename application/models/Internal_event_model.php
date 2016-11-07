<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Internal_Event_Model extends CI_Model {
    function __construct() {
        parent::__construct();
    }

    public function get_seminars() {
        return $this->db->get('seminars')->result_array();
    }

    public function get_meetings() {
        return $this->db->get('meetings')->result_array();
    }

    public function get_discussions() {
        return $this->db->get('discussions')->result_array();
    }

    public function delete_seminar($id) {
        $this->db->delete('seminars', array('id' => $id));
    }

    public function delete_meeting($id) {
        $this->db->delete('meetings', array('id' => $id));
    }

    public function delete_discussion($id) {
        $this->db->delete('discussions', array('id' => $id));
    }
}