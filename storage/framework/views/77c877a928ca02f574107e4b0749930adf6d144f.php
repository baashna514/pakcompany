<!DOCTYPE html>
 <html lang="en">
<head>
    
    <!-- Basic page needs
    ============================================ -->
    <title>myDokkan.com - A brand of F N Stylez SMC Pvt Limited</title>
    <meta charset="utf-8">
    <meta name="keywords" content="mydokkan, A brand of F N Stylez SMC Pvt Limited, best online store, FNStylez, F N Stylez, mydokkan.com" />
    <meta name="description" content="MyDokkan formally known as fnstylez, is brand of F N Stylez SMC Pvt Limited and, is committed to work on quality and reliability and always trying to find new and innovative ways.
    F N Stylez SMC Pvt Limted has steadily diversified its core activities by venturing into new business and continued to expand successfully forged ahead in terms of revenue and turnover." />
    <meta name="author" content="Moin Abbas">
    <meta name="robots" content="index, follow" />
   
    <!-- Mobile specific metas
    ============================================ -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    
    <!-- Favicon
    ============================================ -->
   
    <link rel="shortcut icon" type="image/png" href="<?php echo e(asset('public/front/ico/favicon-16x16.png')); ?>"/>
    
   
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

    <link href="<?php echo e(asset('public/front/css/footer/footer4.css')); ?>" rel="stylesheet">
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

 <body class="res layout-subpage">
     <div id="wrapper" class="wrapper-full ">
	<!-- Main Container  -->
	 <div class="main-container container">
		
		 <div class="row">
			 <!--Middle Part Start-->
			 <div id="content" class="col-md-12 col-sm-12">
				
				<div class="product-view row quickview-w">
					<div class="left-content-product">
				
						<div class="content-product-left class-honizol col-md-5 col-sm-12 col-xs-12">
							<div class="large-image  ">
								<img itemprop="image" class="product-image-zoom" src="<?php echo e(asset('public/thumbnail').'/'.$product->p_thumbnail); ?>" data-zoom-image="<?php echo e(asset('public/thumbnail').'/'.$product->p_thumbnail); ?>" title="Chicken swinesha" alt="Chicken swinesha">
							</div>
							<div id="thumb-slider" class="yt-content-slider full_slider owl-drag" data-rtl="yes" data-autoplay="no" data-autoheight="no" data-delay="4" data-speed="0.6" data-margin="10" data-items_column0="4" data-items_column1="3" data-items_column2="4"  data-items_column3="1" data-items_column4="1" data-arrows="yes" data-pagination="no" data-lazyload="yes" data-loop="no" data-hoverpause="yes">
								<?php $__currentLoopData = $product->gallery; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$gallery): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<a data-index="<?php echo e($key); ?>" class="img thumbnail " data-image="<?php echo e(asset('public/gallery').'/'.$gallery->image); ?>">
										<img src="<?php echo e(asset('public/gallery').'/'.$gallery->image); ?>" alt="Loading image">
									</a>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</div>
						</div>

						<div class="content-product-right col-md-7 col-sm-12 col-xs-12">
							<div class="title-product">
								<h1><?php echo e($product->name); ?></h1>
							</div>
							<div class="product-label form-group">
								<?php if($product->product_size): ?>
									<div class="product_page_price price" itemprop="offerDetails" itemscope="" itemtype="http://data-vocabulary.org/Offer">
                                        <?php if($product->p_type == 'simple product'): ?>
                                            <?php if($product->sale_price): ?>
                                                <span class="price-new p-price" name="<?php echo e($product->sale_price); ?>" itemprop="price" style="font-size: 16px;">Rs. <?php echo e($product->sale_price); ?> -PKR</span>
                                                <span class="price-old p-price" name="<?php echo e($product->price); ?>">Rs. <?php echo e($product->price); ?> - PKR</span>
                                            <?php else: ?>
                                                <span class="price-new p-price" name="<?php echo e($product->price); ?>" itemprop="price" style="font-size: 16px;">Rs. <?php echo e($product->price); ?> - PKR</span>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                        <?php if($product->p_type == 'variable product'): ?>
                                            <span class="price-new p-price" name="" id="size-price" itemprop="price" style="font-size: 16px;">Choose Product Size</span>
                                        <?php endif; ?>
									</div>
								<?php endif; ?>
                                <div class="stock">
                                    
                                </div>
							</div>
							<div class="product-box-desc">
								<div class="inner-box-desc">
									<?php echo $product->p_detail; ?>

								</div>
							</div>
							<div id="product">
								<h4>Available Options</h4>
								<?php if(count($product->color_product) > 0): ?>
									<div class="image_option_type form-group required">
										<label class="control-label">Colors</label>
										<ul class="product-options clearfix">
											<?php $__currentLoopData = $product->color_product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $color): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<?php
												$col = \App\Color::find($color->color_id);
											?>
												<li class="radio">
													<label>
														<input class="image_radio" type="radio" name="option[]" value="<?php echo e($col->code); ?>"> 
														<span style="background: <?php echo e($col->code); ?>" class="img-thumbnail icon icon-color"></span><i class="fa fa-check"></i>
														<label> </label>
													</label>
												</li>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
										</ul>
									</div>
								<?php endif; ?>
								<?php $__currentLoopData = $product->product_size; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<?php if(json_decode($row->size) != NULL): ?>
										<div class="image_option_type form-group required">
											<label class="control-label">Size</label>
											<ul class="product-options clearfix">
												<select name="size" id="size" class="form-control" style="width: 52%;" required>
													<option disabled selected>Choose Size</option>
													<?php $__currentLoopData = json_decode($row->size); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $size): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
														<option value="<?php echo e($size); ?>"><?php echo e($size); ?></option>
													<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
												</select>
											</ul>
										</div>
									<?php endif; ?>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								<div class="form-group box-info-product">
									<div class="option quantity">
										<div class="input-group quantity-control" unselectable="on" style="-webkit-user-select: none;">
											<label>Qty</label>
											<input class="form-control" type="text" id="quantity" name="quantity"
											value="1" readonly>
											<input type="hidden" name="product_id" value="50">
											<span class="input-group-addon product_quantity_down">−</span>
											<span class="input-group-addon product_quantity_up">+</span>
										</div>
									</div>
									<div class="cart">
										<input type="button" data-toggle="tooltip" title="" value="Add to Cart" data-loading-text="Loading..." id="button-cart" class="btn btn-mega btn-lg" data-original-title="Add to Cart">
									</div>
									<div class="add-to-links wish_comp">
										<ul class="blank list-inline">
											<li class="wishlist">
												<a class="icon" data-toggle="tooltip" title=""
												onclick="wishlist.add('50');" data-original-title="Add to Wish List"><i class="fa fa-heart"></i>
												</a>
											</li>
											<li><a href="https://wa.me/923001773514/?text=Hi..! How may i help you?" style="padding: 0px 0px;"><img src="https://image.similarpng.com/very-thumbnail/2020/05/WhatsApp-icon-PNG.png" alt="" style="width: 50px;"></a></li>
										</ul>
									</div>
                                </div>
							</div>
							<!-- end box info product -->
						</div>
				
					</div>
				</div>
				
				 <script type="text/javascript">
					// Cart add remove functions
					var cart = {
						'add': function(product_id, quantity) {
							parent.addProductNotice('Product added to Cart', '<img src="<?php echo e(asset("public/front/image/demo/shop/product/e11.jpg")); ?>" alt="">', '<h3><a href="#">Apple Cinema 30"</a> added to <a href="#">shopping cart</a>!</h3>', 'success');
						}
					}

					var wishlist = {
						'add': function(product_id) {
							parent.addProductNotice('Product added to Wishlist', '<img src="<?php echo e(asset("public/front/image/demo/shop/product/e11.jpg")); ?>" alt="">', '<h3>You must <a href="#">login</a>  to save <a href="#">Apple Cinema 30"</a> to your <a href="#">wish list</a>!</h3>', 'success');
						}
					}
					var compare = {
						'add': function(product_id) {
							parent.addProductNotice('Product added to compare', '<img src="<?php echo e(asset("public/front/image/demo/shop/product/e11.jpg")); ?>" alt="">', '<h3>Success: You have added <a href="#">Apple Cinema 30"</a> to your <a href="#">product comparison</a>!</h3>', 'success');
						}
					}

					
				</script>

				
			 </div>
			
			
		 </div>
		 <!--Middle Part End-->
	 </div>
	 <!-- //Main Container -->
	
 <style type="text/css">
	#wrapper{box-shadow:none;}
	#wrapper > *:not(.main-container){display: none;}
	#content{margin:0}
	.container{width:100%;}
	
	.product-info .product-view,.left-content-product,.box-info-product{margin:0;}
	.left-content-product .content-product-right .box-info-product .cart input{padding:12px 16px;}

	.left-content-product .content-product-right .box-info-product .add-to-links{ width: auto;  float: none; margin-top: 0px; clear:none; }
	.add-to-links ul li{margin:0;}
	
