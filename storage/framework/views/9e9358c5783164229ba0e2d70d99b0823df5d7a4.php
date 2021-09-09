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

    <!-- JQuery DataTable Css -->
    <link href="<?php echo e(asset('public/admin/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css')); ?>" rel="stylesheet">

    <!-- Custom Css -->
    <link href="<?php echo e(asset('public/admin/css/style.css')); ?>" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="<?php echo e(asset('public/admin/css/themes/all-themes.css')); ?>" rel="stylesheet" />
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
body {font-family: Arial;}

/* Style the tab */
.tab {
  overflow: hidden;
  border: 1px solid #ccc;
  background-color: #f1f1f1;
}

/* Style the buttons inside the tab */
.tab button {
  background-color: inherit;
  float: left;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 14px 16px;
  transition: 0.3s;
  font-size: 17px;
}

/* Change background color of buttons on hover */
.tab button:hover {
  background-color: #ddd;
}
#edit .form-group{
    margin-left: 60px;
}
/* Create an active/current tablink class */
.tab button.active {
  background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
  display: none;
  padding: 6px 12px;
  border: 1px solid #ccc;
  border-top: none;
}
form{
margin-left: 25px;
margin-bottom: 5px;
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
                <h2>Coupon View</h2>
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
                
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                   

    <div class="row clearfix">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
            <div class="card">
                <div class="header">
                    <h2>
                        Coupon Management
                    </h2>
                    <ul class="header-dropdown m-r--5">
                        <li class="dropdown">
                            
                        </li>
                    </ul>
                </div>
                <div class="body">
                     <form action="<?php echo e(route('ds.coupon.create')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <div class="row clearfix">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                       <label for="attribute">Coupon Name:</label>
                                        <input type="text" value="" name="name" class="form-control" placeholder="Enter coupon name"/>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="row clearfix">
                            <div class="col-sm-12">
                                <div class="form-group">
                                     <div class="form-line">
                                 <label for="attribute">Percentage:</label>
                                        <input type="text" value="" name="percentage" class="form-control" placeholder="Enter percentage"/>
                                </div>
                            </div>
                            
                        </div>
                        </div>

                        
                        <button type="submit" class="btn btn-default">Submit</button>
                      </form>
                </div>
            </div>
        </div>
           <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Coupon Management
                                <small>Coupon List</small>
                            </h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                              
                                              
                                              <th>Coupon Name</th>
                                              <th>Percentage</th>
                                              <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                              
                                              <th>Coupon Name</th>
                                              <th>Percentage</th>
                                              <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php if($coupon): ?>
                                        <?php $__currentLoopData = $coupon; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                      
                                        <tr>
                                            <td><?php echo e($c->name); ?></td>
                                            <td><?php echo e($c->percentage); ?></td>
                                            <td>
                                                <a   data-id="<?php echo e($c->id); ?>" href="#" class="btn btn-primary editCoupon"><i  class="material-icons" data-toggle="modal"   data-target="#couponModal">edit</i></a> 
                                                <a href="<?php echo e(route('ds.coupon.delete',$c->id)); ?>" class="btn btn-primary"><i class="material-icons">delete</i></a>
                                            </td>
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php else: ?>
                                        <tr>
                                            No Data Found
                                        </tr>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
    </div>
</div>

            <!-- #END# Exportable Table -->
        </div>
        </div>
 <!-- Edit Weight Modal -->
  <div class="modal fade" id="couponModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Edit Coupon</h4>
        </div>
        
          <form action="<?php echo e(route('ds.coupon.editCoupon')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                          <input type="hidden" id="editCouponId" name="id">
                        <div class="row clearfix">
                            <div class="col-sm-9">
                                <div class="form-group">
                                    <div class="form-line">
                                       <label for="attribute">Coupon Name:</label>
                                        <input type="text" value="" name="name" id="name" class="form-control" placeholder="Enter coupon name"/>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="row clearfix">
                            <div class="col-sm-9">
                                <div class="form-group">
                                     <div class="form-line">
                                        <label for="attribute">Percentage:</label>
                                        <input type="text" value="" name="percentage" id="percent" class="form-control" placeholder="Enter percentage"/>
                                </div>
                            </div>
                            
                        </div>
                        </div>
                       
                        <div class="row clearfix">
                            <div class="col-sm-9">
                                   <div class="form-group">
                                     <div class="form-line">
                                        <button type="submit" class="btn btn-primary">Edit</button>
                                      </div>
                                   </div>
                            </div>
                        </div>
                        
                      </form>
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
<script type="text/javascript">
$('.editCoupon').click(function(){
     
    console.log('clicked');
      var id =$(this).attr('data-id');
      console.log(id);
     $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        type:'get',
        url:'<?php echo e(route("ds.coupon.editCoupon-form")); ?>',
        data: {id:id},
       
        success:function(response){
             $('#name').val(response.name);
             $('#percent').val(response.percentage);
             $('#editCouponId').val(response.id);
        }
    });
});
</script>
    <!-- Demo Js -->
    <script src="<?php echo e(asset('public/admin/js/demo.js')); ?>"></script>
</body>

</html>
<?php /**PATH C:\wamp64\www\pakcompany2\resources\views/admin/coupon/view.blade.php ENDPATH**/ ?>