<?php
defined('BASEPATH') or exit('No direct script access allowed');

class view
{
    protected $CI;

    public function __construct()
    {
        $this->CI = &get_instance();
    }

    public function render()
    {
        $this->generate_meta();
        $this->generate_custom_source();
        $this->generate_page_name();
        $this->generate_breadcrumb();


        // Authentication user
        $sess = session_admin();

        // if ($this->CI->layout == 'front' && $sess)
        //     redirect('admin/home');

        if ($this->CI->layout == 'admin') {
            if (!$sess) 
                redirect('/');

            $auth = $this->CI->data['auth'];

            if (empty($auth))
                page_403();
        }
        
        foreach ($this->CI->data as $key => $value) {
            $this->CI->blade->share($key, $value);
        }
        echo $this->CI->blade->make($this->CI->path, $this->CI->data);
    }

    public function generate_app_default()
    {
        
        $this->CI->data['ADM_SESS'] = session_admin();
        $this->CI->data['ADM_SESS']['first_character'] = strtoupper(
            substr($this->CI->data['ADM_SESS']['first_name'],0,1)
        );
        
        // set baseurl
        $base_url = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') || $_SERVER['SERVER_PORT'] == 443 ? 'http://' : 'https://';
        $base_url = str_replace($base_url . $_SERVER['HTTP_HOST'], '', base_url());

        $this->CI->data['base_url'] = $base_url;
        $this->CI->data['app_name'] = APP_NAME;


        $dir = $this->CI->router->directory;
        $class = $this->CI->router->fetch_class();
        $method = $this->CI->router->fetch_method();


        $default_view = $class . '/' . $method;
        $view = isset($this->CI->view_name) ? $this->CI->view_name : $default_view;

        $defaultLayout = ($dir) ? 'admin' : 'front';
        $this->CI->layout = (isset($this->CI->layout)) ? $this->CI->layout : $defaultLayout;

        $this->CI->path = isset($this->CI->path) ? $this->CI->path : $defaultLayout . '/' . $view;

        $this->CI->data['this_controller'] = $this->CI->data['base_url'] . $dir . $class . '/';
    }
    
    protected function generate_meta()
    {
        $this->CI->data['meta_description'] = 'cms dengan system blade dan theme metronic';
        $this->CI->data['meta_keywords'] = 'cms codeigniter terbaru ';
        $this->CI->data['meta_author'] = 'amar ronaldo';
    }

    protected function generate_page_name()
    {
        if ( !isset($this->CI->data['page_name']) &&  isset($this->CI->data['breadcrumb']) ) {
            $breadcrumb = end($this->CI->data['breadcrumb']);
            $breadcrumb = $breadcrumb['breadcrumb'] ? $breadcrumb['breadcrumb'] : $breadcrumb['name'];
            $this->CI->data['page_name'] = $breadcrumb;
        }
    }
    protected function generate_custom_source()
    {
        $this->CI->data['js_bundle'] = '';
        if (isset($this->CI->data['data']['js'])) {
            foreach ($this->CI->data['data']['js'] as $key => $value) {
                $this->CI->data['js_bundle'] .= '<script src="' . base_url('assets/' . $value) . '" type="text/javascript"></script>';
            }
        }
        $this->CI->data['css_bundle'] = '';
        if (isset($this->CI->data['data']['css'])) {
            foreach ($this->CI->data['data']['css'] as $key => $value) {
                $this->CI->data['css_bundle'] .= '<link href="' . base_url('assets/' . $value) . '" rel="stylesheet" type="text/css">';
            }
        }
    }
    
    protected function generate_breadcrumb()
    {
        if (isset($this->CI->child_breadcrumb)) {
            $this->CI->data['breadcrumb'][] = [
                'name' => $this->CI->child_breadcrumb,
                'breadcrumb' => $this->CI->child_breadcrumb,
                'controller' => ""
            ];
        }
    }
}
