<?php
	class Msuplier extends CI_Model{
		function __construct(){
			parent::__construct();
		}
		function simpandata($data){
			$this->db->insert('tb_suplier', $data);
		}
		
		function tampildata(){
			
			$this->db->select('*');
			$this->db->from('tb_suplier');
			return $this->db->get();
			/*
			$query=$this->db->query('SELECT
									tb_masterasset.kode,
									tb_masterasset.jenis as jenisasset,
									tb_suplier.tgl_pembelian,
									tb_suplier.merk,
									tb_suplier.no_inventaris,
									tb_suplier.id
									FROM
									tb_masterasset
									INNER JOIN tb_suplier ON tb_suplier.kode = tb_masterasset.kode
									');
			return $query;
			*/
		}
		function edit($id){
			$this->db->select('*');
			$this->db->from('tb_suplier');
        	$this->db->where('id',$id);
        	return $this->db->get();
       		//$query = $this->db->get();
        	//return $query->row();
		}
		function update($id, $data){
			$this->db->where('id', $id);
			$this->db->update('tb_suplier', $data);

		}
		function delete($id){
			$this->db->where('id', $id);
			$this->db->delete('tb_suplier');
		}
		function kodeasset(){
		$this->db->select('RIGHT(tb_suplier.kodesuplier,4) as kode', FALSE);
		$this->db->order_by('kodesuplier','DESC');
		$this->db->limit(1);
		$q = $this->db->get('tb_suplier');
        if($q->num_rows() <> 0){ //jika data ada
           $data = $q->row();
           $kd = intval($data->kode) + 1;

        }else{ //jika data kosong diset ke kode awal
            $kd = 1;
        }
	    $kodemax = str_pad($kd, 4, "0", STR_PAD_LEFT);
		//$th=date('Y');
		$kodejadi = "SUP".$kodemax;
        return $kodejadi;
		}
	}
?>