<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cbengkel extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('Mbengkel');
	}
	public function index(){
		$data['data']=$this->Mbengkel->tampildata()->result();
		$this->load->view('navbar');
		$this->load->view('bengkel/Vbengkel',$data);
		
	}
	public function simpandata(){
		$data['KODE']=$this->input->post('kode');
		$data['NAMA']=$this->input->post('nama');
		$this->Mbengkel->simpandata($data);
		redirect(site_url('Cbengkel'));
	}
	public function edit_data($id){
		$data['daftar']=$this->Mbengkel->edit($id)->row();
		//echo json_encode($data);
		$this->load->view('bengkel/Vmodal_edit',$data);
	}
	public function update(){
			$id=$this->input->post('id');
			$data['KODE']=$this->input->post('kode');
			$data['NAMA']=$this->input->post('nama');
			//echo $nama;
			$this->Mbengkel->update($id, $data);
			redirect(site_url('Cbengkel'));
		}
	public function hapus($id){
		$this->Mbengkel->delete($id);
		redirect(site_url('Cbengkel'));
	}
	
}
?>