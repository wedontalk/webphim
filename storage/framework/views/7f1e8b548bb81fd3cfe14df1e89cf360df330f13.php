
<?php $__env->startSection('title'); ?>
<meta name="description" content="<?php echo e($meta_title); ?> <?php echo e($showphimtap->episode_name); ?> | <?php echo e(\Str::limit($meta_desc, 300, $end='...')); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="INDEX,FOLLOW, noodp"/>
    <meta property="og:type" content="website" />
    <meta property="og:title" content="<?php echo e($meta_title); ?> <?php echo e($showphimtap->episode_name); ?> | animetvh.net" />
    <meta property="og:description" content="<?php echo e($meta_title); ?> <?php echo e($showphimtap->episode_name); ?> | <?php echo e(\Str::limit($meta_desc, 300, $end='...')); ?>" />
    <meta property="og:image" content="<?php echo e(asset('wp-content/uploads/catianlkenhanime.png')); ?>" />
    <meta property="og:site_name" content="<?php echo e($meta_canontical); ?>" />
    <meta property="og:url" content="<?php echo e($meta_canontical); ?>" />
    <link rel="shortcut icon" href="<?php echo e(asset('wp-content/uploads/catianlkenhanime.png')); ?>" type="image/x-icon" />
    <link rel="canonical" href="<?php echo e($meta_canontical); ?>" />
    <meta property="og:locale" content="vi_VN" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="googlebot" content="index,follow" />
    <meta name="BingBOT" content="index,follow" />
    <meta name="yahooBOT" content="index,follow" />
    <meta name="slurp" content="index,follow" />
    <meta name="msnbot" content="index,follow" />
    <meta name="revisit-after" content="1 days">
    <title><?php echo e($meta_title); ?> <?php echo e($showphimtap->episode_name); ?> | animetvh.net</title>
    <?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('main'); ?>
