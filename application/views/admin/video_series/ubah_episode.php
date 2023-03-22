
<div class="content-wrapper">

  <section class="Content">
    <div class="container">
      <div class="row">
       <div class="col-md-12 col-12"> 
        <div class="card mt-2" style="font-family: verdana; font-size: 11px;">
         <div class="card-body">
          <div class="form-group">
            <h6>Ubah Data Episode</h6>
            <hr>
            <?php echo form_open_multipart(base_url('admin/video_series/ubah_episode/'.$data_episode->id_episode),' class="form-horizontal"');?>
            <div class=" col-md-12">
              <div class="col-md-12">

                <div class="mt-2 col-md-12"> 
                  <label class="col-md-6 control-label">Judul Episode :</label> 
                  <input type="text" name="judul_episode" class="form-control" placeholder="Judul Video..." value="<?= $data_episode->judul_episode; ?>" required>
                </div>
                <div class="mt-2 col-md-12"> 
                  <label class="col-md-6 control-label">Urutan :</label> 
                  <input type="text" name="urutan" class="form-control" placeholder="Urutan..." value="<?= $data_episode->urutan; ?>" required>
                </div>

                <div class="mt-2 col-md-12">
                  <label class="col-md-6 control-label">Link Nonton / ID Film (Vdocipher):</label>  
                  <input type="text" name="link_nonton" class="form-control" placeholder="Link Nonton..." value="<?= $data_episode->link_nonton; ?>" required>
                </div>
                <div class="mt-2 col-md-12">
                  <label class="col-md-6 control-label">Link Download :</label>  
                  <input type="text" name="link_download" class="form-control" placeholder="Link Download..." value="<?= $data_episode->link_download; ?>" required>
                </div>
                <div class="mt-2 col-md-12">
                  <label class="col-md-6 control-label">Pilih Video Player :</label>
                  <select name="id_player" class="form-control">
                    <?php foreach($data_video_player as $data_video_player) { ?>
                      <option value="<?php echo $data_video_player->id_player ?>"<?php if($data_episode->id_player==$data_video_player->id_player) {echo "selected"; } ?>>
                        <?php echo $data_video_player->nama_player ?>
                      </option>
                    <?php } ?>
                  </select>   
                </div>
              </div>

              <div class="col-md-12"><hr>
                <a href="<?php echo base_url('admin/video_series/episode/'.$data_episode->id_video)?>">
                  <button type="button" class="btn btn-xs btn-danger" data-dismiss="modal"><i class="fas fa fa-xmark"></i>Batal</button>
                </a>
                <button type="submit" class="btn btn-xs btn-primary float-right"><i class="fas fa fa-save"></i> Simpan</button>
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

