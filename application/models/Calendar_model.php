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
                $string .= '<span data-toggle="tooltip" data-html="true" class="event_name" style="color:#A52A2A;"
                    title="<div class=\'text-left\'> 
                        <span class=\'glyphicon glyphicon-check\'></span> '.$seminar['name'].'<br>
                        <span class=\'glyphicon glyphicon-map-marker\'></span> '.$seminar['place'].'<br>
                        <span class=\'glyphicon glyphicon-calendar\'></span> '.$seminar['date'].'<br>
                        <span class=\'glyphicon glyphicon-time\'></span> '.$seminar['start_time'].' - '.$seminar['end_time'].'<br>
                    </div>">
                    &nbsp;&#9632; ' .$seminar['name'] . '</span><br>';
            }
            
            $meetings = $this->get_meeting_in_date($year, $month, $i);
            foreach ($meetings as $meeting) {
                $string .= '<span data-toggle="tooltip" data-html="true" class="event_name" style="color:#556B2F;"
                    title="<div class=\'text-left\'> 
                        <span class=\'glyphicon glyphicon-check\'></span> '.$meeting['name'].'<br>
                        <span class=\'glyphicon glyphicon-map-marker\'></span> '.$meeting['place'].'<br>
                        <span class=\'glyphicon glyphicon-calendar\'></span> '.$meeting['date'].'<br>
                        <span class=\'glyphicon glyphicon-time\'></span> '.$meeting['start_time'].' - '.$meeting['end_time'].'<br>
                    </div>">
                    &nbsp;&#9632; ' .$meeting['name'] . '</span><br>';
            }
            
            $discussions = $this->get_discussion_in_date($year, $month, $i);
            foreach ($discussions as $discussion) {
                $string .= '<span data-toggle="tooltip" data-html="true" class="event_name" style="color:#4B0082;"
                    title="<div class=\'text-left\'> 
                        <span class=\'glyphicon glyphicon-check\'></span> '.$discussion['name'].'<br>
                        <span class=\'glyphicon glyphicon-map-marker\'></span> '.$discussion['place'].'<br>
                        <span class=\'glyphicon glyphicon-calendar\'></span> '.$discussion['date'].'<br>
                        <span class=\'glyphicon glyphicon-time\'></span> '.$discussion['start_time'].' - '.$discussion['end_time'].'<br>
                    </div>">
                    &nbsp;&#9632; ' .$discussion['name'] . '</span><br>';
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