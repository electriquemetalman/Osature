
<div class="modal-content">

    <div class="modal-header">
        <h4 class="modal-title">Edit a role</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span></button>
    </div>
    
<form role="form" action="roles/update/{{$role->id}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="modal-body" style="max-height: 550px;overflow: auto;">
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" class="form-control" name="nom" value="{{$role->nom}}" placeholder="Name" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Slug</label>
                    <input type="text" class="form-control" name="slug" value="{{$role->slug}}" placeholder="Slug" required>
                </div>
            </div> 
            <p id="infoslogin" style="text-align: center;color: red"></p>
        </div>
        <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal"  id="fermer">Close</button>
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