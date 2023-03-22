<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	//Tampilkan data kategori
	public function data_kategori(){
        return $this->db->query("select * from kategori")->result();
    }

	//Tampilkan data kategori
	public function data_kategori_series(){
		$this->db->select('kategori.*');
		$this->db->from('kategori');  
		$this->db->like('kategori.nama_kategori','Series');
		$this->db->order_by('urutan', 'asc');
		$query = $this->db->get();
		return $query->result();
    }
	//Tampilkan data kategori
	public function data_kategori_movie(){
		$this->db->select('kategori.*');
		$this->db->from('kategori');  
		$this->db->like('kategori.nama_kategori','Movie');
		$this->db->order_by('urutan', 'asc');
		$query = $this->db->get();
		return $query->result();
    }
	
	// Detail Kategori
	public function detail_kategori($id_kategori)
	{
		$this->db->select('*');
		$this->db->from('kategori');
		$this->db->where('id_kategori', $id_kategori);
		$this->db->order_by('id_kategori', 'desc');
		$query = $this->db->get();
		return $query->row();
	}
    
    //Tambah Kategori
    public function tambah_kategori($tambah_kategori)
	{
		$this->db->insert('kategori', $tambah_kategori);
	}
	
    //Ubah Video
    public function ubah_kategori($ubah_kategori)
	{
		$this->db->where('id_kategori', $ubah_kategori['id_kategori']);
		$this->db->update('kategori',$ubah_kategori);
	}
	// Delete Kategori
	public function hapus_kategori($hapus_kategori)
	{
		$this->db->where('id_kategori', $hapus_kategori['id_kategori']);
		$this->db->delete('kategori',$hapus_kategori);
	}

	// Detail slug kategori
	public function read($slug_kategori)
	{
		$this->db->select('*');
		$this->db->from('kategori');
		$this->db->where('slug_kategori', $slug_kategori);
		$this->db->order_by('id_kategori', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

	// Login kategori
	public function login($kategoriname,$password)
	{
		$this->db->select('*');
		$this->db->from('kategori');
		$this->db->where(array('kategoriname' => $kategoriname,
							   'password'	  => SHA1($password)));
		$this->db->order_by('id_kategori', 'desc');
		$query = $this->db->get();
		return $query->row();
	}
	// Total kategori video
	public function total_kategori($id_kategori)
	{
		$this->db->select('COUNT(*) AS total');
		$this->db->from('video');
		$this->db->where('status', 'Publish');
		$this->db->where('id_kategori', $id_kategori);
		$query = $this->db->get();
		return $query->row();
	}
	
}

