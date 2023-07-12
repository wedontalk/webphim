
<?php $__env->startSection('js'); ?>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('main'); ?>
<div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            <div class="page-heading">
                <h3>Chào mừng bạn đến với admin</h3>
            </div>
            <div class="page-content">
                <section class="row">
                    <div class="col-12 col-lg-9">
                        <div class="row">
                            <div class="col-6 col-lg-4 col-md-6">
                                <div class="card">
                                    <div class="card-body px-3 py-4-5">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="stats-icon purple">
                                                    <i class="iconly-boldShow"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <h6 class="text-muted font-semibold">Click Quảng Cáo</h6>
                                                <h6 class="font-extrabold mb-0">100</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="col-6 col-lg-4 col-md-6">
                                <div class="card">
                                    <div class="card-body px-3 py-4-5">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="stats-icon blue">
                                                    <i class="iconly-boldProfile"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <h6 class="text-muted font-semibold">Followers</h6>
                                                <h6 class="font-extrabold mb-0">183.000</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                            <div class="col-6 col-lg-4 col-md-6">
                                <div class="card">
                                    <div class="card-body px-3 py-4-5">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="stats-icon green">
                                                    <i class="iconly-boldAdd-User"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <h6 class="text-muted font-semibold"></h6>
                                                <h6 class="font-extrabold mb-0">12</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-lg-4 col-md-6">
                                <div class="card">
                                    <div class="card-body px-3 py-4-5">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="stats-icon red">
                                                    <i class="iconly-boldBookmark"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <h6 class="text-muted font-semibold">Tổng Anime</h6>
                                                <h6 class="font-extrabold mb-0">233</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Tìm Phim</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group position-relative has-icon-left">
                                            <input id="search" type="text" class="form-control" placeholder="Nhập Name Phim...">
                                            <div class="form-control-icon">
                                                <i class="bi bi-search"></i>
                                            </div>
                                        </div>
                                        <table class="table table-striped table-dark mb-0">
                                            <thead>
                                                <tr>
                                                    <th>Tên Phim</th>
                                                    <th>Tên Phim 2</th>
                                                    <th>Đường Dẫn</th>
                                                    <th>HÌNH ẢNH</th>
                                                    <th>ACTION</th>
                                                </tr>
                                            </thead>
                                            <tbody id="hidden-ajax"></tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-3">
                        <div class="card">
                            <div class="card-body py-4 px-5">
                                <div class="d-flex align-items-center">
                                    <div class="avatar avatar-xl">
                                        <img src="assets/images/faces/1.jpg" alt="Face 1">
                                    </div>
                                    <?php if(Route::has('login')): ?>
                                    <div class="ms-3 name">
                                        <h5 class="font-bold"><?php echo e(Auth::user()->name); ?></h5>
                                        <h6 class="text-muted mb-0">
                                            <a href="<?php echo e(route('logout')); ?>" title="Đăng xuất" 
                                            onclick="event.preventDefault(); 
                                            document.getElementById('logout-form').submit();"
                                            >Đăng xuất</a>
                                        </h6>
                                        <form action="<?php echo e(route('logout')); ?>" method="post" id="logout-form">
                                                <?php echo csrf_field(); ?>
                                        </form>
                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h4>Tổng Truy Cập Website</h4>
                            </div>
                            <div class="card-body">
                                <ul class="list-group">
                                    <li class="list-group-item d-flex justify-content-between align-items-center active">
                                        <span>Đang Online </span>
                                        <span class="badge bg-dark badge-pill badge-round ml-1"><?php echo e(number_format($traffic_count)); ?></span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <span>Tháng Vừa Qua </span>
                                        <span class="badge badge-pill bg-warning badge-round ml-1"><?php echo e(number_format($traffic_of_last_month_count)); ?></span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <span>Tổng Năm</span>
                                        <span class="badge badge-pill bg-info badge-round ml-1"><?php echo e(number_format($traffic_year_count)); ?></span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <span>Tổng Truy Cập</span>
                                        <span class="badge badge-pill bg-danger badge-round ml-1"><?php echo e(number_format($count_total_traffic)); ?></span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <div class="row">
                            <div class="col-12 col-xl-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Lỗi Phim Ngày Hôm Nay</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-hover table-lg">
                                                <thead>
                                                    <tr>
                                                        <th>Tên Phim</th>
                                                        <th>Tập Phim</th>
                                                        <th>Mô Tả Lỗi</th>
                                                        <th>Ngày Báo Cáo</th>
                                                        <th>Trạng Thái</th>
                                                        <th>Hành Động</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <tr>
                                                        <td class="col-3">
                                                            <div class="d-flex align-items-center">
                                                                <p class="font-bold ms-3 mb-0"><?php echo e($dt->idfilm->name); ?></p>
                                                            </div>
                                                        </td>
                                                        <td class="col-auto">
                                                            <p class=" mb-0"><?php echo e($dt->idepisodeandserver->episode_name); ?></p>
                                                        </td>
                                                        <td><?php echo e($dt->description); ?></td>
                                                        <td><?php echo e($dt->created_at->diffForHumans()); ?></td>
                                                        <td><?php if($dt->cap_nhat == 1): ?>
                                                            <span class="badge bg-danger form-control">chưa xử lý</span>
                                                            <?php else: ?>
                                                            <span class="badge bg-success form-control">đã xử lý</span>
                                                            <?php endif; ?>
                                                        </td>
                                                        <td><a href="<?php echo e(route('phim.show',$dt->id_film)); ?>" class="btn btn-primary">Chỉnh Sửa</a></td>
                                                    </tr>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
            <footer>
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-start">
                        <p>2021 &copy; Mazer</p>
                    </div>
                    <div class="float-end">
                        <p>Thiết kế bởi <span class="text-danger"><i class="bi bi-heart"></i></span> <a
                                href="https://www.facebook.com/khanhduy9901">khánh duy nè</a></p>
                    </div>
                </div>
            </footer>
        </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\webphim\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>