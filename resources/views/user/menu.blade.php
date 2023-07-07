<div class="navbar-container">
  <div class="container">
    <nav class="navbar halim-navbar main-navigation" role="navigation" data-dropdown-hover="1">
      <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed pull-left" data-toggle="collapse" data-target="#halim" aria-expanded="false">
        <span class="sr-only">Menu</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <button type="button" class="navbar-toggle collapsed pull-right" data-toggle="collapse" data-target="#user-info" aria-expanded="false">
        <span class="hl-dot-3 rotate" aria-hidden="true"></span>
      </button>
      <button type="button" class="navbar-toggle collapsed pull-right expand-search-form" data-toggle="collapse" data-target="#search-form" aria-expanded="false">
        <span class="hl-search" aria-hidden="true"></span>
      </button>
      <!-- <button type="button" class="navbar-toggle collapsed pull-right get-bookmark-on-mobile">
        <i class="hl-bookmark" aria-hidden="true"></i>
        <span class="count">0</span>
      </button> -->
        </div>
        <div class="collapse navbar-collapse" id="halim">
        <div class="menu-main-container">
            <ul id="menu-main" class="nav navbar-nav navbar-left">
            <li>
                <a title="Home" href="{{route('home.index')}}">Trang chủ</a>
            </li>
            <li class=" dropdown">
                <a title="Anime" href="#" data-toggle="dropdown" class="dropdown-toggle" aria-haspopup="true">Thể loại <span class="caret"></span></a>
                <ul role="menu" class=" dropdown-menu">
                @if($showcategory)
                    @foreach($showcategory as $showcate)
                        <li>
                            <a href="{{url('the-loai/'.$showcate->slug)}}" title="{{$showcate->name}}">{{$showcate->name}}</a>
                        </li>
                    @endforeach
                @endif
                </ul>
            </li>
            <li class=" dropdown">
                <a title="Trạng Thái" href="#" data-toggle="dropdown" class="dropdown-toggle" aria-haspopup="true">Trạng Thái <span class="caret"></span></a>
                <ul role="menu" class="dropdown-menu" style="columns: 2 !important;">
                @if($showstatus)
                    @foreach($showstatus as $showst)
                        <li>
                            <a href="{{route('trangthai', $showst->slug)}}" title="{{$showst->name}}">{{$showst->name}}</a>
                        </li>
                    @endforeach
                @endif
                </ul>
            </li>
            @if($showkieuphim)
                @foreach($showkieuphim as $showkp)
                <li>
                    <a href="{{route('kieuphim', $showkp->slug_type)}}" title="{{$showkp->name}}">{{$showkp->name}}</a>
                </li>
                @endforeach
            @endif
            <li>
                <a href="{{url('/anime-hot')}}" title="Anime Hot">Anime Hot</a>
            </li>
            <li>
                <a href="{{url('/anime-xem-nhieu')}}" title="Xem nhiều">Xem nhiều</a>
            </li>
            <li>
                <a href="{{url('/tim-anime')}}" title="Tìm anime">Tìm Kiếm Anime</a>
            </li>
            </ul>
        </div>
        </div>
    </nav>
    <div class="collapse navbar-collapse" id="search-form">
        <div id="mobile-search-form" class="halim-search-form">
            <ul class="ui-autocomplete ajax-results" id="result" style="display: none;"></ul>
        </div>
    </div>
    <div class="collapse navbar-collapse" id="user-info">
        @if(Route::has('login'))
        @auth
        @if(Auth::user()->role == 1)
        <div id="mobile-user-login">
            <center><i class="hl-user"></i> Chức năng <i class="hl-user"></i></center>
        <ul class="halim-bookmark-lists">
            <li class="bookmark-list"><a href="{{route('admin.dashboard')}}" style="color:#db7b17">Truy cập quản trị</a></li>
            <li class="bookmark-list"><a href="{{route('thongtincanhan')}}" style="color:#db7b17">Thông tin cá nhân</a></li>
            <li class="bookmark-list"><a href="{{route('animedaluu')}}" style="color:#db7b17">Anime đã lưu</a></li>
            <li class="bookmark-list"><a href="" style="color:#db7b17">Lịch sử đã xem</a></li>
            <li class="bookmark-list"><a href="{{ route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Đăng xuất</a></li>
            <form action="{{ route('logout')}}" method="post" id="logout-form" style="display:none">
                @csrf
            </form>
        </ul>
        </div>
        @else
        <div id="mobile-user-login">
            <center><i class="hl-user"></i> Chức năng <i class="hl-user"></i></center>
        <ul class="halim-bookmark-lists">
            <li class="bookmark-list"><a href="{{route('thongtincanhan')}}" style="color:#db7b17">Thông tin cá nhân</a></li>
            <li class="bookmark-list"><a href="{{route('animedaluu')}}" style="color:#db7b17">Anime đã lưu</a></li>
            <li class="bookmark-list"><a href="" style="color:#db7b17">Lịch sử đã xem</a></li>
            <li class="bookmark-list"><a href="{{ route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Đăng xuất</a></li>
            <form action="{{ route('logout')}}" method="post" id="logout-form" style="display:none">
                @csrf
            </form>
        </ul>
        </div>
        @endif
        @else
        <ul class="halim-bookmark-lists">
            <li class="bookmark-list"><a href="{{route('login')}}" style="color:#fff">Đăng Nhập</a></li>
            <li class="bookmark-list"><a href="{{route('register')}}" style="color:#fff">Đăng ký</a></li>
        </ul>
        @endif
        @endif
    </div>
</div>
