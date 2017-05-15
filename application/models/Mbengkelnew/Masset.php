<?php
	class Masset extends CI_Model{
		function __construct(){
			parent::__construct();
		}
		function simpandata($data){
			$this->db->insert('tb_asset', $data);
		}
		
		function tampildata(){
			/*
			$this->db->select('*');
			$this->db->from('tb_asset');
			return $this->db->get();
			*/
			$query=$this->db->query("SELECT
									tb_masterasset.kode,
									tb_masterasset.jenis as jenisasset,
									tb_asset.tgl_pembelian,
									tb_asset.merk,
									tb_asset.no_inventaris,
									tb_asset.idasset
									FROM
									tb_masterasset
									INNER JOIN tb_asset ON tb_asset.kode = tb_masterasset.kode
									");
			return $query;
		}
		function edit($idasset){
			/*
			$this->db->select('*');
			$this->db->from('tb_asset');
        	$this->db->where('idasset',$idasset);
        	return $this->db->get();
       		//$query = $this->db->get();
        	//return $query->row();
			*/
			$query=$this->db->query("SELECT
									tb_masterasset.kode as kode,
									tb_masterasset.jenis as jenisasset,
									tb_asset.tgl_pembelian,
									tb_asset.merk,
									tb_asset.no_inventaris,
									tb_asset.idasset
									FROM
									tb_masterasset
									INNER JOIN tb_asset ON tb_asset.kode = tb_masterasset.kode where tb_asset.idasset ='$idasset'
									");
			return $query;
		}
		function update($idasset, $data){
			$this->db->where('idasset', $idasset);
			$this->db->update('tb_asset', $data);

		}
		function delete($idasset){
			$this->db->where('idasset', $idasset);
			$this->db->delete('tb_asset');
		}
		function kodeasset(){
		$this->db->select('RIGHT(tb_asset.no_inventaris,4) as kode', FALSE);
		$this->db->order_by('no_inventaris','DESC');
		$this->db->limit(1);
		$q = $this->db->get('tb_asset');
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