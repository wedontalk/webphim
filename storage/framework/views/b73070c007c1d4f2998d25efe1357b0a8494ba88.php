<style>
    .linkview{
        padding-left:2px;
        padding-right:2px;
        font-family:sans-serif;
        font-size: 15px;
        border:none;
        
    }
    .linkview.active{
        background-color:none !important;
    }
</style>
<div class="col-lg-4 col-md-6 col-sm-8">
                    <div class="product__sidebar">
                        <div class="product__sidebar__view">
                            <div class="section-title">
                                <h5>Top Views</h5>
                            </div>
                            <ul class="nav nav-tabs filter__controls" id="myTab" role="tablist">
                                <li class="nav-item"><a class="nav-link active linkview" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Tuần</a></li>
                                <li class="nav-item"><a class="nav-link linkview" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Tháng</a></li>
                                <li class="nav-item"><a class="nav-link linkview" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Năm</a></li>
                            </ul>
                            <div class="tab-content mb-4">
                                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <?php $__currentLoopData = $pweeks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pweek): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="product__sidebar__view__item set-bg mix week" data-setbg="<?php echo e(asset('uploads')); ?>/<?php echo e($pweek->image); ?>">
                                        <div class="ep"><?php echo e($pweek->status); ?></div>
                                        <div class="view">
                                        <i class="fa fa-eye"></i>
                                        <?php if($pweek->num_view == null ||$pweek->num_view < 1): ?>
                                            0
                                        <?php else: ?>
                                            <?php echo e($pweek->num_view); ?>

                                        <?php endif; ?>
                                        </div>
                                        <h5><a href="<?php echo e(url('chi-tiet/'.$pweek->slug)); ?>"><?php echo e($pweek->name); ?></a></h5>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <?php $__currentLoopData = $pmonths; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pmonth): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="product__sidebar__view__item set-bg mix month" data-setbg="<?php echo e(asset('uploads')); ?>/<?php echo e($pmonth->image); ?>">
                                        <div class="ep"><?php echo e($pmonth->status); ?></div>
                                        <div class="view">
                                        <i class="fa fa-eye"></i>
                                        <?php if($pmonth->num_view == null ||$pmonth->num_view < 1): ?>
                                            0
                                        <?php else: ?>
                                            <?php echo e($pmonth->num_view); ?>

                                        <?php endif; ?>
                                        </div>
                                        <h5><a href="<?php echo e(url('chi-tiet/'.$pmonth->slug)); ?>"><?php echo e($pmonth->name); ?></a></h5>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                                <div class="tab-pane fade filter__gallery" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                                <?php $__currentLoopData = $pyears; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pyear): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="product__sidebar__view__item set-bg mix years" data-setbg="<?php echo e(asset('uploads')); ?>/<?php echo e($pyear->image); ?>">
                                        <div class="ep"><?php echo e($pyear->status); ?></div>
                                        <div class="view">
                                        <i class="fa fa-eye"></i>
                                        <?php if($pyear->num_view == null ||$pyear->num_view < 1): ?>
                                            0
                                        <?php else: ?>
                                            <?php echo e($pyear->num_view); ?>

                                        <?php endif; ?>
                                        </div>
                                        <h5><a href="<?php echo e(url('chi-tiet/'.$pyear->slug)); ?>"><?php echo e($pyear->name); ?></a></h5>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
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
               
                              
                          <?php /**PATH /home/animetvh/domains/animetvh.net/public_html/resources/views/user1/topview.blade.php ENDPATH**/ ?>