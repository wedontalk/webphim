<?php $__env->startSection('meta'); ?>
   <title><?php echo e($meta_title); ?> <?php if(isset($tap_phim1->episode_name)): ?><?php echo e($tap_phim1->episode_name); ?> - tập <?php echo e($nextfilm); ?><?php endif; ?> - animetvh</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php echo e($meta_title); ?> <?php if(isset($tap_phim1->episode_name)): ?><?php echo e($tap_phim1->episode_name); ?> - tập <?php echo e($nextfilm); ?> <?php endif; ?> | <?php echo e(\Str::limit($meta_desc, 300, $end='...')); ?>">
    <meta name="title" content="<?php echo e($meta_title); ?> <?php if(isset($tap_phim1->episode_name)): ?> <?php echo e($tap_phim1->episode_name); ?> - tập <?php echo e($nextfilm); ?> <?php endif; ?> - animetvh" />
    <meta name="keywords" content="<?php echo e($meta_keyword); ?>" />
    <meta property="og:title" content="<?php echo e($meta_title); ?> <?php if(isset($tap_phim1->episode_name)): ?> <?php echo e($tap_phim1->episode_name); ?> - tập <?php echo e($nextfilm); ?> <?php endif; ?> - animetvh" />
    <meta property="og:description" content="<?php echo e($meta_title); ?> <?php if(isset($tap_phim1->episode_name)): ?> <?php echo e($tap_phim1->episode_name); ?> - tập <?php echo e($nextfilm); ?> <?php endif; ?> | <?php echo e(\Str::limit($meta_desc, 300, $end='...')); ?>" />
    <meta property="og:type" content="website" />
    <meta property="og:image" content="<?php echo e(asset('uploads')); ?>/<?php echo e($name_mn->image); ?>" /> 
    <meta property="og:site_name" content="<?php echo e($meta_canontical); ?>" />
    <meta property="og:url" content="<?php echo e($meta_canontical); ?>" />
    <meta property="og:locale" content="vi_VN" />
    <link rel="canonical" href="<?php echo e($meta_canontical); ?>" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="robots" content="INDEX,FOLLOW, noodp"/>
    <meta name="googlebot" content="index,follow" />
    <meta name="BingBOT" content="index,follow" />
    <meta name="yahooBOT" content="index,follow" />
    <meta name="slurp" content="index,follow" />
    <meta name="msnbot" content="index,follow" />
    <meta name="revisit-after" content="1 days">
    <style>
        .anime__details__review::-webkit-scrollbar {
            width: 6px;
            background-color: #F5F5F5;
        }
        .anime__details__review::-webkit-scrollbar-thumb {
            background-color: #000000;
            border-radius:10px;
        }
        .anime__details__review::-webkit-scrollbar-track {
            -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
            background-color: #F5F5F5;
        }
        .take3{
            background: #e53637;
            padding: 3px;
            border-radius: 5px;
            color: #fff;
            margin-left: 3px;
        }
    </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('main'); ?>
