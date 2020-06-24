<!-- REQUIRED JS SCRIPTS -->
<!-- Bootstrap 3.3.6 -->
<script src="<?= base_url(); ?>assets/admin/bootstrap/js/bootstrap.min.js"></script>
<script src="<?= base_url(); ?>assets/admin/plugins/select2/select2.full.min.js"></script>
<script src="<?= base_url(); ?>assets/admin/plugins/iCheck/icheck.min.js"></script>
<script src="<?= base_url(); ?>assets/admin/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url(); ?>assets/admin/plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url(); ?>assets/admin/dist/js/app.min.js"></script>
<script>
	
	function harusHuruf(evt){
        var charCode = (evt.which) ? evt.which : event.keyCode
	    if ((charCode < 65 || charCode > 90)&&(charCode < 97 || charCode > 122)&&charCode>32)
	    return false;
	    return true;
	}
</script>

<!-- Ajax saya nanti -->
