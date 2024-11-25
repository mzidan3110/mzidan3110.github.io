<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang_model extends CI_Model {

    private $table = 'barang';

    // Mendapatkan semua data barang
    public function get_all_items() {
        return $this->db->get($this->table)->result_array();
    }

    // Menambahkan barang baru
    public function insert_item($data) {
        return $this->db->insert($this->table, $data);
    }

    // Mendapatkan barang berdasarkan ID
    public function get_item_by_id($id) {
        return $this->db->get_where($this->table, ['id' => $id])->row_array();
    }

    // Mengupdate barang
    public function update_item($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update($this->table, $data);
    }

    // Menghapus barang
    public function delete_item($id) {
        $this->db->where('id', $id);
        return $this->db->delete($this->table);
    }
}
