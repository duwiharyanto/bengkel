<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cpartorder extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('Mbengkelnew/Mpartorder');
		$this->load->model('Mbengkelnew/Masset');
	}
	public function index(){
		$data['data']=$this->Mpartorder->tampildata()->result();
		$this->load->view('navbar2');
		$this->load->view('Vbengkelnew/Vpartorder',$data);
		
	}
	public function partorder($id){
		$data['orderid']=$this->Mpartorder->orderid($id)->row();
		$data['kodeorderreg']=$this->Mpartorder->kodeorder();
		$this->load->view('navbar2');
		$this->load->view('Vbengkelnew/Vinputpartorder',$data);
	}
	public function simpandata(){
		$data['kodeorderreq']=$this->input->post('noorder');
		$data['kodepart']=$this->input->post('kodepart');
		$data['tglorder']=$this->input->post('tgl');
		$data['estimasi']=$this->input->post('estimasi');
		$data['qty']=$this->input->post('qty');
		//$data['th_inventaris']=$this->input->post('thinventaris');
		$this->Mpartorder->simpandata($data);
		//echo $data['tgl'];
		redirect(site_url('Cbengkelnew/Cpartorder'));
	}
	function aktivasi($id,$st){
		if($st==0){
			$st=1;
			$this->Mpartorder->aktivasi($id,$st);
		}else{
			$st=0;
			$this->Mpartorder->aktivasi($id,$st);
		}
		//echo $st;
		redirect(site_url('Cbengkelnew/Cpartorder'));
	}
	//UNKNOWN
	public function edit_data($id){
		$data['daftar']=$this->Mpartorder->edit($id)->row();
		//echo json_encode($data);
		$this->load->view('Vbengkelnew/Vpartorderedit',$data);
	}	
	public function update(){
			$id=$this->input->post('id');
			$data['kodewo']=$this->input->post('kodeasset');
			$data['nama']=$this->input->post('jeniskendaraan');
			$data['tgl_pembelian']=$this->input->post('tglpembelian');
			$data['merk']=$this->input->post('merk');
			$data['no_inventaris']=$this->input->post('noinventaris');
			//$data['th_inventaris']=$this->input->post('thinventaris');
			//echo $nama;
			$this->Mpartorder->update($id, $data);
			redirect(site_url('Cbengkelnew/Cpartorder'));
		}
	public function hapus($id){
		$this->Mpartorder->delete($id);
		redirect(site_url('Cbengkelnew/Cpartorder'));
	}
	public function kode(){
		$table="tb_wo";
		 $dt = $this->Mpartorder->kode(); 
		echo $dt;
	}
	function vtambah(){
		$data['asset']=$this->Mpartorder->getnamaasset()->result();
		$data['kode']=$this->Mpartorder->kode();
		$this->load->view('navbar2');
		$this->load->view('Vbengkelnew/Vtambahworkingout',$data);
	}
}
?>