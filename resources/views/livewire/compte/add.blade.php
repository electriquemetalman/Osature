
<div class="modal-content">

    <div class="modal-header">
        <h4 class="modal-title">Creation d'un compte</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span></button>
    </div>
    
    <form role="form" action="{{route('comptes.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="modal-body" style="max-height: 550px;overflow: auto;">
            <div class="card-body row">
                <div class="col-md-12 col-12">
                    <center>
                        <img id="imgpreviewad" class="btnaddimage" style="max-height: 130px;" src="default.png"><br>
                        <input type="file" id="inputimgad" name="image" style="display: none;" accept=".png,.jpeg,.jpg">
                    </center>
                </div>
                <div class="form-group col-md-6">
                    <label for="exampleInputEmail1">Nom</label>
                    <input type="text" class="form-control" name="nom" placeholder="Nom" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="exampleInputEmail1">Prénom</label>
                    <input type="text" class="form-control" name="prenom" placeholder="Prénom" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="exampleInputEmail1">Nom d'utilisateur</label>
                    <input type="text" class="form-control" name="nomuser" placeholder="Nom d'utilisateur" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="email" class="form-control" name="email" placeholder="Email" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="exampleInputEmail1">Mot de passe</label>
                    <input type="password" class="form-control" name="password" placeholder="Mot de passe" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="exampleInputEmail1">Pays</label>
                    <input type="text" class="form-control" name="pays" placeholder="Pays" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="exampleInputEmail1">Type de compte</label>
                    <select class="form-control" name="type" required id="type">
                        <option value="client">Client</option>
                        <option value="administrateur">Administrateur</option>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="exampleInputEmail1">Statut</label>
                    <select class="form-control" name="statut" required>
                        <option value="1">Actif</option>
                        <option value="0">Inactif</option>
                    </select>
                </div>
                <div class="form-group col-md-6" id="role" style="display:none;">
                    <label for="exampleInputEmail1">Role</label>
                    <select class="form-control" name="roles_id" id="role_select">
                        @foreach($role as $r)
                        <option value="{{$r->id}}">{{$r->nom}}</option>
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