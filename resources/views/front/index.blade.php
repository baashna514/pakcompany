

<!DOCTYPE html>
<html lang="en">
<head>
    @include('front.layout.meta')
    <!-- Libs CSS
    ============================================ -->
    <link rel="stylesheet" href="{{ asset('public/front/css/bootstrap/css/bootstrap.min.css') }}">
    <link href="{{ asset('public/front/css/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('public/front/js/owl-carousel/owl.carousel.css') }}" rel="stylesheet">
    <link href="{{ asset('public/front/css/themecss/lib.css') }}" rel="stylesheet">
    <link href="{{ asset('public/front/js/jquery-ui/jquery-ui.min.css') }}" rel="stylesheet">
    <!-- Theme CSS
    ============================================ -->
    <link href="{{ asset('public/front/css/themecss/so_megamenu.css') }}" rel="stylesheet">
    <link href="{{ asset('public/front/css/themecss/so-categories.css') }}" rel="stylesheet">
    <link href="{{ asset('public/front/css/themecss/so-listing-tabs.css') }}" rel="stylesheet">

    <link href="{{ asset('public/front/css/footer/footer1.css') }}" rel="stylesheet">
    <link href="{{ asset('public/front/css/header/header4.css') }}" rel="stylesheet">
    <link id="color_scheme" href="{{ asset('public/front/css/home4.css') }}" rel="stylesheet"> 
    <link href="{{ asset('public/front/css/responsive.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

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
    @include('front.layout.header')
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
                        @if ($sliders)
                            @foreach ($sliders as $key=>$slider)
                                <div class="yt-content-slide">
                                    <a href="#"><img src="{{asset('public/slider').'/'.$slider->image}}" alt="{{$key+1}}" class="img-responsive"></a>
                                </div>
                            @endforeach
                        @endif
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
                                    @foreach ($featured_products as $product)
                                    <div class="item featured-product">
                                        <div class="product-layout product-grid2 style1">                                           
                                            <div class="product-thumb transition product-item-container">                                    
                                                <div class="left-block">
                                                    <div class="product-image-container">
                                                        <div class="image"> 
                                                            @if ($product->sale_price)
                                                                @php
                                                                    $price = $product->price;
                                                                    $new = $product->sale_price;
                                                                    $diff = $price - $new;
                                                                    $perc = (($diff / $price) * 100);
                                                                @endphp
                                                                <div class="box-label">
                                                                    <span class="label label-sale">-{{number_format((float)$perc, 1, '.', '') }}%</span>
                                                                </div>
                                                            @endif
                                                            <a href="{{ route('product', ['id'=>($product->id)]) }}" target="_self" title="{{$product->name}}">
                                                                <img src="{{asset('public/thumbnail').'/'.$product->p_thumbnail}}" alt="{{$product->name}}" class="img-responsive">
                                                            </a>
                                                        </div>
                                                        <!--quickview-->   
                                                        <div class="so-quickview">
                                                            <a class="iframe-link btn-button quickview quickview_handler visible-lg" href="{{ route('quick-view', ['id'=> $product->id]) }}" title="Quick view" data-fancybox-type="iframe"><i class="fa fa-eye"></i><span>Quick view</span></a>      
                                                        </div>                                                  
                                                        <!--end quickview-->
                                                    </div> 
                                                </div>
                                                <div class="right-block">
                                                    <div class="caption">
                                                        <h4><a href="{{ route('product', ['name'=>$product->name, 'id'=>$product->id]) }}" target="_self" title="{{$product->name}}">{{ Str::limit($product->name, 26) }}</a></h4>
                                                        <div class="rating">    
                                                            @if (($product->stock) == false)
                                                            <h5 class="text-danger">Out of Stock</h5>
                                                            @endif
                                                        </div>
                                                        @if ($product->sale_price)
                                                            <p class="price">
                                                                <span class="price-new">Rs. {{ $product->sale_price }}</span>
                                                                <span class="price-old">Rs. {{ $product->price }}</span>
                                                            </p>
                                                        @else
                                                            <p class="price">   
                                                                <span class="price-new">Rs. {{ $product->price }}</span>
                                                            </p>
                                                        @endif
                                                        <div class="button-group">
                                                            {{-- <a href="" data-id="{{$product->id}}" class="addToCart" title="Add" type="button"><i class="fa fa-shopping-cart"></i>  <span> Add to Cart</span>
                                                            </a> --}}
                                                            <a href="{{ route('product', ['id'=>($product->id)]) }}" data-id="{{$product->id}}" class="addToCart" title="Add" type="button" style="font-size: 12px;"><i class="fa fa-eye"></i>  <span> View Detail</span>
                                                            </a>
                                                            <button data-id="{{$product->id}}" class="btn-button wishlist" type="button" title="Add to Wish List"><i class="fa fa-heart"></i><span></span>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div> 
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
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
                        @if ($top_collections)
                            @foreach ($top_collections as $collection)
                                <div class="content-box">
                                    <div class="image-cat">
                                        @php
                                            $title = str_replace(' ', '-', $collection->title); 
                                        @endphp
                                        <a href="{{ route('top-collections.get-products', ['title'=> $title, 'id'=> ($collection->category_id)]) }}" title="{{$collection->title}}" target="_self">
                                            <img src="{{asset('public/top-collection').'/'.$collection->image}}" title="{{ $collection->title }}" alt="loading image" />
                                        </a>
                                    </div>
                                    <div class="cat-title"> 
                                        <a href="{{ route('top-collections.get-products', ['title'=> $title, 'id'=> ($collection->category_id)]) }}" title="{{$collection->title}} " target="_self"> {{ $collection->title }}</a>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>

            @if ($layouts)
                @foreach($layouts as $layout)
                    <div class="row box-content2" style="margin-top: 20px;">
                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 box-left">
                            <!-- Deals -->
                            <div class="product-image-container">
                                <div class="image">
                                    <img src="{{asset('public/thumbnail').'/'.$layout->img}}" class="img-responsive" style="width: 100%;border: 4px solid #0c8d4d;padding: 7px;border-style: dotted;">
                                </div>  
                            </div>
                            <!-- End Deals -->
                        </div>
                        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 extra-right">
                            <div class="module so-extraslider-ltr ">     
                                <h3 class="modtitle">
                                    <span style="color: #fff;">{{$layout->title}}</span>
                                    <span style="color: #fff;float:right;"><a href="" class="btn btn-success">View All</a></span>
                                </h3>
                                <div class="modcontent">                                               
                                    <div class="so-extraslider">
                                        <div class="yt-content-slider extraslider-inner products-list" data-rtl="yes" data-pagination="no" data-autoplay="no" data-delay="3" data-speed="0.6" data-margin="30" data-items_column0="4" data-items_column1="4" data-items_column2="3" data-items_column3="2" data-items_column4="1" data-arrows="yes" data-lazyload="yes" data-loop="no" data-buttonpage="top">                                                                   
                                            @if ($layout->category->products)
                                                @php
                                                    $products = \App\Product::where('category_id', $layout->category_id)->inRandomOrder()->take(8)->get();
                                                @endphp
                                                @foreach ($products as $product)
                                                    <div class="item">
                                                        <div class="product-layout product-grid2 style1">                                           
                                                            <div class="product-thumb transition product-item-container">                                    
                                                                <div class="left-block">
                                                                    <div class="product-image-container">
                                                                        <div class="image"> 
                                                                            @if ($product->sale_price)
                                                                                @php
                                                                                    $price = $product->price;
                                                                                    $new = $product->sale_price;
                                                                                    $diff = $price - $new;
                                                                                    $perc = (($diff / $price) * 100);
                                                                                @endphp
                                                                                <div class="box-label">
                                                                                    <span class="label label-sale">-{{number_format((float)$perc, 1, '.', '') }}%</span>
                                                                                </div>
                                                                            @endif
                                                                            <a href="{{ route('product', ['id'=>($product->id)]) }}" target="_self" title="{{$product->name}}">
                                                                                <img src="{{asset('public/thumbnail').'/'.$product->p_thumbnail}}" alt="{{$product->name}}" class="img-responsive">
                                                                            </a>
                                                                        </div>
                                                                        <!--quickview-->   
                                                                        <div class="so-quickview">
                                                                            <a class="iframe-link btn-button quickview quickview_handler visible-lg" href="{{ route('quick-view', ['id'=> $product->id]) }}" title="Quick view" data-fancybox-type="iframe"><i class="fa fa-eye"></i><span>Quick view</span></a>      
                                                                        </div>                                                  
                                                                        <!--end quickview-->
                                                                    </div> 
                                                                </div>
                                                                <div class="right-block">
                                                                    <div class="caption">
                                                                        <h4><a href="{{ route('product', ['name'=>$product->name, 'id'=>$product->id]) }}" target="_self" title="{{$product->name}}">{{ Str::limit($product->name, 19) }}</a></h4>
                                                                        <div class="rating">    
                                                                            @if (($product->stock) == false)
                                                                                <h5 class="text-danger">Out of Stock</h5>
                                                                            @endif
                                                                        </div>
                                                                        @if ($product->sale_price)
                                                                            <p class="price">
                                                                                <span class="price-new">Rs. {{ $product->sale_price }}</span>
                                                                                <span class="price-old">Rs. {{ $product->price }}</span>
                                                                            </p>
                                                                        @else
                                                                            <p class="price">   
                                                                                <span class="price-new">Rs. {{ $product->price }}</span>
                                                                            </p>
                                                                        @endif
                                                                        <div class="button-group">
                                                                            <a href="{{ route('product', ['id'=>($product->id)]) }}" data-id="{{$product->id}}" class="addToCart" title="Add" type="button" style="font-size: 12px;"><i class="fa fa-eye"></i>  <span> View Detail</span>
                                                                            </a>
                                                                            <button data-id="{{$product->id}}" class="btn-button wishlist" type="button" title="Add to Wish List"><i class="fa fa-heart"></i><span></span>
                                                                            </button>
                                                                            
                                                                        </div>
                                                                    
                                                                    </div>
                                                                </div> 
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</div>
<!-- //Main Container -->
   
   

    <!-- Footer Container -->
    @include('front.layout.footer')
    <!-- //end Footer Container -->

    </div>
   

