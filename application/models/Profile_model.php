<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile_Model extends CI_Model {
    function __construct() {
        parent::__construct();
    }

    public function create_profile($id) {
        $this->db->insert('profile', array('user_id' => $id));
    }

    public function profile($id) {
        $query = $this->db->get_where('profile', array('user_id' => $id));
        return $query->row_array();
    }
}