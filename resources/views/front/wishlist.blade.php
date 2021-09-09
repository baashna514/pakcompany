
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
        <link href="{{ asset('public/front/css/responsive.css') }}" rel="stylesheet">
    
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
    @include('front.layout.header')
    <!-- //Header Container  -->
    
	<!-- Main Container  -->
	<div class="main-container container">
		<ul class="breadcrumb">
			<li><a href="#"><i class="fa fa-home"></i></a></li>
			<li><a href="#">Account</a></li>
			<li><a href="#">My Wish List</a></li>
		</ul>
		
		<div class="row">
			<!--Middle Part Start-->
			<div id="content" class="col-sm-12">
				<h2 class="title">My Wish List</h2>
				<div class="table-responsive">
					<table class="table table-bordered table-hover">
						<thead>
							<tr>
								<td class="text-center">Image</td>
								<td class="text-left">Product Name</td>
								{{-- <td class="text-left">Model</td> --}}
								{{-- <td class="text-right">Stock</td> --}}
								<td class="text-right">Unit Price</td>
								<td class="text-right">Action</td>
							</tr>
						</thead>
						<tbody>
							@foreach($wishlist as $whishlists)
							<tr>
								<td class="text-center">
									<a  href="product.html"><img width="70px" src="{{asset('public/thumbnail').'/'.$whishlists->product->p_thumbnail}}" alt="Aspire Ultrabook Laptop" title="Aspire Ultrabook Laptop">
									</a>
								</td>
								<td class="text-left"><a href="product.html">{{$whishlists->product->name}}</a>
									<input type="hidden" id="product_id" name="" value="$whishlists->product->id">
									<input type="hidden" id="product_price" name="" value ="$whishlists->product->price">
								</td>
								{{-- <td class="text-left">Pt 001</td> --}}
								{{-- <td class="text-right">In Stock</td> --}}
								<td class="text-right">
									<div class="price"><span class="new-price">{{$whishlists->product->price}}</span></div>
								
								</td>
								<td class="text-right">
									<button class="btn btn-primary" id="button-cart"
									title="" data-toggle="tooltip"
									onclick="cart.add('48');"
									type="button" data-original-title="Add to Cart"><i class="fa fa-shopping-cart"></i>
									</button>
									<a class="btn btn-danger" title="" data-toggle="tooltip" href="{{route('remove.wishlist',$whishlists->id)}}" data-original-title="Remove"><i class="fa fa-times"></i></a>
								</td>
							</tr>
							@endforeach
							
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	<!-- //Main Container -->
	
	<!-- Footer Container -->
    @include('front.layout.footer')
    <!-- //end Footer Container -->

    </div>
	
	
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
    <script type="text/javascript" src="{{ asset('public/front/js/minicolors/jquery.miniColors.min.js')}}"></script>
    
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
		});
	</script>	
</body>
</html>