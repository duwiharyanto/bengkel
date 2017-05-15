<?php
class Cchart extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('munite');
	}
	public function index(){
		$this->load->view('chart/chart');
	}

}
?>