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
<script src="{{asset('js/jquery.form.js')}}"></script>

</body>
<script type="text/javascript">
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