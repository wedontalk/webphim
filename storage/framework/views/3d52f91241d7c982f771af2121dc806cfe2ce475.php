<aside id="sidebar" class="col-xs-12 col-sm-12 col-md-4">
  <div class="col-12" style="display:flex; justify-content:center">
    <a href="">
      <img src="<?php echo e(asset('wp-content/uploads/banner_theloai.png')); ?>" alt="">
    </a>
  </div>
  <div id="nav_menu-2" class="widget widget_nav_menu">
    <h4 class="widget-title">Thể Loại</h4>
    <div class="menu-the-loai-container">
      <ul id="menu-the-loai" class="menu">
      <?php if($showcategory): ?>
          <?php $__currentLoopData = $showcategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $showcate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li>
          <a href="<?php echo e(url('the-loai/'.$showcate->slug)); ?>"><?php echo e($showcate->name); ?></a>
        </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      <?php endif; ?>
      </ul>
    </div>
  </div>
</aside><?php /**PATH C:\xampp\htdocs\animetvh\resources\views/user/theloaimain.blade.php ENDPATH**/ ?>