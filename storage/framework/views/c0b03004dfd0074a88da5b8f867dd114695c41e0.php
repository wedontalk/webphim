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
                                        <input type="text" class="form-control" id="search" placeholder="Tìm kiếm phim" name="key">
                                        <div class="form-control-icon">
                                            <a type="submit"><i class="icon dripicons-search"></i></a>
                                        </div>
                                        <div id="result" class="thongtin_anhien">
                                            <p>Thông tin phim</p>
                                        </div>
                                    </form>
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
                                        <th style="width:100px">Image</th>
                                        <th>Name</th>
                                        <th>Slug</th>
                                        <th>Tập mới nhất</th>
                                        <th>Trạng thái</th>
                                        <th>ACTION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $dt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td class="text-bold-500"><?php echo e($key); ?></td>
                                        <td><img src="<?php echo e(asset('uploads')); ?>/<?php echo e($dt->image); ?>" alt="" width="100px" height="100px"></td>
                                        <td><?php echo e($dt->name); ?></td>
                                        <td class="text-bold-500"><?php echo e($dt->slug); ?></td>
                                        <td><?php echo e($dt->showphimfirst->max('episode')); ?></td>
                                        <td>
                                            <span class="badge bg-primary">
                                                <?php if($dt->anHien == 1): ?> 
                                                    Hiện 
                                                <?php else: ?> 
                                                    Ẩn 
                                                <?php endif; ?>
                                            </span>
                                        </td>
                                        <td style="width:200px">
                                        <a href="<?php echo e(route('phim.show',$dt->id)); ?>" class="btn btn-primary">Xem</a>
                                        <a href="<?php echo e(route('phim.edit',$dt->id)); ?>" class="btn btn-outline-primary">sửa</a>
                                        <a href="<?php echo e(route('phim.destroy',$dt->id)); ?>" class="btn btn-outline-danger btndelete">xóa</a>
                                        </td>

                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
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


<!-- ajax load -->
<div id="overlay">
    <div class="cv-spinner">
        <span class="spinner"></span>
    </div>
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

    function delay(callback, ms) {
        var timer = 0;
        return function() {
            var context = this, args = arguments;
            clearTimeout(timer);
            timer = setTimeout(function () {
            callback.apply(context, args);
            }, ms || 0);
        };
    }

    $(document).ready(function(){
        $('#search').keyup(delay(function (e){
        $('#result').html('');
        var search = $('#search').val();
        // alert(search);
        var timer = 0;
        if(search != ''){
                var expression = new RegExp(search, "i");
                $.getJSON('/json_file/movies.json', function(data){
                    $.each(data, function(key, value){
                        if(value.name.search(expression) != -1){
                            $('#result').css('display','inherit');
                            $('#result').append('<div class="search-item"><img class="img_search" src="/uploads/'+value.image+'" alt="'+value.name+'"><a href="phim/'+ value.id +'">'+ value.name +'</a></div>')
                        }
                    })
                })
            
        }else{
            $('#result').css('display','none')
        }
        }, 700))


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
<script defer>
// Simple Datatable
    let table1 = document.querySelector('#table1');
    let dataTable = new simpleDatatables.DataTable(table1);
    $('#table1').DataTable({
    "pageLength": 3
});
</script>
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

<script>
jQuery(document).ready(function($){
    $(document).ajaxSend(function() {
        $("#overlay").fadeIn(300);
    });
    $(document).on('click','#button',function(ev){
        ev.preventDefault();
        var idtapphim = $(this).data('idtapphim');
        var _token = $('input[name="_token"]').val();
        $.ajax({
                url:'<?php echo e(Route("themtapphimtudong")); ?>',
                method:'post',
                data:{
                    idtapphim:idtapphim,_token:_token,
                },
                success: function(data){
                    if(data){
                        alertify.success('thành công !');
                    }
                }
            }).done(function() {
                setTimeout(function(){
                    $("#overlay").fadeOut(300);
                    // window.location.reload(true);
                },500);
            });
    })
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
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\animetvh\resources\views/admin/phim/index.blade.php ENDPATH**/ ?>