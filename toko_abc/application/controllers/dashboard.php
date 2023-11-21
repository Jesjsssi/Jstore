<?php

class dashboard extends CI_Controller {
    
    public function index()
    {
        $data['barang'] = $this->model_barang->tampil_data()->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('home', $data);
        $this->load->view('templates/footer');

    }

    public function tambah_ke_keranjang($no)
    {
        $data = $this->model_barang->find($no);

        $data = array(
            'id' => $data->no,
            'qty' => 1,
            'price' => $data->harga_barang,
            'name' => $data->nama_barang
        );

        $this->cart->insert($data);
        redirect('hal_admin');
    }

    public function detail_keranjang()
    {
        $this->load->view('keranjang');
    }

    public function hapus_keranjang()
    {
        $this->cart->destroy();
        redirect('hal_admin');
    }

    public function pembayaran()
    {
        $this->load->view('pembayaran');
    }

    public function proses_pesanan()
    {
        $is_processed = $this->model_invoice->index();
        if($is_processed)
        {
            $this->cart->destroy();
            $this->load->view('proses_pesanan');
        }
        else
        {
            echo "Pesanan Anda Gagal Diproses.";
        }
        
    }
}

?>