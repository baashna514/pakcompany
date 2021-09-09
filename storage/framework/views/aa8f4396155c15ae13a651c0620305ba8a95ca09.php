
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
        <link id="color_scheme" href="<?php echo e(asset('public/front/css/theme.css')); ?>" rel="stylesheet"> 
        <link id="color_scheme" href="<?php echo e(asset('public/front/css/home4.css')); ?>" rel="stylesheet">
        <link href="<?php echo e(asset('public/front/css/responsive.css')); ?>" rel="stylesheet">
    
         <!-- Google web fonts
        ============================================ -->
        <link href='https://fonts.googleapis.com/css?family=Roboto:300,400,400i,500,500i,700' rel='stylesheet' type='text/css'>
        <style type="text/css">
             body{font-family:'Roboto', sans-serif}
        </style>

        <style>
            @import  url(https://fonts.googleapis.com/css?family=Oswald:400,300);
@import  url(https://fonts.googleapis.com/css?family=Open+Sans);
body
{
font-family: 'Open Sans', sans-serif;
}
.chat_box .chat_message_wrapper ul.chat_message > li + li {
    margin-top: 4px;
}
.popup-box-on {
    display: block !important;
}
a:focus {
    outline: none;
    outline-offset: 0px;
}
.popup-head-left.pull-left h1 {
    color: #fff;
    float: left;
    font-family: oswald;
    font-size: 18px;
    margin: 2px 0 0 5px;
   
}
.popup-head-left a small {
    display: table;
    font-size: 11px;
    color: #fff;
    line-height: 4px;
    opacity: 0.5;
    padding: 0 0 0 7px;
}
.chat-header-button {
    background: transparent none repeat scroll 0 0;
    border: 1px solid #fff;
    border-radius: 7px;
    font-size: 15px;
    height: 26px;
    opacity: 0.9;
    padding: 0;
    text-align: center;
    width: 26px;
}
.popup-head-right {
    margin: 9px 0 0;
}
.popup-head .btn-group {
    margin: -5px 3px 0 -1px;
}
.gurdeepoushan .dropdown-menu {
    padding: 6px;
}
.gurdeepoushan .dropdown-menu li a span {
    border: 1px solid;
    border-radius: 50px;
    display: list-item;
    font-size: 19px;
    height: 40px;
    line-height: 36px;
    margin: auto;
    text-align: center;
    width: 40px;
}
.gurdeepoushan .dropdown-menu li {
    float: left;
    text-align: center;
    width: 33%;
}
.gurdeepoushan .dropdown-menu li a {
    border-radius: 7px;
    font-family: oswald;
    padding: 3px;
   transition: all 0.3s ease-in-out 0s;
}
.gurdeepoushan .dropdown-menu li a:hover {
    background:#333333 none repeat scroll 0 0 !important;
    color: #fff;
}
.popup-head {
    background:#333333 none repeat scroll 0 0 !important;
    border-bottom: 3px solid #ccc;
    color: #fff;
    display: table;
    width: 100%;
    padding: 8px;
}
.popup-head .md-user-image {
    border: 2px solid#333333;
    border-radius: 12px;
    float: left;
    width: 44px;
}
.uk-input-group-addon .glyphicon.glyphicon-send {
    color: #ffffff;
    font-size: 21px;
    line-height: 36px;
    padding: 0 6px;
}
.chat_box_wrapper.chat_box_small.chat_box_active {
    
    height: 342px;
    overflow-y: scroll;
    width: 316px;
}
aside#sidebar_secondary {
     background-attachment: fixed;
    background-clip: border-box;
    background-color: #333333;
    background-image: url("https://scontent.fixc1-1.fna.fbcdn.net/v/t1.0-9/12670232_624826600991767_3547881030871377118_n.jpg?oh=92b8b3e25bdd56df4af5dc466feb46ce&oe=57CC10E7");
    background-origin: padding-box;
    background-position: center top;
    background-repeat: repeat;
    border: 1px solid #304445;
    bottom: 0;
    display: none;
    height: 466px;
    position: fixed;
    right: 70px;
    width: 300px;
    font-family: 'Open Sans', sans-serif;
    opacity: 1;
    background: #0e336d;
    z-index: 1;
}
.chat_box {
    padding: 16px;
}
.chat_box .chat_message_wrapper::after {
    clear: both;
}
.chat_box .chat_message_wrapper::after, .chat_box .chat_message_wrapper::before {
    content: " ";
    display: table;
}
.chat_box .chat_message_wrapper .chat_user_avatar {
    float: left;
}
.chat_box .chat_message_wrapper {
    margin-bottom: 32px;
}
.md-user-image {
    border-radius: 50%;
    width: 34px;
}
img {
    border: 0 none;
    box-sizing: border-box;
    height: auto;
    max-width: 100%;
    vertical-align: middle;
}
.chat_box .chat_message_wrapper ul.chat_message, .chat_box .chat_message_wrapper ul.chat_message > li {
    list-style: outside none none;
    padding: 0;
}
.chat_box .chat_message_wrapper ul.chat_message {
    float: left;
    margin: 0 0 0 20px;
    max-width: 77%;
}
.chat_box.chat_box_colors_a .chat_message_wrapper ul.chat_message > li:first-child::before {
    border-right-color:#333333;
}
.chat_box .chat_message_wrapper ul.chat_message > li:first-child::before {
    border-color: transparent #ededed transparent transparent;
    border-style: solid;
    border-width: 0 16px 16px 0;
    content: "";
    height: 0;
    left: -14px;
    position: absolute;
    top: 0;
    width: 0;
}
.chat_box.chat_box_colors_a .chat_message_wrapper ul.chat_message > li {
    background: #FCFBF6 none repeat scroll 0 0;
    color: #000000;
}
.open-btn {
    border: 2px solid #189d0e;
    border-radius: 32px;
    color: #189d0e !important;
    display: inline-block;
    margin: 10px 0 0;
    padding: 9px 16px;
    text-decoration: none !important;
    text-transform: uppercase;
}
.chat_box .chat_message_wrapper ul.chat_message > li {
    background: #ededed none repeat scroll 0 0;
    border-radius: 4px;
    clear: both;
    color:#333333;
    display: block;
    float: left;
    font-size: 13px;
    padding: 8px 16px;
    position: relative;
    word-break: break-all;
}
.chat_box .chat_message_wrapper ul.chat_message, .chat_box .chat_message_wrapper ul.chat_message > li {
    list-style: outside none none;
    padding: 0;
}
.chat_box .chat_message_wrapper ul.chat_message > li {
    margin: 0;
}
.chat_box .chat_message_wrapper ul.chat_message > li p {
    margin: 0;
}
.chat_box.chat_box_colors_a .chat_message_wrapper ul.chat_message > li .chat_message_time {
    color: rgba(185, 186, 180, 0.9);
}
.chat_box .chat_message_wrapper ul.chat_message > li .chat_message_time {
    color: #333333;
    display: block;
    font-size: 11px;
    padding-top: 2px;
    text-transform: uppercase;
}
.chat_box .chat_message_wrapper.chat_message_right .chat_user_avatar {
    float: right;
}
.chat_box .chat_message_wrapper.chat_message_right ul.chat_message {
    float: right;
    margin-left: 0 !important;
    margin-right: 24px !important;
}
.chat_box.chat_box_colors_a .chat_message_wrapper.chat_message_right ul.chat_message > li:first-child::before {
    border-left-color: #E8FFD4;
}
.chat_box.chat_box_colors_a .chat_message_wrapper ul.chat_message > li:first-child::before {
    border-right-color: #FCFBF6;
}
.chat_box .chat_message_wrapper.chat_message_right ul.chat_message > li:first-child::before {
    border-color: transparent transparent transparent #ededed;
    border-width: 0 0 29px 29px;
    left: auto;
    right: -14px;
}
.chat_box .chat_message_wrapper ul.chat_message > li:first-child::before {
    border-color: transparent #ededed transparent transparent;
    border-style: solid;
    border-width: 0 29px 29px 0;
    content: "";
    height: 0;
    left: -14px;
    position: absolute;
    top: 0;
    width: 0;
}
.chat_box.chat_box_colors_a .chat_message_wrapper.chat_message_right ul.chat_message > li {
    background: #E8FFD4 none repeat scroll 0 0;
}
.chat_box .chat_message_wrapper ul.chat_message > li {
    background: #ededed none repeat scroll 0 0;
    border-radius: 12px;
    clear: both;
    color: #333333;
    display: block;
    float: left;
    font-size: 13px;
    padding: 8px 16px;
    position: relative;
}
.gurdeep-chat-box {
    background: #fff none repeat scroll 0 0;
    border-radius: 5px;
    float: left;
    padding: 3px;
}
#submit_message {
    background: transparent none repeat scroll 0 0;
    border: medium none;
    padding: 4px;
}
.gurdeep-chat-box i {
    color: #333;
    font-size: 21px;
    line-height: 1px;
}
.chat_submit_box {
    bottom: 0;
    box-sizing: border-box;
    left: 0;
    overflow: hidden;
    padding: 10px;
    position: absolute;
    width: 100%;
}
.uk-input-group {
    border-collapse: separate;
    /* display: table; */
    position: relative;
}
textarea:focus{
    border-color: #0c8d4d !important; 
}
</style>
    
    </head>

