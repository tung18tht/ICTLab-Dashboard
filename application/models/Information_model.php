<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Information_Model extends CI_Model {
    function __construct() {
        parent::__construct();
    }

    public function get_about() {
        $query = $this->db->get_where('information', array('name' => 'about'));
        return $query->row_array();
    }

    public function get_contact() {
        $query = $this->db->get_where('information', array('name' => 'contact'));
        return $query->row_array();
    }

    public function get_research_topic() {
        $query = $this->db->get_where('information', array('name' => 'research_topic'));
        return $query->row_array();
    }

    public function get_swarms() {
        $query = $this->db->get_where('information', array('name' => 'swarms'));
        return $query->row_array();
    }

    public function get_archives() {
        $query = $this->db->get_where('information', array('name' => 'archives'));
        return $query->row_array();
    }

    public function update_about($content) {
        $this->db->update('information', array('content' => $content), "name = 'about'");
    }

    public function update_contact($content) {
        $this->db->update('information', array('content' => $content), "name = 'contact'");
    }

    public function update_research_topic($content) {
        $this->db->update('information', array('content' => $content), "name = 'research_topic'");
    }

    public function update_swarms($content) {
        $this->db->update('information', array('content' => $content), "name = 'swarms'");
    }

    public function update_archives($content) {
        $this->db->update('information', array('content' => $content), "name = 'archives'");
    }
}