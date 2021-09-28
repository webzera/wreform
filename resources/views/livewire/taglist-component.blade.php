<div>
        <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Tag '{{$tagname}}' list</h2>
          <ol>
            <li><a href="{{route('home')}}">Home</a></li>
            <li>{{$tagname}} list</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->
        <!-- ======= Blog Section ======= -->
    <section id="blog" class="blog">
      <div class="container" data-aos="fade-up">

        <div class="row">

          <div class="col-lg-8 entries">

            @if ($data->count())
            @foreach ($data as $item)
            <article class="entry">

              <div class="entry-img">
                <img src="{{asset('storage/postImg')}}/{{$item->feature_image}}" alt="" class="img-fluid">
              </div>

              <h2 class="entry-title">
                <a href="{{route('blog.details', $item->slug)}}">{{$item->title}}</a>
              </h2>

              <div class="entry-meta">
                <ul>
                  <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a href="blog-single.html">Admin</a></li>
                  <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="blog-single.html"><time datetime="{{$item->updated_at}}">{{$item->updated_at}}</time></a></li>
                  <!-- <li class="d-flex align-items-center"><i class="bi bi-chat-dots"></i> <a href="blog-single.html">12 Comments</a></li> -->
                </ul>
              </div>

              <div class="entry-content">
                <p>{!! $item->excerpt !!}</p>
                <div class="read-more">
                  <a href="{{route('blog.details', $item->slug)}}">Read More</a>
                </div>
              </div>

            </article><!-- End blog entry -->
            @endforeach
          @else
            <div class="px-6 py-4 text-sm whitespace-no-wrap" colspan="6">No Blog articles Found</div>
          @endif

            

            <div class="blog-pagination">
              <ul class="justify-content-center">
                {{$data->links()}}
                <!-- <li><a href="#">1</a></li>
                <li class="active"><a href="#">2</a></li>
                <li><a href="#">3</a></li> -->
              </ul>
            </div>

          </div><!-- End blog entries list -->

          @include('layouts.blogsidebar')

        </div>

      </div>
    </section><!-- End Blog Section -->
</div>
