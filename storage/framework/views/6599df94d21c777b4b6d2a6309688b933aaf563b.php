
<?php $__env->startSection('title'); ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php echo e($meta_title); ?> <?php if($thongtinphim->showphimfirst->max('episode')): ?><?php echo e($thongtinphim->showphimfirst->max('episode')); ?> - tập <?php echo e($nextfilm); ?> <?php endif; ?> | <?php echo e(\Str::limit($meta_desc, 300, $end='...')); ?>">
    <meta property="og:title" content="<?php echo e($meta_title); ?> <?php if($thongtinphim->showphimfirst->max('episode')): ?><?php echo e($thongtinphim->showphimfirst->max('episode')); ?> - tập <?php echo e($nextfilm); ?> <?php endif; ?> | " />
    <meta property="og:description" content="<?php echo e($meta_title); ?> <?php if($thongtinphim->showphimfirst->max('episode')): ?><?php echo e($thongtinphim->showphimfirst->max('episode')); ?> - tập <?php echo e($nextfilm); ?> <?php endif; ?> | <?php echo e(\Str::limit($meta_desc, 300, $end='...')); ?>" />
    <meta property="og:type" content="website" />
    <meta property="og:image" content="<?php echo e(asset('wp-content/uploads/catianlkenhanime.png')); ?>" />
    <meta property="og:site_name" content="<?php echo e($meta_canontical); ?>" />
    <meta property="og:url" content="<?php echo e($meta_canontical); ?>" />
    <meta property="og:locale" content="vi_VN" />
    <link rel="shortcut icon" href="<?php echo e(asset('wp-content/uploads/catianlkenhanime.png')); ?>" type="image/x-icon" />
    <link rel="canonical" href="<?php echo e($meta_canontical); ?>" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="robots" content="INDEX,FOLLOW, noodp"/>
    <meta name="googlebot" content="index,follow" />
    <meta name="BingBOT" content="index,follow" />
    <meta name="yahooBOT" content="index,follow" />
    <meta name="slurp" content="index,follow" />
    <meta name="msnbot" content="index,follow" />
    <meta name="revisit-after" content="1 days">
    <title><?php echo e($meta_title); ?> <?php if(isset($tap_phim1->episode_name)): ?> <?php echo e($tap_phim1->episode_name); ?> - tập <?php echo e($nextfilm); ?> <?php endif; ?> - animetvh</title>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
