<div class="content-wrapper">
  <section class="Content">
  <div class="container">
    <div class="row">
       <div class="col-md-12"> 
        <div class="card mt-2" style="font-family: verdana; font-size: 11px;">
           <div class="card-body">
              <div class="form-group">
                  <h6>Atur Tampilan Banner </h6>
                  <hr>
                  <div class="row">
                  
                  <div class="col-md-6">
                      <label>Banner Poster Series</label>
                      <div class="card container-fluid" style="padding:5px; background-image: linear-gradient(<?= $get_konfigurasi->warna_tema; ?>,<?= $get_konfigurasi->warna_tema; ?>);">
                      <div class="row text-<?= $get_konfigurasi->warna_teks_header; ?>">
                        
                            <div class="col-md-4 col-4">
                                  <img src="<?php echo base_url() ?>assets/gambar/banner/<?=$data_banner[0]->gambar; ?>"
                                  style="opacity: 100;" width="100%">
                                  <p align="center" class="mt-2">
                                    <a href="<?php echo base_url('admin/konfigurasi/ubahbanner/'.$data_banner[0]->id_banner) ?>" class="btn btn-xs btn-primary">
                                      <i class="nav-icon fas fa fa-edit"> Ganti</i>
                                    </a>
                                  </p>
                            </div>
                            <div class="col-md-4 col-4">
                                  <img src="<?php echo base_url() ?>assets/gambar/banner/<?=$data_banner[1]->gambar; ?>"
                                  style="opacity: 100;" width="100%">
                                  <p align="center" class="mt-2">
                                    <a href="<?php echo base_url('admin/konfigurasi/ubahbanner/'.$data_banner[1]->id_banner) ?>" class="btn btn-xs btn-primary">
                                      <i class="nav-icon fas fa fa-edit"> Ganti</i>
                                    </a>
                                  </p>
                            </div>
                            <div class="col-md-4 col-4">
                                  <img src="<?php echo base_url() ?>assets/gambar/banner/<?=$data_banner[2]->gambar; ?>"
                                  style="opacity: 100;" width="100%">
                                  <p align="center" class="mt-2">
                                    <a href="<?php echo base_url('admin/konfigurasi/ubahbanner/'.$data_banner[2]->id_banner) ?>" class="btn btn-xs btn-primary">
                                      <i class="nav-icon fas fa fa-edit"> Ganti</i>
                                    </a>
                                  </p>
                            </div>
                            <div class="col-md-12 col-12 mb-2">
                              <form action="<?= site_url('admin/konfigurasi/ubah_caption_1/'.$get_informasi->id_informasi) ?>" method="post" enctype="multipart/form-data">
                                  <label class="col-md-12 control-label">Caption</label>
                                  <div class="col-md-12">
                                      <input type="text" name="caption_1" class="form-control" placeholder="Caption.." value="<?= $get_informasi->caption_1; ?>" required>
                                  </div>
                                  <label class="col-md-12 control-label mt-2">Span</label>
                                  <div class="col-md-12">
                                      <input type="text" name="span_1" class="form-control" placeholder="Span.." value="<?= $get_informasi->span_1; ?>" required>
                                  </div>
                                  <div class="col-md-12 mt-2">
                                    <button type="submit" class="btn btn-xs btn-primary float-right" name="submit">Simpan</button>
                                  </div>
                              </form>
                            </div>
                          
                        </div>    
                      </div>
                  </div>

                  <div class="col-md-6">
                      <label>Banner Poster Movie</label>
                      <div class="card container-fluid" style="padding:5px; background-image: linear-gradient(<?= $get_konfigurasi->warna_tema; ?>,<?= $get_konfigurasi->warna_tema; ?>);">
                        <div class="row text-<?= $get_konfigurasi->warna_teks_header; ?>">
                        
                            <div class="col-md-4 col-4">
                                  <img src="<?php echo base_url() ?>assets/gambar/banner/<?=$data_banner[3]->gambar; ?>"
                                  style="opacity: 100;" width="100%">
                                  <p align="center" class="mt-2">
                                    <a href="<?php echo base_url('admin/konfigurasi/ubahbanner/'.$data_banner[3]->id_banner) ?>" class="btn btn-xs btn-primary">
                                      <i class="nav-icon fas fa fa-edit"> Ganti</i>
                                    </a>
                                  </p>
                            </div>
                            <div class="col-md-4 col-4">
                                  <img src="<?php echo base_url() ?>assets/gambar/banner/<?=$data_banner[4]->gambar; ?>"
                                  style="opacity: 100;" width="100%">
                                  <p align="center" class="mt-2">
                                    <a href="<?php echo base_url('admin/konfigurasi/ubahbanner/'.$data_banner[4]->id_banner) ?>" class="btn btn-xs btn-primary">
                                      <i class="nav-icon fas fa fa-edit"> Ganti</i>
                                    </a>
                                  </p>
                            </div>
                            <div class="col-md-4 col-4">
                                  <img src="<?php echo base_url() ?>assets/gambar/banner/<?=$data_banner[5]->gambar; ?>"
                                  style="opacity: 100;" width="100%">
                                  <p align="center" class="mt-2">
                                    <a href="<?php echo base_url('admin/konfigurasi/ubahbanner/'.$data_banner[5]->id_banner) ?>" class="btn btn-xs btn-primary">
                                      <i class="nav-icon fas fa fa-edit"> Ganti</i>
                                    </a>
                                  </p>
                            </div>
                            <div class="col-md-12 col-12 mb-2">
                            <form action="<?= site_url('admin/konfigurasi/ubah_caption_2/'.$get_informasi->id_informasi) ?>" method="post" enctype="multipart/form-data">
                                  <label class="col-md-12 control-label">Caption</label>
                                  <div class="col-md-12">
                                      <input type="text" name="caption_2" class="form-control" placeholder="Caption.." value="<?= $get_informasi->caption_2; ?>" required>
                                  </div>
                                  <label class="col-md-12 control-label mt-2">Span</label>
                                  <div class="col-md-12">
                                      <input type="text" name="span_2" class="form-control" placeholder="Span.." value="<?= $get_informasi->span_2; ?>" required>
                                  </div>
                                  <div class="col-md-12 mt-2">
                                    <button type="submit" class="btn btn-xs btn-primary float-right" name="submit">Simpan</button>
                                  </div>
                            </form>
                            </div>
                          
                        </div>    
                      </div>
                  </div>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</div>
         
