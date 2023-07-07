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
                        <center><h4 class="card-title">Thêm tập phim</h4></center>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form form-horizontal" action="{{route('tapphim.store')}}" method="POST" role="form">
                                @csrf
                                <div class="form-body">
                                    <div class="row">
                                    <!-- chọn phim -->
                                        <!-- id tập phim -->
                                        <div class="col-md-3">
                                            <label>phim</label>
                                        </div>
                                        <div class="col-md-9 form-group">
                                            <input type="text" class="form-control" name="name_slug" value="{{$name_mn->name}}" placeholder="nhập name tập phim">
                                        </div>
                                        @error('episode')
                                            <div class="alert alert-warning"><i class="bi bi-exclamation-triangle"></i>{{$message}}</div>
                                        @enderror
                                            <select class="form-select" name="film_id" style="display:none">
                                                @foreach($data as $pm)
                                                    <option {{($pm->id == $name_mn->id) ? 'selected':''}} value="{{$pm->id}}">{{$pm->name}}</option>
                                                @endforeach
                                            </select>
                                        <!-- id tập phim -->
                                        <div class="col-md-3">
                                            <label>id tập phim</label>
                                        </div>
                                        <div class="col-md-9 form-group">
                                            <input type="text" class="form-control" name="episode" placeholder="nhập id tập phim">
                                        </div>
                                        @error('episode')
                                            <div class="alert alert-warning"><i class="bi bi-exclamation-triangle"></i>{{$message}}</div>
                                        @enderror
                                        <!-- name tập phim -->
                                        <div class="col-md-3">
                                            <label>Name tập phim</label>
                                        </div>
                                        <div class="col-md-9 form-group">
                                            <input type="text" id="first-name" class="form-control" name="episode_name" placeholder="nhập name tập phim">
                                        </div>
                                        @error('episode_name')
                                            <div class="alert alert-warning"><i class="bi bi-exclamation-triangle"></i>{{$message}}</div>
                                        @enderror
                                        <!-- content phim -->
                                        <div class="col-md-3">
                                            <label>Content phim</label>
                                        </div>
                                        <div class="col-md-9 form-group">
                                            <input type="text" id="first-name" class="form-control" name="content" placeholder="nhập content tập phim">
                                        </div>
                                        @error('content')
                                            <div class="alert alert-warning"><i class="bi bi-exclamation-triangle"></i>{{$message}}</div>
                                        @enderror
                                        <div class="col-md-3">
                                            <label>Server Anime</label>
                                        </div>
                                        <div class="col-md-9 form-group">
                                            <select class="form-select" name="link_server">
                                                @foreach($link_server as $sv)
                                                    <option value="{{$sv->id}}">{{$sv->name_server}}</option>
                                                @endforeach
                                            </select>
                                        </div>
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