<div class="container">
    <div class="row container" id="wrapper">
        <div class="halim-panel-filter">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-6">
                        <div class="yoast_breadcrumb hidden-xs">
                            <span>
                                <span>
                                    <a href="<?php echo e(route('home.index')); ?>">Home</a> » 
                                    <span>
                                        <a href="<?php echo e(route('theloai', $showphimfirst->cat->slug)); ?>"><?php echo e($showphimfirst->cat->name); ?></a> » 
                                        <span class="breadcrumb_last" aria-current="page">
                                            <?php echo e($showphimfirst->name); ?>

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
                        <?php $__currentLoopData = $showphim; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $show): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php $__currentLoopData = $show->nhieutheloai; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $shownhieu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                - <a href="<?php echo e(route('theloai', $shownhieu->slug)); ?>" rel="category tag"><?php echo e($shownhieu->name); ?></a>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </span>
                    <hr>
                    <div class="clearfix"></div>

                    <hr>
                    <div id="halim-player-wrapper" class="ajax-player-loading">
                        <!-- show phim -->
                        <iframe src="<?php echo e($showphimtap->content); ?>" frameborder="0" width="100%" height="100%" allowfullscreen></iframe>
                    </div>
                    <div class="clearfix"></div>
                    <div class="button-watch">
                        <ul class="halim-social-plugin col-xs-4 hidden-xs">
                        <?php
                            $current_url = Request::url();
                        ?>
                            <div class="fb-like" data-href="<?php echo e($current_url); ?>" data-width="" data-layout="button" data-action="like" data-size="small" data-share="true"></div>                        </ul>
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
                                    <?php
                                    if ($showphimfirst->showphimfirst->sum('view_episode') > 999 && $showphimfirst->showphimfirst->sum('view_episode') <= 999999) {
                                        $result = floor($showphimfirst->showphimfirst->sum('view_episode') / 1000) . 'K';
                                    } elseif ($showphimfirst->showphimfirst->sum('view_episode') > 999999) {
                                        $result = floor($showphimfirst->showphimfirst->sum('view_episode') / 1000000) . 'M';
                                    } else {
                                        $result = $showphimfirst->showphimfirst->sum('view_episode');
                                    }
                                    ?>
                                    <?php echo e($result); ?>

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
                                <a href="" title="Yuusha, Yamemasu" class="tl"><?php echo e($showphimfirst->name); ?></a>
                            </h1>
                            <span class="plot-collapse" data-toggle="collapse" data-target="#expand-post-content" aria-expanded="false" aria-controls="expand-post-content" data-text="Nội dung phim"><i class="hl-angle-down"></i></span>
                        </div>
                        <div class="ratings_wrapper">
                            <span class="hidden" itemprop="name"><?php echo e($showphimfirst->name); ?></span>
                            <span class="hidden" itemprop="description"><?php echo $showphimfirst->description; ?> [&hellip;]</span>
                        </div>
                    </div>
                    <div class="entry-content htmlwrap clearfix collapse" id="expand-post-content">
                        <article id="post-5813" class="item-content post-5813">
                            <p style="margin-bottom:90px"></p>
                            <!-- <h2><?php echo e($showphimfirst->name); ?></h2> -->
                            <p style="text-align: justify;"><?php echo $showphimfirst->description; ?></p>
                        </article>
                    </div>
                    <div class="clearfix"></div>
                    <div class="text-center"><div id="halim-ajax-list-server"></div></div>
                    <div id="halim-list-server" class="list-eps-ajax">
                        <div class="halim-server">
                            <ul class="halim-list-eps">
                                    <?php $__currentLoopData = $showlistunique; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $showtapsv): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php
                                            $segment = $showtapsv->slug_phim;
                                        ?>
                                            <li class="halim-episode">
                                                <a id="hrefslug" href="<?php echo e(route('xemphim',$showtapsv->slug_phim)); ?>" data-slug = "<?php echo e($showtapsv->slug_phim); ?>">
                                                    <span class="halim-btn halim-btn-2 halim-info-1-1 box-shadow <?php echo e(Request::segment(2) == $segment ? 'active':''); ?>" data-title="<?php echo e($showtapsv->products->name); ?> <?php echo e($showtapsv->episode_name); ?>"><?php echo e($showtapsv->episode_name); ?></span>
                                                </a>
                                            </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        <div class="clearfix"></div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div id="lightout"></div>
                </div>
            </section>
            <section class="related-movies">
                <section id="halim-advanced-widget-3">
                    <div class="section-heading">
                        <a href="/moi-cap-nhat" title="Mới Cập Nhật">
                            <span class="h-text">Có Thể Bạn Thích</span>
                        </a>
                    </div>
                    <div id="halim-advanced-widget-3-ajax-box" class="halim_box">
                        <?php $__currentLoopData = $showphimlienquan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $showplq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <article class="col-md-3 col-sm-3 col-xs-6 thumb grid-item">
                            <div class="halim-item">
                                <a class="halim-thumb" href="<?php echo e(route('chitiet', $showplq->slug)); ?>" title="<?php echo e($showplq->name); ?>">
                                <figure>
                                    <img class="lazy img-responsive" data-src="<?php echo e(asset('uploads')); ?>/<?php echo e($showplq->image); ?>" alt="<?php echo e($showplq->name); ?>" title="<?php echo e($showplq->name); ?>">
                                </figure>
                                <span class="episode"><?php echo e($showplq->showphimfirst->max('episode')); ?>/<?php echo e($showplq->duration); ?></span>
                                <div class="icon_overlay"></div>
                                <div class="halim-post-title-box">
                                    <div class="halim-post-title ">
                                    <h2 class="entry-title"><?php echo e($showplq->name); ?></h2>
                                    <p class="original_title"><?php echo e($showplq->name2); ?></p>
                                    </div>
                                </div>
                                </a>
                            </div>
                        </article>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </section>
                <div class="clearfix"></div>
            </section>
        </main>
        <?php echo $__env->make('user.theloaimain', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="baoloi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document" >
    <div class="modal-content" style="background:#222d38;">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Báo lỗi Anime - <?php echo e($showphimfirst->name); ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="modal-body">
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Nhập Nội dung</label>
                <textarea class="form-control" id="idbaoloi" data-idphim="<?php echo e($showphimfirst->id); ?>" data-idtapphim="<?php echo e($showphimtap->episode); ?>" placeholder="Vui lòng nhập vấn đề của tập phim để được fix nhanh nhất..."></textarea>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-primary" id="btnbaoloi" style="background:#009688">Báo lỗi</button>
        </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
<script type='text/javascript' src='<?php echo e(asset("wp-content/themes/halimmovies/assets/js/halimmovie.core.min.js?ver=1.0")); ?>'></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"></script>
<!-- <script>
jQuery(document).ready(function($) {
        runwatchtv();
    function runwatchtv(){
        $(".ajax-player-loading").append('<div id="halim-player-loader"></div>');
        setTimeout(function(){
            $(".ajax-player-loading").append('');
            $("#halim-player-loader").hide();
        },1000);
    }
});
</script> -->
<script>
jQuery(document).ready(function($) {
    $(document).on('click','#btnbaoloi', function(e){
        var idphim = $('#idbaoloi').data('idphim');
        var idtapphim = $('#idbaoloi').data('idtapphim');
        var description = $('#idbaoloi').val();
        $.ajax({
                url:'<?php echo e(route("baoloitapphim")); ?>',
                method:'post',
                data:{
                    idphim:idphim,idtapphim:idtapphim,description:description,_token:'<?php echo e(csrf_token()); ?>',
                },
                success: function(data){
                    if(data){
                        alert('báo cáo thành công !');
                    }
                }
            })
    });

});

</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\webphim\resources\views/user/xemphim.blade.php ENDPATH**/ ?>