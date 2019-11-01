<?php
defined('BASEPATH') or exit('No direct script access allowed');
use Jenssegers\Blade\Blade;
class Blade_library extends Blade
{
    
    public function __construct()
    {
        $this->CI = &get_instance();
        $path = APPPATH.'views';
        $this->CI->blade = new Blade($path, $path . DIRECTORY_SEPARATOR . 'cache');
    }
}

