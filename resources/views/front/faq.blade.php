
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
        {{-- <link id="color_scheme" href="{{ asset('public/front/css/theme.css') }}" rel="stylesheet">  --}}
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
            <li><a href="#">Page</a></li>
            <li><a href="#">FAQ</a></li>
        </ul>
        
        <div class="row">
			<div id="content" class="col-sm-12">
				<div class="row">
					<div class="col-sm-12">
						<ul class="yt-accordion">
							<li class="accordion-group">
								<h3 class="accordion-heading"><i class="fa fa-plus-square"></i><span>Do you have a retail store? </span></h3>
								<div class="accordion-inner">
									<p>Yes, we have two retail stores. Our head office is in Lahore and another retail outlet is in Karachi. </p>
								</div>
							</li>
							<li class="accordion-group">
								<h3 class="accordion-heading"><i class="fa fa-plus-square"></i><span>Why do i need an account on this website?</span></h3>
								<div class="accordion-inner">
									<p>You need to sign up on our website so you can have easy access to all the records of the purchases that you have made.</p>
								</div>
							</li>
							<li class="accordion-group">
								<h3 class="accordion-heading"><i class="fa fa-plus-square"></i><span>Do I need to sign up before placing an order? </span></h3>
								<div class="accordion-inner" >
									<p>You can place an order as a guest too but we will always recommend you to sign up for having a better outlook at the history of your purchases and saved information for payment and delivery. </p>
								</div>
							</li>
							<li class="accordion-group">
								<h3 class="accordion-heading"><i class="fa fa-plus-square"></i><span>What payment methods can be used for my order?</span></h3>
								<div class="accordion-inner">
									<p>You can pay via BANK TRANSFER or CASH ON DELIVERY.</p>
								</div>
							</li>
							<li class="accordion-group">
								<h3 class="accordion-heading"><i class="fa fa-plus-square"></i><span>Do you offer cash on delivery?</span></h3>
								<div class="accordion-inner">
									<p>Yes, we offer cash on delivery. </p>
								</div>
							</li>
							<li class="accordion-group">
								<h3 class="accordion-heading"><i class="fa fa-plus-square"></i><span>Can I cancel my order after placing it? </span></h3>
								<div class="accordion-inner" >
									<p>You can cancel your order within 24 hours after confirmation if you change your mind or due to any other reason.</p>
								</div>
							</li>
							<li class="accordion-group">
								<h3 class="accordion-heading"><i class="fa fa-plus-square"></i><span>Do you ensure secure transactions?</span></h3>
								<div class="accordion-inner" >
									<p>Yes, we ensure that all payments made at our site will be 100% secured.</p>
								</div>
							</li>

							<li class="accordion-group">
								<h3 class="accordion-heading"><i class="fa fa-plus-square"></i><span>Why am I receiving emails from Pak Company? </span></h3>
								<div class="accordion-inner" >
									<p>If you provide your email during signing up or sign up to our newsletter, you will receive promotional emails. You can always unsubscribe if you are not interested.</p>
								</div>
							</li>
							<li class="accordion-group">
								<h3 class="accordion-heading"><i class="fa fa-plus-square"></i><span>What is a coupon code and where do I find it?</span></h3>
								<div class="accordion-inner" >
									<p>It is a discount or promotional code and if any promotion is going on which can help you in saving some money while placing an order, we will email this to you.</p>
								</div>
							</li>
							<li class="accordion-group">
								<h3 class="accordion-heading"><i class="fa fa-plus-square"></i><span>I have some more questions, where should i contact?</span></h3>
								<div class="accordion-inner" >
									<p>If you feel you have any question other than this, you can always email us on:
										pakcompany@hotmail.com 
										Or contact us on +92-321-678-8889
									</p>
								</div>
							</li>
						</ul>
					</div>
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
    
    <!-- Theme files -->
    
    <script type="text/javascript" src="{{ asset('public/front/js/themejs/application.js')}}"></script>
    
    <script type="text/javascript" src="{{ asset('public/front/js/themejs/homepage.js')}}"></script>
    
    <script type="text/javascript" src="{{ asset('public/front/js/themejs/toppanel.js')}}"></script>
    <script type="text/javascript" src="{{ asset('public/front/js/themejs/so_megamenu.js')}}"></script>
    <script type="text/javascript" src="{{ asset('public/front/js/themejs/addtocart.js')}}"></script> 
	<script src="{{ asset('public/front/js/popper.min.js')}}"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="{{ asset('public/front/js/custom.js')}}"></script> 
	<script>
        $(document).ready(function(e){
            // show cart items in header
			$.get('{{ route("myCartPage.getCart-onLoad") }}', function(response){
				$('#cart').empty().append(response);
			});
        });
    </script>
</body>
</html>