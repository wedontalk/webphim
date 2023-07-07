@extends('layouts.admin')
@section('css')
    <link rel="stylesheet" href="{{asset('assets/vendors/toastify/toastify.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/choices.js/choices.min.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/vendors/summernote/summernote-lite.min.css')}}">
@stop()
@section('main')
<div id="main">
    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>
    <section id="basic-horizontal-layouts">
        <div class="row match-height">
            <div class="col-md-12 col-12">
                <div class="card">
                    <div class="card-header">
                        <center><h4 class="card-title">Thêm danh mục</h4></center>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form form-horizontal" action="{{route('phim.store')}}" method="POST" role="form" enctype="multipart/form-data">
                                @csrf
                                <div class="form-body">
                                    <div class="row">
                                        <!-- manga -->
                                        <div class="col-md-3">
                                            <label>Tên phim</label>
                                        </div>
                                        <div class="col-md-9 form-group">
                                            <input type="text" id="first-name" class="form-control"name="name" placeholder="nhập tên phim">
                                        </div>
                                        @error('name')
                                            <div class="alert alert-warning"><i class="bi bi-exclamation-triangle"></i> {{$message}}</div>
                                        @enderror
                                        <!-- tên phim 2 -->
                                        <div class="col-md-3">
                                            <label>Tên phim 2</label>
                                        </div>
                                        <div class="col-md-9 form-group">
                                            <input type="text" id="first-name" class="form-control"name="name2" placeholder="nhập tên phim 2">
                                        </div>
                                        @error('name2')
                                            <div class="alert alert-warning"><i class="bi bi-exclamation-triangle"></i> {{$message}}</div>
                                        @enderror
                                        <!-- danh mục -->
                                        <div class="col-md-3">
                                            <label>danh mục thể loại</label>
                                        </div>
                                        <div class="col-md-9 form-group">
                                            <select class="choices form-select select-light-danger" multiple="multiple" name="danhmuc[]">
                                                @foreach($cats as $dm)
                                                    <option value="{{$dm->id}}">{{$dm->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <!-- kiểu phim -->
                                        <div class="col-md-3">
                                            <label>Kiểu phim</label>
                                        </div>
                                        <div class="col-md-9 form-group">
                                            <select class="form-select" name="type_movie">
                                                @foreach($kieuphim as $dm)
                                                    <option value="{{$dm->id}}">{{$dm->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <!-- Trạng thái phim -->
                                        <div class="col-md-3">
                                            <label>Trạng thái phim</label>
                                        </div>
                                        <div class="col-md-9 form-group">
                                            <select class="form-select" name="status">
                                                @foreach($trangthai as $tt)
                                                    <option value="{{$tt->id}}">{{$tt->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @error('status')
                                            <div class="alert alert-warning"><i class="bi bi-exclamation-triangle"></i> {{$message}}</div>
                                        @enderror
                                        <!-- Thời lượng phim -->
                                        <div class="col-md-3">
                                            <label>Thời lượng phim</label>
                                        </div>
                                        <div class="col-md-9 form-group">
                                            <input type="text" id="first-name" class="form-control" name="duration" placeholder="nhập thời lượng phim">
                                        </div>
                                        @error('duration')
                                            <div class="alert alert-warning"><i class="bi bi-exclamation-triangle"></i> {{$message}}</div>
                                        @enderror
                                        <!-- năm sản xuất -->
                                        <div class="col-md-3">
                                            <label>năm sản xuất</label>
                                        </div>
                                        <div class="col-md-9 form-group">
                                            <input type="text" id="first-name" class="form-control" name="year" placeholder="nhập năm sản xuất">
                                        </div>
                                        @error('year')
                                            <div class="alert alert-warning"><i class="bi bi-exclamation-triangle"></i> {{$message}}</div>
                                        @enderror
                                        <!-- phim nổi bật -->
                                        <div class="col-md-3">
                                            <label>Phim nổi bật</label>
                                        </div>
                                        <div class="col-md-9 form-group">
                                            <select class="form-select" name="phim_noibat">
                                                    <option value="0">Bình thường</option>
                                                    <option value="1">Hot</option>
                                                    <option value="2">Mới cập nhật</option>
                                                    <option value="3">Xem nhiều</option>
                                            </select>
                                        </div>
                                        <!-- tóm tắc truyện -->
                                        <div class="col-md-3">
                                            <label>Tóm tắc phim</label>
                                        </div>
                                        <div class="col-md-9 form-group">
                                            <textarea class="form-control" id="content" name="description" rows="3"></textarea>
                                        </div>
                                        @error('description')
                                            <div class="alert alert-warning"><i class="bi bi-exclamation-triangle"></i> {{$message}}</div>
                                        @enderror
                                        <!-- hình ảnh -->
                                        <div class="col-md-3">
                                            <label>Hình ảnh</label>
                                        </div>
                                        <div class="col-md-9 form-group">
                                            <input class="form-control" type="file" id="formFile" name="file_upload">
                                        </div>
                                        <!-- 2 thẻ meta -->
                                        <div class="form-group col-sm-6">
                                            <label for="">meta_description</label>
                                            <textarea name="meta_desc" style="background:#eeeeee" id="" class="form-control" cols="30" rows="5" placeholder="nhập meta_description"></textarea>
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label for="">meta_keyword</label>
                                            <textarea name="meta_keyword" style="background:#eeeeee" id="" class="form-control" cols="30" rows="5" placeholder="nhập meta_description"></textarea>
                                        </div>
                                        <!-- check ẩn hiện -->
                                        <div class="col-md-3">
                                            <label for="">Trạng thái</label>
                                        </div>
                                        <div class="col-md-9 form-group">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="anHien"  value="2">
                                                <label class="form-check-label" for="flexRadioDefault1">
                                                    Ẩn 
                                                </label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="anHien" value="1" checked>
                                                <label class="form-check-label" for="flexRadioDefault2">
                                                    Hiện
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>    
                                    <div class="col-sm-12 d-flex justify-content-end">
                                        <button type="submit"
                                            class="btn btn-primary me-1 mb-1">Submit</button>
                                        <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@stop()
@section('js')
<script src="{{asset('assets/vendors/choices.js/choices.min.js')}}"></script>
<script src="{{asset('assets/vendors/jquery/jquery.min.js')}}"></script>
<script src="{{asset('assets/vendors/summernote/summernote-lite.min.js')}}"></script>
<script>
        // Summernote
        $('#content').summernote({
            tabsize: 2,
            height: 120,
        });
</script>
@stop()