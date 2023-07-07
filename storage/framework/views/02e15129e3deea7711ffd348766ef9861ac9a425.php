
<?php $__env->startSection('js'); ?>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script>
    jQuery(document).ready(function($) {
        var colorDanger = "#FF1744";
          var donut = Morris.Donut({
            element: 'donut',
            resize: true,
            colors: [
                '#5ddab4',
                '#9694ff',
                '#80DEEA',
                '#4DD0E1',
                '#00ACC1',
                '#0097A7',
                '#00838F',
                '#006064'
            ],
            //labelColor:"#cccccc", // text color
            //backgroundColor: '#333333', // border color
            data: [
                {label:"phim", value:1},
                {label:"danh mục", value:2},
                {label:"Quốc gia", value:3},
            ]
        });
    });
</script>
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
                                                <h6 class="text-muted font-semibold">Tổng comment</h6>
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
                                                <h6 class="text-muted font-semibold">Tổng user</h6>
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
                                                <h6 class="text-muted font-semibold">Tổng Phim</h6>
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
                                        <h4>lượt xem video</h4>
                                    </div>
                                    <!-- test -->
                                    <form autocomplete="off" class="card-body">
                                        <?php echo csrf_field(); ?>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <p>Từ ngày<input type="text" id="datepicker" class="form-control"></p>
                                            <input type="button" id="btn-dashboard-filter" class="btn btn-info btn-sm" value="lọc kết quả">
                                        </div>
                                        <div class="col-md-3">
                                            <p>Đến ngày <input type="text" id="datepicker2" class="form-control"></p>
                                        </div>
                                        <div class="col-md-3">
                                            <p>Lọc theo
                                                <select class="dashboard-filter form-select mr-sm-2" id="inlineFormCustomSelect">
                                                    <option>-- chọn --</option>
                                                    <option value="7ngay">7 ngày qua</option>
                                                    <option value="thangtruoc">Tháng trước</option>
                                                    <option value="thangnay">Tháng này</option>
                                                    <option value="365ngayqua">365 ngày</option>
                                                </select>
                                            </p>
                                        </div>
                                    </div>
                                    </form>
                                    <!-- test -->
                                    <div class="card-body">
                                        <!-- <div id="chart-profile-visit"></div> -->
                                        <div id="myfirstchart" style="height:250px;"></div>
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
                                <h4>Phân tích tổng hợp</h4>
                            </div>
                            <div class="card-body">
                                <div id="donut" class="morris-donut-inverse"></div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <div class="row">
                            <div class="col-12 col-xl-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Comment bị báo cáo</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-hover table-lg">
                                                <thead>
                                                    <tr>
                                                        <th>Name</th>
                                                        <th>Comment</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    
                                                    <tr>
                                                        <td class="col-3">
                                                            <div class="d-flex align-items-center">
                                                                <div class="avatar avatar-md">
                                                                    <img src="assets/images/faces/5.jpg">
                                                                </div>
                                                                <p class="font-bold ms-3 mb-0">admin</p>
                                                            </div>
                                                        </td>
                                                        <td class="col-auto">
                                                            <p class=" mb-0">123</p>
                                                        </td>
                                                    </tr>
                                                    
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

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\animetvh\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>