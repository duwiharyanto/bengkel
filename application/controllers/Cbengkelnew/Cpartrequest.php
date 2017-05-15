<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Cpartrequest extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('Mbengkelnew/Mpartrequest');
		//$this->load->model('Mbengkelnew/Mmasterasset');
	}
	public function index(){
		$data['data']=$this->Mpartrequest->tampildata()->result();
		$this->load->view('navbar2');
		$this->load->view('Vbengkelnew/Vpartrequest',$data);
		
	}
	public function simpandata(){
		$kodepartreq=$this->input->post('kodepartreq');
		$kodewo=$this->input->post('kodewo');
		$tgl=date('Y-m-d',strtotime($this->input->post('tgl')));
		$kodepart=$this->input->post('kodepart');
		$qty=$this->input->post('qty');

		$count = count($_POST['kodepart']);
		$count=$count-1;
		for($i=0;$i<$count;$i++){
			$data[$i]=array(
					'kodepartreq' => $kodepartreq,
					'kodewo' => $kodewo,
					'tgl' => $tgl,
					'kodepart'=> $kodepart[$i],
					'qty'=> $qty[$i],
				);
		}
		$this->Mpartrequest->simpandata($data);
		redirect(site_url('Cbengkelnew/Cpartrequest'));
	}
	public function aktivasi($id,$st){
		if($st==0){
			$this->Mpartrequest->aktivasi($id,1);
		}else{
			$this->Mpartrequest->aktivasi($id,0);
		}
		redirect(site_url('Cbengkelnew/Cpartrequest'));
	}
	public function edit_data($id){
		$data['daftar']=$this->Mpartrequest->edit($id)->row();
		$this->load->view('Vbengkelnew/Vpartrequestedit',$data);
	}	
	public function update(){
			$id=$this->input->post('id');
			$data['kode']=$this->input->post('kodeasset');
			$data['nama']=$this->input->post('jeniskendaraan');
			$data['tgl_pembelian']=$this->input->post('tglpembelian');
			$data['merk']=$this->input->post('merk');
			$data['no_inventaris']=$this->input->post('noinventaris');
			$this->Mpartrequest->update($id, $data);
			redirect(site_url('Cbengkelnew/Cpartrequest'));
		}
	public function hapus($id){
		$this->Mpartrequest->delete($id);
		redirect(site_url('Cbengkelnew/Cpartrequest'));
	}
	public function vtambah(){
		$this->load->view('navbar2');
		$data['kodepartreq']=$this->Mpartrequest->kodepartreq();	
		$data['kodewo']=$this->Mpartrequest->getkodewo()->result();
		$data['kodepart']=$this->Mpartrequest->getkodepart()->result();
		$this->load->view('Vbengkelnew/Vtambahpartreq',$data);
	}
	
}
?>