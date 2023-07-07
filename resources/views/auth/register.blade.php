@extends('layouts.app')
@section('content')
<section class="normal-breadcrumb set-bg" data-setbg="{{asset('user/img/normal-breadcrumb.jpg')}}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="normal__breadcrumb__text">
                        <h2>Sign Up</h2>
                        <p>Welcome to the official Anime blog.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="signup spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="login__form">
                        <h3>Sign Up</h3>
                        <form method="POST" action="{{ route('register') }}">
                          @csrf
                            <div class="input__item">
                                <input type="text" class="@error('name') is-invalid @enderror" id="username" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Họ và Tên">
                                <span class="icon_profile"></span>
                                <label class="notifyerror" style="visibility: hidden; height: 0px; color:#fff;" id="usernameerror">Tên tài khoản chỉ bao gồm ký tự a-z, A-Z và số</label>
                            </div>
                            <div class="input__item">
                                <input type="email" name="email" id="email" class="@error('email') is-invalid @enderror" value="{{ old('email') }}" required autocomplete="email" placeholder="Email address">
                                <span class="icon_mail"></span>
                                <label class="notifyerror" style="visibility: hidden; height: 0px" id="emailerror">Email không đúng định dạng name@domain</label>  
                            </div>
                            <div class="input__item">
                                <input type="password" id="password1" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Mật khẩu">
                                <span class="icon_lock"></span>
                                <label class="notifyerror" style="visibility: hidden; height: 0px" id="password1error">Mật khẩu phải bao gồm chữ thường, chữ hoa và số, độ dài tối thiểu 8 ký tự</label>
                            </div>
                            <div class="input__item">
                                <input type="password" id="password-confirm" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Xát nhận mật khẩu">
                                <span class="icon_lock"></span>
                                <label class="notifyerror" style="visibility: hidden; height: 0px" id="password2error1">Mật khẩu phải bao gồm chữ thường, chữ hoa và số, độ dài tối thiểu 8 ký tự</label>
                            </div>
                            <button type="submit" class="site-btn">Login Now</button>
                        </form>
                        <h5>Already have an account? <a href="{{route('login')}}">Log In!</a></h5>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="login__social__links">
                        <h3>Login With:</h3>
                        <ul>
                            <li><a href="#" class="facebook"><i class="fa fa-facebook"></i> Sign in With Facebook</a>
                            </li>
                            <li><a href="#" class="google"><i class="fa fa-google"></i> Sign in With Google</a></li>
                            <li><a href="#" class="twitter"><i class="fa fa-twitter"></i> Sign in With Twitter</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection