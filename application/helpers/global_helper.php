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
		return date('d-m-Y h:i:s');
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
		$CI->data['form']['list'][] = $list;	
	}
	
}