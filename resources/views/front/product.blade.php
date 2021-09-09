
<!DOCTYPE html>
<html lang="en">
    <head>
    
        @include('front.layout.meta')
        
       
        <!-- Libs CSS
        ============================================ -->
        <link rel="stylesheet" href="{{ asset('public/front/css/bootstrap/css/bootstrap.min.css') }}">
        <link href="{{ asset('public/front/css/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
        <link href="{{ asset('public/front/js/datetimepicker/bootstrap-datetimepicker.min.css') }}" rel="stylesheet">
        <link href="{{ asset('public/front/js/owl-carousel/owl.carousel.css') }}" rel="stylesheet">
        <link href="{{ asset('public/front/css/themecss/lib.css') }}" rel="stylesheet">
        <link href="{{ asset('public/front/js/jquery-ui/jquery-ui.min.css') }}" rel="stylesheet">
        <link href="{{ asset('public/front/js/minicolors/miniColors.css') }}" rel="stylesheet">
        
        <!-- Theme CSS
        ============================================ -->
        <link href="{{ asset('public/front/css/themecss/so_searchpro.css') }}" rel="stylesheet">
        <link href="{{ asset('public/front/css/themecss/so_megamenu.css') }}" rel="stylesheet">
        <link href="{{ asset('public/front/css/themecss/so-categories.css') }}" rel="stylesheet">
        <link href="{{ asset('public/front/css/themecss/so-listing-tabs.css') }}" rel="stylesheet">
        <link href="{{ asset('public/front/css/themecss/so-newletter-popup.css') }}" rel="stylesheet">
    
        <link href="{{ asset('public/front/css/footer/footer1.css') }}" rel="stylesheet">
        <link href="{{ asset('public/front/css/header/header4.css') }}" rel="stylesheet">
        <link id="color_scheme" href="{{ asset('public/front/css/theme.css') }}" rel="stylesheet"> 
        <link id="color_scheme" href="{{ asset('public/front/css/home4.css') }}" rel="stylesheet">
        <link href="{{ asset('public/front/css/responsive.css')}}" rel="stylesheet">
    
         <!-- Google web fonts
        ============================================ -->
        <link href='https://fonts.googleapis.com/css?family=Roboto:300,400,400i,500,500i,700' rel='stylesheet' type='text/css'>
        <style type="text/css">
             body{font-family:'Roboto', sans-serif}
        </style>

        <style>
            @import url(https://fonts.googleapis.com/css?family=Oswald:400,300);
            @import url(https://fonts.googleapis.com/css?family=Open+Sans);
body
{
font-family: 'Open Sans', sans-serif;
}
img {
    border: 0 none;
    box-sizing: border-box;
    height: auto;
    max-width: 100%;
    vertical-align: middle;
}
.uk-input-group {
    border-collapse: separate;
    position: relative;
}
textarea:focus{
    border-color: #0c8d4d !important; 
}
.left-content-product .content-product-right .product-box-desc .inner-box-desc{
    line-height: 2.4;
}
.left-content-product .content-product-right .product-box-desc{
    padding: 10px 20px;
    color: #705a55;
    background: #ffffff;
}

</style>

    
    </head>

<body class="res layout-subpage layout-1 banners-effect-5">
    <div id="wrapper" class="wrapper-fluid">
    <!-- Header Container  -->
    @include('front.layout.header')
    <!-- //Header Container  -->

	<!-- Main Container  -->
	<div class="main-container container">
		<ul class="breadcrumb">
		</ul>
		<div class="row">
			<!--Middle Part Start-->
			<div id="content" class="col-md-9 col-sm-8">
				<div class="product-view row">
					<div class="left-content-product">
						<div class="content-product-left class-honizol col-md-5 col-sm-12 col-xs-12">
							<div class="large-image">
                                @if ($product->integration_id)
                                    <img itemprop="image" class="product-image-zoom" src="{{ $product->p_thumbnail }}" data-zoom-image="{{ $product->p_thumbnail }}" title="{{$product->name}}" alt="{{$product->name}}">
                                @else
                                    <img itemprop="image" class="product-image-zoom" src="{{ asset('public/thumbnail').'/'.$product->p_thumbnail }}" data-zoom-image="{{ asset('public/thumbnail').'/'.$product->p_thumbnail }}" title="{{$product->name}}" alt="{{$product->name}}">
                                @endif
							</div>
							<div id="thumb-slider" class="yt-content-slider full_slider owl-drag" data-rtl="yes" data-autoplay="no" data-autoheight="no" data-delay="4" data-speed="0.6" data-margin="10" data-items_column0="4" data-items_column1="3" data-items_column2="4"  data-items_column3="1" data-items_column4="1" data-arrows="yes" data-pagination="no" data-lazyload="yes" data-loop="no" data-hoverpause="yes">
                                @foreach ($product->gallery as $key=>$gallery)
                                    @if ($product->integration_id)
                                        <a data-index="{{ $key }}" class="img thumbnail " data-image="{{ $gallery->path }}">
                                            <img src="{{ $gallery->path }}" alt="Loading image">
                                        </a>
                                    @else
                                        <a data-index="{{ $key }}" class="img thumbnail " data-image="{{ asset('public/gallery').'/'.$gallery->image }}">
                                            <img src="{{ asset('public/gallery').'/'.$gallery->image }}" alt="Loading image">
                                        </a>
                                    @endif
								@endforeach
							</div>
						</div>
						<div class="content-product-right col-md-7 col-sm-12 col-xs-12">
							<div class="title-product">
								<h1>{{ $product->name }}</h1>
							</div>
                            <div class="">
                                By <span style="font-weight: 600;">Pak Company Publishers</span>
                            </div>
                            <div class="">
                                    @if ($product->stock == false)
                                        <span class="text-danger stock-status">Out of Stock</span>
                                    @endif
                            </div>
							<div class="product-label form-group">
								@if ($product->product_size)
									<div class="product_page_price price" itemprop="offerDetails" itemscope="" itemtype="http://data-vocabulary.org/Offer">
									</div>
								@endif
							</div>
							<div class="product-box-desc">
								<div class="inner-box-desc">
                                    {!! str_replace("daraz","MyDokkan", $product->p_detail) !!}
								</div>
							</div>
							<div id="product">
								<span class="price-new p-price" name="{{ $product->price }}" itemprop="price" style="font-size: 20px; font-weight: bolder;margin-bottom:10px;">Rs. {{ $product->price }} - PKR</span>
								@if (count($product->color_product) > 0)
									<div class="image_option_type form-group required">
										<label class="control-label">Colors</label>
										<ul class="product-options clearfix">
											@foreach ($product->color_product as $color)
											@php
												$col = \App\Color::find($color->color_id);
											@endphp
												<li class="radio">
													<label>
														<input class="image_radio" type="radio" name="option[]" value="{{ $col->code }}"> 
														<span style="background: {{ $col->code }}" class="img-thumbnail icon icon-color"></span><i class="fa fa-check"></i>
														<label> </label>
													</label>
												</li>
											@endforeach
										</ul>
									</div>
								@endif
								@foreach ($product->product_size as $row)
									@if (json_decode($row->size) != NULL)
										<div class="image_option_type form-group required">
											<label class="control-label">Size</label>
											<ul class="product-options clearfix">
												<select name="size" id="size" class="form-control" style="width: 52%;" required>
													<option disabled selected>Choose Size</option>
													@foreach (json_decode($row->size) as $size)
														<option value="{{ $size }}">{{ $size }}</option>
													@endforeach
												</select>
											</ul>
										</div>
									@endif
								@endforeach
								<div class="form-group box-info-product" style="margin-top: 15px;">
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
												<a class="icon" data-id="{{$product->id}}" id="btn-wishlist" title="Add to Wish List"><i class="fa fa-heart"></i>
												</a>
											</li>
											<li><a href="https://wa.me/923334210917/?text=Hi..! How may i help you?" style="padding: 0px 0px;"><img src="https://image.similarpng.com/very-thumbnail/2020/05/WhatsApp-icon-PNG.png" alt="" style="width: 41px;"></a></li>
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
					@if($relatedProduct)
                    @foreach($relatedProduct as $data)
                    <div class="item">
                        <div class="item-inner product-layout transition product-grid">
                            <div class="product-item-container">
                                <div class="left-block" style="height: 560px !important;">
                                    <div class="product-image-container second_img">
                                        <a href="{{ route('product', ['id'=>($data->id)]) }}" target="_self" title="{{$data->name}}">
                                            @if ($data->integration_id)
                                                <img src="{{ $data->p_thumbnail }}" class="img-responsive" alt="{{$data->name}}">
                                            @else
                                                <img src="{{ asset('public/thumbnail').'/'.$data->p_thumbnail }}" class="img-responsive" alt="{{$data->name}}">
                                            @endif
                                        </a>
                                    </div>
                                    <div class="button-group so-quickview cartinfo--left">
                                        <a href="" data-id="{{$data->id}}" type="button" class="addToCartRelated btn-button" title="Add to cart"><i class="fa fa-shopping-cart"></i><span>Add to Cart</span>
                                        </a>
                                        <button type="button" class="wishlist btn-button" title="Add to Wish List"><i class="fa fa-heart"></i><span>Add to Wish List</span>
                                        </button>
                                        <!--quickview-->                                                      
                                        <a class="iframe-link btn-button quickview quickview_handler visible-lg" href="{{ route('quick-view', ['id' => $data->id]) }}" title="Quick view" data-fancybox-type="iframe"><i class="fa fa-eye"></i><span>Quick view</span></a>                                                        
                                        <!--end quickview-->
                                    </div>
                                </div>
                                <div class="right-block">
                                    <div class="caption">
                                        <div class="rating">    
                                            @if (($data->p_quantity) <= 0)
                                                <h5 class="text-danger stockRelated">Out of Stock</h5>
                                            @endif
                                        </div>
                                        <h4><a href="{{ route('product', ['id'=>($data->id)]) }}" title="{{$data->name}}" target="_self">{{$data->name}}</a></h4>
                                        <div class="price" data-id="{{$data->price}}">Rs. {{$data->price}}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @endif
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
        @include('front.layout.footer')
        <!-- //end Footer Container -->

    </div>

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
	<!-- Theme files
	============================================ -->
	<script type="text/javascript" src="{{ asset('public/front/js/themejs/homepage.js')}}"></script>
	<script type="text/javascript" src="{{ asset('public/front/js/themejs/so_megamenu.js')}}"></script>
	<script type="text/javascript" src="{{ asset('public/front/js/themejs/addtocart.js')}}"></script>
	<script type="text/javascript" src="{{ asset('public/front/js/themejs/application.js')}}"></script>
    {{-- <script src="{{ asset('public/front/js/custom.js')}}"></script> --}}

    <script>
        $(document).ready(function(){
            $('#cart').on('click', '.delete-header-cart-item', function(e){
                e.preventDefault();
                var id = $(this).attr('data-id');
                $.ajax({
                    url: '{{ route("header-cart-items.cartItemDeleteItem") }}',
                    method: "DELETE",
                    data: {_token: '{{ csrf_token() }}', id: id},
                    success: function (response) {
                        alert('Product removed from cart.');
                        $('#cart').empty().append(response);
                        $('.total').text($('#total').val());
                        $("#checkoutPage-cartItems").load(location.href + " #checkoutPage-cartItems");
                        $(".table-responsive").load(location.href + " .table-responsive");
                        $.get('{{ route("checkoutPage-cartItems.getItems-onLoad") }}', function(response){
                            $('#checkoutPage-cartItems').empty().append(response);
                            $('.total').text($('#total').val());
                        });
                    },
                    error: function(data){
                        alert('Unable to Delete.');
                    }
                });
            });

            $('.product-image-zoom').click(false);
            $('#btn-wishlist').click(function(e){
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
            $('#size').change(function(e){
                var size = $('#size').val();
                var id = '{{$product->id}}';
                $.ajax({
                    url: "{{ route('product-view.get-size-price') }}",
                    type: "POST",   
                    data: {
                    "_token": "{{ csrf_token() }}",
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
			$.get('{{ route("myCartPage.getCart-onLoad") }}', function(response){
				$('#cart').empty().append(response);
			});

            $('#addToCartRelated').click(function(e){
                e.preventDefault();
                var stock = $('.stockRelated').text();
                if(stock == 'Out of Stock'){
                    alert('Product is out of stock');
                    return;
                }

            });

            $('#button-cart').click(function(e){
                e.preventDefault();
                var stock = $('.stock-status').text();
                if(stock == 'Out of Stock'){
                    alert('Product is out of stock');
                    return;
                }
                var product_id = '{{ $product->id }}';
                var p_type = '{{$product->p_type}}';
                var quantity = $('#quantity').val();
                var price = $('.p-price').attr('name');
                if(p_type == 'simple product'){
                    var size = 'Default Size';
                    if('{{ count($product->color_product) <= 0 }}'){
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
                    url: "{{ route('add-to-cart') }}",
                    type: "POST",   
                    data: {
                    "_token": "{{ csrf_token() }}",
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
</body>
</html>