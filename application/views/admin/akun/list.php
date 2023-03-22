<div class="content-wrapper">
  <section class="Content">
  <div class="container">
    <div class="row">
       <div class="col-md-12"> 
        <div class="card mt-2" style="font-family: verdana; font-size: 11px;">
           <div class="card-body">                     
                <div class="col-md-12">

                <!-- Bagian Tombol -->
                  <a href=""> 
                    <button type="button" class="btn btn-xs btn-dark" name="data_video">
                      <i class="nav-icon fas fa fa-list"> Akun</i> 
                    </button>
                  </a>
                  
                    <button type="button" class="btn btn-xs btn-primary float-right" name="data_video" data-toggle="modal" data-target="#modal-tambahakun">
                      <i class="nav-icon fas fa fa-plus"> Tambah Akun</i> 
                    </button>
                  
                  <hr>
                </div>
                <!-- Bagian Tabel -->
                <div class="col-md-12">
                    <table id="example1" class="table table-bordered">
                      <thead>
                      <tr>
                        <th style="width: 5%;">#</th>
                        <th>Nama Lengkap</th>
                        <th style="width: 20%;">Username</th>
                        <th style="width: 20%;">status</th>
                        <th style="width: 20%;">Action</th>
                      </tr>
                      </thead>
                      <tbody>
                        <?php 
                        $no=0;
                        foreach ($data_admin as $data_admin) {
                        $no++;
                        
                        ?>
                      <tr>
                        <td><?= $no; ?></td>
                        <td><?= $data_admin->nama_pengguna; ?></td>
                        <td><?= $data_admin->username; ?></td>
                        <td><?= $data_admin->status; ?></td>
                        <td>
                        <a href="<?php echo base_url('admin/akun/ubah_akun/'.$data_admin->id_admin) ?>" class="btn btn-xs btn-primary"><i class="nav-icon fas fa fa-edit"></i></a>
                          <a href="<?php echo base_url('admin/akun/hapus_akun/'.$data_admin->id_admin) ?>" class="btn btn-xs btn-danger" onclick="return confirm('Yakin ingin menghapus data ini?')"><i class="nav-icon fas fa fa-trash"></i></a>
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
<div class="modal fade" id="modal-tambahakun">
  <div class="modal-dialog">
  <form action="<?= site_url('admin/akun/tambah_akun') ?>" method="post">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title">Tambah Akun</h6>
      </div>
      <div class="modal-body">
        <div class="row col-md-12">  
            Nama Pengguna : <input type="text" name="nama_pengguna" class="form-control" placeholder="Nama Pengguna..." required>
        </div>
        <div class="row col-md-12">  
            Username : <input type="text" name="username" class="form-control" placeholder="Username..." required>
            <span class="text-danger">Ketik minimal 6</span>
        </div>
        <div class="row col-md-12">  
            Password : <input type="text" name="password" class="form-control" placeholder="Password..." required>
            <span class="text-danger">Ketik minimal 6</span>
        </div>
        <div class="row col-md-12">  
            Status : 
                <select name="status" class="form-control">
                            <option value="Master">Master Admin</option>
                            <option value="Admin">Admin</option>
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

