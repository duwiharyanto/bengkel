<?php
class Cui extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('munite');
	}
	public function index(){
		echo('dwadwa');
	}

}
?>