
<!DOCTYPE html>
<html lang="en">
    <head>

        <?php echo $__env->make('front.layout.meta', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        
        
        <!-- Libs CSS
        ============================================ -->
        <link rel="stylesheet" href="<?php echo e(asset('public/front/css/bootstrap/css/bootstrap.min.css')); ?>">
        <link href="<?php echo e(asset('public/front/css/font-awesome/css/font-awesome.min.css')); ?>" rel="stylesheet">
        <link href="<?php echo e(asset('public/front/js/datetimepicker/bootstrap-datetimepicker.min.css')); ?>" rel="stylesheet">
        <link href="<?php echo e(asset('public/front/js/owl-carousel/owl.carousel.css')); ?>" rel="stylesheet">
        <link href="<?php echo e(asset('public/front/css/themecss/lib.css')); ?>" rel="stylesheet">
        <link href="<?php echo e(asset('public/front/js/jquery-ui/jquery-ui.min.css')); ?>" rel="stylesheet">
        <link href="<?php echo e(asset('public/front/js/minicolors/miniColors.css')); ?>" rel="stylesheet">
        
        <!-- Theme CSS
        ============================================ -->
        <link href="<?php echo e(asset('public/front/css/themecss/so_searchpro.css')); ?>" rel="stylesheet">
        <link href="<?php echo e(asset('public/front/css/themecss/so_megamenu.css')); ?>" rel="stylesheet">
        <link href="<?php echo e(asset('public/front/css/themecss/so-categories.css')); ?>" rel="stylesheet">
        <link href="<?php echo e(asset('public/front/css/themecss/so-listing-tabs.css')); ?>" rel="stylesheet">
        <link href="<?php echo e(asset('public/front/css/themecss/so-newletter-popup.css')); ?>" rel="stylesheet">

        <link href="<?php echo e(asset('public/front/css/footer/footer1.css')); ?>" rel="stylesheet">
        <link href="<?php echo e(asset('public/front/css/header/header4.css')); ?>" rel="stylesheet">
        
        <link id="color_scheme" href="<?php echo e(asset('public/front/css/home4.css')); ?>" rel="stylesheet">
        <link href="<?php echo e(asset('public/front/css/responsive.css')); ?>" rel="stylesheet">

            <!-- Google web fonts
        ============================================ -->
        <link href='https://fonts.googleapis.com/css?family=Roboto:300,400,400i,500,500i,700' rel='stylesheet' type='text/css'>
        <style type="text/css">
                body{font-family:'Roboto', sans-serif}
        </style>

    </head>

<body class="res layout-1 layout-subpage">
    
    <div id="wrapper" class="wrapper-fluid banners-effect-5">
    

    <!-- Header Container  -->
    <?php echo $__env->make('front.layout.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- //Header Container  -->

    
	<!-- Main Container  -->
	<div class="main-container container">
		<ul class="breadcrumb">
			<li><a href="#"><i class="fa fa-home"></i></a></li>
			<li><a href="#">Account</a></li>
			<li><a href="#">Login</a></li>
		</ul>
		
		<div class="row">
			<div id="content" class="col-sm-12">
				<div class="page-login">
				
					<div class="account-border">
						<div class="row">
							<div class="col-sm-6 new-customer">
								<div class="well">
									<h2><i class="fa fa-file-o" aria-hidden="true"></i> New Customer</h2>
									<p>By creating an account you will be able to shop faster, be up to date on an order's status, and keep track of the orders you have previously made.</p>
								</div>
								<div class="bottom-form">
									<a href="#" class="btn btn-default pull-right">Continue</a>
								</div>
							</div>
							
					<form action="<?php echo e(route('user.login.authenticate')); ?>" method="post" enctype="multipart/form-data">
						<?php echo csrf_field(); ?>
								<div class="col-sm-6 customer-login">
									<div class="well">
										<h2><i class="fa fa-file-text-o" aria-hidden="true"></i> Returning Customer</h2>
										<p><strong>I am a returning customer</strong></p>
										<div class="form-group">
											<label class="control-label " for="input-email">E-Mail Address</label>
											<input type="text" name="email" value="" id="input-email" class="form-control" />
										</div>
										<div class="form-group">
											<label class="control-label " for="input-password">Password</label>
											<input type="password" name="password" value="" id="input-password" class="form-control" />
										</div>
									</div>
									<div class="bottom-form">
										<a href="<?php echo e(route('password.update')); ?>" class="forgot">Forgotten Password</a>
										<input type="submit" value="Login" class="btn btn-default pull-right" />
									</div>
									<a href="<?php echo e(url('/login/facebook')); ?>" class="btn btn-facebook"> Facebook</a>
									<a href="<?php echo e(url('/auth/google')); ?>" class="btn btn-facebook">Google</a>
								</div>
							</form>
						</div>
					</div>
					
				</div>
			</div>
		</div>
	</div>
	<!-- //Main Container -->
	

	<!-- Footer Container -->
    <?php echo $__env->make('front.layout.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- //end Footer Container -->

    </div>
	
<!-- Include Libs & Plugins
	============================================ -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script type="text/javascript" src="js/jquery-2.2.4.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/owl-carousel/owl.carousel.js"></script>
	<script type="text/javascript" src="js/themejs/libs.js"></script>
	<script type="text/javascript" src="js/unveil/jquery.unveil.js"></script>
	<script type="text/javascript" src="js/countdown/jquery.countdown.min.js"></script>
	<script type="text/javascript" src="js/dcjqaccordion/jquery.dcjqaccordion.2.8.min.js"></script>
	<script type="text/javascript" src="js/datetimepicker/moment.js"></script>
	<script type="text/javascript" src="js/datetimepicker/bootstrap-datetimepicker.min.js"></script>
	<script type="text/javascript" src="js/jquery-ui/jquery-ui.min.js"></script>
	
	
	<!-- Theme files
	============================================ -->
	
	
	<script type="text/javascript" src="js/themejs/so_megamenu.js"></script>
	<script type="text/javascript" src="js/themejs/addtocart.js"></script>
	<script type="text/javascript" src="js/themejs/application.js"></script>
	
	
	
</body>
</html><?php /**PATH /home/webeasydemos/public_html/pakcompany/resources/views/front/login.blade.php ENDPATH**/ ?>