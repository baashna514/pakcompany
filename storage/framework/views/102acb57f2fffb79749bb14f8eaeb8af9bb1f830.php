<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>MyShopik.com - A brand of WebEasy Pvt Limited | Admin Panel</title>
    <!-- Favicon-->
    <?php echo $__env->make('admin.layout.favicon', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="<?php echo e(asset('public/admin/plugins/bootstrap/css/bootstrap.css')); ?>" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="<?php echo e(asset('public/admin/plugins/node-waves/waves.css')); ?>" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="<?php echo e(asset('public/admin/plugins/animate-css/animate.css')); ?>" rel="stylesheet" />

    <!-- Bootstrap Material Datetime Picker Css -->
    <link href="<?php echo e(asset('public/admin/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css')); ?>" rel="stylesheet" />

    <!-- Bootstrap DatePicker Css -->
    <link href="<?php echo e(asset('public/admin/plugins/bootstrap-datepicker/css/bootstrap-datepicker.css')); ?>" rel="stylesheet" />

    <!-- Wait Me Css -->
    <link href="<?php echo e(asset('public/admin/plugins/waitme/waitMe.css')); ?>" rel="stylesheet" />

    <!-- Bootstrap Select Css -->
    <link href="<?php echo e(asset('public/admin/plugins/bootstrap-select/css/bootstrap-select.css')); ?>" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="<?php echo e(asset('public/admin/css/style.css')); ?>" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="<?php echo e(asset('public/admin/css/themes/all-themes.css')); ?>" rel="stylesheet" />

    <!-- Image Upload and Preview Css -->
    <link href="<?php echo e(asset('public/admin/plugins/file-upload/file-upload-with-preview.min.css')); ?>" rel="stylesheet" type="text/css" />
</head>

<body class="theme-indigo">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Search Bar -->
    <div class="search-bar">
        <div class="search-icon">
            <i class="material-icons">search</i>
        </div>
        <input type="text" placeholder="START TYPING...">
        <div class="close-search">
            <i class="material-icons">close</i>
        </div>
    </div>
    <!-- #END# Search Bar -->
    <!-- Top Bar -->
    <?php echo $__env->make('admin.layout.top-bar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->
        <?php echo $__env->make('admin.layout.left-sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- #END# Left Sidebar -->
        <!-- Right Sidebar -->
        <?php echo $__env->make('admin.layout.right-sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- #END# Right Sidebar -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>SLIDER SETTING</h2>
            </div>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="" style="margin-bottom: 20px;">
                            <?php echo $__env->make('admin.layout.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Theme Setting
                                <small>New Slider</small>
                            </h2>
                        </div>
                        <div class="body">
                            <form action="<?php echo e(route('ds.theme-setting.slider-setting-action')); ?>" method="POST" enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>
                                <div class="row clearfix">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <div class="custom-file-container" data-upload-id="slider">
                                                    <label style="color: #555;">Slider: (1680 * 500)<a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image"></a></label>
                                                    <label class="custom-file-container__custom-file" >
                                                        <input type="file" name="slider" class="custom-file-container__custom-file__custom-file-input">
                                                        <span class="custom-file-container__custom-file__custom-file-control"></span>
                                                    </label>
                                                    <div class="custom-file-container__image-preview"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-default">Submit</button>
                              </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Theme Setting
                                <small>Slider List</small>
                            </h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th>SR#</th>
                                            <th>Image</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>SR#</th>
                                            <th>Image</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php $__currentLoopData = $sliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php
                                            $index = $key + 1;
                                        ?>
                                        <tr>
                                            <td><?php echo e($index); ?></td>
                                            <td>
                                                <img class="thumbnail" style="width: 100%;" src="<?php echo e(asset('public/slider/').'/'.$slider->image); ?>" alt="">
                                            </td>
                                            <td>
                                                <a href="<?php echo e(route('slider-delete', ['id' => $slider->id])); ?>" class="btn btn-primary"><i class="material-icons">delete</i></a>
                                            </td>
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Exportable Table -->
        </div>
    </section>

    <!-- Jquery Core Js -->
    <script src="<?php echo e(asset('public/admin/plugins/jquery/jquery.min.js')); ?>"></script>

    <!-- Bootstrap Core Js -->
    <script src="<?php echo e(asset('public/admin/plugins/bootstrap/js/bootstrap.js')); ?>"></script>

    <!-- Select Plugin Js -->
    <script src="<?php echo e(asset('public/admin/plugins/bootstrap-select/js/bootstrap-select.js')); ?>"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="<?php echo e(asset('public/admin/plugins/jquery-slimscroll/jquery.slimscroll.js')); ?>"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="<?php echo e(asset('public/admin/plugins/node-waves/waves.js')); ?>"></script>

    <!-- Jquery DataTable Plugin Js -->
    <script src="<?php echo e(asset('public/admin/plugins/jquery-datatable/jquery.dataTables.js')); ?>"></script>
    <script src="<?php echo e(asset('public/admin/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js')); ?>"></script>
    <script src="<?php echo e(asset('public/admin/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js')); ?>"></script>
    <script src="<?php echo e(asset('public/admin/plugins/jquery-datatable/extensions/export/buttons.flash.min.js')); ?>"></script>
    <script src="<?php echo e(asset('public/admin/plugins/jquery-datatable/extensions/export/jszip.min.js')); ?>"></script>
    <script src="<?php echo e(asset('public/admin/plugins/jquery-datatable/extensions/export/pdfmake.min.js')); ?>"></script>
    <script src="<?php echo e(asset('public/admin/plugins/jquery-datatable/extensions/export/vfs_fonts.js')); ?>"></script>
    <script src="<?php echo e(asset('public/admin/plugins/jquery-datatable/extensions/export/buttons.html')); ?>5.min.js')}}"></script>
    <script src="<?php echo e(asset('public/admin/plugins/jquery-datatable/extensions/export/buttons.print.min.js')); ?>"></script>

    <!-- Custom Js -->
    <script src="<?php echo e(asset('public/admin/js/admin.js')); ?>"></script>
    <script src="<?php echo e(asset('public/admin/js/pages/tables/jquery-datatable.js')); ?>"></script>

    <!-- Demo Js -->
    <script src="<?php echo e(asset('public/admin/js/demo.js')); ?>"></script>
    <!-- Image upload and preview Js -->
    <script src="<?php echo e(asset('public/admin/plugins/file-upload/file-upload-with-preview.min.js')); ?>"></script>
    <script>
        var slider = new FileUploadWithPreview('slider')
    </script>
</body>

</html>
<?php /**PATH C:\wamp64\www\pakcompany\resources\views/admin/theme-settings/slider-settings.blade.php ENDPATH**/ ?>