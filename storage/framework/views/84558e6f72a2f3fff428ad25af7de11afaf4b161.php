<?php $__env->startSection('meta'); ?>
    <title><?php echo e($meta_title); ?></title>
	<meta name="description" content="<?php echo e($meta_desc); ?>">
    <link rel="canonical" href="<?php echo e($meta_canontical); ?>" />
    <meta name="title" content="<?php echo e($meta_title); ?>" />
    <meta name="keywords" content="<?php echo e($meta_keyword); ?>" />
	<link rel="icon" href="<?php echo e(asset('user/img/lifelogo1.png')); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta property="og:type" content="website" />
    <meta property="og:title" content="<?php echo e($meta_title); ?>" />
    <meta property="og:description" content="<?php echo e($meta_desc); ?>" />
    <meta property="og:image" content="<?php echo e(asset('user/img/lifelogo1.png')); ?>" />
    <meta property="og:site_name" content="<?php echo e($meta_canontical); ?>" />
    <meta property="og:url" content="<?php echo e($meta_canontical); ?>" />
    <meta property="og:locale" content="vi_VN" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="robots" content="INDEX,FOLLOW, noodp"/>
<!--<script>(function(s,u,z,p){s.src=u,s.setAttribute('data-zone',z),p.appendChild(s);})(document.createElement('script'),'https://inklinkor.com/tag.min.js',5038434,document.body||document.documentElement)</script>-->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('main'); ?>
<?php echo $__env->make('user1.slide', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="trending__product">
                        <div class="row">
                            <div class="col-lg-8 col-md-8 col-sm-8">
                                <div class="section-title">
                                    <h4>Mới cập nhật</h4>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4">
                                <div class="btn__all">
                                    <a href="<?php echo e(route('danhmuc')); ?>" class="primary-btn">View All <span class="arrow_right"></span></a>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <?php $__currentLoopData = $tcphim; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ptoanbo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <div class="product__item">
                                    <a href="<?php echo e(url('chi-tiet/'.$ptoanbo->slug)); ?>">
                                        <div class="product__item__pic set-bg" data-setbg="<?php echo e(asset('uploads')); ?>/<?php echo e($ptoanbo->image); ?>" alt="<?php echo e($ptoanbo->name); ?>">
                                            <div class="ep"><?php echo e($ptoanbo->status); ?></div>
                                            <!-- <div class="comment"><i class="fa fa-comments"></i> 11</div> -->
                                            <div class="view">
                                                <i class="fa fa-eye"></i>
                                                <?php if($ptoanbo->num_view == null ||$ptoanbo->num_view < 1): ?>
                                                    0
                                                <?php else: ?>
                                                    <?php echo e($ptoanbo->num_view); ?>

                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </a>
                                    <div class="product__item__text">
                                        <h5><a href="<?php echo e(url('chi-tiet/'.$ptoanbo->slug)); ?>"><?php echo e($ptoanbo->name); ?></a></h5>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                    <div class="popular__product">
                        <div class="row">
                            <div class="col-lg-8 col-md-8 col-sm-8">
                                <div class="section-title">
                                    <h4>Được xem nhiều</h4>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4">
                                <div class="btn__all">
                                    <a href="<?php echo e(route('danhmuc')); ?>" class="primary-btn">View All <span class="arrow_right"></span></a>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                        <?php $__currentLoopData = $xnphim; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $phimxn): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <div class="product__item">
                                    <a href="<?php echo e(url('chi-tiet/'.$phimxn->slug)); ?>">
                                        <div class="product__item__pic set-bg" data-setbg="<?php echo e(asset('uploads')); ?>/<?php echo e($phimxn->image); ?>" alt="<?php echo e($phimxn->name); ?>">
                                            <div class="ep"><?php echo e($phimxn->status); ?></div>
                                            <!-- <div class="comment"><i class="fa fa-comments"></i> 11</div> -->
                                            <div class="view">
                                                <i class="fa fa-eye"></i>
                                                <?php if($phimxn->num_view == null ||$phimxn->num_view < 1): ?>
                                                    0
                                                <?php else: ?>
                                                    <?php echo e($phimxn->num_view); ?>

                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </a>
                                    <div class="product__item__text">
                                        <h5><a href="<?php echo e(url('chi-tiet/'.$phimxn->slug)); ?>"><?php echo e($phimxn->name); ?></a></h5>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                      
                      
                   <div class="popular__product">
                        <div class="row">
                            <div class="col-lg-8 col-md-8 col-sm-8">
                                <div class="section-title">
                                    <h4>Trung Quốc</h4>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4">
                                <div class="btn__all">
                                    <a href="<?php echo e(url('quoc-gia/trung-quoc.html')); ?>" class="primary-btn">View All <span class="arrow_right"></span></a>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                        <?php $__currentLoopData = $phimtrungquoc; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $trungquoc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <div class="product__item">
                                    <a href="<?php echo e(url('chi-tiet/'.$trungquoc->slug)); ?>">
                                        <div class="product__item__pic set-bg" data-setbg="<?php echo e(asset('uploads')); ?>/<?php echo e($trungquoc->image); ?>" alt="<?php echo e($trungquoc->name); ?>">
                                            <div class="ep"><?php echo e($trungquoc->status); ?></div>
                                            <!-- <div class="comment"><i class="fa fa-comments"></i> 11</div> -->
                                            <div class="view">
                                                <i class="fa fa-eye"></i>
                                                <?php if($trungquoc->num_view == null ||$trungquoc->num_view < 1): ?>
                                                    0
                                                <?php else: ?>
                                                    <?php echo e($trungquoc->num_view); ?>

                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </a>
                                    <div class="product__item__text">
                                        <h5><a href="<?php echo e(url('chi-tiet/'.$trungquoc->slug)); ?>"><?php echo e($trungquoc->name); ?></a></h5>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                
                </div>
                <?php echo $__env->make('user1.topview', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>
</div>
</div>
</section>
  <p style="display:none"><?php echo e($meta_desc); ?></p>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/animetvh/domains/animetvh.net/public_html/resources/views/user1/home.blade.php ENDPATH**/ ?>