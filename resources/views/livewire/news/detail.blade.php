
<div class="modal-content">
    <div class="modal-header">
        <h4 class="modal-title">New's detail</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span></button>
    </div>
    <div class="modal-body" style="max-height: 550px;overflow: auto;">
        <div class="card-body">
            <div class="col-md-12 col-12">
                <center>
                    <img style="max-height: 200px;" src="{{$new->image=='' ? 'default.png':'image/news/'.$new->image}}"><br>
                </center>
            </div>
            <div class="form-group">
                <h2>Title : {{$new->title}}</h2>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Description : </label> <br>
                {!!$new->content!!}
            </div>
        </div> 
    </div>
    <p id="infoslogin" style="text-align: center;color: red"></p>
    <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal"  id="fermer">Close</button>
    </div>
</div>