<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Information_Model extends CI_Model {
    function __construct() {
        parent::__construct();
    }

    public function get_staffs_in_position_groups() {
        $position_list = $this->get_unique_position_list();

        $position_groups = array();
        foreach ($position_list as $key=>$position) {
            $this->db->select('*');
            $this->db->from('profile');
            $this->db->join('users', 'user_id = id');
            $this->db->where('position', $position);
            $staffs = $this->db->get()->result_array();

            $position_groups[$key] = array('name' => $position, 'staffs' => $staffs);
        }

        return $position_groups;
    }
}