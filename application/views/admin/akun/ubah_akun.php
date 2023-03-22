<div class="content-wrapper">
<section class="Content">
<div class="container">
  <div class="row">
     <div class="col-md-12"> 
      <div class="card mt-2" style="font-family: verdana; font-size: 11px;">
         <div class="card-body">
              <div class="form-group">
<?php if ($this->session->flashdata('pesan')) {
		echo '<div class="alert alert-warning">';
		echo $this->session->flashdata('pesan');
		echo '</div>';
} ?>
                <h6>Ubah Data Akun Admin</h6>
                <hr>
                <?php echo form_open_multipart(base_url('admin/akun/ubah_akun/'.$data_admin->id_admin),' class="form-horizontal"');?>
                
                    <label class="col-md-12 control-label">Nama Pengguna</label>
                    <div class="col-md-12">
                        <input type="text" name="nama_pengguna" class="form-control" placeholder="Nama Pengguna..." value="<?php echo $data_admin->nama_pengguna ?>" required>
                    </div>

                    <label class="col-md-12 mt-3 control-label">User Name</label>
                    <div class="col-md-12">
                        <input type="text" name="username" class="form-control" placeholder="Username..." value="<?php echo $data_admin->username ?>" required>
                        <span class="text-danger">Ketik minimal 6 karakter untuk mengganti username</span>
                    </div>
                    <label class="col-md-12 mt-3 control-label">Password Baru</label>
                    <div class="col-md-12">
                    <input type="password" name="password" class="form-control" placeholder="Password" value="">
					          <span class="text-danger">Ketik minimal 6 karakter untuk mengganti password baru atau biarkan kosong</span>
                    </div>
                    <label class="col-md-12 mt-3 control-label">Status</label>
                    <div class="col-md-12">
                            <select name="status" class="form-control">
                                        <option value="<?php echo $data_admin->status ?>" selected><?php echo $data_admin->status ?></option>
                                        <option value="Master">Master Admin</option>
                                        <option value="Admin">Admin</option>
                            </select> 
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


