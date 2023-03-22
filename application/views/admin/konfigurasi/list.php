
<div class="content-wrapper">
  <section class="Content">
  <div class="container">
    <div class="row">
       <div class="col-md-12"> 
        <div class="card mt-2" style="font-family: verdana; font-size: 11px;">
           <div class="card-body">
                <div class="form-group">
                  <h6>Konfigurasi Website</h6>
                  <hr>
                  <form action="<?= site_url('admin/konfigurasi/ubah_konfigurasi/'.$get_konfigurasi->id_konfigurasi) ?>" method="post" enctype="multipart/form-data">
                  <div class="row">
                  <div class="col-md-6">
                    <label class="col-md-12">Warna tema :</label>
                    <div class="col-md-12">
                      <input type="color" name="warna_tema" class="form-control" value="<?= $get_konfigurasi->warna_tema; ?>">
                    </div>

                    <label class="col-md-12 mt-2">Warna teks header admin:</label>
                    <div class="col-md-12">
                      <select name="warna_teks" class="form-control">  
                        <option value="<?= $get_konfigurasi->warna_teks; ?>"> Default </option>  
                        <option value="dark"> Putih </option>
                        <option value="light"> Hitam </option>
                      </select>
                    </div>

                    <label class="col-md-12 mt-2">Warna teks header halaman pengunjung:</label>
                    <div class="col-md-12">
                      <select name="warna_teks_header" class="form-control">  
                        <option value="<?= $get_konfigurasi->warna_teks_header; ?>"> Default </option>  
                        <option value="light"> Putih </option>
                        <option value="dark"> Hitam </option>
                      </select>
                    </div>

                    <label class="col-md-12 mt-2">Warna teks konten halaman pengunjung:</label>
                    <div class="col-md-12">
                      <input type="color" name="warna_teks_konten" class="form-control" value="<?= $get_konfigurasi->warna_teks_konten; ?>">
                    </div>

                    <label class="col-md-12 mt-2">Warna latar halaman pengunjung:</label>
                    <div class="col-md-12">
                      <input type="color" name="warna_latar" class="form-control" value="<?= $get_konfigurasi->warna_latar; ?>">
                    </div>  

                    <label class="col-md-12 mt-2">Warna latar banner :</label>
                    <div class="col-md-12">
                      <input type="color" name="warna_latar_banner" class="form-control"value="<?= $get_konfigurasi->warna_latar_banner; ?>">
                      <hr>
                      <button type="submit" class="btn btn-xs btn-primary float-right" name="submit">Simpan</button>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <label class="col-md-12">Preview Website :</label>
                    <div class="col-md-12">
                      <iframe src="http://tsukinoseirei.site/" width="100%" height="500px"></iframe>
                    </div>
                  </div>
                    
                  </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</div>
         
