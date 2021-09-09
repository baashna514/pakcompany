<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" />
    <title>Pak Company - Buy Online Holy Quran, Tafseer, Ahadees | Admin Panel</title>
    <!-- Favicon-->
    <link rel="icon" href="<?php echo e(asset('public/admin/favicon.ico')); ?>" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="<?php echo e(asset('public/admin/plugins/bootstrap/css/bootstrap.css')); ?>" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="<?php echo e(asset('public/admin/plugins/node-waves/waves.css')); ?>" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="<?php echo e(asset('public/admin/plugins/animate-css/animate.css')); ?>" rel="stylesheet" />

    <!-- JQuery DataTable Css -->
    <link href="<?php echo e(asset('public/admin/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css')); ?>" rel="stylesheet">

    <!-- Custom Css -->
    <link href="<?php echo e(asset('public/admin/css/style.css')); ?>" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="<?php echo e(asset('public/admin/css/themes/all-themes.css')); ?>" rel="stylesheet" />

    <!-- Bootstrap Material Datetime Picker Css -->
    <link href="<?php echo e(asset('public/admin/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css')); ?>" rel="stylesheet" />

    <!-- Bootstrap DatePicker Css -->
    <link href="<?php echo e(asset('public/admin/plugins/bootstrap-datepicker/css/bootstrap-datepicker.css')); ?>" rel="stylesheet" />

    <!-- Wait Me Css -->
    <link href="<?php echo e(asset('public/admin/plugins/waitme/waitMe.css')); ?>" rel="stylesheet" />

    <!-- Bootstrap Select Css -->
    <link href="<?php echo e(asset('public/admin/plugins/bootstrap-select/css/bootstrap-select.css')); ?>" rel="stylesheet" />

    <!-- Image Upload and Preview Css -->
    <link href="<?php echo e(asset('public/admin/plugins/file-upload/file-upload-with-preview.min.css')); ?>" rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet"/>
    <link href="<?php echo e(asset('public/admin/plugins/multi-select/css/multi-select.css')); ?>" rel="stylesheet">
    
    
    <style>
        .bootstrap-select{
            /* display: none; */
        }
        .required{
            color: red;
        }
    </style>
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
                <h2>NEW PRODUCT</h2>
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
            <form action="<?php echo e(route('ds.product-management.new-product-action')); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <!-- Exportable Table -->
                <div class="row clearfix">
                    <!-- Left Content -->
                    <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                        <!-- Product Basics -->
                        <div class="row clearfix">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="card">
                                    <div class="header">
                                        <h2>Product Basics</h2>
                                    </div>
                                    <div class="body">
                                        <div class="row clearfix">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <label for="p_name">Product <span class="required" title="This field is required">*</span></label>
                                                        <input type="text" value="" name="p_name" class="form-control" placeholder="product name" required/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-2">
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <label for="availability">Availabilty</label><br>
                                                        <input type="radio" class="form-control" id="in" name="stock" value="in" checked>
                                                        <label for="in">in stok </label><br>
                                                        <input type="radio" class="form-control" id="out" name="stock" value="out">
                                                        <label for="out">out of stock</label><br>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-2">
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <label for="p_quantity">Quantity</label>
                                                        <input type="text" value="" name="p_quantity" class="form-control" placeholder="product quantity"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-2">
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <label for="is_featured">is Featured?</label><br>
                                                        <input type="checkbox" name="is_featured" class="check_id form-control" id="checkbox">
                                                        <label for="checkbox"></label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row clearfix" id="simple-product-section">
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <label for="regular_price">Price <span class="required" title="This field is required">*</span></label>
                                                        <input type="number" name="regular_price" class="form-control" placeholder="Regular price"/>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <label for="sale_price">Sale Price</label>
                                                        <input type="number" value="" name="sale_price" class="form-control" placeholder="Sale price"/>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <label for="price">From</label>
                                                        <input type="date" name="from" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <label for="price">To</label>
                                                            <input type="date" name="to" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                           
                                        <div class="row clearfix">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <label for="p_detail">Detail</label>
                                                        <textarea  name="p_detail" id="p_detail" class="form-control" cols="100" rows="5" placeholder="product detail"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- #END# Product Basics -->

                        <!-- Product Description -->
                        <div class="row clearfix">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="card">
                                    <div class="header">
                                        <h2>Description</h2>
                                    </div>
                                    <div class="body">
                                        <div class="row clearfix">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <label for="p_description">Short Description</label>
                                                        <textarea class="form-control" name="p_description" id="p_description" cols="100" rows="3"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- #END# Product Delivery -->

                        <!-- Product Shipment -->
                        <div class="row clearfix">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="card">
                                    <div class="header">
                                        <h2>Delivery</h2>
                                    </div>
                                    <div class="body">
                                        <div class="row clearfix">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <label for="weight">Package Weight (kg)</label>
                                                        <input type="text" name="weight" class="form-control" placeholder="Package Weight">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row clearfix">
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <label for="length">Length (cm)</label>
                                                        <input type="text" name="length" class="form-control" placeholder="Package length">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <label for="width">Width (cm)</label>
                                                        <input type="text" name="width" class="form-control" placeholder="Package width">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <label for="height">Height (cm)</label>
                                                        <input type="text" name="height" class="form-control" placeholder="Package height">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- #END# Product Shipment -->
                    </div>
                    <!-- #END# Left Content -->
                    <!-- Right Content -->
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                        <!-- Categories -->
                        <div class="row clearfix">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="card">
                                    <div class="header">
                                        <h2>
                                            Categories
                                        </h2>
                                    </div>
                                    <div class="body">
                                        <div class="row clearfix">
                                            <div class="col-sm-12">
                                                <label for="category">Select Category:</label>
                                                <select name="cat_id"  class="form-control show-tick ms category" id="category" required>
                                                    <?php if($categories): ?>
                                                        <option value="" disabled selected>Select Category</option>
                                                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option value="<?php echo e($cat->id); ?>"><?php echo e($cat->name); ?></option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <?php endif; ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row clearfix">
                                            <div class="col-sm-12">
                                                <div class="form-group"> 
                                                    <label for="category">Select SubCategory:</label>
                                                    <select name="subcategory_id"  class="form-control show-tick ms subcategory">
                                                        <?php if($subcategories): ?>
                                                            <option  value="" class="disabled" disabled selected>Select Subcategory</option>
                                                            <?php $__currentLoopData = $subcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subcat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <option id="subcategoryOption" value="<?php echo e($subcat->id); ?>"><?php echo e($subcat->name); ?></option>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            <?php endif; ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row clearfix">
                                            <div class="col-sm-12">
                                                <div class="form-group"> 
                                                    <label for="subcategory1_id">Select SubCategory 1:</label>
                                                    <select name="subcategory1_id"  class="form-control show-tick ms subcategory1">
                                                        <?php if($subcategories): ?>
                                                            <option  value="" class="disabled" disabled selected>Select Subcategory 1</option>
                                                            <?php $__currentLoopData = $subcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subcat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <option id="subcategory1Option" value="<?php echo e($subcat->id); ?>"><?php echo e($subcat->name); ?></option>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            <?php endif; ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row clearfix">
                                            <div class="col-sm-12">
                                                <div class="form-group"> 
                                                    <label for="subcategory2_id">Select SubCategory 2:</label>
                                                    <select name="subcategory2_id"  class="form-control show-tick ms subcategory2">
                                                        <?php if($subcategories): ?>
                                                            <option  value="" class="disabled" disabled selected>Select Subcategory 2</option>
                                                            <?php $__currentLoopData = $subcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subcat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <option id="subcategory2Option" value="<?php echo e($subcat->id); ?>"><?php echo e($subcat->name); ?></option>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            <?php endif; ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="footer">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Categories End -->

                        <!-- Product Thumbnail -->
                        <div class="row clearfix">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="card">
                                    <div class="header">
                                        <h2>
                                            Product Thumbnail
                                            
                                        </h2>
                                    </div>
                                    <div class="body">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <div class="custom-file-container" data-upload-id="p_thumbnail">
                                                            <label style="color: #555;">Product Thumbnail: (450x663 PX, Dark Background)<a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image"></a></label>
                                                            <label class="custom-file-container__custom-file" >
                                                                <input type="file" name="p_thumbnail" class="custom-file-container__custom-file__custom-file-input">
                                                                <span class="custom-file-container__custom-file__custom-file-control"></span>
                                                            </label>
                                                            <div class="custom-file-container__image-preview"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Product Thumbnail End -->
                        <!-- Product Gallery -->
                        <div class="row clearfix">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="card">
                                    <div class="header">
                                        <h2>
                                            Product Gallery
                                            
                                        </h2>
                                    </div>
                                    <div class="body">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <div class="custom-file-container" data-upload-id="p_gallery">
                                                            <label style="color: #555;">Product Gallery: (450x663 PX, Dark Background)<a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image"></a></label>
                                                            <label class="custom-file-container__custom-file" >
                                                                <input type="file" name="p_gallery[]" class="custom-file-container__custom-file__custom-file-input" multiple>
                                                                <span class="custom-file-container__custom-file__custom-file-control"></span>
                                                            </label>
                                                            <div class="custom-file-container__image-preview"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Product Gallery End -->
                        <button type="submit" class="btn btn-success" style="width: 100%; margin-bottom:30px;">Submit</button>
                    </div>
                    <!-- #END# Right Content -->
                </div>
                <!-- #END# Exportable Table -->
            </form>
        </div>

