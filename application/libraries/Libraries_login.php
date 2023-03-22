<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Libraries_login
{
	protected $CI;

	public function __construct()
	{
        $this->CI =& get_instance();
        // Load data model user
        $this->CI->load->model('admin_model');
        $this->CI->load->model('user_model');
	}
    function aksi_login($username,$password){ 
		
        $cek = $this->CI->admin_model->cek_login($username,$password);
    
        if($cek){
    
            $id_admin = $cek->id_admin;
            $nama_pengguna = $cek->nama_pengguna;
            $username = $cek->username;
            $status = $cek->status;		 
            $this->CI->session->set_userdata('id_admin',$id_admin);
            $this->CI->session->set_userdata('nama_pengguna',$nama_pengguna);
            $this->CI->session->set_userdata('username',$username);
            $this->CI->session->set_userdata('status',$status);
            redirect('admin/dasbor');
        } else {
            $this->CI->session->set_flashdata('error', 'Username atau Password Salah...');
            redirect('auth1');
            }
        }
// Fungsi cek login
	public function cek_login()
	{
		// Memeriksa apakah session sudah atau belum, jika belum alihkan kehalaman login
		if($this->CI->session->userdata('username') == "") {
			$this->CI->session->set_flashdata('pesan', 'Anda belum login !!!');
			redirect(base_url('auth1'),'refresh');	
		}
	}
    public function cek_login_user()
	{
		// Memeriksa apakah session sudah atau belum, jika belum alihkan kehalaman login
		if($this->CI->session->userdata('usia') < 18 ) {
			$this->CI->session->set_flashdata('pesan', 'Anda belum login !!!');
			redirect(base_url('login_user'),'refresh');	
		}
	}
    public function cek_login_master()
	{
		// Memeriksa apakah session sudah atau belum, jika belum alihkan kehalaman login
		if($this->CI->session->userdata('status') == "Master") {	
		} else {
            $this->CI->session->set_flashdata('pesan', 'Anda Bukan Master Admin !!!');
            redirect(base_url('admin/dasbor'),'refresh');	
        }
	}
    public function aksi_logout()
	{
		$this->CI->session->unset_userdata('nama');
		$this->CI->session->unset_userdata('id_admin');
		$this->CI->session->unset_userdata('status');
		$this->CI->session->set_flashdata('sukses', 'Berhasil Log Out ...');
		session_destroy();
		redirect('auth1');
	}
}