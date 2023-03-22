
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
                  
                  <div class="col-md-2 col-3">
                        <img src="<?php echo base_url() ?>assets/gambar/banner/<?=$data_banner->gambar; ?>" class="img" width="100%">
                  </div>
                  
                  <div class="col-md-12">
                  <hr>
                  <?php echo form_open_multipart(base_url('admin/konfigurasi/ubah_banner/'.$data_banner->id_banner),' class="form-horizontal"');?>
                        <div class="mt-2 col-md-12 "> 

                        <label class="col-md-12 control-label">Ubah Gambar Banner :</label>
                            <input type="file" name="gambar">
                        </div>
                        <div class="col-md-12"><hr>
                            <button type="submit" class="btn btn-xs btn-primary"><i class="fas fa fa-save"></i> Simpan</button>
                        </div>
                  <?php echo form_close(); ?>
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

         
