<?php  

class Rest_film_model extends CI_Model
{
	public function getFilm($var,$category)
	{
		if ($var === 'movie') {
			$this->db->select('video.*,
				kategori.nama_kategori,
				kategori.slug_kategori');

			$this->db->from('video');
			$this->db->join('kategori','kategori.id_kategori = video.id_kategori', 'left');
			$this->db->where('video.status','Publish');
			$this->db->like('kategori.nama_kategori',$var);
			$this->db->group_by('video.id_video');
			$this->db->order_by('tahun', 'desc');
			$query = $this->db->get();
			return $query->result();
		}
		if ($var === 'series') {
			$this->db->select('video.*,
				kategori.nama_kategori,
				kategori.slug_kategori');
			$this->db->from('video');
			$this->db->join('kategori','kategori.id_kategori = video.id_kategori', 'left');
			$this->db->where('video.status','Publish');
			$this->db->like('kategori.nama_kategori',$var);
			$this->db->group_by('video.id_video');
			$this->db->order_by('tahun', 'desc');
			$query = $this->db->get();
			return $query->result();
		}
		if ($var === 'korean') {
			$this->db->select('video.*,
				kategori.nama_kategori,
				kategori.slug_kategori');
			$this->db->from('video');
			$this->db->join('kategori','kategori.id_kategori = video.id_kategori', 'left');
			$this->db->where('video.status','Publish');
			$this->db->like('kategori.nama_kategori',$var);
			$this->db->group_by('video.id_video');
			$this->db->order_by('tahun', 'desc');
			$query = $this->db->get();
			return $query->result();
		}
		if ($category) {
			$this->db->select('video.*,
				kategori.nama_kategori,
				kategori.slug_kategori');
			$this->db->from('video');
			$this->db->join('kategori','kategori.id_kategori = video.id_kategori', 'left');
			$this->db->where('video.status','Publish');
			$this->db->like('kategori.nama_kategori',$category);
			$this->db->group_by('video.id_video');
			$this->db->order_by('tahun', 'desc');
			$query = $this->db->get();
			return $query->result();
		}
		//FOR SEARCH
		if ($var) {
			$this->db->select('video.*,
				kategori.nama_kategori,
				kategori.slug_kategori');
			$this->db->from('video');
			$this->db->join('kategori', 'kategori.id_kategori = video.id_kategori', 'left');
			$this->db->where('video.status','Publish');
			$this->db->like('video.judul_video',$var);
			$this->db->order_by('tahun', 'desc');
			$query = $this->db->get();
			return $query->result();
		}
	}
	public function detailFilm($id)
	{
		$this->db->select('video.*,
			kategori.nama_kategori,
			kategori.slug_kategori');
		$this->db->from('video');
		$this->db->join('kategori','kategori.id_kategori = video.id_kategori', 'left');
		$this->db->group_by('video.id_kategori');
		$this->db->where('id_video', $id);
		$this->db->order_by('id_video', 'desc');
		$query = $this->db->get();
		return $query->row();
	}
	
	public function getActor($id)
	{
		$this->db->select('aktor.*,
			video.judul_video,
			video.slug_video');
		$this->db->from('aktor');  
		$this->db->join('video', 'video.id_video = aktor.id_aktor', 'left');
		$this->db->where('aktor.id_video',$id);
		$this->db->order_by('id_aktor', 'asc');
		$query = $this->db->get();
		return $query->result();
	}
	public function getEpisodes($id){
		
		$this->db->select('episode.*,
			video.judul_video,
			video.slug_video,
			kategori.nama_kategori,
			kategori.slug_kategori,
			video_player.nama_player');
		$this->db->from('episode');  
		$this->db->join('video', 'video.id_video = episode.id_video', 'left');
		$this->db->join('kategori','kategori.id_kategori = video.id_kategori', 'left');
		$this->db->join('video_player', 'video_player.id_player = episode.id_player', 'left'); 
		$this->db->where('episode.id_video',$id);
		$this->db->order_by('urutan', 'asc');
		$query = $this->db->get();
		return $query->result();
	}
	public function detailEps($id_episode)
	{
		$this->db->select('episode.*,
			video.judul_video,
			video.gambar,
			video.genre,
			video.resolusi,
			video.jumlah_episode,
			video.sinopsis,
			video.keterangan,
			video.tahun,
			kategori.nama_kategori,
			video.slug_video,
			kategori.nama_kategori,
			kategori.slug_kategori,
			video_player.nama_player');
		$this->db->from('episode');
		$this->db->join('video', 'video.id_video = episode.id_video', 'left');
		$this->db->join('kategori','kategori.id_kategori = video.id_kategori', 'left'); 
		$this->db->join('video_player', 'video_player.id_player = episode.id_player', 'left'); 
		$this->db->where('id_episode', $id_episode);
		$this->db->order_by('id_episode', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

// Listing kategori
	public function getCategory($catlist) 
	{
		if ($catlist === 'listing_film') {
			$this->db->select('video.*,
				kategori.nama_kategori,
				kategori.urutan,
				kategori.slug_kategori');
			$this->db->from('video');
			$this->db->join('kategori', 'kategori.id_kategori = video.id_kategori', 'left');
			$this->db->group_by('video.id_kategori');
			$this->db->where('video.status', 'Publish');
			$this->db->order_by('urutan','asc');
			$query = $this->db->get();
			return $query->result();
		}	
	}
	public function deleteMahasiswa($id)
	{
		$this->db->delete('mahasiswa', ['id' => $id ]);
		return $this->db->affected_rows();
	}
	public function createdMahasiswa($data)
	{
		$this->db->insert('mahasiswa', $data );
		return $this->db->affected_rows();
	}
	public function updateMahasiswa($data, $id)
	{
		$this->db->update('mahasiswa', $data,  ['id' => $id ]);
		return $this->db->affected_rows();
	}

	// AUTHENTICATION
	function cekEmail($email){
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('email', $email);
		$this->db->order_by('id_user','desc');
		$query = $this->db->get();
		return $query->row();
	}
	function auth($email,$password){
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where(array(	'email'	    => $email,
			'password'	=> SHA1($password)
		));
		$this->db->order_by('id_user', 'desc');
		$query = $this->db->get();
		return $query->row();
	}
}