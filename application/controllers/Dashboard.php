<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Dashboard extends Auth_Controller {
    public function index() {
        $this->data['page_title'] = 'Dashboard';

        $this->render('dashboard/index_view');
    }

    public function staff() {
        $this->data['page_title'] = 'Staffs';

        $this->load->model('staff_model');
        $this->data['position_groups'] = $this->staff_model->get_staffs_in_position_groups();

        $this->render('dashboard/staff_view');
    }

    public function add_user() {
        if (!($this->ion_auth->is_admin())) {
            redirect("dashboard/staff");
        }

        $this->data['page_title'] = 'Add user';
        
        $this->load->library('form_validation');
        $this->form_validation->set_rules('first_name', 'First name','trim|required');
        $this->form_validation->set_rules('last_name', 'Last name','trim|required');
        $this->form_validation->set_rules('email','Email','trim|valid_email|required|is_unique[users.email]');
        $this->form_validation->set_rules('password','Password','min_length[8]|max_length[20]|required');
        $this->form_validation->set_rules('confirm_password','Confirm password','matches[password]|required');

        if($this->form_validation->run()===FALSE) {
            $this->load->helper('form');
            $this->render('dashboard/add_user_view');
        } else {
            $first_name = $this->input->post('first_name');
            $last_name = $this->input->post('last_name');
            $email = $this->input->post('email');
            $password = $this->input->post('password');
 
            $additional_data = array(
                'first_name' => $first_name,
                'last_name' => $last_name
            );
 
            if($id = $this->ion_auth->register($email,$password,$email,$additional_data)) {
                $this->load->model('profile_model');
                $this->profile_model->create_profile($id);
                
                $_SESSION['auth_message'] = 'User added.';
                $this->session->mark_as_flash('auth_message');
                redirect('dashboard/staff');
            } else {
                $_SESSION['auth_message'] = $this->ion_auth->errors();
                $this->session->mark_as_flash('auth_message');
                redirect('dashboard/add_user');
            }
        }
    }
}