<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class MY_model extends CI_Model
{
    protected $auth;
    protected $tabel;
    protected $tabelAs;

    function __construct($table)
    {
        parent::__construct();
        $this->table = $table;
        $this->tableAs = $table.' a';
    }
    function records($select,$option= [])
    {
        $order_id = $option['order']??'id';
        $order_direction = $option['order']??'desc';
        $order_id = $option['order'] ?? 'id';
        
        $this->datatables->select($select);
        $this->db->order_by($order_id,$order_direction);
        $this->datatables->where('is_delete',0);
        $this->datatables->from($this->table);
        $data = $this->datatables->generate();
        echo $data;
        exit;
    }

    function insert($data)
    {
        $data['create_date']     = now();
        $data['id_user_create']  = session_admin('id_user');
        $this->db->insert($this->table, array_filter($data));
        return $this->db->insert_id();
    }

    function update($data, $id)
    {
        $where['id']             = $id;
        $where['is_delete']      = 0;
        
        $data['modify_date']     = now();
        $data['id_user_modify']  = session_admin('id_user');
        $this->db->update($this->table, $data, $where);
        return $id;
    }

    function delete($id)
    {
        $where['id']             = $id;
        $where['is_delete']      = 0;

        $data['is_delete']       = 1;

        $data['delete_date']     = now();
        $data['id_user_delete']  = session_admin('id_user');
        $this->db->update($this->table, $data, $where);
        return $id;
    }

    function findBy($where, $is_single_row = 0)
    {
        $where['a.is_delete'] = 0;
        
        if ($is_single_row == 1) {
            return     $this->db->get_where($this->tableAs, $where)->row_array();
        } else {
            return     $this->db->get_where($this->tableAs, $where)->result_array();
        }
    } 
    
    function findById($id)
    {
        $where['a.id'] = $id;
        return     $this->findBy($where,1);
    }

}
