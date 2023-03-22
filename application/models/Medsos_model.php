<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Medsos_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	//Tampilkan data medsos
	public function data_medsos(){
        return $this->db->query("select * from medsos")->result();
    }
    public function ubah_medsos($ubah_medsos)
	{
		$this->db->where('id_medsos', $ubah_medsos['id_medsos']);
		$this->db->update('medsos',$ubah_medsos);
	}
}