
<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendors/toastify/toastify.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendors/dripicons/webfont.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/pages/dripicons.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendors/rater-js/style.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendors/choices.js/choices.min.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendors/simple-datatables/style.css')); ?>">
    <style>
        #id_form{
            position: relative;
        }
        #id_form .thongtin_anhien{
            position: absolute;
            left: 0;
            top: 100%;
            width: 100%;
            max-height: 300px;
            overflow: auto;
            border-radius: 5px;
            background-color: rgb(224, 224, 224);
            box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;
            display: none;
        }
        .img_search{
            width: 70px;
            height: 100px;
            margin-right: 10px;
        }
        .search-item{
            display: block;
            border-bottom: 1px dashed;
            padding: 5px 0px;
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
    <div class="page-heading">
        <h3>Danh mục Phim</h3>
    </div>
    <section class="section">
        <div class="row" id="table-bordered">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-3">
                                <h4 class="card-title">Danh mục phim</h4>
                            </div>
                            <div class="col-md-7">
                                <div class="form-group position-relative has-icon-right">
                                    <form action="" method="GET" role="form" style="z-index:2;" id="id_form">
                                        <input type="text" class="form-control" id="search" placeholder="Tìm kiếm server" name="key">
                                        <div class="form-control-icon">
                                            <a type="submit"><i class="icon dripicons-search"></i></a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <button class="btn btn-warning" data-toggle="collapse" data-target="#themserver">Thêm server</button>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="collapse" id="themserver">
                                <div class="card card-body">
                                    <center><h5>- Thêm server -</h5></center>
                                    <form action="<?php echo e(route('server.store')); ?>" method="POST" role="form">
                                        <?php echo csrf_field(); ?>
                                        <div class="form-group">
                                            <label>server</label>
                                            <input type="text" class="form-control" name="name_server" aria-describedby="emailHelp" placeholder="Enter server">                                        </div>
                                        <div class="form-group">
                                            <label>Thông tin thêm</label>
                                            <input type="text" class="form-control" name="thong_tin_them" placeholder="thông tin thêm">
                                        </div>
                                        <div class="form-group d-flex">
                                            <div class="form-check form-check-success" style="margin-right:2px">
                                                <input class="form-check-input" type="radio" name="action" id="Success" value="1" checked>
                                                <label class="form-check-label" for="Success">
                                                    Bật lên
                                                </label>
                                            </div>
                                            <div class="form-check form-check-dark" style="margin-left:2px">
                                                <input class="form-check-input" type="radio" name="action" id="Success" value="2">
                                                <label class="form-check-label" for="Success">
                                                    Tắt đi
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary">Lưu Thông Tin</button>
                                        </div>
                                    </form>
                                    <hr>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-content">
                        <!-- table bordered -->
                        <div class="table-responsive">
                            <!-- để id table1 thì sẽ thành table full  -->
                            <table class="table table-striped" id="">
                                <thead>
                                    <tr>
                                        <th style="width:30px">#</th>
                                        <th>name</th>
                                        <th>Thông tin thêm</th>
                                        <th>Trạng thái</th>
                                        <th>action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $dt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td class="text-bold-500"><?php echo e($key); ?></td>
                                        <td><?php echo e($dt->name_server); ?></td>
                                        <td><?php echo e($dt->thong_tin_them); ?></td>
                                        <td>
                                            <?php if($dt->action == 1): ?>
                                            <span class="badge bg-success">Đang bật</span>
                                            <?php else: ?>
                                            <span class="badge bg-danger">Đã tắt</span>
                                            <?php endif; ?>
                                        </td>
                                        <td style="width:200px">
                                            <button data-toggle="modal" data-target="#modaledit<?php echo e($dt->id); ?>" class="btn btn-outline-primary">sửa</button>
                                            <a href="<?php echo e(route('server.destroy',$dt->id)); ?>" class="btn btn-outline-danger btndelete">xóa</a>
                                        </td>
                                    </tr>

                                    <!-- model edit server -->
                                    <div class="modal fade" id="modaledit<?php echo e($dt->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLongTitle">edit <?php echo e($dt->name_server); ?></h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                <form action="<?php echo e(route('server.update',$dt->id)); ?>" method="post" role="form">
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('PUT'); ?>
                                                    <div class="form-group">
                                                        <label>Name server</label>
                                                        <input type="text" class="form-control" name="name_server" placeholder="name server" value="<?php echo e($dt->name_server); ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Thông tin thêm</label>
                                                        <input type="text" class="form-control" name="thong_tin_them" placeholder="Thông tin thêm" value="<?php echo e($dt->thong_tin_them); ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleFormControlSelect1">Trạng thái</label>
                                                        <select class="form-control" name="action">
                                                        <option value="1" <?php echo e(($dt->action == 1) ? 'selected':''); ?>>Bật lên</option>
                                                        <option value="2" <?php echo e(($dt->action == 2) ? 'selected':''); ?>>Tắt đi</option>
                                                        </select>
                                                    </div>
                                                    <button type="submit" class="btn btn-primary">Sửa ngay</button>
                                                </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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
<!-- lazyload -->
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery.lazy/1.7.9/jquery.lazy.min.js"></script>
<!-- dataable -->
<script>
    $(function() {
        $('.lazy').lazy();
    });
</script>

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
                url:'',
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
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <script src="<?php echo e(asset('assets/vendors/toastify/toastify.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/extensions/toastify.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/vendors/rater-js/rater-js.js')); ?>"></script>
    <script src="{{asset('assets/js/extensions/rater-js.js')}"></script>
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\webphim\resources\views/admin/server/index.blade.php ENDPATH**/ ?>