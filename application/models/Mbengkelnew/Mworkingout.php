<?php
	class Mworkingout extends CI_Model{
		function __construct(){
			parent::__construct();
		}
		function simpandata($data){
			$this->db->insert('tb_wo', $data);
		}
		
		function tampildata(){
			/*
			$this->db->select('*');
			$this->db->from('tb_wo');
			return $this->db->get();
			*/
			$query=$this->db->query('SELECT
									tb_divisi.nama as divisi,
									tb_wo.idwo,
									tb_wo.kodewo,
									tb_wo.tgl,
									tb_wo.kepada,
									tb_wo.iddiv,
									tb_wo.hal,
									tb_wo.des,
									tb_wo.masalah,
									tb_wo.penyebab,
									tb_wo.proses,
									tb_wo.keterangan,
									tb_wo.target,
									tb_wo.finish,
									tb_asset.no_inventaris
									FROM
									tb_divisi
									INNER JOIN tb_wo ON tb_wo.iddiv = tb_divisi.id
									INNER JOIN tb_asset ON tb_wo.idasset = tb_asset.no_inventaris');
			return $query;
		}
		function edit($idwo){
			//$this->db->select('*');
			//$this->db->from('tb_wo');
        	//$this->db->where('idwo',$idwo);
        	$query=$this->db->query("SELECT
									tb_divisi.nama AS divisi,
									tb_wo.kodewo,
									tb_wo.tgl,
									tb_wo.kepada,
									tb_wo.iddiv,
									tb_wo.hal,
									tb_wo.des,
									tb_wo.masalah,
									tb_wo.penyebab,
									tb_wo.proses,
									tb_wo.keterangan,
									tb_wo.target,
									tb_wo.finish,
									tb_asset.no_inventaris,
									tb_wo.idwo
									FROM
									tb_divisi
									INNER JOIN tb_wo ON tb_wo.iddiv = tb_divisi.id
									INNER JOIN tb_asset ON tb_wo.idasset = tb_asset.no_inventaris
									INNER JOIN tb_masterasset ON tb_asset.kode = tb_masterasset.kode
									WHERE
									tb_wo.idwo ='$idwo'
									");
        	return $query;
        	//return $this->db->get();
       		//$query = $this->db->get();
        	//return $query->row();
		}
		function update($idwo, $data){
			$this->db->where('idwo', $idwo);
			$this->db->update('tb_wo', $data);

		}
		function delete($idwo){
			$this->db->where('idwo', $idwo);
			$this->db->delete('tb_wo');
		}
		function kode(){
		$this->db->select('RIGHT(tb_wo.kodewo,4) as kode', FALSE);
		$this->db->order_by('kodewo','DESC');
		$this->db->limit(1);
		$q = $this->db->get('tb_wo');
        if($q->num_rows() <> 0){ //jika data ada
           $data = $q->row();
           $kd = intval($data->kode) + 1;

        }else{ //jika data kosong diset ke kode awal
            $kd = 1;
        }
	    $kodemax = str_pad($kd, 4, "0", STR_PAD_LEFT);
		$kodejadi = "BB".$kodemax;
        return $kodejadi;
		}
		function getnamaasset(){
			$query=$this->db->query('SELECT
									tb_masterasset.kode,
									tb_masterasset.jenis as "jenis",
									tb_asset.tgl_pembelian,
									tb_asset.merk,
									tb_asset.no_inventaris as "no_inventaris",
									tb_asset.idasset 
									FROM
									tb_masterasset
									INNER JOIN tb_asset ON tb_asset.kode = tb_masterasset.kode ');
			return $query;
		}
		
	}
?>