<div class="navbar-container">
  <div class="container">
    <nav class="navbar halim-navbar main-navigation" role="navigation" data-dropdown-hover="1">
      <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed pull-left" data-toggle="collapse" data-target="#halim" aria-expanded="false">
        <span class="sr-only">Menu</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <button type="button" class="navbar-toggle collapsed pull-right" data-toggle="collapse" data-target="#user-info" aria-expanded="false">
        <span class="hl-dot-3 rotate" aria-hidden="true"></span>
      </button>
      <button type="button" class="navbar-toggle collapsed pull-right expand-search-form" data-toggle="collapse" data-target="#search-form" aria-expanded="false">
        <span class="hl-search" aria-hidden="true"></span>
      </button>
      <!-- <button type="button" class="navbar-toggle collapsed pull-right get-bookmark-on-mobile">
        <i class="hl-bookmark" aria-hidden="true"></i>
        <span class="count">0</span>
      </button> -->
        </div>
        <div class="collapse navbar-collapse" id="halim">
        <div class="menu-main-container">
            <ul id="menu-main" class="nav navbar-nav navbar-left">
            <li>
                <a title="Home" href="<?php echo e(route('home.index')); ?>">Trang chủ</a>
            </li>
            <li class=" dropdown">
                <a title="Anime" href="#" data-toggle="dropdown" class="dropdown-toggle" aria-haspopup="true">Thể loại <span class="caret"></span></a>
                <ul role="menu" class=" dropdown-menu">
                <?php if($showcategory): ?>
                    <?php $__currentLoopData = $showcategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $showcate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li>
                            <a href="<?php echo e(url('the-loai/'.$showcate->slug)); ?>" title="<?php echo e($showcate->name); ?>"><?php echo e($showcate->name); ?></a>
                        </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
                </ul>
            </li>
            <li class=" dropdown">
                <a title="Trạng Thái" href="#" data-toggle="dropdown" class="dropdown-toggle" aria-haspopup="true">Trạng Thái <span class="caret"></span></a>
                <ul role="menu" class="dropdown-menu" style="columns: 2 !important;">
                <?php if($showstatus): ?>
                    <?php $__currentLoopData = $showstatus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $showst): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li>
                            <a href="<?php echo e(route('trangthai', $showst->slug)); ?>" title="<?php echo e($showst->name); ?>"><?php echo e($showst->name); ?></a>
                        </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
                </ul>
            </li>
            <?php if($showkieuphim): ?>
                <?php $__currentLoopData = $showkieuphim; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $showkp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li>
                    <a href="<?php echo e(route('kieuphim', $showkp->slug_type)); ?>" title="<?php echo e($showkp->name); ?>"><?php echo e($showkp->name); ?></a>
                </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
            <li>
                <a href="<?php echo e(url('/anime-hot')); ?>" title="Anime Hot">Anime Hot</a>
            </li>
            <li>
                <a href="<?php echo e(url('/anime-xem-nhieu')); ?>" title="Xem nhiều">Xem nhiều</a>
            </li>
            <li>
                <a href="<?php echo e(url('/tim-anime')); ?>" title="Tìm anime">Tìm Kiếm Anime</a>
            </li>
            </ul>
        </div>
        </div>
    </nav>
    <div class="collapse navbar-collapse" id="search-form">
        <div id="mobile-search-form" class="halim-search-form">
            <ul class="ui-autocomplete ajax-results" id="result" style="display: none;"></ul>
        </div>
    </div>
    <div class="collapse navbar-collapse" id="user-info">
        <?php if(Route::has('login')): ?>
        <?php if(auth()->guard()->check()): ?>
        <?php if(Auth::user()->role == 1): ?>
        <div id="mobile-user-login">
            <center><i class="hl-user"></i> Chức năng <i class="hl-user"></i></center>
        <ul class="halim-bookmark-lists">
            <li class="bookmark-list"><a href="<?php echo e(route('admin.dashboard')); ?>" style="color:#db7b17">Truy cập quản trị</a></li>
            <li class="bookmark-list"><a href="<?php echo e(route('thongtincanhan')); ?>" style="color:#db7b17">Thông tin cá nhân</a></li>
            <li class="bookmark-list"><a href="<?php echo e(route('animedaluu')); ?>" style="color:#db7b17">Anime đã lưu</a></li>
            <li class="bookmark-list"><a href="" style="color:#db7b17">Lịch sử đã xem</a></li>
            <li class="bookmark-list"><a href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Đăng xuất</a></li>
            <form action="<?php echo e(route('logout')); ?>" method="post" id="logout-form" style="display:none">
                <?php echo csrf_field(); ?>
            </form>
        </ul>
        </div>
        <?php else: ?>
        <div id="mobile-user-login">
            <center><i class="hl-user"></i> Chức năng <i class="hl-user"></i></center>
        <ul class="halim-bookmark-lists">
            <li class="bookmark-list"><a href="<?php echo e(route('thongtincanhan')); ?>" style="color:#db7b17">Thông tin cá nhân</a></li>
            <li class="bookmark-list"><a href="<?php echo e(route('animedaluu')); ?>" style="color:#db7b17">Anime đã lưu</a></li>
            <li class="bookmark-list"><a href="" style="color:#db7b17">Lịch sử đã xem</a></li>
            <li class="bookmark-list"><a href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Đăng xuất</a></li>
            <form action="<?php echo e(route('logout')); ?>" method="post" id="logout-form" style="display:none">
                <?php echo csrf_field(); ?>
            </form>
        </ul>
        </div>
        <?php endif; ?>
        <?php else: ?>
        <ul class="halim-bookmark-lists">
            <li class="bookmark-list"><a href="<?php echo e(route('login')); ?>" style="color:#fff">Đăng Nhập</a></li>
            <li class="bookmark-list"><a href="<?php echo e(route('register')); ?>" style="color:#fff">Đăng ký</a></li>
        </ul>
        <?php endif; ?>
        <?php endif; ?>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\webphim\resources\views/user/menu.blade.php ENDPATH**/ ?>