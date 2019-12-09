<?php

class Role_model extends CI_Model
{
    public function getAllRole()
    {
        return $this->db->get('user_role')->result_array();
    }
    public function getMenu()
    {
        $this->db->where('id !=', 1);
        return $this->db->get('user_menu')->result_array();
    }
    public function getRoleById($role_id)
    {
        return $this->db->get_where('user_role', ['id' => $role_id])->row_array();
    }

    public function getRoleAccess($data)
    {
        return $this->db->get_where('user_access_menu', $data);
    }
    public function insertRole()
    {
        return $this->db->insert('user_role', ['role' => $this->input->post('role')]);
    }
    public function ubahDataRole()
    {
        $role =  $this->input->post('roleedit', true);
        $id =  $this->input->post('id', true);

        $data = [
            'role' => $role
        ];
        $this->db->set($data);
        $this->db->where('id', $id);
        $this->db->update('user_role');
    }
    public function hapusDataRole()
    {
        $id =  $this->input->post('id', true);
        $this->db->delete('user_role', ['id' => $id]);
    }
    public function insertAccessMenu($data)
    {
        return $this->db->insert('user_access_menu', $data);
    }
    public function deleteAccessMenu($data)
    {
        $this->db->delete('user_access_menu', $data);
    }
}
