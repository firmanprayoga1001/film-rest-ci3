<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Konfigurasi_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	// BAGIAN PROFIL & KONFIGURASI============================================================================================================
	public function get_konfigurasi(){
		$this->db->select('*');
		$this->db->from('konfigurasi');
		$this->db->where('id_konfigurasi', "1");
		$this->db->order_by('id_konfigurasi', 'desc');
		$query = $this->db->get();
		return $query->row();
	}
	//Ubah Konfigurasi
    public function ubah_konfigurasi($ubah_konfigurasi)
	{
		$this->db->where('id_konfigurasi', $ubah_konfigurasi['id_konfigurasi']);
		$this->db->update('konfigurasi',$ubah_konfigurasi);
	}

	// BAGIAN BANNER========================================================================================================================
	//Tampilkan data banner
	public function data_banner(){
        return $this->db->query("select * from banner")->result();
    }
	
	// Detail banner
	public function detail_banner($id_banner)
	{
		$this->db->select('*');
		$this->db->from('banner');
		$this->db->where('id_banner', $id_banner);
		$this->db->order_by('id_banner', 'desc');
		$query = $this->db->get();
		return $query->row();
	}
	//Ubah Banner
    public function ubah_banner($ubah_banner)
	{
		$this->db->where('id_banner', $ubah_banner['id_banner']);
		$this->db->update('banner',$ubah_banner);
	}

	// BAGIAN INFORMASI=========================================================================================================================
	public function get_informasi(){
		return $this->db->query("select * from informasi where id_informasi = '1'")->row();
	}
	//Ubah Konfigurasi
    public function ubah_informasi($ubah_informasi)
	{
		$this->db->where('id_informasi', $ubah_informasi['id_informasi']);
		$this->db->update('informasi',$ubah_informasi);
	}


}