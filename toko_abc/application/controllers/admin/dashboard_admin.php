<?php

class dashboard_admin extends CI_Controller{
    
    public function index()
    {
        $this->load->view('admin/dashboard');
    }
}

?>