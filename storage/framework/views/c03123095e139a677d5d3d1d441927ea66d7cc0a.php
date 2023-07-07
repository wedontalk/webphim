<div class="col-lg-8">
    <div class="header__nav">
        <nav class="header__menu mobile-menu">
            <ul>
                <li class="active"><a href="<?php echo e(route('home.index')); ?>">Trang Chủ</a></li>
                <li><a href="#">Danh mục <span class="arrow_carrot-down"></span></a>
                    <ul class="dropdown">
                    <?php if($menu): ?>
                    <?php $__currentLoopData = $menu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mn): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><a href="<?php echo e(url('the-loai/'.$mn->slug)); ?>"><?php echo e($mn->name); ?></a></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                    </ul>
                </li>
                <li><a href="#">Quốc gia <span class="arrow_carrot-down"></span></a>
                    <ul class="dropdown">
                    <?php if($menuqg): ?>
                    <?php $__currentLoopData = $menuqg; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $qg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><a href="<?php echo e(url('quoc-gia/'.$qg->slug)); ?>"><?php echo e($qg->name); ?></a></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                    </ul>
                </li>
                <li><a href="<?php echo e(url('phim-le/phim-le.html')); ?>">Phim lẻ</a>
                </li>
                <li><a href="<?php echo e(url('phim-bo/phim-bo.html')); ?>">Phim bộ</a>
                </li>
                <li><a href="<?php echo e(url('phim-chieu-rap/phim-chieu-rap.html')); ?>">Phim chiếu rạp</a>
                </li>
            </ul>
        </nav>
    </div>
</div><?php /**PATH C:\xampp\htdocs\webphim\resources\views/user1/menu.blade.php ENDPATH**/ ?>