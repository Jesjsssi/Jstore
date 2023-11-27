<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class hal_utama extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('modelku');
	}

	public function index()
	{
		$this->load->view("form_login");
	}

	public function aksi_login()
	{
		$username = $this->input->post('username');
		$password = md5($this->input->post('password'));

		$dataPenunjuk = array(
			'username' => $username, //user
			'password' => $password //pass
		);

		$cek = count($this->modelku->getData_khusus("tb_user", $dataPenunjuk));//duser

		if($cek > 0){
			$data_session = array(
				'nama' => $username,
				'status' => "login"
			);
			$this->session->set_userdata($data_session);

			redirect(base_url()."index.php/hal_admin");
		}else{
			redirect(base_url());
		}

	}
	public function daftar(){
		$this->load->view("form_daftar");
	}

	public function aksi_daftar(){
		$dataInputan = array(
			'username' => $this->input->post('username'),
			'password' => md5($this->input->post('password'))
		);

		$this->modelku->masukkan('tb_user', $dataInputan);//duser
		redirect(base_url(), 'refresh');
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect(base_url());
	}

}
