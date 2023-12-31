<?php if($paginator->hasPages()): ?>
    <div class="text-center">
        <ul class="page-numbers">
            
            <?php if($paginator->onFirstPage()): ?>
                <!-- <li class="disabled" aria-disabled="true" aria-label="<?php echo app('translator')->get('pagination.previous'); ?>">
                    <span aria-hidden="true">&lsaquo;</span>
                </li> -->
                <!-- <li>
                    <a class="next page-numbers disabled" aria-disabled="true" aria-label="<?php echo app('translator')->get('pagination.previous'); ?>">
                        <i class="hl-down-open rotate-left"></i>
                    </a>
                </li> -->
            <?php else: ?>
                <li>
                    <a href="<?php echo e($paginator->previousPageUrl()); ?>" rel="prev" aria-label="<?php echo app('translator')->get('pagination.previous'); ?>">
                        <i class="hl-down-open rotate-left"></i>
                    </a>
                </li>
                <!-- <li>
                    <a href="<?php echo e($paginator->previousPageUrl()); ?>" rel="prev" aria-label="<?php echo app('translator')->get('pagination.previous'); ?>" style="background:">&lsaquo;</a>
                </li> -->
            <?php endif; ?>

            
            <?php $__currentLoopData = $elements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                
                <?php if(is_string($element)): ?>
                    <li class="disabled page-numbers current" aria-disabled="true"><span><?php echo e($element); ?></span></li>
                <?php endif; ?>

                
                <?php if(is_array($element)): ?>
                    <?php $__currentLoopData = $element; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page => $url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($page == $paginator->currentPage()): ?>
                            <li class="active" aria-current="page"><span class="page-numbers current"><?php echo e($page); ?></span></li>
                        <?php else: ?>
                            <li><a href="<?php echo e($url); ?>" class=""><?php echo e($page); ?></a></li>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            
            <?php if($paginator->hasMorePages()): ?>
                <!-- <li class="next page-numbers">
                    <a href="<?php echo e($paginator->nextPageUrl()); ?>" rel="next" aria-label="<?php echo app('translator')->get('pagination.next'); ?>">&rsaquo;</a>
                </li> -->
                <li class="next page-numbers">
                    <a href="<?php echo e($paginator->nextPageUrl()); ?>" rel="next" aria-label="<?php echo app('translator')->get('pagination.next'); ?>">
                        <i class="hl-down-open rotate-right"></i>
                    </a>
                </li>
            <?php else: ?>
                <!-- <li class="disabled" aria-disabled="true" aria-label="<?php echo app('translator')->get('pagination.next'); ?>">
                    <span aria-hidden="true">&rsaquo;</span>
                </li> -->
                <!-- <li>
                    <a class="next page-numbers disabled" aria-disabled="true" aria-label="<?php echo app('translator')->get('pagination.next'); ?>">
                        <i class="hl-down-open rotate-right"></i>
                    </a>
                </li> -->
            <?php endif; ?>
            </ul>
        </div>
<?php endif; ?><?php /**PATH C:\xampp\htdocs\webphim\resources\views/user/in-paginate.blade.php ENDPATH**/ ?>