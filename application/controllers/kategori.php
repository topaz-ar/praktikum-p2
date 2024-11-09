<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class kategori extends CI_Controller {
	public function __construct()
	{
        parent::__construct();
		$this->load->model('kategori_model');
		$this->load->library('form_validation');
	}
	public function index()
	{
        $data = array(
            'title' => 'View Data Kategori',
            'userlog' => infoLogin(),
            'kategori' => $this->kategori_model->getAll(),
            'content' => 'kategori/index',
        );
    }
	public function add()
	{
        $data = array(
            'title' => 'Tambah Data Kategori',
            'content' => 'kategori/add_form',
        );
		$this->load->view('template/main',$data);
	}
    public function save()
    {
        $this->Kategori_model->save();
        if($this->db->affected_rows()>0){
            $this->session->set_flashdata("success", "Data Kategori Berhasil DiSimpan");
        }
        redirect('kategori');
    }
    public function getedit($id)
    {
    $data = array(
        'title' => 'Update Data Kategori',
        'kategori' => $this->Kategori_model->getById($id),
        'content' => 'kategori/edit_form'
    );
    $this->load->view('template/main', $data);
    }
    function delete($id)
    {
        $this->kategori_model->delete($id);
        redirect('kategori')
    }
    public function delete($id)
    {
        $this->db->where('id',$id)->delete($this->_table);
        if($this->db->affected_rows()>0){
            $this->session->set_flashdata("success", "Data Kategori Berhasil DiDelete");
        }
    }
}
