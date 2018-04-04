<!-- jQuery 3 -->
<script src="/themes/adminlte/bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="/themes/adminlte/bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="/themes/adminlte/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="/themes/adminlte/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="/themes/adminlte/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="/themes/adminlte/dist/js/adminlte.min.js"></script>

<script src="/themes/adminlte/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
    <script src="js/tinymce/tinymce.min.js"></script>
<script src="js/tinymce/config.js"></script>  


<script>
    $(document).ready(function(){
	    setTimeout(function() {
	      $('#flash_message').fadeOut('fast');
	    }, 4000); // <-- time in milliseconds
	});
</script>

<!--CUSTOM SCRIPTS-->
    @yield('customScripts')
<!--END CUSTOM SCRIPTS-->