

<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendors/toastify/toastify.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendors/dripicons/webfont.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/pages/dripicons.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendors/choices.js/choices.min.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendors/simple-datatables/style.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendors/summernote/summernote-lite.min.css')); ?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.css">
    <link href="//cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
    <style>
        .phongnen{
            width: 165px;
            height: 200px;
            border: 1px solid rgb(247, 247, 247);
            border-radius: 15px;
            box-shadow: rgba(247, 247, 247, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;
        }
        .phongnen img{
            padding: 5px 5px 5px 5px;
            width: 163.5px;
            height: 198px;
            border-radius: 15px;
            box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
        }
        .phongheader{
            border: 1px solid #000;
        }
        .list-group li{
            font-weight: bold;
        }
        .list-group li:nth-child(2n-1){
            background-color: rgb(243, 241, 241);
        }
        .suaxoa a{
            margin-left: 5px;
        }
        /* .overchapter{
            height: 400px;
            overflow-y: auto;
        } */
        .textdes{
            overflow-y: auto;
            height: 200px;
            background-color: #f4f4f4;
            padding: 7px;
            border-radius: 5px;
            text-align: justify;
            box-shadow: rgba(67, 71, 85, 0.27) 0px 0px 0.25em, rgba(90, 125, 188, 0.05) 0px 0.25em 1em;
        }
        .textdes::-webkit-scrollbar {
            width: 6px;
            background-color: #F5F5F5;
        }
        .textdes::-webkit-scrollbar-thumb {
            background-color: #cccccc;
            border-radius: 5px;
        }
        .butthemne{
            margin-top: -3px;
            position: relative;
            padding-left: 24px;
        }
        .iconthem{
            font-size: 24px;
            position: absolute;
            left: 0;
            top: 0.6px;
        }


        .showhim{
            position: relative;
        }
        .showme {
            /* display: none; */
            position: absolute;
            right: 0;
            top: 0;
            /* background-color: orangered; */
            color: #000;
            width: 500px;
            /* height: 200px; */
        }
        .showhim:hover .showme {
            display: block;
        }
    </style>
    <style>
        #id_form{
            position: relative;
        }
        #id_form .thongtin_anhien{
            position: absolute;
            left: 0;
            top: 100%;
            width: 100%;
            max-height: 300px;
            overflow: auto;
            border-radius: 5px;
            background-color: rgb(224, 224, 224);
            box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;
            display: none;
        }
        .img_search{
            width: 70px;
            height: 100px;
            margin-right: 10px;
        }
        .search-item{
            display: flex;
            border-bottom: 1px dashed;
            padding: 5px 0px;
        }
    </style>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('main'); ?>