<link rel='stylesheet' id='bootstrap-css'  href='<?php echo e(asset("wp-content/themes/halimmovies/assets/css/bootstrap.min.css")); ?>' media='all' />
<link rel='stylesheet' id='style-css'  href='<?php echo e(asset("wp-content/themes/halimmovies/style1.css")); ?>' media='all' />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('main'); ?>
<div class="container">
      <div class="row container" id="wrapper">
        <div class="halim-panel-filter">
          <div class="panel-heading">
            <div class="row">
              <div class="col-xs-6">
                <div class="yoast_breadcrumb hidden-xs">
                  <span>
                    <span>
                      <a href="<?php echo e(route('home.index')); ?>">Home</a> » 
                      <span>
                        <a href="<?php echo e(route('theloai', $thongtinphim->cat->slug)); ?>"><?php echo e($thongtinphim->cat->name); ?></a> » 
                        <span class="breadcrumb_last" aria-current="page">
                          <?php echo e($thongtinphim->name); ?>

                        </span>
                      </span>
                    </span>
                  </span>
                </div>
              </div>
              <!-- <div class="col-xs-6 text-right">
              <a href="javascript:;" id="expand-ajax-filter">Filter movies <i id="ajax-filter-icon" class="hl-angle-down"></i></a>
              </div> -->
          </div>
        </div>
      </div>
        <main id="main-contents" class="col-xs-12 col-sm-12 col-md-8">
        <?php $__currentLoopData = $thongtin; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $thongt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <section id="content">
          <div class="clearfix wrap-content">
            <div class="halim-movie-wrapper">
              <div class="title-block watch-page">
                <div id="bookmark" class="bookmark-img-animation primary_ribbon" data-id="<?php echo e($thongt->id); ?>" title="Thêm vào Tủ Phim">
                  <div class="halim-pulse-ring"></div>
                </div>
                <div class="title-wrapper">
                  <h1 class="entry-title" title="<?php echo e($thongt->name); ?>"><?php echo e($thongt->name); ?></h1>
                  <span"><?php echo e($thongt->name2); ?></span>
                </div>
                <div class="more-info">
                  <span>Tập <?php echo e($thongtinphim->showphimfirst->max('episode')); ?>/<?php echo e($thongt->duration); ?></span>
                  <span>
                    <?php $__currentLoopData = $thongt->nhieutheloai; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $showtt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        - <a href="<?php echo e(route('theloai', $showtt->slug)); ?>" rel="category tag"><?php echo e($showtt->name); ?></a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </span>
                </div>
                <div class="hidden-xs">
                  <div class="halim_imdbrating taq-score">
                    <span class="hidden" itemprop="name"><?php echo e($thongt->name2); ?></span>
                    <span class="hidden" itemprop="description"><?php echo $thongt->description; ?> [&hellip;]</span>
                  </div>
                </div>
              </div>
              <div class="movie_info col-xs-12">
                <div class="movie-poster col-md-3">
                  <img class="movie-thumb" src="<?php echo e(asset('uploads')); ?>/<?php echo e($thongt->image); ?>" alt="Yuusha, Yamemasu">
                  <?php if($tap_phim): ?>
                  <a href="<?php echo e(route('xemphim', $tap_phim->slug_phim)); ?>" class="btn btn-sm btn-danger watch-movie visible-xs-block"><i class="hl-play"></i> Xem</a>
                  <?php else: ?>
                  <a onclick="alert('chưa có tập phim !')" class="btn btn-sm btn-danger watch-movie visible-xs-block"><i class="hl-play"></i> Xem</a>
                  <?php endif; ?>
                  <span id="show-trailer" data-url="<?php echo e($thongt->trailer); ?>" class="btn btn-sm btn-primary show-trailer">
                    <i class="hl-youtube-play"></i> Trailer
                  </span>
                  <span class="btn btn-sm btn-success quick-eps">
                    <a data-toggle="collapse" href="#collapseEps" aria-expanded="false" aria-controls="collapseEps">
                      <i class="hl-sort-down"></i> Chọn tập
                    </a>
                  </span>
                </div>
                <div class="film-poster col-md-9">
                  <div class="film-poster-img" style="background: url('<?php echo e(asset('uploads')); ?>/<?php echo e($thongt->image); ?>');background-size: cover;background-repeat: no-repeat;background-position: 30% 25%;height: 300px;-webkit-filter: grayscale(100%); filter: grayscale(100%);"></div>
                  <div class="halim-play-btn hidden-xs">
                  <?php if($tap_phim): ?>
                    <a href="<?php echo e(route('xemphim', $tap_phim->slug_phim)); ?>" class="play-btn" title="Click to Play" data-toggle="tooltip" data-placement="bottom">Click to Play</a>
                  <?php else: ?>
                  <a onclick="alert('chưa có tập phim !')" class="play-btn" title="Click to Play" data-toggle="tooltip" data-placement="bottom">Click to Play</a>
                  <?php endif; ?>
                  </div>
                  <div class="movie-trailer hidden"></div>
                  <div class="movie-detail"></div>
                </div>
              </div>
            </div>
            <div class="clearfix"></div>
            <div id="halim_trailer"></div>
            <!-- chọn tập xem phim -->
            <div class="collapse in" id="collapseEps">
              <div id="halim-list-server">
                <div class="halim-server">
                  <ul class="halim-list-eps">
                    <?php $__currentLoopData = $showtapphim; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $showtap): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li class="halim-episode">
                          <a href="<?php echo e(route('xemphim', $showtap->slug_phim)); ?>"><span><?php echo e($showtap->episode_name); ?></span></a>
                        </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </ul>
                  <div class="clearfix"></div>
                </div>
                  <!-- <div id="ajax-get-server">Loading server...</div> -->
                </div>
              </div>
              <div class="clearfix"></div>
              <div class="noidungphim">Nội dung phim</div>
              <div class="entry-content htmlwrap clearfix">
                <article id="post-5813" class="item-content">
                  <h2> <?php echo e($thongt->name); ?> - Tập <?php echo e($thongtinphim->showphimfirst->max('episode')); ?>/<?php echo e($thongt->duration); ?></h2>
                  <p style="text-align: justify;">
                  <?php echo $thongt->description; ?>

                  </p>
                </article>
              </div>
            </div>
        </section>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php
          $current_url = Request::url();
        ?>
        <div class="fb-comments" data-href="<?php echo e($current_url); ?>" data-width="100%" data-numposts="3"></div>
          <section class="related-movies">
            <section id="halim-advanced-widget-3">
              <div class="section-heading">
                <a href="https://animehot.xyz/moi-cap-nhat" title="Mới Cập Nhật">
                  <span class="h-text">Có Thể bạn thích</span>
                </a>
              </div>
              <div id="halim-advanced-widget-3-ajax-box" class="halim_box">
                <?php $__currentLoopData = $showphimlienquan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $showplq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <article class="col-md-3 col-sm-3 col-xs-6 thumb grid-item">
                  <div class="halim-item">
                    <a class="halim-thumb" href="<?php echo e(route('chitiet', $showplq->slug)); ?>" title="<?php echo e($showplq->name); ?>">
                      <figure>
                        <img class="lazy img-responsive" data-src="<?php echo e(asset('uploads')); ?>/<?php echo e($showplq->image); ?>" alt="<?php echo e($showplq->name); ?>" title="<?php echo e($showplq->name); ?>">
                      </figure>
                      <span class="episode"><?php echo e($showplq->showphimfirst->max('episode')); ?>/<?php echo e($showplq->duration); ?></span>
                      <div class="icon_overlay"></div>
                      <div class="halim-post-title-box">
                        <div class="halim-post-title ">
                          <h2 class="entry-title"><?php echo e($showplq->name); ?></h2>
                          <p class="original_title"><?php echo e($showplq->name2); ?></p>
                        </div>
                      </div>
                    </a>
                  </div>
                </article>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </div>
            </section>
            <div class="clearfix"></div>
          </section>
        </main>
        <?php echo $__env->make('user.theloaimain', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\webphim\resources\views/user/chitiet.blade.php ENDPATH**/ ?>