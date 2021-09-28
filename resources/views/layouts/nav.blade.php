<nav id="navbar" class="navbar order-last order-lg-0">
  <ul>
    <li><a href="{{route('home')}}" class="active">Home</a></li>

    <?php $allmenu=App\Models\Menulist::where('menu_name', '!=', 'Home')->where('menu_type', '=', 'Top')->orderBy('menu_weight', 'asc')->get(); ?>
    @foreach($allmenu as $menu)
      @if($menu->menu_level==1)
      <?php $checkdropdown=App\Models\Menulist::isthisparentmenu($menu->page_id); ?>
        @if($checkdropdown)
        <?php $ifhaves=App\Models\Menulist::where('parent_id', $menu->page_id)->get(); ?>

          <li class="dropdown"><a href="#"><span>{{$menu->menu_name}} </span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              @foreach($ifhaves as $ifhave)
                <li><a href="{{ route('page', App\Models\Menulist::getpageslug($ifhave->page_id) ) }}">{{$ifhave->menu_name}}</a></li>
              @endforeach
              <!-- <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-right"></i></a>
                <ul>
                  <li><a href="#">Deep Drop Down 1</a></li>
                  <li><a href="#">Deep Drop Down 2</a></li>
                  <li><a href="#">Deep Drop Down 3</a></li>
                  <li><a href="#">Deep Drop Down 4</a></li>
                  <li><a href="#">Deep Drop Down 5</a></li>
                </ul>
              </li> -->
            </ul>
          </li>
        @else
          <li><a href="{{ route('page', App\Models\Menulist::getpageslug($menu->page_id) ) }}">{{$menu->menu_name}}</a></li>
        @endif
      @endif
    @endforeach

    <li><a href="{{route('blog')}}">Blog</a></li>
    <!-- <li><a href="{{route('home')}}">Contact</a></li> -->

  </ul>
  <i class="bi bi-list mobile-nav-toggle"></i>
</nav>