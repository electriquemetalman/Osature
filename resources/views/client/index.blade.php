<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Espace Client - Osature</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="description" content="This is an example dashboard created using build-in elements and components.">

    <meta name="msapplication-tap-highlight" content="no">

    <link href="{{asset('assets/css/main.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets/css/pe-icon-7-stroke.min.css')}}">
<<<<<<< HEAD
    
=======

    <div class="modal fade show" id="modalAll" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-modal="false">
        <div class="modal-dialog" role="document">
            <div class="modal-content">

            </div>
        </div>
    </div>
    <div class="modal fade show" id="modalAll1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-modal="false">
        <div class="modal-dialog" role="document">
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
>>>>>>> b3e74eabb44907e378d216aa365fdd5c833c5bb8
</head>
<body>
    <div class="app-container app-theme-white body-tabs-shadow fixed-header fixed-sidebar">
        <!-- Header -->     
        <div class="app-header header-shadow">
            @include('client/layouts/header')
        </div>     
        <div class="app-main">
            <div class="app-sidebar sidebar-shadow">
                @include('client/layouts/sidebar')
            </div>
            <div class="app-main__outer">
                <div class="app-main__inner">
                    @yield('content')
                </div>
                <div class="app-wrapper-footer">
                    @include('client/layouts/footer')
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="{{asset('assets/js/main.js')}}"></script>
    
<!-- jQuery -->
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<<<<<<< HEAD
=======
<script src="{{asset('js/bootstrap.min.js')}}"></script>
>>>>>>> b3e74eabb44907e378d216aa365fdd5c833c5bb8
<script src="{{asset('js/jquery.form.js')}}"></script>

</body>
<script type="text/javascript">
<<<<<<< HEAD
=======
    $(document).on('click','.btnedit',function(){
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
                }
          });
    });

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

>>>>>>> b3e74eabb44907e378d216aa365fdd5c833c5bb8
    $('#profile').on('submit', function(){ 
        $('#profile .fa-spin').show();
        $(this).ajaxSubmit({
            beforeSend: function() {
                
            },
            uploadProgress: function(event, position, total, percentComplete) {
                
            },
            dataType:"json",
            success: function(data, statusText, xhr) {
                if (data.state == 'success') {
                    location.reload();
                }
                else{
                    $('#profile .fa-spin').hide();
                    $('#profile #infoslogin').html(data.reason);
                }
            },
            error: function(xhr, statusText, err) {
                $('#profile .fa-spin').hide();
                alert("Problème lors de l'enregistrement "+xhr.responseText);
            }
        }); 
        return false;
    }); 
    
    $('#mdp').on('submit', function(){ 
        $('#mdp .fa-spin').show();
        $(this).ajaxSubmit({
            beforeSend: function() {
                
            },
            uploadProgress: function(event, position, total, percentComplete) {
                
            },
            dataType:"json",
            success: function(data, statusText, xhr) {
                if (data.state == 'success') {
                    location.reload();
                }
                else{
                    $('#mdp .fa-spin').hide();
                    $('#mdp #infoslogin').html(data.reason);
                }
            },
            error: function(xhr, statusText, err) {
                $('#mdp .fa-spin').hide();
                alert("Problème lors de l'enregistrement "+xhr.responseText);
            }
        }); 
        return false;
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
</script>
</html>