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
                  <input id="search" type="text" name="search" class="form-control" value="<?php echo e((isset($_GET['search']) && $_GET['search'] != '') ? $_GET['search']:''); ?>" placeholder="Search..." autocomplete="off" required>
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
    <div class="col-12">
      <div class="alert alert-info" role="alert">
      <?php $__currentLoopData = $thongbaouser; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tb): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php echo $tb->text_thongbao; ?>

      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </div>
    </div>
    <?php echo $__env->make('user.slide', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- banner header -->
    <?php if(isset($qc_header)): ?>
    <div class="col-12" style="display:flex; justify-content:center">
      <a href="">
        <img src="<?php echo e(asset('uploads/quangcao')); ?>/<?php echo e($qc_header->images); ?>" alt="">
      </a>
    </div>
    <?php endif; ?>
    <!-- end banner header -->
    <?php echo $__env->yieldContent('main'); ?>
    <?php if(isset($qc_footer)): ?>
    <!-- banner footer -->
    <div class="col-12" style="display:flex; justify-content:center">
      <a href="">
        <img src="<?php echo e(asset('uploads/quangcao')); ?>/<?php echo e($qc_footer->images); ?>" alt="">
      </a>
    </div>
    <!-- end banner footer -->
   <?php endif; ?>
  <div class="clearfix"></div>
  <?php if(isset($qc_modal)): ?>
    <div class="modal fade in" id="banner_qc" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <!-- <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5> -->
            <button type="button" class="close_qc" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true" style="font-size: 30px;">&times;</span>
            </button>
          </div>
          <a class="click_close" data-href="<?php echo e($qc_modal->link); ?>">
          <div class="modal-body">
              <img src="<?php echo e(asset('uploads/quangcao')); ?>/<?php echo e($qc_modal->images); ?>" alt="" width="100%">
          </div>
          </a>
          <!-- <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
          </div> -->
        </div>
      </div>
    </div>
  <?php endif; ?>
  <footer id="footer" class="clearfix">
    <div class="container footer-columns">
      <div class="row container">
        <div class="widget about col-xs-12 col-sm-4 col-md-4">
          <div class="footer-logo">
            <img class="img-responsive" src="<?php foreach($showcauhinh as $key => $avatar) {echo'../../uploads/logo/'.$avatar->logo_footer;} ?>" alt="<?php echo e($avatar->logo_footer); ?>" width="420px" height="200px"/>
            <span class="social"></span>
          </div>
          <p class="halim-about">
            <p style="text-align: left;"><?php foreach($showcauhinh as $key => $avatar) {
              echo $avatar->thongtin;
            } ?></p>
          </p>
        </div>
        <div class="col-xs-12 col-sm-8 col-md-8">
      </div>
    </footer>
    <div class="footer-credit">
      <div class="container credit">
        <div class="row container">
          <div class="col-xs-12 col-sm-4 col-md-6">Copyright  ©  
            <a id="halimthemes" href="route('home.index')" title="mangatv">animetvh.com</a>
          </div>
          <div class="col-xs-12 col-sm-4 col-md-6 text-right pull-right">
            <p class="blog-info">animetvh.com</p>
          </div>
        </div>
      </div>
    </div>
    <div id='easy-top'></div> 
    <script type='text/javascript' src="<?php echo e(asset('wp-content/themes/halimmovies/assets/js/bootstrap.min2050.js?ver=5.2.15')); ?>"></script> 
    <script type='text/javascript' src="<?php echo e(asset('wp-content/themes/halimmovies/assets/js/owl.carousel.min2050.js?ver=5.2.15')); ?>"></script> 
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
      <!-- callback -->
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
      <!-- qc modal -->
      <script>
            $(document).ready(function(){
                function displayModal() {
                  $('#banner_qc').modal('show');
                }
                var clickclose = $('.close_qc');
                clickclose.on("click", function() {
                  closeModal();
                });
                var span = $(".click_close");
                span.on("click", function() {
                  closeModal();
                });
                function closeModal() {
                  var $link = span.data('href');
                  sessionStorage.setItem("modalVisible", "hidden");
                  window.open($link);
                  window.location.reload(true)
                }
                $(window).on('load', function () {
                var modalVisible = sessionStorage.getItem("modalVisible");
                  if (modalVisible !== "hidden") {
                    // displayModal();
                    displayModal();
                  }
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
      <!-- qc click -->
      <script>
            $(document).ready(function(){
              $(window).on('load', function (){
                var clickItem = sessionStorage.getItem('clickItem');
                <?php if(isset($qc_onclick)): ?>
                var url = <?php echo e($qc_onclick->link); ?>;
                <?php else: ?>
                var url ='';
                <?php endif; ?>
                if(clickItem !== "true" && url !== undefined){
                  $(document).on('click', function(){
                    if(url !== ''){
                      sessionStorage.setItem("clickItem", "true");
                      window.open(url);
                   }
                  })
                }
              })
            });
      </script>
      <!-- lịch sử xem -->
      <script>
        $(document).ready(function(){
          $(document).on('click','.halim-episode a', function(e){
            var film = $(this).data('film');
            var ep = $(this).data('ep');
            var epUrl = $(this).attr('href');
            var objList = {
                id:film,
                ep:ep,
                epUrl:epUrl
              }
            var list = JSON.parse(localStorage.getItem('listMovie') || "[]");
            var isExisting = false;
              for (var i = 0; i < list.length; i++) {
                  if (list[i].ep === ep) {
                      isExisting = true;
                      break;
                  }
              }
              if (!isExisting) {
                  list.push(objList);
                  localStorage.setItem('listMovie', JSON.stringify(list));
              }
          })
          $(document).ready(function(){
              var list = JSON.parse(localStorage.getItem('listMovie') || "[]");
              $('.halim-episode a').each(function(){
                  var ep = $(this).data('ep');
                  var isExisting = list.some(function(item){
                      return item.ep == ep;
                  });
                  if (isExisting) {
                      $(this).addClass('luu');
                  }
              });
          });
        });
      </script>
</body>
</html><?php /**PATH C:\xampp\htdocs\webphim\resources\views/layouts/user.blade.php ENDPATH**/ ?>