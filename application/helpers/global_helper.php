<?php
defined('BASEPATH') or exit('No direct script access allowed');

if (!function_exists('password_encrypt')) {
	function password_encrypt($str){
		return password_hash($str, PASSWORD_BCRYPT, ['cost' => 9]);
	}
}

if (!function_exists('check_cost_encrpt')) {
	
	function check_cost_encrpt()
	{
		$timeTarget = 0.05; // 50 milliseconds 
		$cost = 8;
		do {
			$cost++;
			$start = microtime(true);
			password_hash("test", PASSWORD_BCRYPT, ["cost" => $cost]);
			$end = microtime(true);
		} while (($end - $start) < $timeTarget);
		
		echo "Appropriate Cost Found: " . $cost;
	}
}



if (!function_exists('now')) {
	
	function now()
	{
		return date('Y-m-d h:i:s');
	}
}


if (!function_exists('get_db')) {

	function get_db($table, $where = '', $select = "*", $type = 1)
	{
		$CI =& get_instance();

		$_db = $CI->db->select($select)->get_where($table,$where);
		switch ($type) {
			case 3: return $_db->num_rows(); break;
			case 2: return $_db->result_array(); break;
			case 1:
			default:  return $_db->row_array();break;
		}

	}
}


if (!function_exists('session_admin')) {

	function session_admin($name ='')
	{
		
		$CI =& get_instance();
		
		$sess = $CI->session->userdata(NAME_SESSION_ADMIN);
		if ($name) {
			return $sess[$name];
		}
		return $sess;
	}
}
if (!function_exists('generate_form')) {

	/** 
	* label
	* static_input
	* type
	* name
	* class
	* id
	* name
	* placeholder
	* value
	* readonly
	* disabled
	* note
	 * **/
	function generate_form($name,$action)
	{
		
		$CI =& get_instance();
		
		$CI->data['form']['name'] = $name;
		$CI->data['form']['action'] =$action;
	}

	function add_form_field($list)
	{
		$CI = &get_instance();
		if ($list['type'] == 'select') {
			selectlist2($list);
		}
		$CI->data['form']['list'][] = $list;	
	}

	function selectlist2(&$list)
	{
		$CI = &get_instance();
		$opt_data = $list['select_option'];
		
		$tbl               = $opt_data['table'];
		$id                = isset($opt_data['id']) ?$opt_data['id']: 'id';
		$name              = isset($opt_data['name']) ? $opt_data['name'] : 'name';
		$concat            = isset($opt_data['concat']) ? $opt_data['concat'] . 'as new_name' : '';
		// $join              = $opt_data['join'] ? $opt_data['join'] : '';
		$where             = isset($opt_data['where']) ?$opt_data['where']: [];
		$selected          = isset($opt_data['selected']) ?$opt_data['selected']: '';
		$multiple_selected = isset($opt_data['multiple_selected']) ?$opt_data['multiple_selected']:[];

		$title             = $opt_data['title'] ; 
		$select_query 	   = $id . ', ' .$name.', ' . $concat;
		$order_direction   = isset($opt_data['order']) ? 'desc' : 'asc';
		$order_name		   = isset($opt_data['order']) ? $opt_data['order'] : $name;
		
		if($where){
			$CI->db->where($where);
		}
		
		$opts              = $CI->db->order_by($order_name, $order_direction)
							->select($select_query, FALSE)
							->get($tbl)
							->result_array();
		$opt               = isset($opt_data['no_title']) ? '' : '<option value="">' . $title . '</option>';
		$opt               .= isset($opt_data['add_new']) ? '<option value="addNew">+ Add '.$opt_data['add_new'].'</option>' : '';
		
		foreach ($opts as $l) {
			if ($multiple_selected) {
				$terpilih 	 = in_array($l[$id], $multiple_selected) ? 'selected' : '';
			} else {
				$terpilih 	 = $selected == $l[$id] ? 'selected' : '';
			}

			$new_name 	 = $concat != '' ? $l['new_name'] : $l[$name];
			$opt 		.= "<option ".$terpilih." value=".$l[$id]." >". $new_name ."</option>";
		}
		$list['option'] = $opt;
	}
}