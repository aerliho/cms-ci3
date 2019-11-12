<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_profile extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }
    
    public function index()
    {
        $this->load->model('user_model');
        
        $data = $this->user_model->findById(session_admin('id_user'));
        $page_name = 'Account Information';
        $action = $this->data['this_controller'] . 'proses';
        generate_form($page_name, $action);
        
        $this->child_breadcrumb = $page_name;
        $this->data['data']['js'] = ['js/admin/user_profile/user.js'];

        add_form_field([
            'type' => 'select',
            'label' => 'Group',
            'name' => '',
            'id' => 'Group_user',
            'select_option' => [
                'table' => 'ref_user_group',
                'selected' => $data['id_ref_user_group'] ?? '',
            ],
            'disabled' =>true
        ]);
        add_form_field([
            'type' => 'input',
            'label' => 'Username',
            'name' => 'username',
            'value' => $data['username'] ?? ''
        ]);

        add_form_field([
            'type' => 'input',
            'label' => 'First Name',
            'name' => 'first_name',
            'value' => $data['first_name'] ??''
        ]);
        add_form_field([
            'type' => 'input',
            'label' => 'Last Name',
            'name' => 'last_name',
            'value' => $data['last_name'] ?? ''
        ]);
        add_form_field([
            'type' => 'input',
            'label' => 'Phone',
            'name' => 'phone',
            'value' => $data['phone'] ?? ''
        ]);
        add_form_field([
            'type' => 'input',
            'label' => 'Email',
            'name' => 'email',
            'value' => $data['email'] ?? ''
        ]);
        
    }
    public function change_password()
    {
        $page_name = 'Change Password';
        $action = $this->data['this_controller'] . 'proses_change_password/';
        $back_url = 'change_password';
        generate_form($page_name, $action,$back_url);
        $this->child_breadcrumb = $page_name;
        $this->data['data']['js'] = ['js/admin/user_profile/user.js'];

        add_form_field([
            'type' => 'input',
            'type_field' => 'password',
            'label' => 'Current Password',
            'name' => 'password',
            'value' => ''
            ]);

        add_form_field([
            'type' => 'input',
            'type_field' => 'password',
            'label' => 'New Password',
            'name' => 'new_pass',
            'value' => '',
            'required' => true
        ]);

        add_form_field([
            'type' => 'input',
            'type_field' => 'password',
            'label' => 'Verify Password',
            'name' => 'verify_pass',
            'custom_attribute'=> 'data-parsley-equalto=#new_pass',
            'value' => '',
            'required' => true
        ]);
    }
    public function proses()
    {
        $this->load->model('user_model');
        $data = $this->user_model->findById(session_admin('id_user'));
        $post = $this->input->post();
        unset($post['id_ref_user_group']);
        $_id = $this->user_model->update($post, $data['id']);


        $res['error'] = $_id ? false : true;
        $res['msg'] = $_id ? 'Success' : "Error";
        echo json_encode($res);
        exit;
    }
    public function proses_change_password()
    {
        
        $this->load->model('user_model');
        $post = $this->input->post();
        $res['error'] = 0 ;

        $user = $this->user_model->findById(session_admin('id_user'));
        $check_password = password_verify($post['password'], $user['userpass']);
        
        if (!$check_password) {
            $res['error'] = 1;
            $res['msg'] = 'This Current Password seems to be invalid';
        }else{
            $update['userpass'] = password_encrypt($post['new_pass']);
            $this->user_model->update($update, $user['id']);
        }

        $res['msg'] = $res['msg'] ?? 'Success';

        echo json_encode($res);
        exit;
    }

}
