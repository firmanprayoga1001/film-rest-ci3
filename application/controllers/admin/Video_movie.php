<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class video_movie extends CI_Controller {
	public function __construct(){
 		parent::__construct(); 
 		$this->load->model('konfigurasi_model');
		$this->load->model('videoku_model');
		$this->load->model('kategori_model');
		$this->libraries_login->cek_login();
 	}
 	//Buka Halaman Videoku
	 public function index() 
	 {
		 $get_konfigurasi = $this->konfigurasi_model->get_konfigurasi();
		 $data_kategori = $this->kategori_model->data_kategori();
		 $data_movie = $this->videoku_model->data_movie();
		 $data = array( 'title'    			=> 'Video Movie',
						 'isi'     			=> 'admin/video_movie/list',
						 'data_kategori'  	=> $data_kategori,
						 'data_movie'  		=> $data_movie,
						 'get_konfigurasi'  => $get_konfigurasi
						  );
		 $this->load->view('admin/layout/wrapper', $data, FALSE);	 
	 }
	 //Buka Halaman Kelola Video
	 public function kelolavideo()
	 {
		 $get_konfigurasi = $this->konfigurasi_model->get_konfigurasi();
		 $data_kategori = $this->kategori_model->data_kategori_movie();
		 $data_movie = $this->videoku_model->data_movie();
		 $data = array( 'title'    			=> 'Kelola Video Movie',
						 'isi'     			=> 'admin/video_movie/kelolavideo',
						 'data_kategori'  	=> $data_kategori,
						 'data_movie'  		=> $data_movie,
						 'get_konfigurasi'  => $get_konfigurasi
						  );
		 $this->load->view('admin/layout/wrapper', $data, FALSE);	 
	 }
	
	 //Tambah Data Video
	public function tambah_video()
	{
		$get_konfigurasi = $this->konfigurasi_model->get_konfigurasi();
		$data_movie = $this->videoku_model->data_movie();
		$data_kategori = $this->kategori_model->data_kategori_movie();

		$valid =$this->form_validation;

		$valid->set_rules('judul_video','Judul_Video','required',
	    array( 'required'          =>'%s harus di isi'));
		$valid->set_rules('tahun','Tahun','required',
	    array( 'required'          =>'%s harus di isi'));
		$valid->set_rules('genre','Genre','required',
	    array( 'required'          =>'%s harus di isi'));
		$valid->set_rules('durasi','Durasi','required',
	    array( 'required'          =>'%s harus di isi'));
		$valid->set_rules('resolusi','Resolusi','required',
	    array( 'required'          =>'%s harus di isi'));
		$valid->set_rules('ukuran','Ukuran','required',
	    array( 'required'          =>'%s harus di isi'));
		$valid->set_rules('link_download','Link_Download','required',
	    array( 'required'          =>'%s harus di isi'));
		$valid->set_rules('link_nonton','Link_Nonton','required',
	    array( 'required'          =>'%s harus di isi'));
		$valid->set_rules('link_trailer','Link_Trailer','required',
	    array( 'required'          =>'%s harus di isi'));
		$valid->set_rules('sinopsis','Sinopsis');

	    if($valid->run()===FALSE) {
       	$data = array( 'title'  			=> 'Kelola Video',
	                    'isi'    			=> 'admin/video_movie/kelolavideo',
						'data_kategori'  	=> $data_kategori,
						'data_movie'  		=> $data_movie,
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
				redirect('admin/video_movie/kelolavideo');
			}
			$ekstensiGambarValid = ['jpg','jpeg','png'];
			$ekstensiGambar = explode('.',$namaFile);
			$ekstensiGambar = strtolower(end($ekstensiGambar));
			if ( !in_array($ekstensiGambar, $ekstensiGambarValid) ){
			echo "<script>
				alert('bukan gambar')
				</script>";
				return false;
				redirect('admin/video_movie/kelolavideo');
			}
			if ($ukuranFile > 1000000){
				echo "<script>
				alert('ukuran besar')
				</script>";
				return false;
				redirect('admin/video_movie/kelolavideo');
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
		$durasi			= $this->input->post('durasi');
		$resolusi		= $this->input->post('resolusi');
		$ukuran			= $this->input->post('ukuran');
		$link_download 	= $this->input->post('link_download');
		$link_nonton 	= $this->input->post('link_nonton');
		$link_trailer 	= $this->input->post('link_trailer');
		$sinopsis 		= $this->input->post('sinopsis');
		$hiden 			= 'Hiden';
		$gambar = upload();
    	$tambah_video	= array('id_kategori'	=> $id_kategori,
								'judul_video' 	=> $judul_video,
								'tahun' 		=> $tahun,
								'gambar' 		=> $gambar,
								'genre'		 	=> $genre,
								'durasi'	 	=> $durasi,
								'resolusi'	 	=> $resolusi,
								'ukuran'	 	=> $ukuran,
								'link_download'	=> $link_download,
								'link_nonton' 	=> $link_nonton,
								'link_trailer' 	=> $link_trailer,
								'sinopsis' 		=> $sinopsis,
								'status'		=> $hiden,
								'tanggal_post'	=> date('Y-m-d H:i:s')
								);
		
    	$status = $this->videoku_model->tambah_video($tambah_video);
    	
    	if ($status >= 0) {
    		$this->session->set_flashdata("sukses", "Data Berhasil Ditambahakan..");
      		redirect('admin/video_movie/kelolavideo');
    	} else {
    		$this->session->set_flashdata("error", "Data Gagal Ditambahkan..");
      		redirect('admin/video_movie/kelolavideo');
    	}
       }

    }
	
	 //Ubah Data Video
	 public function ubah_video($id_video)
	
	 {
		$data_movie 		= $this->videoku_model->detail_video($id_video);
		$get_konfigurasi 	= $this->konfigurasi_model->get_konfigurasi();
		$data_kategori 	= $this->kategori_model->data_kategori_movie();
		$file = $data_movie->gambar;
		

 
		$valid =$this->form_validation;
		$valid->set_rules('judul_video','Judul_Video','required',
	    array( 'required'          =>'%s harus di isi'));
		$valid->set_rules('tahun','Tahun','required',
	    array( 'required'          =>'%s harus di isi'));
		$valid->set_rules('genre','Genre','required',
	    array( 'required'          =>'%s harus di isi'));
		$valid->set_rules('durasi','Durasi','required',
	    array( 'required'          =>'%s harus di isi'));
		$valid->set_rules('resolusi','Resolusi','required',
	    array( 'required'          =>'%s harus di isi'));
		$valid->set_rules('ukuran','Ukuran','required',
	    array( 'required'          =>'%s harus di isi'));
		$valid->set_rules('link_download','Link_Download','required',
	    array( 'required'          =>'%s harus di isi'));
		$valid->set_rules('link_nonton','Link_Nonton','required',
	    array( 'required'          =>'%s harus di isi'));
		$valid->set_rules('link_trailer','Link_Trailer','required',
	    array( 'required'          =>'%s harus di isi'));
		$valid->set_rules('sinopsis','Sinopsis');

 
		 if($valid->run()===FALSE) {
			$data = array( 'title'  		=> 'Ubah Video',
							'isi'    		=> 'admin/video_movie/ubahvideo',
						 'data_kategori'  	=> $data_kategori,
						 'data_movie'  		=> $data_movie,
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
				 redirect('admin/video_movie/ubahvideo');
			 }
			 $ekstensiGambarValid = ['jpg','jpeg','png'];
			 $ekstensiGambar = explode('.',$namaFile);
			 $ekstensiGambar = strtolower(end($ekstensiGambar));
			 if ( !in_array($ekstensiGambar, $ekstensiGambarValid) ){
			 echo "<script>
				 alert('bukan gambar')
				 </script>";
				 return false;
				 redirect('admin/video_movie/ubahvideo');
			 }
			 if ($ukuranFile > 1000000){
				 echo "<script>
				 alert('ukuran besar')
				 </script>";
				 return false;
				 redirect('admin/video_movie/ubahvideo');
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
		 $durasi		= $this->input->post('durasi');
		 $resolusi		= $this->input->post('resolusi');
		 $ukuran		= $this->input->post('ukuran');
		 $link_download = $this->input->post('link_download');
		 $link_nonton 	= $this->input->post('link_nonton');
		 $link_trailer 	= $this->input->post('link_trailer');
		 $sinopsis 		= $this->input->post('sinopsis');
		 $gambar = upload();
		 if ( $gambar === false ){
			$ubah_video	= array('id_video'	    => $id_video,
								'id_kategori'	=> $id_kategori,
		 						'judul_video'	=> $judul_video,
								 'tahun' 		=> $tahun,
								 'genre'		=> $genre,
								 'durasi'	 	=> $durasi,
								 'resolusi'	 	=> $resolusi,
								 'ukuran'	 	=> $ukuran,
								 'link_download'=> $link_download,
								 'link_nonton' 	=> $link_nonton,
								 'link_trailer' => $link_trailer,
								 'sinopsis' 	=> $sinopsis
								 );
		 $status = $this->videoku_model->ubah_video($ubah_video);
		 if ($status >= 0) {
			$this->session->set_flashdata("sukses", "Data Berhasil Diubah..");
			  redirect('admin/video_movie/kelolavideo');
			} else {
				$this->session->set_flashdata("error", "Data Gagal Diubah..");
				redirect('admin/video_movie/ubahvideo');
			}
		} else
		
		 $ubah_video	= array('id_video'	    => $id_video,
		 						'id_kategori'	=> $id_kategori,
		 						'judul_video'	=> $judul_video,
								 'tahun' 		=> $tahun,
								 'gambar' 		=> $gambar,
								 'genre'		=> $genre,
								 'durasi'	 	=> $durasi,
								 'resolusi'	 	=> $resolusi,
								 'ukuran'	 	=> $ukuran,
								 'link_download'=> $link_download,
								 'link_nonton' 	=> $link_nonton,
								 'link_trailer' => $link_trailer,
								 'sinopsis' 	=> $sinopsis
								 );
		
		if (file_exists("./assets/gambar/thumbnail/$file")){
			unlink("./assets/gambar/thumbnail/$file"); }
		$status = $this->videoku_model->ubah_video($ubah_video);
		 		 
		 if ($status >= 0) {
			$this->session->set_flashdata("sukses", "Data Berhasil Diubah..");
			  redirect('admin/video_movie/kelolavideo');
			} else {
				$this->session->set_flashdata("error", "Data Gagal Diubah..");
				redirect('admin/video_movie/ubahvideo');
			}
		}
 
	 }

	 //Ubah Menjadi Publish
	public function publish($id_video){
		$data_movie 		= $this->videoku_model->detail_video($id_video);
		$id_video			= $id_video;
		$publish 			= 'Publish';
		$ubah_video	= array('id_video'=> $id_video,'status'=> $publish);
		$status = $this->videoku_model->ubah_video($ubah_video);
		if ($status >= 0) {
			$this->session->set_flashdata("sukses", $data_movie->judul_video." Dipublish..");
			  redirect('admin/video_movie/kelolavideo');
			} else {
				$this->session->set_flashdata("error","Data Gagal Diubah..");
				redirect('admin/video_movie/kelolavideo');
			}
	}
	
	//Ubah Menjadi Hiden
	public function hiden($id_video){
		$data_movie 		= $this->videoku_model->detail_video($id_video);
		$id_video			= $id_video;
		$hiden 				= 'Hiden';
		$ubah_video	= array('id_video'=> $id_video,'status'=> $hiden);
		$status = $this->videoku_model->ubah_video($ubah_video);
		if ($status >= 0) {
			$this->session->set_flashdata("sukses", $data_movie->judul_video." Disembunyikan..");
			  redirect('admin/video_movie/kelolavideo');
			} else {
				$this->session->set_flashdata("error","Data Gagal Diubah..");
				redirect('admin/video_movie/ubahvideo');
			}
	}
	// Hapus Video
	public function hapus_video($id_video)
	{
		$data_movie 		= $this->videoku_model->detail_video($id_video);
		$file = $data_movie->gambar;
		if (file_exists("./assets/gambar/thumbnail/$file")){
			unlink("./assets/gambar/thumbnail/$file"); }
		$hapus_video = array('id_video' => $id_video);
		$this->videoku_model->hapus_video($hapus_video);
		$this->session->set_flashdata('sukses', $data_movie->judul_video.' Telah Dihapus..');
		redirect(base_url('admin/video_movie/kelolavideo'),'refresh');
	}

	
}