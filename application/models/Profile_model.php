<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile_Model extends Ion_auth_model {
    function __construct() {
        parent::__construct();
    }

    public function get_user($id) {

    }

    public function get_profile($id) {

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

    public function set_avatar() {
        $this->db->update('profile', array('has_avatar' => 1), "user_id = " . $this->user()->row()->id);
    }

    public function get_publications() {
        return $this->db->get_where('users_publications', array('user_id' => $this->user()->row()->id))->result_array();
    }

    public function get_publication_name($id) {
        return $this->db->get_where('users_publications', array('id' => $id))->row_array()['publication_name'];
    }

    public function get_students() {
        return $this->db->get_where('users_students', array('user_id' => $this->user()->row()->id))->result_array();
    }

    public function get_student_name($id) {
        return $this->db->get_where('users_students', array('id' => $id))->row_array()['student_name'];
    }

    public function get_projects() {
        return $this->db->get_where('users_projects', array('user_id' => $this->user()->row()->id))->result_array();
    }

    public function get_project_name($id) {
        return $this->db->get_where('users_projects', array('id' => $id))->row_array()['project_name'];
    }

    public function add_publication($name) {
        $data = array(
            'publication_name' => $name,
            'user_id' => $this->user()->row()->id
        );
        $this->db->insert('users_publications',$data);
    }

    public function add_student($name) {
        $data = array(
            'student_name' => $name,
            'user_id' => $this->user()->row()->id
        );
        $this->db->insert('users_students',$data);
    }

    public function add_project($name) {
        $data = array(
            'project_name' => $name,
            'user_id' => $this->user()->row()->id
        );
        $this->db->insert('users_projects',$data);
    }

    public function is_publication_belong_user($id) {
        $user_id = $this->db->get_where('users_publications', array('id' => $id))->row_array()['user_id'];
        return ($this->user()->row()->id === $user_id) ? TRUE : FALSE;
    }

    public function is_student_belong_user($id) {
        $user_id = $this->db->get_where('users_students', array('id' => $id))->row_array()['user_id'];
        return ($this->user()->row()->id == $user_id) ? TRUE : FALSE;
    }

    public function is_project_belong_user($id) {
        $user_id = $this->db->get_where('users_projects', array('id' => $id))->row_array()['user_id'];
        return ($this->user()->row()->id == $user_id) ? TRUE : FALSE;
    }

    public function update_publication($id, $name) {
        $this->db->update('users_publications', array('publication_name' => $name), "id = " . $id);
    }

    public function update_student($id, $name) {
        $this->db->update('users_students', array('student_name' => $name), "id = " . $id);
    }

    public function update_project($id, $name) {
        $this->db->update('users_projects', array('project_name' => $name), "id = " . $id);
    }

    public function delete_publication($id) {
        $this->db->delete('users_publications', array('id' => $id));
    }

    public function delete_student($id) {
        $this->db->delete('users_students', array('id' => $id));
    }

    public function delete_project($id) {
        $this->db->delete('users_projects', array('id' => $id));
    }
}