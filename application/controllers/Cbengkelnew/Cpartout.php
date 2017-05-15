<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cpartout extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('Mbengkelnew/Mpartout');
		//$this->load->model('Mbengkelnew/Mmasterasset');
	}
	public function index(){
		$data['data']=$this->Mpartout->tampildata()->result();
		//$data['master']=$this->Mmasterasset->tampildata()->result();
		$this->load->view('navbar2');
		$this->load->view('Vbengkelnew/Vpartout',$data);
		
	}
}
?>