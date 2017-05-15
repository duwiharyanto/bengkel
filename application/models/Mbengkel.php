<?php
	class Mbengkel extends CI_Model{
		function __construct(){
			parent::__construct();
		}
		function simpandata($data){
			$this->db->insert('tb_sparepart', $data);
		}
		
		function tampildata(){
			$this->db->select('*');
			$this->db->from('tb_sparepart');
			return $this->db->get();
		}
		function edit($id){
			$this->db->select('*');
			$this->db->from('tb_sparepart');
        	$this->db->where('ID',$id);
        	return $this->db->get();
       		//$query = $this->db->get();
        	//return $query->row();
		}
		function update($id, $data){
			$this->db->where('ID', $id);
			$this->db->update('tb_sparepart', $data);

		}
		function delete($id){
			$this->db->where('ID', $id);
			$this->db->delete('tb_sparepart');
		}
		
	}
?>