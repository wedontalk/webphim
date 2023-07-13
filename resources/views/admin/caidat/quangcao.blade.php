@extends('layouts.admin')
@section('css')
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
<link rel="stylesheet" href="{{asset('assets/vendors/toastify/toastify.css')}}">
<script src="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>
<link rel="stylesheet" href="{{asset('assets/vendors/summernote/summernote-lite.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/vendors/choices.js/choices.min.css')}}" />
<!-- <link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet">
<link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css" rel="stylesheet"> -->
<link href="//cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
<style>
    .label-info{
        background: linear-gradient(to right, #4b79a1, #283e51);
    }
    .bootstrap-tagsinput{
        width: 100%;
        padding: 10px;
    }
    .bootstrap-tagsinput .tag{
        border-radius:5px;
        padding:3px 5px 3px 5px;
    }
</style>
@endsection
@section('main')
<div id="main">
    <!-- <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header> -->
    <section class="section">
        <div class="page-heading">
            <div class="page-title">
                <div class="row">
                    <div class="col-12 col-md-6 order-md-1 order-last">
                        <h3>Quản lý trang quảng cáo</h3>
                        <p class="text-subtitle text-muted">quản lí quảng cáo cho website.</p>
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Quản lý quảng cáo</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="row match-height">
                    <div class="col-md-12 col-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="row d-flex">
                                    <div class="col-md-8">
                                        <h4 class="card-title">Tùy chọn quảng cáo</h4>
                                    </div>
                                    <div class="col-md-4 d-flex flex-row-reverse">
                                        <a href="{{route('caidat.showquangcao')}}" class="btn-sm btn-warning">
                                            Danh sách quảng cáo <span class="badge bg-transparent"></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-12 col-md-3">
                                            <div class="list-group" id="list-tab" role="tablist">
                                            <a class="list-group-item list-group-item-action active" id="list-trangchu-list" data-toggle="list" href="#list-trangchu" role="tab" aria-controls="trangchu">Trang chủ</a>
                                            <a class="list-group-item list-group-item-action" id="list-danhmuc-list" data-toggle="list" href="#list-danhmuc" role="tab" aria-controls="danhmuc">Trang Danh mục</a>
                                            <a class="list-group-item list-group-item-action" id="list-timkiem-list" data-toggle="list" href="#list-timkiem" role="tab" aria-controls="timkiem">Trang Tìm kiếm</a>
                                            <a class="list-group-item list-group-item-action" id="list-chitiet-list" data-toggle="list" href="#list-chitiet" role="tab" aria-controls="chitiet">Trang chi tiết</a>
                                            <a class="list-group-item list-group-item-action" id="list-video-list" data-toggle="list" href="#list-video" role="tab" aria-controls="video">Trang xem video</a>
                                            </div>
                                            <div class="form-group mt-3">
                                                <img src="" id="show_img" alt="" style="width:100%; height:100%; display:none">
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-9">
                                            <div class="tab-content" id="nav-tabContent">
                                            <div class="tab-pane fade show active" id="list-trangchu" role="tabpanel" aria-labelledby="list-trangchu-list">
                                                <div class="row">
                                                    <div class="col-md-12" style=" border-radius: 5px; box-shadow: rgba(0, 0, 0, 0.02) 0px 1px 3px 0px, rgba(27, 31, 35, 0.15) 0px 0px 0px 1px;">
                                                        <div class="row">
                                                            <div class="col">
                                                                <div class="" id="bannerheader">
                                                                    <form action="{{route('postadshome')}}" method="POST" role="form" enctype="multipart/form-data">
                                                                        @csrf
                                                                        <div class="card card-body">
                                                                            <div id="form-banner-trangchu-maytinh" class="col-md-12 mt-2">
                                                                            <div class="divider">
                                                                                <div class="divider-text"><h5>Quảng cáo dành cho trang chủ</h5></div>
                                                                            </div>
                                                                                <hr>

                                                                                <!-- link -->
                                                                                <div class="form-group mt-2">
                                                                                    <label for="">Link quảng cáo</label>
                                                                                    <input type="text" class="form-control" name="link" placeholder="Link quảng cáo">
                                                                                </div>
                                                                                <!-- images -->
                                                                                <div class="form-group">
                                                                                    <label for="exampleInputPassword1">Images</label>
                                                                                    <!-- <input type="file" onchange="onFileSelected()" class="image-preview-filepond" name="filepond" accept="image/png, image/jpeg, image/gif" data-allow-reorder="true" data-max-file-size="3MB" data-max-files="3"> -->
                                                                                    <input type="file" id="setimg" name="file_upload" class="form-control">
                                                                                </div>
                                                                                <!-- chọn chỗ để quảng cáo -->
                                                                                <div class="form-group">
                                                                                    <label for="">Chọn loại thông báo</label>
                                                                                    <select class="form-control" name="id_hienthi" id="select-hienthi">
                                                                                        <option value="" selected>- Chọn Loại Hiễn Thị -</option>
                                                                                        <optgroup label="banner">
                                                                                            <option value="1">Banner header</option>
                                                                                            <option value="3">Banner footer</option>
                                                                                        </optgroup>
                                                                                        <optgroup label="Thông báo">
                                                                                            <option value="5">Khung thông báo (modal)</option>
                                                                                        </optgroup>
                                                                                    </select>
                                                                                </div>
                                                                                <!-- check hoạt động -->
                                                                                <div class="form-check form-check-inline">
                                                                                    <input class="form-check-input form-check-success" type="radio" name="trang_thai" id="inlineRadio1" value="1" checked>
                                                                                    <label class="form-check-label" for="inlineRadio1">Bật trạng thái</label>
                                                                                </div>
                                                                                <div class="form-check form-check-inline">
                                                                                    <input class="form-check-input form-check-danger" type="radio" name="trang_thai" id="inlineRadio2" value="2">
                                                                                    <label class="form-check-label" for="inlineRadio2">Tắt trạng thái</label>
                                                                                </div>
                                                                                <div class="form-group mt-3">
                                                                                    <button type="submit" class="btn btn-primary">Đăng quảng cáo</button>
                                                                                </div>
                                                                                <!-- submit -->
                                                                            </div>

                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end trang chủ -->
                                            <div class="tab-pane fade" id="list-danhmuc" role="tabpanel" aria-labelledby="list-danhmuc-list">
                                                <div class="row">
                                                        <div class="col-md-12" style=" border-radius: 5px; box-shadow: rgba(0, 0, 0, 0.02) 0px 1px 3px 0px, rgba(27, 31, 35, 0.15) 0px 0px 0px 1px;">
                                                            <div class="row">
                                                                <div class="col">
                                                                    <div class="" id="bannerheader">
                                                                        <form action="{{route('postadsdanhmuc')}}" method="POST" role="form" enctype="multipart/form-data">
                                                                            @csrf
                                                                            <div class="card card-body">
                                                                                <div id="form-banner-trangchu-maytinh" class="col-md-12 mt-2">
                                                                                <div class="divider">
                                                                                    <div class="divider-text"><h5>Quảng cáo cho trang danh mục</h5></div>
                                                                                </div>
                                                                                    <hr>
                                                                                    <!-- dành cho -->
                                                                                    <label for="">Loại Thông báo dành cho : </label>
                                                                                    <select class="form-control alert-primary" name="loai_hienthi" id="selectchange" style="text-align:center">
                                                                                        <option value="" selected>- Chế độ hiễn thị -</option>
                                                                                        <option value="1">Máy tính</option>
                                                                                        <option value="2">Ipad</option>
                                                                                        <option value="3">Điện thoại</option>
                                                                                    </select>
                                                                                    <!-- link -->
                                                                                    <div class="form-group mt-2">
                                                                                        <label for="">Link quảng cáo</label>
                                                                                        <input type="text" class="form-control" name="link" placeholder="Link quảng cáo">
                                                                                    </div>
                                                                                    <!-- images -->
                                                                                    <div class="form-group">
                                                                                        <label for="exampleInputPassword1">Images</label>
                                                                                        <!-- <input type="file" onchange="onFileSelected()" class="image-preview-filepond" name="filepond" accept="image/png, image/jpeg, image/gif" data-allow-reorder="true" data-max-file-size="3MB" data-max-files="3"> -->
                                                                                        <input type="file" id="setimg" name="file_upload" class="form-control">
                                                                                    </div>
                                                                                    <!-- chọn chỗ để quảng cáo -->
                                                                                    <div class="form-group">
                                                                                        <label for="">Chọn loại thông báo</label>
                                                                                        <select class="form-control" name="id_hienthi" id="select-hienthi">
                                                                                            <option value="" selected>- Chọn Loại Hiễn Thị -</option>
                                                                                            <optgroup label="banner">
                                                                                                <option value="1">Banner header</option>
                                                                                                <option value="2">Banner danh mục</option>
                                                                                                <option value="3">Banner footer</option>
                                                                                            </optgroup>
                                                                                            <optgroup label="Thông báo">
                                                                                                <option value="5">Khung thông báo (modal)</option>
                                                                                            </optgroup>
                                                                                        </select>
                                                                                    </div>
                                                                                    <!-- check hoạt động -->
                                                                                    <div class="form-check form-check-inline">
                                                                                        <input class="form-check-input form-check-success" type="radio" name="trang_thai" id="inlineRadio1" value="1" checked>
                                                                                        <label class="form-check-label" for="inlineRadio1">Bật trạng thái</label>
                                                                                    </div>
                                                                                    <div class="form-check form-check-inline">
                                                                                        <input class="form-check-input form-check-danger" type="radio" name="trang_thai" id="inlineRadio2" value="2">
                                                                                        <label class="form-check-label" for="inlineRadio2">Tắt trạng thái</label>
                                                                                    </div>
                                                                                    <div class="form-group mt-3">
                                                                                        <button type="submit" class="btn btn-primary">Đăng quảng cáo</button>
                                                                                    </div>
                                                                                    <!-- submit -->
                                                                                </div>

                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                </div>
                                            </div>
                                            <!-- end trang danh mục -->
                                            <div class="tab-pane fade" id="list-timkiem" role="tabpanel" aria-labelledby="list-timkiem-list">
                                                <div class="row">
                                                    <div class="col-md-12" style=" border-radius: 5px; box-shadow: rgba(0, 0, 0, 0.02) 0px 1px 3px 0px, rgba(27, 31, 35, 0.15) 0px 0px 0px 1px;">
                                                        <div class="row">
                                                            <div class="col">
                                                                <div class="" id="bannerheader">
                                                                    <form action="{{route('postadstimkiem')}}" method="POST" role="form" enctype="multipart/form-data">
                                                                        @csrf
                                                                        <div class="card card-body">
                                                                            <div id="form-banner-trangchu-maytinh" class="col-md-12 mt-2">
                                                                            <div class="divider">
                                                                                <div class="divider-text"><h5>Quảng cáo cho trang tìm kiếm</h5></div>
                                                                            </div>
                                                                                <hr>

                                                                                <!-- link -->
                                                                                <div class="form-group mt-2">
                                                                                    <label for="">Link quảng cáo</label>
                                                                                    <input type="text" class="form-control" name="link" placeholder="Link quảng cáo">
                                                                                </div>
                                                                                <!-- images -->
                                                                                <div class="form-group">
                                                                                    <label for="exampleInputPassword1">Images</label>
                                                                                    <!-- <input type="file" onchange="onFileSelected()" class="image-preview-filepond" name="filepond" accept="image/png, image/jpeg, image/gif" data-allow-reorder="true" data-max-file-size="3MB" data-max-files="3"> -->
                                                                                    <input type="file" id="setimg" name="file_upload" class="form-control">
                                                                                </div>
                                                                                <!-- chọn chỗ để quảng cáo -->
                                                                                <div class="form-group">
                                                                                    <label for="">Chọn loại thông báo</label>
                                                                                    <select class="form-control" name="id_hienthi" id="select-hienthi">
                                                                                        <option value="" selected>- Chọn Loại Hiễn Thị -</option>
                                                                                        <optgroup label="banner">
                                                                                            <option value="1">Banner header</option>
                                                                                            <option value="2">Banner danh mục</option>
                                                                                            <option value="3">Banner footer</option>
                                                                                        </optgroup>
                                                                                        <optgroup label="Thông báo">
                                                                                            <option value="5">Khung thông báo (modal)</option>
                                                                                        </optgroup>
                                                                                    </select>
                                                                                </div>
                                                                                <!-- check hoạt động -->
                                                                                <div class="form-check form-check-inline">
                                                                                    <input class="form-check-input form-check-success" type="radio" name="trang_thai" id="inlineRadio1" value="1" checked>
                                                                                    <label class="form-check-label" for="inlineRadio1">Bật trạng thái</label>
                                                                                </div>
                                                                                <div class="form-check form-check-inline">
                                                                                    <input class="form-check-input form-check-danger" type="radio" name="trang_thai" id="inlineRadio2" value="2">
                                                                                    <label class="form-check-label" for="inlineRadio2">Tắt trạng thái</label>
                                                                                </div>
                                                                                <div class="form-group mt-3">
                                                                                    <button type="submit" class="btn btn-primary">Đăng quảng cáo</button>
                                                                                </div>
                                                                                <!-- submit -->
                                                                            </div>

                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end trang tìm kiếm -->
                                            <div class="tab-pane fade" id="list-chitiet" role="tabpanel" aria-labelledby="list-chitiet-list">
                                                <div class="row">
                                                    <div class="col-md-12" style=" border-radius: 5px; box-shadow: rgba(0, 0, 0, 0.02) 0px 1px 3px 0px, rgba(27, 31, 35, 0.15) 0px 0px 0px 1px;">
                                                        <div class="row">
                                                            <div class="col">
                                                                <div class="" id="bannerheader">
                                                                    <form action="{{route('postadschitiet')}}" method="POST" role="form" enctype="multipart/form-data">
                                                                        @csrf
                                                                        <div class="card card-body">
                                                                            <div id="form-banner-trangchu-maytinh" class="col-md-12 mt-2">
                                                                            <div class="divider">
                                                                                <div class="divider-text"><h5>Quảng cáo trang chi tiết</h5></div>
                                                                            </div>
                                                                                <hr>

                                                                                <!-- link -->
                                                                                <div class="form-group mt-2">
                                                                                    <label for="">Link quảng cáo</label>
                                                                                    <input type="text" class="form-control" name="link" placeholder="Link quảng cáo">
                                                                                </div>
                                                                                <!-- images -->
                                                                                <div class="form-group">
                                                                                    <label for="exampleInputPassword1">Images</label>
                                                                                    <!-- <input type="file" onchange="onFileSelected()" class="image-preview-filepond" name="filepond" accept="image/png, image/jpeg, image/gif" data-allow-reorder="true" data-max-file-size="3MB" data-max-files="3"> -->
                                                                                    <input type="file" id="setimg" name="file_upload" class="form-control">
                                                                                </div>
                                                                                <!-- chọn chỗ để quảng cáo -->
                                                                                <div class="form-group">
                                                                                    <label for="">Chọn loại thông báo</label>
                                                                                    <select class="form-control" name="id_hienthi" id="select-hienthi">
                                                                                        <option value="" selected>- Chọn Loại Hiễn Thị -</option>
                                                                                        <optgroup label="banner">
                                                                                            <option value="1">Banner header</option>
                                                                                            <option value="2">Banner Danh mục</option>
                                                                                            <option value="3">Banner footer</option>
                                                                                        </optgroup>
                                                                                        <optgroup label="Thông báo">
                                                                                            <option value="5">Khung thông báo (modal)</option>
                                                                                        </optgroup>
                                                                                    </select>
                                                                                </div>
                                                                                <!-- check hoạt động -->
                                                                                <div class="form-check form-check-inline">
                                                                                    <input class="form-check-input form-check-success" type="radio" name="trang_thai" id="inlineRadio1" value="1" checked>
                                                                                    <label class="form-check-label" for="inlineRadio1">Bật trạng thái</label>
                                                                                </div>
                                                                                <div class="form-check form-check-inline">
                                                                                    <input class="form-check-input form-check-danger" type="radio" name="trang_thai" id="inlineRadio2" value="2">
                                                                                    <label class="form-check-label" for="inlineRadio2">Tắt trạng thái</label>
                                                                                </div>
                                                                                <div class="form-group mt-3">
                                                                                    <button type="submit" class="btn btn-primary">Đăng quảng cáo</button>
                                                                                </div>
                                                                                <!-- submit -->
                                                                            </div>

                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end trang chi tiết -->
                                            <div class="tab-pane fade" id="list-video" role="tabpanel" aria-labelledby="list-video-list">
                                                <div class="row">
                                                    <div class="col-md-12" style=" border-radius: 5px; box-shadow: rgba(0, 0, 0, 0.02) 0px 1px 3px 0px, rgba(27, 31, 35, 0.15) 0px 0px 0px 1px;">
                                                        <div class="row">
                                                            <div class="col">
                                                                <div class="" id="bannerheader">
                                                                    <form action="{{route('postadsvideo')}}" method="POST" role="form" enctype="multipart/form-data">
                                                                        @csrf
                                                                        <div class="card card-body">
                                                                            <div id="form-banner-trangchu-maytinh" class="col-md-12 mt-2">
                                                                            <div class="divider">
                                                                                <div class="divider-text"><h5>Quảng cáo cho trang xem video</h5></div>
                                                                            </div>
                                                                                <hr>

                                                                                <!-- link -->
                                                                                <div class="form-group mt-2">
                                                                                    <label for="">Link quảng cáo</label>
                                                                                    <input type="text" class="form-control" name="link" placeholder="Link quảng cáo">
                                                                                </div>
                                                                                <!-- images -->
                                                                                <div class="form-group">
                                                                                    <label for="exampleInputPassword1">Images</label>
                                                                                    <!-- <input type="file" onchange="onFileSelected()" class="image-preview-filepond" name="filepond" accept="image/png, image/jpeg, image/gif" data-allow-reorder="true" data-max-file-size="3MB" data-max-files="3"> -->
                                                                                    <input type="file" id="setimg" name="file_upload" class="form-control">
                                                                                </div>
                                                                                <!-- chọn chỗ để quảng cáo -->
                                                                                <div class="form-group">
                                                                                    <label for="">Chọn loại thông báo</label>
                                                                                    <select class="form-control" name="id_hienthi" id="select-hienthi">
                                                                                        <option value="" selected>- Chọn Loại Hiễn Thị -</option>
                                                                                        <optgroup label="banner">
                                                                                            <option value="1">Banner header</option>
                                                                                            <option value="2">Banner danh mục</option>
                                                                                            <option value="3">Banner footer</option>
                                                                                        </optgroup>
                                                                                        <optgroup label="Thông báo">
                                                                                            <option value="5">Khung thông báo (modal)</option>
                                                                                        </optgroup>
                                                                                    </select>
                                                                                </div>
                                                                                <!-- check hoạt động -->
                                                                                <div class="form-check form-check-inline">
                                                                                    <input class="form-check-input form-check-success" type="radio" name="trang_thai" id="inlineRadio1" value="1" checked>
                                                                                    <label class="form-check-label" for="inlineRadio1">Bật trạng thái</label>
                                                                                </div>
                                                                                <div class="form-check form-check-inline">
                                                                                    <input class="form-check-input form-check-danger" type="radio" name="trang_thai" id="inlineRadio2" value="2">
                                                                                    <label class="form-check-label" for="inlineRadio2">Tắt trạng thái</label>
                                                                                </div>
                                                                                <div class="form-group mt-3">
                                                                                    <button type="submit" class="btn btn-primary">Đăng quảng cáo</button>
                                                                                </div>
                                                                                <!-- submit -->
                                                                            </div>

                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end trang video -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="row">
        <div class="col-4"></div>
    </div>
</div>
@endsection
@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="{{asset('assets/vendors/summernote/summernote-lite.min.js')}}"></script>

    @if(Session::has('success'))
        <script>
            Swal.fire({
                position: 'center-center',
                icon: 'success',
                title: 'Đã thêm thành công',
                showConfirmButton: true,
                timer: 1500
            })
    
        </script>
    @endif
<script>
    // logo header
    function onFileSelected() {
        var selectedFile = event.target.files[0];
        var reader = new FileReader();

        var imgtag = document.getElementById("show_img");
            const element = imgtag[i];
            imgtag.title = selectedFile.name;

            reader.onload = function(event) {
                imgtag.src = event.target.result;
                document.getElementById("show_img").style.display = "block";
            };
        
        reader.readAsDataURL(selectedFile);
    }
</script>

<!-- show img data -->
<script>
    jQuery(document).ready(function () {
        $(document).on('change', '#setimg', function(){
            onFileSelected();
        })
    })
</script>
<script>
        // Summernote
        $('#content').summernote({
            tabsize: 2,
            height: 120,
        });
</script>
@endsection