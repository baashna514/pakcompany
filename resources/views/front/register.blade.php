
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
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
         
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
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
			<li><a href="#">Register</a></li>
		</ul>
		
		<div class="row clearfix">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="card">
					<div class="" style="margin-bottom: 20px;">
						@include('admin.layout.messages')
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div id="content" class="col-sm-6" style="margin-left: 296px;">
				<h2 class="title">Register Account</h2>
				{{-- <p>If you already have an account with us, please login at the <a href="#">login page</a>.</p> --}}
				<div class="w3-bar w3-black">
    {{-- <button class="w3-bar-item w3-button tablink w3-red" onclick="openCity(event,'Vendor')">Vendor</button> --}}
    <button class="w3-bar-item w3-button tablink" onclick="openCity(event,'Customer')">Customer</button>
  </div>
  
  {{-- <div id="Vendor" class="w3-container w3-border city">
  
    <form action="{{route('user.register.create')}}" method="post"  enctype="multipart/form-data" class="form-horizontal account-register clearfix">
					@csrf
					<fieldset id="account">
						<legend>Your Personal Details</legend>
						<div class="form-group required" style="display: none;">
							<label class="col-sm-2 control-label">Customer Group</label>
							<div class="col-sm-10">
								<div class="radio">
									<label>
										<input type="radio" name="customer_group_id" value="1" checked="checked"> Default
									</label>
								</div>
							</div>
						</div>
						<div class="form-group required">
							<label class="col-sm-2 control-label" for="input-firstname">Full Name</label>
							<div class="col-sm-10">
								<input type="text" name="name" value="" placeholder="Full Name" id="input-firstname" class="form-control">
							</div>
						</div>
						<div class="form-group required">
							<label class="col-sm-2 control-label" for="input-lastname">Shop Name</label>
							<div class="col-sm-10">
								<input type="text" name="shop_name" value="" placeholder="Shop Name" id="input-lastname" class="form-control">
							</div>
						</div>
						<div class="form-group required">
							<label class="col-sm-2 control-label" for="input-email">E-Mail</label>
							<div class="col-sm-10">
								<input type="email" name="email" value="" placeholder="E-Mail" id="input-email" class="form-control">
							</div>
						</div>
						<div class="form-group required">
							<label class="col-sm-2 control-label" for="input-telephone">Telephone</label>
							<div class="col-sm-10">
								<input type="tel" name="phone" value="" placeholder="Telephone" id="input-telephone" class="form-control">
							</div>
						</div>
						<div class="form-group required">
							<label class="col-sm-2 control-label" for="input-lastname">Address</label>
							<div class="col-sm-10">
								<input type="text" name="address1" value="" placeholder="Address" id="input-lastname" class="form-control">
							</div>
						</div>
					     <div class="form-group required">
							<label class="col-sm-2 control-label" for="input-telephone">Cnic</label>
							<div class="col-sm-10">
								<input type="text" name="cnic" value="" placeholder="CNIC" class="form-control">
							</div>
						</div>
						 <div class="form-group required">
							<label class="col-sm-2 control-label" for="input-telephone">Cnic Front Image</label>
							<div class="col-sm-10">
								<input type="file" name="cnic_front_image"class="form-control">
							</div>
						</div>
						 <div class="form-group required">
							<label class="col-sm-2 control-label" for="input-telephone">Cnic Back Image</label>
							<div class="col-sm-10">
								<input type="file" name="cnic_back_image" class="form-control">
							</div>
						</div>
						 <div class="form-group required">
							<label class="col-sm-2 control-label" for="input-telephone">User Image</label>
							<div class="col-sm-10">
								<input type="file" name="user_image" class="form-control">
							</div>
						</div>
						<div class="form-group required">
							<label class="col-sm-2 control-label" for="input-telephone">Shop Logo</label>
							<div class="col-sm-10">
								<input type="file" name="shop_logo" class="form-control">
							</div>
						</div>
						<div class="form-group required">
							<label class="col-sm-2 control-label" for="input-password">Password</label>
							<div class="col-sm-10">
								<input type="password" name="password" value="" placeholder="Password" id="input-password" class="form-control">
							</div>
						</div>
						<div class="form-group required">
							<label class="col-sm-2 control-label" for="input-confirm">Password Confirm</label>
							<div class="col-sm-10">
								<input type="password" name="confirm" value="" placeholder="Password Confirm" id="input-confirm" class="form-control">
							</div>
						</div>
				  <input type="hidden" name="type" value="0">
					</fieldset>
					<div class="buttons">
						<div class="pull-right">I have read and agree to the <a href="{{route('terms')}}" class="agree"><b>Terms & Condition</b></a>
							<input class="box-checkbox" type="checkbox" name="agree" id="agree" value="1"> &nbsp;
							<input type="submit" id="registerButton"  value="Register" class="btn btn-primary">
						</div>
					</div>
				</form>
  </div> --}}

  <div id="Customer" class="w3-container w3-border city">
   
    <form action="{{route('user.register.create')}}" method="post"  enctype="multipart/form-data" class="form-horizontal account-register clearfix">
					@csrf
					<fieldset id="account">
						<legend>Customer Personal Details</legend>
						<div class="form-group required" style="display: none;">
							<label class="col-sm-2 control-label">Customer Group</label>
							<div class="col-sm-10">
								<div class="radio">
									<label>
										<input type="radio" name="customer_group_id" value="1" checked="checked"> Default
									</label>
								</div>
							</div>
						</div>
						<div class="form-group required">
							<label class="col-sm-2 control-label" for="input-firstname">Full Name</label>
							<div class="col-sm-10">
								<input type="text" name="name" value="" placeholder="First Name" id="input-firstname" class="form-control">
							</div>
						</div>
						{{-- <div class="form-group required">
							<label class="col-sm-2 control-label" for="input-lastname">Shop Name</label>
							<div class="col-sm-10">
								<input type="text" name="shop_name" value="" placeholder="Shop Name" id="input-lastname" class="form-control">
							</div>
						</div> --}}
						<div class="form-group required">
							<label class="col-sm-2 control-label" for="input-email">E-Mail</label>
							<div class="col-sm-10">
								<input type="email" name="email" value="" placeholder="E-Mail" id="input-email" class="form-control">
							</div>
						</div>
						<div class="form-group required">
							<label class="col-sm-2 control-label" for="input-telephone">Phone</label>
							<div class="col-sm-10">
								<input type="tel" name="phone" value="" placeholder="Phone" id="input-telephone" class="form-control">
							</div>
						</div>
						<div class="form-group required">
							<label class="col-sm-2 control-label" for="input-lastname">Address</label>
							<div class="col-sm-10">
								<input type="text" name="address1" value="" placeholder="Address" id="input-lastname" class="form-control">
							</div>
						</div>
					
						<div class="form-group required">
							<label class="col-sm-2 control-label" for="input-password">Password</label>
							<div class="col-sm-10">
								<input type="password" name="password" value="" placeholder="Password" id="input-password" class="form-control">
							</div>
						</div>
						<div class="form-group required">
							<label class="col-sm-2 control-label" for="input-confirm">Password Confirm</label>
							<div class="col-sm-10">
								<input type="password" name="confirm" value="" placeholder="Password Confirm" id="input-confirm" class="form-control">
							</div>
						</div>
					<input type="hidden" name="type" value="2">
					</fieldset>
					<div class="buttons">
						<div class="pull-right">							
							<input type="submit"  value="Register" class="btn btn-primary">
						</div>
					</div>
				</form>
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
    <!-- <script src="https://code.jquery.com/jquery-1.12.4.js"></script> -->
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script src="{{asset('public/front/js/custom.js')}}"></script>
    <script type="text/javascript" src="{{ asset('public/front/js/bootstrap/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('public/front/js/owl-carousel/owl.carousel.js')}}"></script>
    <script type="text/javascript" src="{{ asset('public/front/js/themejs/libs.js')}}"></script> 
    <script type="text/javascript" src="{{ asset('public/front/js/unveil/jquery.unveil.js')}}"></script>
    <script type="text/javascript" src="{{ asset('public/front/js/countdown/jquery.countdown.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('public/front/js/dcjqaccordion/jquery.dcjqaccordion.2.8.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('public/front/js/datetimepicker/moment.js')}}"></script>
    <script type="text/javascript" src="{{ asset('public/front/js/datetimepicker/bootstrap-datetimepicker.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('public/front/js/jquery-ui/jquery-ui.min.js')}}"></script>
	 <!-- Theme files -->
		<script type="text/javascript">
		$( document ).ready(function() {

           $("#registerButton").prop('disabled', true);
        
        $('#agree').click(function(){
           if($("#agree").prop('checked') == true){
           $("#registerButton").prop('disabled', false);
               
           }
           else{
             $("#registerButton").prop('disabled', true);

           }
           
        });
    });
	</script>
	<script>
function openCity(evt, cityName) {
  var i, x, tablinks;
  x = document.getElementsByClassName("city");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablink");
  for (i = 0; i < x.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" w3-red", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " w3-red";
}
</script>
	============================================ -->
	<script type="text/javascript" src="{{ asset('public/front/js/themejs/application.js')}}"></script>
    <script type="text/javascript" src="{{ asset('public/front/js/themejs/so_megamenu.js')}}"></script>
    <script type="text/javascript" src="{{ asset('public/front/js/themejs/addtocart.js')}}"></script> 
	
</body>
</html>