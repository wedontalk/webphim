@extends('layouts.user')
@section('title')
<meta name="description" content="{{$meta_title}} {{$showphimtap->episode_name}} | {{\Str::limit($meta_desc, 300, $end='...')}}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="INDEX,FOLLOW, noodp"/>
    <meta property="og:type" content="website" />
    <meta property="og:title" content="{{$meta_title}} {{$showphimtap->episode_name}} | animetvh.net" />
    <meta property="og:description" content="{{$meta_title}} {{$showphimtap->episode_name}} | {{\Str::limit($meta_desc, 300, $end='...')}}" />
    <meta property="og:image" content="{{asset('wp-content/uploads/catianlkenhanime.png')}}" />
    <meta property="og:site_name" content="{{$meta_canontical}}" />
    <meta property="og:url" content="{{$meta_canontical}}" />
    <link rel="shortcut icon" href="{{asset('wp-content/uploads/catianlkenhanime.png')}}" type="image/x-icon" />
    <link rel="canonical" href="{{$meta_canontical}}" />
    <meta property="og:locale" content="vi_VN" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="googlebot" content="index,follow" />
    <meta name="BingBOT" content="index,follow" />
    <meta name="yahooBOT" content="index,follow" />
    <meta name="slurp" content="index,follow" />
    <meta name="msnbot" content="index,follow" />
    <meta name="revisit-after" content="1 days">
    <title>{{$meta_title}} {{$showphimtap->episode_name}} | animetvh.net</title>
@endsection
@section('css')

    <style>
        .activeline{
            background-color: #45ab88 ;
        }
        emoji-picker {
            width: 100%;
            height: 300px;
            margin-bottom:5px;
        }
        .media{
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-align: start;
            -ms-flex-align: start;
            align-items: flex-start;
        }
        .media .media-body{
            /* border:1px solid; */
            -webkit-box-flex: 1;
            -ms-flex: 1;
            flex: 1;
        }
        .media .media-left img{
            padding-right: 10px;
        }
        .comment_form{
            display:flex;
            -webkit-box-pack:justify;
            justify-content:space-between;
        }
        .comment_form button{
            margin-top:3px;
        }
        #halim-list-server{
            overflow: auto;
            width:100%;
            max-height:300px;
        }
        .luu span{
            background-color:#737373 !important;
        }
        .label-text{
            background:#030303;
            color:#fff;
            padding:5px 10px;
            border-radius:5px;
        }
    </style>
