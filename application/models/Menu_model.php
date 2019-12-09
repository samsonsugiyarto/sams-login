<?php

class Menu_model extends CI_Model
{
    public function getAllMenu()
    {
        return $this->db->get('user_menu')->result_array();
    }
    public function getAllSubMenu()
    {
        return $this->db->get('user_sub_menu')->result_array();
    }
    public function getSubMenu()
    {
        $query = "SELECT `user_sub_menu`.*, `user_menu`.`menu`
        FROM `user_sub_menu` JOIN `user_menu`
        ON `user_sub_menu`. `menu_id` = `user_menu`.`id` ";

        return $this->db->query($query)->result_array();
    }
    public function insertMenu()
    {
        return $this->db->insert('user_menu', ['menu' => $this->input->post('menu')]);
    }
    public function ubahDatamenu()
    {

        $menu =  $this->input->post('menuedit', true);
        $id =  $this->input->post('id', true);

        $data = [
            'menu' => $menu
        ];
        $this->db->set($data);
        $this->db->where('id', $id);
        $this->db->update('user_menu');
    }

    public function hapusDataMenu()
    {
        $id =  $this->input->post('id', true);
        $this->db->delete('user_menu', ['id' => $id]);
    }

    public function insertSubMenu()
    {
        $data = [
            'title' => $this->input->post('title'),
            'menu_id' => $this->input->post('menu_id'),
            'url' => $this->input->post('url'),
            'icon' => $this->input->post('icon'),
            'is_active' => $this->input->post('is_active')
        ];

        return $this->db->insert('user_sub_menu', $data);
    }

    public function ubahDataSubmenu()
    {
        $id =  $this->input->post('id', true);
        $title =  $this->input->post('title', true);
        $menu_id =  $this->input->post('menu_id', true);
        $url =  $this->input->post('url', true);
        $icon =  $this->input->post('icon', true);
        $aktif =  $this->input->post('cek', true);


        $data = [
            'title' => $title,
            'menu_id' => $menu_id,
            'url' => $url,
            'icon' => $icon,
            'is_active' => $aktif,

        ];
        $this->db->set($data);
        $this->db->where('id', $id);
        $this->db->update('user_sub_menu');
    }

    public function hapusSubMenu()
    {
        $id =  $this->input->post('id', true);
        $this->db->delete('user_sub_menu', ['id' => $id]);
    }
}
