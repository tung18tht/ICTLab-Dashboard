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
}