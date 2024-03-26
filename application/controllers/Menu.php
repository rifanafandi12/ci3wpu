<?php

defined('BASEPATH') or exit('No direct script access allowed');


class Menu extends CI_Controller
{
    // cek apakah sudah login atau belum? Jika belum maka kembalikan dia ke halaman auth/login
    public function __construct()
    {
        parent::__construct();
        is_logged_in();

        // Load model yang dibutuhkan
        $this->load->model('Menu_model');
    }


    public function index()
    {
        $data['title'] = 'Menu Management';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['menu'] = $this->db->get('user_menu')->result_array();
        // cek aturan
        $this->form_validation->set_rules('menu', 'Menu', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/index', $data);
            $this->load->view('templates/footer');
        } else {
            $this->db->insert('user_menu', ['menu' => $this->input->post('menu', true)]);
            $this->session->set_flashdata('message', '<div class ="alert alert-success">Menu Add</div>');
            redirect('menu');
        }
    }

    public function update_menu($id = null)
    {
        $data['title'] = 'Menu Management';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['menu'] = $this->db->get_where('user_menu', ['id' => $id])->row_array();
        // cek aturan
        $this->form_validation->set_rules('menu', 'Menu', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/update_menu', $data);
            $this->load->view('templates/footer');
        } else {
            $id = $this->input->post('id');
            $menu = $this->input->post('menu');

            $data = ['menu' => $menu];

            $this->db->where('id', $id);
            $this->db->update('user_menu', $data);
            $this->session->set_flashdata('message', '<div class ="alert alert-success">Update Data Berhasil</div>');
            redirect('menu');
        }
    }

    public function delete_menu($id = null)
    {

        $this->db->where('id', $id);
        $this->db->delete('user_menu');
        $this->session->set_flashdata('message', '<div class ="alert alert-danger">Data Berhasil Di Hapus</div>');
        redirect('menu');
    }

    // End Menu


    // Sub Menu
    public function submenu()
    {
        $data['title'] = 'Submenu Management';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->model('Menu_model', 'menu');
        $data['subMenu']    = $this->menu->getSubMenu();
        $data['menu']       = $this->db->get('user_menu')->result_array();

        // cek aturan
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('menu_id', 'Menu_id', 'required');
        $this->form_validation->set_rules('url', 'Url', 'required');
        $this->form_validation->set_rules('icon', 'Icon', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/submenu', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'title' => $this->input->post('title'),
                'menu_id' => $this->input->post('menu_id'),
                'url' => $this->input->post('url'),
                'icon' => $this->input->post('icon'),
                'is_active' => $this->input->post('is_active')
            ];
            $this->db->insert('user_sub_menu', $data);
            $this->session->set_flashdata('message', '<div class ="alert alert-success">subMenu Add</div>');
            redirect('menu/submenu');
        }
    }
    public function update_subMenu($id = null)
    {
        $data['title'] = 'Submenu Management';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['subMenu'] = $this->db->get_where('user_sub_menu', ['id' => $id])->row_array();
        $data['menu']       = $this->db->get('user_menu')->result_array();
        // var_dump($data['menu']);
        // die;

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('menu_id', 'Menu_id', 'required');
        $this->form_validation->set_rules('url', 'Url', 'required');
        $this->form_validation->set_rules('icon', 'Icon', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/update_subMenu', $data);
            $this->load->view('templates/footer');
        } else {
            $id = $this->input->post('id');
            $menu_id = $this->input->post('menu_id');
            $title = $this->input->post('title');
            $url = $this->input->post('url');
            $icon = $this->input->post('icon');
            $is_active = $this->input->post('is_active');

            $data = [
                'menu_id'   => $menu_id,
                'title'     => $title,
                'url'       => $url,
                'icon'      => $icon,
                'is_active' => $is_active
            ];

            $this->db->where('id', $id);
            $this->db->update('user_sub_menu', $data);
            $this->session->set_flashdata('message', '<div class ="alert alert-success">Update Data Berhasil</div>');
            redirect('menu/submenu');
        }
    }

    public function delete_sub_menu($id = null)
    {

        $this->db->where('id', $id);
        $this->db->delete('user_sub_menu');
        $this->session->set_flashdata('message', '<div class ="alert alert-danger">Data Berhasil Di Hapus</div>');
        redirect('menu/submenu');
    }
}
