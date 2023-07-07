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
                        <div class="row">
                            <div class="col-sm-4">
                                <h4 class="card-title">Danh mục báo lỗi</h4>
                            </div>
                            <div class="col-sm-4">
                            <div class="row">
                                <div class="col-md-8">
                                        <select class="form-control" id="selecttrangthai" name="danhsach">
                                            <option value="{{Request::url()}}?danhsach=tatca">Tất cả</option>
                                            <option value="{{Request::url()}}?danhsach=chuaxuly">Chưa xử lý</option>
                                            <option value="{{Request::url()}}?danhsach=daxuly">Đã xử lý</option>
                                        </select>
                                </div>
                                <div class="col-md-4">
                                    <button class="btn btn-outline-info" id="loctrangthai">Lọc</button>
                                </div>
                            </div>
                            </div>
                            <div class="col-sm-4 d-flex flex-row-reverse">
                                <button class="btn btn-outline-warning p-2" id="deleteAllselected">delete All</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-content">
                        <!-- table bordered -->
                        <div class="table-responsive">
                            <table class="table table-bordered mb-0">
                                <thead>
                                    <tr>
                                        <th style="width:30px"><input type="checkbox" id="checkAll" /></th>
                                        <th style="width:30px">#</th>
                                        <th>thuộc phim</th>
                                        <th>thuộc tập phim</th>
                                        <th>Nội dung lỗi</th>
                                        <th>Thời gian</th>
                                        <th>hành động</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($data as $dt)
                                    <tr id="sid{{$dt->id}}">
                                    <td><input type="checkbox" class="checkboxclass" name="ids" value="{{$dt->id}}"></td>
                                        <td class="text-bold-500">{{$dt->id}}</td>
                                        <td class="text-bold-500">{{$dt->idfilm->name}}</td>
                                        <td class="text-bold-500">{{$dt->idepisodeandserver->episode_name}}</td>
                                        <td>{{$dt->description}}</td>
                                        <td class="text-bold-500">{{$dt->updated_at->diffForHumans()}}</td>
                                        <td id="capnhat_trangthai">
                                            @if($dt->cap_nhat == 1)
                                            <span class="badge bg-danger form-control">chưa xử lý</span>
                                            @else
                                            <span class="badge bg-success form-control">đã xử lý</span>
                                            @endif
                                            <hr>
                                            <select class="form-control" id="id_trangthai" data-id="{{$dt->id}}" data-id_film="{{$dt->id_film}}" data-id_episode="{{$dt->id_episode}}">
                                                <option value="1" {{($dt->cap_nhat == 1) ? 'selected':''}}>Chưa xử lý</option>
                                                <option value="2" {{($dt->cap_nhat == 2) ? 'selected':''}}>Đã xử lý</option>
                                            </select>
                                        </td>
                                        <td style="width:200px">
                                        <a href="{{route('phim.show',$dt->id_film)}}" class="btn btn-outline-primary">sửa</a>
                                        <a href="{{route('baoloi.destroy',$dt->id)}}" class="btn btn-outline-danger btndelete">xóa</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <hr>
                            <div class="">{{$data->appends(request()->all())->links()}}</div>
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
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
<script src="{{asset('assets/vendors/toastify/toastify.js')}}"></script>
<script src="{{asset('assets/js/extensions/toastify.js')}}"></script>
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
    jQuery(document).ready(function($) {
        $(document).on('change','#id_trangthai', function(e){
            var id = $(this).data('id');
            var idtrangthai = $(this).val();
            var idfilm = $(this).data('id_film');
            var idepisode = $(this).data('id_episode');
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url:'{{route("updatetrangthai")}}',
                type:"post",
                data:{
                    _token:_token,
                    id:id,
                    idtrangthai:idtrangthai,
                    idfilm:idfilm,
                    idepisode:idepisode,
                },
                success:function(data){
                    if(data){
                        Toastify({
                        text: "cập nhật thành công",
                        duration: 3000,
                        close:true,
                        backgroundColor: "#4fbe87",
                        }).showToast();
                    }
                }
            });
            $('#capnhat_trangthai').onload = function(){
                alert('123')
            }
        });
        
    });
</script>
<script>
    jQuery(document).ready(function($) {
        $('#loctrangthai').click(function(e){
            var idtrangthai = $('#selecttrangthai').val();
            if(idtrangthai){
                window.location = idtrangthai;
            }
            return false;
        });
        locdanhsach();
        function locdanhsach() {
            var idtrangthai = window.location.href;
            $('select[name="danhsach"]').find('option[value="'+idtrangthai+'"]').attr("selected",true);
        }
    });
</script>
@stop()