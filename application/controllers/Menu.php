<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Menu_model', 'Menu');
    }

    public function index()
    {
        $data['title'] = 'Menu Management';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['menu'] = $this->Menu->getAllMenu();

        $this->form_validation->set_rules('menu', 'Menu', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->template('menu/index', $data);
        } else {

            $this->Menu->insertMenu();
            $this->session->set_flashdata('message', 'New menu added!');
            redirect('menu');
        }
    }

    public function editmenu()
    {
        $data['title'] = 'Menu Management';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $this->form_validation->set_rules('menuedit', 'Menu', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->template('menu/index', $data);
        } else {
            $this->Menu->ubahDataMenu();
            $this->session->set_flashdata('message', 'Menu Berhasil Diubah!');
            redirect('menu');
        }
    }

    public function hapusmenu()
    {
        $this->Menu->hapusDataMenu();
        $this->session->set_flashdata('message', 'Menu Berhasil Dihapus!');
        redirect('menu');
    }

    public function subMenu()
    {
        $data['title'] = 'Submenu Management';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();


        $data['subMenu'] = $this->Menu->getSubMenu();
        $data['menu'] = $this->Menu->getAllMenu();

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('menu_id', 'Menu', 'required');
        $this->form_validation->set_rules('url', 'URL', 'required');
        $this->form_validation->set_rules('icon', 'Icon', 'required');


        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/navbar', $data);
            $this->load->view('menu/submenu', $data);
            $this->load->view('templates/footer');
        } else {

            $this->Menu->insertSubMenu();
            $this->session->set_flashdata('message', 'New sub menu added!');
            redirect('menu/submenu');
        }
    }

    public function editSubmenu()
    {
        $data['title'] = 'Submenu Management';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('title', 'Title', 'required|trim');
        $this->form_validation->set_rules('menu_id', 'Menu', 'required|trim');
        $this->form_validation->set_rules('url', 'URL', 'required|trim');
        $this->form_validation->set_rules('icon', 'Icon', 'required|trim');


        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/navbar', $data);
            $this->load->view('menu/submenu', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Menu->ubahDataSubMenu();
            $this->session->set_flashdata('message', 'Sub Menu Berhasil Diubah!');
            redirect('menu/submenu');
        }
    }

    public function hapussubmenu()
    {
        $this->Menu->hapusSubMenu();
        $this->session->set_flashdata('message', 'Sub Menu Berhasil Dihapus!');
        redirect('menu/submenu');
    }
}