<div class="modal fade" id="couponModal" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            Product Management
                            <small>New Value</small>
                        </h2>
                    </div>
                    <div class="body">
                        <form action="<?php echo e(route('ds.product-management.color_action')); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label for="value">Value Name:</label>
                                            <input name="code" id="code" placeholder="enter value" type="color" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="button"  class="btn btn-default add-color">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
    
    <script src="<?php echo e(asset('public/admin/plugins/jquery-datatable/extensions/export/buttons.print.min.js')); ?>"></script>
    <!-- Custom Js -->
    <script src="<?php echo e(asset('public/admin/js/admin.js')); ?>"></script>
    <script src="<?php echo e(asset('public/admin/js/pages/tables/jquery-datatable.js')); ?>"></script>
    <!-- Demo Js -->
    <script src="<?php echo e(asset('public/admin/js/demo.js')); ?>"></script>
    <script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>

    

    <!-- Autosize Plugin Js -->
    <script src="<?php echo e(asset('public/admin/plugins/autosize/autosize.js')); ?>"></script>

    <!-- Moment Plugin Js -->
    <script src="<?php echo e(asset('public/admin/plugins/momentjs/moment.js')); ?>"></script>

    <!-- Bootstrap Material Datetime Picker Plugin Js -->
    <script src="<?php echo e(asset('public/admin/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js')); ?>"></script>

    <!-- Bootstrap Datepicker Plugin Js -->
    <script src="<?php echo e(asset('public/admin/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js')); ?>"></script>

    <!-- Image upload and preview Js -->
    <script src="<?php echo e(asset('public/admin/plugins/file-upload/file-upload-with-preview.min.js')); ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <!-- Bootstrap Tags Input Plugin Js -->
    <script src="<?php echo e(asset('public/admin/plugins/bootstrap-tagsinput/bootstrap-tagsinput.js')); ?>"></script>
    
    <script src="<?php echo e(asset('public/admin/plugins/multi-select/js/jquery.multi-select.js')); ?>"></script>
    
    <script>
        var p_thumbnail = new FileUploadWithPreview('p_thumbnail')
        var p_gallery = new FileUploadWithPreview('p_gallery')
    </script>
    <script>
        $(document).ready(function(){
            $('#simple-product-section').show();
            $('#variable-product-section').hide();
            $('#select2').select2();
            CKEDITOR.replace('p_detail');
            $('#p_type').change(function(e){
                var type = $('#p_type').val();
                if(type == 'simple product'){
                    $('#simple-product-section').show();
                    $('#variable-product-section').hide();
                }
                if(type == 'variable product'){
                    $('#simple-product-section').hide();
                    $('#variable-product-section').show();
                }
            });

            // toogle schedule div
            $('#btn-schedule').on('click', function(e){
                e.preventDefault();
                $('#div-schedule').toggle();
            });

            // Table 1
            var max_fields      = 20;
            var add_button      = $(".add_field_button");
            var x = 1; //initlal text box count
            $(add_button).click(function(e){
                e.preventDefault();
                if(x < max_fields){ 
                    x++;
                    $('#table1').append('<tr id="row'+x+'"><td><input type="text" class="form-control" name="size[]" placeholder="size"/></td></td><td><input type="text" class="form-control" name="price[]" placeholder="price"/></td><td><button id="'+x+'" class="btn btn-danger remove_field">Remove</a></td></tr>'); //add input box
                }
            });

            $(document).on("click",".remove_field", function(e){ //user click on remove text
                e.preventDefault(); 
                var button_id = $(this).attr("id");
                $('#row'+button_id+'').remove();
                x--;
            })
        });

            $('.category').on('change', function() {
                var cat_id=this.value;
                $.ajax({
                    type:'get',
                    url:'<?php echo e(route("ds.getSubcategoriesByCategory")); ?>',
                    data: {id:cat_id},
                    dataType: "json",
                    success:function(response){
                        $('.subcategory option').remove();
                        $(".subcategory").append('<option  value="" class="disabled" disabled selected>Select Subcategory</option>');
                    
                        $.each(response,function(key, value){
                            $(".subcategory").append('<option id="subcategoryOption" value=' + value.id + '>' + value.name + '</option>');
                        });
                    }
                });
            });

            $('.subcategory').on('change', function() {
                var subcat_id=this.value;
                $.ajax({
                    type:'get',
                    url:'<?php echo e(route("ds.product-management.getSubcategory1BySubcategory")); ?>',
                    data: {id:subcat_id},
                    dataType: "json",
                    success:function(response){
                        $('.subcategory1 option').remove();
                        $(".subcategory1").append('<option  value="" class="disabled" disabled selected>Select Subcategory 1</option>');
                        
                        $.each(response,function(key, value){
                            $(".subcategory1").append('<option id="subcategory1Option" value=' + value.id + '>' + value.name + '</option>');
                        });
                    }
                });
            });

            $('.subcategory1').on('change', function() {
                var subcat_id=this.value;
                $.ajax({
                    type:'get',
                    url:'<?php echo e(route("ds.product-management.getSubcategory2BySubcategory")); ?>',
                    data: {id:subcat_id},
                    dataType: "json",
                    success:function(response){
                        $('.subcategory2 option').remove();
                        $(".subcategory2").append('<option  value="" class="disabled" disabled selected>Select Subcategory 2</option>');
                        
                        $.each(response,function(key, value){
                            $(".subcategory2").append('<option id="subcategory2Option" value=' + value.id + '>' + value.name + '</option>');
                        });
                    }
                });
            });

              /////////////////add Color////
       $(document).on("click",".add-color", function(e){ 
         var code=$('#code').val();
       $.ajax({
            type:'post',
            url:"<?php echo e(route('ds.product-management.color_action')); ?>",
             headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
             data:{code:code},
            success:function(response){
                console.log(response);
                $("#couponModal").modal('hide');
             $('#color-attribute-values').append( '<option value='+response.id+' style="background:'+response.code+'">'+response.code+'</option>');
             $('.inner').append('<li data-original-index=""><a tabindex="0" class="" style="background: '+response.code+';" data-tokens="null"><span class="text">'+response.code+'</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li>')
        }

  });

  });

              $(document).ajaxStart(function(){
    $("#wait").css("display", "block");
  });
  $(document).ajaxComplete(function(){
    $("#wait").css("display", "none");
  });
    </script>
</body>

</html>
<?php /**PATH C:\wamp64\www\pakcompany2\resources\views/admin/product-management/products/new-product.blade.php ENDPATH**/ ?>