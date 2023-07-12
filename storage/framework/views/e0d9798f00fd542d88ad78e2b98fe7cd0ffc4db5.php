
<?php $__env->startSection('title'); ?>
<meta name="description" content="<?php echo e($meta_desc); ?>">
<meta name="title" content="<?php echo e($meta_title); ?> - animetvh" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="robots" content="INDEX,FOLLOW, noodp"/>
<meta property="og:type" content="website" />
<meta property="og:title" content="<?php echo e($meta_title); ?> - animetvh.et" />
<meta property="og:description" content="<?php echo e($meta_desc); ?>" />
<meta property="og:description" content="tổng hợp nhiều loại phim hay mà bạn đang mong chờ" />
<meta property="og:image" content="<?php echo e(asset('wp-content/uploads/catianlkenhanime.png')); ?>" />
<meta property="og:site_name" content="<?php echo e($meta_canontical); ?>" />
<meta property="og:url" content="<?php echo e($meta_canontical); ?>" />
    <meta property="og:locale" content="vi_VN" />
    <link rel="shortcut icon" href="<?php echo e(asset('wp-content/uploads/catianlkenhanime.png')); ?>" type="image/x-icon" />
    <link rel="canonical" href="<?php echo e($meta_canontical); ?>" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="googlebot" content="index,follow" />
    <meta name="BingBOT" content="index,follow" />
    <meta name="yahooBOT" content="index,follow" />
    <meta name="slurp" content="index,follow" />
    <meta name="msnbot" content="index,follow" />
    <meta name="revisit-after" content="1 days">
    <title><?php echo e($meta_title); ?> - animetvh.net</title>
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
                      <a href="../index.html">Home</a> » 
                      <span class="breadcrumb_last" aria-current="page"><?php echo e($slugtheloai->name); ?></span>
                    </span>
                  </span>
                </div>
              </div>
              <!-- <div class="col-xs-6 text-right">
                <a href="javascript:;" id="expand-ajax-filter">Loc 
                  <i id="ajax-filter-icon" class="hl-angle-down"></i>
                </a>
              </div> -->
            </div>
          </div>
          <div id="ajax-filter" class="panel-collapse collapse" aria-expanded="true" role="menu">
            <div class="ajax"></div>
          </div>
        </div>
        <main id="main-contents" class="col-xs-12 col-sm-12 col-md-8">
          <div class="section-bar is-tabs clearfix">
            <h3 class="section-title"><span><?php echo e($slugtheloai->name); ?></span></h3>
          </div>
          <div class="halim_box">
          <?php $__empty_1 = true; $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <article class="col-md-3 col-sm-3 col-xs-6 thumb grid-item post-6144">
              <div class="halim-item">
                <a class="halim-thumb" href="<?php echo e(route('chitiet', $dt->slug)); ?>" title="<?php echo e($dt->name); ?>">
                  <figure>
                    <img class="lazy img-responsive" data-src="<?php echo e(asset('uploads')); ?>/<?php echo e($dt->image); ?>" alt="<?php echo e($dt->name); ?>" title="<?php echo e($dt->name2); ?>">
                  </figure>
                    <?php if($dt->phim_noibat == 1): ?>
                    <span class="status">Hot</span>
                    <?php elseif($dt->phim_noibat == 2): ?>
                    <span class="status">Anime mới</span>
                    <?php elseif($dt->phim_noibat == 3): ?>
                    <span class="status">Xem nhiều</span>
                    <?php endif; ?>
                    <span class="is_trailer"><?php echo e($dt->updated_at->diffForHumans()); ?></span>
                    <?php if($dt->showphimfirst->max('episode')): ?>
                      <span class="episode">Tập <?php echo e($dt->showphimfirst->max('episode')); ?></span>
                    <?php endif; ?>
                  <div class="icon_overlay"></div>
                  <div class="halim-post-title-box">
                    <div class="halim-post-title ">
                      <h2 class="entry-title"><?php echo e($dt->name); ?></h2>
                      <p class="original_title"><?php echo e($dt->name2); ?></p>
                    </div>
                  </div>
                </a>
              </div>
            </article>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <div class="alert alert-dark" role="alert">
                Hiện chưa có anime theo thể loại này trên kênh
            </div>
            <?php endif; ?>
          </div>
          <div class="clearfix"></div>
            <?php echo e($data->appends(request()->all())->links('user.in-paginate')); ?>

        </main>
        <?php echo $__env->make('user.theloaimain', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\webphim\resources\views/user/theloai.blade.php ENDPATH**/ ?>