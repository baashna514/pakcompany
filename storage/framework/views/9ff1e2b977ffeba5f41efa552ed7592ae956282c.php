
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
            .product-item-container:hover{
                border-color: rgba(0,0,0,.2);
                box-shadow: 0 5px 20px rgb(0 0 0 / 35%);
                transition: 500ms ease all;
            }
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
            <li><a href="<?php echo e(route('index')); ?>"><i class="fa fa-home"></i></a></li>
            <li><a href="">Sub-Category</a></li>
			
		</ul>
		<div class="row">
			<!--Middle Part Start-->
            <div id="content" class="col-md-12 col-sm-12">
                <div class="products-category">
                    <h3 class="title-category ">Products</h3>
                    <div class="category-derc">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="banners">
                                    <div>
                                        <a  href="#"><img src="<?php echo e(asset('public/front/image/slider2.jpg')); ?>" alt="img cate" style="width: 100%;"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Filters -->
                    <div class="product-filter product-filter-top filters-panel">
                    </div>
                    <!-- //end Filters -->
                    <!--changed listings-->
                    <div class="products-list row nopadding-xs so-filter-gird">
                        <?php if($products): ?>
                            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="product-layout col-lg-15 col-md-4 col-sm-6 col-xs-12">
                                    <div class="product-item-container">
                                        <div class="left-block">
                                            <div class="product-image-container second_img">
                                                <?php
                                                    $name = str_replace(' ', '-', $product->name);
                                                ?>
                                                <a href="<?php echo e(route('product', ['id'=>encrypt($product->id)])); ?>" target="_self" title="Chicken swinesha">
                                                    <img src="<?php echo e(asset('public/thumbnail/').'/'.$product->p_thumbnail); ?>" class="img-1 img-responsive" alt="image">
                                                    <img src="<?php echo e(asset('public/thumbnail/').'/'.$product->p_thumbnail); ?>" class="img-2 img-responsive" alt="image">
                                                </a>
                                            </div>
                                            <?php if($product->sale_price): ?>   
                                                <div class="box-label"> <span class="label-product label-sale"> -16% </span></div>
                                            <?php endif; ?>
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
                                                    <?php if(($product->stock) == false): ?>
                                                        <h5 class="text-danger stock-status">Out of Stock</h5>
                                                    <?php endif; ?>
                                                </div>
                                                <h4><a href="<?php echo e(route('product', ['id'=>encrypt($product->id)])); ?>" title="Chicken swinesha" target="_self"><?php echo e(Str::limit($product->name, 30)); ?></a></h4>
                                                <?php if($product->sale_price): ?>
                                                    <div class="price"> <span class="price-new" style="font-size: 16px;">Rs. <?php echo e($product->sale_price); ?></span>
                                                        <span class="price-old">Rs. <?php echo e($product->price); ?></span>
                                                    </div>
                                                <?php else: ?>
                                                    <div class="price"> <span class="price-new" style="font-size: 16px;">Rs. <?php echo e($product->price); ?></span></div>
                                                <?php endif; ?>
                                                <div class="description item-desc">
                                                    <p><?php echo e($product->p_description); ?> </p>
                                                </div>
                                                <div class="list-block">
                                                    
                                                    <button class="wishlist btn-button" type="button" title="Add to Wish List" onclick="wishlist.add('101');"><i class="fa fa-heart"></i>
                                                    </button>
                                                    <button class="compare btn-button" type="button" title="Compare this Product" onclick="compare.add('101');"><i class="fa fa-refresh"></i>
                                                    </button>
                                                    <!--quickview-->                                                      
                                                    <a class="iframe-link btn-button quickview quickview_handler visible-lg" href="<?php echo e(route('quick-view', ['id' => $product->id])); ?>" title="Quick view" data-fancybox-type="iframe"><i class="fa fa-eye"></i></a>                                                        
                                                    <!--end quickview-->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </div>
                    <!--// End Changed listings-->
                    <!-- Filters -->
                    <div class="product-filter product-filter-bottom filters-panel">
                        <div class="row">
                            <div class="col-sm-6 text-left"></div>
                            <div class="col-sm-6 text-right"><?php echo e($products->links()); ?></div>
                        </div>
                    </div>
                    <!-- //end Filters -->
                    
                </div>
                
            </div>
            

            <!--Middle Part End-->
			
			
		</div>
		<!--Middle Part End-->
	</div>
	<!-- //Main Container -->
	

	<!-- Footer Container -->
    <?php echo $__env->make('front.layout.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- //end Footer Container -->

    </div>
	
	
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
            $.get('<?php echo e(route("myCartPage.getCart-onLoad")); ?>', function(response){
                $('#cart').empty().append(response);
            });
    
            $('[data-countdown]').each(function() {
            var $this = $(this), finalDate = $(this).data('countdown');
            $this.countdown(finalDate, function(event) {
                $this.html(event.strftime('%D days %H:%M:%S'));
            });
            });
        });
    </script>	
	<script type="text/javascript">
	// Check if Cookie exists
		if($.cookie('display')){
			view = $.cookie('display');
		}else{
			view = 'grid';
		}
		if(view) display(view);
        $( document ).ready(function() {
            $("input").removeAttr("checked");
            $('.table_cell12').hide();
            $(".min_value").prop('disabled', true);
            $(".max_value").prop('disabled', true);
        });
        
        $('#priceCheck').click(function(){
           
          if($("#priceCheck").prop('checked') == true){
               $('.table_cell12').show();
               $(".min_value").prop('disabled', false);
               $(".max_value").prop('disabled', false);
           }
           else{
                $('.table_cell12').hide();
            
           }
        });
        $('#configreset').click(function(){
            console.log("clicked ere");
            $("input").removeAttr("checked");
        });

        $('.addToCart').click(function(e){
            e.preventDefault();
            var stock = $('.stock-status').text();
            if(stock == 'Out of Stock'){
                alert('Product is out of stock');
                return;
            }
            var product_id = $(this).attr('data-id');
            var p_type = 'simple product';
            var quantity = 1;
            var price = $('#price').attr('data-id');
            if(p_type == 'simple product'){
                var size = 'Default Size';
                color = 'Default Color';
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
	</script> 
</body>
</html><?php /**PATH C:\wamp64\www\pakcompany2\resources\views/front/category-products/subcategory-products-list.blade.php ENDPATH**/ ?>