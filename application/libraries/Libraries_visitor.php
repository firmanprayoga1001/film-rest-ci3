<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Libraries_visitor
{
	protected $CI;

	public function __construct()
	{
        $this->CI =& get_instance();
        // Load data model user
        $this->CI->load->model('pengunjung_model');
	}
    function tambah_pengunjung(){ 
		
        $data_pengunjung = $this->CI->pengunjung_model->data_pengunjung();
        if(!isset($_SESSION['']))
			{
			$_SESSION[''] = session_id();
			$status = $this->CI->db->query("UPDATE pengunjung SET jumlah = $data_pengunjung->jumlah + 1 WHERE id_pengunjung = '1'");
			}
    }
}