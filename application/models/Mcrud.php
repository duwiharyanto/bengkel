<?php
	class Mcrud extends CI_Model{
		function __construct(){
			parent::__construct();
		}
		function simpandata($data){
			$this->db->insert('pendaftaran', $data);
		}
		function tampildata(){
			$this->db->select('*');
			$this->db->from('pendaftaran');
			return $this->db->get();
		}
		function edit($id){
			$this->db->select('*');
			$this->db->from('pendaftaran');
        	$this->db->where('id',$id);
        	return $this->db->get();
       		//$query = $this->db->get();
        	//return $query->row();
		}
		function update($id, $data){
			$this->db->where('id', $id);
			$this->db->update('pendaftaran', $data);

		}
		function delete($id){
			$this->db->where('id', $id);
			$this->db->delete('pendaftaran');
		}
	}
?>