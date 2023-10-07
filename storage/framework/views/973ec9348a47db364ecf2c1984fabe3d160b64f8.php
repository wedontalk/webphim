
<?php $__env->startSection('thongtin'); ?>
<div class="container">
    <div class="row">
      <div class="col-12" style="text-align: center"></div>
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
                          <li class="list-group-item"><a href="<?php echo e(route('binhluanshow')); ?>">Bình luận của bạn</a></li>
                          <li class="list-group-item"><a href="<?php echo e(route('doimatkhau')); ?>">Đổi mật khẩu</a></li>
                          <li class="list-group-item"><a href="">Đăng xuất</a></li>
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
                  <h4><center>- Thông báo Từ Admin -</center></h4>
                  </div>
                  <div class="col-md-12 col-12 mt-3 box-thongbao">
                      <div class="col-12">
                          <?php $__currentLoopData = $thongbao; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tb): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php echo $tb->text_thongbao; ?>

                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </div>
                  </div>
              </div>
          </div>
      </div>
    </div>
</div>
<div class="clearfix"></div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.thongtin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\webphim\resources\views/user/thongtincanhan.blade.php ENDPATH**/ ?>