<?php
	class Mpart extends CI_Model{
		function __construct(){
			parent::__construct();
		}
		function simpandata($data){
			$this->db->insert('tb_part', $data);
		}
		
		function tampildata(){
			/*
			$this->db->select('*');
			$this->db->from('tb_part');
			return $this->db->get();
			*/
			$query=$this->db->query('SELECT
									tb_part.kodepart AS kodepart,
									tb_part.kategori AS kategori,
									tb_part.nama AS nama,
									tb_part.stok AS stok,
									tb_part.harga AS harga,
									tb_suplier.nama AS `suplier`,
									tb_suplier.alamat AS alamat,
									tb_suplier.nomortlp AS nomortlp,
									tb_suplier.pic AS pic,
									tb_part.id
									from (`tb_suplier` join `tb_part` on((`tb_part`.`kodesuplier` = `tb_suplier`.`kodesuplier`)))
									');
			return $query;
		}
		function edit($idasset){
			$this->db->select('*');
			$this->db->from('tb_part');
        	$this->db->where('idasset',$idasset);
        	return $this->db->get();
       		//$query = $this->db->get();
        	//return $query->row();
		}
		function update($idasset, $data){
			$this->db->where('idasset', $idasset);
			$this->db->update('tb_part', $data);

		}
		function delete($idasset){
			$this->db->where('idasset', $idasset);
			$this->db->delete('tb_part');
		}
		function kodeasset(){
		$this->db->select('RIGHT(tb_part.kodepart,4) as kode', FALSE);
		$this->db->order_by('kodepart','DESC');
		$this->db->limit(1);
		$q = $this->db->get('tb_part');
        if($q->num_rows() <> 0){ //jika data ada
           $data = $q->row();
           $kd = intval($data->kode) + 1;

        }else{ //jika data kosong diset ke kode awal
            $kd = 1;
        }
	    $kodemax = str_pad($kd, 4, "0", STR_PAD_LEFT);
		$kodejadi = "INV".$kodemax;
        return $kodejadi;
		}
	}
?>