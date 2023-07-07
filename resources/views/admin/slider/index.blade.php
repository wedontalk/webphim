@extends('layouts.admin')
@section('css')
    <link rel="stylesheet" href="{{asset('assets/vendors/toastify/toastify.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/dripicons/webfont.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/pages/dripicons.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/choices.js/choices.min.css')}}" />
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
                        <div class="row">
                            <div class="col-sm-4">
                                <h4 class="card-title">Danh mục slider</h4>
                            </div>
                            <div class="col-sm-6">

                            </div>
                            <div class="col-sm-2 d-flex flex-row-reverse">
                                <button class="btn btn-outline-success p-2" data-bs-toggle="modal" data-bs-target="#themslidermoi">Thêm slider</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-content">
                        <!-- table bordered -->
                        <div class="table-responsive">
                            <table class="table table-bordered mb-0">
                                <thead>
                                    <tr>
                                        <th style="width:30px">#</th>
                                        <th style="width:100px">images</th>
                                        <th>name</th>
                                        <th>view</th>
                                        <th>Thứ tự</th>
                                        <th style="width:60px">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="sortable_slider">
                                    @php
                                    $i = 1;
                                    @endphp
                                    @foreach($data as $dt)
                                    <tr id="{{$dt->id}}">
                                        <td class="pl-3"><i class="fa fa-sort"></i></td>
                                        <td><img src="{{asset('uploads')}}/{{$dt->showproduct->image}}" alt="" width="100px" height="100px"></td>
                                        <td class="text-bold-500">{{$dt->showproduct->name}}</td>
                                        <td>{{$dt->showview->sum('view_episode')}} views</td>
                                        <td>{{$i++}}</td>
                                        <td style="width:200px">
                                            <a href="{{route('slider.destroy',$dt->id)}}" class="btn btn-outline-danger btndelete">xóa</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <hr>
                            <form method="POST" action="" id="form-delete">
                                @method('DELETE')
                                @csrf
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    </div>


<!-- model thêm chapter -->
<div class="modal fade" id="themslidermoi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Thêm slider mới</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="row">
            <form>
                <div class="alert alert-danger print-error-msg" style="display:none">
                    <ul></ul>
                </div>
                <h6>show truyện</h6>
                <div class="form-group">
                    <select class="choices form-select" id="id_product" name="id_product">
                        @foreach($showphim as $show)
                            <option value="{{$show->id}}">{{$show->name}}</option>
                        @endforeach
                    </select>
                </div>
            </form>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" id="btnsubmitslider" class="btn btn-primary">Lưu slider</button>
        </div>
        </div>
    </div>
</div>
@stop()
@section('js')
<!-- <script>
    $( ".sortable_slider" ).sortable({
        placeholder: 'ui-state-highlight',
        update: function(event,ui){
            var array_id = [];
            var _token = $('meta[name="csrf-token"]').attr('content');
            $('.sortable_slider tr').each(function(){
                array_id.push($(this).attr('id'));
            })
            // alert(array_id);
            //alert(_token);
            $.ajax({
                url:"{{route('sortslider')}}",
                method:"POST",
                data:{array_id:array_id,_token:_token},
                success: function(data){
                    if(data = 'sapxepthanhcong'){
                        alertify.success('sắp xếp thành công');
                    }
                }
            })
        }
    });
</script> -->
<!-- js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
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
<script src="{{asset('assets/vendors/choices.js/choices.min.js')}}"></script>
<x-alert></x-alert>
<script>
    jQuery(document).ready(function($) {
        $('.btndelete').click(function(ev) {
            ev.preventDefault();
            var _href = $(this).attr('href');
            $('form#form-delete').attr('action',_href);
            alertify.confirm('bạn muốn xóa danh mục này chứ ?', function(result){
                if(result){
                    $('form#form-delete').submit();
                }
            })
        });
    });
</script>
<script>
    jQuery(document).ready(function($){
        $(document).on('click','#btnsubmitslider', function(e){
            e.preventDefault();
            var id_phim = $('#id_product').val();
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url:'{{route("themslider")}}',
                method:'post',
                data:{
                    id_phim:id_phim,_token:_token,
                },
                success: function(data){
                    if($.isEmptyObject(data.error)){
                        alertify.message(data.success);
                    function greatin(){
                        window.location.reload(true);
                    }
                    setTimeout(greatin, 1500);
                    }else{
                        printErrorMsg(data.error);
                    }
                }
            })
        });
        function printErrorMsg (msg) {
            $(".print-error-msg").find("ul").html('');
            $(".print-error-msg").css('display','block');
            $.each( msg, function( key, value ) {
                $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
            });
        }
    });
</script>
@stop()