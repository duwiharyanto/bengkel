<?php
	class Mmasterasset extends CI_Model{
		function __construct(){
			parent::__construct();
		}
		function simpandata($data){

			$this->db->insert('tb_masterasset', $data);
		}
		
		function tampildata(){
			//Mengambil data dari tabel masterasset 
			$this->db->select('*');
			$this->db->from('tb_masterasset');
			return $this->db->get();
		}
		function edit($id){
			$this->db->select('*');
			$this->db->from('tb_masterasset');
        	$this->db->where('id',$id);
        	return $this->db->get();
       		//$query = $this->db->get();
        	//return $query->row();
		}
		function update($id, $data){
			$this->db->where('id', $id);
			$this->db->update('tb_masterasset', $data);

		}
		function delete($id){
			$this->db->where('id', $id);
			$this->db->delete('tb_masterasset');
		}
		function kodeasset(){

		$this->db->select('RIGHT(tb_masterasset.no_inventaris,4) as kode', FALSE);
		$this->db->order_by('no_inventaris','DESC');
		$this->db->limit(1);
		$q = $this->db->get('tb_masterasset');
        if($q->num_rows() <> 0){ //jika data ada
           $data = $q->row();
           $kd = intval($data->kode) + 1;

        }else{ //jika data kosong diset ke kode awal
            $kd = 1;
        }
	    $kodemax = str_pad($kd, 4, "0", STR_PAD_LEFT);
		$th=date('Y');
		$kodejadi = "INV".$th.$kodemax;
        return $kodejadi;
		}
	}
?>