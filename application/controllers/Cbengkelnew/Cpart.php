<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cpart extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('Mbengkelnew/Mpart');
		$this->load->model('Mbengkelnew/Mmasterasset');
	}
	public function index(){
		$data['data']=$this->Mpart->tampildata()->result();
		$data['master']=$this->Mmasterasset->tampildata()->result();
		$data['kodeasset']=$this->Mpart->kodeasset();
		$this->load->view('navbar2');
		$this->load->view('Vbengkelnew/Vpart',$data);
		
	}
	public function simpandata(){
		$data['kode']=$this->input->post('kodeasset');
		$data['tgl_pembelian']=date('Y-m-d',strtotime($this->input->post('tglpembelian')));
		$data['merk']=$this->input->post('merk');
		$data['no_inventaris']=$this->input->post('noinventaris');
		//$data['th_inventaris']=$this->input->post('thinventaris');
		$this->Mpart->simpandata($data);
		redirect(site_url('Cbengkelnew/Cpart'));
	}
	public function edit_data($id){
		$data['daftar']=$this->Mpart->edit($id)->row();
		//echo json_encode($data);
		$this->load->view('Vbengkelnew/Vassetedit',$data);
	}	
	public function update(){
			$id=$this->input->post('id');
			$data['kode']=$this->input->post('kodeasset');
			$data['nama']=$this->input->post('jeniskendaraan');
			$data['tgl_pembelian']=$this->input->post('tglpembelian');
			$data['merk']=$this->input->post('merk');
			$data['no_inventaris']=$this->input->post('noinventaris');
			//$data['th_inventaris']=$this->input->post('thinventaris');
			//echo $nama;
			$this->Mpart->update($id, $data);
			redirect(site_url('Cbengkelnew/Cpart'));
		}
	public function hapus($id){
		$this->Mpart->delete($id);
		redirect(site_url('Cbengkelnew/Cpart'));
	}
	
}
?>