<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Mazer Admin Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/bootstrap.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendors/bootstrap-icons/bootstrap-icons.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/app.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/pages/auth.css')); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/js/all.min.js" integrity="sha512-rpLlll167T5LJHwp0waJCh3ZRf7pO6IT1+LZOhAyP6phAirwchClbTZV3iqL3BMrVxIYRbzGTpli4rfxsCK6Vw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<body>
    <div id="auth">
        <div class="row h-100">
            <!-- <div class="auth-logo">
                <a href="<?php echo e(route('home.index')); ?>"><img src="<?php echo e(asset('wp-content/uploads/logo1-kenhanime.png')); ?>" alt="Logo" width="100px" height="70px"></a>
            </div> -->
            <div class="col-lg-6 col-12 m-auto">
                <div id="auth-left">
                    <center><h3 class="auth-title" style="font-size:2em; color:#fff">ĐĂNG NHẬP</h3></center>
                    <form method="POST" action="<?php echo e(route('login')); ?>">
                        <?php echo csrf_field(); ?>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="text" name="email" id="email" value="<?php echo e(old('email')); ?>" class="form-control form-control-xl" placeholder="Username">
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <div class="hide_pass">
                                <i class="fa-solid fa-eye-slash"></i>
                            </div>
                            <div class="show_pass">
                                <i class="fa-solid fa-eye"></i>
                            </div>
                            <input type="password" id="password" class="form-control form-control-xl" name="password" required autocomplete="new-password" placeholder="Password">
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                        </div>
                        <button class="btn btn-primary btn-block btn-lg shadow-lg">Đăng Nhập</button>
                    </form>
                </div>
            </div>
        </div>

    </div>
</body>
<script>
    jQuery(document).ready(function(){
        $('.show_pass').on('click', function(){
                $('#password').attr('type', 'text');
                $(this).hide();
                $('.hide_pass').show();
        })
        $('.hide_pass').on('click', function(){
                $('#password').attr('type', 'password');
                $('.show_pass').show();
                $(this).hide();
        })
    });
</script>
</html><?php /**PATH C:\xampp\htdocs\webphim\resources\views/admin/account/login.blade.php ENDPATH**/ ?>