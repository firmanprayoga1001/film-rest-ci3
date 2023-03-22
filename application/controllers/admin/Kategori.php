<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class kategori extends CI_Controller {
	public function __construct(){
 		parent::__construct(); 
 		$this->load->model('konfigurasi_model');
		$this->load->model('kategori_model');
		$this->libraries_login->cek_login_master();
 	}
	//Buka Halaman Kategori
	public function index()
	{
		$get_konfigurasi = $this->konfigurasi_model->get_konfigurasi();
		$data_kategori = $this->kategori_model->data_kategori();
		$data = array( 'title'    			=> 'Kategori',
						'isi'     			=> 'admin/kategori/list',
						'data_kategori'  	=> $data_kategori,
						'get_konfigurasi'   => $get_konfigurasi
						 );
		$this->load->view('admin/layout/wrapper', $data, FALSE);	
	}

	// Slug data kategori
	public function kategori($slug_kategori)
	{
		$kategori 			= $this->kategori_model->read($slug_kategori);
		$id_kategori 		= $kategori->id_kategori;
		$get_konfigurasi 	= $this->konfigurasi_model->get_konfigurasi();
		$listing_kategori 	= $this->videoku_model->listing_kategori();
		$total				= $this->videoku_model->total_kategori($id_kategori);
		
		$config['base_url'] 		= base_url().'home/kategori/'.$slug_kategori.'/index/';
		$config['total_rows']		= $total->total;
		$config['use_page_numbers'] = TRUE;
		$config['per_page'] 		= 20;
		$page 			= ($this->uri->segment(5)) ? ($this->uri->segment(5)-1) * $config['per_page']:0;
		$video 			= $this->videoku_model->kategori($id_kategori, $config['per_page'],$page); 
		$data = array(	'title'				=> 'Kategori ' .$kategori->nama_kategori,
						'get_konfigurasi'	=> $get_konfigurasi,
						'listing_kategori'	=> $listing_kategori,
						'video' 			=> $video,
						'isi'				=> 'home/list'
					);
		$this->load->view('layout/wrapper', $data, FALSE);
	}

	//Tambah Data Kategori
	public function tambah_kategori()
	{
		$get_konfigurasi = $this->konfigurasi_model->get_konfigurasi();
		$data_kategori = $this->kategori_model->data_kategori();
		$valid =$this->form_validation;
		$valid->set_rules('nama_kategori','Nama_Kategori','required',
	    array( 'required'          =>'%s harus di isi'));
	    if($valid->run()===FALSE) {
       	$data = array( 'title'  			=> 'Kategori',
	                    'isi'    			=> 'admin/kategori',
						'data_kategori'  	=> $data_kategori,
						'get_konfigurasi'  	=> $get_konfigurasi);

	    $this->load->view('admin/layout/wrapper', $data, FALSE);	
       } else { 
	    $nama_kategori	= $this->input->post('nama_kategori');
		$slug_kategori  = url_title($this->input->post('nama_kategori'), 'dash', TRUE);
    	$tambah_kategori= array('nama_kategori' => $nama_kategori,'slug_kategori' => $slug_kategori);
    	$status = $this->kategori_model->tambah_kategori($tambah_kategori);
    	
    	if ($status >= 0) {
    		$this->session->set_flashdata("sukses", " Data Berhasil Ditambahkan..");
      		redirect('admin/kategori');
    	} else {
    		$this->session->set_flashdata("error", " Data Gagal Ditambahkan");
      		redirect('admin/kategori');
    	}
       
    	}
	}

	//Buka Halaman ubah Kategori
	public function ubah_kategori($id_kategori)
	{
		$data_kategori = $this->kategori_model->detail_kategori($id_kategori);
		$get_konfigurasi = $this->konfigurasi_model->get_konfigurasi();
		$data = array( 'title'    			=> 'Kategori',
						'isi'     			=> 'admin/kategori/ubah_kategori',
						'data_kategori'  	=> $data_kategori,
						'get_konfigurasi'  => $get_konfigurasi
						);
		$this->load->view('admin/layout/wrapper', $data, FALSE);	
	}

	//ubah data Kategori
	public function ubah_data_kategori($id_kategori)
	{
	$id_kategori	= $id_kategori;
	$nama_kategori	= $this->input->post('nama_kategori');
	$slug_kategori  = url_title($this->input->post('nama_kategori'), 'dash', TRUE);
	$urutan			= $this->input->post('urutan');
	
		$ubah_kategori	= array('id_kategori'	=> $id_kategori,
								'nama_kategori'	=> $nama_kategori,
								'slug_kategori'	=> $slug_kategori,
								'urutan'	 		=> $urutan
								);
		$status = $this->kategori_model->ubah_kategori($ubah_kategori);
		if ($status >= 0) {
    		$this->session->set_flashdata("sukses", " Data Berhasil Ditambahkan..");
      		redirect('admin/kategori');
    	} else {
    		$this->session->set_flashdata("error", " Data Gagal Ditambahkan");
      		redirect('admin/kategori');
    	}
	}

	// Delete kategori
	public function hapus_kategori($id_kategori)
	{
		$hapus_kategori = array('id_kategori' => $id_kategori);
		$this->kategori_model->hapus_kategori($hapus_kategori);
		$this->session->set_flashdata('sukses', 'Data telah dihapus...');
		redirect(base_url('admin/kategori'),'refresh');
	}

	
}