<div id="main">
    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>
    <section class="section">
        <div class="row" id="table-bordered">
            <div class="col-12">
                <div class="card">
                    <?php $__currentLoopData = $thongtin; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $dt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="card-header">
                        <div class="row d-flex">
                            <div class="col-md-4 col-12">
                                <h4 class="card-title">Thông tin Chi Tiết : 
                                    <span type="button" class="btn btn-primary mt-2" data-toggle="modal" data-target="#chinhsuachitiet">Chỉnh sửa chi tiết</span>
                                </h4>
                            </div>
                            <div class="col-md-3 col-12 flex-row-reverse">
                                <button type="button" class="btn btn-warning mt-2" data-bs-toggle="modal" data-bs-target="#thongbaoloi">
                                    Báo lỗi <span class="badge bg-transparent"><?php echo e($baoloi_failer->count()); ?></span>
                                </button>
                                &nbsp;
                                <button type="button" class="btn btn-danger mt-2" data-bs-toggle="modal" data-bs-target="#trailer">
                                    Trailer <span class="badge bg-transparent"></span>
                                </button>
                            </div>
                            <div class="col-md-5 col-12">
                                <div class="form-group position-relative has-icon-right mt-2">
                                    <form action="" method="GET" role="form" style="z-index:2;" id="id_form">
                                        <input type="text" class="form-control" id="search" placeholder="Tìm kiếm phim" name="key">
                                        <div class="form-control-icon">
                                            <a type="submit"><i class="icon dripicons-search"></i></a>
                                        </div>
                                        <div id="result" class="thongtin_anhien">
                                            <p>Thông tin phim</p>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-2 col-sm-12">
                                    <div class="phongnen">
                                        <img id="images_avatar" src="<?php echo e(asset('uploads')); ?>/<?php echo e($dt->image); ?>" alt="">
                                    </div>
                                    <div>
                                        <button class="btn btn-outline-warning form-control mt-3 rounded-pill" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                                            sửa hình đại diện
                                        </button>
                                    </div>
                                </div>
                                <div class="col-md-5 col-sm-12">
                                    <h5><strong><?php echo e($dt->name); ?></strong></h5>
                                    <p>
                                    <?php $__currentLoopData = $dt->nhieutheloai; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <span class="badge bg-primary rounded-pill butthem" style="margin: 2px 0px 2px 0px;"><?php echo e($cate->name); ?></span>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </p>
                                    <p>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <strong>Trạng thái : </strong>
                                            </div>
                                            <div class="col-md-9">
                                                <select class="form-control-sm" id="selectTrangthai" data-id="<?php echo e($thongtin_first->id); ?>">
                                                    <?php $__currentLoopData = $trangthai; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option <?php echo e(($thongtin_first->status == $tt->id) ? 'selected':''); ?> value="<?php echo e($tt->id); ?>"><?php echo e($tt->name); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>
                                        </div>
                                    </p>
                                    <p><strong>Tập phim mới nhất : </strong><span>Tập <?php echo e($dt->showphimfirst->max('episode')); ?></span></p>
                                    <p><strong>lượt xem : </strong><span><?php echo e($dt->tapphim->sum('view_episode')); ?></span></p>
                                    <p><strong>Thời gian cập nhật : </strong><span><?php echo e($dt->ngaycapnhat->diffForHumans()); ?></span></p>
                                </div>
                                <div class="col-md-5 col-sm-12">
                                    <div class="textdes">
                                        <?php echo \Str::limit($dt->description, 10000, $end='...'); ?>

                                        <hr>

                                        <!-- <button type="button" class="btn btn-primary sua-textdes" data-toggle="modal" data-target="#textDescription">sửa description</button> -->
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#textdescription">
                                            Sửa description
                                        </button>
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12 mt-3">
                                    <div class="collapse alert alert-primary" id="collapseExample">
                                        <div class="card card-body">
                                            <form method="post" id="upload-image-form" enctype="multipart/form-data">
                                                <?php echo csrf_field(); ?>
                                                <div class="form-group" style="display:none">
                                                    <input type="text" name="id" value="<?php echo e($thongtin_first->id); ?>" readonly>
                                                </div>
                                                <div class="input-group">
                                                    <input type="file" onchange="onFileSelected()" class="form-control" id="uploadfile" name="file_upload">
                                                    <button class="btn btn-primary">Upload</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <div class="card-body">
                        <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="row" style="padding: 5px 0px 5px 0px;">
                                            <div class="col-md-8 col-sm-12">
                                                <h5 class="card-title"><strong>Tổng hợp</strong> tập phim</h5>
                                            </div>
                                            <div class="col-md-2 col-sm-5">
                                                <div class="form-group">
                                                    <!-- <label for="exampleFormControlSelect1">Example select</label> -->
                                                    <select class="form-control" id="select_sv" name="selectsv">
                                                        <option value="<?php echo e(Request::url()); ?>">Lọc server anime</option>
                                                        <?php $__currentLoopData = $link_server; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sv): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option value="<?php echo e(Request::url()); ?>?select_sv=<?php echo e($sv->id); ?>"><?php echo e($sv->name_server); ?></option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-2 col-sm-5 mt-1">
                                                <a href="<?php echo e(url('admintrator/them-tap-phim',$dt->slug)); ?>" class="form-group btn btn-outline-primary butthemne">
                                                <span class="icon dripicons-plus iconthem"></span>Thêm tập phim</a>
                                            </div>
                                        </div>
                                        <div class="table-responsive">
                                            <table class="table table-striped" id="myTable">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Name</th>
                                                        <th>Tập Anime</th>
                                                        <th>Link server</th>
                                                        <th>Lượt xem</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php $__empty_1 = true; $__currentLoopData = $tap_phim; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $showtap): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                    <tr class="showhim">
                                                        <td ><input type="checkbox" class="checkboxclass" name="ids" value="<?php echo e($showtap->id); ?>"></td>
                                                        <td><?php echo e($dt->name); ?></td>
                                                        <td><?php echo e($showtap->episode_name); ?></td>
                                                        <td><?php echo e($showtap->funcserver->name_server); ?></td>
                                                        <td><?php echo e($showtap->view_episode); ?> - view</td>
                                                        <td>
                                                            <button type="button" id="clickshow" data-backdrop="false" data-name_episode="<?php echo e($showtap->episode_name); ?>" data-src="<?php echo e($showtap->content); ?>" class="btn btn-primary" data-toggle="modal" data-target="#showtaphim">chi tiết</button>
                                                            <!-- <a href="<?php echo e(route('tapphim.show',$showtap->id)); ?>" class="btn btn-primary">xem</a> -->
                                                            <a href="<?php echo e(route('tapphim.edit',$showtap->id)); ?>" class="btn btn-outline-primary">sửa</a>
                                                            <a href="<?php echo e(route('tapphim.destroy',$showtap->id)); ?>" class="btn btn-outline-danger btndelete">xóa</a>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                                <tr>
                                                    <td colspan="6">
                                                        <div class="alert alert-danger" role="alert">
                                                            chưa có tập phim nào
                                                        </div>
                                                    </td>
                                                </tr>
                                                <?php endif; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                        <form method="POST" action="" id="form-delete">
                                            <?php echo method_field('DELETE'); ?>
                                            <?php echo csrf_field(); ?>
                                        </form>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- modal description -->
