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
              <button type="button" class="btn btn-xs btn-primary" name="data_series">
                <i class="nav-icon fas fa fa-edit"> Kelola Series</i> 
              </button>
            </a>
            <a> 
              <button type="button" class="btn btn-xs btn-dark">
                <i class="nav-icon fas fa fa-plus"> Kelola Episode</i> 
              </button>
            </a>
            <hr>
            <p><a href="<?php echo base_url('admin/video_series/')?>">Video Series</a> / Kelola Video / Kelola Episode</p>
            <hr>
            <div class="row col-md-12">

              <div class="col-md-2 col-4">
                <img src="<?php echo base_url() ?>assets/gambar/thumbnail/<?= $data_series->gambar; ?>" class="img" width="100%">
              </div>
              <div class="col-md-10 col-8 fs-10">
                <h4><?= $data_series->judul_video ;?></h4>
                Kategori : <?= $data_series->nama_kategori ;?><br>
                Genre : <?= $data_series->genre; ?><br>
                Jumlah Episode : <?= $data_series->jumlah_episode; ?><br>
                <a> 
                  <button type="button" class="btn btn-xs btn-primary mt-1"  data-toggle="modal" data-target="#modal-tambahepisode<?= $data_series->id_video ;?>">
                    <i class="nav-icon fas fa fa-plus"> Tambah Episode</i> 
                  </button>
                  <button type="button" class="btn btn-xs btn-primary mt-1"  data-toggle="modal" data-target="#modal-tambahaktor<?= $data_series->id_video ;?>">
                    <i class="nav-icon fas fa fa-plus"> Tambah Aktor</i> 
                  </button>
                </a>
              </div>

            </div>
          </div> 
          <div class="col-md-12 mt-4">   
            <div class="row ">
              <?php foreach ($data_aktor as $data_aktor) {?>
                <div class="col-md-2 col-3 mr-0 nopadding-side">
                 <div class="row ">
                  <div class="col-md-4 col-12">
                    <h6 align="center">
                      <a href="#modal-ubahaktor<?= $data_aktor->id_aktor ;?>" data-toggle="modal">
                        <?php if ($data_aktor->link_foto == 'Belum Ada') { ?>
                          <img src="<?php echo base_url() ?>assets/gambar/profil.png" class="img-circle" width="50px" height="50px">
                        <?php } else { ?>
                          <img src="<?= $data_aktor->link_foto; ?>" class="img-circle" width="50px" height="50px">
                        <?php } ?>
                      </a>
                    </h6>
                  </div>
                  <div class="col-md-8 col-12"> 
                    <h6 class="fs-8 mt-2" align="center"><?= $data_aktor->nama_aktor; ?></h6>
                  </div>
                </div>
              </div>

              <div class="modal fade" id="modal-ubahaktor<?= $data_aktor->id_aktor ;?>">
                <div class="modal-dialog">
                  <form action="<?= site_url('admin/video_series/ubah_aktor/'.$data_aktor->id_aktor) ?>" method="post" enctype="multipart/form-data">

                    <div class="modal-content">
                      <div class="modal-header">
                        <span class="modal-title">Ubah Aktor</span>
                      </div>
                      <div class="row modal-body">
                        <div class="col-md-4 col-4"> 
                          <?php if ($data_aktor->link_foto == 'Belum Ada') { ?>
                            <img src="<?php echo base_url() ?>assets/gambar/profil.png" class="img-circle" width="100px" height="100px">
                          <?php } else { ?>
                            <img src="<?= $data_aktor->link_foto; ?>" class="img-circle" width="100px" height="100px">
                          <?php } ?>
                        </div>
                        <div class="col-md-8 col-8"> 
                          <span class="fs-12">Nama Aktor :</span> 
                          <input type="text" name="nama_aktor" class="form-control" placeholder="Nama Aktor..." value="<?= $data_aktor->nama_aktor; ?>" required>

                          <span class="fs-12">Link Foto :</span> 
                          <input type="text" name="link_foto" class="form-control" placeholder="Link Foto..." value="<?= $data_aktor->link_foto; ?>">
                        </div>
                      </div>
                      <div class="modal-footer justify-content-between">
                        <a href="<?php echo base_url('admin/video_series/hapus_aktor/'.$data_aktor->id_aktor) ?>" class="btn btn-xs btn-danger mb-2" onclick="return confirm('Yakin ingin menghapus data ini?')"><i class="nav-icon fas fa fa-trash"></i> Hapus</a>
                        <button type="submit" class="btn btn-xs btn-primary"><i class="fas fa fa-save"></i> Simpan</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            <?php } ?>
          </div>
        </div>




        <table id="example1" class="table table-bordered">
          <thead>
            <tr>
              <th style="width: 5%;">#</th>
              <th style="width: 30%;">Judul Episode</th>
              <th style="width: 30%;">Link Nonton / ID Film</th>
              <th style="width: 15%;">Player</th>
              <th style="width: 10%;">Status</th>
              <th style="width: 10%;">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php 
            $no=0;
            foreach ($data_episode as $data_episode) {
              $no++;
              ?>
              <tr>
                <td><?= $no; ?></td>
                <td>Episode : <?= $data_episode->urutan; ?> | <?= $data_episode->judul_episode; ?></td>
                <td>
                  <?= $data_episode->link_nonton ;?>
                </td>
                <td>
                  <?= $data_episode->nama_player ;?>
                </td>
                <td>
                  <?php
                  if($data_episode->status=='Publish') { 
                    ?>
                    <a href="<?= base_url("admin/video_series/hiden_episode/".$data_episode->id_episode)?>" class="btn btn-success btn-xs">Publish</a>
                    <?php
                  } else { ?>
                    <a href="<?= base_url("admin/video_series/publish_episode/".$data_episode->id_episode)?>" class="btn btn-danger btn-xs">Hiden</a>
                  <?php } ?>
                </td>
                <td>
                  <a href="<?php echo base_url('admin/video_series/hapus_episode/'.$data_episode->id_episode) ?>" class="btn btn-xs btn-danger mb-2" onclick="return confirm('Yakin ingin menghapus data ini?')"><i class="nav-icon fas fa fa-trash"></i></a>
                  <a href="<?php echo base_url('admin/video_series/ubah_episode/'.$data_episode->id_episode) ?>" class="btn btn-xs btn-primary mb-2"><i class="nav-icon fas fa fa-edit"></i></a>
                  <a href="<?= $data_episode->link_download ;?>" class="btn btn-xs btn-dark mb-2" target="_blank"><i class="nav-icon fas fa fa-download"></i></a>
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
<div class="modal fade" id="modal-tambahepisode<?= $data_series->id_video ;?>">
  <div class="modal-dialog">
    <form action="<?= site_url('admin/video_series/tambah_episode/'.$data_series->id_video) ?>" method="post" enctype="multipart/form-data">

      <div class="modal-content">
        <div class="modal-header">
          <span class="modal-title">Tambah Episode</span>
        </div>
        <div class="modal-body">
         <div class="col-md-12"> 
          <span class="col-md-6 fs-12">Judul Episode :</span> 
          <input type="text" name="judul_episode" class="form-control" placeholder="Judul Video..." required>
        </div>
        <div class="col-md-12"> 
          <span class="col-md-6 fs-12">urutan :</span> 
          <input type="text" name="urutan" class="form-control" placeholder="Urutan..." required>
        </div>

        <div class="mt-2 col-md-12">
          <span class="col-md-6 fs-12">Link Nonton / ID Film (Vdocipher) :</span>  
          <input type="text" name="link_nonton" class="form-control" placeholder="Link Nonton..." required>
        </div>
        <div class="mt-2 col-md-12">
          <span class="col-md-6 fs-12">Link Download :</span>  
          <input type="text" name="link_download" class="form-control" placeholder="Link Download..." required>
        </div>
        <div class="mt-2 col-md-12">
          <span class="col-md-6 fs-12">Pilih Video Player :</span>
          <select name="id_player" class="form-control">
            <?php foreach($data_video_player as $data_video_player) { ?>
              <option value="<?php echo $data_video_player->id_player ?>">
                <?php echo $data_video_player->nama_player ?>
              </option>
            <?php } ?>
          </select>   
        </div>

      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-xs btn-danger" data-dismiss="modal"><i class="fas fa fa-xmark"></i>Batal</button>
        <button type="submit" class="btn btn-xs btn-primary"><i class="fas fa fa-save"></i> Simpan</button>
      </div>
    </div>
  </form>
</div>
</div>

<div class="modal fade" id="modal-tambahaktor<?= $data_series->id_video ;?>">
  <div class="modal-dialog">
    <form action="<?= site_url('admin/video_series/tambah_aktor/'.$data_series->id_video) ?>" method="post" enctype="multipart/form-data">

      <div class="modal-content">
        <div class="modal-header">
          <span class="modal-title">Tambah Aktor</span>
        </div>
        <div class="modal-body">
         <div class="col-md-12"> 
          <span class="col-md-6 fs-12">Nama Aktor :</span> 
          <input type="text" name="nama_aktor" class="form-control" placeholder="Nama Aktor..." required>
        </div>
        <div class="mt-2 col-md-12"> 
          <span class="col-md-6 fs-12">Link Foto :</span> 
          <input type="text" name="link_foto" class="form-control" placeholder="Link Foto...">
        </div>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-xs btn-danger" data-dismiss="modal"><i class="fas fa fa-xmark"></i>Batal</button>
        <button type="submit" class="btn btn-xs btn-primary"><i class="fas fa fa-save"></i> Simpan</button>
      </div>
    </div>

  </form>
</div>
</div>



