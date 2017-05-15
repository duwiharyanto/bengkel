<?php
	class Mdashboard extends CI_Model{
		function __construct(){
			parent::__construct();
		}
	
		
		function dworkingout(){
			$query=$this->db->query('SELECT
									tb_wo.kodewo,
									tb_wo.tgl,
									tb_wo.masalah,
									tb_wo.penyebab
									FROM
									tb_wo
									LIMIT 0, 4');
			return $query;
		}
	}
?>