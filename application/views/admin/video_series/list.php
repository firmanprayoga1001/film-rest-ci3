<div class="content-wrapper" >
  <section class="Content">
  <div class="container">
    <div class="row">
       <div class="col-md-12"> 
        <div class="card mt-2" style="font-family: calibri; font-size: 12px;">
           <div class="card-body">                      
                <div class="col-md-12">
                  <a href="<?php echo base_url('admin/video_series')?>"> 
                    <button type="button" class="btn btn-xs btn-dark" name="data_series">
                      <i class="nav-icon fas fa fa-video"> Semua Series</i> 
                    </button>
                  </a>
                  <a href="<?php echo base_url('admin/video_series/kelolavideo')?>"> 
                    <button type="button" class="btn btn-xs btn-primary" name="data_series">
                      <i class="nav-icon fas fa fa-edit"> Kelola Series</i> 
                    </button>
                  </a>
                  <hr>
                  <p>Video Series</p>
                </div>


<section class="newproduct">
	<div class="container">
		<div class="col-sm-12 col-md-12 col-lg-12">
			<div class="row">
				<?php foreach($data_series as $data_series) { ?>
				<div class="col-lg-2 col-4 col-sm-2">
					<a href="<?php echo base_url('admin/video_series/detail_video/'.$data_series->id_video) ?>">
					<div>
							<img src="<?php echo base_url('assets/gambar/thumbnail/'.$data_series->gambar) ?>" alt="<?php echo $data_series->judul_video ?>"
							style="opacity: 100" class="img-fluid img-thumbnail">
              <?php
                    if($data_series->status=='Publish') { 
                    ?>
                        <div class="card fs-11" style="position: absolute; top: 4px; left: 3px; padding: 3px; color: white; background-color:green; border-radius:0;">
                          Publish 
                        </div>
                    <?php
                    } else { ?>
                        <div class="card fs-11" style="position: absolute; top: 4px; left: 3px; padding: 3px; color: white; background-color:red; border-radius:0;">
                          Hidden 
                        </div>
              <?php } ?>
					</div>
					</a>
					<p align=center><?php echo $data_series->judul_video ?> (<?= $data_series->tahun; ?>)</p>
					<?php 
					echo form_close();
					?>
				</div>
				<?php } ?>	
			</div>
		</div>
	</div>
</section>
                  
              
            </div>
          </div>
        </div>
      </div>
   </div>
</section>
</div>
         
