<div class="col-lg-4">

            <div class="sidebar">

              <h3 class="sidebar-title">Search</h3>
              <div class="sidebar-item search-form">
                <form action="">
                  <input type="text">
                  <button type="submit"><i class="bi bi-search"></i></button>
                </form>
              </div><!-- End sidebar search formn-->

              <h3 class="sidebar-title">Categories</h3>
              <div class="sidebar-item categories">
                <ul>
                    <?php $allcate=App\Models\Category::all(); ?>
                    @foreach($allcate as $row)
                    <?php $postcount = App\Models\CategoryPost::where('category_id', $row->id)->count(); ?>
                      <li><a href="{{route('category.list', $row->cate_slug)}}">{{ $row->cate_name }} <span>({{$postcount}})</span></a></li>
                    @endforeach     
                  
                  <!-- <li><a href="#">Lifestyle <span>(12)</span></a></li>
                  <li><a href="#">Travel <span>(5)</span></a></li>
                  <li><a href="#">Design <span>(22)</span></a></li>
                  <li><a href="#">Creative <span>(8)</span></a></li>
                  <li><a href="#">Educaion <span>(14)</span></a></li> -->
                </ul>
              </div><!-- End sidebar categories-->

              <h3 class="sidebar-title">Recent Posts</h3>
              <div class="sidebar-item recent-posts">
                
                  @foreach($recentpost as $recent)
                  <div class="post-item clearfix">
                    <img src="{{asset('storage/postImg')}}/{{$recent->feature_image}}" alt="{{$recent->title}}">
                    <h4><a href="{{route('blog.details', $recent->slug)}}">{{$recent->title}}</a></h4>
                    <time datetime="2020-01-01">{{$recent->updated_at}}</time>
                  </div>
                  @endforeach                

              </div><!-- End sidebar recent posts-->

              <h3 class="sidebar-title">Tags</h3>
              <div class="sidebar-item tags">
                <ul>
                    <?php $alltags=App\Models\Tag::all(); ?>
                    @foreach ($alltags as $row)
                      <li><a href="{{route('tag.list', $row->tag_slug)}}">{{ $row->tag_name }}</a></li>
                    @endforeach                 

                  <!-- <li><a href="#">IT</a></li>
                  <li><a href="#">Business</a></li>
                  <li><a href="#">Mac</a></li>
                  <li><a href="#">Design</a></li>
                  <li><a href="#">Office</a></li>
                  <li><a href="#">Creative</a></li>
                  <li><a href="#">Studio</a></li>
                  <li><a href="#">Smart</a></li>
                  <li><a href="#">Tips</a></li>
                  <li><a href="#">Marketing</a></li> -->
                </ul>
              </div><!-- End sidebar tags-->

            </div><!-- End sidebar -->

          </div><!-- End blog sidebar -->