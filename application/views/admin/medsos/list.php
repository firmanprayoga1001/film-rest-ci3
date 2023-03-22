<div class="content-wrapper">
  <section class="Content">
  <div class="container">
    <div class="row">
       <div class="col-md-12"> 
        <div class="card mt-2" style="font-family: verdana; font-size: 11px;">
           <div class="card-body">                     
                <div class="col-md-12">
                <!-- Bagian Tombol -->
                <b>Kelola medsos</b>
                  
                  <hr>
                </div>
                <!-- Bagian Tabel -->
                <div class="col-md-12">
                  
                    <table id="example1" class="table table-bordered">
                      <thead>
                      <tr>
                        <th style="width: 5%;">#</th>
                        <th style="width: 10%;">Medsos</th>
                        <th>Link</th>
                       
                      </tr>
                      </thead>
                      <tbody>
                        <?php 
                        $no=0;
                        foreach ($data_medsos as $data_medsos) {
                        $no++;
                        
                        ?>
                      <tr>
                        <td><?= $no; ?></td>
                        <td><?= $data_medsos->nama; ?></td>
                        <td>
                          <?php echo form_open_multipart(base_url('admin/medsos/ubah_medsos/'.$data_medsos->id_medsos),' class="form-horizontal"');?>
                          <input type="text" name="link" class="form-control" value="<?= $data_medsos->link; ?>">
                          <button class="btn btn-primary btn-xs mb-2 mt-2" name="submit" onclick="return confirm('Yakin ingin mengubah data ini?')" type="submit">
                            <i class="fa fa-save"></i> Simpan
                          </button>
                          <?php if($data_medsos->status=='publish') { ?>
                              <a href="<?= base_url("admin/medsos/hiden_medsos/".$data_medsos->id_medsos)?>" class="btn btn-success btn-xs mb-2 mt-2">Status Publish</a>
                          <?php
                          } else { ?>
                              <a href="<?= base_url("admin/medsos/publish_medsos/".$data_medsos->id_medsos)?>" class="btn btn-danger btn-xs mb-2 mt-2">Status Hiden</a>
                          <?php } ?>
                          <?php echo form_close(); ?>
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

