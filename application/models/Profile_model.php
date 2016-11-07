<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile_Model extends Ion_auth_model {
    function __construct() {
        parent::__construct();
    }

    public function get_user($id) {
        $query = $this->db->get_where('users', array('id' => $id));
        return $query->row_array();
    }

    public function get_profile($id) {
        $query = $this->db->get_where('profile', array('user_id' => $id));
        return $query->row_array();
    }

    public function create_profile($id) {
        $this->db->insert('profile', array('user_id' => $id));
    }

    public function profile() {
        return $this->get_profile($this->user()->row()->id);
    }

    public function update_profile($id, $user_data, $profile_data) {
        $this->db->update('users', $user_data, "id = " . $id);
        $this->db->update('profile', $profile_data, "user_id = " . $id);
    }

    public function set_avatar($id) {
        $this->db->update('profile', array('has_avatar' => 1), "user_id = " . $id);
    }

    public function get_publications($id) {
        return $this->db->get_where('users_publications', array('user_id' => $id))->result_array();
    }

    public function get_publication_row($id) {
        return $this->db->get_where('users_publications', array('id' => $id))->row_array();
    }

    public function get_students($id) {
        return $this->db->get_where('users_students', array('user_id' => $id))->result_array();
    }

    public function get_student_row($id) {
        return $this->db->get_where('users_students', array('id' => $id))->row_array();
    }

    public function get_projects($id) {
        return $this->db->get_where('users_projects', array('user_id' => $id))->result_array();
    }

    public function get_project_row($id) {
        return $this->db->get_where('users_projects', array('id' => $id))->row_array();
    }

    public function add_publication($id, $name) {
        $data = array(
            'publication_name' => $name,
            'user_id' => $id
        );
        $this->db->insert('users_publications',$data);
    }

    public function add_student($id, $name) {
        $data = array(
            'student_name' => $name,
            'user_id' => $id
        );
        $this->db->insert('users_students',$data);
    }

    public function add_project($id, $name) {
        $data = array(
            'project_name' => $name,
            'user_id' => $id
        );
        $this->db->insert('users_projects',$data);
    }

    public function can_edit_publication($user_id, $publication_id) {
        if ($this->ion_auth->is_admin()) {
            return TRUE;
        }

        $user_publication_id = $this->db->get_where('users_publications', array('id' => $publication_id))->row_array()['user_id'];
        return ($user_publication_id === $user_id) ? TRUE : FALSE;
    }

    public function can_edit_student($user_id, $student_id) {
        if ($this->ion_auth->is_admin()) {
            return TRUE;
        }

        $user_student_id = $this->db->get_where('users_students', array('id' => $student_id))->row_array()['user_id'];
        return ($user_student_id === $user_id) ? TRUE : FALSE;
    }

    public function can_edit_project($user_id, $project_id) {
        if ($this->ion_auth->is_admin()) {
            return TRUE;
        }

        $user_project_id = $this->db->get_where('users_projects', array('id' => $project_id))->row_array()['user_id'];
        return ($user_project_id === $user_id) ? TRUE : FALSE;
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