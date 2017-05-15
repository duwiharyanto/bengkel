<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cmasterasset extends CI_Controller {
	function __construct(){
		parent::__construct();
		//meload model
		$this->load->model('Mbengkelnew/Mmasterasset');
	}
	//fungsi index yang diakses pertama kali menampilkan data asset
	public function index(){
		//meload model untuk mengambildata dari database
		$data['data']=$this->Mmasterasset->tampildata()->result();
		//meload view menu
		$this->load->view('navbar2');
		//meload content menu
		$this->load->view('Vbengkelnew/Vmasterasset',$data);
		
	}
	public function simpandata(){
		//menyimpan data inputan
		$data['kode']=$this->input->post('kode'); 
		$data['jenis']=$this->input->post('jenis');
		//meload fungsi simpan data pada model 
		$this->Mmasterasset->simpandata($data);
		//membelokkan tampilan
		redirect(site_url('Cbengkelnew/Cmasterasset'));
	}
	public function edit_data($id){
		//meload fungsi edit data dari model, dan menyimpannya dalam array,
		$data['daftar']=$this->Mmasterasset->edit($id)->row();
		//echo json_encode($data);
		//meload view edit data
		$this->load->view('Vbengkelnew/Vmasterassetedit',$data);
	}	
	public function update(){
			//menangkap inputan dari form edit
			$id=$this->input->post('id');
			$data['kode']=$this->input->post('kode');
			$data['jenis']=$this->input->post('jenis');
			//mengamil fungsi update untuk menyimpan update
			$this->Mmasterasset->update($id, $data);
			redirect(site_url('Cbengkelnew/Cmasterasset'));
		}
	public function hapus($id){
		$this->Mmasterasset->delete($id);
		redirect(site_url('Cbengkelnew/Cmasterasset'));
	}
	public function kode(){
			//$table="tb_wo";
		$dt = $this->Mmasterasset->kode(); 
		echo $dt;
	}
	
}
?>