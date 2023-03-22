<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Videoku_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	//Tampilkan semua data video movie
	public function data_movie(){
		
		$this->db->select('video.*,
			kategori.nama_kategori,
			kategori.slug_kategori');
		$this->db->from('video');  
		$this->db->join('kategori', 'kategori.id_kategori = video.id_kategori', 'left');
		$this->db->like('kategori.nama_kategori','Movie');
		$this->db->order_by('id_video', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	//Tampilkan semua data video movie yang di publish
	public function publish_video(){

		$this->db->select('video.*,
			kategori.nama_kategori,
			kategori.slug_kategori');
		$this->db->from('video');
		$this->db->join('kategori', 'kategori.id_kategori = video.id_kategori', 'left');
		$this->db->where('video.status','Publish');
		$this->db->like('kategori.nama_kategori','Movie');
		$this->db->order_by('id_video', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	// Detail Video Movie
	public function detail_video($id_video)
	{
		$this->db->select('video.*,
			kategori.nama_kategori,
			kategori.slug_kategori');
		$this->db->from('video');
		$this->db->join('kategori','kategori.id_kategori = video.id_kategori', 'left');
		$this->db->group_by('video.id_kategori');
		$this->db->where('id_video', $id_video);
		$this->db->order_by('id_video', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

	//Tambah Video
	public function tambah_video($tambah_video)
	{
		$this->db->insert('video', $tambah_video);
	}
	//Ubah Video
	public function ubah_video($ubah_video)
	{
		$this->db->where('id_video', $ubah_video['id_video']);
		$this->db->update('video',$ubah_video);
	}

	// Delete Video
	public function hapus_video($id_video)
	{
		$this->db->where('id_video', $id_video['id_video']);
		$this->db->delete('video',$id_video);
		$this->db->delete('episode',$id_video);
	}
	
	// Listing kategori
	public function listing_kategori() 
	{
		$this->db->select('video.*,
			kategori.nama_kategori,
			kategori.urutan,
			kategori.slug_kategori');
		$this->db->from('video');
		$this->db->join('kategori', 'kategori.id_kategori = video.id_kategori', 'left');
		$this->db->group_by('video.id_kategori');
		$this->db->where('video.status', 'Publish');
		$this->db->order_by('urutan','asc');
		$query = $this->db->get();
		return $query->result();
	}
	
	// Total Video
	public function total_video()
	{
		$this->db->select('COUNT(*) AS total');
		$this->db->from('video');
		$this->db->where('status', 'Publish');
		$query = $this->db->get();
		return $query->row();
	}

	//Tampilkan data video hasilpencarian
	public function cari_video($kata_kunci){

		$this->db->select('video.*,
			kategori.nama_kategori,
			kategori.slug_kategori');
		$this->db->from('video');
		$this->db->join('kategori', 'kategori.id_kategori = video.id_kategori', 'left');
		$this->db->where('video.status','Publish');
		$this->db->like('video.judul_video',$kata_kunci);
		$this->db->like('kategori.nama_kategori','Movie');
		$this->db->order_by('tahun', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	// =========================================================BAGIAN MOVIE===============================================

	//Tampilkan semua data video movie berdasarkan kategori
	public function data_movie_kategori($slug_kategori){
		
		$this->db->select('video.*,
			kategori.nama_kategori,
			kategori.slug_kategori');
		$this->db->from('video');  
		$this->db->join('kategori', 'kategori.id_kategori = video.id_kategori', 'left');
		$this->db->where('video.status','Publish'); 
		$this->db->where('kategori.slug_kategori',$slug_kategori);
		$this->db->order_by('tahun', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	
	// Total Video
	public function total_movie()
	{
		$this->db->select('COUNT(*) AS total');
		$this->db->select('video.*,
			kategori.nama_kategori');
		$this->db->from('video');
		$this->db->join('kategori', 'kategori.id_kategori = video.id_kategori', 'left');
		$this->db->where('status', 'Publish');
		$this->db->like('kategori.nama_kategori','Movie');
		$query = $this->db->get();
		return $query->row();
	}

	// Tampilkan Video Movie Dengan Batas perpage
	public function video($limit,$start)
	{
		$this->db->select('video.*,
			kategori.nama_kategori,
			kategori.slug_kategori');
		$this->db->from('video');
		$this->db->join('kategori','kategori.id_kategori = video.id_kategori', 'left');
		$this->db->where('video.status','Publish');
		$this->db->like('kategori.nama_kategori','Movie');
		$this->db->group_by('video.id_video');
		$this->db->order_by('tahun', 'desc');
		$this->db->limit($limit,$start);
		$query = $this->db->get();
		return $query->result();
	}
	// Kategori video Movie
	public function kategori($id_kategori,$limit,$start)
	{
		$this->db->select('video.*,
			kategori.nama_kategori,
			kategori.slug_kategori');
		$this->db->from('video');
		$this->db->join('kategori','kategori.id_kategori = video.id_kategori', 'left');
		$this->db->where('video.status','Publish');
		$this->db->like('kategori.nama_kategori','Movie');
		$this->db->where('video.id_kategori', $id_kategori);
		$this->db->group_by('video.id_video');
		$this->db->order_by('tahun', 'desc');
		$this->db->limit($limit,$start);
		$query = $this->db->get();
		return $query->result();
	}	
	

	//BAGIAN SERIES===================================================================================================================
	//Tampilkan semua data video series
	public function data_video_series(){
		
		$this->db->select('video.*,
			kategori.nama_kategori,
			kategori.slug_kategori');
		$this->db->from('video');  
		$this->db->join('kategori', 'kategori.id_kategori = video.id_kategori', 'left');
		$this->db->like('kategori.nama_kategori','Series');
		$this->db->order_by('id_video', 'desc');
		$query = $this->db->get();
		return $query->result();
	}
	//Tampilkan semua data video series berdasarkan kategori
	public function data_series($slug_kategori){
		
		$this->db->select('video.*,
			kategori.nama_kategori,
			kategori.slug_kategori');
		$this->db->from('video');  
		$this->db->join('kategori', 'kategori.id_kategori = video.id_kategori', 'left');
		$this->db->where('kategori.slug_kategori',$slug_kategori);
		$this->db->where('video.status','Publish');
		$this->db->order_by('tahun', 'desc');
		$query = $this->db->get();
		return $query->result();
	}
	//Tampilkan data video hasilpencarian series
	public function cari_video_series($kata_kunci){

		$this->db->select('video.*,
			kategori.nama_kategori,
			kategori.slug_kategori');
		$this->db->from('video');
		$this->db->join('kategori', 'kategori.id_kategori = video.id_kategori', 'left');
		$this->db->where('video.status','Publish');
		$this->db->like('video.judul_video',$kata_kunci);
		$this->db->like('kategori.nama_kategori','Series');
		$this->db->order_by('tahun', 'desc');
		$query = $this->db->get();
		return $query->result();
	}
	// Total Video
	public function total_series()
	{
		$this->db->select('COUNT(*) AS total');
		$this->db->select('video.*,
			kategori.nama_kategori');
		$this->db->from('video');
		$this->db->join('kategori', 'kategori.id_kategori = video.id_kategori', 'left');
		$this->db->where('status', 'Publish');
		$this->db->like('kategori.nama_kategori','Series');
		$query = $this->db->get();
		return $query->row();
	}
	//Tampilkan semua data video SERIES yang di publish
	public function publish_video_series(){

		$this->db->select('video.*,
			kategori.nama_kategori,
			kategori.slug_kategori');
		$this->db->from('video');
		$this->db->join('kategori', 'kategori.id_kategori = video.id_kategori', 'left');
		$this->db->where('video.status','Publish');
		$this->db->like('kategori.nama_kategori','Series');
		$this->db->order_by('tahun', 'desc');
		$query = $this->db->get();
		return $query->result();
	}
	// Detail Video Series
	public function detail_video_series($id_video)
	{
		$this->db->select('video.*,
			kategori.nama_kategori,
			kategori.slug_kategori');
		$this->db->from('video');
		$this->db->join('kategori','kategori.id_kategori = video.id_kategori', 'left');
		$this->db->group_by('video.id_kategori');
		$this->db->where('id_video', $id_video);
		$this->db->order_by('id_video', 'desc');
		$query = $this->db->get();
		return $query->row();
	}
	// Tampilkan Video Series Dengan batas perpage
	public function video_series($limit,$start)
	{
		$this->db->select('video.*,
			kategori.nama_kategori,
			kategori.slug_kategori');
		$this->db->from('video');
		$this->db->join('kategori','kategori.id_kategori = video.id_kategori', 'left');
		$this->db->where('video.status','Publish');
		$this->db->like('kategori.nama_kategori','Series');
		$this->db->group_by('video.id_video');
		$this->db->order_by('tahun', 'desc');
		$this->db->limit($limit,$start);
		$query = $this->db->get();
		return $query->result();
	}
	// Kategori video Series
	public function kategori_series($id_kategori,$limit,$start)
	{
		$this->db->select('video.*,
			kategori.nama_kategori,
			kategori.slug_kategori');
		$this->db->from('video');
		$this->db->join('kategori','kategori.id_kategori = video.id_kategori', 'left');
		$this->db->where('video.status','Publish');
		$this->db->like('kategori.nama_kategori','Series');
		$this->db->where('video.id_kategori', $id_kategori);
		$this->db->group_by('video.id_video');
		$this->db->order_by('tahun', 'desc');
		$this->db->limit($limit,$start);
		$query = $this->db->get();
		return $query->result();
	}



	// BAGIAN EPISODE==================================================================================================================
	//Tampilkan semua data video series
	public function data_episode($id_video){
		
		$this->db->select('episode.*,
			video.judul_video,
			video.slug_video,
			video_player.nama_player');
		$this->db->from('episode');  
		$this->db->join('video', 'video.id_video = episode.id_episode', 'left');
		$this->db->join('video_player', 'video_player.id_player = episode.id_player', 'left'); 
		$this->db->where('episode.id_video',$id_video);
		$this->db->order_by('urutan', 'asc');
		$query = $this->db->get();
		return $query->result();
	}
	// Detail episode
	public function detail_episode($id_episode)
	{
		$this->db->select('episode.*,
			video.id_video,
			video.judul_video,
			video.gambar,
			video.genre,
			video.resolusi,
			video.jumlah_episode,
			video.sinopsis,
			video.keterangan,
			video.tahun,
			kategori.nama_kategori,
			video.slug_video,
			kategori.nama_kategori,
			kategori.slug_kategori,
			video_player.nama_player');
		$this->db->from('episode');
		$this->db->join('video', 'video.id_video = episode.id_video', 'left');
		$this->db->join('kategori','kategori.id_kategori = video.id_kategori', 'left'); 
		$this->db->join('video_player', 'video_player.id_player = episode.id_player', 'left'); 
		$this->db->where('id_episode', $id_episode);
		$this->db->order_by('id_episode', 'desc');
		$query = $this->db->get();
		return $query->row();
	}
	//Tambah Video
	public function tambah_episode($tambah_episode)
	{
		$this->db->insert('episode', $tambah_episode);
	}
	//ubah Video
	public function ubah_episode($ubah_episode)
	{
		$this->db->where('id_episode', $ubah_episode['id_episode']);
		$this->db->update('episode',$ubah_episode);
	}
	//Delete
	public function hapus_episode($hapus_episode)
	{
		$this->db->where('id_episode', $hapus_episode['id_episode']);
		$this->db->delete('episode',$hapus_episode);
	}
	// Total Video
	public function total_episode($id_video)
	{
		$this->db->select('COUNT(*) AS total');
		$this->db->from('episode');
		$this->db->where('id_video', $id_video );
		$query = $this->db->get();
		return $query->row();
	}
	
}