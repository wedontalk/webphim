@extends('layouts.user')
@section('title')
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="{{$meta_title}} @if($thongtinphim->showphimfirst->max('episode')){{$thongtinphim->showphimfirst->max('episode')}} - tập {{$nextfilm}} @endif | {{\Str::limit($meta_desc, 300, $end='...')}}">
    <meta property="og:title" content="{{$meta_title}} @if($thongtinphim->showphimfirst->max('episode')){{$thongtinphim->showphimfirst->max('episode')}} - tập {{$nextfilm}} @endif | " />
    <meta property="og:description" content="{{$meta_title}} @if($thongtinphim->showphimfirst->max('episode')){{$thongtinphim->showphimfirst->max('episode')}} - tập {{$nextfilm}} @endif | {{\Str::limit($meta_desc, 300, $end='...')}}" />
    <meta property="og:type" content="website" />
    <meta property="og:image" content="{{asset('wp-content/uploads/catianlkenhanime.png')}}" />
    <meta property="og:site_name" content="{{$meta_canontical}}" />
    <meta property="og:url" content="{{$meta_canontical}}" />
    <meta property="og:locale" content="vi_VN" />
    <link rel="shortcut icon" href="{{asset('wp-content/uploads/catianlkenhanime.png')}}" type="image/x-icon" />
    <link rel="canonical" href="{{$meta_canontical}}" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="robots" content="INDEX,FOLLOW, noodp"/>
    <meta name="googlebot" content="index,follow" />
    <meta name="BingBOT" content="index,follow" />
    <meta name="yahooBOT" content="index,follow" />
    <meta name="slurp" content="index,follow" />
    <meta name="msnbot" content="index,follow" />
    <meta name="revisit-after" content="1 days">
    <title>{{$meta_title}} @if(isset($tap_phim1->episode_name)) {{$tap_phim1->episode_name}} - tập {{$nextfilm}} @endif - animetvh</title>
@endsection
@section('css')
<link rel='stylesheet' id='bootstrap-css'  href='{{asset("wp-content/themes/halimmovies/assets/css/bootstrap.min.css")}}' media='all' />
<link rel='stylesheet' id='style-css'  href='{{asset("wp-content/themes/halimmovies/style1.css")}}' media='all' />

