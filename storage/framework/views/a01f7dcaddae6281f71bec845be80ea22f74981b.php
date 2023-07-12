
<?php $__env->startSection('css'); ?>
<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>
<link rel="stylesheet" href="<?php echo e(asset('assets/vendors/summernote/summernote-lite.min.css')); ?>">

<style>
    .label-info{
        background: linear-gradient(to right, #4b79a1, #283e51);
    }
    .bootstrap-tagsinput{
        width: 100%;
        padding: 10px;
    }
    .bootstrap-tagsinput .tag{
        border-radius:5px;
        padding:3px 5px 3px 5px;
    }
</style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('main'); ?>
<div id="main">
    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>
    <section class="section">
        <div class="page-heading">
            <div class="page-title">
                <div class="row">
                    <div class="col-12 col-md-6 order-md-1 order-last">
                        <h3>Quản lý cấu Hình</h3>
                            <p class="text-subtitle text-muted">quản lí logo, footer...
                        </p>
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Quản lý cấu hình</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="row match-height">
                    <div class="col-md-6 col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Logo header</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <form class="form form-horizontal" action="<?php echo e(route('logoheader')); ?>" method="post" role="form" enctype="multipart/form-data">
                                        <?php echo csrf_field(); ?> <?php echo method_field('put'); ?>
                                        <div class="form-body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <p>logo header hiện tại</p>
                                                    <?php $__currentLoopData = $data_logo_header; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <img src="<?php echo e(asset('uploads/logo')); ?>/<?php echo e($dt->logo_header); ?>" alt="" width="100%">
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <hr>
                                                    <img id="show_img" src="" alt="" width="100%"  style="display:none;">
                                                </div>
                                                <div class="col-md-3">
                                                    <label>chọn image</label>
                                                </div>
                                                <div class="input-group col-md-9 mb-3">
                                                    <input type="file" onchange="onFileSelected()" id="image" name="image" value="" class="form-control" placeholder="thêm hình ảnh">
                                                </div>
                                                <div class="col-sm-12 d-flex justify-content-end">
                                                    <button type="submit" id="clicklogoheader" class="btn btn-primary me-1 mb-1">Submit</button>
                                                    <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Logo footer</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <form class="form form-horizontal" action="<?php echo e(route('logofooter')); ?>" method="post" role="form" enctype="multipart/form-data">
                                        <?php echo csrf_field(); ?> <?php echo method_field('put'); ?>
                                        <div class="form-body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <p>logo footer hiện tại</p>
                                                    <?php $__currentLoopData = $data_logo_header; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <img src="<?php echo e(asset('uploads/logo')); ?>/<?php echo e($dt->logo_footer); ?>" alt="" width="100%">
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <hr>
                                                    <img id="show_logo_footer" src="" alt="" width="100%"  style="display:none;">
                                                </div>
                                                <div class="col-md-3">
                                                    <label>chọn image</label>
                                                </div>
                                                <div class="input-group col-md-9 mb-3">
                                                    <input type="file" onchange="filefooterselected()" id="image" name="image_footer" value="" class="form-control" placeholder="thêm hình ảnh">
                                                </div>
                                                <div class="col-sm-12 d-flex justify-content-end">
                                                    <button type="submit" id="clicklogoheader" class="btn btn-primary me-1 mb-1">Submit</button>
                                                    <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Thông tin footer</h4>
                                <div class="card-content">
                                    <div class="card-body">
                                        <form action="<?php echo e(route('thongtinfooter')); ?>" method="post" role="form" enctype="multipart/form-data">
                                            <?php echo csrf_field(); ?> <?php echo method_field('PUT'); ?>
                                            <div class="col-md-12 form-group">
                                                <textarea class="form-control" id="content" name="thongtin_footer" rows="3">
                                                    <?php $__currentLoopData = $data_logo_header; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php if($dt->thongtin): ?>
                                                    <?php echo e($dt->thongtin); ?>

                                                    <?php endif; ?>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </textarea>
                                            </div>
                                            <div class="col-sm-12 d-flex justify-content-end">
                                                <button type="submit" class="btn btn-primary me-1 mb-1">Nhập thông tin</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>


<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="<?php echo e(asset('assets/vendors/summernote/summernote-lite.min.js')); ?>"></script>

<script>
    // logo header
    function onFileSelected() {
        var selectedFile = event.target.files[0];
        var reader = new FileReader();

        var imgtag = document.getElementById("show_img");
        // imgtag.title = selectedFile.name;

        reader.onload = function(event) {
            imgtag.src = event.target.result;
            document.getElementById("show_img").style.display = "block";
        };
        reader.readAsDataURL(selectedFile);
    }
    // logo footer
    function filefooterselected() {
        var selectedFile = event.target.files[0];
        var reader = new FileReader();

        var imgtag = document.getElementById("show_logo_footer");
        // imgtag.title = selectedFile.name;

        reader.onload = function(event) {
            imgtag.src = event.target.result;
            document.getElementById("show_logo_footer").style.display = "block";
        };
        reader.readAsDataURL(selectedFile);
    }
</script>
<script>
        // Summernote
        $('#content').summernote({
            tabsize: 2,
            height: 120,
        });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\webphim\resources\views/admin/caidat/qlcauhinh.blade.php ENDPATH**/ ?>