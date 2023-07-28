

<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendors/toastify/toastify.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendors/dripicons/webfont.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/pages/dripicons.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendors/choices.js/choices.min.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendors/simple-datatables/style.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendors/summernote/summernote-lite.min.css')); ?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.css">
    <link href="//cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
    <style>
        .css-card{
            border: 2px solid aquamarine;
            box-shadow: rgb(149 157 165 / 20%) 0px 8px 24px;
        }
        #delete_quangcao{
            cursor: pointer;
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
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-sm-4">
                        <h4 class="card-title">Danh sách quảng cáo</h4>
                    </div>
                </div>
            </div>
            <div class="card-content">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 mt-2">
                            <center><h4>- Danh sách -</h4></center>
                            <br>
                            <div class="row">
                                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-xl-4 col-md-6 col-sm-12">
                                    <div class="card css-card">
                                        <div class="card-header d-flex bg-primary" style="height:60px">
                                            <h5 id="exampleModalLiveLabel" class="col-md-11" style="color:#fff">Thông tin quảng cáo</h5>
                                            <button type="button" class="col-md-1 close d-flex flex-row-reverse">
                                                <span id="delete_quangcao" data-id="<?php echo e($dt->id); ?>" aria-hidden="true" style="color:#fff">×</span>
                                            </button>
                                        </div>
                                        <div class="card-content">
                                            <img class="img-fluid w-100" src="<?php echo e(asset('uploads/quangcao')); ?>/<?php echo e($dt->images); ?>" alt="<?php echo e($dt->images); ?>" style="height:160px; width:100%;">
                                            <div class="card-body">
                                                <?php if($dt->id_hienthi == 1): ?>
                                                <h4 class="card-title">Loại : banner header</h4>
                                                <?php elseif($dt->id_hienthi == 2): ?>
                                                <h4 class="card-title">Loại : banner right</h4>
                                                <?php elseif($dt->id_hienthi == 3): ?>
                                                <h4 class="card-title">Loại : banner footer</h4>
                                                <?php elseif($dt->id_hienthi == 4): ?>
                                                <h4 class="card-title">Loại : Khung Thông báo (modal)</h4>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="card-footer d-flex justify-content-between">
                                            <span>
                                                Trạng thái quảng cáo : 
                                                <select class="form-control" id="click_trangthai" data-id="<?php echo e($dt->id); ?>">
                                                    <option value="1" <?php echo e(($dt->trang_thai == 1) ? 'selected':''); ?>>Đang bật</option>
                                                    <option value="2" <?php echo e(($dt->trang_thai == 2) ? 'selected':''); ?>>Đang tắt</option>
                                                </select>
                                            </span>
                                            <button class="btn btn-primary">Xem thêm</button>
                                        </div>
                                    </div>
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex flex-row-reverse"><?php echo e($data->appends(request()->all())->links()); ?></div>
                </div>
            </div>
            <form method="POST" action="" id="form-delete">
                <?php echo method_field('DELETE'); ?>
                <?php echo csrf_field(); ?>
            </form>
        </div>
    </section>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"></script>
<script src="<?php echo e(asset('assets/vendors/summernote/summernote-lite.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/vendors/choices.js/choices.min.js')); ?>"></script>
<!-- alert -->
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
<script src="<?php echo e(asset('assets/vendors/toastify/toastify.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/extensions/toastify.js')); ?>"></script>
<script src="<?php echo e(asset('assets/vendors/simple-datatables/simple-datatables.js')); ?>"></script>

<!-- javascript -->
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
<!-- CSS -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
<!-- Default theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
<!-- Semantic UI theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css"/>
<!-- Bootstrap theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>
<?php if (isset($component)) { $__componentOriginald4c8f106e1e33ab85c5d037c2504e2574c1b0975 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Alert::class, []); ?>
<?php $component->withName('alert'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald4c8f106e1e33ab85c5d037c2504e2574c1b0975)): ?>
<?php $component = $__componentOriginald4c8f106e1e33ab85c5d037c2504e2574c1b0975; ?>
<?php unset($__componentOriginald4c8f106e1e33ab85c5d037c2504e2574c1b0975); ?>
<?php endif; ?>
<script>
    jQuery(document).ready(function($) {
        $('.btndelete').click(function(ev) {
            ev.preventDefault();
            var _href = $(this).attr('href');
            $('form#form-delete').attr('action',_href);
            alertify.confirm('bạn chắc chắn muốn xóa ?', function(result){
                if(result){
                    $('form#form-delete').submit();
                }
            })
        });
    });
</script>
<!-- delete quảng cáo show -->
<script>
    jQuery(document).ready(function($){
        $(document).on('click','#delete_quangcao', function(e){
            e.preventDefault();
            var ttdelete = $(this).data('id');
            var _token = $('input[name="_token"]').val();
            alertify.confirm('bạn có chắc chắn muốn xóa ?', function(result){
                $.ajax({
                    url:'<?php echo e(Route("caidat.deletequangcao")); ?>',
                    method:'delete',
                    data:{
                        ttdelete:ttdelete,_token:_token,
                    },
                    success: function(data){
                        if(data){
                            Swal.fire({
                                position: 'center-center',
                                icon: 'success',
                                title: 'Đã xóa thành công',
                                showConfirmButton: true,
                                timer: 1500
                            })
                        }
                    }
                })
                $(document).ajaxStop(function(){
                    // var loaddesajax = $('.textdes').text();
                        // window.location.reload(true);
                    setTimeout(function(){
                        window.location.reload(true);
                    },1500);
                });
            })
        })
    })
</script>
<!-- click trạng thái -->
<script>
    jQuery(document).ready(function($){
        $(document).on('change', '#click_trangthai', function(ev){
            ev.preventDefault();
            var id_quangcao = $(this).data('id');
            var idclick = $(this).val();
            var _token = $('input[name="_token"]').val();
            alertify.confirm('bạn có chắc muốn đổi trạng thái ?', function(result){
                $.ajax({
                    url:'<?php echo e(Route("puttrangthai")); ?>',
                    method:'post',
                    data:{
                        id_quangcao:id_quangcao,idclick:idclick,_token:_token,
                    },
                    success: function(data){
                        if(data){
                            Swal.fire({
                                position: 'center-center',
                                icon: 'success',
                                title: 'Đã sửa thành công',
                                showConfirmButton: true,
                                timer: 1500
                            })
                        }
                    }
                })
                $(document).ajaxStop(function(){
                    // var loaddesajax = $('.textdes').text();
                        // window.location.reload(true);
                    setTimeout(function(){
                        // window.location.reload(true);
                    },1500);
                });
            })
        });
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\webphim\resources\views/admin/caidat/showquangcao.blade.php ENDPATH**/ ?>