<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dasbor extends CI_Controller {
	public function __construct(){
 		parent::__construct(); 
		$this->load->model('konfigurasi_model');
		$this->load->model('admin_model');
		$this->load->model('user_model');
		$this->load->model('pengunjung_model');
		$this->libraries_login->cek_login();
 	}

	public function index()
	{
		$get_konfigurasi = $this->konfigurasi_model->get_konfigurasi();
		$data_pengunjung = $this->pengunjung_model->data_pengunjung();
		$data_banner = $this->konfigurasi_model->data_banner();
		$data_movie = $this->videoku_model->total_movie();
		$data_series = $this->videoku_model->total_series();
		$data_user = $this->user_model->total_user();
	    $data = array( 'title'    => 'Halaman Utama',
	                    'isi'     => 'admin/dasbor/list',
						'data_movie' => $data_movie,
						'data_series' => $data_series,
						'data_user' => $data_user,
						'data_banner'  	=> $data_banner,
						'data_pengunjung'  	=> $data_pengunjung,
						'get_konfigurasi' => $get_konfigurasi
	                     );
	    $this->load->view('admin/layout/wrapper', $data, FALSE);	
	}
	// Fungsi logout
	public function aksi_logout()
	{
		$this->libraries_login->aksi_logout();
	}
}
