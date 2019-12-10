<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('User_model', 'User');
    }
    public function index()
    {
        $data['title'] = 'My Profile';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->template('user/index', $data);
    }

    public function edit()
    {
        $data['title'] = 'Edit Profile';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $user = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('name', 'Fullname', 'required|trim');

        if ($this->form_validation->run() == false) {

            $this->load->template('user/edit', $data);
        } else {
            $email = $this->input->post('email');
            $name = $this->input->post('name');

            $upload_image = $_FILES['image']['name'];
            if ($upload_image) {
                $this->do_upload();
            } else {
                $this->User->updateUser($email, $name);
                $this->session->set_flashdata('message', 'Diubah!');
                redirect('user');
            }
        }
    }
    public function do_upload()
    {
        $data['title'] = 'Edit Profile';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $user = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $email = $this->input->post('email');

        //cek jika ada gambar yang akan diupload
        $upload_image = $_FILES['image']['name'];

        if ($upload_image) {
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']     = '2048';
            $config['upload_path'] = './assets/img/profile/';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('image')) {

                $old_image = $user['image'];
                if ($old_image != 'default.jpg') {
                    unlink(FCPATH . 'assets/img/profile/' . $old_image);
                }
                $name = $this->input->post('name');
                $new_image = $this->upload->data('file_name');
                $this->db->set('image', $new_image);
                $this->User->updateUser($email, $name);
                $this->session->set_flashdata('message', 'Diubah!');
                redirect('user');
            } else {
                $this->session->set_flashdata('messagewarning', $this->upload->display_errors());
                redirect('user/edit');
            }
        }
    }

    public function changePassword()
    {
        $data['title'] = 'Change Password';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('current_password', 'Current Password', 'required|trim');
        $this->form_validation->set_rules(
            'new_password1',
            'New Password',
            'required|trim|min_length[3]|matches[new_password2]'
        );
        $this->form_validation->set_rules(
            'new_password2',
            'Confirm New Password',
            'required|trim|min_length[3]|matches[new_password1]'
        );

        if ($this->form_validation->run() == false) {
            $this->load->template('user/changepassword', $data);
        } else {
            $current_password = $this->input->post('current_password');
            $new_password = $this->input->post('new_password1');
            if (!password_verify($current_password, $data['user']['password'])) {
                $this->session->set_flashdata('messageerror', 'Wrong current password!');
                redirect('user/changepassword');
            } else {
                if ($current_password == $new_password) {
                    $this->session->set_flashdata('messageerror', 'New password cannot be the same as current password!');
                    redirect('user/changepassword');
                } else {
                    // password sudah oke 
                    $password_hash = password_hash($new_password, PASSWORD_DEFAULT);
                    $email = $this->session->userdata('email');
                    $this->User->changePassword($email, $password_hash);
                    $this->session->set_flashdata('message', 'Password changed!');
                    redirect('user/changepassword');
                }
            }
        }
    }
}
