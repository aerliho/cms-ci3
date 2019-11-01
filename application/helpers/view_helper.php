<?php
defined('BASEPATH') or exit('No direct script access allowed');



if (!function_exists('page_404')) {
	function page_404(){
		$CI =& get_instance();
		$CI->path = 'components/404';
		$CI->data['page_name'] = 'Not Found';
	}
}
if (!function_exists('page_403')) {
	function page_403(){
		$CI =& get_instance();
		$CI->path = 'components/403';
		$CI->data['page_name'] = 'Forbidden';
	}
}