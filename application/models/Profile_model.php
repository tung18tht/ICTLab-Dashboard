<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile_Model extends Ion_auth_model {
    function __construct() {
        parent::__construct();
    }

    public function create_profile() {
        $this->db->insert('profile', array('user_id' => $this->user()->row()->id));
    }

    public function profile() {
        $query = $this->db->get_where('profile', array('user_id' => $this->user()->row()->id));
        return $query->row_array();
    }

    public function update_profile($user_data, $profile_data) {
        $this->db->update('users', $user_data, "id = " . $this->user()->row()->id);
        $this->db->update('profile', $profile_data, "user_id = " . $this->user()->row()->id);
    }
}