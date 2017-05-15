<?php
	class Muser extends CI_Model{
		function __construct(){
			parent::__construct();
		}
		function simpandata($data){
			$this->db->insert('tb_user', $data);
		}
		
		function tampildata(){
			$this->db->select('*');
			$this->db->from('tb_user');
			return $this->db->get();
		}
		function edit($id){
			$this->db->select('*');
			$this->db->from('tb_user');
        	$this->db->where('id',$id);
        	return $this->db->get();
       		//$query = $this->db->get();
        	//return $query->row();
		}
		function update($id, $data){
			$this->db->where('id', $id);
			$this->db->update('tb_user', $data);

		}
		function delete($id){
			$this->db->where('id', $id);
			$this->db->delete('tb_user');
		}
	}
?>