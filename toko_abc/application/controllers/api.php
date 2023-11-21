<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class api extends CI_Controller {
        
        public function __construct(){
            parent::__construct();
            $this->load->model('modelku');
        }

        public function index()
        {
            $aksesClient = $this->input->get('kode');
            $dataPenunjuk = array(
                'auth' => $aksesClient
            );

            $cek = count($this->modelku->getData_khusus("user_api", $dataPenunjuk));

            if($cek > 0){
                $dataABC = $this->modelku->getData("katalog_barang");

                $data = array(
                    "dataABC" => $dataABC
                );

                echo json_encode($data);
            }else{
                echo "Anda tidak punya akses";
            }
           
        }
    }

?>