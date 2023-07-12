<?php
  $menu = config('menuadm');

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Mazer Admin Dashboard</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/iconly/bold.css')}}">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    @yield('css')
    <link rel="stylesheet" href="{{asset('assets/vendors/perfect-scrollbar/perfect-scrollbar.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/bootstrap-icons/bootstrap-icons.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/app.css')}}">
    <link rel="shortcut icon" href="{{asset('assets/images/favicon.svg')}}" type="image/x-icon">

</head>

<body>
    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <div class="d-flex justify-content-between">
                        <div class="logo">
                            <a href="{{route('home.index')}}"><img src="{{asset('wp-content/uploads/logo1-kenhanime.png')}}" alt="Logo" width="220px" style="height:50px"></a>
                        </div>
                        <div class="toggler">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">
                        <li class="sidebar-title">Menu</li>

                        <li class="sidebar-item {{(Request::segment(2) == '') ? 'active':''}}">
                            <a href="{{route('admin.dashboard')}}" class="sidebar-link ">
                                <i class="bi bi-grid-fill"></i>
                                <span>Trang Chủ</span>
                            </a>
                        </li>
                        @foreach($menu as $mn)
                        @php
                        $segment = $mn['segment'];
                        @endphp
                        <li class="sidebar-item  has-sub {{(Request::segment(2) == $segment) ? 'active':''}}">
                            <a href="{{route($mn['route'])}}" class='sidebar-link'>
                                <i class="{{$mn['icon']}}"></i>
                                <span>{{$mn['label']}}</span>
                            </a>
                            @if(isset($mn['items']))
                            <ul class="submenu ">
                                @foreach($mn['items'] as $item)                         
                                <li class="submenu-item ">
                                    <a href="{{route($item['route'])}}">{{$item['label']}}</a>
                                </li>
                                @endforeach
                            </ul>
                            @endif
                        </li>
                        @endforeach
                    </ul>
                </div>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>
        @yield('main')
    </div>
    <script src="{{asset('assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/vendors/apexcharts/apexcharts.js')}}"></script>
    <script src="{{asset('assets/js/pages/dashboard.js')}}"></script>
    <script src="{{asset('assets/vendors/fontawesome/all.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{asset('assets/js/main.js')}}"></script>
    <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
    @yield('js')
</body>
<script>
    $( ".sortable_slider" ).sortable({
        placeholder: 'ui-state-highlight',
        update: function(event,ui){
            var array_id = [];
            var _token = $('meta[name="csrf-token"]').attr('content');
            $('.sortable_slider tr').each(function(){
                array_id.push($(this).attr('id'));
            })
            // alert(array_id);
            // alert(_token);
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
</script>
<script>
    function delay(callback, ms) {
        var timer = 0;
        return function() {
            var context = this, args = arguments;
            clearTimeout(timer);
            timer = setTimeout(function () {
            callback.apply(context, args);
            }, ms || 0);
        };
    }

    $(document).ready(function(){
        $('#search').keyup(delay(function (e){
        $('#hidden-ajax').html('');
        var search = $('#search').val();
        // alert(search);
        if(search != ''){
            var expression = new RegExp(search, "i");
            $.getJSON('./json_file/movies.json', function(data){
                $.each(data, function(key, value){
                    if(search.length > 1){
                    if(value.name.search(expression) != -1 || value.name2.search(expression) != -1){
                        $('#hidden-ajax').removeClass('hidden')
                        $('#hidden-ajax').append('<tr><td class="text-bold-500">'+value.name+'</td><td class="text-bold-500">'+value.name2+'</td><td>'+value.slug+'</td><td><img src="/uploads/'+value.image+'" alt="'+value.name+' width="100px" height="100px""></td><td><div class="btn-group mb-1"><div class="dropdown"><button class="btn btn-secondary dropdown-toggle me-1" type="button" id="dropdownMenuButtonSec" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Hành Động</button><div class="dropdown-menu" aria-labelledby="dropdownMenuButtonSec" style="margin: 0px;"><a class="dropdown-item" href="admintrator/phim/'+value.id+'">Chi Tiết</a><a class="dropdown-item" href="admintrator/phim/'+value.id+'/edit">Sửa Phim</a></div></div></div></td></tr>')
                    }
                    }
                })
            })
        }else{
            $('#hidden-ajax').addClass('hidden')
        }
        
        },500))
    });
</script>

</html>