<!DOCTYPE html>
<html>
  <head>
    <title>Smakenforu | <?= $page; ?></title>
    <!-- meta -->
    <?= @$_meta; ?>

    <!-- css --> 
    <?= @$_css; ?>

    <!-- jQuery 2.2.3 -->
    <script src="<?= base_url(); ?>assets/admin/plugins/jQuery/jquery-2.2.3.min.js"></script>
  </head>

  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
      <!-- header -->
      <?= @$_header; ?> <!-- nav -->
      
      <!-- sidebar -->
      <?= @$_sidebar; ?>
      
      <!-- content -->
      <?= @$_content; ?> <!-- headerContent --><!-- mainContent -->
    
      <!-- footer -->
      <?= @$_footer; ?>
    
      <div class="control-sidebar-bg"></div>
    </div>

    <!-- js -->
    <?= @$_js; ?>
  </body>
</html>