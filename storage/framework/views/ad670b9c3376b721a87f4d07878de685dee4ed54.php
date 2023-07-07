
<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendors/toastify/toastify.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendors/dripicons/webfont.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/pages/dripicons.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/app.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendors/perfect-scrollbar/perfect-scrollbar.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendors/choices.js/choices.min.css')); ?>" />
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
                            <div class="col-sm-3">
                                <h4 class="card-title">Danh mục</h4>
                            </div>
                            <div class="col-sm-5">
                                <div class="form-group">
                                    <select class="choices form-select" name="sort" id="sort">
                                    <option value="<?php echo e(Request::url()); ?>?key=tatcacrawler"> </option>
                                        <?php $__currentLoopData = $data1; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dtn): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e(Request::url()); ?>?key=<?php echo e($dtn->id); ?>"><?php echo e($dtn->linkphim->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <?php $__currentLoopData = $crawlerauto; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $crat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="form-check form-switch mt-2">
                                    <input class="form-check-input" type="checkbox" <?php echo e(($crat->name == 1) ? 'checked':''); ?> value="<?php echo e($crat->name); ?>" id="autocrawler">
                                    <label class="form-check-label" for="autocrawler">chạy crawler</label>
                                </div>  
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                            <div class="col-sm-2">
                                <button style="float:right" class="btn btn-outline-dark" id="deleteAllselected">x - delete All</button>
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
                                        <th>phim</th>
                                        <th>link tập phim</th>
                                        <th>trạng thái</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr id="sid<?php echo e($dt->id); ?>">
                                    <td><input type="checkbox" class="checkboxclass" name="ids" value="<?php echo e($dt->id); ?>"></td>
                                        <td class="text-bold-500"><?php echo e($dt->id); ?></td>
                                        <td id="layid" data-idphim="<?php echo e($dt->id_phim); ?>"><?php echo e($dt->linkphim->name); ?></td>
                                        <td class="text-bold-500"><?php echo e($dt->link_tapphim); ?></td>
                                        <td>
                                        <select class="form-select badge bg-primary" id="dangchay" data-id="<?php echo e($dt->id); ?>" data-idphim="<?php echo e($dt->id_phim); ?>">
                                            <option <?php echo e(($dt->action == 1) ? 'selected':''); ?> value="1">đang chạy  </option>
                                            <option <?php echo e(($dt->action == 2) ? 'selected':''); ?> value="2">dừng chạy  </option>
                                        </select>
                                        </td>
                                        <td style="width:200px">
                                        <a onclick="window.open('<?php echo e(route('crawler.show',$dt->id_phim)); ?>')" class="btn btn-outline-primary">chạy</a>
                                        <a href="<?php echo e(route('crawler.edit',$dt->id)); ?>" class="btn btn-outline-primary">sửa</a>
                                        <a href="<?php echo e(route('crawler.destroy',$dt->id)); ?>" class="btn btn-outline-danger btndelete">xóa</a>
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
<script>
    jQuery(document).ready(function($){
        $(document).on('change','#dangchay', function(){
            var id = $(this).data("id");
            var val = $(this).val();
            var idphim = $(this).data("idphim");
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url:'<?php echo e(route("chaycrawler")); ?>',
                type:"post",
                data:{id:id,val:val,idphim:idphim,_token:_token},
                success:function(data){
                    if(data = 'done'){
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
<script src="<?php echo e(asset('assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/main.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/bootstrap.bundle.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/vendors/choices.js/choices.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/vendors/jquery/jquery.min.js')); ?>"></script>
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
<script>
    jQuery(document).ready(function($){
        $(document).on('click','#autocrawler', function(){
            var id = $(this).is(':checked') ? 1 : 0;
            var _token = $('input[name="_token"]').val();

            $.ajax({
                url:'<?php echo e(route("autocrawler")); ?>',
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/animetvh/domains/animetvh.net/public_html/resources/views/admin/crawler/index.blade.php ENDPATH**/ ?>