<body class="res layout-subpage layout-1 banners-effect-5">
    <div id="wrapper" class="wrapper-fluid">
    <!-- Header Container  -->
    <?php echo $__env->make('front.layout.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- //Header Container  -->

	<!-- Main Container  -->
	<div class="main-container container">
		<ul class="breadcrumb">
			<!-- <li><a href="#"><i class="fa fa-home"></i></a></li>
			<li><a href="#">Smartphone & Tablets</a></li>
			<li><a href="#">Chicken swinesha</a></li> -->
		</ul>
		<div class="row">
			<!--Left Part Start -->
			<!--<aside class="col-sm-4 col-md-3 content-aside" id="column-left">-->
			<!--	<div class="module category-style">-->
   <!--             	<h3 class="modtitle">Categories</h3>-->
   <!--             	<div class="modcontent">-->
   <!--                     <div class="box-category">-->
   <!--                         <ul id="cat_accordion" class="list-group">-->
   <!--                             <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>-->
   <!--                             <li class="hadchild"><a href="<?php echo e(route('category-products-list',[$category->name,$category->id])); ?>" class="cutom-parent"><?php echo e($category->name); ?></a>   <span class="button-view  fa fa-plus-square-o"></span>-->
   <!--                                 <ul style="display: block;">-->
   <!--                                     <?php $__currentLoopData = $category->subcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>-->
   <!--                                     <li><a href="<?php echo e(route('subcategory-products-list',[$subcategory->name,$subcategory->id])); ?>"><?php echo e($subcategory->name); ?></a></li>-->
   <!--                                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>-->
   <!--                                 </ul>-->
   <!--                             </li>-->
   <!--                             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>-->
   <!--                         </ul>-->
   <!--                     </div>-->
   <!--                 </div>-->
   <!--             </div>-->
   <!--         </aside>-->
            <!--Left Part End -->

			<!--Middle Part Start-->
			<div id="content" class="col-md-9 col-sm-8">
				<div class="product-view row">
					<div class="left-content-product">
						<div class="content-product-left class-honizol col-md-5 col-sm-12 col-xs-12">
							<div class="large-image  ">
                                <?php if($product->integration_id): ?>
                                    <img itemprop="image" class="product-image-zoom" src="<?php echo e($product->p_thumbnail); ?>" data-zoom-image="<?php echo e($product->p_thumbnail); ?>" title="Chicken swinesha" alt="Chicken swinesha">
                                <?php else: ?>
                                    <img itemprop="image" class="product-image-zoom" src="<?php echo e(asset('public/thumbnail').'/'.$product->p_thumbnail); ?>" data-zoom-image="<?php echo e(asset('public/thumbnail').'/'.$product->p_thumbnail); ?>" title="Chicken swinesha" alt="Chicken swinesha">
                                <?php endif; ?>
							</div>
							<div id="thumb-slider" class="yt-content-slider full_slider owl-drag" data-rtl="yes" data-autoplay="no" data-autoheight="no" data-delay="4" data-speed="0.6" data-margin="10" data-items_column0="4" data-items_column1="3" data-items_column2="4"  data-items_column3="1" data-items_column4="1" data-arrows="yes" data-pagination="no" data-lazyload="yes" data-loop="no" data-hoverpause="yes">
                                <?php $__currentLoopData = $product->gallery; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$gallery): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($product->integration_id): ?>
                                        <a data-index="<?php echo e($key); ?>" class="img thumbnail " data-image="<?php echo e($gallery->path); ?>">
                                            <img src="<?php echo e($gallery->path); ?>" alt="Loading image">
                                        </a>
                                    <?php else: ?>
                                        <a data-index="<?php echo e($key); ?>" class="img thumbnail " data-image="<?php echo e(asset('public/gallery').'/'.$gallery->image); ?>">
                                            <img src="<?php echo e(asset('public/gallery').'/'.$gallery->image); ?>" alt="Loading image">
                                        </a>
                                    <?php endif; ?>
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
                                        
                                        
									</div>
								<?php endif; ?>
                                <div class="stock">
                                    
                                </div>
							</div>
							<div class="product-box-desc">
								<div class="inner-box-desc">
									
                                    <?php echo str_replace("daraz","MyDokkan", $product->p_detail); ?>

								</div>
							</div>
							<div id="product">
								<span class="price-new p-price" name="<?php echo e($product->price); ?>" itemprop="price" style="font-size: 20px; font-weight: bolder;margin-bottom:10px;">Rs. <?php echo e($product->price); ?> - PKR</span>
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
												<a class="icon" data-toggle="tooltip" title="" data-original-title="Add to Wish List"><i class="fa fa-heart"></i>
												</a>
											</li>
											<li><a href="https://wa.me/923334210917/?text=Hi..! How may i help you?" style="padding: 0px 0px;"><img src="https://image.similarpng.com/very-thumbnail/2020/05/WhatsApp-icon-PNG.png" alt="" style="width: 50px;"></a></li>
										</ul>
									</div>
                                </div>
							</div>
							<!-- end box info product -->
						</div>
					</div>
				</div>
				<!-- Related Products -->
			<div class="related titleLine products-list grid module ">
				<h3 class="modtitle">Related Products</h3>
				<div class="releate-products yt-content-slider products-list" data-rtl="no" data-loop="yes" data-autoplay="no" data-autoheight="no" data-autowidth="no" data-delay="4" data-speed="0.6" data-margin="30" data-items_column0="5" data-items_column1="3" data-items_column2="3" data-items_column3="2" data-items_column4="1" data-arrows="yes" data-pagination="no" data-lazyload="yes" data-hoverpause="yes">
					<?php if($relatedProduct): ?>
                    <?php $__currentLoopData = $relatedProduct; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="item">
                        <div class="item-inner product-layout transition product-grid">
                            <div class="product-item-container">
                                <div class="left-block">
                                    <div class="product-image-container second_img">
                                        <a href="<?php echo e(route('product', ['id'=>encrypt($data->id)])); ?>" target="_self" title="Pastrami bacon">
                                            <?php if($data->integration_id): ?>
                                                <img src="<?php echo e($data->p_thumbnail); ?>" class="img-1 img-responsive" alt="Pastrami bacon">
                                            <?php else: ?>
                                                <img src="<?php echo e(asset('public/thumbnail').'/'.$data->p_thumbnail); ?>" class="img-1 img-responsive" alt="Pastrami bacon">
                                            <?php endif; ?>
                                        </a>
                                    </div>
                                    <div class="button-group so-quickview cartinfo--left">
                                        <a href="" data-id="<?php echo e($product->id); ?>" type="button" class="addToCart btn-button" title="Add to cart"><i class="fa fa-shopping-cart"></i><span>Add to Cart</span>
                                        </a>
                                        <button type="button" class="wishlist btn-button" title="Add to Wish List" onclick="wishlist.add('60');"><i class="fa fa-heart"></i><span>Add to Wish List</span>
                                        </button>
                                        <!--quickview-->                                                      
                                        <a class="iframe-link btn-button quickview quickview_handler visible-lg" href="<?php echo e(route('quick-view', ['id' => $product->id])); ?>" title="Quick view" data-fancybox-type="iframe"><i class="fa fa-eye"></i><span>Quick view</span></a>                                                        
                                        <!--end quickview-->
                                    </div>
                                </div>
                                <div class="right-block">
                                    <div class="caption">
                                        <div class="rating">    
                                            <?php if(($data->p_quantity) <= 0): ?>
                                                <h5 class="text-danger">Out of Stock</h5>
                                            <?php endif; ?>
                                        </div>
                                        <h4><a href="product.html" title="Pastrami bacon" target="_self"><?php echo e($data->name); ?></a></h4>
                                        <div class="price">Rs. <?php echo e($data->price); ?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>

                    
				</div>
			</div>

			<!-- end Related  Products-->
			</div>	
			</div>
			
			
		</div>
		<!--Middle Part End-->
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

    
<!-- <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> -->
<!-- <script src="<?php echo e(asset('public/front/js/custom.js')); ?>"></script>  -->
    <script>
        $(document).ready(function(){
            // $.get('<?php echo e(route("get-chat-messages")); ?>', function(data){
            //     $('#chat').empty().append(data);
            // });
            // window.setInterval(function(){
            //     $.get('<?php echo e(route("get-chat-messages")); ?>', function(data){
            //         $('#chat').empty().append(data);
            //     });
            // }, 1000);

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

            $('.btn-chat').click(function(e){
                e.preventDefault();
            });
            $("#addClass").click(function () {
            $('#sidebar_secondary').addClass('popup-box-on');
            });
            
            $("#removeClass").click(function () {
                $('#sidebar_secondary').removeClass('popup-box-on');
            });
            // show cart items in header
			$.get('<?php echo e(route("myCartPage.getCart-onLoad")); ?>', function(response){
				$('#cart').empty().append(response);
			});

            $('#button-cart').click(function(e){
                e.preventDefault();
                var product_id = '<?php echo e($product->id); ?>';
                var p_type = '<?php echo e($product->p_type); ?>';
                var quantity = $('#quantity').val();
                var price = $('.p-price').attr('name');
                if(p_type == 'simple product'){
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
                    var color = $('input[type="radio"]:checked').val();
                    var size = $('#size').val();
                    if(size == undefined){
                        alert('Choose size');
                        return;
                    }
                    var price = $('#size-price').attr('name');
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
                        alert('Item Added into Cart.');
                    },
                    error: function(data){
                        alert('Unable to add to cart this product.');
                    }
                });
            });
        });
    </script>
    <script>
        var element = $('.floating-chat');
