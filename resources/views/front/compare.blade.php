
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

<body class="res layout-1">
    
    <div id="wrapper" class="wrapper-fluid banners-effect-5">
    

    <!-- Header Container  -->
    @include('front.layout.header')
    <!-- //Header Container  -->
    
	<!-- Main Container  -->
	<div class="main-container container">
		<ul class="breadcrumb">
			<li><a href="#"><i class="fa fa-home"></i></a></li>
			<li><a href="#">Product Comparison</a></li>
			
		</ul>
		
		<div class="row">
			<!--Middle Part Start-->
			<div id="content" class="col-sm-12">
			  <h2 class="title">Product Comparison</h2>
			  <div class="table-responsive">
				<table class="table table-bordered table-hover">
				  <thead>
					<tr>
					  <td colspan="4"><strong>Product Details</strong></td>
					</tr>
				  </thead>
				  <tbody>
					<tr>
					  <td>Product</td>
					  <td><a href="product.html">Lorem ipsum dolor"</a></td>
					  <td><a href="product.html">Lorem ipsum dolor</a></td>
					  <td><a href="product.html">Lorem ipsum dolor</a></td>
					</tr>
					<tr>
					  <td>Image</td>
					  <td class="text-center"><img class="img-thumbnail" title="Laptop Silver black" alt="Laptop Silver black" width="100px" src="{{ asset('public/front/image/catalog/demo/product/270/1.jpg') }}"></td>
					  <td class="text-center"><img class="img-thumbnail" title=" Strategies for Acquiring Your Own Laptop " alt=" Strategies for Acquiring Your Own Laptop " width="100px" src="{{ asset('public/front/image/catalog/demo/product/270/2.jpg') }}"></td>
					  <td class="text-center"><img class="img-thumbnail" title="Aspire Ultrabook Laptop" alt="Aspire Ultrabook Laptop" width="100px" src="{{ asset('public/front/image/catalog/demo/product/270/3.jpg') }}"></td>
					</tr>
					<tr>
					  <td>Price</td>
					  <td><div class="price"><span class="price-new">$93.73</span> <span class="price-old">$84.36</span> </div></td>
					  <td><div class="price"> <span class="price-new">$45</span> <span class="price-old">$80</span></div></td>
					  <td><div class="price"><span class="price-new">$56</span> </div></td>
					</tr>
					<tr>
					  <td>Model</td>
					  <td>Pt 001</td>
					  <td>Pt 002</td>
					  <td>Pt 003</td>
					</tr>
					<tr>
					  <td>Brand</td>
					  <td>Apple</td>
					  <td>Apple</td>
					  <td>Apple</td>
					</tr>
					<tr>
					  <td>Availability</td>
					  <td>In Stock</td>
					  <td>In Stock</td>
					  <td>Pre-Order</td>
					</tr>
					<tr>
					  <td>Rating</td>
					  <td class="rating">
						<div class="rating-box">
						   <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
						   <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
						   <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
						   <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
						   <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
						</div>
						Based on 0 reviews.</td>
					  <td class="rating">
						<div class="rating-box">
						   <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
						   <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
						   <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
						   <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
						   <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
						</div>
						Based on 0 reviews.</td>
					  <td class="rating">
						<div class="rating-box">
						   <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
						    <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
						    <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
						   <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
						   <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
						</div>
						Based on 1 reviews.</td>
					</tr>
					<tr>
					  <td>Summary</td>
					  <td class="description">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat..</td>
					  <td class="description"> Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat..</td>
					  <td class="description">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat..</td>
					</tr>
					<tr>
					  <td>Weight</td>
					  <td>1.50kg</td>
					  <td>1.80kg</td>
					  <td>2.00kg</td>
					</tr>
					<tr>
					  <td>Dimensions (L x W x H)</td>
					  <td>0.00mm x 0.00mm x 0.00mm</td>
					  <td>0.00mm x 0.00mm x 0.00mm</td>
					  <td>0.00cm x 0.00cm x 0.00cm</td>
					</tr>
				  </tbody>
					<thead>
								<tr>
									<td colspan="4">
										<strong>Processor</strong>
									</td>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>Clockspeed</td>
									<td>100mhz</td>
									<td></td>
									<td></td>
								</tr>
							</tbody>
							<thead>
								<tr>
									<td colspan="4">
										<strong>Memory</strong>
									</td>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>test 1</td>
									<td></td>
									<td>Hammered metal outer - Semi-precious stone embellishments
</td>
									<td></td>
								</tr>
							
								<tr>
									<td>test 2</td>
									<td></td>
									<td>H: 11cm/4" W: 12cm/5" D: 5cm/2"
</td>
									<td></td>
								</tr>
							
								<tr>
									<td>test 3</td>
									<td></td>
									<td>Green - Black - Brown
</td>
									<td></td>
								</tr>
							
					<tr>
					  <td></td>
					  <td><input type="button" onClick="" class="btn btn-primary btn-block" value="Add to Cart">
						<a class="btn btn-danger btn-block" href="#">Remove</a></td>
					  <td><input type="button" onClick="" class="btn btn-primary btn-block" value="Add to Cart">
						<a class="btn btn-danger btn-block" href="#">Remove</a></td>
					  <td><input type="button" onClick="" class="btn btn-primary btn-block" value="Add to Cart">
						<a class="btn btn-danger btn-block" href="#">Remove</a></td>
					</tr>
				  </tbody>
				</table>
			  </div>
			</div>
			<!--Middle Part End -->
			
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
	<script>
		$(document).ready(function(){
			$.get('{{ route("myCartPage.getCart-onLoad") }}', function(response){
				$('#cart').empty().append(response);
			});
		});
	</script>
		
</body>
</html>