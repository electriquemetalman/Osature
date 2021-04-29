
<div class="modal-content">

        <div class="modal-header">
            <h4 class="modal-title">Creation d'un compte</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
        </div>
        
        <form role="form" action="comptes/update/{{$compte->id}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="modal-body" style="max-height: 550px;overflow: auto;">
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Type de compte</label>
                        <select class="form-control" name="type" required id="type">
                            <option value="client" {{$compte->type=='client' ? 'selected':''}}>Client</option>
                            <option value="administrateur" {{$compte->type=='administrateur' ? 'selected':''}}>Administrateur</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Statut</label>
                        <select class="form-control" name="statut" required>
                            <option value="1" {{$compte->statut=='1' ? 'selected':''}}>Actif</option>
                            <option value="0" {{$compte->statut=='0' ? 'selected':''}}>Inactif</option>
                        </select>
                    </div>
                    <div class="form-group" id="role" style="{{$compte->type=='client' ? 'display:none':''}}">
                        <label for="exampleInputEmail1">Role</label>
                        <select class="form-control" name="roles_id" id="role_select">
                            @foreach($role as $r)
                            <option value="{{$r->id}}" {{$compte->roles_id==$r->id ? 'selected':''}}>{{$r->nom}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <p id="infoslogin" style="text-align: center;color: red"></p>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal" id="fermer">Close</button>
                <button type="submit" class="btn btn-primary">Save <i class="fa fa-spinner fa-spin" style="display: none"></i></button>
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