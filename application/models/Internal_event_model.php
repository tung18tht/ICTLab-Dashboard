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

    public function add_seminar($name, $place, $date, $start_time, $end_time) {
        $data = array(
            'name' => $name,
            'place' => $place,
            'date' => $date,
            'start_time' => $start_time,
            'end_time' => $end_time
        );
        $this->db->insert('seminars',$data);
    }

    public function add_meeting($name, $place, $date, $start_time, $end_time) {
        $data = array(
            'name' => $name,
            'place' => $place,
            'date' => $date,
            'start_time' => $start_time,
            'end_time' => $end_time
        );
        $this->db->insert('meetings',$data);
    }

    public function add_discussion($name, $place, $date, $start_time, $end_time) {
        $data = array(
            'name' => $name,
            'place' => $place,
            'date' => $date,
            'start_time' => $start_time,
            'end_time' => $end_time
        );
        $this->db->insert('discussions',$data);
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