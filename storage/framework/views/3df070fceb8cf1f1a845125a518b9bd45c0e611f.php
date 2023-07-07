<!DOCTYPE html><html lang="en-US"><!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
  <meta charset="utf-8" />
  <meta content="width=device-width,initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
  <meta name="theme-color" content="#234556">
  <meta name="msapplication-navbutton-color" content="#234556">
  <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
  <?php echo $__env->yieldContent('title'); ?>
  <link rel='stylesheet' id='bootstrap-css'  href="<?php echo e(asset('wp-content/themes/halimmovies/assets/css/bootstrap.min5152.css?ver=1.0')); ?>" media='all' />
  <link rel='stylesheet' id='style-css'  href="<?php echo e(asset('wp-content/themes/halimmovies/style5152.css?ver=1.0')); ?>" media='all' /> 
  <script type='text/javascript' src="<?php echo e(asset('wp-content/themes/halimmovies/assets/js/jquery.min2050.js?ver=5.2.15')); ?>"></script>
  <div id="fb-root"></div>
  <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v14.0&appId=3308862736097075&autoLogAppEvents=1" nonce="TCYniELl"></script>
  <!-- <div id="fb-root"></div>
  <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v14.0&appId=3308862736097075&autoLogAppEvents=1" nonce="FQqG2kta"></script> -->
  <?php echo $__env->yieldContent('css'); ?>
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
    .box-thongbao{
        background:rgb(194, 193, 193);
        border: 1px solid;
        border-radius: 5px;
        color: #000 !important;
        padding: 10px 10px;
    }
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
  </style>
</head>
<body data-rsssl=1 class="home blog halimthemes halimmovies halim-corner-rounded" data-masonry="">
<header id="header"><div class="container">
    <div class="row" id="headwrap">
      <div class="col-md-3 col-sm-6 slogan">
        <h1 class="site-title"><a class="logo" href="<?php echo e(route('home.index')); ?>" rel="home">animetvh.net</a></h1>
      </div>
      <!-- tìm kiếm -->
      <div class="col-md-5 col-sm-6 halim-search-form hidden-xs">
        <div class="header-nav">
          <div class="col-xs-12">
            <form id="search-form-pc" name="halimForm" role="search" action="<?php echo e(route('search')); ?>" method="GET">
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
      <?php if(Route::has('login')): ?>
      <?php if(auth()->guard()->check()): ?>
      <?php if(Auth::user()->role == 1): ?>
        <div class="col-md-4 hidden-xs">
          <a href="#">
            <div id="get-bookmark" class="box-shadow" style="margin-top:4px">
              <i class="hl-user"></i>
              <span><?php echo e(Auth::user()->name); ?></span>
              <!-- <span class="count">0</span> -->
            </div>
          </a>
          <div id="bookmark-list" class="hidden bookmark-list-on-pc">
          <div class="halim-bookmark-box">
              <div class="section-bar clearfix">
                  <h3 class="section-title"><span>Chức năng</span></h3>
              </div>
              <ul class="halim-bookmark-lists">
                <li class="bookmark-list"><a href="<?php echo e(route('admin.dashboard')); ?>" style="color:#db7b17">truy cập quản trị</a></li>
                <li class="bookmark-list"><a href="<?php echo e(route('thongtincanhan')); ?>" style="color:#db7b17">Thông tin cá nhân</a></li>
                <li class="bookmark-list"><a href="<?php echo e(route('animedaluu')); ?>" style="color:#db7b17">Anime đã lưu</a></li>
                <li class="bookmark-list"><a href="" style="color:#db7b17">Lịch sử đã xem</a></li>
                <li class="bookmark-list"><a href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Đăng xuất</a></li>
                <form action="<?php echo e(route('logout')); ?>" method="post" id="logout-form" style="display:none">
                    <?php echo csrf_field(); ?>
                </form>
              </ul>
            </div>
        </div>
      <?php else: ?>
        <div class="col-md-4 hidden-xs">
          <a href="#">
            <div id="get-bookmark" class="box-shadow" style="margin-top:4px">
              <i class="hl-user"></i>
              <span><?php echo e(Auth::user()->name); ?></span>
              <!-- <span class="count">0</span> -->
            </div>
          </a>
          <div id="bookmark-list" class="hidden bookmark-list-on-pc">
            <div class="halim-bookmark-box">
              <div class="section-bar clearfix">
                  <h3 class="section-title"><span>Chức năng</span></h3>
              </div>
              <ul class="halim-bookmark-lists">
                <li class="bookmark-list"><a href="<?php echo e(route('thongtincanhan')); ?>" style="color:#db7b17">Thông tin cá nhân</a></li>
                <li class="bookmark-list"><a href="<?php echo e(route('animedaluu')); ?>" style="color:#db7b17">Anime đã lưu</a></li>
                <li class="bookmark-list"><a href="" style="color:#db7b17">Lịch sử đã xem</a></li>
                <li class="bookmark-list"><a href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Đăng xuất</a></li>
                <form action="<?php echo e(route('logout')); ?>" method="post" id="logout-form" style="display:none">
                    <?php echo csrf_field(); ?>
                </form>
              </ul>
            </div>
          </div>
        </div>
      <?php endif; ?>
      <?php else: ?>
      <div class="col-md-4 hidden-xs">
          <a href="<?php echo e(route('login')); ?>">
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
      <?php endif; ?>
      <?php endif; ?>
    </div>
