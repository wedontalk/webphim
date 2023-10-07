<?php $__env->startSection('content'); ?>
<section class="login spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 m-auto">
                <div class="login__form form-info">
                    <center><h3>Đăng Ký</h3></center>
                    <form method="POST" action="<?php echo e(route('register')); ?>">
                    <?php echo csrf_field(); ?>
                        <div class="input__item mb-3">
                            <input type="text" id="username" name="name" class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('name')); ?>" required autocomplete="name" autofocus placeholder="Họ và Tên">
                        </div>
                        <div class="input__item mb-3">
                            <input type="email" name="email" id="email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('email')); ?>" required autocomplete="email" placeholder="Email address">
                        </div>
                        <!-- password -->
                        <div class="input__item mb-3">
                            <input type="password" id="password" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password" required autocomplete="new-password" placeholder="Mật khẩu">
                        </div>
                        <!-- xác nhận pass -->
                        <div class="input__item mb-3">
                            <input type="password" id="password-confirm" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password_confirmation" required autocomplete="new-password" placeholder="Xát nhận mật khẩu">
                        </div>
                        <div class="row">
                            <div class="col-7">
                            </div>
                            <div class="col-5">
                                <button type="submit" class="btn btn-primary btn-block">Đăng Ký ngay</button>
                            </div>
                        </div>
                    </form>
                    <?php if(Route::has('password.request')): ?>
                    <p>
                        <a href="<?php echo e(route('password.request')); ?>" class="forget_pass mb-1">Quên mật khẩu</a>
                    </p>
                    <?php endif; ?>
                    <p>
                        <a href="<?php echo e(route('login')); ?>" class="forget_pass mt-1">Đăng Nhập</a>
                    </p>
                </div>
            </div>
        </div>
        <div class="login__social alert">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-1 box-social text-center mt-1">
                    <a href="<?php echo e(route('login-google')); ?>" style="text-decoration:none">
                        <i class="fa-brands fa-google" style="font-size:25px; color:#fff; padding:5px; background-color:#dd4b39;border-radius:5px;text-align:center"></i>
                        <span style="display:block;">google</span>
                    </a>
                </div>
                <div class="col-lg-1 box-social text-center mt-1">
                    <a href="<?php echo e(route('login-facebook')); ?>" style="text-decoration:none">
                        <i class="fa-brands fa-facebook" style="font-size:25px; color:#fff; padding:5px; background-color:#3b5998;border-radius:5px"></i>
                        <span style="display:block;">facebook</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\webphim\resources\views/auth/register.blade.php ENDPATH**/ ?>