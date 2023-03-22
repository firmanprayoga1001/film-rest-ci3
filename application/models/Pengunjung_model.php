<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengunjung_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	//Tampilkan data kategori
	public function data_pengunjung(){
        return $this->db->query("select * from pengunjung where id_pengunjung = '1'")->row();
    }
}