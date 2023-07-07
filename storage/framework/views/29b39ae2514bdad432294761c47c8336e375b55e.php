
<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendors/toastify/toastify.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendors/dripicons/webfont.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/pages/dripicons.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('main'); ?>
<div id="main">
    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>
    <section class="section">
        <div class="row" id="table-bordered">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-sm-4">
                                <h4 class="card-title">Danh mục</h4>
                            </div>
                            <div class="col-sm-4">

                            </div>
                            <div class="col-sm-4">
                                <button class="btn btn-outline-warning" id="deleteAllselected">delete All</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-content">
                        <!-- table bordered -->
                        <div class="table-responsive">
                            <table class="table table-bordered mb-0">
                                <thead>
                                    <tr>
                                        <th style="width:30px"><input type="checkbox" id="checkAll" /></th>
                                        <th style="width:30px">#</th>
                                        <th>Title</th>
                                        <th>Slug</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr id="sid<?php echo e($dt->id); ?>">
                                    <td><input type="checkbox" class="checkboxclass" name="ids" value="<?php echo e($dt->id); ?>"></td>
                                        <td class="text-bold-500"><?php echo e($dt->id); ?></td>
                                        <td><?php echo e($dt->name); ?></td>
                                        <td class="text-bold-500"><?php echo e($dt->slug); ?></td>
                                        <td>
                                            <?php if($dt->anHien == 1): ?>
                                            <span class="badge bg-primary">Hiễn thị</span>
                                            <?php else: ?>
                                            <span class="badge bg-danger">Tạm ẩn</span>
                                            <?php endif; ?>
                                        </td>
                                        <td style="width:200px">
                                        <a href="<?php echo e(route('category.edit',$dt->id)); ?>" class="btn btn-outline-primary">sửa</a>
                                        <a href="<?php echo e(route('category.destroy',$dt->id)); ?>" class="btn btn-outline-danger btndelete">xóa</a>
                                        </td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                            <hr>
                            <div class=""><?php echo e($data->appends(request()->all())->links()); ?></div>
                            <form method="POST" action="" id="form-delete">
                                <?php echo method_field('DELETE'); ?>
                                <?php echo csrf_field(); ?>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    jQuery(document).ready(function($) {
        $('.btndelete').click(function(ev) {
            ev.preventDefault();
            var _href = $(this).attr('href');
            $('form#form-delete').attr('action',_href);
            if(confirm('bạn muốn xóa chứ ?')){
                $('form#form-delete').submit();
            }
        });
    });
</script>
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
<script src="<?php echo e(asset('assets/vendors/toastify/toastify.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/extensions/toastify.js')); ?>"></script>
<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.alert','data' => []]); ?>
<?php $component->withName('alert'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<!-- jquery xóa tất cả -->
<script>
    jQuery(document).ready(function($) {
        $('#checkAll').click(function(){
            $(".checkboxclass").prop('checked', $(this).prop('checked'));
        });
        $('#deleteAllselected').click(function(e){
            e.preventDefault();
            var allids = [];
            var _token = $('input[name="_token"]').val();
            $('input:checkbox[name=ids]:checked').each(function(){
                allids.push($(this).val());
            });
            window.location.reload(true);
            $.ajax({
                url:'<?php echo e(route("deletecategory")); ?>',
                type:"delete",
                data:{
                    _token:_token,
                    ids:allids
                },
                success:function(data){
                    $.each(allids,function(key,val){
                        $("#sid"+val).remove();
                    });
                }
            });
        });
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/animetvh/domains/animetvh.net/public_html/resources/views/admin/category/index.blade.php ENDPATH**/ ?>