<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Claporan extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model(array('Mbengkelnew/Mpartout','Mbengkelnew/Mpartrequest','Mbengkelnew/Mworkingout','Mbengkelnew/Masset','Mbengkelnew/Mpartorder'));
	}
	public function index(){
		$this->load->view('navbar2');
		$data['data']=$this->Mpartorder->tampildata()->result();
		$this->load->view('Vbengkelnew/Vlappartorder',$data);
	}
	public function partorder(){
		$this->load->view('navbar2');
		$data['data']=$this->Mpartorder->tampildata()->result();
		$this->load->view('Vbengkelnew/Vlappartorder',$data);
	}
	public function partout(){
		$data['data']=$this->Mpartout->tampildata()->result();
		$this->load->view('navbar2');
		$this->load->view('Vbengkelnew/Vlappartout',$data);
	}
	public function partreq(){
		$data['data']=$this->Mpartrequest->tampildata()->result();
		$this->load->view('navbar2');
		$this->load->view('Vbengkelnew/Vlappartreq',$data);
	}
	public function workingout(){
		$data['data']=$this->Mworkingout->tampildata()->result();
		$this->load->view('navbar2');
		$this->load->view('Vbengkelnew/Vlapworkingorder',$data);
	}		
}
?>