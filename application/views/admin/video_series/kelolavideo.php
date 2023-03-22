<div class="content-wrapper">
  <section class="Content">
  <div class="container">
    <div class="row">
       <div class="col-md-12"> 
        <div class="card mt-2" style="font-family: verdana; font-size: 11px;">
           <div class="card-body">                     
                <div class="col-md-12">
                  <a href="<?php echo base_url('admin/video_series')?>"> 
                    <button type="button" class="btn btn-xs btn-primary" name="data_series">
                      <i class="nav-icon fas fa fa-video"> Semua Series</i> 
                    </button>
                  </a>
                  <a href="<?php echo base_url('admin/video_series/kelolavideo')?>"> 
                    <button type="button" class="btn btn-xs btn-dark" name="data_series">
                      <i class="nav-icon fas fa fa-edit"> Kelola Series</i> 
                    </button>
                  </a>
                  <a> 
                    <button type="button" class="btn btn-xs btn-primary float-right" name="data_series" data-toggle="modal" data-target="#modal-tambahvideo">
                      <i class="nav-icon fas fa fa-plus"> Tambah Video</i> 
                    </button>
                  </a>
                  <hr>
                  <p><a href="<?php echo base_url('admin/video_series')?>">Video Series</a> / Kelola Video</p>
                </div>

                <!-- Bagian Tabel -->
                <div class="col-md-12">
                    <table id="example1" class="table table-bordered">
                      <thead>
                      <tr>
                        <th style="width: 5%;">#</th>
                        <th style="width: 15%;">Judul Video</th>
                        <th style="width: 10%;">Thumbnail</th>
                        <th>Keterangan</th>
                        <th style="width: 10%;">Status</th>
                        <th style="width: 20%;">Action</th>
                      </tr>
                      </thead>
                      <tbody>
                        <?php 
                        $no=0;
                        foreach ($data_series as $data_series) {
                        $no++;
                        ?>
                      <tr>
                        <td><?= $no; ?></td>
                        <td><?= $data_series->judul_video; ?> (<?= $data_series->tahun; ?>)</td>
                        <td><img src="<?php echo base_url() ?>assets/gambar/thumbnail/<?= $data_series->gambar; ?>" class="img" width="40px" height="60px"></td>
                        <td>
                          Kategori : <?= $data_series->nama_kategori ;?> |
                          Genre : <?= $data_series->genre; ?> |
                          Resolusi : <?= $data_series->resolusi; ?> |
                          Jumlah Episode : <?= $data_series->jumlah_episode; ?> |
                          <?php if($data_series->keterangan == 'Ongoing') : ?>
                            <button class="btn btn-xs btn-primary"><?= $data_series->keterangan; ?></button>
                          <?php else : ?>
                            <button class="btn btn-xs btn-danger"><?= $data_series->keterangan; ?></button>
                          <?php endif ; ?>
                        </td>
                        <td>
                            <?php
                              if($data_series->status=='Publish') { 
                              ?>
                                  <a href="<?= base_url("admin/video_series/hiden/".$data_series->id_video)?>" class="btn btn-success btn-xs">Publish</a>
                              <?php
                              } else { ?>
                                  <a href="<?= base_url("admin/video_series/publish/".$data_series->id_video)?>" class="btn btn-danger btn-xs">Hiden</a>
                              <?php } ?>
                        </td>
                        <td>
                          <a href="<?php echo base_url('admin/video_series/hapus_video/'.$data_series->id_video) ?>" class="btn btn-xs btn-danger" onclick="return confirm('Yakin ingin menghapus data ini?')"><i class="nav-icon fas fa fa-trash"></i></a>
                          <a href="<?php echo base_url('admin/video_series/ubah_video/'.$data_series->id_video) ?>" class="btn btn-xs btn-primary"><i class="nav-icon fas fa fa-edit"></i></a>
                          <a href="<?php echo base_url('admin/video_series/episode/'.$data_series->id_video) ?>" class="btn btn-xs btn-primary"><i class="nav-icon fas fa fa-plus"></i> Kelola Episode</a>
                        </td>
                      </tr>
                      <?php } ?>            
                      </tbody>
                    </table>
                </div>





                <div class="form-group"> 
                </div>
            </div>
          </div>
        </div>
      </div>
   </div>
</section>
</div>

<!-- Modal  Tambah  -->
<div class="modal fade" id="modal-tambahvideo">
  <div class="modal-dialog">
  <form action="<?= site_url('admin/video_series/tambah_video') ?>" method="post" enctype="multipart/form-data">
  
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title">Tambah Video</h6>
      </div>
      <div class="modal-body">
         <div class="col-md-12"> 
          <label class="col-md-6 control-label">Judul Film :</label> 
              <input type="text" name="judul_video" class="form-control" placeholder="Judul Video..." required>
          </div>
          <div class="col-md-12"> 
          <label class="col-md-6 control-label">Tahun Rilis :</label> 
              <input type="text" name="tahun" class="form-control" placeholder="Tahun Rilis..." required>
          </div>
          
          <div class="mt-2 col-md-12 "> 
          <label class="col-md-12 control-label">Ubah Thumbnail Film :</label>
              <input type="file" name="gambar">
          </div>
          
          <div class="mt-2 col-md-12">
          <label class="col-md-6 control-label">Kategori Film :</label>
                  <select name="id_kategori" class="form-control">
                          <?php foreach($data_kategori as $data_kategori) { ?>
                          <option value="<?php echo $data_kategori->id_kategori ?>">
                              <?php echo $data_kategori->nama_kategori ?>
                          </option>
                          <?php } ?>
                  </select>   
          </div>
          
          <div class="mt-2 col-md-12">
          <label class="col-md-6 control-label">Genre Film :</label>  
              <input type="text" name="genre" class="form-control" placeholder="Genre..." required>
              ( Drama, Romantis, Animasi, Komedi, Aksi, Dokumenter, Horor, Thriller, +18, Virus, Zombie )
          </div>
    
          <div class="mt-2 col-md-12">
          <label class="col-md-6 control-label">Resolusi Film :</label>  
            <select name="resolusi" class="form-control">
                        <option value="480p">480p</option>
                        <option value="720p">720p</option>
                        <option value="1080p">1080p</option>
            </select>  
          </div>
          
          <div class="mt-2 col-md-12">
          <label class="col-md-6 control-label">Link Trailer Film :</label>  
              <input type="text" name="link_trailer" class="form-control" placeholder="Link Trailer..." required>
          </div>

        <label class="col-md-6 control-label">Sinopsis Film :</label>
            <div class="col-md-12">
              <textarea class="textarea" placeholder="Sinopsis Film"
              style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" name="sinopsis"></textarea>
            </div>
            <!-- <div class=" col-md-12">
          <label class="col-md-6 control-label">Status :</label>
              <input type="text" name="status" class="form-control" value="Hiden" disabled required>
          </div> -->
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-xs btn-danger" data-dismiss="modal"><i class="fas fa fa-xmark"></i>Batal</button>
        <button type="submit" class="btn btn-xs btn-primary"><i class="fas fa fa-save"></i> Simpan</button>
      </div>
    </div>
    </form>
  </div>
</div>

<!-- Bagian ubah Video -->
<!--   -->

