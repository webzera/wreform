  <section id="hero">
    <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

      <div class="carousel-inner" role="listbox">

        <!-- Slide  -->
        @if ($slider->count())
          @foreach ($slider as $slide)
            <?php $simg = asset('storage/sliderImg')."/".$slide->slider_image; ?>
            <div class="<?php if($slide->id == 1) { ?>carousel-item active<?php }else{ ?>carousel-item<?php } ?>"
             style="background-image: url('{{$simg}}');">
              <div class="carousel-container">
                <div class="carousel-content animate__animated animate__fadeInUp">
                  <h2>{{$slide->caption}}</h2>
                  <p>{{$slide->sub_caption}}</p>
                  <!-- <div class="text-center"><a href="{{$slide->link_url}}" class="btn-get-started">Read More</a></div> -->
                </div>
              </div>
            </div>
          @endforeach
        @endif


      </div>

      <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
        <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
      </a>

      <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
        <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
      </a>

      <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

    </div>
  </section><!-- End Hero -->