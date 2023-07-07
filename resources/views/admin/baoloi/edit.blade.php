@extends('layouts.admin')
@section('css')
    <link rel="stylesheet" href="{{asset('assets/vendors/toastify/toastify.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/choices.js/choices.min.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/vendors/toastify/toastify.css')}}">
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
                        <center><h4 class="card-title">Sửa báo lỗi</h4></center>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form form-horizontal" action="{{route('baoloi.update',$idloi->id)}}" method="POST" role="form">
                                @csrf @method('PUT')
                                <div class="form-body">
                                    <div class="row">
                                    <!-- check ẩn hiện -->
                                    <div class="row">
                                    <div class="col-md-3">
                                        Hành động
                                    </div>
                                    <div class="col-md-9">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="hanh_dong" {{($idloi->hanh_dong == 2) ? 'checked':''}} id="flexRadioDefault1" value="2">
                                            <label class="form-check-label" for="flexRadioDefault1">
                                                chưa xử lý
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="hanh_dong" {{($idloi->hanh_dong == 1) ? 'checked':''}} id="flexRadioDefault2" value="1">
                                            <label class="form-check-label" for="flexRadioDefault2">
                                                Đã xử lý
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