
<div class="modal-content">
    <div class="modal-header">
        <h4 class="modal-title">Comments on : {{$new->title}}</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span></button>
    </div>
    <div class="modal-body" style="max-height: 550px;overflow: auto;">
        <div class="card-body">
                @foreach($new->comments as $comment)
                @if($comment->comments_id==NULL)
                <style>
                    .card-box {
                        padding: 20px;
                        border: 1px solid #e2e2e2;
                        border-radius: 3px;
                        margin-bottom: 20px;
                        background-color: #f7f7f7;
                    }
                </style>
                <div class="col-md-12">
                    <div class="media" style="margin-top: 25px;">
                        <div class="media-body">
                            <div class="card-box" style="padding-bottom:0px;padding-top:0px;margin-bottom:0px;text-align: right;">
                                <div class="summernote">
                                    <h5 style="padding-top:2px;"><b>{{$comment->compte->nom}} {{$comment->compte->prenom}}</b>
                                        <small  style="text-align: left;float:left;"> {{$comment->created_at}}</small> 
                                    </h5> 
                                    <dl>
                                        <dd>
                                            <p>{{$comment->content}}</p>
                                        </dd>
                                    </dl>
                                </div>
                            </div>
                        </div>
                    </div>
                    @foreach($comment->comments as $com)
                    <div class="mr-5">
                        <div class="media" style="margin-top: 25px;">
                            <div class="media-body">
                                <div class="card-box" style="padding-bottom:0px;padding-top:0px;margin-bottom:0px;text-align: right;">
                                    <div class="summernote">
                                        <h5 style="padding-top:2px;"><b>{{$com->compte->nom}} {{$com->compte->prenom}}</b>
                                            <small  style="text-align: left;float:left;"> {{$com->created_at}}</small> 
                                        </h5> 
                                        <dl>
                                            <dd>
                                                <p>{{$com->content}}</p>
                                            </dd>
                                        </dl>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @foreach($com->comments as $c)
                            <div class="mr-5">
                                <div class="media" style="margin-top: 25px;">
                                    <div class="media-body">
                                        <div class="card-box" style="padding-bottom:0px;padding-top:0px;margin-bottom:0px;text-align: right;">
                                            <div class="summernote">
                                                <h5 style="padding-top:2px;"><b>{{$c->compte->nom}} {{$c->compte->prenom}}</b>
                                                    <small  style="text-align: left;float:left;"> {{$c->created_at}}</small> 
                                                </h5> 
                                                <dl>
                                                    <dd>
                                                        <p>{{$c->content}}</p>
                                                    </dd>
                                                </dl>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                        @endforeach
                    </div> 
                  @endforeach
                </div> 
                @endif
                @endforeach
        </div> 
    </div>
    <p id="infoslogin" style="text-align: center;color: red"></p>
    <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal"  id="fermer">Close</button>
    </div>
</div>