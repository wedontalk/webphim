
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
                                 <a class="label-text" href="<?php echo e(route('theloai', $shownhieu->slug)); ?>" rel="category tag"><?php echo e($shownhieu->name); ?></a>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </span>
                    
                    <div class="clearfix"></div>
                    <br>
                    <div class="col-12" style="display:block;">
                    List Server :
                    <?php $__currentLoopData = $showtapphimtheoserver; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $show_server): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <a data-href="<?php echo e($show_server->content); ?>" data-svid="<?php echo e($show_server->id_server); ?>" class="btn btn-info btn-server"><?php echo e($show_server->funcserver->name_server); ?></a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <br>
                    <div class="clearfix"></div>
                    <div id="halim-player-wrapper" class="ajax-player-loading">
                        <!-- show phim -->
                        <iframe src="<?php echo e($showphimtap->content); ?>" frameborder="0" width="100%" height="100%" allowfullscreen></iframe>
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
                                    <?php
                                    if ($showphimtap->view_episode > 999 && $showphimtap->view_episode <= 999999) {
                                        $result = floor($showphimtap->view_episode / 1000) . 'K';
                                    } elseif ($showphimtap->view_episode > 999999) {
                                        $result = floor($showphimtap->view_episode / 1000000) . 'M';
                                    } else {
                                        $result = $showphimtap->view_episode;
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
                                <a href="<?php echo e(route('chitiet', $showphimfirst->slug)); ?>" title="<?php echo e($showphimfirst->name); ?>" class="tl"><?php echo e($showphimfirst->name); ?></a>
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
                                                <a id="hrefslug" href="<?php echo e(route('xemphim',$showtapsv->slug_phim)); ?>" data-film="<?php echo e($showtapsv->film_id); ?>" data-ep="<?php echo e($showtapsv->id); ?>" data-slug = "<?php echo e($showtapsv->slug_phim); ?>">
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
            <div class="clearfix"></div>
            <section class="related-movies">
                <div class="section-heading">
                    <a title="Bình Luận - <?php echo e($showphimfirst->name); ?>">
                        <span class="h-text">Bình Luận - <?php echo e($showphimfirst->name); ?> </span>
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
                    <?php $__empty_1 = true; $__currentLoopData = $select_comment; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="media col-md-12" style="margin-top:10px">
                        <div class="media-left" style="">
                            <div style="width:55px">
                                <img src="<?php echo e(asset('uploads/logo')); ?>/logoauto1.jpg" alt="..." style="width:55px; max-width:55px">
                                <a data-id="" style="cursor:pointer" data-toggle="collapse" href="#comment<?php echo e($comment->id); ?>" role="button" aria-expanded="false" aria-controls="collapseExample">Trả lời</a>
                            </div>
                        </div>
                        <div class="media-body" style="">
                            <h4 class="media-heading" style="color:#000;font-size:12px;"><?php echo e($comment->idUser->name); ?>

                                <?php if(auth()->guard()->check()): ?>
                                <?php if(isset(Auth::user()->id)): ?>
                                    <?php if(Auth::user()->id == $comment->id_user): ?>
                                        <a style="font-size:12px;cursor:pointer">Xóa</a>
                                    <?php endif; ?>
                                <?php endif; ?>
                                <?php endif; ?>
                            </h4>
                            <p style="color:#000"><?php echo e($comment->content); ?></p>
                            <!-- con -->
                            <?php if(count($comment->replies)): ?>
                            <?php $__currentLoopData = $comment->replies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment_cr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="media col-md-12" style="margin-top:10px">
                                <div class="media-left" style="">
                                    <div style="width:55px">
                                        <img src="<?php echo e(asset('uploads/logo')); ?>/logoauto1.jpg" alt="..." style="width:55px; max-width:55px;">
                                        <a data-id="" style="cursor:pointer" data-toggle="collapse" href="#comment<?php echo e($comment_cr->id); ?>" role="button" aria-expanded="false" aria-controls="collapseExample">Trả lời</a>
                                    </div>
                                </div>
                                <div class="media-body" style="">
                                    <h4 class="media-heading" style="color:#000;font-size:12px"><?php echo e($comment_cr->idUser->name); ?>

                                        <?php if(auth()->guard()->check()): ?>
                                        <?php if(isset(Auth::user()->id)): ?>
                                            <?php if(Auth::user()->id == $comment_cr->id_user): ?>
                                                <a style="font-size:12px;cursor:pointer">Xóa</a>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                        <?php endif; ?>
                                    </h4>
                                    <p style="color:#000"><span style="color:#58e570"><?php echo e($comment_cr->reply_id_user->name); ?></span> - <?php echo e($comment_cr->content); ?></p>
                                </div>
                            </div>
                            <div class="col-md-12 collapse" id="comment<?php echo e($comment_cr->id); ?>">
                                <div class="card card-body">
                                    <div class="form-group" id="reply-form-<?php echo e($comment_cr->id); ?>">
                                    <textarea class="form-control reply_content" rows="3" placeholder="nhập bình luận tại đây. Vui lòng không share link bậy bạ dẫn tới bị khóa tài khoản."></textarea>
                                    <div class="comment_form">
                                    <button type="button" id="reply_comment" data-reply-id="<?php echo e($comment_cr->id_user); ?>" data-reply="<?php echo e($comment_cr->id); ?>" data-pr="<?php echo e($comment->id); ?>" class="btn btn-info">Bình Luận</button>
                                    </div>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-md-12 collapse" id="comment<?php echo e($comment->id); ?>">
                        <div class="card card-body">
                            <div class="form-group" id="reply-form-<?php echo e($comment->id); ?>">
                            <textarea class="form-control reply_content" rows="3" placeholder="nhập bình luận tại đây. Vui lòng không share link bậy bạ dẫn tới bị khóa tài khoản."></textarea>
                            <div class="comment_form">
                            <button type="button" id="reply_comment" data-reply-id="<?php echo e($comment->id_user); ?>" data-reply="<?php echo e($comment->id); ?>" data-pr="<?php echo e($comment->id); ?>" class="btn btn-info">Bình Luận</button>
                            </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <div class="alert alert-warning" style="margin-top:20px" role="alert">Hiện chưa có bình luận nào !</div>
                    <?php endif; ?>
                </div>
                <div class="clearfix"></div>
                <div class="text-align" style="text-align:center">
                    <?php echo e($select_comment->appends(request()->all())->links()); ?>

                </div>
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
                <textarea class="form-control" id="idbaoloi" data-idphim="<?php echo e($showphimfirst->id); ?>" data-idtapphim="<?php echo e($showphimtap->episode); ?>" placeholder="Vui lòng nhập vấn đề của tập phim để được fix nhanh nhất..." cols="30" rows="5"></textarea>
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
                url:'<?php echo e(route("baoloitapphim")); ?>',
                method:'post',
                data:{
                    idphim:idphim,idtapphim:idtapphim,description:description,_token:'<?php echo e(csrf_token()); ?>',
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
                url:'<?php echo e(route("commentphim")); ?>',
                method:'post',
                data:{
                    id_phim:'<?php echo e($showphimfirst->id); ?>',id_episode:'<?php echo e($showphimtap->id); ?>',textarea:Textarea,_token:'<?php echo e(csrf_token()); ?>',
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
        var url = "<?php echo e(route('comments.reply', ['comment' => ':commentId'])); ?>";
        url = url.replace(':commentId', commentId);
        // alert(url);
        $.ajax({
            url:url,
            method:'post',
            data:{
                id_phim:'<?php echo e($showphimfirst->id); ?>',id_episode:'<?php echo e($showphimtap->id); ?>',parent:datapr,reply:replyId,content:content,_token:'<?php echo e(csrf_token()); ?>',
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\webphim\resources\views/user/xemphim.blade.php ENDPATH**/ ?>