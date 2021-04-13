@include('sections/header')

<main id="main">
  
    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">
  
          <div class="d-flex justify-content-between align-items-center">
            <h2>NEWS</h2>
            <ol>
              <li><a href="/">Home</a></li>
              <li>News</li>
            </ol>
          </div>
  
        </div>
      </section><!-- End Breadcrumbs -->
  
      <!-- ======= Blog Section ======= -->
      <section id="blog" class="blog">
        <div class="container" data-aos="fade-up">
  
          @if($news->count()!=0)
          <div class="row">
            <div class="col-lg-8 entries">
              <style>
                .text{
                    text-overflow: ellipsis;
                    overflow: hidden;
                    display: -webkit-box;
                    -webkit-line-clamp: 4;
                    -webkit-box-orient: vertical;
                    text-align: justify;
                }
                svg {
                  overflow: hidden;
                  vertical-align: middle;
                  height: 20px;
                }
                nav div:first-child{
                  display: none;
                }
                nav div{
                  text-align: center!important;
                }
                /* nav div div span span .cursor-default:first-of-type{
                  color: white;
                  background-color: #5846f9!important;
                } */
              </style>
              @foreach ($news as $new)
              <article class="entry">
  
                <div class="entry-img text-center">
                  <img src="{{$new->image=='' ? 'default.png':'image/news/'.$new->image}}" alt="" class="img-fluid">
                </div>
  
                <h2 class="entry-title">
                  <a href="detail/{{$new->id}}">{{$new->title}}</a>
                </h2>
                <div class="entry-meta">
                  <ul>
                    <li class="d-flex align-items-center"><i class="bi bi-clock"></i><time datetime="2020-01-01">{{$new->created_at}}</time></li>
                  </ul>
                </div>
                <div class="entry-content">
                  <p class="text">{{strip_tags($new->content)}}</p>
                  <div class="read-more">
                    <a href="detail/{{$new->id}}">Read More</a>
                  </div>
                </div>
  
              </article>
              @endforeach
              {{ $news->links() }}
            </div><!-- End blog entries list -->
  
            <div class="col-lg-4">
  
              <div class="sidebar">
                <h3 class="sidebar-title">Recent Posts</h3>
                <div class="sidebar-item recent-posts">
                  @foreach($news_list as $n)
                  <div class="post-item clearfix">
                    <img src="{{$n->image=='' ? 'default.png':'image/news/'.$n->image}}" alt="">
                    <h4><a href="detail/{{$n->id}}">{{$n->title}}</a></h4>
                    <time datetime="2020-01-01">{{$n->created_at}}</time>
                  </div>
                  @endforeach
  
                </div><!-- End sidebar recent posts-->
  
              </div><!-- End sidebar -->
  
            </div><!-- End blog sidebar -->
          </div>
          @else
          <div class="row">
            <div class="col-lg-12 entries col-md-12 mt-5 mb-5">
              <h4 class="text-center">No news found</h4>
            </div>
          </div>
          @endif
        </div>
      </section><!-- End Blog Section -->
</main>

<!-- ======= Footer ======= -->
@include('sections/footer')
<!-- End Footer -->

 @include('sections/js')