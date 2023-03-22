<div class="content-wrapper">

  <section class="Content">
  <div class="container">
    <div class="row">
       <div class="col-md-12 col-12"> 
        <div class="card mt-2" style="font-family: verdana; font-size: 11px;">
           <div class="card-body">
                <div class="form-group">
                  <h6>Ubah Data Video</h6>
                  <hr>
                  <?php echo form_open_multipart(base_url('admin/video_series/ubah_video/'.$data_series->id_video),' class="form-horizontal"');?>
                <div class="row col-md-12">
                    <div class="col-md-6">
                        <div class="mt-2 col-md-2 col-2"> 
                        <img src="<?php echo base_url() ?>assets/gambar/thumbnail/<?= $data_series->gambar; ?>" class="img" width="100px" height="150px;">
                        </div>
                        <div class="mt-2 col-md-12"> 
                        <label class="col-md-6 control-label">Judul Film :</label> 
                            <input type="text" name="judul_video" class="form-control" placeholder="Judul Video..." value="<?= $data_series->judul_video; ?>" required>
                        </div>
                        <div class="mt-2 col-md-12"> 
                        <label class="col-md-6 control-label">Tahun Rilis :</label> 
                            <input type="text" name="tahun" class="form-control" placeholder="Tahun Rilis..." value="<?= $data_series->tahun; ?>" required>
                        </div>
                        
                        <div class="mt-2 col-md-12 "> 
                        <label class="col-md-12 control-label">Ubah Thumbnail Film :</label>
                            <input type="file" name="gambar">
                        </div>
                        
                        <div class="mt-2 col-md-12">
                        <label class="col-md-6 control-label">Kategori Film :</label>
                                <select name="id_kategori" class="form-control">
                                        <?php foreach($data_kategori as $data_kategori) { ?>
                                        <option value="<?php echo $data_kategori->id_kategori ?>"<?php if($data_series->id_kategori==$data_kategori->id_kategori) {echo "selected"; } ?>>
                                            <?php echo $data_kategori->nama_kategori ?>
                                        </option>
                                        <?php } ?>
                                </select>   
                        </div>
                        
                        <div class="mt-2 col-md-12">
                        <label class="col-md-12 control-label">Genre Film :</label>
                            <input type="text" name="genre" class="form-control" placeholder="Genre..." value="<?= $data_series->genre; ?>" required>
                            ( Drama, Romantis, Animasi, Komedi, Aksi, Dokumenter, Horor, Thriller, +18, Virus, Zombie )
                        </div>
                    
                        
                        <div class="mt-2 col-md-12">
                        <label class="col-md-6 control-label">Resolusi Film :</label>  
                            <!-- <input type="text" name="resolusi" class="form-control" placeholder="Resolusi..." value="<?= $data_series->resolusi; ?>" required> -->
                            <select name="resolusi" class="form-control">
                                        <option value="<?php echo $data_series->resolusi ?>" selected><?php echo $data_series->resolusi ?></option>
                                        <option value="480p">480p</option>
                                        <option value="720p">720p</option>
                                        <option value="1080p">1080p</option>
                            </select>  
                        </div>

                        <div class="mt-2 col-md-12">
                        <label class="col-md-6 control-label">Keterangan :</label>  
                            <select name="keterangan" class="form-control">
                                        <option value="<?php echo $data_series->keterangan ?>" selected>Episode <?php echo $data_series->keterangan ?></option>
                                        <option value="Ongoing">Ongoing</option>
                                        <option value="Tamat">Tamat</option>
                            </select>  
                        </div>
                        

                        <div class="mt-2 col-md-12">
                        <label class="col-md-6 control-label">Link Trailer Film :</label>  
                            <input type="text" name="link_trailer" class="form-control" placeholder="Link Trailer..." value="<?= $data_series->link_trailer; ?>" required>
                        </div>

                    </div>
                  
                    <div class="col-md-6">
                        <div class="col-md-12">
                        <label class="col-md-6 control-label">Sinopsis Film :</label>
                            <textarea class="textarea" placeholder="Sinopsis Film"
                            style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" name="sinopsis"><?= $data_series->sinopsis; ?></textarea>                
                        </div>  
                        <div class="col-md-12"><hr>
                            <a href="<?php echo base_url('admin/video_series/kelolavideo')?>">
                            <button type="button" class="btn btn-xs btn-danger" data-dismiss="modal"><i class="fas fa fa-xmark"></i>Batal</button>
                            </a>
                            <button type="submit" class="btn btn-xs btn-primary float-right"><i class="fas fa fa-save"></i> Simpan</button>
                        </div>
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
         
