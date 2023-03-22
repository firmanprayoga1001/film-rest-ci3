<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

    function cek_login_user($email,$password){
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where(array(	'email'	    => $email,
                                'password'	=> SHA1($password)
                            ));
        $this->db->order_by('id_user', 'desc');
        $query = $this->db->get();
        return $query->row();
    }

    function ubah_user_data($ubah_data)
    {
        $this->db->where('id_user', $ubah_data->id_user);
        $this->db->update('user', $ubah_data);
    }

    function tambah_user_data($tambah_data)
    {
        $this->db->insert('user', $tambah_data);
    }
     
    // Total Video
	public function total_user()
	{
		$this->db->select('COUNT(*) AS total');
		$this->db->from('user');
		$query = $this->db->get();
		return $query->row();
	}
}
?>
