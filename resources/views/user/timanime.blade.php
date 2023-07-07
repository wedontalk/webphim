@extends('layouts.user')
@section('title')
<meta name="description" content="Tìm anime trang tổng hợp tìm kiếm anime nhanh phù hợp full vietsub + thuyết minh mới nhất | animetvh.net">
  <link rel="shortcut icon" href="{{asset('wp-content/uploads/catianlkenhanime.png')}}" type="image/x-icon" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta property="og:type" content="website" />
  <meta property="og:title" content="Tìm kiếm aniem | animetvh.net" />
  <meta property="og:description" content="Tìm anime trang tổng hợp tìm kiếm anime nhanh phù hợp full vietsub + thuyết minh mới nhất | animetvh.net" />
  <meta property="og:image" content="{{asset('wp-content/uploads/catianlkenhanime.png')}}" />
  <meta property="og:site_name" content="{{Request::url()}}" />
  <meta property="og:url" content="{{Request::url()}}" />
  <meta property="og:locale" content="vi_VN" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="robots" content="INDEX,FOLLOW, noodp"/>
  <meta name="googlebot" content="index,follow" />
  <meta name="BingBOT" content="index,follow" />
  <meta name="yahooBOT" content="index,follow" />
  <meta name="slurp" content="index,follow" />
  <meta name="msnbot" content="index,follow" />
  <meta name="revisit-after" content="1 days">
  <title>Tìm kiếm aniem | animetvh.net</title>
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
                      <a href="../index.html">Home</a> » 
                      <span class="breadcrumb_last" aria-current="page">Tìm Kiếm anime</span>
                    </span>
                  </span>
                </div>
              </div>
              <!-- <div class="col-xs-6 text-right">
                <a href="javascript:;" id="expand-ajax-filter">Loc 
                  <i id="ajax-filter-icon" class="hl-angle-down"></i>
                </a>
              </div> -->
            </div>
          </div>
          <div id="ajax-filter" class="panel-collapse collapse" aria-expanded="true" role="menu">
            <div class="ajax"></div>
          </div>
        </div>
        <!-- tìm kiếm anime -->
        <div class="container" id="wrapper">
            <div class="halim-panel-filter">
                <div class="panel-heading">
                    <a class="btn btn-primary justify-content-end" style="display:block" data-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">click để Tìm Kiếm phim</a>
                </div>
                <div class="">
                    <div class="col">
                        <div class="collapse multi-collapse in" id="multiCollapseExample1">
                            <div class="card card-body">
                                <div class="panel-heading">
                                  <form action="{{route('timkiemanime')}}" method="get">
                                    @foreach($showcategory as $key => $showcate)
                                    <div class="col-md-2 col-sm-2 col-lg-3 col-xs-4">
                                      <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="timkiemtheloai[]" id="{{$showcate->name}}{{$showcate->id}}" value="{{$showcate->id}}">
                                        <label class="form-check-label" for="{{$showcate->name}}{{$showcate->id}}">{{$showcate->name}}</label>
                                      </div>
                                    </div>
                                    @endforeach
                                    <div class="clearfix"></div>
                                    <div class="col-md-6 col-sm-12 col-xs-12">
                                      <div class="filter-box">
                                        <div class="filter-box-title">Số Lượng Tập</div>    
                                        <select class="form-control" id="tapphim" name="tapphim">
                                            <option value="1">> 0 Tập </option>
                                            <option value="10">>= 10 Tập</option>
                                            <option value="50">>=50 Tập</option>
                                            <option value="100">>= 100 Tập</option>
                                            <option value="Full">Tập Full</option>
                                        </select>                                   
                                      </div>
                                    </div>
                                    <!-- Tình trạng -->
                                    <div class="col-md-6 col-sm-12 col-xs-12">
                                      <div class="filter-box">
                                        <div class="filter-box-title">Tình trạng</div>    
                                        <select class="form-control" id="status" name="status">
                                          @foreach($showtrangthai as $key => $showtt)
                                            <option value="{{$showtt->id}}">{{$showtt->name}}</option>
                                          @endforeach
                                        </select>                                   
                                      </div>
                                    </div>
                                    <!-- button -->
                                    <div class="col-md-2 col-xs-12 col-sm-6">                       
                                        <button type="submit" id="btn-movie-filter" class="btn btn-danger" style="margin-top:10px">Tìm Kiếm</button>
                                    </div>
                                  </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <main  class="col-xs-12 col-sm-12 col-md-12">
          <div class="section-bar is-tabs clearfix">
            <h3 class="section-title"><span>Tìm Kiếm Anime</span></h3>
          </div>
          <div class="halim_box">
          @if(!isset($_GET['timkiemtheloai']))
          <div class="alert alert-info" role="alert">
                Bạn chưa chọn thể loại !!!
            </div>
          @endif
          @if(isset($data))
          @forelse($data as $dt)
            @if(isset($_GET['tapphim']) && $dt->showphimfirst->max('episode') >= $_GET['tapphim'] && $dt->showphimfirst->max('episode') != "Full")
              <article class="col-md-2 col-sm-2 col-xs-6 thumb grid-item post-6144">
                <div class="halim-item">
                  <a class="halim-thumb" href="{{route('chitiet', $dt->slug)}}" title="{{$dt->name}}">
                    <figure>
                      <img class="lazy img-responsive" data-src="{{asset('uploads')}}/{{$dt->image}}" alt="{{$dt->name}}" title="{{$dt->name2}}">
                    </figure>
                    @if($dt->phim_noibat == 1)
                      <span class="status">Hot</span>
                      @elseif($dt->phim_noibat == 2)
                      <span class="status">Truyện mới</span>
                      @elseif($dt->phim_noibat == 3)
                      <span class="status">Xem nhiều</span>
                      @endif
                      <span class="is_trailer">{{$dt->updated_at->diffForHumans()}}</span>
                      @if($dt->showphimfirst->max('episode'))
                      <span class="episode">Tập {{$dt->showphimfirst->max('episode')}}</span>
                      @endif
                    <div class="icon_overlay"></div>
                    <div class="halim-post-title-box">
                      <div class="halim-post-title ">
                        <h2 class="entry-title">{{$dt->name}}</h2>
                        <p class="original_title">{{$dt->name2}}</p>
                      </div>
                    </div>
                  </a>
                </div>
              </article>
            @elseif(isset($_GET['tapphim']) && $_GET['tapphim'] == "Full" && $dt->showphimfirst->max('episode') == "Full")
            <article class="col-md-2 col-sm-2 col-xs-6 thumb grid-item post-6144">
                <div class="halim-item">
                  <a class="halim-thumb" href="{{route('chitiet', $dt->slug)}}" title="{{$dt->name}}">
                    <figure>
                      <img class="lazy img-responsive" data-src="{{asset('uploads')}}/{{$dt->image}}" alt="{{$dt->name}}" title="{{$dt->name2}}">
                    </figure>
                    @if($dt->phim_noibat == 1)
                      <span class="status">Hot</span>
                      @elseif($dt->phim_noibat == 2)
                      <span class="status">Truyện mới</span>
                      @elseif($dt->phim_noibat == 3)
                      <span class="status">Xem nhiều</span>
                      @endif
                      <span class="is_trailer">{{$dt->updated_at->diffForHumans()}}</span>
                      @if($dt->showphimfirst->max('episode'))
                      <span class="episode">Tập {{$dt->showphimfirst->max('episode')}}</span>
                      @endif
                    <div class="icon_overlay"></div>
                    <div class="halim-post-title-box">
                      <div class="halim-post-title ">
                        <h2 class="entry-title">{{$dt->name}}</h2>
                        <p class="original_title">{{$dt->name2}}</p>
                      </div>
                    </div>
                  </a>
                </div>
              </article>
            @endif
            @empty
            <div class="alert alert-dark" role="alert">
                Hiện chưa có anime theo thể loại này trên kênh
            </div>
          @endforelse
          @endif
          </div>
          <div class="clearfix"></div>
          @if(isset($data))
            {{$data->appends(request()->all())->links('user.in-paginate')}}
          @endif
        </main>
      </div>
    </div>
@endsection