<?php $__env->startSection('meta'); ?>
    <title><?php echo e($meta_title); ?> - animetvh</title>
	<meta name="description" content="<?php echo e($meta_desc); ?>">
    <meta name="title" content="<?php echo e($meta_title); ?> - animetvh" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="INDEX,FOLLOW, noodp"/>
    <meta property="og:type" content="website" />
    <meta property="og:title" content="<?php echo e($meta_title); ?> - animetvh" />
    <meta property="og:description" content="<?php echo e($meta_desc); ?>" />
	<meta property="og:description" content="tổng hợp nhiều loại phim hay mà bạn đang mong chờ" />
    <meta property="og:image" content="<?php echo e(asset('user/img/lifelogo1.png')); ?>" />
    <meta property="og:site_name" content="<?php echo e($meta_canontical); ?>" />
    <meta property="og:url" content="<?php echo e($meta_canontical); ?>" />
    <meta property="og:locale" content="vi_VN" />
    <link rel="canonical" href="<?php echo e($meta_canontical); ?>" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="googlebot" content="index,follow" />
    <meta name="BingBOT" content="index,follow" />
    <meta name="yahooBOT" content="index,follow" />
    <meta name="slurp" content="index,follow" />
    <meta name="msnbot" content="index,follow" />
    <meta name="revisit-after" content="1 days">
<!--<script>(function(s,u,z,p){s.src=u,s.setAttribute('data-zone',z),p.appendChild(s);})(document.createElement('script'),'https://inklinkor.com/tag.min.js',5038434,document.body||document.documentElement)</script>-->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('main'); ?>
<?php echo $__env->make('user1.slide', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="./index.html"><i class="fa fa-home"></i> Trang Chủ</a>
                        <a href="./danhmuc.html">Danh Mục</a>
                      <?php if($menu_id): ?>
                        <span><?php echo e($menu_id->name); ?></span>
                      <?php endif; ?>
                    </div>
                </div>
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
                                      <?php if($menu_id): ?>
                                        <h4><?php echo e($menu_id->name); ?></h4>
                                      <?php endif; ?>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-6">
                                    <div class="product__page__filter">
                                        <p>Order by:</p>
                                        <select name="sort" id="sort">
                                            <option value="<?php echo e(Request::url()); ?>?sort_by=kytu_AZ">A-Z</option>
                                            <option value="<?php echo e(Request::url()); ?>?sort_by=kytu_ZA">Z-A</option>
                                            <option value="<?php echo e(Request::url()); ?>?sort_by=sap-xep-xem-nhieu">XEM NHIỀU</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                                <?php
                                $count = count($phimtc)
                                ?>
                                <?php if($count == 0): ?>
                                  <p>phim đang được cập nhật...</p>
                                <?php else: ?>
                        <?php $__currentLoopData = $phimtc; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ptoanbo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
                           <?php endif; ?>
                        </div>
                    </div>
                      <div class="col-sm-12" style="text-align:center"><?php echo e($phimtc->appends(request()->all())->links()); ?></div>
                </div>

                <?php echo $__env->make('user1.topview', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>
</div>
</div>
    </section>
<!--<script>(function(s,u,z,p){s.src=u,s.setAttribute('data-zone',z),p.appendChild(s);})(document.createElement('script'),'https://inklinkor.com/tag.min.js',5038434,document.body||document.documentElement)</script>-->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>

    <script>
        jQuery(document).ready(function($) {
        $('#sort').on('change', function() {
            var url = $(this).val();
            // alert(url);
            if(url){
                window.location = url;
            }
            return false;
        });
        locdanhsach();
        function locdanhsach() {
            var url = window.location.href;
            $('select[name="sort"]').find('option[value="'+url+'"]').attr("selected",true);
        }


    });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/animetvh/domains/animetvh.net/public_html/resources/views/user1/about.blade.php ENDPATH**/ ?>