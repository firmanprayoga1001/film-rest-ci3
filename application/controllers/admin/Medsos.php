<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class medsos extends CI_Controller {
	public function __construct(){
 		parent::__construct(); 
 		$this->load->model('konfigurasi_model');
		$this->load->model('medsos_model');
		$this->libraries_login->cek_login_master();
 	}
	//Buka Halaman medsos
	public function index()
	{
		$get_konfigurasi = $this->konfigurasi_model->get_konfigurasi();
		$data_medsos = $this->medsos_model->data_medsos();
		$data = array( 'title'    			=> 'medsos',
						'isi'     			=> 'admin/medsos/list',
						'data_medsos'  	=> $data_medsos,
						'get_konfigurasi'   => $get_konfigurasi
						 );
		$this->load->view('admin/layout/wrapper', $data, FALSE);	
	}
	public function ubah_medsos($id_medsos)
	{
	$id_medsos	= $id_medsos;
	$link	= $this->input->post('link');
	
		$ubah_medsos	= array('id_medsos'	=> $id_medsos,
								'link'	=> $link,
								);
		$status = $this->medsos_model->ubah_medsos($ubah_medsos);
		if ($status >= 0) {
    		$this->session->set_flashdata("sukses", " Data Berhasil Ditambahkan..");
      		redirect('admin/medsos');
    	} else {
    		$this->session->set_flashdata("error", " Data Gagal Ditambahkan");
      		redirect('admin/medsos');
    	}
	}
	public function publish_medsos($id_medsos){
		$id_medsos			= $id_medsos;
		$publish 			= 'publish';
		$ubah_medsos	= array('id_medsos'=> $id_medsos,'status'=> $publish);
		$status = $this->medsos_model->ubah_medsos($ubah_medsos);
		if ($status >= 0) {
			$this->session->set_flashdata("sukses", "medsos Dipublish..");
			  redirect('admin/medsos');
			} else {
				$this->session->set_flashdata("error", "medsos Gagal Dipublish..");
				redirect('admin/medsos');
			}
	}

	public function hiden_medsos($id_medsos){
		$id_medsos			= $id_medsos;
		$hiden 				= 'hiden';
		$ubah_medsos	= array('id_medsos'=> $id_medsos,'status'=> $hiden);
		$status = $this->medsos_model->ubah_medsos($ubah_medsos);
		if ($status >= 0) {
			$this->session->set_flashdata("sukses", "medsos Disembunyikan..");
			redirect('admin/medsos');
		  } else {
			$this->session->set_flashdata("error", "medsos Gagal Disembunyikan..");
			  redirect('admin/medsos');
		  }
	}

}