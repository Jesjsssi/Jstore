<?php

class model_auth extends CI_Model {

    public function cek_login()
    {
        $username = set_value('user');
        $password = set_value('pass');

        $result = $this->db->where('user', $username)
                            ->where('pass', $password)
                            ->limit(1)
                            ->get('duser');
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