<!-- End Color Scheme
============================================ -->



<!-- Include Libs & Plugins
============================================ -->
<!-- Placed at the end of the document so the pages load faster -->
<script type="text/javascript" src="{{ asset('public/front/js/jquery-2.2.4.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('public/front/js/bootstrap/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('public/front/js/owl-carousel/owl.carousel.js')}}"></script>
<script type="text/javascript" src="{{ asset('public/front/js/themejs/libs.js')}}"></script>
<script type="text/javascript" src="{{ asset('public/front/js/unveil/jquery.unveil.js')}}"></script>
<script type="text/javascript" src="{{ asset('public/front/js/countdown/jquery.countdown.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('public/front/js/dcjqaccordion/jquery.dcjqaccordion.2.8.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('public/front/js/datetimepicker/moment.js')}}"></script>
<script type="text/javascript" src="{{ asset('public/front/js/datetimepicker/bootstrap-datetimepicker.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('public/front/js/jquery-ui/jquery-ui.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('public/front/js/modernizr/modernizr-2.6.2.min.js')}}"></script>
<!-- Theme files
============================================ -->
<script type="text/javascript" src="{{ asset('public/front/js/themejs/application.js')}}"></script>
<script type="text/javascript" src="{{ asset('public/front/js/themejs/homepage.js')}}"></script>
<script type="text/javascript" src="{{ asset('public/front/js/themejs/toppanel.js')}}"></script>
<script type="text/javascript" src="{{ asset('public/front/js/themejs/so_megamenu.js')}}"></script>
<script type="text/javascript" src="{{ asset('public/front/js/themejs/addtocart.js')}}"></script> 
<script src="{{ asset('public/front/js/popper.min.js')}}"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="{{ asset('public/front/js/custom.js')}}"></script> 
<script>

    $(document).ready(function(){
        
        $.get('{{ route("myCartPage.getCart-onLoad") }}', function(response){
			$('#cart').empty().append(response);
		});

        $('[data-countdown]').each(function() {
            var $this = $(this), finalDate = $(this).data('countdown');
            $this.countdown(finalDate, function(event) {
                $this.html(event.strftime('%D days %H:%M:%S'));
            });
        });

        $('.wishlist').click(function(e){
            e.preventDefault();
            var id = $(this).attr('data-id');
            $.ajax({
                url: "{{ route('product-view.add-to-wishlist') }}",
                type: "POST",   
                data: {
                "_token": "{{ csrf_token() }}",
                id: id,
                },
                success: function(data){
                    $('#show-wishlist-section').empty().append(data);
                },
                error: function(data){
                    alert('Unable to Add into Wishlist');
                }
            });
        });
    });
</script>

</body>
</html>