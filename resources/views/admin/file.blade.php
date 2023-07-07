@extends('layouts.admin')
@section('css')
    <link rel="stylesheet" href="{{asset('assets/vendors/toastify/toastify.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/dripicons/webfont.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/pages/dripicons.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/rater-js/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/choices.js/choices.min.css')}}" />
@stop()
@section('main')
<div id="main">
    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>
    <div class="page-heading">
        <h3>Quản lý tệp tin</h3>
    </div>
    <section class="section">
        <iframe src="{{url('/file/dialog.php')}}" width="100%" height="500px" style="over-flow-y:auto" frameborder="0"></iframe>
    </section>
</div>
@stop()
@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- javascript -->
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
<!-- CSS -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
<!-- Default theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
<!-- Semantic UI theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css"/>
<!-- Bootstrap theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>
<script>
    jQuery(document).ready(function($) {
        $('.btndelete').click(function(ev) {
            ev.preventDefault();
            var _href = $(this).attr('href');
            $('form#form-delete').attr('action',_href);
            alertify.confirm('bạn chắc chắn muốn xóa ?', function(result){
                if(result){
                    $('form#form-delete').submit();
                }
            })
        });
    });
</script>

    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <script src="{{asset('assets/vendors/toastify/toastify.js')}}"></script>
    <script src="{{asset('assets/js/extensions/toastify.js')}}"></script>
    <script src="{{asset('assets/vendors/rater-js/rater-js.js')}}"></script>
    <script src="{{asset('assets/js/extensions/rater-js.js')}"></script>
    <x-alert></x-alert>
@stop()