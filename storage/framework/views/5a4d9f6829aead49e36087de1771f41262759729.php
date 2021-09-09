
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

<body class="res layout-1">
    
    <div id="wrapper" class="wrapper-fluid banners-effect-5">
    

    <!-- Header Container  -->
    <?php echo $__env->make('front.layout.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- //Header Container  -->
    
	<!-- Main Container  -->
	<div class="main-container container">
		<ul class="breadcrumb">
			<li><a href="#"><i class="fa fa-home"></i></a></li>
			<li><a href="#">Shopping Cart</a></li>
		</ul>
		<div class="row">
			<!--Middle Part Start-->
			<div id="content" class="col-sm-12">
				<h2 class="title">Shopping Cart</h2>
				<div class="table-responsive form-group">
					<table class="table table-bordered">
						<thead>
						<tr>
							<td class="text-center">Image</td>
							<td class="text-left">Product Name</td>
							<td class="text-left">Quantity</td>
							<td class="text-right">Unit Price</td>
							<td class="text-right">Total</td>
						</tr>
						</thead>
						<tbody id="myCartPage-cartItems">
							
						</tbody>
					</table>
				</div>
				
				<div class="row">
					<div class="col-sm-4 col-sm-offset-8">
						<table class="table table-bordered">
							<tbody>
								<tr>
									<td class="text-right">
										<strong>Total:</strong>
									</td>
									<td class="text-right total"></td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>

				<div class="buttons">
					<div class="pull-left"><a href="<?php echo e(route('index')); ?>" class="btn btn-primary">Continue Shopping</a></div>
					<div class="pull-right"><a href="<?php echo e(route('checkout')); ?>" class="btn btn-primary">Checkout</a></div>
				</div>
			</div>
			<!--Middle Part End -->
		</div>
	</div>
	<!-- //Main Container -->
	

	<!-- Footer Container -->
    <?php echo $__env->make('front.layout.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- //end Footer Container -->

    </div>
	
	
	<!-- Include Libs & Plugins-->
    <!-- Placed at the end of the document so the pages load faster -->
    <script type="text/javascript" src="<?php echo e(asset('public/front/js/jquery-2.2.4.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('public/front/js/bootstrap/bootstrap.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('public/front/js/owl-carousel/owl.carousel.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('public/front/js/themejs/libs.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('public/front/js/unveil/jquery.unveil.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('public/front/js/countdown/jquery.countdown.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('public/front/js/dcjqaccordion/jquery.dcjqaccordion.2.8.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('public/front/js/datetimepicker/moment.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('public/front/js/datetimepicker/bootstrap-datetimepicker.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('public/front/js/jquery-ui/jquery-ui.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('public/front/js/modernizr/modernizr-2.6.2.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('public/front/js/minicolors/jquery.miniColors.min.js')); ?>"></script>
    
    <!-- Theme files -->
    
    <script type="text/javascript" src="<?php echo e(asset('public/front/js/themejs/application.js')); ?>"></script>
    
    <script type="text/javascript" src="<?php echo e(asset('public/front/js/themejs/homepage.js')); ?>"></script>
    
    <script type="text/javascript" src="<?php echo e(asset('public/front/js/themejs/toppanel.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('public/front/js/themejs/so_megamenu.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('public/front/js/themejs/addtocart.js')); ?>"></script> 
	<script src="<?php echo e(asset('public/front/js/popper.min.js')); ?>"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="<?php echo e(asset('public/front/js/custom.js')); ?>"></script> 
	<script>
		$(document).ready(function(){
			// show cart items in header
			$.get('<?php echo e(route("myCartPage.getCart-onLoad")); ?>', function(response){
				$('#cart').empty().append(response);
			});

			$.get('<?php echo e(route("myCartPage-cartItems.getItems-onLoad")); ?>', function(response){
				$('#myCartPage-cartItems').empty().append(response);
				$('.total').text($('#total').val());
			});

			// $('#quantityChange').change(function(){
			// 	alert('OK');
			// });
			$("#quantityChange").on('keyup mouseup', function () {
				alert("changed");         
			});

			$('#myCartPage-cartItems').on('click', '.remove', function(e){
				e.preventDefault();
				var id = $(this).attr('data-id');
				$.ajax({
					url: "<?php echo e(route('myCartPage-cartItems.deleteItems')); ?>",
					method: "DELETE",
					data: {_token: '<?php echo e(csrf_token()); ?>', id:id},
					success: function(response){
						alert('Product removed from cart.');
						$('#myCartPage-cartItems').empty().append(response);
						$('.total').text($('#total').val());
						$("#cart").load(location.href + " #cart");
						$.get('<?php echo e(route("myCartPage.getCart-onLoad")); ?>', function(response){
							$('#cart').empty().append(response);
						});
					}
				});
			});

			$('#myCartPage-cartItems').on('click', '.update', function(e){
				e.preventDefault();
				var id = $(this).attr('data-id');
				var qty = $(this).closest('.input-group').find('input[type="number"]').val();
				$.ajax({
					url: "<?php echo e(route('myCartPage-cartItems.updateItems')); ?>",
					method: "POST",
					data: {_token: '<?php echo e(csrf_token()); ?>', id:id, qty:qty},
					success: function(response){
						alert('Product updated from cart.');
						$('#myCartPage-cartItems').empty().append(response);
						$('.total').text($('#total').val());
						$("#cart").load(location.href + " #cart");
						$.get('<?php echo e(route("myCartPage.getCart-onLoad")); ?>', function(response){
							$('#cart').empty().append(response);
						});
					}
				});
			});
		});
	</script>
		
</body>
</html><?php /**PATH C:\wamp64\www\pakcompany2\resources\views/front/my-cart.blade.php ENDPATH**/ ?>