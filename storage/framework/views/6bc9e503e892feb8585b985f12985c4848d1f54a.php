 <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>
 
  <div id="preloader"></div>



  <!-- Vendor JS Files -->
  <script src="<?php echo e(asset('vendor/jquery/jquery.min.js')); ?>"></script>
  <script src="<?php echo e(asset('vendor/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>
  <script src="<?php echo e(asset('vendor/jquery.easing/jquery.easing.min.js')); ?>"></script>
  <script src="<?php echo e(asset('vendor/php-email-form/validate.js')); ?>"></script>
  <script src="<?php echo e(asset('vendor/waypoints/jquery.waypoints.min.js')); ?>"></script>
  <script src="<?php echo e(asset('vendor/counterup/counterup.min.js')); ?>"></script>
  <script src="<?php echo e(asset('vendor/owl.carousel/owl.carousel.min.js')); ?>"></script>
  <script src="<?php echo e(asset('vendor/isotope-layout/isotope.pkgd.min.js')); ?>"></script>
  <script src="<?php echo e(asset('vendor/venobox/venobox.min.js')); ?>"></script>
  <script src="<?php echo e(asset('vendor/aos/aos.js')); ?>"></script>
  <!-- Template Main JS File -->
  <script src="<?php echo e(asset('js/main.js')); ?>"></script>
  <script src="<?php echo e(asset('vendor/toastr/toastr.js')); ?>"></script>
  <script src="<?php echo e(asset('js/jquery.form.js')); ?>"></script>

  <?php echo \Livewire\Livewire::scripts(); ?>


<script>
   $(document).on('click','.opencomment',function(){
    url = $(this).data('lien');
    $('#modalComment').modal('show');
    $('#modalComment .modal-content').html('<h3 style="text-align:center; margin:5px"><i class="fa fa-spin fa-spinner"></i> Chargement en cours...</h3>');
    $.ajax({
            type: "GET",
            url: url,
            dataType: "text",
            success: function(data){
              $('#modalComment .modal-content').html(data);
              $('.textarea').summernote()
            }
          });
  });
</script>
<script>
  window.addEventListener('alert', event => { 
      toastr[event.detail.type](
        event.detail.message, 
        event.detail.title ?? ''
      ), 
      toastr.options = {
            "timeOut": 50000,
            "progressBar": true,
            "closeButton": true,
        }
  });

              
  <?php if(Session::has('success')): ?>
  toastr.options =
  {
  	"closeButton" : true,
  	"progressBar" : true,
    "timeOut": 50000

  }
  		toastr.success("<?php echo e(session('success')); ?>");
  <?php endif; ?>

  <?php if(Session::has('error')): ?>
  toastr.options =
  {
  	"closeButton" : true,
  	"progressBar" : true,
    "timeOut": 50000
  }
  		toastr.error("<?php echo e(session('error')); ?>");
  <?php endif; ?>

  <?php if(Session::has('info')): ?>
  toastr.options =
  {
  	"closeButton" : true,
  	"progressBar" : true,
    "timeOut": 50000
  }
  		toastr.info("<?php echo e(session('info')); ?>");
  <?php endif; ?>

  <?php if(Session::has('warning')): ?>
  toastr.options =
  {
  	"closeButton" : true,
  	"progressBar" : true,
    "timeOut": 50000
  }
  		toastr.warning("<?php echo e(session('warning')); ?>");
  <?php endif; ?>



  </script>


  
    </body>
  </html><?php /**PATH C:\laragon\www\Osature\resources\views/sections/js.blade.php ENDPATH**/ ?>