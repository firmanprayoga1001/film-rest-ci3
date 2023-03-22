
<div class="content-wrapper">
  <section class="Content">
  <div class="container">
    <div class="row">
       <div class="col-md-12"> 
        <div class="card mt-2">
           <div class="card-body">
                <div class="form-group">
                  <h6>Profil Website</h6>
                  <hr>
                  <form action="<?= site_url('admin/konfigurasi/ubah_profil/'.$get_konfigurasi->id_konfigurasi) ?>" method="post" enctype="multipart/form-data">
                  <div class="row">
                  
                    <label class="col-md-12 control-label">Nama Website</label>
                      <div class="col-md-12">
                        <textarea class="textarea" placeholder="Place some text here"
                        style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" name="nama_website"><?= $get_konfigurasi->nama_website; ?></textarea>
                      </div>
                    <label class="col-md-12 control-label">Deskripsi Website</label>
                    <div class="col-md-12">
                      <textarea class="textarea" placeholder="Place some text here"
                      style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" name="deskripsi_website"><?= $get_konfigurasi->deskripsi_website; ?></textarea>
                    </div>
                    <div class="col-md-12">
                      <hr>
                      <button type="submit" class="btn btn-xs btn-primary float-right" name="submit">Simpan</button>
                    </div>
                  </div>
              </form>
            </div>
          </div>
        </div>


        <div class="card mt-2">
           <div class="card-body">
              <div class="form-group">
                  <form action="<?= site_url('admin/konfigurasi/ubah_logo/'.$get_konfigurasi->id_konfigurasi) ?>" method="post" enctype="multipart/form-data">
                  <div class="row">
                    <label class="col-md-12 control-label">Preview Logo Website</label>
                    <div class="col-md-6">
                      <img src="<?php echo base_url() ?>assets/gambar/logo/<?= $get_konfigurasi->gambar; ?>" class="img-thumbnail" style="background-color:<?= $get_konfigurasi->warna_tema; ?>" width="50%">
                    </div>
                  
                    
                    <label class="col-md-12 mt-3">Ganti Logo :</label>
                    <div class="col-md-12">
                        <input type="file" name="gambar" class="form-control">
                    </div>
                    
                    <div class="col-md-12">
                      <hr>
                      <button type="submit" class="btn btn-xs btn-primary float-right" name="submit">Ubah Logo</button>
                    </div>
                    
                  </div>
              </form>
            </div>
          </div>
        </div>

        <div class="card mt-2">  
          <div class="card-body">
                <div class="form-group">
                  <form action="<?= site_url('admin/konfigurasi/ubah_icon/'.$get_konfigurasi->id_konfigurasi) ?>" method="post" enctype="multipart/form-data">
                  <div class="row">
                  
                    <label class="col-md-12 control-label">Preview Icon Website</label>
                    <div class="col-md-6">
                      <img src="<?php echo base_url() ?>assets/gambar/icon/<?= $get_konfigurasi->icon; ?>" class="img-thumbnail" style="background-color:<?= $get_konfigurasi->warna_tema; ?>" width="50%">
                    </div>
                  
                    
                    <label class="col-md-12 mt-3">Ganti Icon :</label>
                    <div class="col-md-12">
                        <input type="file" name="gambar" class="form-control">
                    </div>
                    
                    <div class="col-md-12">
                      <hr>
                      <button type="submit" class="btn btn-xs btn-primary float-right" name="submit">Ubah Icon</button>
                    </div>
                    
                  </div>
                </form>
            </div>
          </div>
        </div>

        </div>
      </div>
    </div>
  </div>
</section>
</div>
         
