<?php

class User_model extends CI_Model
{

    public function updateUser($email, $name)
    {

        $this->db->set('name', $name);
        $this->db->where('email', $email);
        return $this->db->update('user');
    }
    public function changePassword($email, $password_hash)
    {

        $this->db->set('password', $password_hash);
        $this->db->where('email', $email);
        return $this->db->update('user');
    }
}
