<div>
	@include('layouts.slider')
  	<main id="main">

    	<!-- ======= About Us Section ======= -->
	    <section style="background-color: cornsilk;" id="about-us" class="about-us">
	      <div style="background-color: cornsilk;" class="container py-1" data-aos="fade-up">

	        <div class="row content">
	        	<h3>World Reform Foundation</h3>
	          <!-- <div class="col-lg-6" data-aos="fade-right">
	            <h2>Eum ipsam laborum deleniti velitena</h2>
	          </div> -->
	          <div class="col-lg-12 pt-4 pt-lg-0" style="background-color: cornsilk;" data-aos="fade-left">
	            <div class="content-justify p-2" style="background-color: white;">
	            	<?php $trim=substr($data->page_content,0,8600) ?>
	            {!! $trim !!}	    
	            <div class="read-more"><a href="{{route('page', $data->slug)}}">Read More</a></div>        	
	            </div>
	          </div>
	        </div>

	      </div>
	    </section><!-- End About Us Section -->   
	    

	    <!-- ======= Portfolio Section =======
	    <section id="portfolio" class="portfolio">
	      <div class="container">

	        <div class="row" data-aos="fade-up">
	          <div class="col-lg-12 d-flex justify-content-center">
	            <ul id="portfolio-flters">
	              <li data-filter="*" class="filter-active">All</li>
	              <li data-filter=".filter-app">App</li>
	              <li data-filter=".filter-card">Card</li>
	              <li data-filter=".filter-web">Web</li>
	            </ul>
	          </div>
	        </div>

	        <div class="row portfolio-container" data-aos="fade-up">

	          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
	            <img src="{{ asset('assets/img/portfolio/portfolio-1.jpg') }}" class="img-fluid" alt="">
	            <div class="portfolio-info">
	              <h4>App 1</h4>
	              <p>App</p>
	              <a href="assets/img/portfolio/portfolio-1.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="App 1"><i class="bx bx-plus"></i></a>
	              <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
	            </div>
	          </div>

	          <div class="col-lg-4 col-md-6 portfolio-item filter-web">
	            <img src="{{ asset('assets/img/portfolio/portfolio-2.jpg') }}" class="img-fluid" alt="">
	            <div class="portfolio-info">
	              <h4>Web 3</h4>
	              <p>Web</p>
	              <a href="assets/img/portfolio/portfolio-2.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Web 3"><i class="bx bx-plus"></i></a>
	              <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
	            </div>
	          </div>

	          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
	            <img src="{{ asset('assets/img/portfolio/portfolio-3.jpg') }}" class="img-fluid" alt="">
	            <div class="portfolio-info">
	              <h4>App 2</h4>
	              <p>App</p>
	              <a href="assets/img/portfolio/portfolio-3.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="App 2"><i class="bx bx-plus"></i></a>
	              <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
	            </div>
	          </div>

	          <div class="col-lg-4 col-md-6 portfolio-item filter-card">
	            <img src="{{ asset('assets/img/portfolio/portfolio-4.jpg') }}" class="img-fluid" alt="">
	            <div class="portfolio-info">
	              <h4>Card 2</h4>
	              <p>Card</p>
	              <a href="assets/img/portfolio/portfolio-4.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Card 2"><i class="bx bx-plus"></i></a>
	              <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
	            </div>
	          </div>

	          <div class="col-lg-4 col-md-6 portfolio-item filter-web">
	            <img src="{{ asset('assets/img/portfolio/portfolio-5.jpg') }}" class="img-fluid" alt="">
	            <div class="portfolio-info">
	              <h4>Web 2</h4>
	              <p>Web</p>
	              <a href="assets/img/portfolio/portfolio-5.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Web 2"><i class="bx bx-plus"></i></a>
	              <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
	            </div>
	          </div>

	          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
	            <img src="{{ asset('assets/img/portfolio/portfolio-6.jpg') }}" class="img-fluid" alt="">
	            <div class="portfolio-info">
	              <h4>App 3</h4>
	              <p>App</p>
	              <a href="assets/img/portfolio/portfolio-6.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="App 3"><i class="bx bx-plus"></i></a>
	              <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
	            </div>
	          </div>

	          <div class="col-lg-4 col-md-6 portfolio-item filter-card">
	            <img src="{{ asset('assets/img/portfolio/portfolio-7.jpg') }}" class="img-fluid" alt="">
	            <div class="portfolio-info">
	              <h4>Card 1</h4>
	              <p>Card</p>
	              <a href="assets/img/portfolio/portfolio-7.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Card 1"><i class="bx bx-plus"></i></a>
	              <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
	            </div>
	          </div>

	          <div class="col-lg-4 col-md-6 portfolio-item filter-card">
	            <img src="{{ asset('assets/img/portfolio/portfolio-8.jpg') }}" class="img-fluid" alt="">
	            <div class="portfolio-info">
	              <h4>Card 3</h4>
	              <p>Card</p>
	              <a href="assets/img/portfolio/portfolio-8.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Card 3"><i class="bx bx-plus"></i></a>
	              <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
	            </div>
	          </div>

	          <div class="col-lg-4 col-md-6 portfolio-item filter-web">
	            <img src="{{ asset('assets/img/portfolio/portfolio-9.jpg') }}" class="img-fluid" alt="">
	            <div class="portfolio-info">
	              <h4>Web 3</h4>
	              <p>Web</p>
	              <a href="assets/img/portfolio/portfolio-9.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Web 3"><i class="bx bx-plus"></i></a>
	              <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
	            </div>
	          </div>

	        </div>

	      </div>
	    </section> --><!-- End Portfolio Section -->

	    <!-- ======= Our Clients Section ======= 
	    <section id="clients" class="clients">
	      <div class="container" data-aos="fade-up">

	        <div class="section-title">
	          <h2>Clients</h2>
	        </div>

	        <div class="row no-gutters clients-wrap clearfix" data-aos="fade-up">

	          <div class="col-lg-3 col-md-4 col-6">
	            <div class="client-logo">
	              <img src="{{ asset('assets/img/clients/client-1.png') }}" class="img-fluid" alt="">
	            </div>
	          </div>

	          <div class="col-lg-3 col-md-4 col-6">
	            <div class="client-logo">
	              <img src="{{ asset('assets/img/clients/client-2.png') }}" class="img-fluid" alt="">
	            </div>
	          </div>

	          <div class="col-lg-3 col-md-4 col-6">
	            <div class="client-logo">
	              <img src="{{ asset('assets/img/clients/client-3.png') }}" class="img-fluid" alt="">
	            </div>
	          </div>

	          <div class="col-lg-3 col-md-4 col-6">
	            <div class="client-logo">
	              <img src="{{ asset('assets/img/clients/client-4.png') }}" class="img-fluid" alt="">
	            </div>
	          </div>

	          <div class="col-lg-3 col-md-4 col-6">
	            <div class="client-logo">
	              <img src="{{ asset('assets/img/clients/client-5.png') }}" class="img-fluid" alt="">
	            </div>
	          </div>

	          <div class="col-lg-3 col-md-4 col-6">
	            <div class="client-logo">
	              <img src="{{ asset('assets/img/clients/client-6.png') }}" class="img-fluid" alt="">
	            </div>
	          </div>

	          <div class="col-lg-3 col-md-4 col-6">
	            <div class="client-logo">
	              <img src="{{ asset('assets/img/clients/client-7.png') }}" class="img-fluid" alt="">
	            </div>
	          </div>

	          <div class="col-lg-3 col-md-4 col-6">
	            <div class="client-logo">
	              <img src="{{ asset('assets/img/clients/client-8.png') }}" class="img-fluid" alt="">
	            </div>
	          </div>

	        </div>

	      </div>
	    </section> End Our Clients Section -->

  	</main><!-- End #main -->
</div>