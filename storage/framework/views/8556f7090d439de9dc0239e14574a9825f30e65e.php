
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
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card-header">
                                <h4 class="card-title">Danh sách comment</h4>
                            </div>
                        </div>
                        <div class="col-md-6">
                        <form action="">
                            <?php echo csrf_field(); ?>
                            <select name="sort" id="sort" style="margin-top:15px" class="form-select">
                                <option value="<?php echo e(Request::url()); ?>">Tất cả danh sách</option>
                                <option value="<?php echo e(Request::url()); ?>?sort_by=comment">comment</option>
                                <option value="<?php echo e(Request::url()); ?>?sort_by=commentbibaocao">comment bị báo cáo</option>
                            </select>
                        </form>
                        </div>
                    </div>
                    <div class="card-content">
                        <!-- table bordered -->
                        <div class="table-responsive">
                            <table class="table table-bordered mb-0">
                                <thead>
                                    <tr>
                                        <!-- <th style="width:30px">#</th> -->
                                        <th>name</th>
                                        <th>phim comment</th>
                                        <th>Ngày comment</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <!-- <td class="text-bold-500"><?php echo e($dt->id); ?></td> -->
                                        <td><?php echo e($dt->comment_name); ?></td>
                                        <td class="text-bold-500"><?php echo e($dt->commentphimne->name); ?></td>
                                        <td class="text-bold-500"><?php echo e($dt->comment_date); ?></td>
                                        <td style="width:270px">
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#primary<?php echo e($dt->id); ?>">xem</button>
                                        <?php if($dt->action == 2): ?>
                                        <a type="button" data-id="<?php echo e($dt->id); ?>" id="khoiphuc" class="btn btn-outline-primary">khôi phục</a>
                                        <?php endif; ?>
                                        <a href="<?php echo e(route('comment.destroy',$dt->id)); ?>" class="btn btn-outline-danger btndelete">xóa</a>
                                        </td>
                                    </tr>
                                    <div class="modal-primary me-1 mb-1 d-inline-block">
                                                    <!--primary theme Modal -->
                                                    <div class="modal fade text-left" id="primary<?php echo e($dt->id); ?>" tabindex="-1" aria-labelledby="myModalLabel160" style="display: none;" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header bg-primary">
                                                                    <h5 class="modal-title white" id="myModalLabel160">
                                                                        xem comment
                                                                    </h5>
                                                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                                        <i data-feather="x"></i>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                <?php echo e($dt->comment); ?>

                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                                                        <i class="bx bx-x d-block d-sm-none"></i>
                                                                        <span class="d-none d-sm-block">Close</span>
                                                                    </button>
                                                                    <button type="button" class="btn btn-primary ml-1" data-bs-dismiss="modal">
                                                                        <i class="bx bx-check d-block d-sm-none"></i>
                                                                        <span class="d-none d-sm-block">Accept</span>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
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
<script>
    jQuery(document).ready(function($) {
        $('#sort').on('change', function() {
            var url = $(this).val();
            // alert(url);
            if(url){
                window.location = url;
            }
            return false;
        });
        locdanhsach();
        function locdanhsach() {
            var url = window.location.href;

            $('select[name="sort"]').find('option[value="'+url+'"]').attr("selected",true);
        }
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
    <script>
    jQuery(document).ready(function($){
        $('#khoiphuc').on('click', function(){
            var id = $(this).data('id');
            var _token = $('input[name="_token"]').val();
            // alert(id);
            // alert(_token);
            window.location.reload(true);
            $.ajax({
                url:'<?php echo e(url('/admin/khoiphuc-comment')); ?>',
                method:"post",
                dataType:"JSON",
                data:{id:id, _token:_token },

                success:function(data)
                {
                    if(data == 'thanhcongr'){
                        window.location.reload(true);
                    }
                }
            });
        })
    })
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/animetvh/domains/animetvh.net/public_html/resources/views/admin/comment/index.blade.php ENDPATH**/ ?>