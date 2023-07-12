
<?php $__env->startSection('css'); ?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>
<link href="//cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
<style>
    .label-info{
        /* background: linear-gradient(to right, #4b79a1, #283e51); */
        background-color: #000;
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
                        <h3>Quản lý cấu Hình seo</h3>
                        <p class="text-subtitle text-muted">Quản lý meta seo của trang chủ, danh mục, search, đăng nhập, đăng ký...
                        </p>
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Quản lý seo</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Quản lý cấu hình seo</h5>
                        </div>
                        <div class="card-body">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link active" id="seotrangchu-tab" data-bs-toggle="tab" href="#seotrangchu" role="tab" aria-selected="true">Seo trang chủ</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="seodanhmuc-tab" data-bs-toggle="tab" href="#seodanhmuc" role="tab">Seo danh mục</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="seotimkiem-tab" data-bs-toggle="tab" href="#seotimkiem" role="tab">Seo tìm kiếm</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="seotimanime-tab" data-bs-toggle="tab" href="#seotimanime" role="tab">Seo tìm anime</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="seodangnhap-tab" data-bs-toggle="tab" href="#seodangnhap" role="tab">Seo đăng nhập</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="seodangky-tab" data-bs-toggle="tab" href="#seodangky" role="tab">Seo đăng ký</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade active show" id="seotrangchu" role="tabpanel" aria-labelledby="seotrangchu-tab">
                                    <div class="row my-2">
                                        <div class="col-md-12">
                                        <?php $__currentLoopData = $datameta; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($data->thuoc_tinh == 1): ?>
                                            <form action="<?php echo e(route('postseohome')); ?>" method="post" enctype="multipart/form-data">
                                                <?php echo csrf_field(); ?> <?php echo method_field('PUT'); ?>
                                                <div class="form-group">
                                                    <label for="basicInput">Tiêu đề</label>
                                                    <input type="text" class="form-control" name="tieudehome" value="<?php echo e($data->tieu_de); ?>" id="basicInput" placeholder="Tiêu đề trang chủ">
                                                </div>
                                                <div class="form-group">
                                                <label for="basicInput">meta-keyword</label>
                                                    <input type="text" class="form-control" name="tagshome[]" value="<?php echo e($data->meta_key); ?>" id="basicInput" data-role="tagsinput">
                                                </div>
                                                <div class="form-floating">
                                                    <textarea class="form-control" name="meta_desc_home" placeholder="nhập meta description" id="floatingTextarea" style="height:150px"><?php echo e($data->meta_desc); ?></textarea>
                                                    <label for="floatingTextarea">meta-description</label>
                                                </div>
                                                <hr>
                                                <button class="btn icon icon-left btn-primary">submit</button>
                                            </form>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="seodanhmuc" role="tabpanel" aria-labelledby="seodanhmuc-tab">
                                    <div class="row my-2">
                                        <div class="col-md-12">
                                        <?php $__currentLoopData = $datameta; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($data->thuoc_tinh == 2): ?>
                                            <form action="<?php echo e(route('postseodanhmuc')); ?>" method="post" enctype="multipart/form-data">
                                                <?php echo csrf_field(); ?> <?php echo method_field('PUT'); ?>
                                                <div class="form-group">
                                                    <label for="basicInput">Tiêu đề</label>
                                                    <input type="text" class="form-control" name="tieude_danhmuc" value="<?php echo e($data->tieu_de); ?>" id="basicInput" placeholder="Tiêu đề danh mục">
                                                </div>
                                                <div class="form-group">
                                                <label for="basicInput">meta-keyword</label>
                                                    <input type="text" class="form-control" name="tagsdanhmuc[]" value="<?php echo e($data->meta_key); ?>" id="basicInput" data-role="tagsinput">
                                                </div>
                                                <div class="form-floating">
                                                    <textarea class="form-control" name="meta_desc_danhmuc" placeholder="nhập meta description" id="floatingTextarea" style="height:150px"><?php echo e($data->meta_desc); ?></textarea>
                                                    <label for="floatingTextarea">meta-description</label>
                                                </div>
                                                <hr>
                                                <button class="btn icon icon-left btn-primary">submit</button>
                                            </form>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="seotimkiem" role="tabpanel" aria-labelledby="seotimkiem-tab">
                                    <div class="row my-2">
                                        <div class="col-md-12">
                                        <?php $__currentLoopData = $datameta; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($data->thuoc_tinh == 3): ?>
                                            <form action="<?php echo e(route('postseosearch')); ?>" method="post" enctype="multipart/form-data">
                                                <?php echo csrf_field(); ?> <?php echo method_field('PUT'); ?>
                                                <div class="form-group">
                                                    <label for="basicInput">Tiêu đề</label>
                                                    <input type="text" class="form-control" name="tieude_search" value="<?php echo e($data->tieu_de); ?>" id="basicInput" placeholder="Tiêu đề tìm kiếm">
                                                </div>
                                                <div class="form-group">
                                                <label for="basicInput">meta-keyword</label>
                                                    <input type="text" class="form-control" name="tagssearch[]" value="<?php echo e($data->meta_key); ?>" id="basicInput" data-role="tagsinput">
                                                </div>
                                                <div class="form-floating">
                                                    <textarea class="form-control" name="meta_desc_search" placeholder="nhập meta description" id="floatingTextarea" style="height:150px"><?php echo e($data->meta_desc); ?></textarea>
                                                    <label for="floatingTextarea">meta-description</label>
                                                </div>
                                                <hr>
                                                <button class="btn icon icon-left btn-primary">submit</button>
                                            </form>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="seotimanime" role="tabpanel" aria-labelledby="seotimanime-tab">
                                    <div class="row my-2">
                                        <div class="col-md-12">
                                        <?php $__currentLoopData = $datameta; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($data->thuoc_tinh == 4): ?>
                                            <form action="<?php echo e(route('postseotimanime')); ?>" method="post" enctype="multipart/form-data">
                                                <?php echo csrf_field(); ?> <?php echo method_field('PUT'); ?>
                                                <div class="form-group">
                                                    <label for="basicInput">Tiêu đề</label>
                                                    <input type="text" class="form-control" name="tieude_timanime" value="<?php echo e($data->tieu_de); ?>" id="basicInput" placeholder="Tiêu đề tìm anime">
                                                </div>
                                                <div class="form-group">
                                                <label for="basicInput">meta-keyword</label>
                                                    <input type="text" class="form-control" name="tagstimanime[]" value="<?php echo e($data->meta_key); ?>" id="basicInput" data-role="tagsinput">
                                                </div>
                                                <div class="form-floating">
                                                    <textarea class="form-control" name="meta_desc_timanime" placeholder="nhập meta description" id="floatingTextarea" style="height:150px"><?php echo e($data->meta_desc); ?></textarea>
                                                    <label for="floatingTextarea">meta-description</label>
                                                </div>
                                                <hr>
                                                <button class="btn icon icon-left btn-primary">submit</button>
                                            </form>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="seodangnhap" role="tabpanel" aria-labelledby="seodangnhap-tab">
                                    <div class="row my-2">
                                        <div class="col-md-12">
                                        <?php $__currentLoopData = $datameta; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($data->thuoc_tinh == 5): ?>
                                            <form action="" method="post" enctype="multipart/form-data">
                                                <div class="form-group">
                                                    <label for="basicInput">Tiêu đề</label>
                                                    <input type="text" class="form-control" name="tieude" value="<?php echo e($data->tieu_de); ?>" id="basicInput" placeholder="Tiêu đề đăng nhập">
                                                </div>
                                                <div class="form-group">
                                                <label for="basicInput">meta-keyword</label>
                                                    <input type="text" class="form-control" name="tags" value="<?php echo e($data->meta_key); ?>" id="basicInput" data-role="tagsinput">
                                                </div>
                                                <div class="form-floating">
                                                    <textarea class="form-control" name="meta_desc" placeholder="nhập meta description" id="floatingTextarea" style="height:150px"><?php echo e($data->meta_desc); ?></textarea>
                                                    <label for="floatingTextarea">meta-description</label>
                                                </div>
                                                <hr>
                                                <button class="btn icon icon-left btn-primary">submit</button>
                                            </form>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="seodangky" role="tabpanel" aria-labelledby="seodangky-tab">
                                    <div class="row my-2">
                                        <div class="col-md-12">
                                        <?php $__currentLoopData = $datameta; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($data->thuoc_tinh == 5): ?>
                                            <form action="" method="post" enctype="multipart/form-data">
                                                <div class="form-group">
                                                    <label for="basicInput">Tiêu đề</label>
                                                    <input type="text" class="form-control" name="tieude" value="<?php echo e($data->tieu_de); ?>" id="basicInput" placeholder="Tiêu đề đăng ký">
                                                </div>
                                                <div class="form-group">
                                                <label for="basicInput">meta-keyword</label>
                                                    <input type="text" class="form-control" name="tags" value="<?php echo e($data->meta_key); ?>" id="basicInput" data-role="tagsinput">
                                                </div>
                                                <div class="form-floating">
                                                    <textarea class="form-control" name="meta_desc" placeholder="nhập meta description" id="floatingTextarea" style="height:150px"><?php echo e($data->meta_desc); ?></textarea>
                                                    <label for="floatingTextarea">meta-description</label>
                                                </div>
                                                <hr>
                                                <button class="btn icon icon-left btn-primary">submit</button>
                                            </form>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- seo cơ bản -->
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Seo cơ bản</h4>
            </div>
            <div class="card-body">
                <p>
                    xml sitemap:
                    <span><a href="http://127.0.0.1:8000/sitemap.xml">sitemap animetvh</a></span>
                </p>
                <a href="http://127.0.0.1:8000/genrate-sitemap" class="btn-sm btn-primary">Cập nhật sitemap</a>
                <hr>
                <div class="form-floating">
                    <textarea class="form-control" placeholder="Leave a comment here" id="analytiscTextarea" style="height:150px"><?php echo e($dataanalytisc->content); ?></textarea>
                    <label for="analytiscTextarea">Google Analytisc</label>
                </div>
                <button class="btn btn-primary mt-2" id="updateAna">cập nhật analytisc</button>
            </div>
        </div>
    </section>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        jQuery(document).ready(function(){
            $("#updateAna").click(function(){
                var text = $('#analytiscTextarea').val();
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url:'<?php echo e(Route("putanalytisc")); ?>',
                    method:'post',
                    data:{
                        text:text,_token:_token
                    },
                    success: function(data){
                        if(data){
                            Swal.fire({
                                position: 'center-center',
                                icon: 'success',
                                title: 'update thành công',
                                showConfirmButton: true,
                                timer: 1500
                            })
                        }
                    }
                })
            });
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\webphim\resources\views/admin/caidat/metaseo.blade.php ENDPATH**/ ?>