var myStorage = localStorage;

if (!myStorage.getItem('chatID')) {
    myStorage.setItem('chatID', createUUID());
}

setTimeout(function() {
    element.addClass('enter');
}, 1000);

element.click(openElement);

function openElement() {
    var messages = element.find('.messages');
    var textInput = element.find('.text-box');
    element.find('>i').hide();
    element.addClass('expand');
    element.find('.chat').addClass('enter');
    var strLength = textInput.val().length * 2;
    textInput.keydown(onMetaAndEnter).prop("disabled", false).focus();
    element.off('click', openElement);
    element.find('.header button').click(closeElement);
    element.find('#sendMessage').click(sendNewMessage);
    messages.scrollTop(messages.prop("scrollHeight"));
}

function closeElement() {
    element.find('.chat').removeClass('enter').hide();
    element.find('>i').show();
    element.removeClass('expand');
    element.find('.header button').off('click', closeElement);
    element.find('#sendMessage').off('click', sendNewMessage);
    element.find('.text-box').off('keydown', onMetaAndEnter).prop("disabled", true).blur();
    setTimeout(function() {
        element.find('.chat').removeClass('enter').show()
        element.click(openElement);
    }, 500);
}

function createUUID() {
    // http://www.ietf.org/rfc/rfc4122.txt
    var s = [];
    var hexDigits = "0123456789abcdef";
    for (var i = 0; i < 36; i++) {
        s[i] = hexDigits.substr(Math.floor(Math.random() * 0x10), 1);
    }
    s[14] = "4"; // bits 12-15 of the time_hi_and_version field to 0010
    s[19] = hexDigits.substr((s[19] & 0x3) | 0x8, 1); // bits 6-7 of the clock_seq_hi_and_reserved to 01
    s[8] = s[13] = s[18] = s[23] = "-";

    var uuid = s.join("");
    return uuid;
}

function sendNewMessage() {
    var userInput = $('.text-box');
    var newMessage = userInput.html().replace(/\<div\>|\<br.*?\>/ig, '\n').replace(/\<\/div\>/g, '').trim().replace(/\n/g, '<br>');

    if (!newMessage) return;

    var messagesContainer = $('.messages');

    messagesContainer.append([
        '<li class="self">',
        newMessage,
        '</li>'
    ].join(''));

    // clean out old message
    userInput.html('');
    // focus on input
    userInput.focus();

    messagesContainer.finish().animate({
        scrollTop: messagesContainer.prop("scrollHeight")
    }, 250);
}

function onMetaAndEnter(event) {
    if ((event.metaKey || event.ctrlKey) && event.keyCode == 13) {
        sendNewMessage();
    }
}
     </script>
	
</body>
</html><?php /**PATH /home/webeasydemos/public_html/pakcompany/resources/views/front/product.blade.php ENDPATH**/ ?>