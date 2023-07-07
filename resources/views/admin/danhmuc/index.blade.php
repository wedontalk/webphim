@extends('layouts.admin')
@section('css')
    <link rel="stylesheet" href="{{asset('assets/vendors/toastify/toastify.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/dripicons/webfont.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/pages/dripicons.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/simple-datatables/style.css')}}">
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
                                <h4 class="card-title">Danh mục</h4>
                            </div>
                            <div class="col-sm-4">

                            </div>
                            <div class="col-sm-4">
                                <button class="btn btn-outline-warning" id="deleteAllselected">delete All</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-content">
                        <!-- table bordered -->
                        <div class="table-responsive">
                            <table class="table table-striped" id="table1">
                                <thead>
                                    <tr>
                                        <th style="width:30px"><input type="checkbox" id="checkAll" /></th>
                                        <th style="width:30px">#</th>
                                        <th>Title</th>
                                        <th>Slug</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($data as $key => $dt)
                                    <tr id="sid{{$dt->id}}">
                                    <td><input type="checkbox" class="checkboxclass" name="ids" value="{{$dt->id}}"></td>
                                        <td class="text-bold-500">{{$key}}</td>
                                        <td>{{$dt->name}}</td>
                                        <td class="text-bold-500">{{$dt->slug}}</td>
                                        <td>
                                            @if($dt->anHien == 1)
                                            <span class="badge bg-primary">Hiễn thị</span>
                                            @else
                                            <span class="badge bg-danger">Tạm ẩn</span>
                                            @endif
                                        </td>
                                        <td style="width:200px">
                                        <a href="{{route('danhmuc.edit',$dt->id)}}" class="btn btn-outline-primary">sửa</a>
                                        <a href="{{route('danhmuc.destroy',$dt->id)}}" class="btn btn-outline-danger btndelete">xóa</a>
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
<script src="{{asset('assets/vendors/simple-datatables/simple-datatables.js')}}"></script>
<x-alert></x-alert>
<!-- jquery xóa tất cả -->
<script>
    jQuery(document).ready(function($) {
        $('#checkAll').click(function(){
            $(".checkboxclass").prop('checked', $(this).prop('checked'));
        });
        $('#deleteAllselected').click(function(e){
            e.preventDefault();
            var allids = [];
            var _token = $('input[name="_token"]').val();
            $('input:checkbox[name=ids]:checked').each(function(){
                allids.push($(this).val());
            });
            window.location.reload(true);
            $.ajax({
                url:'',
                type:"delete",
                data:{
                    _token:_token,
                    ids:allids
                },
                success:function(data){
                    $.each(allids,function(key,val){
                        $("#sid"+val).remove();
                    });
                }
            });
        });
    });
</script>
<script>
// Simple Datatable
    let table1 = document.querySelector('#table1');
    let dataTable = new simpleDatatables.DataTable(table1);
</script>
@stop()