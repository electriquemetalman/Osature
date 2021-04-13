
<div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modifier un compte</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div>
    <form class="" action="/compteUser/update/{{$compteUser['id']}}" method="POST">
        @csrf
        <div class="modal-body">
            <div class="position-relative form-group">
                <label class="">Type de compte</label>
                <select name="type" class="form-control" required>
                    @if(!in_array("apm",$table) || $compteUser['type']=="apm")
                    <option value="apm" {{$compteUser['type']=="apm" ? 'selected':''}}>Adresse USD Perfect money</option>
                    @endif
                    @if(!in_array("bitcoin",$table) || $compteUser['type']=="bitcoin")
                    <option value="bitcoin">Adresse Bitcoin</option>
                    @endif
                    @if(!in_array("payeer",$table) || $compteUser['type']=="payeer")
                    <option value="payeer" {{$compteUser['type']=="payeer" ? 'selected':''}}>Adresse USD Payeer</option>
                    @endif
                </select>
            </div>
            <div class="position-relative form-group">
                <label class="">Adresse</label>
                <input type="text" name="adresse" placeholder="Adresse" value="{{$compteUser['adresse']}}" class="form-control" required>
            </div>
        </div>
        <p id="infoslogin" style="text-align: center;color: red"></p>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
            <button type="submit" class="btn btn-primary">Enregistrer <i class="fa fa-spinner fa-spin" style="display: none"></i></button>
        </div>
    </form>
    <script type="text/javascript">
        $('form').on('submit', function(){ 
            $('.fa-spin').show();
            $(this).ajaxSubmit({
                beforeSend: function() {
                    
                },
                uploadProgress: function(event, position, total, percentComplete) {
                    
                },
                dataType:"json",
                success: function(data, statusText, xhr) {
                    console.log(data);
                    if (data.state == 'success') {
                        location.reload();
                    }
                    else{
                        $('.fa-spin').hide();
                        $('#infoslogin').html(data.reason);
                    }
                },
                error: function(xhr, statusText, err) {
                    $('.fa-spin').hide();
                    alert("Problème lors de l'enregistrement "+xhr.responseText);
                }
            }); 
            return false;
        }); 
    </script>