@endsection
@section('main')
<div class="container">
    <div class="row container" id="wrapper">
        <div class="halim-panel-filter">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-6">
                        <div class="yoast_breadcrumb hidden-xs">
                            <span>
                                <span>
                                    <a href="{{route('home.index')}}">Home</a> » 
                                    <span>
                                        <a href="{{route('theloai', $showphimfirst->cat->slug)}}">{{$showphimfirst->cat->name}}</a> » 
                                        <span class="breadcrumb_last" aria-current="page">
                                            {{$showphimfirst->name}}
                                        </span>
                                    </span>
                                </span>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <main id="main-contents" class="col-xs-12 col-sm-12 col-md-8">
            <section id="content">
                <div class="clearfix wrap-content">
                    <div class="clearfix"></div>
                    <span>Thể loại:
                        @foreach($showphim as $show)
                            @foreach($show->nhieutheloai as $shownhieu)
                                 <a class="label-text" href="{{route('theloai', $shownhieu->slug)}}" rel="category tag">{{$shownhieu->name}}</a>
                            @endforeach
                        @endforeach
                    </span>
                    
                    <div class="clearfix"></div>
                    <br>
                    <div class="col-12" style="display:block;">
                    List Server :
                    @foreach($showtapphimtheoserver as $show_server)
                            <a data-href="{{$show_server->content}}" data-svid="{{$show_server->id_server}}" class="btn btn-info btn-server">{{$show_server->funcserver->name_server}}</a>
                    @endforeach
                    </div>
                    <br>
                    <div class="clearfix"></div>
                    <div id="halim-player-wrapper" class="ajax-player-loading">
                        <!-- show phim -->
                        <iframe src="{{$showphimtap->content}}" frameborder="0" width="100%" height="100%" allowfullscreen></iframe>
                    </div>
                    <div class="clearfix"></div>
                    <div class="button-watch">
                        <ul class="col-xs-12 col-md-8">
                            <div id="explayer" class="hidden-xs">
                                <i class="hl-resize-full"></i>
                                    Expand
                            </div>
                            <div id="toggle-light">
                                <i class="hl-adjust"></i>
                                    Light Off
                            </div>
                            <div class="luotxem">
                                <i class="hl-eye"></i>
                                <span>
                                    @php
                                    if ($showphimtap->view_episode > 999 && $showphimtap->view_episode <= 999999) {
                                        $result = floor($showphimtap->view_episode / 1000) . 'K';
                                    } elseif ($showphimtap->view_episode > 999999) {
                                        $result = floor($showphimtap->view_episode / 1000000) . 'M';
                                    } else {
                                        $result = $showphimtap->view_episode;
                                    }
                                    @endphp
                                    {{$result}}
                                </span> view
                            </div>
                            <div type="button" class="luotxem" style="background:#363636" data-toggle="modal" data-target="#baoloi">
                                 Báo lỗi
                            </div>
                            <div class="luotxem">
                                <a class="visible-xs-inline" data-toggle="collapse" href="#moretool" aria-expanded="false" aria-controls="moretool"><i class="hl-forward"></i> Share</a>
                            </div>
                        </ul>
                    </div>
                    <div class="clearfix"></div>
                    <div class="title-block watch-page">
                        <div class="title-wrapper full">
                            <h1 class="entry-title">
                                <a href="{{route('chitiet', $showphimfirst->slug)}}" title="{{$showphimfirst->name}}" class="tl">{{$showphimfirst->name}}</a>
                            </h1>
                            <span class="plot-collapse" data-toggle="collapse" data-target="#expand-post-content" aria-expanded="false" aria-controls="expand-post-content" data-text="Nội dung phim"><i class="hl-angle-down"></i></span>
                        </div>
                        <div class="ratings_wrapper">
                            <span class="hidden" itemprop="name">{{$showphimfirst->name}}</span>
                            <span class="hidden" itemprop="description">{!!$showphimfirst->description!!} [&hellip;]</span>
                        </div>
                    </div>
                    <div class="entry-content htmlwrap clearfix collapse" id="expand-post-content">
                        <article id="post-5813" class="item-content post-5813">
                            <p style="margin-bottom:90px"></p>
                            <!-- <h2>{{$showphimfirst->name}}</h2> -->
                            <p style="text-align: justify;">{!!$showphimfirst->description!!}</p>
                        </article>
                    </div>
                    <div class="clearfix"></div>
                    <div class="text-center"><div id="halim-ajax-list-server"></div></div>
                    <div id="halim-list-server" class="list-eps-ajax">
                        <div class="halim-server">
                            <ul class="halim-list-eps">
                                    @foreach($showlistunique as $showtapsv)
                                        @php
                                            $segment = $showtapsv->slug_phim;
                                        @endphp
                                            <li class="halim-episode">
                                                <a id="hrefslug" href="{{route('xemphim',$showtapsv->slug_phim)}}" data-film="{{$showtapsv->film_id}}" data-ep="{{$showtapsv->id}}" data-slug = "{{$showtapsv->slug_phim}}">
                                                    <span class="halim-btn halim-btn-2 halim-info-1-1 box-shadow {{Request::segment(2) == $segment ? 'active':''}}" data-title="{{$showtapsv->products->name}} {{$showtapsv->episode_name}}">{{$showtapsv->episode_name}}</span>
                                                </a>
                                            </li>
                                    @endforeach
                            </ul>
                        <div class="clearfix"></div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div id="lightout"></div>
                </div>
            </section>
            <div class="clearfix"></div>
            <section class="related-movies">
                <div class="section-heading">
                    <a title="Bình Luận - {{$showphimfirst->name}}">
                        <span class="h-text">Bình Luận - {{$showphimfirst->name}} </span>
                    </a>
                </div>
                <!-- bảng comment -->
                <div class="col-12">
                    <form action="">
                        <div class="form-group" style="position:relative">
                            <textarea class="form-control" id="TextComment" rows="3" placeholder="nhập bình luận tại đây. Vui lòng không share link bậy bạ dẫn tới bị khóa tài khoản."></textarea>
                            <div class="comment_form">
                                <button type="button" id="comment_phim" class="btn btn-info">Bình Luận</button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- danh sách comment -->
                <div id="comment_load" class="col-md-12" style="background:#fff;border-radius:5px;padding:10px">
                    @forelse($select_comment as $comment)
                    <div class="media col-md-12" style="margin-top:10px">
                        <div class="media-left" style="">
                            <div style="width:55px">
                                <img src="{{asset('uploads/logo')}}/logoauto1.jpg" alt="..." style="width:55px; max-width:55px">
                                <a data-id="" style="cursor:pointer" data-toggle="collapse" href="#comment{{$comment->id}}" role="button" aria-expanded="false" aria-controls="collapseExample">Trả lời</a>
                            </div>
                        </div>
                        <div class="media-body" style="">
                            <h4 class="media-heading" style="color:#000;font-size:12px;">{{$comment->idUser->name}}
                                @auth
                                @if(isset(Auth::user()->id))
                                    @if(Auth::user()->id == $comment->id_user)
                                        <a style="font-size:12px;cursor:pointer">Xóa</a>
                                    @endif
                                @endif
                                @endauth
                            </h4>
                            <p style="color:#000">{{$comment->content}}</p>
                            <!-- con -->
                            @if(count($comment->replies))
                            @foreach($comment->replies as $comment_cr)
                            <div class="media col-md-12" style="margin-top:10px">
                                <div class="media-left" style="">
                                    <div style="width:55px">
                                        <img src="{{asset('uploads/logo')}}/logoauto1.jpg" alt="..." style="width:55px; max-width:55px;">
                                        <a data-id="" style="cursor:pointer" data-toggle="collapse" href="#comment{{$comment_cr->id}}" role="button" aria-expanded="false" aria-controls="collapseExample">Trả lời</a>
                                    </div>
                                </div>
                                <div class="media-body" style="">
                                    <h4 class="media-heading" style="color:#000;font-size:12px">{{$comment_cr->idUser->name}}
                                        @auth
                                        @if(isset(Auth::user()->id))
                                            @if(Auth::user()->id == $comment_cr->id_user)
                                                <a style="font-size:12px;cursor:pointer">Xóa</a>
                                            @endif
                                        @endif
                                        @endauth
                                    </h4>
                                    <p style="color:#000"><span style="color:#58e570">{{$comment_cr->reply_id_user->name}}</span> - {{$comment_cr->content}}</p>
                                </div>
                            </div>
                            <div class="col-md-12 collapse" id="comment{{$comment_cr->id}}">
                                <div class="card card-body">
                                    <div class="form-group" id="reply-form-{{$comment_cr->id}}">
                                    <textarea class="form-control reply_content" rows="3" placeholder="nhập bình luận tại đây. Vui lòng không share link bậy bạ dẫn tới bị khóa tài khoản."></textarea>
                                    <div class="comment_form">
                                    <button type="button" id="reply_comment" data-reply-id="{{$comment_cr->id_user}}" data-reply="{{$comment_cr->id}}" data-pr="{{$comment->id}}" class="btn btn-info">Bình Luận</button>
                                    </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            @endif
                        </div>
                    </div>
                    <div class="col-md-12 collapse" id="comment{{$comment->id}}">
                        <div class="card card-body">
                            <div class="form-group" id="reply-form-{{$comment->id}}">
                            <textarea class="form-control reply_content" rows="3" placeholder="nhập bình luận tại đây. Vui lòng không share link bậy bạ dẫn tới bị khóa tài khoản."></textarea>
                            <div class="comment_form">
                            <button type="button" id="reply_comment" data-reply-id="{{$comment->id_user}}" data-reply="{{$comment->id}}" data-pr="{{$comment->id}}" class="btn btn-info">Bình Luận</button>
                            </div>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="alert alert-warning" style="margin-top:20px" role="alert">Hiện chưa có bình luận nào !</div>
                    @endforelse
                </div>
                <div class="clearfix"></div>
                <div class="text-align" style="text-align:center">
                    {{$select_comment->appends(request()->all())->links()}}
                </div>
            </section>        
        </main>
        @include('user.theloaimain')
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="baoloi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document" >
    <div class="modal-content" style="background:#222d38;">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Báo lỗi Anime - {{$showphimfirst->name}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="modal-body">
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Nhập Nội dung</label>
                <textarea class="form-control" id="idbaoloi" data-idphim="{{$showphimfirst->id}}" data-idtapphim="{{$showphimtap->episode}}" placeholder="Vui lòng nhập vấn đề của tập phim để được fix nhanh nhất..." cols="30" rows="5"></textarea>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-primary" id="btnbaoloi" style="background:#009688">Báo lỗi</button>
        </div>
    </div>
  </div>
</div>
@endsection
@section('js')
<script type='text/javascript' src='{{asset("wp-content/themes/halimmovies/assets/js/halimmovie.core.min.js?ver=1.0")}}'></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"></script>

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
        function runwatchtv(){
            $(".ajax-player-loading").append('<div id="halim-player-loader"></div>');
            setTimeout(function(){
                $(".ajax-player-loading").append('');
                $("#halim-player-loader").hide();
            },1000);
        }
        var dataSV = $('.btn-server').map(function() {
            var showdata = $(this).data('href');
            // show server
            $(this).click(function(){
                var playerHalim = $('#halim-player-wrapper').empty();
                runwatchtv();
                playerHalim.append('<iframe src="'+showdata+'" frameborder="0" width="100%" height="100%" allowfullscreen></iframe>')
                $('.btn-server').removeClass('activeline');
                $(this).addClass('activeline');
            });
            // load server
            $('#halim-player-wrapper iframe').on('load', function() {
                var iframeSrc = $(this).attr('src');
                $('.btn-server').removeClass('activeline');
                $('.btn-server[data-href="' + iframeSrc + '"]').addClass('activeline');
            });
            // click server
            $('body').on('click', '#halim-player-wrapper iframe', function() {
                var iframeSrc = $(this).attr('src');
                $('.btn-server').removeClass('activeline');
                $('.btn-server[data-href="' + iframeSrc + '"]').addClass('activeline');
            });
            
        }).get();

    });
