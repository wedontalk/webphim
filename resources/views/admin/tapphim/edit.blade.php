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
                            <form class="form form-horizontal" action="{{route('tapphim.update',$tapphim->id)}}" method="POST" role="form">
                                @csrf @method('PUT')
                                <div class="form-body">
                                    <div class="row">
                                        <!-- id tập phim -->
                                        <div class="col-md-3">
                                            <label>phim</label>
                                        </div>
                                        <div class="col-md-9 form-group">
                                            <input type="text" class="form-control" name="name_slug" value="{{$tapphim->products->name}}" placeholder="nhập name tập phim">
                                        </div>
                                        <select class="form-select" name="film_id" id="slug" style="display:none">
                                            @foreach($data as $pm)
                                                <option {{($pm->id == $tapphim->film_id) ? 'selected':''}} value="{{$pm->id}}">{{$pm->name}}</option>
                                            @endforeach
                                        </select>
                                        <!-- id tập phim -->
                                        <div class="col-md-3">
                                            <label>id tập phim</label>
                                        </div>
                                        <div class="col-md-9 form-group">
                                            <input type="text" class="form-control" value="{{$tapphim->episode}}" name="episode" placeholder="nhập name tập phim">
                                        </div>
                                        @error('episode')
                                            <div class="alert alert-warning"><i class="bi bi-exclamation-triangle"></i>{{$message}}</div>
                                        @enderror
                                        <!-- name tập phim -->
                                        <div class="col-md-3">
                                            <label>Name tập phim</label>
                                        </div>
                                        <div class="col-md-9 form-group">
                                            <input type="text" id="first-name" class="form-control" value="{{$tapphim->episode_name}}" name="episode_name" placeholder="nhập id tập phim">
                                        </div>
                                        @error('episode_name')
                                            <div class="alert alert-warning"><i class="bi bi-exclamation-triangle"></i>{{$message}}</div>
                                        @enderror
                                        <!-- content phim -->
                                        <div class="col-md-3">
                                            <label>Content phim</label>
                                        </div>
                                        <div class="col-md-9 form-group">
                                            <input type="text" id="first-name" class="form-control" value="{{$tapphim->content}}" name="content" placeholder="nhập content tập phim">
                                        </div>
                                        @error('content')
                                            <div class="alert alert-warning"><i class="bi bi-exclamation-triangle"></i>{{$message}}</div>
                                        @enderror
                                        <!-- link server -->
                                        <div class="col-md-3">
                                            <label>Server Anime</label>
                                        </div>
                                        <div class="col-md-9 form-group">
                                            <select class="form-select" name="link_server">
                                                @foreach($link_server as $sv)
                                                    <option {{($sv->id == $tapphim->id_server) ? 'selected':''}} value="{{$sv->id}}">{{$sv->name_server}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <!-- check ẩn hiện -->
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="anHien" id="flexRadioDefault1" value="2" {{($tapphim->anHien == 2) ? 'checked':''}}>
                                        <label class="form-check-label" for="flexRadioDefault1">
                                            Ẩn 
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="anHien" id="flexRadioDefault2" value="1" {{($tapphim->anHien == 1) ? 'checked':''}}>
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
    <!-- <script type="text/javascript">
    
        function ChangeToSlug()
        {
            var slug;
            
            //Lấy text từ thẻ input title 
            slug = document.getElementById("slug");
            slug = slug.options[slug.selectedIndex].text;
            slug = slug.toLowerCase();
            //Đổi ký tự có dấu thành không dấu
                slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
                slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
                slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
                slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
                slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
                slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
                slug = slug.replace(/đ/gi, 'd');
                //Xóa các ký tự đặt biệt
                slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
                //Đổi khoảng trắng thành ký tự gạch ngang
                slug = slug.replace(/ /gi, "-");
                //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
                //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
                slug = slug.replace(/\-\-\-\-\-/gi, '-');
                slug = slug.replace(/\-\-\-\-/gi, '-');
                slug = slug.replace(/\-\-\-/gi, '-');
                slug = slug.replace(/\-\-/gi, '-');
                //Xóa các ký tự gạch ngang ở đầu và cuối
                slug = '@' + slug + '@';
                slug = slug.replace(/\@\-|\-\@|\@/gi, '');
                //In slug ra textbox có id “slug”
            document.getElementById('convert_slug').value = slug;
        }
        
    </script> -->
@stop()