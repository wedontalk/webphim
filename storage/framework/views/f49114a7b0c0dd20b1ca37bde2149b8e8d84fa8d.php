<!DOCTYPE html>
<html lang="zxx">
<head>
    <meta charset="UTF-8">
    <!-- <meta name="exoclick-site-verification" content="772daa6ca4fda30f2dba90e892e59ed0"> -->
    <?php echo $__env->yieldContent('meta'); ?>
    <link rel="shortcut icon" type="image/png" href="<?php echo e(asset('user/img/icon-favicon.png')); ?>"/>
  	<!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-W2FCR0KG1L"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'G-W2FCR0KG1L');
    </script>
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
  <!-- Css Styles -->
    <link rel="stylesheet" href="<?php echo e(asset('user/css/bootstrap.min.css')); ?>" type="text/css">
    <link rel="stylesheet" href="<?php echo e(asset('user/css/font-awesome.min.css')); ?>" type="text/css">
    <link rel="stylesheet" href="<?php echo e(asset('user/css/elegant-icons.css')); ?>" type="text/css">
    <link rel="stylesheet" href="<?php echo e(asset('user/css/plyr.css')); ?>" type="text/css">
    <link rel="stylesheet" href="<?php echo e(asset('user/css/nice-select.css')); ?>" type="text/css">
    <link rel="stylesheet" href="<?php echo e(asset('user/css/owl.carousel.min.css')); ?>" type="text/css">
    <link rel="stylesheet" href="<?php echo e(asset('user/css/slicknav.min.css')); ?>" type="text/css">
    <link rel="stylesheet" href="<?php echo e(asset('user/css/style.css')); ?>" type="text/css">
  <!-- propellerads-->
