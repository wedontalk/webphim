
<?php $__env->startSection('title'); ?>
<meta name="description" content="<?php echo e($meta_desc); ?>">
  <link rel="canonical" href="<?php echo e($meta_canontical); ?>" />
  <link rel="shortcut icon" href="<?php echo e(asset('wp-content/uploads/catianlkenhanime.png')); ?>" type="image/x-icon" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta property="og:type" content="website" />
  <meta property="og:title" content="<?php echo e($meta_title); ?>" />
  <meta property="og:description" content="<?php echo e($meta_desc); ?>" />
  <meta property="og:image" content="<?php echo e(asset('wp-content/uploads/catianlkenhanime.png')); ?>" />
  <meta property="og:site_name" content="<?php echo e($meta_canontical); ?>" />
  <meta property="og:url" content="<?php echo e($meta_canontical); ?>" />
  <meta property="og:locale" content="vi_VN" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="robots" content="INDEX,FOLLOW, noodp"/>
  <meta name="googlebot" content="index,follow" />
  <meta name="BingBOT" content="index,follow" />
  <meta name="yahooBOT" content="index,follow" />
  <meta name="slurp" content="index,follow" />
  <meta name="msnbot" content="index,follow" />
  <meta name="revisit-after" content="1 days">
  <title><?php echo e($meta_title); ?></title>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('main'); ?>
<?php if(isset($qc_header)): ?>
<div class="col-12" style="display:flex; justify-content:center">
  <a href="">
    <img src="<?php echo e(asset('uploads/quangcao')); ?>/<?php echo e($qc_header->images); ?>" alt="">
  </a>
</div>
<?php endif; ?>
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
            <form id="form-filter" class="form-inline" method="GET" action="<?php echo e(route('locanime')); ?>">
                <div class="col-md-4 col-xs-12 col-sm-6">
                    <div class="filter-box">
                    <div class="filter-box-title">Thể Loại</div>
                        <select class="form-control" id="sort" name="theloai">
                            <?php $__currentLoopData = $showcategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $showcate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($showcate->id); ?>"><?php echo e($showcate->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-3 col-xs-12 col-sm-6">   
                    <div class="filter-box">
                    <div class="filter-box-title">Trạng Thái</div>
                        <select class="form-control" id="category" name="trangthai"> 
                          <?php $__currentLoopData = $showtrangthai; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $showtt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <option value="<?php echo e($showtt->id); ?>"><?php echo e($showtt->name); ?></option>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
            <a href="<?php echo e(route('home.index')); ?>" title="Mới Cập Nhật">
              <span class="h-text">Mới Cập Nhật</span>
            </a>
          </div>
          <div id="halim-advanced-widget-2-ajax-box" class="halim_box">
            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <article class="col-md-2 col-sm-3 col-xs-6 thumb grid-item post-6144">
              <div class="halim-item">
                <a class="halim-thumb" href="<?php echo e(route('chitiet', $dt->slug)); ?>" title="<?php echo e($dt->name); ?>">
                  <figure>
                    <img class="lazy img-responsive" class="lazy" data-src="<?php echo e(asset('uploads')); ?>/<?php echo e($dt->image); ?>" alt="<?php echo e($dt->name); ?>" title="<?php echo e($dt->name2); ?>">
                  </figure>
                  <?php if($dt->phim_noibat == 1): ?>
                    <span class="status">Hot</span>
                    <?php elseif($dt->phim_noibat == 2): ?>
                    <span class="status">Anime mới</span>
                    <?php elseif($dt->phim_noibat == 3): ?>
                    <span class="status">Xem nhiều</span>
                    <?php endif; ?>
                    <span class="is_trailer"><?php echo e($dt->ngaycapnhat->diffForHumans()); ?></span>
                    <?php if($dt->showphimfirst->max('episode')): ?>
                    <span class="episode">Tập <?php echo e($dt->showphimfirst->max('episode')); ?></span>
                    <?php endif; ?>
                  <div class="icon_overlay"></div>
                  <div class="halim-post-title-box">
                    <div class="halim-post-title ">
                      <h2 class="entry-title"><?php echo e($dt->name); ?></h2>
                      <p class="original_title"><?php echo e($dt->name2); ?></p>
                    </div>
                  </div>
                </a>
              </div>
            </article>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </div>
        </section>
        <div class="clearfix"></div>
        <?php echo e($data->appends(request()->all())->links('user.in-paginate')); ?>

      </main>
      <!-- <?php echo $__env->make('user.theloaimain', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> -->
    </div>
  </div>
  <?php if(isset($qc_footer)): ?>
    <!-- banner footer -->
    <div class="col-12" style="display:flex; justify-content:center">
    <a href="">
      <img src="<?php echo e(asset('uploads/quangcao')); ?>/<?php echo e($qc_footer->images); ?>" alt="">
    </a>
  </div>
  <!-- end banner footer -->
  <?php endif; ?>
      <!-- modal -->
  <?php if(isset($check_quangcao)): ?>
    <div class="modal fade" id="banner_qc" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <!-- <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5> -->
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <a href="<?php echo e($check_quangcao->link); ?>">
          <div class="modal-body">
              <img src="<?php echo e(asset('uploads/quangcao')); ?>/<?php echo e($check_quangcao->images); ?>" alt="" width="100%">
          </div>
          </a>
          <!-- <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
          </div> -->
        </div>
      </div>
    </div>
  <?php endif; ?>
    <!-- end modal -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
  
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\webphim\resources\views/user/home.blade.php ENDPATH**/ ?>