<div class="breadcrumb-option">
  		<h4 style="display:none"><?php echo e($meta_title); ?> <?php if(isset($tap_phim1->episode_name)): ?> <?php echo e($tap_phim1->episode_name); ?> - tập <?php echo e($nextfilm); ?> <?php endif; ?> | <?php echo e(\Str::limit($meta_desc, 300, $end='...')); ?></h4>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                <?php $__currentLoopData = $phimtc; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $phimid): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="breadcrumb__links">
                        <a href="<?php echo e(route('home.index')); ?>"><i class="fa fa-home"></i> Home</a>
                        <a href="">Thể loại</a>
                        <?php $__currentLoopData = $phimid->nhieutheloai; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <span>/ <?php echo e($t->name); ?></span>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Anime Section Begin -->
    <section class="anime-details spad container">
        <div class="">
        <?php $__currentLoopData = $phimtc; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $phimid): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="anime__details__content container">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="anime__details__pic set-bg" data-setbg="<?php echo e(asset('uploads')); ?>/<?php echo e($phimid->image); ?>" alt="<?php echo e($phimid->name); ?>">
                            <div class="comment"><i class="fa fa-comments"></i> 
                            <?php if($comment_count): ?>
                                <?php echo e($comment_count->count()); ?>

                            <?php else: ?>
                                 0
                            <?php endif; ?></div>
                            <div class="view"><i class="fa fa-eye"></i> 
                            <?php if($phimid->num_view == null ||$phimid->num_view < 1): ?>
                                0
                            <?php else: ?>
                                <?php echo e($phimid->num_view); ?>

                            <?php endif; ?>
                                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="anime__details__text">
                            <div class="anime__details__title">
                                <input type="hidden" id="iddd" value="<?php echo e($phimid->id); ?>">
                                <h3><?php echo e($phimid->name); ?></h3>
                                <span><?php echo e($phimid->name2); ?></span>
                            </div>
                            <div class="product__item__text">
                                            
                                                <ul style="">
                                                <span style="color:#fff">Thể loại:</span>
                                                    <?php $__currentLoopData = $phimid->nhieutheloai; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <li><?php echo e($t->name); ?></li>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </ul>
                                            </div>
                            <div class="anime__details__rating">
                                <ul class="rating list_inline" title="average Rating" style="display:inline-flex">
                                    <!-- <a href="#"><i class="fa fa-star"></i></a>
                                    <a href="#"><i class="fa fa-star"></i></a>
                                    <a href="#"><i class="fa fa-star"></i></a>
                                    <a href="#"><i class="fa fa-star"></i></a>
                                    <a href="#"><i class="fa fa-star-half-o"></i></a> -->
                                    <?php for($count=1; $count <= 5; $count++): ?>
                                    <?php
                                        if($count <= $rating){
                                            $color = 'color:#ffcc00;';
                                        }
                                        else{
                                            $color = 'color:#ccc;';
                                        }

                                    ?>
                                    <span title="star_rating"
                                        id="<?php echo e($phimid->id); ?>-<?php echo e($count); ?>"
                                        data-index="<?php echo e($count); ?>"
                                        data-id="<?php echo e($phimid->id); ?>"
                                        data-rating="<?php echo e($rating); ?>"
                                        class = "rating"
                                        style ="cursor:pointer; <?php echo e($color); ?> font-size:30px; margin:0 5px">&#9733;

                                    </span>
                                    <?php endfor; ?>
                                </ul>
                                <span><?php echo e($rating_count); ?> Votes</span>
                            </div>
                            <div class="anime__details__widget">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <ul>
                                            <li><span>Tập phim:</span>
                                            <?php $__currentLoopData = $take3phim; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $take3): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <a href="<?php echo e(url('xem-phim/'.$take3->slug_phim)); ?>" class="take3"><?php echo e($take3->episode_name); ?></a>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </li>
                                            <li><span>Hãng phim:</span> <?php echo e($phimid->director); ?></li>
                                            <li><span>Diễn viên:</span> <?php echo e($phimid->actor); ?></li>
                                            <li><span>Tác giả:</span> <?php echo e($phimid->author); ?></li>
                                            <li><span>Quốc gia:</span> <?php echo e($phimid->quocgia->name); ?></li>
                                        </ul>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <ul>
                                            <li><span>Năm sản xuất:</span> <?php echo e($phimid->year); ?></li>
                                            <li><span>Kiểu phim:</span> <?php echo e($phimid->kieuphim->name); ?></li>
                                            <li><span>Tình trạng:</span> <?php echo e($phimid->status); ?></li>                                           
                                            <li><span>Thời lượng:</span> 24 phút/tập</li>
                                            <li><span>lượt xem:</span> 
                                                <?php if($phimid->num_view == null ||$phimid->num_view < 1): ?>
                                                    0
                                                <?php else: ?>
                                                    <?php echo e($phimid->num_view); ?>

                                                <?php endif; ?>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="anime__details__btn">
                                <!-- <a href="#" class="follow-btn"><i class="fa fa-heart-o"></i> Follow</a> -->
                                <?php if($tap_phim): ?>
                                <a href="<?php echo e(url('xem-phim/'.$tap_phim->slug_phim)); ?>" name="num_view" class="watch-btn"><span>Xem ngay</span> <i class="fa fa-angle-right"></i></a>
                                <?php else: ?>
                                <span class="watch-btn" onclick="alertify.error('hiện tại chưa có phim hẹn bạn quay lại sau...');"><span>Xem ngay</span> <i class="fa fa-angle-right"></i></span>
                                <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                <div class="col-lg-8 col-md-8">
                    <div class="col-lg-12">
                    <div class="section-title">
                        <h5>Thông tin phim</h5>
                    </div>
                    <p style="color:#fff"><?php echo $phimid->description; ?></p>
                    </div>
                    <hr>
                    <div class="col-lg-12">
                    <?php if(Route::has('login')): ?>
                            <?php if(auth()->guard()->check()): ?>
                        <div class="anime__details__review" style="overflow-y: auto;max-height: 400px; padding-right:5px">
                            <div class="section-title">
                                <h5>Bình luận</h5>
                            </div>
                            <?php $__currentLoopData = $comment; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $commentt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="anime__review__item">
                                <div class="anime__review__item__pic">
                                    <img src="<?php echo e(asset('user/img/anime/review-1.jpg')); ?>" alt="">
                                </div>
                                <div class="anime__review__item__text">
                                    <h6><?php echo e($commentt->comment_name); ?> - <span><?php echo e($commentt->comment_date); ?></span></h6>
                                    <?php if($commentt->action == 1): ?>
                                    <p><?php echo e($commentt->comment); ?></p>
                                    <?php else: ?>
                                    <p>bình luận này hiện tại đang bị báo cáo vi phạm !!!</p>
                                    <?php endif; ?>
                                    <hr>
                                    <?php if(Auth::user()->name == $commentt->comment_name): ?>
                                    <button style="float:right;color:#1f8eef; background:transparent; border:none" data-id="<?php echo e($commentt->id); ?>" type="button" id="deleteComment">Xóa bình luận</button>
                                    <?php endif; ?>
                                    <?php if($commentt->action == 1): ?>
                                    <button style="color:#1c95ff; background:transparent; border:none" type="button" data-id="<?php echo e($commentt->id); ?>" id="baocao">Báo cáo vi phạm</button>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                        <?php else: ?>
                        <div class="anime__details__review">
                            <div class="section-title">
                                <h5>Bình luận</h5>
                            </div>
                            <?php $__currentLoopData = $comment; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $commentt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="anime__review__item">
                                <div class="anime__review__item__pic">
                                    <img src="<?php echo e(asset('user/img/anime/review-1.jpg')); ?>" alt="">
                                </div>
                                <div class="anime__review__item__text">
                                    <h6><?php echo e($commentt->comment_name); ?> - <span><?php echo e($commentt->comment_date); ?></span></h6>
                                    <?php if($commentt->action == 1): ?>
                                    <p><?php echo e($commentt->comment); ?></p>
                                    <?php else: ?>
                                    <p>Bình luận này hiện tại đang bị báo cáo vi phạm !!!</p>
                                    <?php endif; ?>
                                    <hr>
                                    <?php if($commentt->action == 1): ?>
                                    <?php echo csrf_field(); ?>
                                    <a style="color:#1c95ff; background:transparent; border:none" type="button" data-id="<?php echo e($commentt->id); ?>" id="baocao">Báo cáo vi phạm</a>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                        <?php endif; ?>                                            
                        <?php endif; ?>
                        <div class="anime__details__form">
                            <div class="section-title">
                                <h5>Bình luận của bạn</h5>
                            </div>
                                <input type="hidden" id="name" value="<?php if(Auth::user()): ?><?php echo e(Auth::user()->name); ?><?php endif; ?>">
                                <textarea placeholder="nhập bình luận của bạn" id="content"></textarea>
                                <?php if(Route::has('login')): ?>
                                <?php if(auth()->guard()->check()): ?>
                                <button type="submit" id="comment"><i class="fa fa-location-arrow"></i> Bình luận</button>
                                <?php else: ?>
                                <button type="submit" onclick="alertify.error('Vui lòng đăng nhập !!!');"><i class="fa fa-location-arrow"></i> Bình luận</button>                                 
                                <?php endif; ?>
                                <?php endif; ?>
                        </div>
                    </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="anime__details__sidebar">
                            <div class="section-title">
                                <h5>Có thể bạn thích</h5>
                            </div>
                            <?php $__currentLoopData = $phimctn; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $xn): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="product__sidebar__view__item set-bg" data-setbg="<?php echo e(asset('uploads')); ?>/<?php echo e($xn->image); ?>" alt="<?php echo e($xn->name); ?>">
                                <div class="ep"><?php echo e($xn->status); ?></div>
                                <div class="view">
                                    <i class="fa fa-eye"></i> 
                                    <?php if($xn->num_view == null ||$xn->num_view < 1): ?>
                                        0
                                    <?php else: ?>
                                        <?php echo e($xn->num_view); ?>

                                    <?php endif; ?>
                                </div>
                                <h5><a href="<?php echo e(url('chi-tiet/'.$xn->slug)); ?>"><?php echo e($xn->name); ?></a></h5>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
    </section>
    <h4 style="display:none"><?php echo e($meta_title); ?> <?php if(isset($tap_phim1->episode_name)): ?><?php echo e($tap_phim1->episode_name); ?> - tập <?php echo e($nextfilm); ?><?php endif; ?> | <?php echo e(\Str::limit($meta_desc, 300, $end='...')); ?></h4>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
