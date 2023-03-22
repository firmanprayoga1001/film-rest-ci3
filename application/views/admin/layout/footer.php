
<footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 1.1.1
    </div>
    <strong style="font-size: 12px;">Original Maker : Y-O-G-S.</strong>
</footer>

</div>
</div>
<?php
if($this->session->flashdata('sukses')) {
	echo '<div class="toast toastSukses">';
	echo '</div>';	
}
?>
<?php
if($this->session->flashdata('error')) {
	echo '<div class="toast toastError">';
	echo '</div>';	
}
?>
<?php
if($this->session->flashdata('info')) {
	echo '<div class="toast toastInfo">';
	echo '</div>';	
}
?>
<?php
if($this->session->flashdata('pesan')) {
	echo '<div class="toast toastPesan">';
	echo '</div>';	
}
?>


<script src="<?php echo base_url() ?>assets/admin/plugins/jquery/jquery.min.js"></script>
<script src="<?php echo base_url() ?>assets/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url() ?>assets/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url() ?>assets/admin/dist/js/adminlte.min.js"></script>
<script src="<?php echo base_url() ?>assets/admin/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url() ?>assets/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url() ?>assets/admin/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url() ?>assets/admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?php echo base_url() ?>assets/admin/plugins/sweetalert2/sweetalert2.min.js"></script>
<script src="<?php echo base_url() ?>assets/admin/dist/js/demo.js"></script>
<script src="<?php echo base_url() ?>assets/admin/plugins/summernote/summernote-bs4.min.js"></script>





<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
      "paging": false,
      "lengthChange": false,
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
<script>
  $(function () {
    $('.textarea').summernote()
  })
</script>
<script type="text/javascript">
  $(function() {
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });
    $('.toastSukses').show(function() {
      Toast.fire({
        icon: 'success',
        title: ('<?php echo $this->session->flashdata('sukses'); ?>')
      })
    });
    $('.toastInfo').show(function() {
      Toast.fire({
        icon: 'info',
        title: ('<?php echo $this->session->flashdata('info'); ?>')
      })
    });
    $('.toastError').show(function() {
      Toast.fire({
        icon: 'error',
        title: ('<?php echo $this->session->flashdata('error'); ?>')
      })
    });
    $('.toastPesan').show(function() {
      Toast.fire({
        icon: 'warning',
        title: ('<?php echo $this->session->flashdata('pesan'); ?>')
      })
    });
  });
</script>
</body>
</html>