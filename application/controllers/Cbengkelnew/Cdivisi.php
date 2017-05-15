<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cdivisi extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('Mbengkelnew/Mdivisi');
	}
	public function index(){
		$data['data']=$this->Mdivisi->tampildata()->result();
		$this->load->view('navbar2');
		$this->load->view('Vbengkelnew/Vdivisi',$data);
		//$this->load->view('footer');
		
	}
	public function simpandata(){
		$data['kode']=$this->input->post('kode');
		$data['nama']=$this->input->post('nama');
		$this->Mdivisi->simpandata($data);
		redirect(site_url('Cbengkelnew/Cdivisi'));
	}
	public function edit_data($id){
		$data['data']=$this->Mdivisi->edit($id)->row();
		//echo json_encode($data);
		$this->load->view('Vbengkelnew/Veditdivisi',$data);
	}	
	public function update(){
			$id=$this->input->post('id');
			$data['kode']=$this->input->post('kode');
			$data['nama']=$this->input->post('nama');
			$this->Mdivisi->update($id, $data);
			redirect(site_url('Cbengkelnew/Cdivisi'));
		}
	public function hapus($id){
		$this->Mdivisi->delete($id);
		redirect(site_url('Cbengkelnew/Cdivisi'));
	}
	
}
?>