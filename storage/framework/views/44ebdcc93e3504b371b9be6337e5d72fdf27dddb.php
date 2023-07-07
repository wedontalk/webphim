
<?php $__env->startSection('title'); ?>
<meta name="description" content="Tìm anime trang tổng hợp tìm kiếm anime nhanh phù hợp full vietsub + thuyết minh mới nhất | animetvh.net">
  <link rel="shortcut icon" href="<?php echo e(asset('wp-content/uploads/catianlkenhanime.png')); ?>" type="image/x-icon" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta property="og:type" content="website" />
  <meta property="og:title" content="Tìm kiếm aniem | animetvh.net" />
  <meta property="og:description" content="Tìm anime trang tổng hợp tìm kiếm anime nhanh phù hợp full vietsub + thuyết minh mới nhất | animetvh.net" />
  <meta property="og:image" content="<?php echo e(asset('wp-content/uploads/catianlkenhanime.png')); ?>" />
  <meta property="og:site_name" content="<?php echo e(Request::url()); ?>" />
  <meta property="og:url" content="<?php echo e(Request::url()); ?>" />
  <meta property="og:locale" content="vi_VN" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="robots" content="INDEX,FOLLOW, noodp"/>
  <meta name="googlebot" content="index,follow" />
  <meta name="BingBOT" content="index,follow" />
  <meta name="yahooBOT" content="index,follow" />
  <meta name="slurp" content="index,follow" />
  <meta name="msnbot" content="index,follow" />
  <meta name="revisit-after" content="1 days">
  <title>Tìm kiếm aniem | animetvh.net</title>
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
                      <span class="breadcrumb_last" aria-current="page">Tìm Kiếm anime</span>
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
        <!-- tìm kiếm anime -->
        <div class="container" id="wrapper">
            <div class="halim-panel-filter">
                <div class="panel-heading">
                    <a class="btn btn-primary justify-content-end" style="display:block" data-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">click để Tìm Kiếm phim</a>
                </div>
                <div class="">
                    <div class="col">
                        <div class="collapse multi-collapse in" id="multiCollapseExample1">
                            <div class="card card-body">
                                <div class="panel-heading">
                                  <form action="<?php echo e(route('timkiemanime')); ?>" method="get">
                                    <?php $__currentLoopData = $showcategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $showcate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="col-md-2 col-sm-2 col-lg-3 col-xs-4">
                                      <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="timkiemtheloai[]" id="<?php echo e($showcate->name); ?><?php echo e($showcate->id); ?>" value="<?php echo e($showcate->id); ?>">
                                        <label class="form-check-label" for="<?php echo e($showcate->name); ?><?php echo e($showcate->id); ?>"><?php echo e($showcate->name); ?></label>
                                      </div>
                                    </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <div class="clearfix"></div>
                                    <div class="col-md-6 col-sm-12 col-xs-12">
                                      <div class="filter-box">
                                        <div class="filter-box-title">Số Lượng Tập</div>    
                                        <select class="form-control" id="tapphim" name="tapphim">
                                            <option value="1">> 0 Tập </option>
                                            <option value="10">>= 10 Tập</option>
                                            <option value="50">>=50 Tập</option>
                                            <option value="100">>= 100 Tập</option>
                                            <option value="Full">Tập Full</option>
                                        </select>                                   
                                      </div>
                                    </div>
                                    <!-- Tình trạng -->
                                    <div class="col-md-6 col-sm-12 col-xs-12">
                                      <div class="filter-box">
                                        <div class="filter-box-title">Tình trạng</div>    
                                        <select class="form-control" id="status" name="status">
                                          <?php $__currentLoopData = $showtrangthai; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $showtt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($showtt->id); ?>"><?php echo e($showtt->name); ?></option>
                                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>                                   
                                      </div>
                                    </div>
                                    <!-- button -->
                                    <div class="col-md-2 col-xs-12 col-sm-6">                       
                                        <button type="submit" id="btn-movie-filter" class="btn btn-danger" style="margin-top:10px">Tìm Kiếm</button>
                                    </div>
                                  </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <main  class="col-xs-12 col-sm-12 col-md-12">
          <div class="section-bar is-tabs clearfix">
            <h3 class="section-title"><span>Tìm Kiếm Anime</span></h3>
          </div>
          <div class="halim_box">
          <?php if(!isset($_GET['timkiemtheloai'])): ?>
          <div class="alert alert-info" role="alert">
                Bạn chưa chọn thể loại !!!
            </div>
          <?php endif; ?>
          <?php if(isset($data)): ?>
          <?php $__empty_1 = true; $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <?php if(isset($_GET['tapphim']) && $dt->showphimfirst->max('episode') >= $_GET['tapphim'] && $dt->showphimfirst->max('episode') != "Full"): ?>
              <article class="col-md-2 col-sm-2 col-xs-6 thumb grid-item post-6144">
                <div class="halim-item">
                  <a class="halim-thumb" href="<?php echo e(route('chitiet', $dt->slug)); ?>" title="<?php echo e($dt->name); ?>">
                    <figure>
                      <img class="lazy img-responsive" data-src="<?php echo e(asset('uploads')); ?>/<?php echo e($dt->image); ?>" alt="<?php echo e($dt->name); ?>" title="<?php echo e($dt->name2); ?>">
                    </figure>
                    <?php if($dt->phim_noibat == 1): ?>
                      <span class="status">Hot</span>
                      <?php elseif($dt->phim_noibat == 2): ?>
                      <span class="status">Truyện mới</span>
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
            <?php elseif(isset($_GET['tapphim']) && $_GET['tapphim'] == "Full" && $dt->showphimfirst->max('episode') == "Full"): ?>
            <article class="col-md-2 col-sm-2 col-xs-6 thumb grid-item post-6144">
                <div class="halim-item">
                  <a class="halim-thumb" href="<?php echo e(route('chitiet', $dt->slug)); ?>" title="<?php echo e($dt->name); ?>">
                    <figure>
                      <img class="lazy img-responsive" data-src="<?php echo e(asset('uploads')); ?>/<?php echo e($dt->image); ?>" alt="<?php echo e($dt->name); ?>" title="<?php echo e($dt->name2); ?>">
                    </figure>
                    <?php if($dt->phim_noibat == 1): ?>
                      <span class="status">Hot</span>
                      <?php elseif($dt->phim_noibat == 2): ?>
                      <span class="status">Truyện mới</span>
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
            <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <div class="alert alert-dark" role="alert">
                Hiện chưa có anime theo thể loại này trên kênh
            </div>
          <?php endif; ?>
          <?php endif; ?>
          </div>
          <div class="clearfix"></div>
          <?php if(isset($data)): ?>
            <?php echo e($data->appends(request()->all())->links('user.in-paginate')); ?>

          <?php endif; ?>
        </main>
      </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\animetvh\resources\views/user/timanime.blade.php ENDPATH**/ ?>