</style></div>

<!-- Include Libs & Plugins
============================================ -->
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
 

<!-- Theme files
============================================ -->
<script type="text/javascript" src="<?php echo e(asset('public/front/js/themejs/homepage.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('public/front/js/themejs/so_megamenu.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('public/front/js/themejs/addtocart.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('public/front/js/themejs/application.js')); ?>"></script>
<script src="<?php echo e(asset('public/front/js/popper.min.js')); ?>"></script> 
<script>
	$(document).ready(function(){
		$('#size').change(function(e){
			var size = $('#size').val();
			var id = '<?php echo e($product->id); ?>';
			// alert(id);
			// return;
			$.ajax({
				url: "<?php echo e(route('product-view.get-size-price')); ?>",
				type: "POST",   
				data: {
				"_token": "<?php echo e(csrf_token()); ?>",
				size: size,
				id: id,
				},
				success: function(data){
					$('#size-price').text('Rs. '+data+ ' -PKR');
					$("#size-price").attr("name", data);
				},
				error: function(data){
					alert('unable to get price.....!');
				}
			});
		});


		$('#button-cart').click(function(e){
                e.preventDefault();
                var product_id = '<?php echo e($product->id); ?>';
                var color = $('input[type="radio"]:checked').val();
                var quantity = $('#quantity').val();
                var p_type = '<?php echo e($product->p_type); ?>';
                if(p_type == 'simple product'){
                    var price = $('.p-price').attr('name');
                    var size = 'Default Size';
                    if('<?php echo e(count($product->color_product) <= 0); ?>'){
                        color = 'Default Color';
                    }
                    else{
                        var color = $('input[type="radio"]:checked').val();
                        if(color == undefined){
                            alert('Choose color');
                            return;
                        }
                    }
                }
                if(p_type == 'variable product'){
                    var size = $('#size').val();
                    if(size == undefined){
                        alert('Choose size');
                        return;
                    }
                    var price = $('#size-price').attr('name');
                    if(color == undefined){
                        alert('Choose color');
                        return;
                    }
                }
                $.ajax({
                    url: "<?php echo e(route('add-to-cart')); ?>",
                    type: "POST",   
                    data: {
                    "_token": "<?php echo e(csrf_token()); ?>",
                    product_id: product_id,
                    quantity: quantity,
                    price: price,
                    size: size,
                    color: color,
                    p_type: p_type,
                    },
                    success: function(data){
                        $('#cart').empty().append(data);
						alert('Product Added to Cart.');
                    },
                    error: function(data){
                        alert('Unable to add to cart this product.');
                    }
                });
            });


	});
</script>
</body>

</html><?php /**PATH C:\wamp64\www\pakcompany2\resources\views/front/quick-view.blade.php ENDPATH**/ ?>