<?php

class model_barang extends CI_Model {

    public function tampil_data(){
        return $this->db->get('katalog_barang');
    }

    public function tambah_barang($data, $table){
        $this->db->insert($table, $data);
    }

    public function edit_barang($where, $table){
        return $this->db->get_where($table, $where);
    }

    public function update_data($where, $data, $table){
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function hapus_data($where, $table){
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function find($no){
        $result = $this->db->where('no', $no)
                           ->limit(1)
                           ->get('katalog_barang');
        if($result->num_rows() > 0)
        {
            return $result->row();
        }
        else
        {
            return array();
        }
                            
    }
}
?>