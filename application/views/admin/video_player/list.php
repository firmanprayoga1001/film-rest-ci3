<div class="content-wrapper">
  <section class="Content">
    <div class="container">
      <div class="row">
       <div class="col-md-12"> 
        <div class="card mt-2" style="font-family: verdana; font-size: 11px;">
         <div class="card-body">                     
          <div class="col-md-12">
            <!-- Bagian Tombol -->
            <a href="<?php echo base_url('admin/video_player')?>"> 
              <button type="button" class="btn btn-xs btn-dark" name="data_video">
                <i class="nav-icon fas fa fa-list"> Video Player</i> 
              </button>
            </a>

            <button type="button" class="btn btn-xs btn-primary float-right" name="data_video" data-toggle="modal" data-target="#modal-tambahvideo_player">
              <i class="nav-icon fas fa fa-plus"> Tambah Player</i> 
            </button>

            <hr>
          </div>
          <!-- Bagian Tabel -->
          <div class="col-md-12">
            <table id="example1" class="table table-bordered">
              <thead>
                <tr>
                  <th style="width: 5%;">#</th>
                  <th>Nama Video Player</th>
                  <th style="width: 20%;">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                $no=0;
                foreach ($data_video_player as $data_video_player) {
                  $no++;

                  ?>
                  <tr>
                    <td><?= $no; ?></td>
                    <td><?= $data_video_player->nama_player; ?></td>
                    <td>
                      <a href="<?php echo base_url('admin/video_player/ubah_video_player/'.$data_video_player->id_player) ?>" class="btn btn-xs btn-primary"><i class="nav-icon fas fa fa-edit"></i></a>
                      <a href="<?php echo base_url('admin/video_player/hapus_video_player/'.$data_video_player->id_player) ?>" class="btn btn-xs btn-danger" onclick="return confirm('Yakin ingin menghapus data ini?')"><i class="nav-icon fas fa fa-trash"></i></a>
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
<div class="modal fade" id="modal-tambahvideo_player">
  <div class="modal-dialog">
    <form action="<?= site_url('admin/video_player/tambah_video_player') ?>" method="post">
      <div class="modal-content">
        <div class="modal-header">
          <h6 class="modal-title">Tambah Video Player</h6>
        </div>
        <div class="modal-body">
          <div class="row col-md-12">  
            <input type="text" name="nama_player" class="form-control" placeholder="Nama Video Player..." required>
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

