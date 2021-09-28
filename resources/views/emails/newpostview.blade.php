<div>
    <!-- ======= Blog Single Section ======= -->
    <section id="blog" class="blog">
      <div class="container" data-aos="fade-up">

        <div class="row">

          <div class="col-lg-8 entries border-container">

            <article class="entry entry-single">

              <div class="entry-img">
                <img src="{{asset('storage/postImg')}}/{{$post->feature_image}}" alt="" class="img-fluid">
              </div>

              <h2 class="entry-title">
                <div>{{$post->title}}</div>
              </h2>

              <div class="entry-meta">
                <ul>
                  <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a href="#">Admin</a></li>
                  <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="#"><time datetime="2020-01-01">{{$post->updated_at}}</time></a></li>
                  <!-- <li class="d-flex align-items-center"><i class="bi bi-chat-dots"></i> <a href="blog-single.html">12 Comments</a></li> -->
                </ul>
              </div>

              <div class="entry-content">
                {!! $post->content !!}

              </div>

            </article><!-- End blog entry -->


          </div><!-- End blog entries list -->

        </div>

      </div>
    </section><!-- End Blog Single Section -->
</div>