<!-- CSS -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
<!-- Default theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
<!-- Semantic UI theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css"/>
<!-- Bootstrap theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>
<!-- <script type="text/javascript">
    jQuery(document).ready(function($){
        load_comment();
        function load_comment(){
            var product_id = $('#iddd').val();
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url:"<?php echo e(url('/load-comment')); ?>",
                method:"POST",
                data:{product_id:product_id, _token:_token},
                success:function(data){
                    $('.anime__review__item').html(data);
                }
            });
        }
    });
</script> -->
<!-- dlt comment -->
<script>
    jQuery(document).ready(function($){
        $(document).on('click','#deleteComment', function(event){
                // event.preventDefault();
                var id = $('#deleteComment').data("id");
                var _token = $('input[name="_token"]').val();
            $.ajax({
                url:"<?php echo e(url('/delete-comment')); ?>",
                method:"POST",
                data:{id:id, _token:_token},
                success:function(data){
                    if(data == 'thanhcong')
                {
                    alertify.success('xóa bình luận thành công !');
                    function greatin(){
                        window.location.reload(true);
                    }
                    setTimeout(greatin, 2000);
                }
                else
                {
                    alertify.error('gặp lỗi rồi !');

                }
                }
            });
        })
    });
</script>
<!-- baocao -->
<script>
    jQuery(document).ready(function($){
        $(document).on('click','#baocao', function(){
                // event.preventDefault();
                var id_baocao = $(this).data("id");
                var _token = $('input[name="_token"]').val();
                alert(id_baocao);
            $.ajax({
                url:"<?php echo e(url('/bao-cao')); ?>",
                method:"POST",
                data:{id_baocao:id_baocao, _token:_token},
                success:function(data){
                    if(data == 'baocaothanhcong')
                {
                    alertify.success('báo cáo thành công !');
                    function greatin(){
                        window.location.reload(true);
                    }
                    setTimeout(greatin, 2000);
                }
                else
                {
                    alertify.error('gặp lỗi rồi !');

                }
                }
            });
        })
    });
</script>
<!-- thêm comment -->
<script>
    jQuery(document).ready(function($){
        $('#comment').on('click', function(event){
                // event.preventDefault();
                var id = $('#iddd').val();
                var name = $('#name').val();
                var content = $('#content').val();
                var _token = $('input[name="_token"]').val();
            $.ajax({
                url:"<?php echo e(url('/binh-luan')); ?>",
                method:"POST",
                data:{id:id,name:name,content:content, _token:_token},
                success:function(data){
                    if(data == 'done')
                {
                    alertify.success('cập nhật thành công !');
                    function greatin(){
                        window.location.reload(true);
                    }
                    setTimeout(greatin, 2000);
                }
                else
                {
                    alertify.error('gặp lỗi rồi !');

                }
                }
            });
        })
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/animetvh/domains/animetvh.net/public_html/resources/views/user1/chitiet.blade.php ENDPATH**/ ?>