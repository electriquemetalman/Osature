
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('plugins/sweetalert2/sweetalert2.min.js')}}"></script>
<script src="{{asset('plugins/toastr/toastr.min.js')}}"></script>

<!-- DataTables -->
<script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{asset('plugins/chart.js/Chart.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{asset('plugins/sparklines/sparkline.js')}}"></script>
<!-- JQVMap -->
<script src="{{asset('plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{asset('plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('plugins/jquery-knob/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{asset('plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- Summernote -->
<script src="{{asset('plugins/summernote/summernote-bs4.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('dist/js/adminlte.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('dist/js/pages/dashboard.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('dist/js/demo.js')}}"></script>
<script src="{{asset('js/jquery.form.js')}}"></script>
<script src="{{asset('plugins/summernote/summernote-bs4.min.js')}}"></script>

<script>

  // $(document).ready(function(){
  //   const Toast = Swal.mixin({
  //     toast: true,
  //     position: 'top-end',
  //     showConfirmButton: false,
  //     timer: 3000
  //   });
  //   toastr.success('Tes alertes comme tu les aimes');
  // })
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
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
  $(document).on('click','.edit-row',function(){
    url = $(this).data('lien');
    modal = $(this).data('modal');
    $('#'+modal).modal('show');
    $('#'+modal+' .modal-content').html('<h3 style="text-align:center; margin:5px"><i class="fa fa-spin fa-spinner"></i> Chargement en cours...</h3>');
    $.ajax({
            type: "GET",
            url: url,
            dataType: "text",
            success: function(data){
              $('#'+modal+' .modal-content').html(data);
              $('.textarea').summernote()
            }
          });
  });
  $(document).on('click','.btnpaginate',function(){
        var lien = $(this).data('lien');
        var page = $(this).data('page');
        $("#tablebody").html("<h2 style='text-align:center;'><i class='fa fa-spinner fa-spin'></i> En cours de chargement ...</h2>");
        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'), 'X-Requested-With': 'XMLHttpRequest'},
            url: lien,
            data : {'page':page},
            type: 'POST',
            dataType: 'text',
            success: function(result){
                $("#tablebody").html(result);
                $('#myTable').DataTable({
                    "paging": false,
                    "bInfo" : false,
                });
            }
        });
    })
    $(document).on('click','.btncheck',function(){
        var role = $(this).data('role');
        var permission = $(this).data('permission');
        var state = 0;
        if($(this).is(':checked')){
          state = 1;
        }
        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'), 'X-Requested-With': 'XMLHttpRequest'},
            url: 'permissions/checked',
            data : {'role':role, 'permission':permission,'state':state, _token : "{{ csrf_token() }}"},
            type: 'POST',
            dataType: 'json',
            success: function(result){
            }
        });
    })

  $(document).on('click','#delete',function(){
      url = $(this).data('lien');
      $.ajax({
              type: "DELETE",
              url : url,
              data: { _token : "{{ csrf_token() }}"},
              dataType: "text",
              success: function(data){
                location.reload();
              }
            });
    });

    $(document).on('click','.remove-row',function(){
      $('#modaldelete').modal('show');
      url = $(this).data('lien');
      $('#modaldelete #delete').attr('data-lien',url);
    });
  $(document).on('click','.btnaddimage',function(){
      $('#inputimgad').trigger('click');
  });
  $(document).on('change','#inputimgad',function(){
      readURL(this,'imgpreviewad');
  });
  function readURL(input, ids) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();  
      reader.onload = function (e) {
        $('#'+ids).attr('src', e.target.result);
        var src = $('#'+ids).attr('src');
      }
      reader.readAsDataURL(input.files[0]);
    }
  }
  $(document).on('change','#type',function(){ 
    if($(this).val()=='client'){
      $("#role").hide();
      $("#role_select").val('');
    }else{
      $("#role").show();
    }
  })
</script>
@livewireScripts
</body>
</html>
