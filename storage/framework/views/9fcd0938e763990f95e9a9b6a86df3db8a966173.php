
<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendors/toastify/toastify.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendors/choices.js/choices.min.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendors/summernote/summernote-lite.min.css')); ?>">
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
                        <center><h4 class="card-title">Thêm danh mục</h4></center>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form form-horizontal" action="<?php echo e(route('phim.update', $phim->id)); ?>" method="POST" role="form" enctype="multipart/form-data">
                                <?php echo csrf_field(); ?> <?php echo method_field('PUT'); ?>
                                <div class="form-body">
                                    <div class="row">
                                        <!-- manga -->
                                        <div class="col-md-3">
                                            <label>Tên phim</label>
                                        </div>
                                        <div class="col-md-9 form-group">
                                            <input type="text" id="first-name" value="<?php echo e($phim->name); ?>" class="form-control"name="name" placeholder="nhập tên phim">
                                        </div>
                                        <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <div class="alert alert-warning"><i class="bi bi-exclamation-triangle"></i> <?php echo e($message); ?></div>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        <!-- tên phim 2 -->
                                        <div class="col-md-3">
                                            <label>Tên phim 2</label>
                                        </div>
                                        <div class="col-md-9 form-group">
                                            <input type="text" id="first-name" value="<?php echo e($phim->name2); ?>" class="form-control"name="name2" placeholder="nhập tên phim 2">
                                        </div>
                                        <?php $__errorArgs = ['name2'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <div class="alert alert-warning"><i class="bi bi-exclamation-triangle"></i> <?php echo e($message); ?></div>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        <!-- danh mục -->
                                        <div class="col-md-3">
                                            <label>danh mục thể loại</label>
                                        </div>
                                        <div class="col-md-9 form-group">
                                            <select class="choices form-select select-light-danger" multiple="multiple" name="danhmuc[]">
                                            <?php $__currentLoopData = $cats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dm): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option <?php echo e(($phimtheloaine->contains($dm->id)) ? 'selected' : ''); ?> value="<?php echo e($dm->id); ?>"><?php echo e($dm->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                        <!-- kiểu phim -->
                                        <div class="col-md-3">
                                            <label>Kiểu phim</label>
                                        </div>
                                        <div class="col-md-9 form-group">
                                            <select class="form-select" name="type_movie">
                                                <?php $__currentLoopData = $kieuphim; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dm): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option <?php echo e(($phim->type_movie == $dm->id) ? 'selected':''); ?> value="<?php echo e($dm->id); ?>"><?php echo e($dm->name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                        <!-- quốc gia phim -->
                                        <div class="col-md-3">
                                            <label>Trạng thái phim</label>
                                        </div>
                                        <div class="col-md-9 form-group">
                                            <select class="form-select" name="status">
                                                <?php $__currentLoopData = $trangthai; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option <?php echo e(($phim->status == $tt->id) ? 'selected':''); ?> value="<?php echo e($tt->id); ?>"><?php echo e($tt->name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                        <?php $__errorArgs = ['status'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <div class="alert alert-warning"><i class="bi bi-exclamation-triangle"></i> <?php echo e($message); ?></div>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        <!-- Thời lượng phim -->
                                        <div class="col-md-3">
                                            <label>Thời lượng phim</label>
                                        </div>
                                        <div class="col-md-9 form-group">
                                            <input type="text" id="first-name" value="<?php echo e($phim->duration); ?>" class="form-control" name="duration" placeholder="nhập thời lượng phim">
                                        </div>
                                        <?php $__errorArgs = ['duration'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <div class="alert alert-warning"><i class="bi bi-exclamation-triangle"></i> <?php echo e($message); ?></div>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        <!-- Thời lượng phim -->
                                        <div class="col-md-3">
                                            <label>Năm sản xuất</label>
                                        </div>
                                        <div class="col-md-9 form-group">
                                            <input type="text" id="first-name" value="<?php echo e($phim->year); ?>" class="form-control" name="year" placeholder="nhập năm sản xuất">
                                        </div>
                                        <?php $__errorArgs = ['year'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <div class="alert alert-warning"><i class="bi bi-exclamation-triangle"></i> <?php echo e($message); ?></div>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        <!-- phim nổi bật -->
                                        <div class="col-md-3">
                                            <label>Phim nổi bật</label>
                                        </div>
                                        <div class="col-md-9 form-group">
                                            <select class="form-select" name="phim_noibat">
                                                    <option value="0" <?php echo e(($phim->phim_noibat == 0) ? 'selected':''); ?>>Bình thường</option>
                                                    <option value="1" <?php echo e(($phim->phim_noibat == 1) ? 'selected':''); ?>>Hot</option>
                                                    <option value="2" <?php echo e(($phim->phim_noibat == 2) ? 'selected':''); ?>>Mới cập nhật</option>
                                                    <option value="3" <?php echo e(($phim->phim_noibat == 3) ? 'selected':''); ?>>Xem nhiều</option>
                                            </select>
                                        </div>
                                        <!-- tóm tắc truyện -->
                                        <div class="col-md-3">
                                            <label>Tóm tắc phim</label>
                                        </div>
                                        <div class="col-md-9 form-group">
                                            <textarea class="form-control" id="content" name="description" rows="3"><?php echo $phim->description; ?></textarea>
                                        </div>
                                        <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <div class="alert alert-warning"><i class="bi bi-exclamation-triangle"></i> <?php echo e($message); ?></div>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        <!-- hình ảnh -->
                                        <div class="col-md-3">
                                            <label>Hình ảnh</label>
                                        </div>
                                        <div class="col-md-9 form-group">
                                            <input class="form-control" type="file" id="formFile" name="file_upload" >
                                            <img src="<?php echo e(asset('uploads')); ?>/<?php echo e($phim->image); ?>" alt="" width="100px" height="100px">
                                            <input type="hidden" name="images" id="" value="<?php echo e($phim->image); ?>">
                                        </div>
                                         <!-- 2 thẻ meta -->
                                        <div class="form-group col-sm-6">
                                            <label for="">meta_description</label>
                                            <textarea name="meta_desc" style="background:#eeeeee" id="" class="form-control" cols="30" rows="5" placeholder="nhập meta_description"><?php echo e($phim->meta_desc); ?></textarea>
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label for="">meta_keyword</label>
                                            <textarea name="meta_keyword" style="background:#eeeeee" id="" class="form-control" cols="30" rows="5" placeholder="nhập meta_description"><?php echo e($phim->meta_keyword); ?></textarea>
                                        </div>
                                        <!-- check ẩn hiện -->
                                        <div class="col-md-3">
                                            <label for="">Trạng thái</label>
                                        </div>
                                        <div class="col-md-9 form-group">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="anHien" <?php echo e(($phim->anHien == 2) ? 'checked':''); ?> value="2">
                                                <label class="form-check-label" for="flexRadioDefault1">
                                                    Ẩn 
                                                </label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="anHien" <?php echo e(($phim->anHien == 1) ? 'checked':''); ?> value="1" checked>
                                                <label class="form-check-label" for="flexRadioDefault2">
                                                    Hiện
                                                </label>
                                            </div>
                                        </div>
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
<script src="https://code.jquery.com/jquery-3.5.0.js"></script>
<script src="<?php echo e(asset('assets/vendors/choices.js/choices.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/vendors/jquery/jquery.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/vendors/summernote/summernote-lite.min.js')); ?>"></script>
<script>
        // Summernote
        $('#content').summernote({
            tabsize: 2,
            height: 120,
        });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\animetvh\resources\views/admin/phim/edit.blade.php ENDPATH**/ ?>