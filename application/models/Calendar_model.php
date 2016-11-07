<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Calendar_Model extends CI_Model {
    function __construct() {
        parent::__construct();
    }

    public function get_calendar_data($year, $month) {
        $data = array();
        for ($i=1; $i<=31 ; $i++) {
            $string = '';
            
            $seminars = $this->get_seminar_in_date($year, $month, $i);
            foreach ($seminars as $seminar) {
                $string .= '<span style="color:#A52A2A;">&nbsp;&#9632; ' . $seminar['name'] . '</span><br>';
            }
            
            $meetings = $this->get_meeting_in_date($year, $month, $i);
            foreach ($meetings as $meeting) {
                $string .= '<span style="color:#556B2F;">&nbsp;&#9632; ' . $meeting['name'] . '</span><br>';
            }
            
            $discussions = $this->get_discussion_in_date($year, $month, $i);
            foreach ($discussions as $discussion) {
                $string .= '<span style="color:#4B0082;">&nbsp;&#9632; ' . $discussion['name'] . '</span><br>';
            }

            $data[$i] = $string;
        }
        return $data;
    }

    public function get_seminar_in_date($year, $month, $day) {
        $date = $year . '-' . $month . '-';
        if ($day < 10) {
            $date .= '0' . $day;
        } else {
            $date .= $day;
        }
        return $this->db->get_where('seminars', array('date' => $date))->result_array();
    }

    public function get_meeting_in_date($year, $month, $day) {
        $date = $year . '-' . $month . '-';
        if ($day < 10) {
            $date .= '0' . $day;
        } else {
            $date .= $day;
        }
        return $this->db->get_where('meetings', array('date' => $date))->result_array();
    }

    public function get_discussion_in_date($year, $month, $day) {
        $date = $year . '-' . $month . '-';
        if ($day < 10) {
            $date .= '0' . $day;
        } else {
            $date .= $day;
        }
        return $this->db->get_where('discussions', array('date' => $date))->result_array();
    }
}