<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	function cek_login($username,$password){
		$this->db->select('*');
		$this->db->from('admin');
		$this->db->where(array(	'username'	=> $username,
							   	'password'	=> SHA1($password)
							));
		$this->db->order_by('id_admin', 'desc');
		$query = $this->db->get();
		return $query->row();
	}
	
	public function data_jurusan()
	{
	return $this->db->query("select * from jurusan")->result();
	}
	//Tampilkan data akun
	public function data_admin(){
        return $this->db->query("select * from admin")->result();
    }
	// Detail Admin
	public function detail_admin($id_admin)
	{
		$this->db->select('*');
		$this->db->from('admin');
		$this->db->where('id_admin', $id_admin);
		$this->db->order_by('id_admin', 'desc');
		$query = $this->db->get();
		return $query->row();
	}
	//Tambah akun
    public function tambah_admin($tambah_admin)
	{
		$this->db->insert('admin', $tambah_admin);
	}
	//Ubah akun
    public function ubah_admin($ubah_admin)
	{
		$this->db->where('id_admin', $ubah_admin['id_admin']);
		$this->db->update('admin',$ubah_admin);
	}
	//Hapus Akun
    public function hapus_admin($hapus_admin)
	{
		$this->db->where('id_admin', $hapus_admin['id_admin']);
		$this->db->delete('admin',$hapus_admin);
	}

}
