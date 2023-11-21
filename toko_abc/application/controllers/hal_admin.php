<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class hal_admin extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->model('modelku');

        if($this->session->userdata('status') != "login")
        {
            redirect(base_url());
        }
    }

    public function index()
    {
        $dataABC = $this->modelku->getData("katalog_barang");

		$data = array(
			"dataMu" => $dataABC
		);

		$this->load->view("home", $data);
    }

    public function baca_form(){
		$this->load->view('form_tambah');
	}

    public function tambah_Data(){
		//$this->load->model('modelku');
		$dataInputan = array(
			'no' => $this->input->post('no'),
			'nama_barang' => $this->input->post('nama_barang'),
			'harga_barang' => $this->input->post('harga_barang'),
			'jumlah' => $this->input->post('jumlah')
		);

		$this->modelku->masukkan('katalog_barang', $dataInputan);
		redirect(base_url()."index.php/hal_admin/");
	}

    public function hapus_data($penunjuk){
		$dataPenunjuk = array(
			'no' => $penunjuk
		);
		//$this->load->model('modelku');
		$this->modelku->hapus('katalog_barang', $dataPenunjuk);
		redirect(base_url(). "index.php/hal_admin/");
	}

    public function ambil_DataWhere($penunjuk){
		$dataPenunjuk = array(
			'no' => $penunjuk
		);

		//$this->load->model('modelku');
		$dataABC = $this->modelku->getData_khusus("katalog_barang", $dataPenunjuk);
		$data = array(
			'dataMu' => $dataABC
		);

		$this->load->view("form_edit", $data);
	}

    public function update_data(){
		$dataInputan = array(
			'nama_barang' => $this->input->post('nama_barang'),
			'harga_barang' => $this->input->post('harga_barang'),
			'jumlah' => $this->input->post('jumlah')
		);

		$dataPenunjuk = array(
			'no' => $this->input->post('no')
		);

		//$this->load->model('modelku');
		$dataABC = $this->modelku->perbarui("katalog_barang", $dataInputan, $dataPenunjuk);
		redirect(base_url(). "index.php/hal_admin/");
	}

    public function form_daftarAPI(){
		$this->load->view('form_daftarAPI');
	}

    public function aksi_daftarAPI(){
		$dataInputan = array(
			'nama' => $this->input->post('nama'),
			'auth' => $this->input->post('kode')
		);
	
		$this->modelku->masukkan('user_api', $dataInputan);
		redirect(base_url()."index.php/hal_admin/");

	}

}
?>