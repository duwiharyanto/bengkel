<?php
	class Mpartorder extends CI_Model{
		function __construct(){
			parent::__construct();
		}
		function simpandata($data){
			$this->db->insert('tb_orderreq', $data);
		}
		function aktivasi($id,$st){
			$query=$this->db->query("UPDATE tb_orderreq SET status=$st where id='$id'");
			return $query;
		}
		
		function tampildata(){
			/*
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
									from (`tb_suplier` join `tb_part` on((`tb_part`.`kodesuplier` = `tb_suplier`.`kodesuplier`))) where stok<5
									');
			*/
			$query=$this->db->query("SELECT * from view_orderpart");
			return $query;
		}
		function orderid($id){
			$query=$this->db->query("SELECT
									tb_part.kodepart AS kodepart,
									tb_part.kategori AS kategori,
									tb_part.nama AS nama,
									tb_part.stok AS stok,
									tb_part.harga AS harga,
									tb_suplier.nama AS suplier,
									tb_suplier.alamat AS alamat,
									tb_suplier.nomortlp AS nomortlp,
									tb_suplier.pic AS pic,
									tb_part.id AS idpart
									from (`tb_suplier` join `tb_part` on((`tb_part`.`kodesuplier` = `tb_suplier`.`kodesuplier`))) where tb_part.id='$id'
									");
			return $query;
		}
		/*
		function edit($idasset){
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
		*/
		function kodeorder(){
		//mengambil data kolom kodeorderreq dari kanan ke kiri sebanyak 4 baris
		$this->db->select('RIGHT(tb_orderreq.kodeorderreq,4) as kode', FALSE);
		$this->db->order_by('kodeorderreq','DESC');
		$this->db->limit(1);
		$q = $this->db->get('tb_orderreq');
        if($q->num_rows() <> 0){ //jika data ada
           $data = $q->row();
           $kd = intval($data->kode) + 1;

        }else{ //jika data kosong diset ke kode awal
            $kd = 1;
        }
	    $kodemax = str_pad($kd, 4, "0", STR_PAD_LEFT);
		$th=date('d');
		$kodejadi = "ORD"."/".$th."/".$kodemax;
        return $kodejadi;
		}
	
	}
?>