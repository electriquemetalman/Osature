
<div class="modal-content">

    <div class="modal-header">
        <h4 class="modal-title">Edit a new</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span></button>
    </div>
    
<form role="form" action="news/update/{{$new->id}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="modal-body" style="height: 550px;overflow: auto;">
            <div class="card-body">
                <div class="col-md-12 col-12">
                    <center>
                        <img id="imgpreviewad" class="btnaddimage" style="max-height: 200px;" src="{{$new->image=='' ? 'default.png':'image/news/'.$new->image}}"><br>
                        <input type="file" id="inputimgad" name="image" style="display: none;" accept=".png,.jpeg,.jpg">
                    </center>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Title</label>
                    <input type="text" class="form-control" name="titre" value="{{$new->title}}" placeholder="Title" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Description</label>
                    <textarea class="form-control textarea" name="description" placeholder="Description">{{$new->content}}</textarea>
                </div>
            </div> 
            <p id="infoslogin" style="text-align: center;color: red"></p>
        </div>
        <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal"  id="fermer">Close</button>
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </form>
    <script type="text/javascript">
        $('form').on('submit', function(){ 
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
                        $('#infoslogin').html(data.reason);
                    }
                },
                error: function(xhr, statusText, err) {
                    alert("Problème lors de l'enregistrement "+xhr.responseText);
                }
            }); 
            return false;
        }); 
    </script>