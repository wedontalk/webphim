<section class="hero">
    <div class="container-fluid">
        <div class="hero__slider owl-carousel">
        <?php $__currentLoopData = $slidephim; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ptoanbo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="hero__items set-bg" data-setbg="<?php echo e(asset('uploads')); ?>/<?php echo e($ptoanbo->image); ?>">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="hero__text">
                            <div class="label"><?php echo e($ptoanbo->status); ?></div>
                            <h2><?php echo \Str::limit($ptoanbo->name, 30, $end='...'); ?></h2>
                            <a href="<?php echo e(url('chi-tiet/'.$ptoanbo->slug)); ?>"><span>Xem ngay</span> <i class="fa fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>
<!--propreller--><?php /**PATH /home/animetvh/domains/animetvh.net/public_html/resources/views/user1/slide.blade.php ENDPATH**/ ?>