<div class="modal fade" id="textdescription" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Sửa description</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <textarea name="description" id="content" cols="30" rows="10"><?php echo $thongtin_first->description; ?></textarea>
      </div>
      <div class="modal-footer">
        <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
        <button type="button" class="btn btn-primary" id="luuDescription" data-id="<?php echo e($thongtin_first->id); ?>">Lưu Ngay</button>
      </div>
    </div>
  </div>
</div>
<!-- end modal description -->
<!-- Modal chỉnh sửa chi tiết -->
<div class="modal fade" id="chinhsuachitiet" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Chỉnh sửa chi tiết</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form form-horizontal" action="<?php echo e(route('phim.update', $thongtin_first->id)); ?>" method="POST" role="form" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?> <?php echo method_field('PUT'); ?>
                    <div class="form-body">
                        <div class="row">
                            <!-- manga -->
                            <div class="col-md-3">
                                <label>Tên phim</label>
                            </div>
                            <div class="col-md-9 form-group">
                                <input type="text" id="first-name" value="<?php echo e($thongtin_first->name); ?>" class="form-control"name="name" placeholder="nhập tên phim">
                            </div>
                            <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="alert alert-warning"><i class="bi bi-exclamation-triangle"></i> <?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            <!-- tên phim 2 -->
                            <div class="col-md-3">
                                <label>Tên phim 2</label>
                            </div>
                            <div class="col-md-9 form-group">
                                <input type="text" id="first-name" value="<?php echo e($thongtin_first->name2); ?>" class="form-control"name="name2" placeholder="nhập tên phim 2">
                            </div>
                            <?php $__errorArgs = ['name2'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="alert alert-warning"><i class="bi bi-exclamation-triangle"></i> <?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            <!-- danh mục -->
                            <div class="col-md-3">
                                <label>danh mục thể loại</label>
                            </div>
                            <div class="col-md-9 form-group">
                                <select class="choices form-select select-light-danger" multiple="multiple" name="danhmuc[]">
                                <?php $__currentLoopData = $cats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dm): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option <?php echo e(($phimtheloaine->contains($dm->id)) ? 'selected' : ''); ?> value="<?php echo e($dm->id); ?>"><?php echo e($dm->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <!-- kiểu phim -->
                            <div class="col-md-3">
                                <label>Kiểu phim</label>
                            </div>
                            <div class="col-md-9 form-group">
                                <select class="form-select" name="type_movie">
                                    <?php $__currentLoopData = $kieuphim; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dm): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option <?php echo e(($thongtin_first->type_movie == $dm->id) ? 'selected':''); ?> value="<?php echo e($dm->id); ?>"><?php echo e($dm->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <!-- quốc gia phim -->
                            <div class="col-md-3">
                                <label>Trạng thái phim</label>
                            </div>
                            <div class="col-md-9 form-group">
                                <select class="form-select" name="status">
                                    <?php $__currentLoopData = $trangthai; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option <?php echo e(($thongtin_first->status == $tt->id) ? 'selected':''); ?> value="<?php echo e($tt->id); ?>"><?php echo e($tt->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <?php $__errorArgs = ['status'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="alert alert-warning"><i class="bi bi-exclamation-triangle"></i> <?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            <!-- Thời lượng phim -->
                            <div class="col-md-3">
                                <label>Thời lượng phim</label>
                            </div>
                            <div class="col-md-9 form-group">
                                <input type="text" id="first-name" value="<?php echo e($thongtin_first->duration); ?>" class="form-control" name="duration" placeholder="nhập thời lượng phim">
                            </div>
                            <?php $__errorArgs = ['duration'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="alert alert-warning"><i class="bi bi-exclamation-triangle"></i> <?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            <!-- Thời lượng phim -->
                            <div class="col-md-3">
                                <label>Năm sản xuất</label>
                            </div>
                            <div class="col-md-9 form-group">
                                <input type="text" id="first-name" value="<?php echo e($thongtin_first->year); ?>" class="form-control" name="year" placeholder="nhập năm sản xuất">
                            </div>
                            <?php $__errorArgs = ['year'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="alert alert-warning"><i class="bi bi-exclamation-triangle"></i> <?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            <!-- phim nổi bật -->
                            <div class="col-md-3">
                                <label>Phim nổi bật</label>
                            </div>
                            <div class="col-md-9 form-group">
                                <select class="form-select" name="phim_noibat">
                                        <option value="0" <?php echo e(($thongtin_first->phim_noibat == 0) ? 'selected':''); ?>>Bình thường</option>
                                        <option value="1" <?php echo e(($thongtin_first->phim_noibat == 1) ? 'selected':''); ?>>Hot</option>
                                        <option value="2" <?php echo e(($thongtin_first->phim_noibat == 2) ? 'selected':''); ?>>Mới cập nhật</option>
                                        <option value="3" <?php echo e(($thongtin_first->phim_noibat == 3) ? 'selected':''); ?>>Xem nhiều</option>
                                </select>
                            </div>
                            <!-- tóm tắc truyện -->
                            <div class="col-md-3">
                                <label>Tóm tắc phim</label>
                            </div>
                            <div class="col-md-9 form-group">
                                <textarea class="form-control" id="content_description" name="description" rows="3"><?php echo $thongtin_first->description; ?></textarea>
                            </div>
                            <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="alert alert-warning"><i class="bi bi-exclamation-triangle"></i> <?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            <!-- hình ảnh -->
                            <div class="col-md-3">
                                <label>Hình ảnh</label>
                            </div>
                            <div class="col-md-9 form-group">
                                <input class="form-control" type="file" id="formFile" name="file_upload" >
                                <img class="mt-2" src="<?php echo e(asset('uploads')); ?>/<?php echo e($thongtin_first->image); ?>" alt="" width="100px" height="100px">
                                <input type="hidden" name="images" id="" value="<?php echo e($thongtin_first->image); ?>">
                            </div>
                            <!-- 2 thẻ meta -->
                            <div class="form-group col-sm-6">
                                <label for="">meta_description</label>
                                <textarea name="meta_desc" style="background:#eeeeee" id="" class="form-control" cols="30" rows="5" placeholder="nhập meta_description"><?php echo e($thongtin_first->meta_desc); ?></textarea>
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="">meta_keyword</label>
                                <textarea name="meta_keyword" style="background:#eeeeee" id="" class="form-control" cols="30" rows="5" placeholder="nhập meta_description"><?php echo e($thongtin_first->meta_keyword); ?></textarea>
                            </div>
                            <!-- check ẩn hiện -->
                            <div class="col-md-3">
                                <label for="">Trạng thái</label>
                            </div>
                            <div class="col-md-9 form-group">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="anHien" <?php echo e(($thongtin_first->anHien == 2) ? 'checked':''); ?> value="2">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        Ẩn 
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="anHien" <?php echo e(($thongtin_first->anHien == 1) ? 'checked':''); ?> value="1" checked>
                                    <label class="form-check-label" for="flexRadioDefault2">
                                        Hiện
                                    </label>
                                </div>
                            </div>
                        </div>
                        <hr>    
                        <div class="col-sm-12 d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary me-1 mb-1">Sửa ngay</button>
                            <!-- <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button> -->
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- end modal chỉnh sửa chi tiết -->
<!-- modal thông báo lỗi -->
<div class="modal fade text-left" id="thongbaoloi" tabindex="-1" aria-labelledby="myModalLabel160" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title white" id="myModalLabel160">
                    Thông Báo Lỗi Anime : <?php echo e($thongtin_first->name); ?>

                </h5>
            </div>
            <div class="modal-body">
                <?php $__currentLoopData = $baoloi_failer; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $baoloi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="alert alert-info d-flex" role="alert">
                        Tập <?php echo e($baoloi->id_episode); ?> - <?php echo e($baoloi->description); ?> - 
                        <div class="form-group">
                            <select class="form-control-sm" id="id_trangthai" data-id="<?php echo e($baoloi->id); ?>" data-id_film="<?php echo e($baoloi->id_film); ?>" data-id_episode="<?php echo e($baoloi->id_episode); ?>">
                              <option value="1" <?php echo e(($baoloi->cap_nhat == 1) ? 'selected':''); ?>>Chưa khắc phục</option>
                              <option value="2" <?php echo e(($baoloi->cap_nhat == 2) ? 'selected':''); ?>>Đã khắc phục</option>
                            </select>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                    <i class="bx bx-x d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">Close</span>
                </button>
            </div>
        </div>
    </div>
</div>
<!-- end modal thông báo lỗi -->

<!-- Modal xem video -->
<div class="modal fade" id="showtaphim" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="name_episode_film"></h5>
        <button type="button" id="clicknotwatch" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body showiframephim">
            <iframe class="lazy img-responsive" frameborder="0" allowfullscreen width="100%" height="250px"></iframe>
        </div>
        <div class="modal-footer">
        <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button> -->
        </div>
    </div>
    </div>
</div>
<!-- modal trailer -->
<!--BorderLess Modal Modal -->
<div class="modal fade text-left modal-borderless" id="trailer" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h5 class="modal-title white">Trailer Anime</h5>
                <button type="button" class="close rounded-pill"
                    data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <div class="modal-body">
                <center><h5>- Trailer -</h5></center>
                <iframe id="iframe_trailer" src="<?php echo e($thongtin_first->trailer); ?>" frameborder="0" width="100%" height="100%" allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                <input type="text" id="text-trailer" class="form-control" placeholder="Link iframe trailer Anime" value="<?php echo e($thongtin_first->trailer); ?>">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary"
                    data-bs-dismiss="modal">
                    <i class="bx bx-x d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">Close</span>
                </button>
                <button type="button" id="update_trailer" data-id="<?php echo e($thongtin_first->id); ?>" class="btn btn-danger ml-1">
                    <i class="bx bx-check d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">Lưu trailer</span>
                </button>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"></script>
<script src="<?php echo e(asset('assets/vendors/summernote/summernote-lite.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/vendors/choices.js/choices.min.js')); ?>"></script>
<!-- alert -->
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
<script src="<?php echo e(asset('assets/vendors/toastify/toastify.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/extensions/toastify.js')); ?>"></script>
<script src="<?php echo e(asset('assets/vendors/simple-datatables/simple-datatables.js')); ?>"></script>
<?php if (isset($component)) { $__componentOriginald4c8f106e1e33ab85c5d037c2504e2574c1b0975 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Alert::class, []); ?>
<?php $component->withName('alert'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald4c8f106e1e33ab85c5d037c2504e2574c1b0975)): ?>
<?php $component = $__componentOriginald4c8f106e1e33ab85c5d037c2504e2574c1b0975; ?>
<?php unset($__componentOriginald4c8f106e1e33ab85c5d037c2504e2574c1b0975); ?>
<?php endif; ?>
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
        $('.btndelete').click(function(ev) {
            ev.preventDefault();
            var _href = $(this).attr('href');
            $('form#form-delete').attr('action',_href);
            if(confirm('bạn muốn xóa chứ ?')){
                $('form#form-delete').submit();
            }
        });
    });
</script>
<script>
        // Summernote
        $('#content').summernote({
            tabsize: 2,
            height: 120,
        });
        $('#content_description').summernote({
            tabsize: 2,
            height: 120,
        });
</script>
<!-- show phim -->
<script>
        jQuery(document).ready(function(){
            $(document).on('click', '#clickshow', function(e) {
                e.preventDefault();
                var showsource = $(this).data('src');
                var setdata = $(this).data('target');
                var nameepisode = $(this).data('name_episode');
                // $('#showtaphim').attr('id', setdata);
                // $('#showtaphim').load();
                // console.log($('#showtaphim').attr('id', setdata));
                console.log('chaning to"'+ showsource +'"');
                $('.showiframephim iframe').attr('src', showsource);
                $('#name_episode_film').text('Đang xem : ' + nameepisode);
                $('#name_episode_film').load();
                $('.showiframephim').load();
            });
            $('#clicknotwatch').click(function(){
                    $('.showiframephim iframe').attr('src', '');
                    $('.showiframephim').load();
            });
        })
</script>
<!-- ajax lưu description -->
<script>
    jQuery(document).ready(function($) {
        $('#luuDescription').click(function(e){
            e.preventDefault();
            var id = $(this).data('id');
            var content = $('#content').val();
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url:'<?php echo e(Route("postfilmdescription")); ?>',
                method:'post',
                data:{
                    id:id,content:content,_token:_token,
                },
                success: function(data){
                    if(data){
                        Swal.fire({
                            position: 'center-center',
                            icon: 'success',
                            title: 'Đã sửa thành công',
                            showConfirmButton: true,
                            timer: 1500
                        })
                    }
                }
            })
            $(document).ajaxStop(function(){
                // var loaddesajax = $('.textdes').text();
                setTimeout(function(){
                    window.location.reload(true);
                },1500);
            });
        })
    })
