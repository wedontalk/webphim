<aside id="sidebar" class="col-xs-12 col-sm-12 col-md-4">
  <div class="col-12" style="display:flex; justify-content:center">
    <a href="">
      <img src="{{asset('wp-content/uploads/banner_theloai.png')}}" alt="">
    </a>
  </div>
  <div id="nav_menu-2" class="widget widget_nav_menu">
    <h4 class="widget-title">Thể Loại</h4>
    <div class="menu-the-loai-container">
      <ul id="menu-the-loai" class="menu">
      @if($showcategory)
          @foreach($showcategory as $showcate)
        <li>
          <a href="{{url('the-loai/'.$showcate->slug)}}">{{$showcate->name}}</a>
        </li>
        @endforeach
      @endif
      </ul>
    </div>
  </div>
</aside>