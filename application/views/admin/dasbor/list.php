<div class="content-wrapper">
  <section class="Content">
    <div class="container">
      <div class="row">
       <div class="col-md-12"> 
        <div class="card mt-2" style="font-family: verdana; font-size: 11px;">
         <div class="card-body">                     
          <div class="col-md-12">
           <h5>Welcome <?php echo $this->session->userdata('nama_pengguna'); ?></h5>
           <span class="text-danger">(<?php echo $this->session->userdata('status'); ?>)</span>
         </div>
       </div>
     </div>
     <div class="card mt-2" style="font-family: verdana; font-size: 11px;">
       <div class="card-body">                     
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box text-<?= $get_konfigurasi->warna_teks_header; ?>" style="background-color:<?= $get_konfigurasi->warna_tema; ?>">
              <div class="inner">
                <h3><?= $data_movie->total; ?></h3>
                <p>Film Movie</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="<?php echo base_url('admin/videoku')?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box text-<?= $get_konfigurasi->warna_teks_header; ?>" style="background-color:<?= $get_konfigurasi->warna_tema; ?>">
              <div class="inner">
                <h3><?= $data_series->total; ?></h3>

                <p>Fim Series</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="<?php echo base_url('admin/video_series')?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box text-<?= $get_konfigurasi->warna_teks_header; ?>" style="background-color:<?= $get_konfigurasi->warna_tema; ?>">
              <div class="inner">
                <h3><?= $data_user->total; ?></h3>

                <p>Pendaftar</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box text-<?= $get_konfigurasi->warna_teks_header; ?>" style="background-color:<?= $get_konfigurasi->warna_tema; ?>">
              <div class="inner">
                <h3><?= $data_pengunjung->jumlah; ?></h3>
                <p>Pengunjung</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
      </div>
    </div>
    <div class="card mt-2" style="font-family: verdana; font-size: 11px;">
     <div class="card-body">                     
      <div id="myCarousel" class="carousel slide carousel-fade mb-0" data-bs-ride="carousel">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
        </div>
        <div class="carousel-inner" style="width:100%; height: auto;">
          <div class="carousel-item active" style="background-image: linear-gradient(<?= $get_konfigurasi->warna_tema; ?>,<?= $get_konfigurasi->warna_latar_banner; ?>); height: auto;">   
            <div class="col-md-12 mt-2 mb-2">
              <div class="container-fluid">
                <div class="row">
                  <div class="col-md-4 col-4">
                    <img src="<?php echo base_url() ?>assets/gambar/banner/<?=$data_banner[0]->gambar; ?>"
                    style="opacity: 100;" width="100%">
                  </div> 
                  <div class="col-md-4 col-4">
                    <img src="<?php echo base_url() ?>assets/gambar/banner/<?=$data_banner[1]->gambar; ?>"
                    style="opacity: 100;" width="100%">
                  </div> 
                  <div class="col-md-4 col-4">
                    <img src="<?php echo base_url() ?>assets/gambar/banner/<?=$data_banner[2]->gambar; ?>"
                    style="opacity: 100;" width="100%">
                  </div>  
                </div>    
              </div>
            </div>
          </div>
          <div class="carousel-item" style="background-image: linear-gradient(<?= $get_konfigurasi->warna_tema; ?>,<?= $get_konfigurasi->warna_latar_banner; ?>); height: auto;">
            <div class="col-md-12 mt-2 mb-2">
              <div class="container-fluid">
                <div class="row">
                  <div class="col-md-4 col-4">
                    <img src="<?php echo base_url() ?>assets/gambar/banner/<?=$data_banner[3]->gambar; ?>"
                    style="opacity: 100;" width="100%">
                  </div> 
                  <div class="col-md-4 col-4">
                    <img src="<?php echo base_url() ?>assets/gambar/banner/<?=$data_banner[4]->gambar; ?>"
                    style="opacity: 100;" width="100%">
                  </div> 
                  <div class="col-md-4 col-4">
                    <img src="<?php echo base_url() ?>assets/gambar/banner/<?=$data_banner[5]->gambar; ?>"
                    style="opacity: 100;" width="100%">
                  </div>  
                </div>    
              </div>
            </div>
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden"></span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden"></span>
          </button>
        </div>
      </div>
    </div>
  </div>
  
</div>
</div>
</div>
</section>
</div>




