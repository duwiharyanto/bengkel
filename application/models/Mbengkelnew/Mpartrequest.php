<?php
	class Mpartrequest extends CI_Model{
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
			$this->db->select('*');
			$this->db->from('tb_partreq');
			return $this->db->get();
			/*
			$query=$this->db->query('SELECT
									tb_masterasset.kode,
									tb_masterasset.jenis as jenisasset,
									tb_partreq.tgl_pembelian,
									tb_partreq.merk,
									tb_partreq.no_inventaris,
									tb_partreq.idasset
									FROM
									tb_masterasset
									INNER JOIN tb_partreq ON tb_partreq.kode = tb_masterasset.kode
									');
			return $query;
			*/
		}
		function edit($idasset){
			$this->db->select('*');
			$this->db->from('tb_partreq');
        	$this->db->where('id',$idasset);
        	return $this->db->get();
       		//$query = $this->db->get();
        	//return $query->row();
		}
		function update($idasset, $data){
			$this->db->where('id', $idasset);
			$this->db->update('tb_partreq', $data);

		}
		function delete($idasset){
			$this->db->where('id', $idasset);
			$this->db->delete('tb_partreq');
		}
		function kodepartreq(){
		$this->db->select('RIGHT(tb_partreq.kodepartreq,4) as kode', FALSE);
		$this->db->order_by('kodepartreq','DESC');
		$this->db->limit(1);
		$q = $this->db->get('tb_partreq');
        if($q->num_rows() <> 0){ //jika data ada
           $data = $q->row();
           $kd = intval($data->kode) + 1;

        }else{ //jika data kosong diset ke kode awal
            $kd = 1;
        }
	    $kodemax = str_pad($kd, 4, "0", STR_PAD_LEFT);
		//$th=date('Y');
		$kodejadi = "RE".$kodemax;
        return $kodejadi;
		}
		function getkodewo(){
		$query=$this->db->query('SELECT
									tb_wo.kodewo,
									tb_wo.tgl,
									tb_masterasset.jenis as jenis
									FROM
									tb_wo
									INNER JOIN tb_asset ON tb_wo.idasset = tb_asset.no_inventaris
									INNER JOIN tb_masterasset ON tb_asset.kode = tb_masterasset.kode ');
		return $query;
		}
		function getkodepart(){
		$query=$this->db->query('SELECT
									tb_part.kodepart,
									tb_part.nama
									FROM
									tb_part
									');
		return $query;
		}
	}
?>