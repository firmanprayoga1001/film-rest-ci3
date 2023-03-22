<div class="content-wrapper">
<section class="Content">
<div class="container">
  <div class="row">
     <div class="col-md-12"> 
      <div class="card mt-2" style="font-family: verdana; font-size: 11px;">
         <div class="card-body">
              <div class="form-group">
                <h6>Ubah Data Kategori</h6>
                <hr>
                <?php echo form_open_multipart(base_url('admin/kategori/ubah_data_kategori/'.$data_kategori->id_kategori),' class="form-horizontal"');?>
                
                    <label class="col-md-12 control-label">Nama kategori</label>
                    <div class="col-md-12">
                        <input type="text" name="nama_kategori" class="form-control" placeholder="Nama kategori" value="<?php echo $data_kategori->nama_kategori ?>" required>
                    </div>

                    <label class="col-md-12 mt-3 control-label">Urutan</label>
                    <div class="col-md-12">
                        <input type="number" name="urutan" class="form-control" placeholder="Urutan" value="<?php echo $data_kategori->urutan ?>" required>
                    </div>
                    </div>
                    <div class="col-md-5">
                        <button class="btn btn-primary btn-xs" name="submit" type="submit">
                            <i class="fa fa-save"></i> Simpan
                        </button>
                    </div>
                    </div>  
              <?php echo form_close(); ?>
                
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</section>

</div>


