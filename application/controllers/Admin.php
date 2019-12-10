<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Role_model', 'Role');
    }
    public function index()
    {
        $data['title'] = 'Dasboard';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->template('admin/index', $data);
    }

    public function role()
    {
        $data['title'] = 'Role';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['role'] = $this->Role->getAllRole();

        $this->form_validation->set_rules('role', 'Role', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->template('admin/role', $data);
        } else {
            $this->Role->insertRole();
            $this->session->set_flashdata('message', '
            Ditambahkan!');
            redirect('admin/role');
        }
    }

    public function editrole()
    {
        $data['title'] = 'Role';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $this->form_validation->set_rules('roleedit', 'Role', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->template('admin/role', $data);
        } else {
            $this->Role->ubahDataRole();
            $this->session->set_flashdata('message', 'Diubah!');
            redirect('admin/role');
        }
    }

    public function hapusrole()
    {
        $this->Role->hapusDataRole();
        $this->session->set_flashdata('message', 'Dihapus!');
        redirect('admin/role');
    }


    public function roleAccess($role_id)
    {
        $data['title'] = 'Role';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['role'] = $this->Role->getRoleById($role_id);
        $data['menu'] = $this->Role->getMenu();

        $this->load->template('admin/role-access', $data);
    }

    public function changeaccess()
    {
        $menuId = $this->input->post('menuId');
        $roleId = $this->input->post('roleId');

        $data = [
            'role_id' => $roleId,
            'menu_Id' => $menuId
        ];

        $result = $this->Role->getRoleAccess($data);

        if ($result->num_rows() < 1) {
            $this->Role->insertAccessMenu($data);
        } else {
            $this->Role->deleteAccessMenu($data);
        }
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Access Changed!</div>');
    }
}
