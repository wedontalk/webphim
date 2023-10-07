
<?php $__env->startSection('thongtin'); ?>
<div class="container">
  <div class="row">
    <div class="col-12" style="text-align: center"></div>
    <div class="container">
        <div class="row container">
            <div class="row col-lg-4 col-12 border-right">
                <div class="col-md-12">
                    <div id="thongtin" class="d-flex flex-column align-items-center text-center p-3 py-5">
                        <?php if(Auth::user()->profile_photo_path): ?>
                        <img class="rounded-circle mt-5" width="150px" src="<?php echo e(asset('uploads/profile')); ?>/<?php echo e(Auth::user()->profile_photo_path); ?>">
                        <?php else: ?>
                        <img class="rounded-circle mt-5" width="150px" src="<?php echo e(asset('uploads/logo')); ?>/logoauto1.jpg">
                        <?php endif; ?>
                        <p class="text-black-50"><?php echo e(Auth::user()->email); ?></p>
                    </div>
                </div>
                <div class="col-md-12">
                    <ul class="list-group">
                        <li class="list-group-item active"><a href="<?php echo e(route('thongtincanhan')); ?>">Thông Tin chung</a></li>
                        <li class="list-group-item"><a href="<?php echo e(route('animedaluu')); ?>">Anime đã lưu</a></li>
                        <li class="list-group-item"><a href="<?php echo e(route('binhluanshow')); ?>">Bình luận của bạn</a></li>
                        <li class="list-group-item"><a href="<?php echo e(route('doimatkhau')); ?>">Đổi mật khẩu</a></li>
                        <li class="list-group-item"><a href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Đăng xuất</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-8 col-12">
                <div class="col-md-12 mt-3">
                <h4><center>- Anime đã lưu -</center></h4>
                </div>
                <div class="col-md-12 col-12 mt-3 box-anime">
                    <div class="col-12 row" id="show-luu">
                    </div>
                    <div class="paginatoin-area text-center">
                        <ul class="pagination-box page-numbers">

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>
</div>
<div class="clearfix"></div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
      <!-- ajax lưu anime -->
      <script>
        $(document).ready(function(){
          const loadBlog = (page) => {
          var retrievedObject = localStorage.getItem('bookmark-list');
          // review = JSON.parse(retrievedObject);
            $.ajax({
              headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
                method:"GET",
                url: `<?php echo e(route('ajaxanime')); ?>?page=${page}`,
                dataType: "json",
                data:{retrievedObject:retrievedObject,
                  '_token' : '<?php echo e(csrf_token()); ?>'
                },
                success:function(response){
                    let pagination = '';
                    let content = '';
                    const {
                        data,
                        links,
                        next_page_url,
                        prev_page_url
                    } = response;
                    data.data.map((item, index) => {
                        content += `<div class="col-md-4 col-sm-6">
                      <div class="card col-sm-12">
                        <img class="card-img-top" src="/uploads/${item.image}" alt="Card image cap" width="100%" height="100px">
                        <div class="card-body">
                          <h5 class="card-title" style="height:30px" title="${item.name}">${item.name.substring(0,40)}...</h5>
                          <a href="/chi-tiet-anime/${item.slug}" class="btn btn-primary">Xem ngay</a>
                          <button id="deletebtn" onclick="removeItem(${item.id})" class="btn btn-danger">Xóa</button>
                        </div>
                      </div>
                    </div>`;
                  })
                    $('#show-luu').html(content);
                  data.links.map((item, index) => {
                      if (item.label == '&laquo; Previous') {
                          pagination +=`<li data-page="${item.url != null ? item.url.slice(-1): ""}"><a class="Previous"><i class="hl-down-open rotate-left"></i></a></li>`
                      } else if (item.label == 'Next &raquo;') {
                          pagination +=`<li data-page="${item.url != null ? item.url.slice(-1): ""}"><a class="Next"><i class="hl-down-open rotate-right"></i></a></li>`
                      } else {
                          pagination +=`<li data-page=${item.url.slice(-1)} class="${item.active ? 'active' : ''}"><a>${item.label}</a></li>`
                      }
                  })
                    $('.pagination-box').html(pagination);
                    $('.pagination-box li').click(function(e) {
                        e.preventDefault();
                        loadBlog($(this).data("page"))
                    });
                },
                error: function(error) {
                    console.log(error);
                }
                
           });
          }
          loadBlog();
          });
          
      </script>
      <!-- delete luu anime -->
      <script>
        function removeItem(id){
          let devicesArray = JSON.parse(localStorage.getItem("bookmark-list"))
          devicesArray.splice(devicesArray.indexOf(id), 1)
          localStorage.setItem("bookmark-list", JSON.stringify(devicesArray));
          location.reload(true);
        }
      </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.thongtin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\webphim\resources\views/user/luuanime.blade.php ENDPATH**/ ?>