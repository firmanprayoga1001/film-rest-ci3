<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class video_series extends CI_Controller {
	public function __construct(){
		parent::__construct(); 
		$this->load->model('konfigurasi_model');
		$this->load->model('videoku_model');
		$this->load->model('kategori_model');
		$this->load->model('aktor_model');
		$this->load->model('video_player_model');
		$this->libraries_login->cek_login();
	}
 	//Buka Halaman Video Series
	public function index()
	{
		$get_konfigurasi = $this->konfigurasi_model->get_konfigurasi();
		$data_kategori = $this->kategori_model->data_kategori_series();
		$data_series = $this->videoku_model->data_video_series();
		$data = array( 'title'    			=> 'Video Series',
			'isi'     			=> 'admin/video_series/list',
			'data_kategori'  	=> $data_kategori,
			'data_series'  		=> $data_series,
			'get_konfigurasi'  => $get_konfigurasi
		);
		$this->load->view('admin/layout/wrapper', $data, FALSE);	

	}
	 //Buka Halaman Kelola Video
	public function kelolavideo()
	{
		$get_konfigurasi 	= $this->konfigurasi_model->get_konfigurasi();
		$data_kategori 	= $this->kategori_model->data_kategori_series();
		$data_series 		= $this->videoku_model->data_video_series();
		$data = array( 'title'    			=> 'Kelola Video',
			'isi'     			=> 'admin/video_series/kelolavideo',
			'data_kategori'  	=> $data_kategori,
			'data_series'  	=> $data_series,
			'get_konfigurasi'  => $get_konfigurasi
		);
		$this->load->view('admin/layout/wrapper', $data, FALSE);	

	}
	
	 //Tambah Data Video
	public function tambah_video()	
	{
		$get_konfigurasi = $this->konfigurasi_model->get_konfigurasi();
		$data_series = $this->videoku_model->data_video_series();
		$data_kategori = $this->kategori_model->data_kategori_series();

		$valid =$this->form_validation;

		$valid->set_rules('judul_video','Judul_Video','required',
			array( 'required'          =>'%s harus di isi'));
		$valid->set_rules('tahun','Tahun','required',
			array( 'required'          =>'%s harus di isi'));
		$valid->set_rules('genre','Genre','required',
			array( 'required'          =>'%s harus di isi'));
		$valid->set_rules('resolusi','Resolusi','required',
			array( 'required'          =>'%s harus di isi'));
		$valid->set_rules('link_trailer','Link_Trailer','required',
			array( 'required'          =>'%s harus di isi'));
		$valid->set_rules('sinopsis','Sinopsis');

		if($valid->run()===FALSE) {
			$data = array( 'title'  			=> 'Kelola Video',
				'isi'    			=> 'admin/video_series/kelolavideo',
				'data_kategori'  	=> $data_kategori,
				'data_series'  		=> $data_series,
				'get_konfigurasi'  	=> $get_konfigurasi);

			$this->load->view('admin/layout/wrapper', $data, FALSE);	
		} else {
			function upload(){
				$namaFile = $_FILES['gambar']['name'];
				$ukuranFile = $_FILES['gambar']['size'];
				$error = $_FILES['gambar']['error'];
				$tmpName = $_FILES['gambar']['tmp_name'];
				if ( $error === 4){
					echo "<script>
					alert('pilih gambar')
					</script>";
					return false;
					redirect('admin/video_series/kelolavideo');
				}
				$ekstensiGambarValid = ['jpg','jpeg','png'];
				$ekstensiGambar = explode('.',$namaFile);
				$ekstensiGambar = strtolower(end($ekstensiGambar));
				if ( !in_array($ekstensiGambar, $ekstensiGambarValid) ){
					echo "<script>
					alert('bukan gambar')
					</script>";
					return false;
					redirect('admin/video_series/kelolavideo');
				}
				if ($ukuranFile > 1000000){
					echo "<script>
					alert('ukuran besar')
					</script>";
					return false;
					redirect('admin/video_series/kelolavideo');
				}
				$namaFileBaru = uniqid();
				$namaFileBaru .= '.';
				$namaFileBaru .= $ekstensiGambar;	
				move_uploaded_file($tmpName,'./assets/gambar/thumbnail/'.$namaFileBaru);
				return $namaFileBaru;
			}
			$id_kategori	= $this->input->post('id_kategori');
			$judul_video 	= $this->input->post('judul_video');
			$tahun 			= $this->input->post('tahun');
			$genre			= $this->input->post('genre');
			$resolusi		= $this->input->post('resolusi');
			$keterangan		= 'Ongoing';
			$link_trailer 	= $this->input->post('link_trailer');
			$sinopsis 		= $this->input->post('sinopsis');
			$hiden 			= 'Hiden';
			$gambar = upload();
			$tambah_video	= array('id_kategori'	=> $id_kategori,
				'judul_video' 	=> $judul_video,
				'tahun' 		=> $tahun,
				'gambar' 		=> $gambar,
				'genre'		 	=> $genre,
				'resolusi'		=> $resolusi,
				'keterangan'	=> $keterangan,
				'link_trailer' 	=> $link_trailer,
				'sinopsis' 		=> $sinopsis,
				'status'		=> $hiden,
				'tanggal_post'	=> date('Y-m-d H:i:s')
			);

			$status = $this->videoku_model->tambah_video($tambah_video);

			if ($status >= 0) {
				$this->session->set_flashdata("sukses", "Data Berhasil Ditambahkan..");
				redirect('admin/video_series/kelolavideo');
			} else {
				$this->session->set_flashdata("error", "Data Gagal Ditambahkan..");
				redirect('admin/video_series/kelolavideo');
			}
		}

	}

	 //Ubah Data Video
	public function ubah_video($id_video)
	{
		$data_series 		= $this->videoku_model->detail_video_series($id_video);
		$get_konfigurasi 	= $this->konfigurasi_model->get_konfigurasi();
		$data_kategori 	= $this->kategori_model->data_kategori_series();
		$file = $data_series->gambar;
		$valid =$this->form_validation;
		$valid->set_rules('judul_video','Judul_Video','required',
			array( 'required'          =>'%s harus di isi'));
		$valid->set_rules('tahun','Tahun','required',
			array( 'required'          =>'%s harus di isi'));
		$valid->set_rules('genre','Genre','required',
			array( 'required'          =>'%s harus di isi'));
		$valid->set_rules('resolusi','Resolusi','required',
			array( 'required'          =>'%s harus di isi'));
		$valid->set_rules('keterangan','Keterangan','required',
			array( 'required'          =>'%s harus di isi'));
		$valid->set_rules('link_trailer','Link_Trailer','required',
			array( 'required'          =>'%s harus di isi'));
		$valid->set_rules('sinopsis','Sinopsis');


		if($valid->run()===FALSE) {
			$data = array( 'title'  		=> 'Ubah Video',
				'isi'    		=> 'admin/video_series/ubahvideo',
				'data_kategori'  	=> $data_kategori,
				'data_series'  	=> $data_series,
				'get_konfigurasi'  => $get_konfigurasi);

			$this->load->view('admin/layout/wrapper', $data, FALSE);	
		} else {
			function upload(){

				$namaFile = $_FILES['gambar']['name'];
				$ukuranFile = $_FILES['gambar']['size'];
				$error = $_FILES['gambar']['error'];
				$tmpName = $_FILES['gambar']['tmp_name'];
				if ( $error === 4){
					echo "<script>
					alert('pilih gambar')
					</script>";
					return false;
					redirect('admin/video_series/ubahvideo');
				}
				$ekstensiGambarValid = ['jpg','jpeg','png'];
				$ekstensiGambar = explode('.',$namaFile);
				$ekstensiGambar = strtolower(end($ekstensiGambar));
				if ( !in_array($ekstensiGambar, $ekstensiGambarValid) ){
					echo "<script>
					alert('bukan gambar')
					</script>";
					return false;
					redirect('admin/video_series/ubahvideo');
				}
				if ($ukuranFile > 1000000){
					echo "<script>
					alert('ukuran besar')
					</script>";
					return false;
					redirect('admin/video_series/ubahvideo');
				} 
				$namaFileBaru = uniqid();
				$namaFileBaru .= '.';
				$namaFileBaru .= $ekstensiGambar;	
				move_uploaded_file($tmpName,'./assets/gambar/thumbnail/'.$namaFileBaru);
				return $namaFileBaru; 
			}
			$id_video		= $id_video;
			$id_kategori	= $this->input->post('id_kategori');
			$judul_video 	= $this->input->post('judul_video');
			$tahun		 	= $this->input->post('tahun');
			$genre			= $this->input->post('genre');
			$resolusi		= $this->input->post('resolusi');
			$keterangan	= $this->input->post('keterangan');
			$link_trailer 	= $this->input->post('link_trailer');
			$sinopsis 		= $this->input->post('sinopsis');
			$gambar = upload();
			if ( $gambar === false ){
				$ubah_video	= array('id_video'	    => $id_video,
					'id_kategori'	=> $id_kategori,
					'judul_video'	=> $judul_video,
					'tahun' 		=> $tahun,
					'genre'		=> $genre,
					'resolusi'	 	=> $resolusi,
					'keterangan'	=> $keterangan,
					'link_trailer' => $link_trailer,
					'sinopsis' 	=> $sinopsis
				);
				$status = $this->videoku_model->ubah_video($ubah_video);
				if ($status >= 0) {
					$this->session->set_flashdata("sukses", "Data Berhasil Diubah..");
					redirect('admin/video_series/kelolavideo');
				} else {
					$this->session->set_flashdata("error", "Data Gagal Diubah..");
					redirect('admin/video_series/ubahvideo');
				}
			} else

			$ubah_video	= array('id_video'	    => $id_video,
				'id_kategori'	=> $id_kategori,
				'judul_video'	=> $judul_video,
				'tahun' 		=> $tahun,
				'gambar' 		=> $gambar,
				'genre'		=> $genre,
				'resolusi'	 	=> $resolusi,
				'keterangan'	=> $keterangan,
				'link_trailer' => $link_trailer,
				'sinopsis' 	=> $sinopsis
			);

			if (file_exists("./assets/gambar/thumbnail/$file")){
				unlink("./assets/gambar/thumbnail/$file"); }
				$status = $this->videoku_model->ubah_video($ubah_video);

				if ($status >= 0) {
					$this->session->set_flashdata("sukses", "Data Berhasil Diubah..");
					redirect('admin/video_series/kelolavideo');
				} else {
					$this->session->set_flashdata("error", "Data Gagal Diubah..");
					redirect('admin/video_series/ubahvideo');
				}
			}
		}

	//ubah menjadi publish
		public function publish($id_video){
			$data_series 		= $this->videoku_model->detail_video_series($id_video);
			$id_video			= $id_video;
			$publish 			= 'Publish';
			$ubah_video	= array('id_video'=> $id_video,'status'=> $publish);
			$status = $this->videoku_model->ubah_video($ubah_video);
			if ($status >= 0) {
				$this->session->set_flashdata("sukses", $data_series->judul_video." Dipublish..");
				redirect('admin/video_series/kelolavideo');
			} else {
				$this->session->set_flashdata("pesan", "Data Gagal Diubah..");
				redirect('admin/video_series/ubahvideo');
			}
		}
	//Ubah menjadi hiden
		public function hiden($id_video){
			$data_series 		= $this->videoku_model->detail_video_series($id_video);
			$id_video			= $id_video;
			$hiden 				= 'Hiden';
			$ubah_video	= array('id_video'=> $id_video,'status'=> $hiden);
			$status = $this->videoku_model->ubah_video($ubah_video);
			if ($status >= 0) {
				$this->session->set_flashdata("sukses",$data_series->judul_video." Disembunyikan..");
				redirect('admin/video_series/kelolavideo');
			} else {
				$this->session->set_flashdata("pesan","Data Gagal Diubah..");
				redirect('admin/video_series/ubahvideo');
			}
		}
	// Hapus Video
		public function hapus_video($id_video)
		{
			$data_series 		= $this->videoku_model->detail_video_series($id_video);
			$file = $data_series->gambar;
			if (file_exists("./assets/gambar/thumbnail/$file")){
				unlink("./assets/gambar/thumbnail/$file"); }
				$hapus_video = array('id_video' => $id_video);
				$this->videoku_model->hapus_video($hapus_video);
				$this->session->set_flashdata('sukses', $data_series->judul_video.' Telah Dihapus..');
				redirect(base_url('admin/video_series/kelolavideo'),'refresh');
			}


	//============================================================ BAGIAN EPISODE ============================================================

		 //Buka Kelola Episode
			public function episode($id_video)
			{
				$data_series 		= $this->videoku_model->detail_video_series($id_video);
				$data_episode 		= $this->videoku_model->data_episode($id_video);
				$data_aktor 		= $this->aktor_model->data_aktor($id_video);
				$get_konfigurasi 	= $this->konfigurasi_model->get_konfigurasi();
				$data_kategori 		= $this->kategori_model->data_kategori();
				$data_video_player 	= $this->video_player_model->data_video_player();
				$data = array( 'title'  	=> 'Episode',
					'isi'    		=> 'admin/video_series/episode',
					'data_kategori'  	=> $data_kategori,
					'data_video_player' => $data_video_player,
					'data_series'  	=> $data_series,
					'data_episode'  	=> $data_episode,
					'data_aktor'  		=> $data_aktor,
					'get_konfigurasi'  => $get_konfigurasi);
				$this->load->view('admin/layout/wrapper', $data, FALSE);		

			}

		 //Tambah Data Episode
			public function tambah_episode($id_video)

			{
				$data_series  	= $this->videoku_model->detail_video_series($id_video);
				$jumlah_episode	= $this->videoku_model->total_episode($id_video);	
				$id_video		= $data_series->id_video;
				$judul_episode 	= $this->input->post('judul_episode');
				$urutan 		= $this->input->post('urutan');
				$link_nonton 	= $this->input->post('link_nonton');
				$link_download 	= $this->input->post('link_download');
				$id_player 		= $this->input->post('id_player');
				$hiden 			= 'Hiden';
				$tambah_episode	= array('id_video	'	=> $id_video,
					'judul_episode' => $judul_episode,
					'urutan' 		=> $urutan,
					'link_nonton' 	=> $link_nonton,
					'link_download' => $link_download,
					'id_player' 	=> $id_player,
					'status'		=> $hiden);
				$this->videoku_model->tambah_episode($tambah_episode);

				$ubah_video	= array('id_video'=> $id_video,'jumlah_episode'=> $jumlah_episode->total + 1);	
				$status = $this->videoku_model->ubah_video($ubah_video);


				if ($status >= 0) {
					$this->session->set_flashdata("sukses", "Episode Berhasil Ditambahkan..");
					redirect('admin/video_series/episode/'.$id_video);
				} else {
					$this->session->set_flashdata("error", "Episode Gagal Ditambahkan..");
					redirect('admin/video_series/episode/'.$id_video);
				}
			}
		 //Ubah Data Episode
			public function ubah_episode($id_episode)
			{
				$data_episode  = $this->videoku_model->detail_episode($id_episode);
				$get_konfigurasi 	= $this->konfigurasi_model->get_konfigurasi();
				$data_video_player 	= $this->video_player_model->data_video_player();

				if ($_POST==true){

					$id_episode	= $data_episode->id_episode;
					$id_video		= $data_episode->id_video;
					$judul_episode = $this->input->post('judul_episode');
					$urutan 		= $this->input->post('urutan');
					$link_nonton 	= $this->input->post('link_nonton');
					$link_download = $this->input->post('link_download');
					$id_player 		= $this->input->post('id_player');

					$ubah_episode	= array( 'id_episode'    	=> $id_episode,
						'judul_episode'	=> $judul_episode,
						'urutan' 		 	=> $urutan,
						'link_nonton' 	 	=> $link_nonton,
						'link_download' 	=> $link_download,
						'id_player' 		=> $id_player
					);

					$status = $this->videoku_model->ubah_episode($ubah_episode);

					if ($status >= 0) {
						$this->session->set_flashdata("sukses", "Episode Berhasil Diubah..");
						redirect('admin/video_series/episode/'.$id_video);
					} else {
						$this->session->set_flashdata("error", "Episode Gagal Diubah..");
						redirect('admin/video_series/ubah_episode/'.$id_episode);
					}

				}else{
					$data = array( 'title'  			=> 'Ubah Video',
						'isi'    			=> 'admin/video_series/ubah_episode',
						'data_episode'		=> $data_episode,
						'get_konfigurasi'	=> $get_konfigurasi,
						'data_video_player' => $data_video_player);

					$this->load->view('admin/layout/wrapper', $data, FALSE);
				}
			}
		 //ubah menjadi publish episode
			public function publish_episode($id_episode){
				$data_episode  = $this->videoku_model->detail_episode($id_episode);
				$id_episode			= $id_episode;
				$id_video			= $data_episode->id_video;
				$publish 			= 'Publish';
				$ubah_episode	= array('id_episode'=> $id_episode,'status'=> $publish);
				$status = $this->videoku_model->ubah_episode($ubah_episode);
				if ($status >= 0) {
					$this->session->set_flashdata("sukses", "Episode Ke-".$data_episode->urutan." Dipublish..");
					redirect('admin/video_series/episode/'.$id_video);
				} else {
					$this->session->set_flashdata("error", "Episode Gagal Diubah..");
					redirect('admin/video_series/episode/'.$id_video);
				}
			}
		//ubah menjadi hiden episode
			public function hiden_episode($id_episode){
				$data_episode  = $this->videoku_model->detail_episode($id_episode);
				$id_episode			= $id_episode;
				$id_video			= $data_episode->id_video;
				$hiden 				= 'Hiden';
				$ubah_episode	= array('id_episode'=> $id_episode,'status'=> $hiden);
				$status = $this->videoku_model->ubah_episode($ubah_episode);
				if ($status >= 0) {
					$this->session->set_flashdata("sukses", "Episode Ke-".$data_episode->urutan." Disembunyikan..");
					redirect('admin/video_series/episode/'.$id_video);
				} else {
					$this->session->set_flashdata("error", "Episode Gagal Diubah..");
					redirect('admin/video_series/episode/'.$id_video);
				}
			}

		// Hapus Episode
			public function hapus_episode($id_episode)
			{
				$data_episode = $this->videoku_model->detail_episode($id_episode);
				$id_video = $data_episode->id_video;
				$jumlah_episode		= $this->videoku_model->total_episode($id_video);	

				$hapus_episode = array('id_episode' => $id_episode);
				$this->videoku_model->hapus_episode($hapus_episode);

				$ubah_video	= array('id_video'=> $id_video,'jumlah_episode'=> $jumlah_episode->total - 1);	
				$this->videoku_model->ubah_video($ubah_video);

				$this->session->set_flashdata("sukses", "Episode Ke-".$data_episode->urutan." Telah Duhapus..");
				redirect(base_url('admin/video_series/episode/'.$id_video),'refresh');
			}

		// =============================================================BAGIAN AKTOR================================================================
		//Tambah Data Aktor
			public function tambah_aktor($id_video)

			{	
				$id_video		= $id_video;
				$nama_aktor 	= $this->input->post('nama_aktor');
				$link_foto 		= $this->input->post('link_foto');
				$belum_ada 		= 'Belum Ada';
				if($link_foto == false){
					$tambah_aktor	= array('id_video'		=> $id_video,
						'nama_aktor' 	=> $nama_aktor,
						'link_foto' 	=> $belum_ada,
					);
					$this->aktor_model->tambah_aktor($tambah_aktor);

					if ($status >= 0) {
						$this->session->set_flashdata("sukses", "Aktor Berhasil Ditambahkan..");
						redirect('admin/video_series/episode/'.$id_video);
					} else {
						$this->session->set_flashdata("error", "Aktor Gagal Ditambahkan..");
						redirect('admin/video_series/episode/'.$id_video);
					}
				} else {
					$tambah_aktor	= array('id_video'		=> $id_video,
						'nama_aktor' 	=> $nama_aktor,
						'link_foto' 	=> $link_foto,
					);
					$this->aktor_model->tambah_aktor($tambah_aktor);

					if ($status >= 0) {
						$this->session->set_flashdata("sukses", "Aktor Berhasil Ditambahkan..");
						redirect('admin/video_series/episode/'.$id_video);
					} else {
						$this->session->set_flashdata("error", "Aktor Gagal Ditambahkan..");
						redirect('admin/video_series/episode/'.$id_video);
					}
				}

			}
			public function ubah_aktor($id_aktor)

			{	
				$detail_aktor = $this->aktor_model->detail_aktor($id_aktor);
				$id_video		= $detail_aktor->id_video;
				$id_aktor		= $id_aktor;
				$nama_aktor 	= $this->input->post('nama_aktor');
				$link_foto 		= $this->input->post('link_foto');
				$belum_ada 		= 'Belum Ada';
				if($link_foto == false){
					$ubah_aktor	= array('id_aktor'		=> $id_aktor,
						'nama_aktor' 	=> $nama_aktor,
						'link_foto' 	=> $belum_ada,
					);
					$this->aktor_model->ubah_aktor($ubah_aktor);

					if ($status >= 0) {
						$this->session->set_flashdata("sukses", "Aktor Berhasil Diubah..");
						redirect('admin/video_series/episode/'.$id_video);
					} else {
						$this->session->set_flashdata("error", "Aktor Gagal Diubah..");
						redirect('admin/video_series/episode/'.$id_video);
					}
				} else {
					$ubah_aktor	= array('id_aktor'		=> $id_aktor,
						'nama_aktor' 	=> $nama_aktor,
						'link_foto' 	=> $link_foto,
					);
					$this->aktor_model->ubah_aktor($ubah_aktor);

					if ($status >= 0) {
						$this->session->set_flashdata("sukses", "Aktor Berhasil Diubah..");
						redirect('admin/video_series/episode/'.$id_video);
					} else {
						$this->session->set_flashdata("error", "Aktor Gagal Diubah..");
						redirect('admin/video_series/episode/'.$id_video);
					}
				}

			}

			public function hapus_aktor($id_aktor)
			{
				$detail_aktor = $this->aktor_model->detail_aktor($id_aktor);
				$id_video		= $detail_aktor->id_video;
				$hapus_aktor = array('id_aktor' => $id_aktor);
				$this->aktor_model->hapus_aktor($hapus_aktor);

				$this->session->set_flashdata("sukses", $detail_aktor->nama_aktor." Telah Duhapus..");
				redirect(base_url('admin/video_series/episode/'.$id_video),'refresh');
			}


		}