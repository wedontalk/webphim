<?php $__env->startSection('content'); ?>
<section class="login spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 m-auto">
                    <div class="login__form form-info">
                        <center><h3>Login</h3></center>
                        <form method="POST" action="<?php echo e(route('login')); ?>">
                        <?php echo csrf_field(); ?>
                            <div class="input__item">
                                <input type="email" name="email" id="email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('email')); ?>" required autocomplete="email" placeholder="Email address">
                                <!-- <span class="icon_mail"></span> -->
                                <label class="notifyerror" style="visibility: hidden; height: 0px" id="emailerror">Email không đúng định dạng name@domain</label>
                            </div>
                            <div class="input__item position-relative">
                                <input type="password" id="password" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password" required autocomplete="new-password" placeholder="Password">
                                <!-- <span class="icon_lock"></span> -->
                                <div class="hide_pass">
                                    <i class="fa-solid fa-eye-slash"></i>
                                </div>
                                <div class="show_pass">
                                    <i class="fa-solid fa-eye"></i>
                                </div>
                                <label class="notifyerror" style="visibility: hidden; height: 0px" id="password1error">Mật khẩu phải bao gồm chữ thường, chữ hoa và số, độ dài tối thiểu 8 ký tự</label>
                            </div>
                            <div class="row">
                                <div class="col-7">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="checkbox">
                                        <label class="form-check-label" for="exampleCheck1">Ghi nhớ</label>
                                    </div>
                                </div>
                                <div class="col-5">
                                    <button type="submit" class="btn btn-primary btn-block">Đăng nhập ngay</button>
                                </div>
                            </div>
                        </form>
                        <?php if(Route::has('password.request')): ?>
                        <p>
                            <a href="<?php echo e(route('password.request')); ?>" class="forget_pass mb-1">Quên mật khẩu</a>
                        </p>
                        <?php endif; ?>
                        <p>
                            <a href="<?php echo e(route('register')); ?>" class="forget_pass mt-1">Đăng ký tài khoản</a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="login__social">
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-6">

                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\animetvh\resources\views/auth/login.blade.php ENDPATH**/ ?>