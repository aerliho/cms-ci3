<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class test_model extends MY_Model
{
	function __construct()
	{
		$table = 'test';
		parent::__construct($table);
	}

}