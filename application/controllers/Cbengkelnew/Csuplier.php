<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Csuplier extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('Mbengkelnew/Msuplier');
		//$this->load->model('Mbengkelnew/Mmasterasset');
	}
	public function index(){
		$data['data']=$this->Msuplier->tampildata()->result();
		//$data['master']=$this->Mmasterasset->tampildata()->result();
		$data['kodesuplier']=$this->Msuplier->kodeasset();
		$this->load->view('navbar2');
		$this->load->view('Vbengkelnew/Vsuplier',$data);
		
	}
	public function simpandata(){
		$data['kodesuplier']=$this->input->post('kodesuplier');
		$data['nama']=$this->input->post('nama');
		$data['alamat']=$this->input->post('alamat');
		$data['nomortlp']=$this->input->post('nomortlp');
		$data['email']=$this->input->post('email');
		$data['pic']=$this->input->post('pic');
		$this->Msuplier->simpandata($data);
		redirect(site_url('Cbengkelnew/Csuplier'));
	}
	public function edit_data($id){
		$data['daftar']=$this->Msuplier->edit($id)->row();
		//echo json_encode($data);
		$this->load->view('Vbengkelnew/Vsuplieredit',$data);
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
			$this->Msuplier->update($id, $data);
			redirect(site_url('Cbengkelnew/Csuplier'));
		}
	public function hapus($id){
		$this->Msuplier->delete($id);
		redirect(site_url('Cbengkelnew/Csuplier'));
	}
	
}
?>