</header>
<?php echo $__env->make('user.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
                        <?php if(Auth::user()->profile_photo_path): ?>
                        <img class="rounded-circle mt-5" width="150px" src="<?php echo e(asset(uploads/profile)); ?>/<?php echo e(Auth::user()->profile_photo_path); ?>">
                        <?php else: ?>
                        <img class="rounded-circle mt-5" width="150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg">
                        <?php endif; ?>
                        <p class="text-black-50"><?php echo e(Auth::user()->email); ?></p>
                    </div>
                </div>
                <div class="col-md-12">
                    <ul class="list-group">
                        <li class="list-group-item"><a href="" class="active">Thông Tin chung</a></li>
                        <li class="list-group-item"><a href="<?php echo e(route('animedaluu')); ?>">Anime đã lưu</a></li>
                        <li class="list-group-item"><a href="">Lịch sử xem anime</a></li>
                        <li class="list-group-item"><a href="">Đổi Thông tin</a></li>
                        <li class="list-group-item"><a href="">Đổi mật khẩu</a></li>
                        <li class="list-group-item"><a href="">Đăng xuất</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-8 col-12">
                <div class="col-md-12 col-12 box-tutien">
                    <h4><center>- Thông tin chung -</center></h4>
                    <p>Trạng thái tu tiên</p>
                    <span class="level level-current">Luyện khí</span>
                    <span class="level level-next">Tụ đan</span>
                    <div class="progress">
                        <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <div class="group-info">
                        <div class="label">
                            Họ và Tên :
                        </div>
                        <div class="detail"><?php echo e(Auth::user()->name); ?></div>
                    </div>
                    <div class="group-info">
                        <div class="label">
                            Email :
                        </div>
                        <div class="detail"><?php echo e(Auth::user()->email); ?></div>
                    </div>
                    <div class="group-info">
                        <div class="label">
                            Loại Hệ Thống :
                        </div>
                        <div class="detail">Tu tiên</div>
                    </div>
                </div>
                <div class="col-md-12 mt-3">
                <h4><center>- Thông báo Từ Admin -</center></h4>
                </div>
                <div class="col-md-12 col-12 mt-3 box-thongbao">
                    <div class="col-12">
                        <?php $__currentLoopData = $thongbao; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tb): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <?php echo $tb->text_thongbao; ?>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
    <script type='text/javascript' src="<?php echo e(asset('wp-content/themes/halimmovies/assets/js/bootstrap.min2050.js?ver=5.2.15')); ?>"></script> 
    <script type='text/javascript' src="<?php echo e(asset('wp-content/themes/halimmovies/assets/js/owl.carousel.min2050.js?ver=5.2.15')); ?>"></script> 
    <!-- <script type='text/javascript'>/*  */
      var halim = {"light_mode":"0","ajax_url":"https:\/\/animehot.xyz\/wp-admin\/admin-ajax.php","post_id":"6352","sync":"1"};
    </script>  -->
    <script type='text/javascript' src="<?php echo e(asset('wp-content/themes/halimmovies/assets/js/halimmovie.core.min5152.js?ver=1.0')); ?>"></script>
    <?php echo $__env->yieldContent('js'); ?>
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
</body>
</html><?php /**PATH C:\xampp\htdocs\animetvh\resources\views/user/thongtincanhan.blade.php ENDPATH**/ ?>