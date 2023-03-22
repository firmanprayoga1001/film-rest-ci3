<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class akun extends CI_Controller {
	public function __construct(){
 		parent::__construct(); 
 		$this->load->model('konfigurasi_model');
		$this->load->model('admin_model');
		$this->libraries_login->cek_login_master();
 	}
	//Buka Halaman Kategori
	public function index()
	{
		$get_konfigurasi = $this->konfigurasi_model->get_konfigurasi();
		$data_admin = $this->admin_model->data_admin();
		$data = array( 'title'    			=> 'Data Akun',
						'isi'     			=> 'admin/akun/list',
						'data_admin'  	    => $data_admin,
						'get_konfigurasi'   => $get_konfigurasi
						 );
		$this->load->view('admin/layout/wrapper', $data, FALSE);	
	}

	//Tambah Data Kategori
	public function tambah_akun()
	{
	    $valid = $this->form_validation;

		$valid->set_rules( 'nama_pengguna','Nama_Pengguna','required', 
			array(	'required'		=> '%s harus diisi'));

		$valid->set_rules('username','Username','required|min_length[6]|max_length[32]|is_unique[admin.username]',
			array(	'required'		=> '%s harus diisi',
					'min_length'	=> '%s minimal 6 karakter',
					'max_length'	=> '%s maksimal 32 karakter',
					'is_unique'		=> '%s sudah ada. Buat username baru.'));

		$valid->set_rules('password','password','required|min_length[6]',
			array(	'required'		=> '%s harus diisi',
					'min_length'	=> '%s minimal 6 karakter'));

		$valid->set_rules('status','Status','required',
			array(	'required'		=> '%s harus diisi'));
			
		if($valid->run()===FALSE) {
			$this->session->set_flashdata("error", "Data Gagal Ditambahkan");
			redirect(base_url('admin/akun'),'refresh');

		}else{
		$nama_pengguna	= $this->input->post('nama_pengguna');
		$username		= $this->input->post('username');
		$password		= SHA1($this->input->post('password'));
		$status			= $this->input->post('status');
		
    	$tambah_admin = array('nama_pengguna'    => $nama_pengguna,
								'username'		=> $username,
								'password'		=> $password,
								'status'		=> $status,
							);
    	$status = $this->admin_model->tambah_admin($tambah_admin);
    	
			if ($status >= 0) {
				$this->session->set_flashdata("sukses", " Data Berhasil Ditambahkan..");
				redirect(base_url('admin/akun'),'refresh');
			} else {
				$this->session->set_flashdata("error", " Data Gagal Ditambahkan");
				redirect(base_url('admin/akun'),'refresh');
			}
		}
	}

	//Tambah Data Kategori
	public function ubah_akun($id_admin)
	{
	    $get_konfigurasi = $this->konfigurasi_model->get_konfigurasi();
		$data_admin = $this->admin_model->detail_admin($id_admin);
		$valid = $this->form_validation;

		$valid->set_rules( 'nama_pengguna','Nama_Pengguna','required', 
			array(	'required'		=> '%s harus diisi'));

		$valid->set_rules('username','Username','required|min_length[6]|max_length[32]',
			array(	'required'		=> '%s harus diisi',
					'min_length'	=> '%s minimal 6 karakter',
					'max_length'	=> '%s maksimal 32 karakter',
					'is_unique'		=> '%s sudah ada. Buat username baru.'));

		$valid->set_rules('status','Status','required',
			array(	'required'		=> '%s harus diisi'));
			
		if($valid->run()===FALSE) {
		$data = array( 'title'    			=> 'Ubah Akun',
						'isi'     			=> 'admin/akun/ubah_akun',
						'data_admin'  	    => $data_admin,
						'get_konfigurasi'   => $get_konfigurasi
						 );
		$this->load->view('admin/layout/wrapper', $data, FALSE);

		}else{
		$id_admin 		= $id_admin;	
		$nama_pengguna	= $this->input->post('nama_pengguna');
		$username		= $this->input->post('username');
		$password		= SHA1($this->input->post('password'));
		$status			= $this->input->post('status');
		if($password >= 6) {
    	$ubah_admin = array('id_admin' 			=> $id_admin,
								'nama_pengguna' => $nama_pengguna,
								'username'		=> $username,
								'password'		=> $password,
								'status'		=> $status,
							);
		$status = $this->admin_model->ubah_admin($ubah_admin);
		} else {
			$ubah_admin = array('id_admin' 			=> $id_admin,
									'nama_pengguna' => $nama_pengguna,
									'username'		=> $username,
									'status'		=> $status,
								);
			$status = $this->admin_model->ubah_admin($ubah_admin);
		}
    	
			if ($status >= 0) {
				$this->session->set_flashdata("sukses", " Data Berhasil Diubah..");
				redirect(base_url('admin/akun'),'refresh');
			} else {
				$this->session->set_flashdata("error", " Data Gagal Ditambahkan..");
				redirect(base_url('admin/akun'),'refresh');
			}
		}
	}

	// Delete kategori
	public function hapus_akun($id_admin)
	{
		$hapus_admin = array('id_admin' => $id_admin);
		$this->admin_model->hapus_admin($hapus_admin);
		$this->session->set_flashdata('sukses', ' Data Telah Dihapus...');
		redirect(base_url('admin/akun'),'refresh');
	}

	
}