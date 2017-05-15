<?php
	/**
	* 
	*/
	class Mlogin extends CI_Model
	{
		
		function __construct(){
			parent::__construct();
		}
		/*
		function cek_login($table,$where){
			return $this->db->get_where($table,$where);
			//return $this->db->query('select * from admin');
		}
		function cek_kolom($kolom,$where){
			$this->db->select('nama');
			$this->db->from('admin');
			$this->db->where($where);
			return $this->db->get();
		}
		*/
		function cek($username,$password){
			$this->db->where('username',$username);
			$this->db->where('password',$password);
			return $this->db->get('tb_user');
		}

	}
?>