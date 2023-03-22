<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth1 extends CI_Controller {

	public function __construct(){
 		parent::__construct(); 
		 $this->load->model('konfigurasi_model');
 		$this->load->model('admin_model');
 	}
	public function index()
	{
		$get_konfigurasi = $this->konfigurasi_model->get_konfigurasi();
		$this->form_validation->set_rules('username','Username','required',
			array ( 'required' 	=>'%s harus diisi'));
		$this->form_validation->set_rules('password','Password','required',
			array ( 'required' 	=>'%s harus diisi'));
		if($this->form_validation->run())
		{
			$username 	= $this->input->post('username');
			$password 	= $this->input->post('password');
			$this->libraries_login->aksi_login($username,$password);
		}

		$data = array( 'title'    			=> 'Login Admin',
						'get_konfigurasi' 	=> $get_konfigurasi,
	                    'isi'    	 		=> 'auth1/list'
	                     );	
		$this->load->view('auth1/list', $data, FALSE);
	}

}