</script>
<!-- ajax lưu trạng thái hoàn thành -->
<script>
    jQuery(document).ready(function($){
        $('#selectTrangthai').on('change', function(){
            var id = $(this).data('id');
            var selectchange =  $(this).val();
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url:'<?php echo e(Route("postfilmstatus")); ?>',
                method:'post',
                data:{
                    id:id,selectchange:selectchange,_token:_token,
                },
                success: function(data){
                    if(data){
                        Swal.fire({
                            position: 'center-center',
                            icon: 'success',
                            title: 'Đã sửa thành công',
                            showConfirmButton: true,
                            timer: 1500
                        })
                    }
                }
            })
            $(document).ajaxStop(function(){
                // var loaddesajax = $('.textdes').text();
                    // window.location.reload(true);
                setTimeout(function(){
                    window.location.reload(true);
                },1500);
            });
        })
    })
</script>
<!-- upload file images -->
<script>
    // logo header
    function onFileSelected() {
        var selectedFile = event.target.files[0];
        var reader = new FileReader();

        var imgtag = document.getElementById("images_avatar");
        imgtag.title = selectedFile.name;

        reader.onload = function(event) {
            imgtag.src = event.target.result;
            // document.getElementById("show_img").style.display = "block";
        };
        reader.readAsDataURL(selectedFile);
    }
