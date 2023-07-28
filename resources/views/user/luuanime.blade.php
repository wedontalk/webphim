<!DOCTYPE html><html lang="en-US"><!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
  <meta charset="utf-8" />
  <meta content="width=device-width,initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
  <meta name="theme-color" content="#234556">
  <meta name="msapplication-navbutton-color" content="#234556">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  @yield('title')
  <link rel='stylesheet' id='bootstrap-css'  href="{{asset('wp-content/themes/halimmovies/assets/css/bootstrap.min5152.css?ver=1.0')}}" media='all' />
  <link rel='stylesheet' id='style-css'  href="{{asset('wp-content/themes/halimmovies/style5152.css?ver=1.0')}}" media='all' /> 
  <script type='text/javascript' src="{{asset('wp-content/themes/halimmovies/assets/js/jquery.min2050.js?ver=5.2.15')}}"></script>
  <div id="fb-root"></div>
  <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v14.0&appId=3308862736097075&autoLogAppEvents=1" nonce="TCYniELl"></script>
  <!-- <div id="fb-root"></div>
  <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v14.0&appId=3308862736097075&autoLogAppEvents=1" nonce="FQqG2kta"></script> -->
  @yield('css')
  <style>/*Style 3*/
    .halim-post-title {
        background: rgba(21, 21, 21, 0.63)!important;
    }
    .halim-post-title h2 {
        color: #ffa533!important;
    }
  </style> 
  <style>
    #header .site-title {
      background: url('<?php foreach($showcauhinh as $key => $avatar) {
        echo'../../uploads/logo/'.$avatar->logo_header;
      } ?>') no-repeat top left;
      background-size: contain;text-indent: -9999px;
      height:60px;
    }
  </style>
  <style>
    #thongtin{
        background-color: #f0f8ff;
    }
    #thongtin p{
        font-weight: bold;
        color: #000;
    }
    .box-tutien{
        border: 1px solid #fff;
        border-radius: 5px;
        width: 100%;
        /* padding: 15px 20px; */
    }
    .box-tutien .progress{

    }
    .box-tutien .level{
        font-size: 14px;
        color: #db7b17;
    }
    .box-tutien .level-next{
        float: right;
    }
    .group-info{
        width: 100%;
        float: left;
        margin: 5px 0px;
    }
    .group-info .label{
        width: 30%;
        float: left;
    }
    .group-info .detail{
        width: 70%;
        float: left;
    }
    /* .box-thongbao{
        background:rgb(194, 193, 193);
        border: 1px solid;
        border-radius: 5px;
        color: #000 !important;
        padding: 10px 10px;
    } */
    .list-group{
        list-style: none;
        width: 100%;
        background:#f0f8ff;
        padding: 15px 20px;
    }
    .list-group li{
        padding: 5px 0px;
        border-bottom:1px dashed;
    }
    .list-group li a{
        color: #000;
        font-size: 15px;
    }
    .list-group li:hover a{
        color: #b7b7b7;
        transition: 0.2s;
    }
    .active{
        font-weight: bold;
        color: #196191 !important;
    }
    .box-anime{
        box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;
        padding: 10px 20px;
    }
    .box-anime>div>div>div{
        padding: 5px 10px;
        height:370px;
    }
    .pagination-box .active{
      background: #bf7d18;
      background: -webkit-gradient(linear,0% 0%,0% 100%,from(#cd881e),to(#674614));
      transition: .5s all;
      color: #fff;
    }
    .pagination-box .active a{
      background: #bf7d18 !important; 
    }
    .card-img-top{
      height:220px !important;
    }
  </style>
</head>
<body data-rsssl=1 class="home blog halimthemes halimmovies halim-corner-rounded" data-masonry="">
<header id="header"><div class="container">
    <div class="row" id="headwrap">
      <div class="col-md-3 col-sm-6 slogan">
        <h1 class="site-title"><a class="logo" href="{{route('home.index')}}" rel="home">animetvh.net</a></h1>
      </div>
      <!-- tìm kiếm -->
      <div class="col-md-5 col-sm-6 halim-search-form hidden-xs">
        <div class="header-nav">
          <div class="col-xs-12">
            <form id="search-form-pc" name="halimForm" role="search" action="{{route('search')}}" method="GET">
              <div class="form-group">
                <div class="input-group col-xs-12">
                  <input id="search" type="text" name="search" class="form-control" placeholder="Search..." autocomplete="off" required>
                  <i class="animate-spin hl-spin4 hidden"></i>
                </div>
              </div>
            </form>
            <ul class="ui-autocomplete ajax-results hidden" id="result" >
            </ul>
          </div>
        </div>
      </div>
      <!-- login -->
      @if(Route::has('login'))
      @auth
      @if(Auth::user()->role == 1)
        <div class="col-md-4 hidden-xs">
          <a href="#">
            <div id="get-bookmark" class="box-shadow" style="margin-top:4px">
              <i class="hl-user"></i>
              <span>{{Auth::user()->name}}</span>
              <!-- <span class="count">0</span> -->
            </div>
          </a>
          <div id="bookmark-list" class="hidden bookmark-list-on-pc">
          <div class="halim-bookmark-box">
              <div class="section-bar clearfix">
                  <h3 class="section-title"><span>Chức năng</span></h3>
              </div>
              <ul class="halim-bookmark-lists">
                <li class="bookmark-list"><a href="{{route('admin.dashboard')}}" style="color:#db7b17">truy cập quản trị</a></li>
                <li class="bookmark-list"><a href="{{route('thongtincanhan')}}" style="color:#db7b17">Thông tin cá nhân</a></li>
                <li class="bookmark-list"><a href="{{route('animedaluu')}}" style="color:#db7b17">Anime đã lưu</a></li>
                <li class="bookmark-list"><a href="{{ route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Đăng xuất</a></li>
                <form action="{{ route('logout')}}" method="post" id="logout-form" style="display:none">
                    @csrf
                </form>
              </ul>
            </div>
        </div>
      @else
        <div class="col-md-4 hidden-xs">
          <a href="#">
            <div id="get-bookmark" class="box-shadow" style="margin-top:4px">
              <i class="hl-user"></i>
              <span>{{Auth::user()->name}}</span>
              <!-- <span class="count">0</span> -->
            </div>
          </a>
          <div id="bookmark-list" class="hidden bookmark-list-on-pc">
            <div class="halim-bookmark-box">
              <div class="section-bar clearfix">
                  <h3 class="section-title"><span>Chức năng</span></h3>
              </div>
              <ul class="halim-bookmark-lists">
                <li class="bookmark-list"><a href="{{route('thongtincanhan')}}" style="color:#db7b17">Thông tin cá nhân</a></li>
                <li class="bookmark-list"><a href="{{route('animedaluu')}}" style="color:#db7b17">Anime đã lưu</a></li>
                <li class="bookmark-list"><a href="{{ route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Đăng xuất</a></li>
                <form action="{{ route('logout')}}" method="post" id="logout-form" style="display:none">
                    @csrf
                </form>
              </ul>
            </div>
          </div>
        </div>
      @endif
      @else
      <div class="col-md-4 hidden-xs">
          <a href="{{route('login')}}">
            <div id="get-bookmark" class="box-shadow" style="margin-top:4px">
              <i class="hl-user"></i>
              <span>Đăng Nhập</span>
              <!-- <span class="count">0</span> -->
            </div>
          </a>
          <div id="bookmark-list" class="hidden bookmark-list-on-pc">
          <!-- <div class="halim-bookmark-box"><div class="section-bar clearfix">
                <h3 class="section-title"><span>Phim đã xem</span></h3>
             </div><ul class="halim-bookmark-lists"><li class="bookmark-list">chưa có phim</li></ul></div>
          </div> -->
        </div>
      @endif
      @endif
    </div>
</header>
@include('user.menu')
</div>
<br>
<div class="container">
  <div class="row">
    <div class="col-12" style="text-align: center"></div>
    <div class="container">
        <div class="row container">
            <div class="row col-lg-4 col-12 border-right">
                <div class="col-md-12">
                    <div id="thongtin" class="d-flex flex-column align-items-center text-center p-3 py-5">
                        @if(Auth::user()->profile_photo_path)
                        <img class="rounded-circle mt-5" width="150px" src="{{asset(uploads/profile)}}/{{Auth::user()->profile_photo_path}}">
                        @else
                        <img class="rounded-circle mt-5" width="150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg">
                        @endif
                        <p class="text-black-50">{{Auth::user()->email}}</p>
                    </div>
                </div>
                <div class="col-md-12">
                    <ul class="list-group">
                        <li class="list-group-item"><a href="" class="active">Thông Tin chung</a></li>
                        <li class="list-group-item"><a href="{{route('animedaluu')}}">Anime đã lưu</a></li>
                        <li class="list-group-item"><a href="">Đổi mật khẩu</a></li>
                        <li class="list-group-item"><a href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Đăng xuất</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-8 col-12">
                <div class="col-md-12 mt-3">
                <h4><center>- Anime đã lưu -</center></h4>
                </div>
                <div class="col-md-12 col-12 mt-3 box-anime">
                    <div class="col-12 row" id="show-luu">
                    </div>
                    <div class="paginatoin-area text-center">
                        <ul class="pagination-box page-numbers">

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

  <div class="clearfix"></div>
<footer id="footer" class="clearfix">
    <div class="container footer-columns">
    <div class="row container">
    <div class="widget about col-xs-12 col-sm-4 col-md-4">
        <div class="footer-logo">
        <img class="img-responsive" src="<?php foreach($showcauhinh as $key => $avatar) {echo'../../uploads/logo/'.$avatar->logo_header;} ?>" alt="AnimeHot.XYZ" width="420px" height="200px"/>
        <span class="social"></span>
        </div>
        <p class="halim-about">
        <p style="text-align: left;"><?php foreach($showcauhinh as $key => $avatar) {
            echo $avatar->thongtin;
        } ?></p>
        <!-- <p style="text-align: left;">Liên hệ: animehot.xyz@gmail.com</p> -->
        </p>
    </div>
    <div class="col-xs-12 col-sm-8 col-md-8">
    <div class="fb-page" data-href="https://www.facebook.com/animetvh.net/" data-tabs="timeline" data-width="500" data-height="320" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/animetvh.net/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/animetvh.net/">animetvh.net</a></blockquote></div>        </div>
    </div>
</footer>
    <div class="footer-credit">
      <div class="container credit">
        <div class="row container">
          <div class="col-xs-12 col-sm-4 col-md-6">Copyright  ©  
            <a id="halimthemes" href="route('home.index')" title="mangatv">kenhanime.pro</a>
          </div>
          <div class="col-xs-12 col-sm-4 col-md-6 text-right pull-right">
            <p class="blog-info">kenhanime.pro</p>
          </div>
        </div>
      </div>
    </div>
    <div id='easy-top'></div> 
    <script type='text/javascript' src="{{asset('wp-content/themes/halimmovies/assets/js/bootstrap.min2050.js?ver=5.2.15')}}"></script> 
    <script type='text/javascript' src="{{asset('wp-content/themes/halimmovies/assets/js/owl.carousel.min2050.js?ver=5.2.15')}}"></script> 
    <!-- <script type='text/javascript'>/*  */
      var halim = {"light_mode":"0","ajax_url":"https:\/\/animehot.xyz\/wp-admin\/admin-ajax.php","post_id":"6352","sync":"1"};
    </script>  -->
    <script type='text/javascript' src="{{asset('wp-content/themes/halimmovies/assets/js/halimmovie.core.min5152.js?ver=1.0')}}"></script>
    @yield('js')
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v14.0&appId=3308862736097075&autoLogAppEvents=1" nonce="TCYniELl"></script>
      <!-- cdnjs -->
      <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery.lazy/1.7.9/jquery.lazy.min.js"></script>
      <!-- lazyload -->
      <script>
          $(function() {
              $('.lazy').lazy();
          });
      </script>
      <script>
        function delay(callback, ms) {
          var timer = 0;
          return function() {
              var context = this, args = arguments;
              clearTimeout(timer);
              timer = setTimeout(function () {
              callback.apply(context, args);
              }, ms || 0);
          };
        }

        $(document).ready(function(){
          $('#search').keyup(delay(function (e){
            $('.ajax-results').html('');
            var search = $('#search').val();
            // alert(search);

            if(search != ''){
              var expression = new RegExp(search, "i");
              $.getJSON('/json_file/movies.json', function(data){
                $.each(data, function(key, value){
                  if(value.name.search(expression) != -1 || value.name2.search(expression) != -1){
                    $('.ajax-results').removeClass('hidden')
                    $('.ajax-results').append('<li class="exact_result"><a href="/chi-tiet-anime/'+value.slug+'"><div class="halim_list_item"><div class="image"><img src="/uploads/'+value.image+'" alt="'+value.name+'"></div><span class="label">'+value.name+'</span><span class="enName">'+value.name2.substring(0, 65)+'...</span></div></a></li>')
                  }
                })
              })
            }else{
              $('.ajax-results').addClass('hidden')
            }
            
          },1000))
        });
      </script>
      <!-- get ajax -->
      <!-- <script>
        $(document).ready(function(){
        const loadBlog = (page) => {
          var retrievedObject = localStorage.getItem('bookmark-list');
          review = JSON.parse(retrievedObject);
            $.ajax({
                url: `{{route('ajaxanime')}}?page=${page}`,
                type: "get",
                success: function(response) {
                    
            });
        }
        loadBlog(1);
        });
      </script> -->
      <!-- post ajax -->
      <script>
        $(document).ready(function(){
          const loadBlog = (page) => {
          var retrievedObject = localStorage.getItem('bookmark-list');
          // review = JSON.parse(retrievedObject);
            $.ajax({
              headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
                method:"GET",
                url: `{{route('ajaxanime')}}?page=${page}`,
                dataType: "json",
                data:{retrievedObject:retrievedObject,
                  '_token' : '{{ csrf_token() }}'
                },
                success:function(response){
                    let pagination = '';
                    let content = '';
                    const {
                        data,
                        links,
                        next_page_url,
                        prev_page_url
                    } = response;
                    data.data.map((item, index) => {
                        content += `<div class="col-md-4 col-sm-6">
                      <div class="card col-sm-12">
                        <img class="card-img-top" src="/uploads/${item.image}" alt="Card image cap" width="100%" height="100px">
                        <div class="card-body">
                          <h5 class="card-title" style="height:30px" title="${item.name}">${item.name.substring(0,40)}...</h5>
                          <a href="/chi-tiet-anime/${item.slug}" class="btn btn-primary">Xem ngay</a>
                          <button id="deletebtn" onclick="removeItem(${item.id})" class="btn btn-danger">Xóa</button>
                        </div>
                      </div>
                    </div>`;
                  })
                    $('#show-luu').html(content);
                  data.links.map((item, index) => {
                      if (item.label == '&laquo; Previous') {
                          pagination +=`<li data-page="${item.url != null ? item.url.slice(-1): ""}"><a class="Previous"><i class="hl-down-open rotate-left"></i></a></li>`
                      } else if (item.label == 'Next &raquo;') {
                          pagination +=`<li data-page="${item.url != null ? item.url.slice(-1): ""}"><a class="Next"><i class="hl-down-open rotate-right"></i></a></li>`
                      } else {
                          pagination +=`<li data-page=${item.url.slice(-1)} class="${item.active ? 'active' : ''}"><a>${item.label}</a></li>`
                      }
                  })
                    $('.pagination-box').html(pagination);
                    $('.pagination-box li').click(function(e) {
                        e.preventDefault();
                        loadBlog($(this).data("page"))
                    });
                },
                error: function(error) {
                    console.log(error);
                }
                
           });
          }
          loadBlog();
          });
          
      </script>
      <!-- delete luu anime -->
      <script>
        function removeItem(id){
          let devicesArray = JSON.parse(localStorage.getItem("bookmark-list"))
          devicesArray.splice(devicesArray.indexOf(id), 1)
          localStorage.setItem("bookmark-list", JSON.stringify(devicesArray));
          location.reload(true);
        }
      </script>
</body>
</html>