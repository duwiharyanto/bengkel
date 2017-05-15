<?php
	class Mpartout extends CI_Model{
		function __construct(){
			parent::__construct();
		}
		function simpandata($data){
			//$this->db->insert('tb_partreq', $data);
			$this->db->insert_batch('tb_partreq', $data);
		}
		function aktivasi($id,$st){
			$query=$this->db->query("UPDATE tb_partreq SET status=$st WHERE id='$id'");
			return $query;
		}	
		function tampildata(){
			$query=$this->db->query("SELECT * FROM v_partout WHERE status=1");
			return $query;
		}
	}
?>