@extends('layouts.admin')
@section('css')
    <link rel="stylesheet" href="{{asset('assets/vendors/toastify/toastify.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/dripicons/webfont.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/pages/dripicons.css')}}">
@stop()
@section('main')
<div id="main">
    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>
    <section class="section">
        <div class="row" id="table-bordered">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Danh mục</h4>
                    </div>
                    <div class="card-content">
                        @foreach($data as $dt)
                        <iframe src="{{$dt->content}}" frameborder="0" width="100%" height="500px"></iframe>
                        @endforeach
                    </div>
                    <hr>
                    <div class="row">
                        @foreach($alltapphim as $all)
                                <span style="width:70px; height:30px">
                                    <a href="{{route('tapphim.show',$all->id)}}" class="badge bg-primary">{{$all->episode_name}}</a>
                                </span>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@stop()
@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    jQuery(document).ready(function($) {
        $('.btndelete').click(function(ev) {
            ev.preventDefault();
            var _href = $(this).attr('href');
            $('form#form-delete').attr('action',_href);
            if(confirm('bạn muốn xóa chứ ?')){
                $('form#form-delete').submit();
            }
        });
    });
</script>
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <script src="{{asset('assets/vendors/toastify/toastify.js')}}"></script>
    <script src="{{asset('assets/js/extensions/toastify.js')}}"></script>
    <x-alert></x-alert>
@stop()