<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Video_player_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	//Tampilkan data video_player
	public function data_video_player(){
		return $this->db->query("select * from video_player")->result();
	}

	//Tampilkan data video_player
	public function data_video_player_series(){
		$this->db->select('video_player.*');
		$this->db->from('video_player');  
		$this->db->like('video_player.nama_player','Series');
		$this->db->order_by('urutan', 'asc');
		$query = $this->db->get();
		return $query->result();
	}
	//Tampilkan data video_player
	public function data_video_player_movie(){
		$this->db->select('video_player.*');
		$this->db->from('video_player');  
		$this->db->like('video_player.nama_player','Movie');
		$this->db->order_by('urutan', 'asc');
		$query = $this->db->get();
		return $query->result();
	}
	
	// Detail video_player
	public function detail_video_player($id_player)
	{
		$this->db->select('*');
		$this->db->from('video_player');
		$this->db->where('id_player', $id_player);
		$this->db->order_by('id_player', 'desc');
		$query = $this->db->get();
		return $query->row();
	}
	
    //Tambah video_player
	public function tambah_video_player($tambah_video_player)
	{
		$this->db->insert('video_player', $tambah_video_player);
	}
	
    //Ubah Video
	public function ubah_video_player($ubah_video_player)
	{
		$this->db->where('id_player', $ubah_video_player['id_player']);
		$this->db->update('video_player',$ubah_video_player);
	}
	// Delete video_player
	public function hapus_video_player($hapus_video_player)
	{
		$this->db->where('id_player', $hapus_video_player['id_player']);
		$this->db->delete('video_player',$hapus_video_player);
	}

	// Detail slug video_player
	public function read($slug_video_player)
	{
		$this->db->select('*');
		$this->db->from('video_player');
		$this->db->where('slug_video_player', $slug_video_player);
		$this->db->order_by('id_player', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

	// Login video_player
	public function login($video_playername,$password)
	{
		$this->db->select('*');
		$this->db->from('video_player');
		$this->db->where(array('video_playername' => $video_playername,
			'password'	  => SHA1($password)));
		$this->db->order_by('id_player', 'desc');
		$query = $this->db->get();
		return $query->row();
	}
	// Total video_player video
	public function total_video_player($id_player)
	{
		$this->db->select('COUNT(*) AS total');
		$this->db->from('video');
		$this->db->where('status', 'Publish');
		$this->db->where('id_player', $id_player);
		$query = $this->db->get();
		return $query->row();
	}
	
}