</script>
<script>
jQuery(document).ready(function($) {
    $(document).on('click','#btnbaoloi', function(e){
        var idphim = $('#idbaoloi').data('idphim');
        var idtapphim = $('#idbaoloi').data('idtapphim');
        var description = $('#idbaoloi').val();
        $.ajax({
                url:'{{route("baoloitapphim")}}',
                method:'post',
                data:{
                    idphim:idphim,idtapphim:idtapphim,description:description,_token:'{{ csrf_token() }}',
                },
                success: function(data){
                    if(data){
                        alertify.alert('Thông Báo', 'Báo Cáo Thành Công', function(){ alertify.success('OK !'); });
                    }
                    $('#idbaoloi').val('');
                }
            })
    });

});
</script>
<script>
    jQuery(document).ready(function() {
        $(document).on('click', '#comment_phim', function(){
            var Textarea = $('#TextComment').val();
            $.ajax({
                url:'{{route("commentphim")}}',
                method:'post',
                data:{
                    id_phim:'{{$showphimfirst->id}}',id_episode:'{{$showphimtap->id}}',textarea:Textarea,_token:'{{ csrf_token() }}',
                },
                success: function(data){
                    if(data){
                    $('#comment_load').html(data); 
                    }else{
                        alertify.alert('Thông Báo', 'Lỗi Rồi !', function(){ alertify.error('Đăng nhập chưa ?'); });
                    }
                    $('#TextComment').val('');
                }
            })
        })
        
    })
    $(document).on('click','#reply_comment', function(){
        var commentId = $(this).data('reply');
        var datapr = $(this).data('pr');
        var reply = $('#reply-form-'+commentId+' .reply_content');
        var content = reply.val();
        var replyId = $(this).data('reply-id');
        var url = "{{ route('comments.reply', ['comment' => ':commentId']) }}";
        url = url.replace(':commentId', commentId);
        // alert(url);
        $.ajax({
            url:url,
            method:'post',
            data:{
                id_phim:'{{$showphimfirst->id}}',id_episode:'{{$showphimtap->id}}',parent:datapr,reply:replyId,content:content,_token:'{{ csrf_token() }}',
            },
            success: function(data){
                if(data){
                    $('#comment_load').html(data); 
                }else{
                    alertify.alert('Thông Báo', 'Lỗi Rồi !', function(){ alertify.error('Đăng nhập chưa ?'); });
                }
            }
        })
    })
</script>
@endsection