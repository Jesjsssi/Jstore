<?php

class data_barang extends CI_Controller{
    public function index()
    {
        $data['barang'] = $this->model_barang->tampil_data()->result();
        $this->load->view('admin/barang', $data);
    }

    public function tambah_aksi()
    {
        $nama_barang = $this->input->post('nama_barang');
        $harga_barang = $this->input->post('harga_barang');
        $jumlah = $this->input->post('jumlah');

        $data = array(
            'nama_barang' => $nama_barang,
            'harga_barang' => $harga_barang,
            'jumlah' => $jumlah
        );

        $this->model_barang->tambah_barang($data, 'katalog_barang');
        redirect('admin/data_barang/index');
    }

    public function edit($no)
    {
        $where = array('no' => $no);
        $data['barang'] = $this->model_barang->edit_barang($where, 'katalog_barang')->result();
        $this->load->view('admin/edit_barang', $data);
    }

    public function update()
    {
        $no = $this->input->post('no');
        $nama_barang = $this->input->post('nama_barang');
        $harga_barang = $this->input->post('harga_barang');
        $jumlah = $this->input->post('jumlah');

        $data = array(
            'nama_barang' => $nama_barang,
            'harga_barang' => $harga_barang,
            'jumlah' => $jumlah
        );

        $where = array(
            'no' => $no
        );

        $this->model_barang->update_data($where, $data, 'katalog_barang');
        redirect('admin/data_barang/index');
    }

    public function hapus($no)
    {
        $where = array('no' => $no);
        $this->model_barang->hapus_data($where, 'katalog_barang');
        redirect('admin/data_barang/index');
    }
}
?>