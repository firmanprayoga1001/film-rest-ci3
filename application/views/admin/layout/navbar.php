<body class="hold-transition layout-top-nav layout-navbar-fixed" style="padding-top: 0px; padding-bottom: 0px;">

  <div class="wrapper">
   <!-- Navbar -->
   <nav class="main-header navbar navbar-expand-md navbar-<?= $get_konfigurasi->warna_teks; ?>" style="background-color:<?= $get_konfigurasi->warna_tema; ?>">
    <div class="container">
      <a href="<?= site_url('admin/dasbor') ?>" class="navbar-brand">
       <img src="<?php echo base_url() ?>assets/gambar/logo/<?= $get_konfigurasi->gambar; ?>" alt="" class="brand-image ml-2"
       style="opacity: 100">
       <!-- <span class="brand-text font-weight-light"><?= $get_konfigurasi->nama_website; ?></span> -->
     </a>
     
     <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse order-3" id="navbarCollapse">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
          <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">
            <i class="nav-icon fas fa fa-video"></i> Video-Ku
          </a>
          <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
            <li><a href="<?php echo base_url('admin/video_movie/kelolavideo')?>" class="dropdown-item">Film Movie</a></li>
            <li><a href="<?php echo base_url('admin/video_series/kelolavideo')?>" class="dropdown-item">Film Series</a></li>
            <li><a href="<?php echo base_url('admin/kategori')?>" class="dropdown-item">Data Kategori</a></li>
            <li><a href="<?php echo base_url('admin/video_player')?>" class="dropdown-item">Video Player</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">
            <i class="nav-icon fas fa fa-fan"></i> Pengaturan
          </a>
          <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
            <li><a href="<?php echo base_url('admin/konfigurasi/profil')?>" class="dropdown-item">Profil Website</a></li>
            <li><a href="<?php echo base_url('admin/medsos')?>" class="dropdown-item">Media Sosial</a></li>
            <li><a href="<?php echo base_url('admin/konfigurasi')?>" class="dropdown-item">Konfigurasi</a></li>
            <li><a href="<?php echo base_url('admin/konfigurasi/banner')?>" class="dropdown-item">Banner</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">
            <i class="nav-icon fas fa fa-user"></i> <?php echo $this->session->userdata('nama_pengguna'); ?>
          </a>
          <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
            <li><a href="<?php echo base_url('admin/akun')?>" class="dropdown-item">Kelola Akun</a></li>
            <li><a href="<?= site_url('admin/dasbor/aksi_logout') ?>" class="dropdown-item" onclick="return confirm('Yakin ingin Logout ?')"><i class="nav-icon fas fa-sign-out-alt"></i>  Log Out</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>  



