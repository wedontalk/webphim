<?php
  $menu = config('menuadm');

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Mazer Admin Dashboard</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/bootstrap.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendors/iconly/bold.css')); ?>">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <?php echo $__env->yieldContent('css'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendors/perfect-scrollbar/perfect-scrollbar.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendors/bootstrap-icons/bootstrap-icons.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/app.css')); ?>">
    <link rel="shortcut icon" href="<?php echo e(asset('assets/images/favicon.svg')); ?>" type="image/x-icon">
</head>

<body onload="ChangeToSlug();">
    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <div class="d-flex justify-content-between">
                        <div class="logo">
                            <a href="<?php echo e(route('home.index')); ?>"><img src="<?php echo e(asset('assets/images/logo/logo.png')); ?>" alt="Logo" srcset=""></a>
                        </div>
                        <div class="toggler">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">
                        <li class="sidebar-title">Menu</li>

                        <li class="sidebar-item active ">
                            <a href="<?php echo e(route('admin.dashboard')); ?>" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Trang Chủ</span>
                            </a>
                        </li>
                        <?php $__currentLoopData = $menu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mn): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li class="sidebar-item  has-sub">
                            <a href="<?php echo e(route($mn['route'])); ?>" class='sidebar-link'>
                                <i class="<?php echo e($mn['icon']); ?>"></i>
                                <span><?php echo e($mn['label']); ?></span>
                            </a>
                            <?php if(isset($mn['items'])): ?>
                            <ul class="submenu ">
                                <?php $__currentLoopData = $mn['items']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>                         
                                <li class="submenu-item ">
                                    <a href="<?php echo e(route($item['route'])); ?>"><?php echo e($item['label']); ?></a>
                                </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                            <?php endif; ?>
                        </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>
        <?php echo $__env->yieldContent('main'); ?>
    </div>
    <script src="<?php echo e(asset('assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/bootstrap.bundle.min.js')); ?>"></script>
    <?php echo $__env->yieldContent('js'); ?>
    <script src="<?php echo e(asset('assets/vendors/apexcharts/apexcharts.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/pages/dashboard.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/vendors/fontawesome/all.min.js')); ?>"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="<?php echo e(asset('assets/js/main.js')); ?>"></script>
    <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
</body>
<script>
jQuery(document).ready(function($) {
    chart7day();
  var chart = new Morris.Bar({
        element: 'myfirstchart',
        // option thống kê
        barColors: ['#435ebe', '#fc8710','#FF6541','#A4ADD3'],
        gridTextColor:['#000000'],
        // pointFillColors: ['#ffffff'],
        // pointStrokeColors:['black'],
        fillOpacity:0.8,
        hideHover: 'auto',
        parseTime: false,

        xkey: 'name',
        ykeys: ['view'],
        // behaveLikeLine: true,

        labels: ['lượt xem']
    });

// autoload 30 ngày đơn hàng
    function chart7day(){
    var _token = $('input[name="_token"]').val();
    $.ajax({
        url:'<?php echo e(url('/admin/order-date')); ?>',
        method:"post",
        dataType:"JSON",
        data:{_token:_token},

        success:function(data)
        {
            chart.setData(data);
        }
    });
}
// lọc theo select
$('.dashboard-filter').change(function(){
        var dashboard_value = $(this).val();
        var _token = $('input[name="_token"]').val();
        $.ajax({
            url:'<?php echo e(url('/admin/dashboard-filter')); ?>',
            method:"post",
            dataType:"JSON",
            data:{dashboard_value:dashboard_value , _token:_token},
            success:function(data)
            {
                chart.setData(data);
            }
        });
    });

// onclick lọc theo ngày tháng
    $('#btn-dashboard-filter').on('click',function(){
            var from_date = $('#datepicker').val();
            var to_date = $('#datepicker2').val();
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url:'<?php echo e(url('/admin/filter-by-date')); ?>',
                method:"post",
                dataType:"JSON",
                data:{from_date:from_date ,to_date:to_date, _token:_token },

                success:function(data)
                {
                    chart.setData(data);
                }
            });
        });

});

</script>
<script>
  $( function() {
    $( "#datepicker" ).datepicker({ dateFormat: 'yy-mm-dd' });
  } );
</script>
<script>
  $( function() {
    $( "#datepicker2" ).datepicker({ dateFormat: 'yy-mm-dd' });
  } );
  </script>
</html><?php /**PATH C:\xampp\htdocs\webphim\resources\views/layouts/admin.blade.php ENDPATH**/ ?>