<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Casset extends CI_Controller {
	function __construct(){
		parent::__construct();
		//Meload Model yang digunakan Masset dan Mmasterasset
		$this->load->model('Mbengkelnew/Masset');
		$this->load->model('Mbengkelnew/Mmasterasset');
	}
	public function index(){
		//Meload Model Masset untuk mengambil semua data pada tabel dan memasukkan datanya kedalam array data
		$data['data']=$this->Masset->tampildata()->result();
		//Meload Model Mmasterasset untuk mengambil kode dan jenis asset untuk keperluan input dan memasuukkan datanya kedalam array master
		$data['master']=$this->Mmasterasset->tampildata()->result();
		//Meloda fungsi generate kode pada Model Masset dan memasukkannya kedalam array master
		$data['kodeasset']=$this->Masset->kodeasset();
		//meload view menu
		$this->load->view('navbar2');
		//meload view dengan membawa data dari array yang dibaut sebelumnya
		$this->load->view('Vbengkelnew/Vasset',$data);
		
	}
	public function simpandata(){
		$data['kode']=$this->input->post('kodeasset');
		$data['tgl_pembelian']=date('Y-m-d',strtotime($this->input->post('tglpembelian')));
		$data['merk']=$this->input->post('merk');
		$data['no_inventaris']=$this->input->post('noinventaris');
		$this->Masset->simpandata($data);
		redirect(site_url('Cbengkelnew/Casset'));
	}
	public function edit_data($id){
		$data['daftar']=$this->Masset->edit($id)->row();
		$this->load->view('Vbengkelnew/Vassetedit',$data);
		
	}	
	public function update(){
			$id=$this->input->post('id');
			$data['kode']=$this->input->post('kodeasset');
			$data['tgl_pembelian']=$this->input->post('tglpembelian');
			$data['merk']=$this->input->post('merk');
			$data['no_inventaris']=$this->input->post('noinventaris');
			$this->Masset->update($id, $data);
			redirect(site_url('Cbengkelnew/Casset'));
		}
	public function hapus($id){
		$this->Masset->delete($id);
		redirect(site_url('Cbengkelnew/Casset'));
	}
	
}
?>