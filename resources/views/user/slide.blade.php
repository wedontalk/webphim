<div class="container">
      <div class="row fullwith-slider">
        <div id="halim-carousel-widget-2xx" class="wrap-slider">
          <div id="halim-carousel-widget-2" class="owl-carousel owl-theme">
            @if($showslide)
            @foreach($showslide as $showsl)
            <article class="thumb grid-item post-6167">
              <div class="halim-item">
                <a class="halim-thumb" href="{{route('chitiet',$showsl->showproduct->slug)}}" title="{{$showsl->showproduct->name}}">
                  <figure>
                    <img class="lazy img-responsive" src="{{asset('uploads')}}/{{$showsl->showproduct->image}}" alt="{{$showsl->showproduct->name}}" title="{{$showsl->showproduct->name}}"></figure>
                    @if($showsl->showproduct->phim_noibat == 1)
                    <span class="status">Hot</span>
                    @elseif($showsl->showproduct->phim_noibat == 2)
                    <span class="status">Anime mới</span>
                    @elseif($showsl->showproduct->phim_noibat == 3)
                    <span class="status">Xem nhiều</span>
                    @endif
                    <span class="is_trailer">{{$showsl->showproduct->ngaycapnhat->diffForHumans()}}</span>
                    @if(isset($showsl->showslidechapter->first()->name_chapter))
                    <span class="episode">{{$showsl->showslidechapter->first()->name_chapter}}</span>
                    @endif
                    <div class="icon_overlay"></div>
                    <div class="halim-post-title-box">
                      <div class="halim-post-title ">
                        <h2 class="entry-title">{{$showsl->showproduct->name}}</h2>
                        <p class="original_title">{{$showsl->showproduct->name2}}</p>
                      </div>
                    </div>
                </a>
              </div>
            </article>
            @endforeach
            @endif
          </div>
          <script>jQuery(document).ready(function($) {				
                  var owl = $('#halim-carousel-widget-2');
                  owl.owlCarousel({
                    loop: true,
                    margin: 4,
                    autoplay: true,
                    autoplayTimeout: 4000,
                    autoplayHoverPause: true,
                    nav: true,
                    navText: ['<i class="hl-down-open rotate-left"></i>', '<i class="hl-down-open rotate-right"></i>'],
                    responsiveClass: true,
                    responsive: {0: {items:2},480: {items:3}, 600: {items:4},1000: {items: 6}}})});
          </script>
        </div>
      </div>
    </div>