<style>
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
    width: 100%;
    max-height: 300px;
  }
  .luu span{
    background-color:#737373 !important;
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
                        <a href="{{route('theloai', $thongtinphim->cat->slug)}}">{{$thongtinphim->cat->name}}</a> » 
                        <span class="breadcrumb_last" aria-current="page">
                          {{$thongtinphim->name}}
                        </span>
                      </span>
                    </span>
                  </span>
                </div>
              </div>
              <!-- <div class="col-xs-6 text-right">
              <a href="javascript:;" id="expand-ajax-filter">Filter movies <i id="ajax-filter-icon" class="hl-angle-down"></i></a>
              </div> -->
          </div>
        </div>
      </div>
        <main id="main-contents" class="col-xs-12 col-sm-12 col-md-8">
        @foreach($thongtin as $thongt)
        <section id="content">
          <div class="clearfix wrap-content">
            <div class="halim-movie-wrapper">
              <div class="title-block watch-page">
                <div id="bookmark" class="bookmark-img-animation primary_ribbon" data-id="{{$thongt->id}}" title="Thêm vào Tủ Phim">
                  <div class="halim-pulse-ring"></div>
                </div>
                <div class="title-wrapper">
                  <h1 class="entry-title" title="{{$thongt->name}}">{{$thongt->name}}</h1>
                  <span">{{$thongt->name2}}</span>
                </div>
                <div class="more-info">
                  <span>Tập {{$thongtinphim->showphimfirst->max('episode')}}/{{$thongt->duration}}</span>
                  <span>
                    @foreach($thongt->nhieutheloai as $showtt)
                        - <a href="{{route('theloai', $showtt->slug)}}" rel="category tag">{{$showtt->name}}</a>
                    @endforeach
                  </span>
                </div>
                <div class="hidden-xs">
                  <div class="halim_imdbrating taq-score">
                    <span class="hidden" itemprop="name">{{$thongt->name2}}</span>
                    <span class="hidden" itemprop="description">{!!$thongt->description!!} [&hellip;]</span>
                  </div>
                </div>
              </div>
              <div class="movie_info col-xs-12">
                <div class="movie-poster col-md-3">
                  <img class="movie-thumb" src="{{asset('uploads')}}/{{$thongt->image}}" alt="Yuusha, Yamemasu">
                  @if($tap_phim)
                  <a href="{{route('xemphim', $tap_phim->slug_phim)}}" class="btn btn-sm btn-danger watch-movie visible-xs-block"><i class="hl-play"></i> Xem</a>
                  @else
                  <a onclick="alert('chưa có tập phim !')" class="btn btn-sm btn-danger watch-movie visible-xs-block"><i class="hl-play"></i> Xem</a>
                  @endif
                  <span id="show-trailer" data-url="{{$thongt->trailer}}" class="btn btn-sm btn-primary show-trailer">
                    <i class="hl-youtube-play"></i> Trailer
                  </span>
                  <span class="btn btn-sm btn-success quick-eps">
                    <a data-toggle="collapse" href="#collapseEps" aria-expanded="false" aria-controls="collapseEps">
                      <i class="hl-sort-down"></i> Chọn tập
                    </a>
                  </span>
                </div>
                <div class="film-poster col-md-9">
                  <div class="film-poster-img" style="background: url('{{asset('uploads')}}/{{$thongt->image}}');background-size: cover;background-repeat: no-repeat;background-position: 30% 25%;height: 300px;-webkit-filter: grayscale(100%); filter: grayscale(100%);"></div>
                  <div class="halim-play-btn hidden-xs">
                  @if($tap_phim)
                    <a href="{{route('xemphim', $tap_phim->slug_phim)}}" class="play-btn" title="Click to Play" data-toggle="tooltip" data-placement="bottom">Click to Play</a>
                  @else
                  <a onclick="alert('chưa có tập phim !')" class="play-btn" title="Click to Play" data-toggle="tooltip" data-placement="bottom">Click to Play</a>
                  @endif
                  </div>
                  <div class="movie-trailer hidden"></div>
                  <div class="movie-detail"></div>
                </div>
              </div>
            </div>
            <div class="clearfix"></div>
            <div id="halim_trailer"></div>
            <!-- chọn tập xem phim -->
            <div class="collapse in" id="collapseEps">
              <div id="halim-list-server">
                <div class="halim-server">
                  <ul class="halim-list-eps">
                    @foreach($showtapphim as $showtap)
                        <li class="halim-episode">
                          <a href="{{route('xemphim', $showtap->slug_phim)}}" data-ep="{{$showtap->id}}" data-film="{{$showtap->film_id}}"><span>{{$showtap->episode_name}}</span></a>
                        </li>
                    @endforeach
                  </ul>
                  <div class="clearfix"></div>
                </div>
                  <!-- <div id="ajax-get-server">Loading server...</div> -->
                </div>
              </div>
              <div class="clearfix"></div>
              <div class="noidungphim">Nội dung phim</div>
              <div class="entry-content htmlwrap clearfix">
                <article id="post-5813" class="item-content">
                  <h2> {{$thongt->name}} - Tập {{$thongtinphim->showphimfirst->max('episode')}}/{{$thongt->duration}}</h2>
                  <p style="text-align: justify;">
                  {!!$thongt->description!!}
                  </p>
                </article>
              </div>
            </div>
        </section>
        @endforeach
        <!-- danh sách comment -->
          <section class="related-movies">
            <div class="section-heading">
                <a title="Bình Luận - {{$thongt->name}}">
                    <span class="h-text">Bình Luận</span>
                </a>
            </div>
            <div id="comment_load" class="col-md-12" style="background:#fff;border-radius:5px;padding:10px">
                @forelse($select_comment as $comment)
                <div class="media col-md-12">
                    <div class="media-left">
                        <div style="width:55px">
                            <img src="{{asset('uploads/logo')}}/logoauto1.jpg" alt="..." style="width:55px; max-width:55px">
                        </div>
                    </div>
                    <div class="media-body" style="">
                        <h4 class="media-heading" style="color:#000;font-size:12px;">{{$comment->idUser->name}} - <span style="font-size:12px;color:#32e48c;">{{$comment->idEpisode->episode_name}}</span></h4>
                        <p style="color:#000">{{$comment->content}}</p>
                        <!-- con -->
                        @if(count($comment->replies))
                        @foreach($comment->replies as $comment_cr)
                        <div class="media col-md-12">
                            <div class="media-left" style="">
                                <div style="width:55px">
                                    <img src="{{asset('uploads/logo')}}/logoauto1.jpg" alt="..." style="width:55px; max-width:55px">
                                </div>
                            </div>
                            <div class="media-body" style="">
                                <h4 class="media-heading" style="color:#000;font-size:12px;">{{$comment_cr->idUser->name}} - <span style="font-size:12px;color:#32e48c;">{{$comment->idEpisode->episode_name}}</span></h4>
                                <p style="color:#000"><span style="color:#58e570">{{$comment_cr->reply_id_user->name}}</span> - {{$comment_cr->content}}</p>
                            </div>
                        </div>
                        @endforeach
                        @endif
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
          <div class="clearfix"></div>
          <section class="related-movies">
            <section id="halim-advanced-widget-3">
              <div class="section-heading">
                <a title="Có Thể Bạn Thích">
                  <span class="h-text">Có Thể bạn thích</span>
                </a>
              </div>
              <div id="halim-advanced-widget-3-ajax-box" class="halim_box">
                @foreach($showphimlienquan as $showplq)
                <article class="col-md-3 col-sm-3 col-xs-6 thumb grid-item">
                  <div class="halim-item">
                    <a class="halim-thumb" href="{{route('chitiet', $showplq->slug)}}" title="{{$showplq->name}}">
                      <figure>
                        <img class="lazy img-responsive" data-src="{{asset('uploads')}}/{{$showplq->image}}" alt="{{$showplq->name}}" title="{{$showplq->name}}">
                      </figure>
                      <span class="episode">{{$showplq->showphimfirst->max('episode')}}/{{$showplq->duration}}</span>
                      <div class="icon_overlay"></div>
                      <div class="halim-post-title-box">
                        <div class="halim-post-title ">
                          <h2 class="entry-title">{{$showplq->name}}</h2>
                          <p class="original_title">{{$showplq->name2}}</p>
                        </div>
                      </div>
                    </a>
                  </div>
                </article>
                @endforeach
              </div>
            </section>
            <div class="clearfix"></div>
          </section>
        </main>
        @include('user.theloaimain')
      </div>
    </div>
@endsection
@section('js')

@endsection