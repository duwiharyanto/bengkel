<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cdashboard extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('Mbengkelnew/Mdashboard');
	}

	public function index(){
		//Meload data dari database
		$data['data']=$this->Mdashboard->dworkingout()->result();
		//Meload view navbar/menu
		$this->load->view('navbar2');
		//Meload view content
		$this->load->view('Vbengkelnew/Vdashboard',$data);
	}
}
?>