<?php
defined('BASEPATH') or exit('No direct script access allowed');

class auth
{
    protected $CI;
    protected $active_ctrl;

    protected $id_active_menu;

    protected $id_auth_menu;
    protected $menu;

    protected $breadcrumb;

    public function __construct()
    {       
        $this->CI =& get_instance();
        $this->active_ctrl = $this->CI->router->fetch_class();
        $this->menu = [];
    
    }
    public function init()
    {
        $this->generate_menu();
        $this->generate_breadcrumb();
        // auth for perpage
        $this->auth_menu();
    }

    protected function generate_menu(){
        $CI = $this->CI;

        $id_auth_menus = $CI->db
            ->select('group_concat( id_menu_admin ) as id')
            ->where('id_ref_user_group', session_admin('id_ref_user_group'))
            ->get('auth_pages')
            ->row_object()->id;

        $this->id_auth_menu(explode(',',$id_auth_menus));
        


        $menus = $CI->db
            ->select('id, id_parent, name, controller, icon, group, breadcrumb')
            ->order_by('urut', 'asc')
            ->where_in('id', $this->id_auth_menu)
            ->get_where('menu_admin', ['id_parent' => 0])
            ->result_array();
        $_menu = [];
        foreach ($menus as $key => $menu) {
            if ($menu['controller'] == $this->active_ctrl) {
                $menu['active'] = TRUE;

                $this->id_active_menu = $menu['id']; // check for active
            }

            $_menu[$key] = $menu;
            $this->check_submenu($menu['id'], [$key], $_menu);
        }
        $CI->data['menu'] = $_menu;

    }

    protected function generate_breadcrumb(){
        $CI = $this->CI;
        $_breadcrumb = $CI->db
            ->select(
                'c.name as n1, c.breadcrumb as b1,a.controller as c1,
            b.name as n2, b.breadcrumb as b2,b.controller as c2,
            a.name as n3, a.breadcrumb as b3,c.controller as c3'
            )
            ->join('menu_admin b', 'b.id = a.id_parent', 'left')
            ->join('menu_admin c', 'c.id = b.id_parent', 'left')
            ->get_where('menu_admin a', ['a.id' => $this->id_active_menu])->row_array();
        
        if(empty($_breadcrumb)){
            $CI->data['breadcrumb'] = [];
            return;
        }

        $level = 3;
        for ($i = 1; $i <= $level; $i++) {
            if (!$_breadcrumb['n' . $i]) {
                continue;
            }

            $breadcrumb[] = [
                'name' => $_breadcrumb['n' . $i],
                'breadcrumb' => $_breadcrumb['b' . $i],
                'controller' => $_breadcrumb['c' . $i],
            ];
        }


        // breadcrumb
        $CI->data['breadcrumb'] = $breadcrumb;
        
        return;
    }

    protected function auth_menu()
    {
        $CI = $this->CI;
        // auth per menu
        $auth_menu = $CI->db->select('c,r,u,d')->get('auth_pages', [
            'id_ref_user_group'=>session_admin('id_ref_user_group'),
            'id_menu_admin' =>$this->id_active_menu
            ])->row_array();
    
        $CI->data['auth'] = $auth_menu;
        return;
    }

    protected function get_menu(){
        return $this->menu;
    }

    protected function check_submenu($id_menu, $key, &$_menu,$level =2)
    {
        $CI = $this->CI;
        $submenus =  $CI->db
            ->select('id, id_parent, name, controller, icon, group, breadcrumb')
            ->order_by('urut', 'asc')
            ->where_in('id', $this->id_auth_menu)
            ->get_where('menu_admin', ['id_parent' => $id_menu])
            ->result_array();

        if (!$submenus)
        return;

        foreach ($submenus as $key1 => $submenu) {
            if ($submenu['controller'] == $this->active_ctrl) {
                $submenu['active'] = TRUE;

                $this->id_active_menu = $submenu['id']; // check for active
            }
            
            // set menu by level : default 2 level
            
            switch ($level) {
                case '2':
                    $_menu[$key[0]]['sub'][$key1] = $submenu;
                    break;
                case '3':
                    $_menu[$key[0]]['sub'][$key[1]]['sub'][$key1]  = $submenu;
                    break;
                default:
                    return;
                break;
            }

            // check next child
            $next_level = $level+1;
            $next_key = $key;
            array_push($next_key,$key1);

            $this->check_submenu($submenu['id'], $next_key, $_menu, $next_level);
        }
    }

    protected function id_auth_menu($data){
        $this->id_auth_menu = $data;
    }
    
}