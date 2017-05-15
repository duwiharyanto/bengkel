<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cuser extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('Mbengkelnew/Muser');
	}
	public function index(){
		$data['data']=$this->Muser->tampildata()->result();
		$this->load->view('navbar2');
		$this->load->view('Vbengkelnew/Vuser',$data);
		
	}
	public function simpandata(){
		$data['username']=$this->input->post('username');
		$data['password']=md5($this->input->post('password'));
		$data['level']=$this->input->post('level');
		$this->Muser->simpandata($data);
		redirect(site_url('Cbengkelnew/Cuser'));
	}
	public function edit_data($id){
		$data['daftar']=$this->Muser->edit($id)->row();
		//echo json_encode($data);
		$this->load->view('Vbengkelnew/Vuseredit',$data);
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
			$this->Muser->update($id, $data);
			redirect(site_url('Cbengkelnew/Cuser'));
		}
	public function hapus($id){
		$this->Muser->delete($id);
		redirect(site_url('Cbengkelnew/Cuser'));
	}
	
}
?>