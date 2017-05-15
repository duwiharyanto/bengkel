<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cworkingout extends CI_Controller {
	function __construct(){
		parent::__construct();
		//$this->load->model('Mbengkelnew/Mworkingout');
		//$this->load->model('Mbengkelnew/Masset');
		$this->load->model(array('Mbengkelnew/Mworkingout','Mbengkelnew/Masset','Mbengkelnew/Mdivisi'));
	}
	public function index(){
		$data['data']=$this->Mworkingout->tampildata()->result();
		//$data['asset']=$this->Masset->tampildata()->result();
		$data['asset']=$this->Mworkingout->getnamaasset()->result();
		$data['kode']=$this->Mworkingout->kode();
		$this->load->view('navbar2');
		$this->load->view('Vbengkelnew/Vworkingout',$data);
	}
	public function simpandata(){
		$data['kodewo']=$this->Mworkingout->kode();
		$data['tgl']=date('Y-m-d',strtotime($this->input->post('tgl')));
		$data['kepada']=$this->input->post('kepada');
		$data['iddiv']=$this->input->post('dari');
		$data['hal']=$this->input->post('hal');
		$data['des']=$this->input->post('des');
		$data['number']=$this->input->post('number');
		$data['masalah']=$this->input->post('masalah');
		$data['proses']=$this->input->post('proses');
		$data['keterangan']=$this->input->post('keterangan');
		$data['target']=date('Y-m-d',strtotime($this->input->post('target')));
		$data['finish']=date('Y-m-d',strtotime($this->input->post('finish')));
		$data['idasset']=$this->input->post('idasset');
		//$data['th_inventaris']=$this->input->post('thinventaris');
		$this->Mworkingout->simpandata($data);
		//echo $data['tgl'];
		redirect(site_url('Cbengkelnew/Cworkingout'));
	}
	public function edit_data($id){
		$data['daftar']=$this->Mworkingout->edit($id)->row();
		//echo json_encode($data);
		$this->load->view('Vbengkelnew/Vworkingoutedit',$data);
	}	
	public function update(){
			$id=$this->input->post('idwo');
			$data['kodewo']=$this->Mworkingout->kode();
			$data['tgl']=date('Y-m-d',strtotime($this->input->post('tgl')));
			$data['kepada']=$this->input->post('kepada');
			$data['iddiv']=$this->input->post('dari');
			$data['hal']=$this->input->post('hal');
			$data['des']=$this->input->post('des');
			$data['number']=$this->input->post('number');
			$data['masalah']=$this->input->post('masalah');
			$data['proses']=$this->input->post('proses');
			$data['keterangan']=$this->input->post('keterangan');
			$data['target']=date('Y-m-d',strtotime($this->input->post('target')));
			$data['finish']=date('Y-m-d',strtotime($this->input->post('finish')));
			$data['idasset']=$this->input->post('idasset');
			$this->Mworkingout->update($id, $data);
			redirect(site_url('Cbengkelnew/Cworkingout'));
		}
	public function hapus($id){
		$this->Mworkingout->delete($id);
		redirect(site_url('Cbengkelnew/Cworkingout'));
	}
	public function kode(){
		$table="tb_wo";
		$dt = $this->Mworkingout->kode(); 
		echo $dt;
	}
	public function vtambah(){
		$data['divisi']=$this->Mdivisi->tampildata()->result();
		$data['asset']=$this->Mworkingout->getnamaasset()->result();
		$data['kode']=$this->Mworkingout->kode();
		$this->load->view('navbar2');
		$this->load->view('Vbengkelnew/Vtambahworkingout',$data);
	}
	public function edit($id){
		$data['dt']=$this->Mworkingout->edit($id)->row();
		$data['divisi']=$this->Mdivisi->tampildata()->result();
		$data['asset']=$this->Mworkingout->getnamaasset()->result();
		$data['kode']=$this->Mworkingout->kode();		
		$this->load->view('navbar2');
		$this->load->view('Vbengkelnew/Veditwo',$data);

	}
}
?>