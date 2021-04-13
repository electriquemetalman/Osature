 <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>
 
  <div id="preloader"></div>



  <!-- Vendor JS Files -->
  <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('vendor/jquery.easing/jquery.easing.min.js')}}"></script>
  <script src="{{asset('vendor/php-email-form/validate.js')}}"></script>
  <script src="{{asset('vendor/waypoints/jquery.waypoints.min.js')}}"></script>
  <script src="{{asset('vendor/counterup/counterup.min.js')}}"></script>
  <script src="{{asset('vendor/owl.carousel/owl.carousel.min.js')}}"></script>
  <script src="{{asset('vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
  <script src="{{asset('vendor/venobox/venobox.min.js')}}"></script>
  <script src="{{asset('vendor/aos/aos.js')}}"></script>
  <!-- Template Main JS File -->
  <script src="{{asset('js/main.js')}}"></script>
  <script src="{{asset('vendor/toastr/toastr.js')}}"></script>
  <script src="{{asset('js/jquery.form.js')}}"></script>

  @livewireScripts

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