</head>
<body>

    <!-- Page Preloder -->
    <!-- <div id="preloder">
        <div class="loader"></div>
    </div> -->

    <!-- Header Section Begin -->
    <header class="header">
        <div class="container-fluid fullsize_ne">
            <div class="row">
                <div class="col-lg-2">
                    <div class="header__logo">
                        <a href="<?php echo e(route('home.index')); ?>">
                            <img src="<?php echo e(asset('user/img/imagelogo.png')); ?>" alt="" width="200px" heigth="65px">
                        </a>
                    </div>
                </div>
                <?php echo $__env->make('user1.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <div class="col-lg-2">
                    <div class="header__right">
                        <a href="#" class="search-switch"><span class="icon_search"></span></a>
                        <?php if(Route::has('login')): ?>
                        <?php if(auth()->guard()->check()): ?>
                        <?php if(Auth::user()->role == 1): ?>
                        <a href="<?php echo e(route('admin.dashboard')); ?>"><span class="icon_profile"></span></a>
                        <a href="<?php echo e(route('logout')); ?>" title="Đăng xuất" 
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                        >Đăng xuất</a></div>
                        <form action="<?php echo e(route('logout')); ?>" method="post" id="logout-form">
                                <?php echo csrf_field(); ?>
                        </form>
                        <?php else: ?>
                        <a href="<?php echo e(route('logout')); ?>" title="Đăng xuất" 
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                        >Đăng xuất</a></div>
                        <form action="<?php echo e(route('logout')); ?>" method="post" id="logout-form">
                                <?php echo csrf_field(); ?>
                        </form>
                        <?php endif; ?>
                        <?php else: ?>
                        <a href="<?php echo e(route('login')); ?>"><span class="icon_profile"></span> Đăng nhập</a>
                        <?php endif; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div id="mobile-menu-wrap"></div>
        </div>
    </header>
    <!-- Header End -->

    <!-- Hero Section Begin -->
    
    <!-- Hero Section End -->
<br>
    <!-- Product Section Begin -->
    <?php echo $__env->yieldContent('main'); ?>
    <!-- Product Section End -->

<!-- Footer Section Begin -->
<footer class="footer">
    <div class="page-up">
        <a href="#" id="scrollToTopButton"><span class="arrow_carrot-up"></span></a>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="footer__logo" style="margin-top:-25px;">
                    <a href="./index.html"><img src="<?php echo e(asset('user/img/imagelogo.png')); ?>" alt=""></a>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="footer__nav">
                    <ul>
                        <li class="active"><a href="<?php echo e(route('home.index')); ?>">Homepage</a></li>
                        <li><a href="<?php echo e(route('danhmuc')); ?>">Danh mục</a></li>
                        <li><a href="./blog.html">Our Blog</a></li>
                        <li><a href="#">Contacts</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3">
                <p style="color:#fff"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="<?php echo e(route('home.index')); ?>" target="_blank">animetvh</a></p>
                  <span><a href="https://www.facebook.com/animetvh.net/"><i class="fa fa-facebook" 
                style="
                font-size:20px; 
                color:#fff; 
                background: #757575;
                padding: 8px 15px 8px 13px;
                border-radius: 50%;
                box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
                "
                ></i></a></span>
              </div>
          </div>
      </div>
  </footer>

  <!-- Footer Section End -->

  <!-- Search model Begin -->
  <div class="search-model">
    <div class="h-100 d-flex align-items-center justify-content-center">
        <div class="search-close-switch"><i class="icon_close"></i></div>
        <form action="<?php echo e(route('search')); ?>" class="search-model-form" method="get">
            <input type="text" id="search-input" name="key" placeholder="tìm kiếm phim...">
        </form>
    </div>
</div>
<!-- Search model end -->
<!-- Js Plugins -->
<script src="<?php echo e(asset('user/js/jquery-3.3.1.min.js')); ?>"></script>
<script src="<?php echo e(asset('user/js/bootstrap.min.js')); ?>"></script>
<script src="<?php echo e(asset('user/js/player.js')); ?>"></script>
<script src="<?php echo e(asset('user/js/jquery.nice-select.min.js')); ?>"></script>
<!-- <script src="<?php echo e(asset('user/js/mixitup.min.js')); ?>"></script> -->
<script src="<?php echo e(asset('user/js/jquery.slicknav.js')); ?>"></script>
<script src="<?php echo e(asset('user/js/owl.carousel.min.js')); ?>"></script>
<script src="<?php echo e(asset('user/js/main.js')); ?>"></script>
    <?php echo $__env->yieldContent('js'); ?>
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
<!-- CSS -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
<!-- Default theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
<!-- Semantic UI theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css"/>
<!-- Bootstrap theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>
<!--propreller-->
<script data-cfasync="false" type="text/javascript" src="//jaavnacsdw.com/t/9/fret/meow4/1932052/9143fb00.js"></script>

</body>
</html>
<script>
    function remove_background(id) {
        for(var count = 1; count <= 5; count++){
                $('#'+id+'-'+count).css('color', '#ccc');
            }
    }
        $(document).on('mouseenter', '.rating',function() {
            var index = $(this).data("index");
            var id = $(this).data("id");
            remove_background(id);
            for(var count = 1; count<=index; count++){
                $('#'+id+'-'+count).css('color', '#ffcc00');
            }
        });
        $(document).on('mouseleave', '.rating', function() {
            var index = $(this).data("index");
            var id = $(this).data("id");
            var rating = $(this).data("rating");
            remove_background(id);
            for(var count = 1; count<=rating; count++){
                $('#'+id+'-'+count).css('color', '#ffcc00');
            }
        });
        
        $(document).on('click', '.rating', function(){
            var index = $(this).data("index");
            var id = $(this).data('id');
            var _token = $('input[name="_token"]').val();
            console.log(index);
            console.log(id);
            console.log(_token);
            $.ajax({
                url:'<?php echo e(url('/insert-rating')); ?>', 
                method:'POST',
                data:{index:index, id:id, _token: "<?php echo e(csrf_token()); ?>"},
                success: function(data) 
                {
                    if(data == 'done')
                    {
                        alertify.success('cảm ơn bạn đã đánh giá '+index+' sao');
                        function greatin(){
                            window.location.reload(true);
                        }
                        setTimeout(greatin, 1000);  
                    }
                    else
                    {
                        alertify.error('lỗi đánh giá');
                    }
                }
            });
        });


</script>                                       <?php /**PATH /home/animetvh/domains/animetvh.net/public_html/resources/views/layouts/user.blade.php ENDPATH**/ ?>