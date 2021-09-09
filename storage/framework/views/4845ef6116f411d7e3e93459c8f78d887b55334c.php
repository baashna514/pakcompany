

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
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

     <!-- Google web fonts
    ============================================ -->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700' rel='stylesheet' type='text/css'>
    <style type="text/css">
        body{font-family:'Open Sans', sans-serif;}
        .product-item-container:hover{
            border-color: rgba(0,0,0,.2);
            box-shadow: 0 5px 20px rgb(0 0 0 / 35%);
            transition: 500ms ease all;
        }
        .item img:not(:first-child){
            margin-left: 80px !important;
        }
        .modtitle{
            background: #0c8d4d;
        }
        h3.modtitle>span{
            color: #fff;
        }
        .btn-success{
            color: #0c8d4d;
            background-color: #ffffff;
            border-color: #ffffff;
            border-radius: 4px;
        }
        .btn-success:hover {
            color: #fff;
            background-color: #0fb864;
            border-color: #0fb864;
            border-radius: 4px;
        }
    </style>
</head>

<body class="common-home res layout-4">
    <div id="wrapper" class="wrapper-fluid banners-effect-10">
    <!-- Header Container  -->
    <?php echo $__env->make('front.layout.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- //Header Container  -->
    
   
<!-- Main Container  -->
<div class="main-container">
    <div id="content">
        <div class="container">
            <div class="box-content1">
                <div class="top-tags">
                    <ul>
                        
                    </ul>
                </div>
                <div class="module sohomepage-slider ">
                    <div class="yt-content-slider"  data-rtl="yes" data-autoplay="yes" data-autoheight="no" data-delay="4" data-speed="0.6" data-margin="0" data-items_column0="1" data-items_column1="1" data-items_column2="1"  data-items_column3="1" data-items_column4="1" data-arrows="yes" data-pagination="yes" data-lazyload="no" data-loop="yes" data-hoverpause="yes">
                        <?php if($sliders): ?>
                            <?php $__currentLoopData = $sliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="yt-content-slide">
                                    <a href="#"><img src="<?php echo e(asset('public/slider').'/'.$slider->image); ?>" alt="<?php echo e($key+1); ?>" class="img-responsive"></a>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </div>
                    
                    <div class="loadeding"></div>
                </div>
                
            </div>

            <div class="row box-content2">
                
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 extra-right" style="width: 100%;">
                    <div class="module so-extraslider-ltr ">     
                        <h3 class="modtitle">
                            <span style="color: #fff;">Special Edition</span>
                            <span style="color: #fff;float:right;"><a href="" class="btn btn-success">View All</a></span>
                        </h3>
                        <div class="modcontent">                                               
                            <div class="so-extraslider">
                          
                                <div class="yt-content-slider extraslider-inner products-list" data-rtl="yes" data-pagination="no" data-autoplay="no" data-delay="4" data-speed="0.6" data-margin="30" data-items_column0="5" data-items_column1="5" data-items_column2="4" data-items_column3="2" data-items_column4="1" data-arrows="yes" data-lazyload="yes" data-loop="no" data-buttonpage="top">                                                                   
                                    <?php $__currentLoopData = $featured_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="item featured-product">
                                        <div class="product-layout product-grid2 style1">                                           
                                            <div class="product-thumb transition product-item-container">                                    
                                                <div class="left-block">
                                                    <div class="product-image-container">
                                                        <div class="image"> 
                                                            <?php if($product->sale_price): ?>
                                                                <?php
                                                                    $price = $product->price;
                                                                    $new = $product->sale_price;
                                                                    $diff = $price - $new;
                                                                    $perc = (($diff / $price) * 100);
                                                                ?>
                                                                <div class="box-label">
                                                                    <span class="label label-sale">-<?php echo e(number_format((float)$perc, 1, '.', '')); ?>%</span>
                                                                </div>
                                                            <?php endif; ?>
                                                            <a href="<?php echo e(route('product', ['id'=>encrypt($product->id)])); ?>" target="_self" title="<?php echo e($product->name); ?>">
                                                                <img src="<?php echo e(asset('public/thumbnail').'/'.$product->p_thumbnail); ?>" alt="<?php echo e($product->name); ?>" class="img-responsive">
                                                            </a>
                                                        </div>
                                                        <!--quickview-->   
                                                        <div class="so-quickview">
                                                            <a class="iframe-link btn-button quickview quickview_handler visible-lg" href="<?php echo e(route('quick-view', ['id'=> $product->id])); ?>" title="Quick view" data-fancybox-type="iframe"><i class="fa fa-eye"></i><span>Quick view</span></a>      
                                                        </div>                                                  
                                                        <!--end quickview-->
                                                    </div> 
                                                </div>
                                                <div class="right-block">
                                                    <div class="caption">
                                                        <h4><a href="<?php echo e(route('product', ['name'=>$product->name, 'id'=>$product->id])); ?>" target="_self" title="<?php echo e($product->name); ?>"><?php echo e(Str::limit($product->name, 26)); ?></a></h4>
                                                        <div class="rating">    
                                                            <?php if(($product->p_quantity) <= 0): ?>
                                                            <h5 class="text-danger">Out of Stock</h5>
                                                            <?php endif; ?>
                                                        </div>
                                                        <?php if($product->sale_price): ?>
                                                            <p class="price">
                                                                <span class="price-new">Rs. <?php echo e($product->sale_price); ?></span>
                                                                <span class="price-old">Rs. <?php echo e($product->price); ?></span>
                                                            </p>
                                                        <?php else: ?>
                                                            <p class="price">   
                                                                <span class="price-new">Rs. <?php echo e($product->price); ?></span>
                                                            </p>
                                                        <?php endif; ?>
                                                        <div class="button-group">
                                                            <a href="" data-id="<?php echo e($product->id); ?>" class="addToCart" title="Add" type="button"><i class="fa fa-shopping-cart"></i>  <span> Add to Cart</span>
                                                            </a>
                                                            <button class="btn-button wishlist" type="button" title="Add to Wish List" onclick="wishlistfunction(<?php echo e($product->id); ?>)"><i class="fa fa-heart"></i><span></span>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div> 
                                            </div>
                                        </div>
                                    </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                
            <div class="so-categories custom-slidercates module clearfix">
                <h3 class="modtitle"><span style="color: #fff;">Top collections</span></h3>
                <div class="modcontent">        
                    <div class="cat-wrap theme3 font-title yt-content-slider"  data-rtl="yes" data-autoplay="no" data-autoheight="no" data-delay="4" data-speed="0.6" data-margin="30" data-items_column0="5" data-items_column1="4" data-items_column2="3"  data-items_column3="2" data-items_column4="1" data-arrows="yes" data-pagination="no" data-lazyload="yes" data-loop="no" data-hoverpause="yes">
                        <?php if($top_collections): ?>
                            <?php $__currentLoopData = $top_collections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $collection): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="content-box">
                                    <div class="image-cat">
                                        <?php
                                            $title = str_replace(' ', '-', $collection->title); 
                                        ?>
                                        <a href="<?php echo e(route('top-collections.get-products', ['title'=> $title, 'id'=> encrypt($collection->subcategory_id)])); ?>" title="Smartphone" target="_self">
                                            <img src="<?php echo e(asset('public/top-collection').'/'.$collection->image); ?>" title="<?php echo e($collection->title); ?>" alt="loading image" />
                                        </a>
                                    </div>
                                    <div class="cat-title"> 
                                        <a href="<?php echo e(route('top-collections.get-products', ['title'=> $title, 'id'=> encrypt($collection->subcategory_id)])); ?>" title="Smartphone " target="_self"> <?php echo e($collection->title); ?></a>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <?php if($layouts): ?>
                <?php $__currentLoopData = $layouts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $layout): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="row box-content2" style="margin-top: 20px;">
                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 box-left">
                            <!-- Deals -->
                            <div class="product-image-container">
                                <div class="image">
                                    <img src="<?php echo e(asset('public/thumbnail').'/'.$layout->img); ?>" class="img-responsive" style="width: 100%;border: 4px solid #0c8d4d;padding: 7px;border-style: dotted;">
                                </div>  
                            </div>
                            <!-- End Deals -->
                        </div>
                        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 extra-right">
                            <div class="module so-extraslider-ltr ">     
                                <h3 class="modtitle">
                                    <span style="color: #fff;"><?php echo e($layout->title); ?></span>
                                    <span style="color: #fff;float:right;"><a href="" class="btn btn-success">View All</a></span>
                                </h3>
                                <div class="modcontent">                                               
                                    <div class="so-extraslider">
                                        <div class="yt-content-slider extraslider-inner products-list" data-rtl="yes" data-pagination="no" data-autoplay="no" data-delay="3" data-speed="0.6" data-margin="30" data-items_column0="4" data-items_column1="4" data-items_column2="3" data-items_column3="2" data-items_column4="1" data-arrows="yes" data-lazyload="yes" data-loop="no" data-buttonpage="top">                                                                   
                                            <?php if($layout->category->products): ?>
                                                <?php
                                                    $products = \App\Product::where('category_id', $layout->category_id)->inRandomOrder()->get();
                                                ?>
                                                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <div class="item">
                                                        <div class="product-layout product-grid2 style1">                                           
                                                            <div class="product-thumb transition product-item-container">                                    
                                                                <div class="left-block">
                                                                    <div class="product-image-container">
                                                                        <div class="image"> 
                                                                            <?php if($product->sale_price): ?>
                                                                                <?php
                                                                                    $price = $product->price;
                                                                                    $new = $product->sale_price;
                                                                                    $diff = $price - $new;
                                                                                    $perc = (($diff / $price) * 100);
                                                                                ?>
                                                                                <div class="box-label">
                                                                                    <span class="label label-sale">-<?php echo e(number_format((float)$perc, 1, '.', '')); ?>%</span>
                                                                                </div>
                                                                            <?php endif; ?>
                                                                            <a href="<?php echo e(route('product', ['id'=>encrypt($product->id)])); ?>" target="_self" title="<?php echo e($product->name); ?>">
                                                                                <img src="<?php echo e(asset('public/thumbnail').'/'.$product->p_thumbnail); ?>" alt="<?php echo e($product->name); ?>" class="img-responsive">
                                                                            </a>
                                                                        </div>
                                                                        <!--quickview-->   
                                                                        <div class="so-quickview">
                                                                            <a class="iframe-link btn-button quickview quickview_handler visible-lg" href="<?php echo e(route('quick-view', ['id'=> $product->id])); ?>" title="Quick view" data-fancybox-type="iframe"><i class="fa fa-eye"></i><span>Quick view</span></a>      
                                                                        </div>                                                  
                                                                        <!--end quickview-->
                                                                    </div> 
                                                                </div>
                                                                <div class="right-block">
                                                                    <div class="caption">
                                                                        <h4><a href="<?php echo e(route('product', ['name'=>$product->name, 'id'=>$product->id])); ?>" target="_self" title="<?php echo e($product->name); ?>"><?php echo e(Str::limit($product->name, 19)); ?></a></h4>
                                                                        <div class="rating">    
                                                                            <?php if(($product->p_quantity) <= 0): ?>
                                                                                <h5 class="text-danger">Out of Stock</h5>
                                                                            <?php endif; ?>
                                                                        </div>
                                                                        <?php if($product->sale_price): ?>
                                                                            <p class="price">
                                                                                <span class="price-new">Rs. <?php echo e($product->sale_price); ?></span>
                                                                                <span class="price-old">Rs. <?php echo e($product->price); ?></span>
                                                                            </p>
                                                                        <?php else: ?>
                                                                            <p class="price">   
                                                                                <span class="price-new">Rs. <?php echo e($product->price); ?></span>
                                                                            </p>
                                                                        <?php endif; ?>
                                                                        <div class="button-group">
                                                                            <a href="" data-id="<?php echo e($product->id); ?>" class="addToCart" title="Add to Cart" type="button"><i class="fa fa-shopping-cart"></i>  <span> Add to Cart</span>
                                                                            </a>
                                                                            <button class="btn-button wishlist" type="button" title="Add to Wish List" onclick="wishlistfunction(<?php echo e($product->id); ?>)"><i class="fa fa-heart"></i><span></span>
                                                                            </button>
                                                                            
                                                                            
                                                                        </div>
                                                                    
                                                                    </div>
                                                                </div> 
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        </div>
    </div>
</div>
<!-- //Main Container -->
   
   

    <!-- Footer Container -->
    <?php echo $__env->make('front.layout.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- //end Footer Container -->

    </div>
   

<!-- End Color Scheme
============================================ -->



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
    function wishlistfunction(id){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type:'post',
            url:'<?php echo e(route("add-wishlist")); ?>',
            data: {id:id,_token: '<?php echo e(csrf_token()); ?>'},
            success:function(response){
                var message =response;
                alert(message);
            }
        });
    }
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


        $('.addToCart').click(function(e){
            e.preventDefault();
            var product_id = $(this).attr('data-id');
            var p_type = 'simple product';
            var quantity = 1;
            var price = $('#price').attr('data-id');
            if(p_type == 'simple product'){
                var price = $('.p-price').attr('name');
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

        // $('.wishlist').click(function(e){
        //     e.preventDefault();
        //     var id = $(this).attr('data-id');
        //     alert(id);
        // });
    });
</script>

</body>
</html><?php /**PATH C:\wamp64\www\pakcompany\resources\views/front/index.blade.php ENDPATH**/ ?>