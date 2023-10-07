
<?php $__env->startSection('css'); ?>
<style>
    .ds-comment{
        /* padding: 0px 10px; */
        display:flex;
    }
    .ds-comment div{
        padding:0px 10px;
    }
    .ds-comment div button{
        margin:18px 10px;
    }
    .ds-comment div img{
        max-width:50px;
    }
    .row-comment div:first-child{
        border-bottom: 1px solid;
    }
</style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('thongtin'); ?>
<div class="container">
  <div class="row">
    <div class="container">
        <div class="row container">
            <div class="row col-lg-4 col-12 border-right">
                <div class="col-md-12">
                    <div id="thongtin" class="d-flex flex-column align-items-center text-center p-3 py-5">
                        <?php if(Auth::user()->profile_photo_path): ?>
                        <img class="rounded-circle mt-5" width="150px" src="<?php echo e(asset('uploads/profile')); ?>/<?php echo e(Auth::user()->profile_photo_path); ?>">
                        <?php else: ?>
                        <img class="rounded-circle mt-5" width="150px" src="<?php echo e(asset('uploads/logo')); ?>/logoauto1.jpg">
                        <?php endif; ?>
                        <p class="text-black-50"><?php echo e(Auth::user()->email); ?></p>
                    </div>
                </div>
                <div class="col-md-12">
                    <ul class="list-group">
                        <li class="list-group-item active"><a href="<?php echo e(route('thongtincanhan')); ?>">Thông Tin chung</a></li>
                        <li class="list-group-item"><a href="<?php echo e(route('animedaluu')); ?>">Anime đã lưu</a></li>
                        <li class="list-group-item"><a href="">Bình luận của bạn</a></li>
                        <li class="list-group-item"><a href="<?php echo e(route('doimatkhau')); ?>">Đổi mật khẩu</a></li>
                        <li class="list-group-item"><a href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Đăng xuất</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-8 col-12">
                <div class="col-md-12 col-12 box-tutien">
                    <h4><center>- Thông tin chung -</center></h4>
                    <!-- <p>Trạng thái tu tiên</p>
                    <span class="level level-current">Luyện khí</span>
                    <span class="level level-next">Tụ đan</span>
                    <div class="progress">
                        <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                    </div> -->
                    <div class="group-info">
                        <div class="label">
                            Họ và Tên :
                        </div>
                        <div class="detail"><?php echo e(Auth::user()->name); ?></div>
                    </div>
                    <div class="group-info">
                        <div class="label">
                            Email :
                        </div>
                        <div class="detail"><?php echo e(Auth::user()->email); ?></div>
                    </div>
                    <!-- <div class="group-info">
                        <div class="label">
                            Loại Hệ Thống :
                        </div>
                        <div class="detail">Tu tiên</div>
                    </div> -->
                </div>
                <div class="col-md-12 mt-3">
                <h4><center>- Danh sách bình luận -</center></h4>
                </div>
                <div class="col-md-12 mt-3">
                    <?php $__empty_1 = true; $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="alert alert-info" role="alert">
                        <div class="row ds-comment">
                            <div class="col-md-1"><img src="<?php echo e(asset('uploads')); ?>/<?php echo e($dt->idPhim->image); ?>" alt="<?php echo e($dt->idPhim->image); ?>"></div>
                            <div class="col-md-9 row-comment">
                                <div class="col-md-12"><?php echo e($dt->idPhim->name); ?> - <?php echo e($dt->idEpisode->episode_name); ?></div>
                                <div class="col-md-12"><?php echo e($dt->content); ?></div>
                            </div>
                            <div class="col-md-2">
                                <button class="btn btn-danger">Xóa</button>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <div class="alert alert-warning" role="alert">Bạn chưa có bình luận nào cả !</div>
                    <?php endif; ?>
                    <div class="clearfix"></div>
                    <div class="text-align" style="text-align:center">
                        <?php echo e($data->appends(request()->all())->links()); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>
</div>
<div class="clearfix"></div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.thongtin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\webphim\resources\views/user/binhluan.blade.php ENDPATH**/ ?>