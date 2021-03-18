 <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>
 
  <div id="preloader"></div>



  <!-- Vendor JS Files -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="vendor/php-email-form/validate.js"></script>
  <script src="vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="vendor/counterup/counterup.min.js"></script>
  <script src="vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="vendor/venobox/venobox.min.js"></script>
  <script src="vendor/aos/aos.js"></script>
  <!-- Template Main JS File -->
  <script src="js/main.js"></script>
  <script src="vendor/toastr/toastr.js"></script>

  @livewireScripts


<script>
  window.addEventListener('alert', event => { 
               toastr[event.detail.type](event.detail.message, 
               event.detail.title ?? ''), toastr.options = {
                      "timeOut": 50000,
                      "progressBar": true,
                      "closeButton": true,
                  }
              });

              
  @if(Session::has('success'))
  toastr.options =
  {
  	"closeButton" : true,
  	"progressBar" : true,
    "timeOut": 50000

  }
  		toastr.success("{{ session('success') }}");
  @endif

  @if(Session::has('error'))
  toastr.options =
  {
  	"closeButton" : true,
  	"progressBar" : true,
    "timeOut": 50000
  }
  		toastr.error("{{ session('error') }}");
  @endif

  @if(Session::has('info'))
  toastr.options =
  {
  	"closeButton" : true,
  	"progressBar" : true,
    "timeOut": 50000
  }
  		toastr.info("{{ session('info') }}");
  @endif

  @if(Session::has('warning'))
  toastr.options =
  {
  	"closeButton" : true,
  	"progressBar" : true,
    "timeOut": 50000
  }
  		toastr.warning("{{ session('warning') }}");
  @endif



  </script>


  
    </body>
  </html>