<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Homepage extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
	}
	
	public function index()
	{
		if  (get_cookie('remember_me', true)){
			$this->login();
			return ;
		}
		$this->data['page_name'] = 'Login';
	}

	public function login(){
		$this->load->model('auth_model');

		
		$post = $this->input->post();
		$res  = [];
		$cookie_user =  $this->input->cookie('remember_me', true);
		if (isset($cookie_user)) {
			$post['username'] = $cookie_user;
		}
		$this->db
			->join('ref_user_group b', 'b.id = a.id_ref_user_group', 'left')
			->where('a.is_active', 1)->where('a.is_delete', 0)
			->where('a.username', $post['username'])
			->or_where('a.email', $post['username']);
			
		$check_username = $this->db->select('a.*,b.name as group')->get('user a')->row_array();

		if (!$check_username) {
			return;
		}
		if (!$cookie_user) {
			$check_password = password_verify($post['password'],$check_username['userpass']);
			if (!$check_password) {
				return;
			}
		}		

		$this->_set_session($check_username);

		if (isset($post['remember'])) {
			$this->_set_cookies($check_username);
		}
		if (isset($cookie_user)) {
			return redirect('admin/home','refresh');
		}
		$res['url'] = 'admin/home';
		echo json_encode($res);exit;
	}

	private function _set_session($user)
	{
		$user_sess = [
			'id_user' => $user['id'],
			'id_ref_user_group' => $user['id_ref_user_group'],
			'username' => $user['username'],
			'group' => $user['group'],
			'first_name' => $user['first_name'],
			'last_name' => $user['last_name'],
			'email' => $user['email']
		];
		$this->session->set_userdata(NAME_SESSION_ADMIN, $user_sess);
	}
	private function _set_cookies($user)
	{
		$this->load->helper('cookie');
		$cookie = array(
			'name'   => 'remember_me',
			'value'  => $user['username'],
			'expire' => '3600',
		);
		$this->input->set_cookie($cookie);
	}

	public function logout()
	{
		$this->session->sess_destroy();
		delete_cookie('remember_me');
		redirect('');
	}

	public function not_found(){
		page_404();
	}

	function forget_password(){
	}
}
