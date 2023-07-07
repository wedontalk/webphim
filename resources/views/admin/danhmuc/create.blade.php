@extends('layouts.admin')
@section('css')
    <link rel="stylesheet" href="{{asset('assets/vendors/toastify/toastify.css')}}">
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
                            <form class="form form-horizontal" action="{{route('danhmuc.store')}}" method="POST" role="form">
                                @csrf
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label>Name thể loại</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" id="first-name" class="form-control" name="name" placeholder="nhập name thể loại">
                                        </div>
                                        @error('name')
                                            <div class="alert alert-warning"><i class="bi bi-exclamation-triangle"></i>{{$message}}</div>
                                        @enderror
                                        <div class="row">
                                            <div class="form-group col-sm-6">
                                                <label for="">meta_description</label>
                                                <textarea name="meta_desc" id="" style="background:#eeeeee" class="form-control" cols="30" rows="10" placeholder="nhập meta_description"></textarea>
                                            </div>
                                            <div class="form-group col-sm-6">
                                                <label for="">meta_keyword</label>
                                                <textarea name="meta_keyword" id="" style="background:#eeeeee" class="form-control" cols="30" rows="10" placeholder="nhập meta_description"></textarea>
                                            </div>
                                        </div>
                                        <!-- <div class="col-md-4">
                                            <label>slug thể loại</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" id="first-name" class="form-control" name="slug" placeholder="nhập icon danh mục">
                                        </div> -->
                                    </div>
                                    <!-- check ẩn hiện -->
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="anHien" id="flexRadioDefault1" value="2">
                                        <label class="form-check-label" for="flexRadioDefault1">
                                            Ẩn 
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="anHien" id="flexRadioDefault2" value="1" checked>
                                        <label class="form-check-label" for="flexRadioDefault2">
                                            Hiện
                                        </label>
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
@stop()