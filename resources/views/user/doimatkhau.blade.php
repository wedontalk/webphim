@extends('layouts.thongtin')
@section('thongtin')
<div class="container">
  <div class="row">
  <div class="col-12" style="text-align: center">
    @if(Session::has('success'))
      <div class="alert alert-success" role="alert">
      {{session::get('success')}}
    </div>
    @elseif(Session::has('error'))
    <div class="alert alert-danger" role="alert">
    {{session::get('error')}}
    </div>
    @endif
  </div>
    <div class="container">
        <div class="row container">
            <div class="row col-lg-4 col-12 border-right">
                <div class="col-md-12">
                    <div id="thongtin" class="d-flex flex-column align-items-center text-center p-3 py-5">
                        @if(Auth::user()->profile_photo_path)
                        <img class="rounded-circle mt-5" width="150px" src="{{asset('uploads/profile')}}/{{Auth::user()->profile_photo_path}}">
                        @else
                        <img class="rounded-circle mt-5" width="150px" src="{{asset('uploads/logo')}}/logoauto1.jpg">
                        @endif
                        <p class="text-black-50">{{Auth::user()->email}}</p>
                    </div>
                </div>
                <div class="col-md-12">
                    <ul class="list-group">
                        <li class="list-group-item active"><a href="{{route('thongtincanhan')}}">Thông Tin chung</a></li>
                        <li class="list-group-item"><a href="{{route('animedaluu')}}">Anime đã lưu</a></li>
                        <li class="list-group-item"><a href="{{route('binhluanshow')}}">Bình luận của bạn</a></li>
                        <li class="list-group-item"><a href="{{route('doimatkhau')}}">Đổi mật khẩu</a></li>
                        <li class="list-group-item"><a href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Đăng xuất</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-8 col-12">
                <div class="col-md-12 col-12 box-tutien">
                    <h4><center>- Thông tin chung -</center></h4>
                    <!-- <p>Trạng thái tu tiên</p>
                    <span class="level level-current">Luyện khí</span>
                    <span class="level level-next">Tụ đan</span>
                    <div class="progress">
                        <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                    </div> -->
                    <div class="group-info">
                        <div class="label">
                            Họ và Tên :
                        </div>
                        <div class="detail">{{Auth::user()->name}}</div>
                    </div>
                    <div class="group-info">
                        <div class="label">
                            Email :
                        </div>
                        <div class="detail">{{Auth::user()->email}}</div>
                    </div>
                    <!-- <div class="group-info">
                        <div class="label">
                            Loại Hệ Thống :
                        </div>
                        <div class="detail">Tu tiên</div>
                    </div> -->
                </div>
                <div class="col-md-12 mt-3">
                <h4><center>- Đổi Mật Khẩu -</center></h4>
                </div>
                <div class="col-md-12 col-12 mt-3 box-thongbao">
                    <div class="col-12">
                        <form action="{{route('returnpass')}}" role="form" method="POST">
                            @csrf @method('PUT')
                            <div class="form-group">
                                <label for="exampleInputEmail1">Mật Khẩu Cũ</label>
                                <input type="password" class="form-control" name="password_old" id="password_old" placeholder="Nhập Mật Khẩu Cũ">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Mật Khẩu Mới</label>
                                <input type="password" class="form-control" name="password_new" id="password_new" placeholder="Nhập Mật Khẩu Mới">
                            </div>
                            <button type="submit" class="btn btn-primary">Lưu Thông Tin</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>
</div>
<div class="clearfix"></div>
@endsection
