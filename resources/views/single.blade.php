@include('sections/header')

<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>{{$news->title}}</h2>
          <ol>
            <li><a href="/">Accueil</a></li>
            <li><a href="/news">News</a></li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Blog Single Section ======= -->
    <section id="blog" class="blog">
      <div class="container" data-aos="fade-up">

        <div class="row">

          <div class="col-lg-8 entries">

            <article class="entry entry-single">

              <div class="entry-img text-center" style="max-height:800px">
                <img src="/{{$news->image=='' ? 'default.png':'image/news/'.$news->image}}" alt="" class="img-fluid">
              </div>

              <h2 class="entry-title">
                <a href="/detail/{{$news->id}}">{{$news->title}}</a>
              </h2>
              <div class="entry-content">
                  <p>{!!$news->content!!}</p>

              </div>

            </article><!-- End blog entry -->

<style>
  .comment-img{
    height: 43px;
    border-radius: 50%;
    border: solid 1px;
    overflow: hidden;
  }
  .comment-img img{
    width: 40px!important;
  }
</style>
            <div class="blog-comments">

              <h4 class="comments-count">{{count($news->comments)}} Comments</h4>
              @foreach($news->comments as $comment)
              @if($comment->comments_id==NULL)
              <div class="comment">
                <div class="d-flex">
                  <div class="comment-img"><img src="{{asset('profile.jpg')}}" alt=""></div>
                  <div>
                    <h5><a>{{$comment->compte->nom}} {{$comment->compte->prenom}}</a> 
                      <a style="cursor:pointer" class="reply opencomment" data-lien="/news/{{$news->id}}/comment/{{$comment->id}}"><i class="bi bi-reply-fill"></i> Reply</a></h5>
                    <time datetime="2020-01-01">{{$comment->created_at}}</time>
                    <p>{{$comment->content}}</p>
                  </div>
                </div>
                @foreach($comment->comments as $com)
                <div class="comment comment-reply">
                  <div class="d-flex">
                    <div class="comment-img"><img src="{{asset('profile.jpg')}}" alt=""></div>
                    <div>
                      <h5><a>{{$com->compte->nom}} {{$com->compte->prenom}}</a> 
                        <a style="cursor:pointer" class="reply opencomment" data-lien="/news/{{$news->id}}/comment/{{$com->id}}"><i class="bi bi-reply-fill"></i> Reply</a></h5>
                      <time datetime="2020-01-01">{{$com->created_at}}</time>
                      <p>{{$com->content}}</p>
                    </div>
                  </div>
                  @foreach($com->comments as $c)
                  <div class="comment comment-reply">
                    <div class="d-flex">
                      <div class="comment-img"><img src="{{asset('profile.jpg')}}" alt=""></div>
                      <div>
                        <h5><a>{{$c->compte->nom}} {{$c->compte->prenom}}</a></h5>
                        <time datetime="2020-01-01">{{$c->created_at}}</time>
                        <p>{{$c->content}}</p>
                      </div>
                    </div>
                  </div>
                @endforeach
                </div>
                @endforeach
              </div>
              @endif
              @endforeach

              <div class="reply-form">
                <h4>Leave a comment</h4>
                <form action="/news/{{$news->id}}/comment" method="POST">
                  @csrf
                  <div class="row">
                    <div class="col form-group">
                      <textarea name="comment" class="form-control" placeholder="Your Comment*" required></textarea>
                    </div>
                  </div>
                  <button type="submit" class="btn btn-primary">Post Comment</button>
                </form>

              </div>

            </div><!-- End blog comments -->

          </div><!-- End blog entries list -->

          <div class="col-lg-4">

            <div class="sidebar">

              {{-- <h3 class="sidebar-title">Search</h3>
              <div class="sidebar-item search-form">
                <form action="https://bootstrapmade.com/demo/templates/Sailor/blog-single.html">
                  <input type="text">
                  <button type="submit"><i class="bi bi-search"></i></button>
                </form>
              </div> --}}
              <h3 class="sidebar-title">Recent Posts</h3>
              <div class="sidebar-item recent-posts">
                  @foreach($news_list as $n)
                  @if($loop->index < 5)
                  <div class="post-item clearfix">
                    <img src="{{$n->image=='' ? '/default.png':'/image/news/'.$n->image}}" alt="">
                    <h4><a href="/detail/{{$n->id}}">{{$n->title}}</a></h4>
                    <time datetime="2020-01-01">{{$n->created_at}}</time>
                  </div>
                  @endif
                  @endforeach
  
              </div><!-- End sidebar recent posts-->

            </div><!-- End sidebar -->

          </div><!-- End blog sidebar -->

        </div>

      </div>
    </section><!-- End Blog Single Section -->

</main>

<!-- ======= Footer ======= -->
@include('sections/footer')
<!-- End Footer -->

 @include('sections/js')
