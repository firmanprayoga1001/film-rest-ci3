<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aktor_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
    //Tampilkan semua data video series
	public function data_aktor($id_video){
		
        $this->db->select('aktor.*,
						video.judul_video,
						video.slug_video');
		$this->db->from('aktor');  
		$this->db->join('video', 'video.id_video = aktor.id_aktor', 'left');
		$this->db->where('aktor.id_video',$id_video);
		$this->db->order_by('id_aktor', 'asc');
		$query = $this->db->get();
		return $query->result();
    }

	//Tampilkan semua data video series
	public function detail_aktor($id_aktor){
		
		$this->db->select('*');
		$this->db->from('aktor');
		$this->db->where('id_aktor', $id_aktor);
		$this->db->order_by('id_aktor', 'desc');
		$query = $this->db->get();
		return $query->row();
    }
    public function tambah_aktor($tambah_aktor)
	{
		$this->db->insert('aktor', $tambah_aktor);
	}
	//ubah
    public function ubah_aktor($ubah_aktor)
	{
		$this->db->where('id_aktor', $ubah_aktor['id_aktor']);
		$this->db->update('aktor',$ubah_aktor);
	}
	//Delete
    public function hapus_aktor($hapus_aktor)
	{
		$this->db->where('id_aktor', $hapus_aktor['id_aktor']);
		$this->db->delete('aktor',$hapus_aktor);
	}
}