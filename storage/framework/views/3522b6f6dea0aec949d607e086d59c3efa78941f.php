<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" />
    <title>Pak Company - Buy Online Holy Quran, Tafseer, Ahadees | Admin Panel</title>
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

    <!-- Morris Chart Css-->
    <link href="<?php echo e(asset('public/admin/plugins/morrisjs/morris.css')); ?>" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="<?php echo e(asset('public/admin/css/style.css')); ?>" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css themes instead of get all themes -->
    <link href="<?php echo e(asset('public/admin/css/themes/all-themes.css')); ?>" rel="stylesheet" />
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
                <h2>DASHBOARD</h2>
            </div>
            <!-- Widgets -->
            <div class="row clearfix">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-indigo hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">playlist_add_check</i>
                        </div>
                        <div class="content">
                            <div class="text">Total Products</div>
                            <div class="number count-to" data-from="0" data-to="<?php if($product): ?><?php echo e(count($product)); ?><?php else: ?> 0 <?php endif; ?>" data-speed="15" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-indigo hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">help</i>
                        </div>
                        <div class="content">
                            <div class="text">Total Orders</div>
                            <div class="number count-to" data-from="0" data-to="<?php if($order): ?><?php echo e(count($order)); ?><?php else: ?> 0 <?php endif; ?>" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-indigo hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">help</i>
                        </div>
                        <div class="content">
                            <div class="text">Total Subscribers </div>
                            <div class="number count-to" data-from="0" data-to="<?php if($subscriber): ?><?php echo e(count($subscriber)); ?><?php else: ?> 0 <?php endif; ?>" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-indigo hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">person_add</i>
                        </div>
                        <div class="content">
                            <div class="text">Total Categories</div>
                            <div class="number count-to" data-from="0" data-to="<?php if($category): ?><?php echo e(count($category)); ?><?php else: ?> 0 <?php endif; ?>" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
            </div>
           
            <div class="row clearfix">
                <!-- Bar Chart -->
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>Monthly Orders</h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:void(0);">Action</a></li>
                                        <li><a href="javascript:void(0);">Another action</a></li>
                                        <li><a href="javascript:void(0);">Something else here</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <div id="bar_chart" class="graph"></div>
                        </div>
                    </div>
                </div>
                <!-- #END# Bar Chart -->
            </div>
            <div class="row clearfix">
                <!-- Line Chart -->
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>LINE CHART</h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:void(0);">Action</a></li>
                                        <li><a href="javascript:void(0);">Another action</a></li>
                                        <li><a href="javascript:void(0);">Something else here</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <div id="line_chart" class="graph"></div>
                        </div>
                    </div>
                </div>
                <!-- #END# Line Chart -->
                <!-- Donut Chart -->
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>Category Products</h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:void(0);">Action</a></li>
                                        <li><a href="javascript:void(0);">Another action</a></li>
                                        <li><a href="javascript:void(0);">Something else here</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <div id="donut_chart" class="graph"></div>
                        </div>
                    </div>
                </div>
                <!-- #END# Donut Chart -->
            </div>

            <div class="row clearfix">
                <!-- Task Info -->
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2>Products Statistics</h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-hover dashboard-task-infos">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Category</th>
                                            <th>SubCategory</th>
                                            <th>Image</th>
                                            <th>Quantity</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if($minProduct): ?>
                                            <?php $__currentLoopData = $minProduct; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e($key+1); ?></td>
                                                <td><?php echo e($p->name); ?></td>
                                                <td><?php if($p->categories): ?><?php echo e($p->categories[0]->name); ?><?php else: ?> No Category <?php endif; ?></td>
                                                <td><?php if($p->subcategories): ?>
                                                      <?php $__currentLoopData = $p->subcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php echo e($s->name); ?>,
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php else: ?> 
                                            No SubCategory
                                             <?php endif; ?>
                                         </td>
                                                <td> 
                                                    <div class="thumbnail">
                                                        <?php if($p->integration_id): ?>
                                                            <img src="<?php echo e($p->p_thumbnail); ?>" alt="" style="width: 60px;">
                                                        <?php else: ?>
                                                            <img src="<?php echo e(asset('public/thumbnail/').'/'.$p->p_thumbnail); ?>" alt="" style="width: 60px;">
                                                        <?php endif; ?>
                                                    </div>
                                                </td>
                                                <td><span class="label bg-indigo"><?php echo e($p->p_quantity); ?></span></td>
                                            </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                                <?php echo e($minProduct->links()); ?>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- #END# Task Info -->
                <!-- Browser Usage -->
                
                <!-- #END# Browser Usage -->
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

    <!-- Jquery CountTo Plugin Js -->
    <script src="<?php echo e(asset('public/admin/plugins/jquery-countto/jquery.countTo.js')); ?>"></script>

    <!-- Morris Plugin Js -->
    <script src="<?php echo e(asset('public/admin/plugins/raphael/raphael.min.js')); ?>"></script>
    <script src="<?php echo e(asset('public/admin/plugins/morrisjs/morris.js')); ?>"></script>

    <!-- ChartJs -->
    <script src="<?php echo e(asset('public/admin/plugins/chartjs/Chart.bundle.js')); ?>"></script>

    <!-- Flot Charts Plugin Js -->
    <script src="<?php echo e(asset('public/admin/plugins/flot-charts/jquery.flot.js')); ?>"></script>
    <script src="<?php echo e(asset('public/admin/plugins/flot-charts/jquery.flot.resize.js')); ?>"></script>
    <script src="<?php echo e(asset('public/admin/plugins/flot-charts/jquery.flot.pie.js')); ?>"></script>
    <script src="<?php echo e(asset('public/admin/plugins/flot-charts/jquery.flot.categories.js')); ?>"></script>
    <script src="<?php echo e(asset('public/admin/plugins/flot-charts/jquery.flot.time.js')); ?>"></script>

    <!-- Sparkline Chart Plugin Js -->
    <script src="<?php echo e(asset('public/admin/plugins/jquery-sparkline/jquery.sparkline.js')); ?>"></script>

    <script src="<?php echo e(asset('public/admin/js/pages/charts/morris.js')); ?>"></script>

    <!-- Custom Js -->
    <script src="<?php echo e(asset('public/admin/js/admin.js')); ?>"></script>
    <script src="<?php echo e(asset('public/admin/js/pages/index.js')); ?>"></script>
<script type="text/javascript">
    //   Offline Status
    $('#btn-offline').on('click',function(e){
        e.preventDefault();
      var offline_status =$('#offline-status').val();
      var offline_days =$('#offline-days').val();
      
           var id = $('#user-id').val();
           console.log(id);
             $.ajaxSetup({
             headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                });
             var pathname = window.location.origin; 
             console.log(pathname);
        $.ajax({
            type:'post',
            url:'<?php echo e(route("user.offline")); ?>',
           data: {
                "id": id,
                "offline":offline_status,
                'days':offline_days
                 // method and token not needed in data
            },
            success:function(response){
             alert('Status Updated Successfully');  
            }
        });
      
      
      });
</script>
    <!-- Demo Js -->
    <script src="<?php echo e(asset('public/admin/js/demo.js')); ?>"></script>
</body>

</html>
<?php /**PATH C:\wamp64\www\pakcompany2\resources\views/admin/dashboard/index.blade.php ENDPATH**/ ?>