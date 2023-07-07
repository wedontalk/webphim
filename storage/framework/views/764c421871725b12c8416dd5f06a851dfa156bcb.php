
<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendors/toastify/toastify.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('main'); ?>
<div id="main">
    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>
    <section id="basic-horizontal-layouts">
        <div class="row match-height">
            <div class="col-md-12 col-12">
                <div class="card">
                    <div class="card-header">
                        <center><h4 class="card-title">Thêm dữ liệu crawl</h4></center>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form form-horizontal" action="<?php echo e(route('crawler.store')); ?>" method="POST" role="form">
                                <?php echo csrf_field(); ?>
                                <div class="form-body">
                                    <div class="row">
                                        <!-- chọn phim -->
                                        <div class="col-md-3">
                                            <label>Kiểu phim</label>
                                        </div>
                                        <div class="col-md-9 form-group">
                                            <select class="form-select" name="id_phim">
                                                <?php $__currentLoopData = $chonphim; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dm): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($dm->id); ?>"><?php echo e($dm->name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                        <!-- nhập link tập phim -->
                                        <div class="col-md-3">
                                            <label>link tập phim</label>
                                        </div>
                                        <div class="col-md-9 form-group">
                                            <input type="text" id="first-name" class="form-control" name="link_tapphim" placeholder="nhập link tập phim">
                                        </div>
                                        <?php $__errorArgs = ['link_tapphim'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <div class="alert alert-warning"><i class="bi bi-exclamation-triangle"></i><?php echo e($message); ?></div>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        <!-- <div class="col-md-4">
                                            <label>slug thể loại</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" id="first-name" class="form-control" name="slug" placeholder="nhập icon danh mục">
                                        </div> -->
                                    </div>
                                    <!-- check ẩn hiện -->
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="action" id="flexRadioDefault1" value="2">
                                        <label class="form-check-label" for="flexRadioDefault1">
                                            Ẩn 
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="action" id="flexRadioDefault2" value="1" checked>
                                        <label class="form-check-label" for="flexRadioDefault2">
                                            Hiện
                                        </label>
                                    </div>
                                    <hr>    
                                    <div class="col-sm-12 d-flex justify-content-end">
                                        <button type="submit"
                                            class="btn btn-primary me-1 mb-1">Submit</button>
                                        <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/animetvh/domains/animetvh.net/public_html/resources/views/admin/crawler/create.blade.php ENDPATH**/ ?>