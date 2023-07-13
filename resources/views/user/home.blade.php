@extends('layouts.user')
@section('title')
<meta name="description" content="{{$meta_desc}}">
  <link rel="canonical" href="{{$meta_canontical}}" />
  <link rel="shortcut icon" href="{{asset('wp-content/uploads/catianlkenhanime.png')}}" type="image/x-icon" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta property="og:type" content="website" />
  <meta property="og:title" content="{{$meta_title}}" />
  <meta property="og:description" content="{{$meta_desc}}" />
  <meta property="og:image" content="{{asset('wp-content/uploads/catianlkenhanime.png')}}" />
  <meta property="og:site_name" content="{{$meta_canontical}}" />
  <meta property="og:url" content="{{$meta_canontical}}" />
  <meta property="og:locale" content="vi_VN" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="robots" content="INDEX,FOLLOW, noodp"/>
  <meta name="googlebot" content="index,follow" />
  <meta name="BingBOT" content="index,follow" />
  <meta name="yahooBOT" content="index,follow" />
  <meta name="slurp" content="index,follow" />
  <meta name="msnbot" content="index,follow" />
  <meta name="revisit-after" content="1 days">
  <title>{{$meta_title}}</title>
@endsection
@section('main')
@if(isset($qc_header))
<div class="col-12" style="display:flex; justify-content:center">
  <a href="">
    <img src="{{asset('uploads/quangcao')}}/{{$qc_header->images}}" alt="">
  </a>
</div>
@endif
<div class="container">
    <div class="row container" id="wrapper">
      <div class="halim-panel-filter">
        <div class="panel-heading">
          <div class="row">
            <div class="col-xs-6"> kenhanime.pro</div>
            <div class="col-xs-6 text-right">
              <a href="javascript:;" id="expand-ajax-filter">Lọc Anime <i id="ajax-filter-icon" class="hl-angle-down"></i></a>
            </div>
          </div>
        </div>
        <div id="ajax-filter" class="panel-collapse collapse" aria-expanded="true" role="menu">
        <div class="halim-search-filter">
        <div class="btn-group col-md-12">
            <form id="form-filter" class="form-inline" method="GET" action="{{route('locanime')}}">
                <div class="col-md-4 col-xs-12 col-sm-6">
                    <div class="filter-box">
                    <div class="filter-box-title">Thể Loại</div>
                        <select class="form-control" id="sort" name="theloai">
                            @foreach($showcategory as $showcate)
                            <option value="{{$showcate->id}}">{{$showcate->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-3 col-xs-12 col-sm-6">   
                    <div class="filter-box">
                    <div class="filter-box-title">Trạng Thái</div>
                        <select class="form-control" id="category" name="trangthai"> 
                          @foreach($showtrangthai as $showtt)
                          <option value="{{$showtt->id}}">{{$showtt->name}}</option>
                          @endforeach
                        </select>
                    </div>
                </div>  
                <div class="col-md-3 col-xs-12 col-sm-6">   
                    <div class="filter-box">
                      <div class="filter-box-title">Sắp xếp theo</div>    
                      <select class="form-control" id="status" name="status">
                          <option value="tuadenz">Từ A -> Z</option>
                          <option value="tuzdena">Từ theo Z -> A</option>
                          <option value="ngaycapnhat">Ngày Cập nhật</option>
                          <option value="duocxemnhieu">Được xem nhiều</option>
                      </select>                                   
                    </div>
                </div>
                <div class="col-md-3 col-xs-12 col-sm-6">                       
                    <button type="submit" id="btn-movie-filter" class="btn btn-danger">Lọc Anime</button>
                </div>                                                    
            </form>
        </div>
    </div>
        </div>
      </div>
      <div class="col-xs-12 carausel-sliderWidget"></div>
      <main id="" class="col-xs-12 col-sm-12 col-md-12">
        <section id="halim-advanced-widget-2">
          <div class="section-heading">
            <a href="{{route('home.index')}}" title="Mới Cập Nhật">
              <span class="h-text">Mới Cập Nhật</span>
            </a>
          </div>
          <div id="halim-advanced-widget-2-ajax-box" class="halim_box">
            @foreach($data as $dt)
            <article class="col-md-2 col-sm-3 col-xs-6 thumb grid-item post-6144">
              <div class="halim-item">
                <a class="halim-thumb" href="{{route('chitiet', $dt->slug)}}" title="{{$dt->name}}">
                  <figure>
                    <img class="lazy img-responsive" class="lazy" data-src="{{asset('uploads')}}/{{$dt->image}}" alt="{{$dt->name}}" title="{{$dt->name2}}">
                  </figure>
                  @if($dt->phim_noibat == 1)
                    <span class="status">Hot</span>
                    @elseif($dt->phim_noibat == 2)
                    <span class="status">Anime mới</span>
                    @elseif($dt->phim_noibat == 3)
                    <span class="status">Xem nhiều</span>
                    @endif
                    <span class="is_trailer">{{$dt->ngaycapnhat->diffForHumans()}}</span>
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
            @endforeach
          </div>
        </section>
        <div class="clearfix"></div>
        {{$data->appends(request()->all())->links('user.in-paginate')}}
      </main>
      <!-- @include('user.theloaimain') -->
    </div>
  </div>
  @if(isset($qc_footer))
    <!-- banner footer -->
    <div class="col-12" style="display:flex; justify-content:center">
    <a href="">
      <img src="{{asset('uploads/quangcao')}}/{{$qc_footer->images}}" alt="">
    </a>
  </div>
  <!-- end banner footer -->
  @endif
      <!-- modal -->
  @if(isset($check_quangcao))
    <div class="modal fade" id="banner_qc" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <!-- <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5> -->
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <a href="{{$check_quangcao->link}}">
          <div class="modal-body">
              <img src="{{asset('uploads/quangcao')}}/{{$check_quangcao->images}}" alt="" width="100%">
          </div>
          </a>
          <!-- <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
          </div> -->
        </div>
      </div>
    </div>
  @endif
    <!-- end modal -->
@endsection
@section('js')
  
<!-- <script>
  $('.page-numbers a').unbind('click').on('click', function(e) {
          e.preventDefault();
          var page = $(this).attr('href').split('page=')[1];
          getPosts(page);
    });
  
    function getPosts(page)
    {
        $.ajax({
              type: "GET",
              url: '?page='+ page
        })
        .success(function(data) {
              $('body').html(data);
        });
    }
</script> -->
@endsection
