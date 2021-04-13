
<div class="modal-content">

    <div class="modal-header">
        <h4 class="modal-title">Leave a comment</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span></button>
    </div>
    
    <form role="form" action="/news/{{$news_id}}/comment/{{$comments_id}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="modal-body">
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputPassword1">Your Comment</label>
                    <textarea class="form-control" name="comment" placeholder="Your Comment*" rows="6"></textarea>
                </div>
            </div> 
        </div>
        <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal"  id="fermer">Close</button>
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </form>