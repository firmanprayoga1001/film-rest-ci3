<div class="content-wrapper">
    <section class="Content">
        <div class="container">
          <div class="row">
           <div class="col-md-12"> 
              <div class="card mt-2" style="font-family: verdana; font-size: 11px;">
               <div class="card-body">
                  <div class="form-group">
                    <h6>Ubah Data Video Player</h6>
                    <hr>
                    <?php echo form_open_multipart(base_url('admin/video_player/ubah_data_video_player/'.$data_video_player->id_player),' class="form-horizontal"');?>

                    <label class="col-md-12 control-label">Nama Video Player</label>
                    <div class="col-md-12">
                        <input type="text" name="nama_player" class="form-control" placeholder="Nama video_player" value="<?php echo $data_video_player->nama_player ?>" required>
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


