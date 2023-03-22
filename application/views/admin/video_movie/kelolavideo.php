<div class="content-wrapper">
  <!-- <div class="content-header">
    <div class="container">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark"></h1>
        </div>
      </div>
    </div>
  </div> -->
  <section class="Content">
  <div class="container">
    <div class="row">
       <div class="col-md-12"> 
        <div class="card mt-2" style="font-family: verdana; font-size: 11px;">
           <div class="card-body">                     
                <div class="col-md-12">
                  <a href="<?php echo base_url('admin/video_movie')?>"> 
                    <button type="button" class="btn btn-xs btn-primary" name="data_movie">
                      <i class="nav-icon fas fa fa-video"> Semua Video</i> 
                    </button>
                  </a>
                  <a href="<?php echo base_url('admin/video_movie/kelolavideo')?>"> 
                    <button type="button" class="btn btn-xs btn-dark" name="data_movie">
                      <i class="nav-icon fas fa fa-edit"> Kelola Video</i> 
                    </button>
                  </a>
                  <a> 
                    <button type="button" class="btn btn-xs btn-primary float-right" name="data_movie" data-toggle="modal" data-target="#modal-tambahvideo">
                      <i class="nav-icon fas fa fa-plus"> Tambah Video</i> 
                    </button>
                  </a>
                  <hr>
                  <p><a href="<?php echo base_url('admin/video_movie')?>">Video Movie</a> / Kelola Video</p>
                </div>
                <!-- Bagian Tabel -->
                <div class="col-md-12">
                    <table id="example1" class="table table-bordered">
                      <thead>
                      <tr>
                        <th style="width: 5%;">#</th>
                        <th style="width: 20%;">Judul Video</th>
                        <th style="width: 10%;">Thumbnail</th>
                        <th>Keterangan</th>
                        <th style="width: 10%;">Status</th>
                        <th style="width: 10%;">Action</th>
                      </tr>
                      </thead>
                      <tbody>
                        <?php 
                        $no=0;
                        foreach ($data_movie as $data_movie) {
                        $no++;
                        ?>
                      <tr>
                        <td><?= $no; ?></td>
                        <td><?= $data_movie->judul_video; ?> (<?= $data_movie->tahun; ?>)</td>
                        <td><img src="<?php echo base_url() ?>assets/gambar/thumbnail/<?= $data_movie->gambar; ?>" class="img" width="40px" height="60px"></td>
                        <td>
                          Kategori : <?= $data_movie->nama_kategori ;?> |
                          Genre : <?= $data_movie->genre; ?> |
                          Durasi : <?= $data_movie->durasi; ?> |
                          Resolusi : <?= $data_movie->resolusi; ?> |
                          Ukuran File : <?= $data_movie->ukuran; ?>
                        </td>
                        <td>
                            <?php
                              if($data_movie->status=='Publish') { 
                              ?>
                                  <a href="<?= base_url("admin/video_movie/hiden/".$data_movie->id_video)?>" class="btn btn-success btn-xs">Publish</a>
                              <?php
                              } else { ?>
                                  <a href="<?= base_url("admin/video_movie/publish/".$data_movie->id_video)?>" class="btn btn-danger btn-xs">Hiden</a>
                              <?php } ?>
                        </td>
                        <td>
                          <a href="<?php echo base_url('admin/video_movie/hapus_video/'.$data_movie->id_video) ?>" class="btn btn-xs btn-danger" onclick="return confirm('Yakin ingin menghapus data ini?')"><i class="nav-icon fas fa fa-trash"></i></a>
                          <a href="<?php echo base_url('admin/video_movie/ubah_video/'.$data_movie->id_video) ?>" class="btn btn-xs btn-primary"><i class="nav-icon fas fa fa-edit"></i></a>
                          <a href="<?= $data_movie->link_download ;?>" class="btn btn-xs btn-dark" target="_blank"><i class="nav-icon fas fa fa-download"></i></a>
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
  <form action="<?= site_url('admin/video_movie/tambah_video') ?>" method="post" enctype="multipart/form-data">
  
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
          <label class="col-md-6 control-label">Durasi Film (Jam:Menit) :</label>  
              <input type="text" name="durasi" class="form-control" placeholder="Durasi..." required>
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
          <label class="col-md-6 control-label">Ukuran Film (GB/MB) :</label>
              <input type="text" name="ukuran" class="form-control" placeholder="Ukuran File (GB)..." required>
          </div>
          
          <div class="mt-2 col-md-12">  
          <label class="col-md-6 control-label">Link Download Film :</label>
              <input type="text" name="link_download" class="form-control" placeholder="Link Download..."  required>
          </div>
          
          <div class="mt-2 col-md-12">
          <label class="col-md-6 control-label">Link Nonoton Film :</label>  
              <input type="text" name="link_nonton" class="form-control" placeholder="Link Nonton..." required>
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

