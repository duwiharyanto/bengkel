<?php
	class Clogin extends CI_Controller
	{	
		function __construct(){
			parent::__construct();
			$this->load->model('Mlogin');
		}
		//fungsi form untuk login, meload view login.php
		function index(){
			$this->load->view('login');
		}
		//fungsi aksi proses login
		function aksi_login(){
			//menyimpan variabel inputan
			$username=$this->input->post('username');
			$password=md5($this->input->post('password'));
			//mengambil data dari database yang sama dengan username dan passowrd
			$cek=$this->Mlogin->cek($username,$password);
			//jika data ada berati = 1
			if($cek->num_rows() == 1 ){
				//mengambil data yang sesuai dengan inputan dengan perulangan
				foreach($cek->result() as $data){
					$sess_data['id']=$data->id;
					//$sess_data['unit']=$data->unit;
					$sess_data['username']=$data->username;
					$sess_data['status']="login";
					$sess_data['level']=$data->level;
					//memasukkan data kedalam session
					$this->session->set_userdata($sess_data);
				}
				//$this->session->set_userdata($data_session);
				//membelokkan ke view dashboard, (login sukses)
				redirect(base_url("index.php/Cbengkelnew/Cdashboard"));
			}else{
				//membelokkan ke halaman login, jika login salah
				//echo "username dan password salah";
				//echo $password;
				redirect(base_url('index.php/clogin'));
			}
		}
		//fungsi untuk logout, dengan menghapus data session
		function logout(){
			$this->session->sess_destroy();
			redirect(base_url('index.php/Clogin'));
		}	
	
	}
?>