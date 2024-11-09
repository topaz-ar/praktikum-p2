<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Kustomer_model extends CI_Model 
{
    protected $_table = 'kustomer';
    protected $primary = 'id';
    
    public function getAll() // Ganti nama method sesuai konvensi penamaan
    {
        return $this->db->get($this->_table)->result();
    }
    public function save()
    {
        $data = array('name'=> htmlspecialchars($this->input->post('name'),true));
        return $this->db->insert($this->_table,$data);
}
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id" =>$id]) ->row();
    }
    public function editData()
    {
        // Menyiapkan data yang akan disimpan
        $id = $this->input->post('id');
        $data = array(
            'name' => htmlspecialchars($this->input->post('name'), true));
        // Menyimpan data ke tabel user
        return $this->db->set($data)->where($this->primary,$id)->update($this->_table);
    }
    public function delete($id)
    {
    // Menggunakan where() yang benar dan menghapus data berdasarkan id
    $this->db->where('id', $id)->delete($this->_table);
    // Mengecek jika ada baris yang terpengaruh oleh query
    if ($this->db->affected_rows() > 0) {
        // Set flashdata untuk menampilkan pesan sukses
        $this->session->set_flashdata("success", "Data User Berhasil DiHapus");
    } 

}}