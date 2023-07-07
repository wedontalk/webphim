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
    <?php echo $__env->make('user.slide', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- banner header -->
    <div class="col-12" style="display:flex; justify-content:center">
      <a href="">
        <img src="<?php echo e(asset('wp-content/uploads/banner-720.png')); ?>" alt="">
      </a>
    </div>
    <!-- end banner header -->
    <?php echo $__env->yieldContent('main'); ?>
  <div class="clearfix"></div>
  <!-- banner footer -->
  <div class="col-12" style="display:flex; justify-content:center">
    <a href="">
      <img src="<?php echo e(asset('wp-content/uploads/banner-720.png')); ?>" alt="">
    </a>
  </div>
  <!-- end banner footer -->
  <footer id="footer" class="clearfix">
    <div class="container footer-columns">
      <div class="row container">
        <div class="widget about col-xs-12 col-sm-4 col-md-4">
          <div class="footer-logo">
            <img class="img-responsive" src="<?php foreach($showcauhinh as $key => $avatar) {echo'../../uploads/logo/'.$avatar->logo_footer;} ?>" alt="AnimeHot.XYZ" width="420px" height="200px"/>
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
    <!-- modal -->
    <div class="modal fade" id="banner_qc" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <!-- <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5> -->
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <a href="http://127.0.0.1:8000/chi-tiet-anime/akuyaku-reijou-nanode-last-boss-wo-kattemimashita.html">
          <div class="modal-body">
              <img src="http://127.0.0.1:8000/uploads/1664036620-phim.jpg" alt="">
          </div>
          </a>
          <!-- <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
          </div> -->
        </div>
      </div>
    </div>
    <!-- end modal -->
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
    <script>
      // returnauto();
      // function returnauto(){
      //   $.ajax({
      //       url:'<?php echo e(route("returnauto")); ?>',
      //       method:"post",
      //       dataType:"JSON",
      //       data:{_token:'<?php echo e(csrf_token()); ?>'},
      //       success:function(data)
      //       {
      //           //
      //       }
      //   });
      // }
    </script>
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
                  if(search.length > 1){
                    if(value.name.search(expression) != -1 || value.name2.search(expression) != -1){
                      $('.ajax-results').removeClass('hidden')
                      $('.ajax-results').append('<li class="exact_result"><a href="/chi-tiet-anime/'+value.slug+'"><div class="halim_list_item"><div class="image"><img src="/uploads/'+value.image+'" alt="'+value.name+'"></div><span class="label">'+value.name+'</span><span class="enName">'+value.name2.substring(0, 65)+'...</span></div></a></li>')
                    }
                  }
                })
              })
            }else{
              $('.ajax-results').addClass('hidden')
            }
            
          },500))
        });
      </script>
      <script>
            $(document).ready(function(){
                $(window).on('load', function () {
                    $('#banner_qc').modal('show');
                });
            });
      </script>
      <!-- <script>
        $(document).keydown(function (event) {
            if (event.keyCode == 123) { // Prevent F12
                return false;
            } else if (event.ctrlKey && event.shiftKey && event.keyCode == 73) { 
              // Prevent Ctrl+Shift+I        
                return false;
            }
        });
        $(document).on("contextmenu", function (e) {        
            e.preventDefault();
        });
        setInterval(function () {
            var before = new Date().getTime();
            debugger;
            var after = new Date().getTime();
            if (after - before > 200) {
                document.querySelector("html").innerHTML = "";
                window.location.reload(true);
            }
        }, 100);
      </script>
      <script>
        document.onkeydown = function(e) {
                if (e.ctrlKey && 
                    (e.keyCode === 67 || 
                    e.keyCode === 86 || 
                    e.keyCode === 85 || 
                    e.keyCode === 117)) {
                    return false;
                } else {
                    return true;
                }
        };
        $(document).keypress("u",function(e) {
          if(e.ctrlKey)
          {
        return false;
        }
        else
        {
        return true;
        }
        });
      </script> -->
</body>
</html><?php /**PATH C:\xampp\htdocs\animetvh\resources\views/layouts/user.blade.php ENDPATH**/ ?>