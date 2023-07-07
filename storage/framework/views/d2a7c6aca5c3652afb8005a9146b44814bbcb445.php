<?php $__env->startSection('meta'); ?>
    <title><?php echo e($meta_title); ?> - animetvh</title>
	<meta name="description" content="<?php echo e($meta_desc); ?>">
    <meta name="keywords" content="<?php echo e($meta_keyword); ?>">
    <meta name="title" content="<?php echo e($meta_title); ?> - animetvh" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="INDEX,FOLLOW, noodp"/>
    <meta property="og:type" content="website" />
    <meta property="og:title" content="<?php echo e($meta_title); ?> - animetvh" />
    <meta property="og:description" content="<?php echo e($meta_desc); ?> - animetvh" />
    <meta property="og:image" content="<?php echo e(asset('user/img/lifelogo1.png')); ?>" />
    <meta property="og:site_name" content="<?php echo e($meta_canontical); ?>" />
    <meta property="og:url" content="<?php echo e($meta_canontical); ?>" />
    <meta property="og:locale" content="vi_VN" />
    <link rel="canonical" href="<?php echo e($meta_canontical); ?>" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
<!-- <script>(function(s,u,z,p){s.src=u,s.setAttribute('data-zone',z),p.appendChild(s);})(document.createElement('script'),'https://inklinkor.com/tag.min.js',5038434,document.body||document.documentElement)</script> -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('main'); ?>
<?php echo $__env->make('user1.slide', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <!-- <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="<?php echo e(route('home.index')); ?>"><i class="fa fa-home"></i> Home</a>
                        <a href="./categories.html"></a>
                        <span>Romance</span>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Product Section Begin -->
    <section class="product-page spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="product__page__content">
                        <div class="product__page__title">
                            <div class="row">
                                <div class="col-lg-8 col-md-8 col-sm-6">
                                    <div class="section-title">
                                        <h4>Tìm thấy <?php echo e(count($product)); ?> phim</h4>
                                    </div>
                                </div>
                                <!-- <div class="col-lg-4 col-md-4 col-sm-6">
                                    <div class="product__page__filter">
                                        <p>Order by:</p>
                                        <select>
                                            <option value="">A-Z</option>
                                            <option value="">1-10</option>
                                            <option value="">10-50</option>
                                        </select>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                        <div class="row">
                        <?php $__currentLoopData = $product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ptoanbo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <div class="product__item">
                                <a href="<?php echo e(url('chi-tiet/'.$ptoanbo->slug)); ?>">
                                    <div class="product__item__pic set-bg" data-setbg="<?php echo e(asset('uploads')); ?>/<?php echo e($ptoanbo->image); ?>">
                                        <div class="ep"><?php echo e($ptoanbo->status); ?></div>
                                        <div class="comment"><i class="fa fa-comments"></i> 11</div>
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
                    <div class="col-sm-12" style="text-align:center"><?php echo e($product->appends(request()->all())->links()); ?></div>
                </div>

                <?php echo $__env->make('user1.topview', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>
</div>
</div>
    </section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/animetvh/domains/animetvh.net/public_html/resources/views/user1/search.blade.php ENDPATH**/ ?>