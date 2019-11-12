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

	public function records()
	{
		$this->load->model('test_model');
		
		$select_colomn = 'id,nama,detail,id_ref_status_publish';
		$this->test_model->records($select_colomn);
	}
	public function add($id ='')
	{
		$data = [];
		if ($id) {
			$this->load->model('test_model');
			$data = $this->test_model->findById($id);
		}

		$page_name = $id ? 'Edit Records' : 'Add New Records';
		$action = $this->data['this_controller'].'proses/'. $id;
		generate_form($page_name,$action);
		
		add_form_field([
			'type' =>'input',
			'label' => 'nama saya',
			'name' => 'nama',                      
			'value'=> $data['nama'] ?? ''
		]);

		add_form_field([
			'type' => 'input',
			'label' => 'Detail' ,
			'name' => 'detail',
			'value'=> $data['detail'] ?? ''
		]);

		add_form_field([
			'type' => 'datetime',
			'label' => 'DateTime',
			'class' => 'my_datetime',
			'name' => 'datetime',
			'value'=> isset($data['datetime']) ? $data['datetime']:  '',
			'readonly' => true,
		]);

		add_form_field([
			'type' => 'date',
			'label' => 'Date',
			'class' => 'my_date',
			'name' => 'date',
			'value' => isset($data['date']) ? $data['date']: '',
			'readonly' => true,
		]);

		add_form_field([
			'type' => 'time',
			'label' => 'Time',
			'class' => 'my_time',
			'name' => 'time',
			'value' => isset($data['time'])? format_date('Y-m-d H:i',$data['time']) : '',
			'readonly' => true,
		]);

		add_form_field([
			'type' => 'select',
			'label' => 'Status Publish' ,
			'name' => 'id_ref_status_publish',
			'select_option' => [
				'table' => 'ref_status_publish',
				'selected' => $data['id_ref_status_publish'] ?? '',
				'title' =>'Status Publish'
			]
		]);

		add_form_field([
			'type' => 'ckeditor',
			'label' => 'ckeditor' ,
			'name' => 'ckeditor',
			'id' => 'ckeditor1',
			'value' => $data['ckeditor'] ?? '',
		]);

		add_form_field([
			'type' => 'fileupload',
			'label' => 'Upload File' ,
			'name' => 'fileupload',
			'value' => $data['fileupload'] ?? '',
		]);
		add_form_field([
			'type' => 'imagemanager',
			'label' => 'Upload Image' ,
			'name' => 'imagemanager',
			'value' => $data['imagemanager'] ?? '',
		]);
		$this->child_breadcrumb = $page_name;
		// print_r($this);
		// exit;/
	}
	public function proses($id='')
	{
		$this->load->model('test_model');
		
		$post = $this->input->post();
		if ($id) {
			$_id = $this->test_model->update($post,$id);
		}else{
			$_id = $this->test_model->insert($post);
		}
		
		$res['error'] = $_id ?false:true;
		$res['msg'] = $_id ? 'Success' :"Error";
		echo json_encode($res);
		exit;
	}
	public function delete($id)
	{
		$this->load->model('test_model');
		$this->test_model->delete($id);
		$check_delete = $this->db->affected_rows();
		
		$res['error'] = $check_delete ? false :true;
		$res['msg'] = $check_delete ? 'Success' : 'Error';
		echo json_encode($res);
		exit;
	}
}