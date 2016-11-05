<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Profile extends Auth_Controller {
    function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->data['page_title'] = 'Profile';
        
        $this->load->library('form_validation');
        $this->form_validation->set_rules('first_name', 'First name','trim|required');
        $this->form_validation->set_rules('last_name', 'Last name','trim|required');
        $this->form_validation->set_rules('title', 'Title','trim|required');
        $this->form_validation->set_rules('position', 'Position','trim|required');
        $this->form_validation->set_rules('affiliation','Affiliation','trim|required');

        if($this->form_validation->run()===FALSE) {
            $this->load->helper('form');
            $this->render('profile/index_view');
        } else {
            $first_name = $this->input->post('first_name');
            $last_name = $this->input->post('last_name');
            $title = $this->input->post('title');
            $position = $this->input->post('position');
            $affiliation = $this->input->post('affiliation');
 
            $user_data = array(
                'first_name' => $first_name,
                'last_name' => $last_name
            );
            $profile_data = array(
                'title' => $title,
                'position' => $position,
                'affiliation' => $affiliation
            );

            $this->profile_model->update_profile($user_data, $profile_data);

            $_SESSION['auth_message'] = 'Changes saved.';
            $this->session->mark_as_flash('auth_message');
            redirect('profile');
        }
    }

    public function upload_avatar() {
        $config['upload_path'] = 'assets/avatar/';
        $config['allowed_types'] = 'jpg|png';
        $config['file_name'] = $this->data['user']->id . '.png';
        $config['overwrite'] = TRUE;
        $config['max_size'] = '2048';

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('avatar')) {
            $_SESSION['auth_message'] = $this->upload->display_errors('','');
            $this->session->mark_as_flash('auth_message');
            redirect("profile");
        } else {
            $this->profile_model->set_avatar();
            $_SESSION['auth_message'] = 'Profile picture changed.';
            $this->session->mark_as_flash('auth_message');
            redirect("profile");
        }
    }

    public function change_password() {
        $this->data['page_title'] = 'Change password';
        
        $this->load->library('form_validation');
        $this->form_validation->set_rules('old_password','Old password','required');
        $this->form_validation->set_rules('password','New password','min_length[8]|max_length[20]|required');
        $this->form_validation->set_rules('confirm_password','Confirm password','matches[password]|required');

        if ($this->form_validation->run()===FALSE) {
            $this->load->helper('form');
            $this->render('profile/change_password_view');
        } else {
            $email = $this->data['user']->email;
            $old_password = $this->input->post('old_password');
            $password = $this->input->post('password');

            if ($this->ion_auth->change_password($email, $old_password, $password)) {
                $_SESSION['auth_message'] = $this->ion_auth->messages();
                $this->session->mark_as_flash('auth_message');
                redirect("user/logout");
            } else {
                $_SESSION['auth_message'] = $this->ion_auth->errors();
                $this->session->mark_as_flash('auth_message');
                redirect("profile/change_password");
            }
        }
    }
}