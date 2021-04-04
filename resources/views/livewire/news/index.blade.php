<div class="content">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header row">
                    <h3 class="card-title col-md-11">List of news</h3>
                    <div class="col-md-1">
                        <button type="button" data-lien="news/add" data-modal="modalAll1" class="btn btn-block btn-primary edit-row ">Add</button>
                    </div>
                </div>
                <div class="card-body">
                    <style>
                        .text{
                            text-overflow: ellipsis;
                            overflow: hidden;
                            display: -webkit-box;
                            -webkit-line-clamp: 3;
                            -webkit-box-orient: vertical;
                            width: 500px;
                            text-align: justify;
                        }
                        .title{
                            text-overflow: ellipsis;
                            overflow: hidden;
                            display: -webkit-box;
                            -webkit-line-clamp: 2;
                            -webkit-box-orient: vertical;
                            text-align: justify;
                        }
                    </style>
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Titre</th>
                                <th>Contenu</th>
                                <th>Commentaires</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($this->newsList as $new)
                            <tr>
                                <td><img height="50" src="{{$new->image=='' ? 'default.png':'image/news/'.$new->image}}" alt="News"></td>
                                <td><p class='title'>{{$new->title}}</p></td>
                                <td><p class='text'>{{strip_tags($new->content)}}</p></td>
                                <td><a class="on-default btn btn-primary edit-row" data-lien="news/{{$new->id}}/comments" data-modal="modalAll1"><i class="fa fa-eye"></i></a></td>
                                <td class="actions">
                                    <a class="on-default btn btn-primary edit-row mr-1 mb-1" data-modal="modalAll1" data-lien="news/detail/{{$new->id}}"><i class="fa fa-eye"></i></a>
                                    <a class="on-default btn btn-secondary edit-row mr-1 mb-1" data-modal="modalAll1" data-lien="news/edit/{{$new->id}}"><i class="fa fa-edit"></i></a>
                                    <a class="on-default btn btn-danger remove-row" data-lien="news/delete/{{$new->id}}"><i class="fa fa-trash "></i></a>
                                </td>
                            </tr> 
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>