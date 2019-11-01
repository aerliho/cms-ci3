<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Test extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
	}
	
	public function index()
	{
		
	}
	public function add()
	{
		$page_name = 'tambah data';
		$action = base_url('admin/home/proses');
		generate_form($page_name,$action);
		add_form_field([
			'label' => 'input kota',
			'name' => 'kota',
			'required' => true
		]);
		
		$this->child_breadcrumb = $page_name;
		// print_r($this);exit;

	}
	public function proses()
	{
		$post = $this->input->post();
		echo json_encode($post);exit;
	}
}