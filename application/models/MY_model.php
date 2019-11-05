<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class MY_model extends CI_Model
{

	var $table   = 'ref_agen';
	var $tableAs = 'ref_agen a';

	function __construct()
	{
		parent::__construct();
	}

	function records($where = '')
	{
		// $alias['ship_name']     = 'a.name';
		$this->datatables->select('a.id,
								   a.name,
								   a.address,
								   a.phone,
								   a.fax
		');

		$this->datatables->add_column('DT_RowId', 'row_$1', 'id');
		$this->datatables->add_column('action', datatables_button(['e']), 'id');
		$this->datatables->where('a.is_delete', 0);
		// $this->datatables->alias([]);
		$this->datatables->unset_column('id');
		$data = $this->datatables->from($this->tableAs)->generate('array');
		return	 $data;
	}

	function insert($data)
	{
		$data['create_date'] 	= date('Y-m-d H:i:s');
		$data['user_id_create'] = id_user();
		$this->db->insert($this->table, $data);
	}
	function update($data, $id)
	{
		$where['id'] = $id;
		$data['user_id_modify'] = id_user();
		$data['modify_date'] 	= date('Y-m-d H:i:s');
		$this->db->update($this->table, $data, $where);
		return $id;
	}
	function update_batch($data)
	{
		foreach ($data as $key => $value) {
			$data[$key]['user_id_modify'] = id_user();
			$data[$key]['modify_date']    = date('Y-m-d H:i:s');
		}
		$this->db->update_batch($this->table, $data, 'id');
	}
	function delete($id)
	{
		$data['is_delete'] = 1;
		$this->update($data, $id);
	}
	function findById($id)
	{
		$where['a.id'] = $id;
		return $this->findBy($where, 1);
	}

	function findBy($where, $is_single_row = 0)
	{
		$where['a.is_delete'] = 0;
		$this->db->select('a.*');
		if ($is_single_row == 1) {
			return 	$this->db->get_where($this->tableAs, $where)->row_array();
		} else {
			return 	$this->db->get_where($this->tableAs, $where)->result_array();
		}
	}

	function fetchRow($where)
	{
		return $this->findBy($where, 1);
	}

	function findByExcel($where, $is_single_row = 0)
	{
		$where['is_delete'] = 0;
		if ($is_single_row == 1) {
			return 	$this->db->get_where($this->tableAs, $where)->row_array();
		} else {
			return 	$this->db->get_where($this->tableAs, $where)->result_array();
		}
	}

	function findByCombogrid($where, $is_single_row = 0)
	{
		$this->db->select('id,name, address, phone, fax');

		$where['a.is_delete'] = 0;
		switch ($is_single_row) {
			case '2':
				return 	$this->db->where($where)->from($this->tableAs)->count_all_results();
				break;
			case '1':
				return 	$this->db->get_where($this->tableAs, $where)->row_array();
				break;
			default:
				return 	$this->db->get_where($this->tableAs, $where)->result_array();
				break;
		}
	}
}
