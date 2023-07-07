<?php $__env->startSection('meta'); ?>
    <title><?php echo e($meta_title); ?> <?php echo e($phimtc->episode_name); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php echo e($meta_title); ?> <?php echo e($phimtc->episode_name); ?> | <?php echo e(\Str::limit($meta_desc, 300, $end='...')); ?>">
	<meta name="title" content="<?php echo e($meta_title); ?> - <?php echo e($phimtc->episode_name); ?> - animetvh" />
    <meta name="keywords" content="<?php echo e($meta_keyword); ?>" />
    <meta property="og:title" content="<?php echo e($meta_title); ?> <?php echo e($phimtc->episode_name); ?>" />
    <meta property="og:description" content="<?php echo e($meta_title); ?> <?php echo e($phimtc->episode_name); ?> | <?php echo e(\Str::limit($meta_desc, 300, $end='...')); ?>" />
    <meta property="og:type" content="website" />
    <meta property="og:image" content="<?php echo e(asset('user/img/lifelogo1.png')); ?>" />
    <meta property="og:site_name" content="<?php echo e($meta_canontical); ?>" />
    <meta property="og:url" content="<?php echo e($meta_canontical); ?>" />
    <meta property="og:locale" content="vi_VN" />
    <link rel="canonical" href="<?php echo e($meta_canontical); ?>" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="robots" content="INDEX,FOLLOW, noodp"/>
  	<meta name="googlebot" content="index,follow" />
    <meta name="BingBOT" content="index,follow" />
    <meta name="yahooBOT" content="index,follow" />
    <meta name="slurp" content="index,follow" />
    <meta name="msnbot" content="index,follow" />
    <meta name="revisit-after" content="1 days">
	<style>
		.setmemactive{
          background:#d5d5d5 !important;
          color:black !important;
        }
	</style>
	<!--<script>(function(s,u,z,p){s.src=u,s.setAttribute('data-zone',z),p.appendChild(s);})(document.createElement('script'),'https://inklinkor.com/tag.min.js',5038453,document.body||document.documentElement)</script> -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('main'); ?>
<p style="display:none"><?php echo e($meta_title); ?> <?php echo e($phimtc->episode_name); ?> | <?php echo e(\Str::limit($meta_desc, 300, $end='...')); ?></p>
<div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="<?php echo e(route('home.index')); ?>"><i class="fa fa-home"></i> Home</a>
                        <a href="#">Thể loại</a>
                        <span><?php echo e($phimtc->products->name); ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Anime Section Begin -->
    <section class="anime-details spad">
        <div class="container">
            <div class="row">
              <div class="col-lg-12"><p style="color:#fff; font-size: 1rem;">Bạn đang xem : <?php echo e($phimtc->products->name); ?> - <?php echo e($phimtc->episode_name); ?></p></div>
                <div class="col-lg-12">
                    <div class="anime__video__player" style="position: relative;padding-bottom: 60.25%">
                        <iframe src="<?php echo e($phimtc->content); ?>" style="position: absolute;top: 0;left: 0;width: 100%;height: 100%;overflow:hidden;" id="player" frameborder="0" scrolling="0" allowfullscreen></iframe>
                    </div>
					<p style="display:none"><?php echo e($meta_title); ?> <?php echo e($phimtc->episode_name); ?> | <?php echo e(\Str::limit($meta_desc, 300, $end='...')); ?></p>
                    <div class="anime__details__episodes" style="overflow: auto; max-height: 500px;">
                        <div class="section-title">
                            <h5>Danh sách tập phim</h5>
                        </div>
                        <?php $__currentLoopData = $all_phim; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $phimn): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                      	$segment = $phimn->slug_phim;
                      	?>
                        <a href="<?php echo e(url('xem-phim/'.$phimn->slug_phim)); ?>" title="<?php echo e($phimn->episode_name); ?>" class="<?php echo e(Request::segment(2) == $segment ? 'setmemactive':''); ?>"><?php echo e($phimn->episode_name); ?></a>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8">
                    <div class="anime__details__review">
                        <div class="section-title">
                            <h5>Có thể bạn muốn xem</h5>
                        </div>
                        <div class="row">
                        <?php $__currentLoopData = $topphimbo; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $phimcr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <div class="product__item">
                                    <div class="product__item__pic set-bg" data-setbg="<?php echo e(asset('uploads')); ?>/<?php echo e($phimcr->image); ?>">
                                        <div class="ep"><?php echo e($phimcr->status); ?></div>
                                        <div class="comment"><i class="fa fa-comments"></i> 11</div>
                                        <div class="view">
                                            <i class="fa fa-eye"></i> 
                                            <?php if($phimcr->num_view == null ||$phimcr->num_view < 1): ?>
                                                0
                                            <?php else: ?>
                                                <?php echo e($phimcr->num_view); ?>

                                            <?php endif; ?>
                                    </div>
                                    </div>
                                    <div class="product__item__text">
                                        <h5><a href="<?php echo e(url('chi-tiet/'.$phimcr->slug)); ?>"><?php echo e($phimcr->name); ?></a></h5>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
 
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="anime__details__review">
                        <div class="section-title">
                            <h5>Phim xem nhiều</h5>
                        </div>
                        <?php $__currentLoopData = $phimctn; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pxn): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="product__sidebar__comment__item">
                                <div class="product__sidebar__comment__item__pic">
                                    <img src="<?php echo e(asset('uploads')); ?>/<?php echo e($pxn->image); ?>" width="100px" height="130px" alt="">
                                </div>
                                <div class="product__sidebar__comment__item__text">
                                    <ul>
                                        <li><?php echo e($pxn->kieuphim->name); ?></li>
                                        <?php $__currentLoopData = $pxn->nhieutheloai; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <li><?php echo e($t->name); ?></li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                    <h5><a href="<?php echo e(url('chi-tiet/'.$pxn->slug)); ?>"><?php echo e($pxn->name); ?></a></h5>
                                    <span><i class="fa fa-eye"></i>
                                        <?php if($pxn->num_view == null ||$pxn->num_view < 1): ?>
                                            0 Viewes
                                        <?php else: ?>
                                            <?php echo e($pxn->num_view); ?> Viewes
                                        <?php endif; ?>
                                    </span>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/animetvh/domains/animetvh.net/public_html/resources/views/user1/xemphim.blade.php ENDPATH**/ ?>