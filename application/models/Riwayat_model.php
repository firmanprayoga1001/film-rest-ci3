<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Riwayat_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
    //Tampilkan semua data video series
	public function data_riwayat_user($id_user){
		
        $this->db->select('riwayat_series.*,
                        video.judul_video,
                        episode.urutan'); 
		$this->db->from('riwayat_series');  
        $this->db->join('video', 'video.id_video = riwayat_series.id_video', 'left');
        $this->db->join('episode', 'episode.id_episode = riwayat_series.id_episode', 'left');
		$this->db->where('riwayat_series.id_user',$id_user);
		$this->db->order_by('waktu','desc');
        $this->db->limit(10,0);
		$query = $this->db->get();
		return $query->result();
    }

	//Tampilkan semua data video series
	public function detail_riwayat_series($id_user,$id_video){
		
		$this->db->select('*');
		$this->db->from('riwayat_series');
		$this->db->where(array(	'id_user'	=> $id_user,
							   	'id_video'	=> $id_video
							));
		$this->db->order_by('id_riwayat', 'desc');
		$query = $this->db->get();
		return $query->row();
    }
    public function tambah_riwayat_series($tambah_riwayat)
	{
		$this->db->insert('riwayat_series', $tambah_riwayat);
	}
	//ubah
    public function ubah_riwayat_series($ubah_riwayat)
	{
		$this->db->where('id_riwayat', $ubah_riwayat['id_riwayat']);
		$this->db->update('riwayat_series',$ubah_riwayat);
	}
	//Delete
    public function hapus_aktor($hapus_aktor)
	{
		$this->db->where('id_aktor', $hapus_aktor['id_aktor']);
		$this->db->delete('aktor',$hapus_aktor);
	}
}