</script>
<!-- post film images -->
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

   $('#upload-image-form').submit(function(e) {
       e.preventDefault();
       let formData = new FormData(this);
       $('#image-input-error').text('');
       $.ajax({
          type:'POST',
            url: "<?php echo e(route('postfilmimages')); ?>",
           data: formData,
           contentType: false,
           processData: false,
           success: (response) => {
             if (response) {
               this.reset();
               Swal.fire({
                    position: 'center-center',
                    icon: 'success',
                    title: 'Đã sửa thành công',
                    showConfirmButton: true,
                    timer: 1500
                })
             }
           },
           error: function(response){
              console.log(response);
                $('#image-input-error').text(response.responseJSON.errors.file);
           }
       });
  });

</script>
<!-- ajax update trạng thái -->
<script>
        jQuery(document).ready(function($) {
        $(document).on('change','#id_trangthai', function(e){
            var id = $(this).data('id');
            var idtrangthai = $(this).val();
            var idfilm = $(this).data('id_film');
            var idepisode = $(this).data('id_episode');
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url:'<?php echo e(route("updatetrangthai")); ?>',
                type:"post",
                data:{
                    _token:_token,
                    id:id,
                    idtrangthai:idtrangthai,
                    idfilm:idfilm,
                    idepisode:idepisode,
                },
                success:function(data){
                    if(data){
                        Swal.fire({
                            position: 'center-center',
                            icon: 'success',
                            title: 'Đã sửa thành công',
                            showConfirmButton: true,
                            timer: 1500
                        })
                    }
                }
            });
            $(document).ajaxStop(function(){
                // var loaddesajax = $('.textdes').text();
                    // window.location.reload(true);
                setTimeout(function(){
                    window.location.reload(true);
                },1500);
            });
        });
        
    });
