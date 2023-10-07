@extends('layouts.thongtin')
@section('css')
<style>
    .ds-comment{
        /* padding: 0px 10px; */
        display:flex;
    }
    .ds-comment div{
        padding:0px 10px;
    }
    .ds-comment div button{
        margin:18px 10px;
    }
    .ds-comment div img{
        max-width:50px;
    }
    .row-comment div:first-child{
        border-bottom: 1px solid;
    }
</style>
@endsection
@section('thongtin')
<div class="container">
  <div class="row">
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
                        <li class="list-group-item"><a href="">Bình luận của bạn</a></li>
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
                <h4><center>- Danh sách bình luận -</center></h4>
                </div>
                <div class="col-md-12 mt-3">
                    @forelse($data as $dt)
                    <div class="alert alert-info" role="alert">
                        <div class="row ds-comment">
                            <div class="col-md-1"><img src="{{asset('uploads')}}/{{$dt->idPhim->image}}" alt="{{$dt->idPhim->image}}"></div>
                            <div class="col-md-9 row-comment">
                                <div class="col-md-12">{{$dt->idPhim->name}} - {{$dt->idEpisode->episode_name}}</div>
                                <div class="col-md-12">{{$dt->content}}</div>
                            </div>
                            <div class="col-md-2">
                                <button class="btn btn-danger">Xóa</button>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="alert alert-warning" role="alert">Bạn chưa có bình luận nào cả !</div>
                    @endforelse
                    <div class="clearfix"></div>
                    <div class="text-align" style="text-align:center">
                        {{$data->appends(request()->all())->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>
</div>
<div class="clearfix"></div>
@endsection