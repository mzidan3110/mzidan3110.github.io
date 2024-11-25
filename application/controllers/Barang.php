<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Barang_model');
        $this->load->library('form_validation');
    }

    // Menampilkan daftar barang
    public function index() {
        $data['items'] = $this->Barang_model->get_all_items();
        $this->load->view('barang', $data);
    }

    // Menampilkan form tambah/edit barang
    public function form($id = null) {
        $data['item'] = $id ? $this->Barang_model->get_item_by_id($id) : null;
        $this->load->view('form', $data);
    }

    // Menyimpan barang baru atau update
    public function save() {
        $this->form_validation->set_rules('name', 'Nama Barang', 'required');
        $this->form_validation->set_rules('category', 'Kategori Barang', 'required');
        $this->form_validation->set_rules('quantity', 'Jumlah Barang', 'required|integer|greater_than[0]');
        $this->form_validation->set_rules('price', 'Harga per Unit', 'required|integer|greater_than[99]');
        $this->form_validation->set_rules('date', 'Tanggal Masuk', 'required|callback_check_date');

        if ($this->form_validation->run() == FALSE) {
            $this->form();
        } else {
            $data = [
                'name' => $this->input->post('name'),
                'category' => $this->input->post('category'),
                'quantity' => $this->input->post('quantity'),
                'price' => $this->input->post('price'),
                'date' => $this->input->post('date')
            ];

            if ($this->input->post('id')) {
                $this->Barang_model->update_item($this->input->post('id'), $data);
            } else {
                $this->Barang_model->insert_item($data);
            }

            redirect('barang');
        }
    }

    // Fungsi validasi tanggal
    public function check_date($date) {
        if (strtotime($date) > strtotime(date('Y-m-d'))) {
            $this->form_validation->set_message('check_date', 'Tanggal tidak boleh lebih dari hari ini.');
            return FALSE;
        }
        return TRUE;
    }

    // Menghapus barang
    public function delete($id) {
        $this->Barang_model->delete_item($id);
        redirect('barang');
    }
}
