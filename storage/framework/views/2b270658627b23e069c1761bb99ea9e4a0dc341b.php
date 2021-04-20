<!DOCTYPE html>
<html lang="<?php echo e(app()->getLocale()); ?>">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Osature | Administration | <?php echo e($title); ?></title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="<?php echo e(asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')); ?>">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo e(asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css')); ?>">
  <!-- JQVMap -->
  <link rel="stylesheet" href="<?php echo e(asset('plugins/jqvmap/jqvmap.min.css')); ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo e(asset('dist/css/adminlte.min.css')); ?>">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?php echo e(asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css')); ?>">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo e(asset('plugins/daterangepicker/daterangepicker.css')); ?>">
  <!-- summernote -->
  <link rel="stylesheet" href="<?php echo e(asset('plugins/summernote/summernote-bs4.min.css')); ?>">

  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo e(asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(asset('plugins/summernote/summernote-bs4.css')); ?>">
  
  <?php echo \Livewire\Livewire::styles(); ?>

  
  <div class="modal fade" id="modalAll">
      <div class="modal-dialog">
        <div class="modal-content">
          
        </div>
      </div>
    </div>
    
  <div class="modal fade" id="modalAll1">
    <div class="modal-dialog" style=" max-width:1000px">
      <div class="modal-content">
        
      </div>
    </div>
  </div>
  <div class="modal fade" id="modaldelete" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              
              <div class="modal-header text-center">
                  <h4 class="modal-title">Confirmation</h4>
              </div>
              <div class="modal-body">
                  <h5>Voulez vous vraiment supprimer cet élément ?</h5>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Fermer</button>
                  <button  id="delete" class="btn btn-danger waves-effect waves-light">Supprimer</button>
              </div>
          </div>
      </div>
  </div>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper"><?php /**PATH C:\laragon\www\Osature\resources\views/administration/layoutAdmin/css.blade.php ENDPATH**/ ?>