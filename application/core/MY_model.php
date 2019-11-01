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
    function records($where = array(), $isTotal = 0)
    {
        // $alias['search_name']             = 'a.name';

        // query_grid($alias, $isTotal);
        $this->db->select("a.*");
        $this->db->where('a.is_delete', 0);
        $query = $this->db->get_where($this->tableAs, $where);

        if ($isTotal == 0) {
            $data = $query->result_array();
        } else {
            return $query->num_rows();
        }

        $ttl_row = $this->records($where, 1);

        return ddi_grid($data, $ttl_row);
    }

    function insert($data)
    {
        $data['create_date']     = now();
        $data['user_id_create']  = sess_admin('id_user');
        $this->db->insert($this->table, array_filter($data));
        return $this->db->insert_id();
    }

    function update($data, $id)
    {
        $where['id']             = $id;
        
        $data['modify_date']     = now();
        $data['user_id_modify']  = sess_admin('id_user');
        $this->db->update($this->table, $data, $where);
        return $id;
    }

    function delete($id)
    {
        $where['id']             = $id;
        $data['is_delete']       = 1;

        $data['delete_date']     = now();
        $data['user_id_delete']  = sess_admin('id_user');
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
