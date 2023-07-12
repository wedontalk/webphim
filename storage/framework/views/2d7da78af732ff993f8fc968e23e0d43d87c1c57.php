<div class="container">
      <div class="row fullwith-slider">
        <div id="halim-carousel-widget-2xx" class="wrap-slider">
          <div id="halim-carousel-widget-2" class="owl-carousel owl-theme">
            <?php if($showslide): ?>
            <?php $__currentLoopData = $showslide; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $showsl): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <article class="thumb grid-item post-6167">
              <div class="halim-item">
                <a class="halim-thumb" href="<?php echo e(route('chitiet',$showsl->showproduct->slug)); ?>" title="<?php echo e($showsl->showproduct->name); ?>">
                  <figure>
                    <img class="lazy img-responsive" src="<?php echo e(asset('uploads')); ?>/<?php echo e($showsl->showproduct->image); ?>" alt="<?php echo e($showsl->showproduct->name); ?>" title="<?php echo e($showsl->showproduct->name); ?>"></figure>
                    <?php if($showsl->showproduct->phim_noibat == 1): ?>
                    <span class="status">Hot</span>
                    <?php elseif($showsl->showproduct->phim_noibat == 2): ?>
                    <span class="status">Anime mới</span>
                    <?php elseif($showsl->showproduct->phim_noibat == 3): ?>
                    <span class="status">Xem nhiều</span>
                    <?php endif; ?>
                    <span class="is_trailer"><?php echo e($showsl->showproduct->ngaycapnhat->diffForHumans()); ?></span>
                    <?php if(isset($showsl->showslidechapter->first()->name_chapter)): ?>
                    <span class="episode"><?php echo e($showsl->showslidechapter->first()->name_chapter); ?></span>
                    <?php endif; ?>
                    <div class="icon_overlay"></div>
                    <div class="halim-post-title-box">
                      <div class="halim-post-title ">
                        <h2 class="entry-title"><?php echo e($showsl->showproduct->name); ?></h2>
                        <p class="original_title"><?php echo e($showsl->showproduct->name2); ?></p>
                      </div>
                    </div>
                </a>
              </div>
            </article>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
          </div>
          <script>jQuery(document).ready(function($) {				
                  var owl = $('#halim-carousel-widget-2');
                  owl.owlCarousel({
                    loop: true,
                    margin: 4,
                    autoplay: true,
                    autoplayTimeout: 4000,
                    autoplayHoverPause: true,
                    nav: true,
                    navText: ['<i class="hl-down-open rotate-left"></i>', '<i class="hl-down-open rotate-right"></i>'],
                    responsiveClass: true,
                    responsive: {0: {items:2},480: {items:3}, 600: {items:4},1000: {items: 6}}})});
          </script>
        </div>
      </div>
    </div><?php /**PATH C:\xampp\htdocs\webphim\resources\views/user/slide.blade.php ENDPATH**/ ?>