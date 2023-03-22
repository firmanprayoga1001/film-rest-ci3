<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Konfigurasi extends CI_Controller {
	public function __construct(){
 		parent::__construct(); 
 		$this->load->model('konfigurasi_model');
		 $this->libraries_login->cek_login_master();
 	}
 	
	// BAGIAN KONFIGURASI=================================================================================================================
	 public function index()
	 {
		 $get_konfigurasi = $this->konfigurasi_model->get_konfigurasi();
		 $data = array( 'title'    		=> 'Konfigurasi',
						 'isi'     		=> 'admin/konfigurasi/list',
						 'get_konfigurasi'     => $get_konfigurasi
						  );
		 $this->load->view('admin/layout/wrapper', $data, FALSE);	
	 }
	 public function ubah_konfigurasi($id_konfigurasi)
	{ 
		$id_konfigurasi = $id_konfigurasi;
		$warna_tema = $this->input->post('warna_tema');
		$warna_teks = $this->input->post('warna_teks');
		$warna_teks_header = $this->input->post('warna_teks_header');
		$warna_teks_konten = $this->input->post('warna_teks_konten');
		$warna_latar = $this->input->post('warna_latar');
		$warna_latar_banner = $this->input->post('warna_latar_banner');
		$status = $this->db->query("update konfigurasi set warna_tema = '$warna_tema',
															warna_teks = '$warna_teks',
															warna_teks_header = '$warna_teks_header',
															warna_teks_konten = '$warna_teks_konten',
															warna_latar = '$warna_latar',
															warna_latar_banner = '$warna_latar_banner'
															where id_konfigurasi = '$id_konfigurasi'");
			if ($status >= 0) {
				$this->session->set_flashdata("sukses", "Data Berhasil Diubah..");
				redirect('admin/konfigurasi');
			} else {
				$this->session->set_flashdata("error", "Data Gagal Ditambahkan..");
				redirect('admin/konfigurasi');
			}
	}

	// BAGIAN PROFIL=================================================================================================================
	 public function profil()
	 {
		 $get_konfigurasi = $this->konfigurasi_model->get_konfigurasi();
		 $data = array( 'title'    		=> 'Profil Website',
						 'isi'     		=> 'admin/konfigurasi/profil',
						 'get_konfigurasi'     => $get_konfigurasi
						  );
		 $this->load->view('admin/layout/wrapper', $data, FALSE);	
	 }
	 public function ubah_profil($id_konfigurasi)
	{ 
		$nama_website = $this->input->post('nama_website');
		$deskripsi_website = $this->input->post('deskripsi_website');
		$id_konfigurasi = $id_konfigurasi;

		$ubah_konfigurasi	= array('id_konfigurasi'	=> $id_konfigurasi,
									'nama_website'		=> $nama_website,
									'deskripsi_website'	=> $deskripsi_website);
		$status = $this->konfigurasi_model->ubah_konfigurasi($ubah_konfigurasi);	
		if ($status >= 0) {
			$this->session->set_flashdata("sukses", "Data Berhasil Diubah..");
			redirect('admin/konfigurasi/profil');
		} else {
			$this->session->set_flashdata("error", "Data Gagal Ditambahkan..");
			redirect('admin/konfigurasi/profil');
		}
	}
	public function ubah_logo($id_konfigurasi)
	{ 
		function upload(){
			$namaFile = $_FILES['gambar']['name'];
			$ukuranFile = $_FILES['gambar']['size'];
			$error = $_FILES['gambar']['error'];
			$tmpName = $_FILES['gambar']['tmp_name'];
			if ( $error === 4){
				return false;
				redirect('admin/konfigurasi/profil');
			}
			$ekstensiGambarValid = ['jpg','jpeg','png'];
			$ekstensiGambar = explode('.',$namaFile);
			$ekstensiGambar = strtolower(end($ekstensiGambar));
			if ( !in_array($ekstensiGambar, $ekstensiGambarValid) ){
			echo "<script>
				alert('bukan gambar')
				</script>";
				return false;
				redirect('admin/konfigurasi/profil');
			}
			if ($ukuranFile > 1000000){
				echo "<script>
				alert('ukuran besar')
				</script>";
				return false;
				redirect('admin/konfigurasi/profil');
			}
			$namaFileBaru = 'logo website';
			$namaFileBaru .= '.';
			$namaFileBaru .= $ekstensiGambar;	
			move_uploaded_file($tmpName,'./assets/gambar/logo/'.$namaFileBaru);
			return $namaFileBaru;
		}
		$id_konfigurasi = $id_konfigurasi;
		$logo = upload();
		if ( $logo === false ){
				$this->session->set_flashdata("error", "Tidak Ada Foto yang Dipilih..");
				redirect('admin/konfigurasi/profil');
		} else {
			$ubah_konfigurasi	= array('id_konfigurasi'=> $id_konfigurasi,
											'gambar'	=> $logo );
			$status = $this->konfigurasi_model->ubah_konfigurasi($ubah_konfigurasi);	
			if ($status >= 0) {
				$this->session->set_flashdata("sukses", "Data Berhasil Diubah..");
				redirect('admin/konfigurasi/profil');
			} else {
				$this->session->set_flashdata("error", "Data Gagal Ditambahkan..");
				redirect('admin/konfigurasi/profil');
			}
		}
	}
	public function ubah_icon($id_konfigurasi)
	{ 
		function upload(){
			$namaFile = $_FILES['gambar']['name'];
			$ukuranFile = $_FILES['gambar']['size'];
			$error = $_FILES['gambar']['error'];
			$tmpName = $_FILES['gambar']['tmp_name'];
			if ( $error === 4){
				return false;
				redirect('admin/konfigurasi/profil');
			}
			$ekstensiGambarValid = ['jpg','jpeg','png'];
			$ekstensiGambar = explode('.',$namaFile);
			$ekstensiGambar = strtolower(end($ekstensiGambar));
			if ( !in_array($ekstensiGambar, $ekstensiGambarValid) ){
			echo "<script>
				alert('bukan gambar')
				</script>";
				return false;
				redirect('admin/konfigurasi/profil');
			}
			if ($ukuranFile > 1000000){
				echo "<script>
				alert('ukuran besar')
				</script>";
				return false;
				redirect('admin/konfigurasi/profil');
			}
			$namaFileBaru = 'icon website';
			$namaFileBaru .= '.';
			$namaFileBaru .= $ekstensiGambar;	
			move_uploaded_file($tmpName,'./assets/gambar/icon/'.$namaFileBaru);
			return $namaFileBaru;
		}
		$id_konfigurasi = $id_konfigurasi;
		$icon = upload();
		if ( $icon === false ){
				$this->session->set_flashdata("error", "Tidak Ada Foto yang Dipilih..");
				redirect('admin/konfigurasi/profil');
		} else {
			$ubah_konfigurasi	= array('id_konfigurasi'=> $id_konfigurasi,
											'icon'		=> $icon );
			$status = $this->konfigurasi_model->ubah_konfigurasi($ubah_konfigurasi);	
			if ($status >= 0) {
				$this->session->set_flashdata("sukses", "Data Berhasil Diubah..");
				redirect('admin/konfigurasi/profil');
			} else {
				$this->session->set_flashdata("error", "Data Gagal Ditambahkan..");
				redirect('admin/konfigurasi/profil');
			}
		}
	}

	// BAGIAN BANNER=================================================================================================================
	public function banner()
	{
		$get_konfigurasi = $this->konfigurasi_model->get_konfigurasi();
		$get_informasi = $this->konfigurasi_model->get_informasi();
		$data_banner = $this->konfigurasi_model->data_banner();
		$data = array( 'title'    			=> 'Pengaturan Banner',
						'isi'     			=> 'admin/konfigurasi/banner',
						'data_banner'	 	=> $data_banner,
						'get_konfigurasi' 	=> $get_konfigurasi,
						'get_informasi' 	=> $get_informasi
						 );
		$this->load->view('admin/layout/wrapper', $data, FALSE);	
	}
	public function ubahbanner($id_banner)
	{
		$get_konfigurasi = $this->konfigurasi_model->get_konfigurasi();
		$data_banner = $this->konfigurasi_model->detail_banner($id_banner);
		$data = array( 'title'    			=> 'Pengaturan Banner',
						'isi'     			=> 'admin/konfigurasi/ubahbanner',
						'data_banner'	 	=> $data_banner,
						'get_konfigurasi' 	=> $get_konfigurasi
						 );
		$this->load->view('admin/layout/wrapper', $data, FALSE);	
	}

	//Ubah Data banner
	public function ubah_banner($id_banner)
	{
	$data_banner = $this->konfigurasi_model->detail_banner($id_banner);
	$file = $data_banner->gambar;
	
		function upload_banner(){
			
			$namaFile = $_FILES['gambar']['name'];
			$ukuranFile = $_FILES['gambar']['size'];
			$error = $_FILES['gambar']['error'];
			$tmpName = $_FILES['gambar']['tmp_name'];
			if ( $error === 4){
				echo "<script>
				alert('pilih gambar')
				</script>";
				return false;
				redirect('admin/konfigurasi/ubahbanner');
			}
			$ekstensiGambarValid = ['jpg','jpeg','png'];
			$ekstensiGambar = explode('.',$namaFile);
			$ekstensiGambar = strtolower(end($ekstensiGambar));
			if ( !in_array($ekstensiGambar, $ekstensiGambarValid) ){
			echo "<script>
				alert('bukan gambar')
				</script>";
				return false;
				redirect('admin/konfigurasi/ubahbanner');
			}
			if ($ukuranFile > 1000000){
				echo "<script>
				alert('ukuran besar')
				</script>";
				return false;
				redirect('admin/konfigurasi/ubahbanner');
			} 
			$namaFileBaru = uniqid();
			$namaFileBaru .= '.';
			$namaFileBaru .= $ekstensiGambar;	
			move_uploaded_file($tmpName,'./assets/gambar/banner/'.$namaFileBaru);
			return $namaFileBaru; 
		}
		$id_banner		= $id_banner;
		$gambar = upload_banner();
		if ( $gambar === false ){
			redirect('admin/konfigurasi/banner');
		} else
		$ubah_banner	= array('id_banner'=> $id_banner,
								'gambar'=> $gambar);
	
		if (file_exists("./assets/gambar/banner/$file")){
			unlink("./assets/gambar/banner/$file"); }
		$status = $this->konfigurasi_model->ubah_banner($ubah_banner);	
		if ($status >= 0) {
			$this->session->set_flashdata("sukses", "Data Berhasil Diubah..");
			redirect(base_url('admin/konfigurasi/ubahbanner/'.$id_banner),'refresh');
		} else {
			$this->session->set_flashdata("error", "Data Gagal Diubah..");
				redirect('admin/konfigurasi/ubahbanner/'.$id_banner);
		}
	}

	// BAGIAN INFORMASI=================================================================================================================
	public function ubah_caption_1($id_informasi)
	{ 
		$id_informasi = $id_informasi;
		$caption_1 = $this->input->post('caption_1');
		$span_1 = $this->input->post('span_1');
		$status = $this->db->query("update informasi set caption_1 = '$caption_1',
															span_1 = '$span_1'
															where id_informasi = '$id_informasi'");
        if ($status >= 0) {
            $this->session->set_flashdata("sukses", "Data Berhasil Diubah..");
            redirect('admin/konfigurasi/banner');
        } else {
            $this->session->set_flashdata("error", "Data Gagal Ditambahkan..");
            redirect('admin/konfigurasi/banner');
        }
	}
	public function ubah_caption_2($id_informasi)
	{ 
		$id_informasi = $id_informasi;
        $caption_2 = $this->input->post('caption_2');
		$span_2 = $this->input->post('span_2');
		$status = $this->db->query("update informasi set caption_2 = '$caption_2',
                                                            span_2 = '$span_2'
															where id_informasi = '$id_informasi'");
        if ($status >= 0) {
            $this->session->set_flashdata("sukses", "Data Berhasil Diubah..");
            redirect('admin/konfigurasi/banner');
        } else {
            $this->session->set_flashdata("error", "Data Gagal Ditambahkan..");
            redirect('admin/konfigurasi/banner');
        }
	}
}