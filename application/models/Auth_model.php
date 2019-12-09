<?php

class Auth_model extends CI_Model
{
    public function insertUser($data)
    {
        return $this->db->insert('user', $data);
    }
    public function insertToken($user_token)
    {
        return $this->db->insert('user_token', $user_token);
    }

    public function getUserByEmailandIs_active($email)
    {
        return $this->db->get_where('user', ['email' => $email, 'is_active' => 1])->row_array();
    }
    public function getUserEmail($email)
    {
        return $this->db->get_where('user', ['email' => $email])->row_array();
    }
    public function getUserToken($token)
    {
        return $this->db->get_where('user_token', ['token' => $token])->row_array();
    }

    public function updateUser($email)
    {
        $this->db->set('is_active', 1);
        $this->db->where('email', $email);
        return $this->db->update('user');
    }
    public function updatePassword($password, $email)
    {
        $this->db->set('password', $password);
        $this->db->where('email', $email);
        $this->db->update('user');
    }

    public function deleteUser($email)
    {
        return  $this->db->delete('user', ['email' => $email]);
    }
    public function deleteUserToken($email)
    {
        return  $this->db->delete('user_token', ['email' => $email]);
    }
}
