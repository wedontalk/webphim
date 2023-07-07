<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendors/toastify/toastify.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendors/dripicons/webfont.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/pages/dripicons.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendors/rater-js/style.css')); ?>">
    <style>
        .phongnen{
            width: 150px;
            height: 200px;
            border: 1px solid rgb(247, 247, 247);
            border-radius: 15px;
            box-shadow: rgba(247, 247, 247, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;
        }
        .phongnen img{
            padding: 5px 5px 5px 5px;
            width: 148.5px;
            height: 198px;
            border-radius: 15px;
            box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
        }
        .phongheader{
            border: 1px solid #000;
        }
        .list-group li{
            font-weight: bold;
        }
        .list-group li:nth-child(2n-1){
            background-color: rgb(243, 241, 241);
        }
        .suaxoa a{
            margin-left: 5px;
        }
        .overchapter{
            height: 200px;
            overflow-y: auto;
        }
        .textdes{
            overflow-y: auto;
            height: 200px;
            background-color: rgb(83 83 83);
            padding: 7px;
            border-radius: 5px;
            text-align: justify;
            box-shadow: rgba(67, 71, 85, 0.27) 0px 0px 0.25em, rgba(90, 125, 188, 0.05) 0px 0.25em 1em;
        }
        .textdes::-webkit-scrollbar {
            width: 6px;
            background-color: #F5F5F5;
        }
        .textdes::-webkit-scrollbar-thumb {
            background-color: #cccccc;
            border-radius: 5px;
        }
        .butthemne{
            margin-top: -3px;
            position: relative;
            padding-left: 24px;
        }
        .iconthem{
            font-size: 24px;
            position: absolute;
            left: 0;
            top: 0.6px;
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
                            <div class="col-3">
                                <h4 class="card-title">Danh mục phim</h4>
                            </div>
                            <div class="col-5">
                                <div class="form-group position-relative has-icon-right">
                                    <form action="" method="GET" role="form" style="z-index:2;">
                                        <input type="text" class="form-control" placeholder="Tìm kiếm phim" name="key">
                                        <div class="form-control-icon">
                                            <a type="submit"><i class="icon dripicons-search"></i></a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-sm-2">
                            
                            </div>
                            <div class="col-sm-2 mt-1">
                                <button class="btn btn-sm btn-outline-warning" id="deleteAllselected">delete All</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-content">
                        <!-- table bordered -->
                        <div class="table-responsive">
                            <table class="table table-bordered mb-0">
                                <thead>
                                    <tr>
                                        <th style="width:30px">#</th>
                                        <th style="width:100px">Image</th>
                                        <th>Name</th>
                                        <th>Slug</th>
                                        <th>Trạng thái</th>
                                        <th>ACTION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    ?>
                                    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $dt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td class="text-bold-500"><?php echo e($i++); ?></td>
                                        <td><img src="<?php echo e(asset('uploads')); ?>/<?php echo e($dt->image); ?>" alt="" width="100px" height="100px"></td>
                                        <td><?php echo e($dt->name); ?></td>
                                        <td class="text-bold-500"><?php echo e($dt->slug); ?></td>
                                        <td>
                                            <span class="badge bg-primary">
                                                <?php if($dt->anHien == 1): ?> Hiện 
                                                <?php else: ?> Ẩn 
                                                <?php endif; ?>
                                            </span>
                                            <!-- <div class="progress">
                                                <div class="progress-bar progress-bar-striped" role="progressbar" style="width: 80%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div> -->
                                        </td>
                                        <td style="width:200px">
                                        <a type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo e($dt->id); ?>" class="btn btn-outline-primary">xem</a>
                                        <a href="<?php echo e(route('phim.edit',$dt->id)); ?>" class="btn btn-outline-primary">sửa</a>
                                        <a href="<?php echo e(route('phim.destroy',$dt->id)); ?>" class="btn btn-outline-danger btndelete">xóa</a>
                                        </td>


                                        <!-- modal -->
                                            <div class="modal fade" id="exampleModal<?php echo e($dt->id); ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-xl">
                                                    <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Thông tin phim</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-md-2">
                                                                <div class="phongnen">
                                                                    <img src="<?php echo e(asset('uploads')); ?>/<?php echo e($dt->image); ?>" alt="">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-5">
                                                                <h5><strong><?php echo e($dt->name); ?></strong></h5>
                                                                <p>
                                                                    <?php $__currentLoopData = $dt->nhieutheloai; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <span class="badge bg-primary rounded-pill butthem" style="margin: 2px 0px 2px 0px;"><?php echo e($cate->name); ?></span>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                </p>
                                                                <p><strong>Đạo diễn: </strong><span><?php echo e($dt->director); ?></span></p>
                                                                <p><strong>Tập phim: </strong><span><?php echo e($dt->tapphim->count()); ?> tập</span></p>
                                                                <p><strong>Tác giả: </strong><span><?php echo e($dt->author); ?></span></p>
                                                                <p>
                                                                    <span>                                            
                                                                        <div class="progress">
                                                                            <div class="progress-bar progress-bar-striped" role="progressbar" style="width: 80%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                                                                        </div>
                                                                    </span>
                                                                </p>
                                                            </div>
                                                            <div class="col-md-5">
                                                                <div class="textdes">
                                                                    <?php echo \Str::limit($dt->description, 10000, $end='...'); ?>

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <div class="row">
                                                            <div class="col-md-12 overchapter">
                                                                <div class="card">
                                                                    <div class="row" style="padding: 5px 0px 5px 0px;">
                                                                            <div class="col-md-8">
                                                                                <h5 class="card-title"><strong>Tổng hợp</strong> phim : <?php echo e($dt->title_product); ?></h5>
                                                                            </div>
                                                                            <div class="col-md-2">
                                                                                <a href="<?php echo e(url('admin/tapphim/them-tap-phim',$dt->slug)); ?>" class="btn btn-sm btn-outline-primary butthemne">
                                                                                <span class="icon dripicons-plus iconthem"></span>Thêm tập phim</a>
                                                                            </div>
                                                                            <div class="col-md-2">
                                                                                <a onclick="window.open('<?php echo e(url('admin/tapphim/crawl-tapphim',$dt->id)); ?>')" class="btn btn-sm btn-outline-dark butthemne">
                                                                                <span class="icon dripicons-plus iconthem"></span>crawler phim</a>
                                                                            </div>
                                                                        </div>
                                                                        <ul class="list-group col-md-12">
                                                                            <?php $__currentLoopData = $dt->showtapphim; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cttt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                                                                    <div class="col-md-1">
                                                                                    <input type="checkbox" class="checkboxclass" name="ids" value="<?php echo e($cttt->id); ?>">
                                                                                    </div>
                                                                                    <div class="col-md-9">
                                                                                        <span><?php echo e($dt->name); ?> - <?php echo e($cttt->episode_name); ?> </span>
                                                                                    </div>
                                                                                    <div class="col-md-2 suaxoa" style="display:flex; justify-content: end;">
                                                                                        <a href="<?php echo e(route('tapphim.show',$cttt->id)); ?>" class="btn btn-primary">xem</a>
                                                                                        <a href="<?php echo e(route('tapphim.edit',$cttt->id)); ?>" class="btn btn-outline-primary">sửa</a>
                                                                                        <a href="<?php echo e(route('tapphim.destroy',$cttt->id)); ?>" class="btn btn-outline-danger btndelete">xóa</a>
                                                                                    </div>
                                                                                </li>
                                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                        </ul>     
                                                                </div>                                                              
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Save changes</button>
                                                    </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <!-- end modal -->
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                            <hr>
                            <div><?php echo e($data->appends(request()->all())->links()); ?></div>
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
                url:'<?php echo e(route("deletetapphim")); ?>',
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
<script>
    jQuery(document).ready(function($){
        $(document).on('click','#autocrawler', function(){
            var id = $(this).is(':checked') ? 1 : 0;
            var _token = $('input[name="_token"]').val();

            $.ajax({
                url:'<?php echo e(route("autophim")); ?>',
                type:"post",
                data:{id:id,_token:_token},
                success:function(data){
                    if(data = 'thanhcongne'){
                        Toastify({
                        text: "thành công",
                        duration: 3000,
                        close:true,
                        backgroundColor: "#4fbe87",
                        }).showToast();
                    }
                }
            });
        })
    });
</script>
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <script src="<?php echo e(asset('assets/vendors/toastify/toastify.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/extensions/toastify.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/vendors/rater-js/rater-js.js')); ?>"></script>
    <script src="{{asset('assets/js/extensions/rater-js.js')}"></script>
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

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/animetvh/domains/animetvh.net/public_html/resources/views/admin/phim/index.blade.php ENDPATH**/ ?>