</script>
<!-- put trailer anime -->
<script>
    jQuery(document).ready(function($) {
        $('#update_trailer').click(function(ev){
            var id_phim = $(this).data('id');
            var input_trailer = $('#text-trailer').val();
            var _token = $('input[name="_token"]').val();
            // console.log(id_phim);
            // console.log(input_trailer);
            // console.log(_token);
            alertify.confirm('bạn chắc muốn thay đổi thông tin ?', function(result){
                $.ajax({
                    url:'<?php echo e(Route("postfilmtrailer")); ?>',
                    method:'post',
                    data:{
                        id_phim:id_phim,input_trailer:input_trailer,_token:_token,
                    },
                    success: function(data){
                        if(data){
                            Swal.fire({
                                position: 'center-center',
                                icon: 'success',
                                title: 'Đã sửa thành công',
                                showConfirmButton: true,
                                timer: 1500
                            })
                        }
                        setTimeout(function(){
                            // window.location.reload(true);
                            $('#iframe_trailer').attr('src', data)
                        },1500);
                    }
                })

            })
        });
    })
</script>
<!-- script tìm anime nhanh -->
<script>
    // callback delay
    function delay(callback, ms) {
        var timer = 0;
        return function() {
            var context = this, args = arguments;
            clearTimeout(timer);
            timer = setTimeout(function () {
            callback.apply(context, args);
            }, ms || 0);
        };
    }
 // tìm kiếm
    $(document).ready(function(){
        $('#search').keyup(delay(function (e){
        $('#result').html('');
        var search = $('#search').val();
        // alert(search);
        var timer = 0;
        if(search != ''){
                var expression = new RegExp(search, "i");
                $.getJSON('/json_file/movies.json', function(data){
                    $.each(data, function(key, value){
                        if(value.name.search(expression) != -1){
                            $('#result').css('display','inherit');
                            $('#result').append('<div class="search-item"><img class="img_search" src="/uploads/'+value.image+'" alt="'+value.name+'"><a href="'+ value.id +'">'+ value.name +'</a></div>')
                        }
                    })
                })
            
        }else{
            $('#result').css('display','none')
        }
        }, 700))
    });
    // select server
    jQuery(document).ready(function($) {
        $('#select_sv').change(function(e){
            var id_server = $(this).val();
            // alert(id_server);
            if(id_server){
                window.location = id_server;
            }
            return false;
        });
        locdanhsach();
        function locdanhsach() {
            var id_server = window.location.href;
            $('select[id="select_sv"]').find('option[value="'+id_server+'"]').attr("selected",true);
        }
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\webphim\resources\views/admin/phim/show.blade.php ENDPATH**/ ?>