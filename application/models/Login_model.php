<?php
class Login_model extends CI_Model{
    function auth_admin($username,$password){
        $query=$this->db->query("SELECT * FROM admin WHERE username='$username' AND password=MD5('$password') LIMIT 1");
        return $query;
    }

    function auth_user($username,$password){
        //$this->db->select('*');
        //$this->db->join('tbl_user','user.id_unit=tbl_unit.id_unit','left');
        //$this->db->where('username',$username);
        //$this->db->where('password',MD5($password));
        //$this->db->limit(1);
        //$query = $this->db->get('tbl_user'); 
        $query=$this->db->query("SELECT * FROM tbl_user LEFT JOIN tbl_unit ON `tbl_user`.id_unit = tbl_unit.id_unit WHERE username='$username' AND password=MD5('$password') LIMIT 1");
        return $query;
    }
}