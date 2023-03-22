<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Video_player extends CI_Controller {
	public function __construct(){
		parent::__construct(); 
		$this->load->model('konfigurasi_model');
		$this->load->model('video_player_model');
		$this->libraries_login->cek_login_master();
	}
	//Buka Halaman video_player
	public function index()
	{
		$get_konfigurasi = $this->konfigurasi_model->get_konfigurasi();
		$data_video_player = $this->video_player_model->data_video_player();
		$data = array( 'title'    			=> 'video_player',
			'isi'     			=> 'admin/video_player/list',
			'data_video_player'  	=> $data_video_player,
			'get_konfigurasi'   => $get_konfigurasi
		);
		$this->load->view('admin/layout/wrapper', $data, FALSE);	
	}

	// Slug data video_player
	public function video_player($slug_video_player)
	{
		$video_player 			= $this->video_player_model->read($slug_video_player);
		$id_player 		= $video_player->id_player;
		$get_konfigurasi 	= $this->konfigurasi_model->get_konfigurasi();
		$listing_video_player 	= $this->videoku_model->listing_video_player();
		$total				= $this->videoku_model->total_video_player($id_player);
		
		$config['base_url'] 		= base_url().'home/video_player/'.$slug_video_player.'/index/';
		$config['total_rows']		= $total->total;
		$config['use_page_numbers'] = TRUE;
		$config['per_page'] 		= 20;
		$page 			= ($this->uri->segment(5)) ? ($this->uri->segment(5)-1) * $config['per_page']:0;
		$video 			= $this->videoku_model->video_player($id_player, $config['per_page'],$page); 
		$data = array(	'title'				=> 'video_player ' .$video_player->nama_player,
			'get_konfigurasi'	=> $get_konfigurasi,
			'listing_video_player'	=> $listing_video_player,
			'video' 			=> $video,
			'isi'				=> 'home/list'
		);
		$this->load->view('layout/wrapper', $data, FALSE);
	}

	//Tambah Data video_player
	public function tambah_video_player()
	{
		$get_konfigurasi = $this->konfigurasi_model->get_konfigurasi();
		$data_video_player = $this->video_player_model->data_video_player();
		$valid =$this->form_validation;
		$valid->set_rules('nama_player','nama_player','required',
			array( 'required'          =>'%s harus di isi'));
		if($valid->run()===FALSE) {
			$data = array( 'title'  			=> 'video_player',
				'isi'    			=> 'admin/video_player',
				'data_video_player'  	=> $data_video_player,
				'get_konfigurasi'  	=> $get_konfigurasi);

			$this->load->view('admin/layout/wrapper', $data, FALSE);	
		} else { 
			$nama_player	= $this->input->post('nama_player');
			$tambah_video_player= array('nama_player' => $nama_player);
			$status = $this->video_player_model->tambah_video_player($tambah_video_player);

			if ($status >= 0) {
				$this->session->set_flashdata("sukses", " Data Berhasil Ditambahkan..");
				redirect('admin/video_player');
			} else {
				$this->session->set_flashdata("error", " Data Gagal Ditambahkan");
				redirect('admin/video_player');
			}

		}
	}

	//Buka Halaman ubah video_player
	public function ubah_video_player($id_player)
	{
		$data_video_player = $this->video_player_model->detail_video_player($id_player);
		$get_konfigurasi = $this->konfigurasi_model->get_konfigurasi();
		$data = array( 'title'    			=> 'video_player',
			'isi'     			=> 'admin/video_player/ubah_video_player',
			'data_video_player'  	=> $data_video_player,
			'get_konfigurasi'  => $get_konfigurasi
		);
		$this->load->view('admin/layout/wrapper', $data, FALSE);	
	}

	//ubah data video_player
	public function ubah_data_video_player($id_player)
	{
		$id_player	= $id_player;
		$nama_player	= $this->input->post('nama_player');

		$ubah_video_player	= array('id_player'	=> $id_player,
			'nama_player'	=> $nama_player
		);
		$status = $this->video_player_model->ubah_video_player($ubah_video_player);
		if ($status >= 0) {
			$this->session->set_flashdata("sukses", " Data Berhasil Ditambahkan..");
			redirect('admin/video_player');
		} else {
			$this->session->set_flashdata("error", " Data Gagal Ditambahkan");
			redirect('admin/video_player');
		}
	}

	// Delete video_player
	public function hapus_video_player($id_player)
	{
		$hapus_video_player = array('id_player' => $id_player);
		$this->video_player_model->hapus_video_player($hapus_video_player);
		$this->session->set_flashdata('sukses', 'Data telah dihapus...');
		redirect(base_url('admin/video_player'),'refresh');
	}

	
}