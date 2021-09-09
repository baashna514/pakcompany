
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
    <?php echo $__env->make('front.layout.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- //Header Container  -->
    
	<!-- Main Container  -->
	<div class="main-container container">
		<ul class="breadcrumb">
			<li><a href="#"><i class="fa fa-home"></i></a></li>
			<li><a href="#">Checkout</a></li>
			
		</ul>
		
		<div class="row">
			<form action="<?php echo e(route('checkout.place-order')); ?>" method="post" enctype="multipart/form-data">
				<?php echo csrf_field(); ?>
				<!--Middle Part Start-->
				<div id="content" class="col-sm-12">
				<h2 class="title">Checkout</h2>
				<div class="so-onepagecheckout row">
					<div class="col-left col-sm-3">
						<?php if(!Auth::user()): ?>
							<div class="panel panel-default">
								<div class="panel-heading">
								<h4 class="panel-title"><i class="fa fa-sign-in"></i> Create an Account or Login</h4>
								</div>
								<div class="panel-body">
									<div class="radio">
										<label>
										<input type="radio" checked="checked" value="guest" name="account">
										Guest Checkout</label>
									</div>
									<div class="radio">
										<label>
										<input type="radio" value="register" name="account">
										Register Account</label>
									</div>
								</div>
							</div>
						<?php endif; ?>	
					<div class="panel panel-default">
						<div class="panel-heading">
						<h4 class="panel-title"><i class="fa fa-user"></i> Your Personal Details</h4>
						</div>
						<div class="panel-body">
							<fieldset id="account">
								<div class="form-group required">
									<label for="input-payment-lastname" class="control-label">Full Name</label>
									<input type="text" class="form-control" id="input-payment-lastname" placeholder="Full Name" name="fullname" required>
								</div>
								<div class="form-group required">
									<label for="input-payment-email" class="control-label">E-Mail</label>
									<input type="email" class="form-control" id="input-payment-email" placeholder="E-Mail" name="email" required>
								</div>
								<div class="form-group required">
									<label for="input-payment-telephone" class="control-label">Phone</label>
									<input type="text" class="form-control" id="input-payment-telephone" placeholder="Phone" name="phone" required>
								</div>
								<div class="form-group required" id="password-div">
									<label for="password" class="control-label">Password</label>
									<input type="password" class="form-control" id="password" placeholder="Password" name="password">
								</div>
							</fieldset>
						</div>
					</div>
					<div class="panel panel-default">
						<div class="panel-heading">
						<h4 class="panel-title"><i class="fa fa-book"></i> Your Address</h4>
						</div>
						<div class="panel-body">
								<fieldset id="address" class="required">
								<div class="form-group">
									<label for="input-payment-company" class="control-label">Company</label>
									<input type="text" class="form-control" id="input-payment-company" placeholder="Company" name="company">
								</div>
								<div class="form-group required">
									<label for="input-payment-address-1" class="control-label">Address 1</label>
									<input type="text" class="form-control" id="input-payment-address-1" placeholder="Address 1" name="address_1" required>
								</div>
								<div class="form-group">
									<label for="input-payment-address-2" class="control-label">Address 2</label>
									<input type="text" class="form-control" id="input-payment-address-2" placeholder="Address 2" name="address_2">
								</div>
								<div class="form-group required">
									<label for="input-payment-city" class="control-label">City</label>
									<select name="city" id="city" class="form-control" required>
										<option disabled selected>--- Please Select ---</option>
										<option value="Islamabad">Islamabad</option>
										<option disabled>Punjab Cities</option>
										<option value="Ahmed Nager Chatha">Ahmed Nager Chatha</option>
										<option value="Ahmadpur East">Ahmadpur East</option>
										<option value="Ali Khan Abad">Ali Khan Abad</option>
										<option value="Alipur">Alipur</option>
										<option value="Arifwala">Arifwala</option>
										<option value="Attock">Attock</option>
										<option value="Bhera">Bhera</option>
										<option value="Bhalwal">Bhalwal</option>
										<option value="Bahawalnagar">Bahawalnagar</option>
										<option value="Bahawalpur">Bahawalpur</option>
										<option value="Bhakkar">Bhakkar</option>
										<option value="Burewala">Burewala</option>
										<option value="Chillianwala">Chillianwala</option>
										<option value="Chakwal">Chakwal</option>
										<option value="Chichawatni">Chichawatni</option>
										<option value="Chiniot">Chiniot</option>
										<option value="Chishtian">Chishtian</option>
										<option value="Daska">Daska</option>
										<option value="Dadiyal (A.K)">Dadiyal (A.K)</option>
										<option value="Darya Khan">Darya Khan</option>
										<option value="Dera Ghazi Khan">Dera Ghazi Khan</option>
										<option value="Dhaular">Dhaular</option>
										<option value="Dina">Dina</option>
										<option value="Dinga">Dinga</option>
										<option value="Dipalpur">Dipalpur</option>
										<option value="Faisalabad">Faisalabad</option>
										<option value="Ferozewala">Ferozewala</option>
										<option value="Fateh Jhang">Fateh Jang</option>
										<option value="Ghakhar Mandi">Ghakhar Mandi</option>
										<option value="Gojra">Gojra</option>
										<option value="Gujranwala">Gujranwala</option>
										<option value="Gujrat">Gujrat</option>
										<option value="Gujar Khan">Gujar Khan</option>
										<option value="Hafizabad">Hafizabad</option>
										<option value="Haroonabad">Haroonabad</option>
										<option value="Hasilpur">Hasilpur</option>
										<option value="Haveli Lakha">Haveli Lakha</option>
										<option value="Jatoi">Jatoi</option>
										<option value="Jalalpur">Jalalpur</option>
										<option value="Jattan">Jattan</option>
										<option value="Jampur">Jampur</option>
										<option value="Jaranwala">Jaranwala</option>
										<option value="Jhang">Jhang</option>
										<option value="Jhelum">Jhelum</option>
										<option value="Kalabagh">Kalabagh</option>
										<option value="Karor Lal Esan">Karor Lal Esan</option>
										<option value="Kasur">Kasur</option>
										<option value="Kamalia">Kamalia</option>
										<option value="Kamoke">Kamoke</option>
										<option value="Khanewal">Khanewal</option>
										<option value="Khanpur">Khanpur</option>
										<option value="Kharian">Kharian</option>
										<option value="Khushab">Khushab</option>
										<option value="Kot Addu">Kot Addu</option>
										<option value="Jauharabad">Jauharabad</option>
										<option value="Lahore">Lahore</option>
										<option value="Lalamusa">Lalamusa</option>
										<option value="Layyah">Layyah</option>
										<option value="Liaquat Pur">Liaquat Pur</option>
										<option value="Lodhran">Lodhran</option>
										<option value="Malakwal">Malakwal</option>
										<option value="Mamoori">Mamoori</option>
										<option value="Mailsi">Mailsi</option>
										<option value="Mandi Bahauddin">Mandi Bahauddin</option>
										<option value="Mian Channu">Mian Channu</option>
										<option value="Mianwali">Mianwali</option>
										<option value="Multan">Multan</option>
										<option value="Murree">Murree</option>
										<option value="Muridke">Muridke</option>
										<option value="Mianwali Bangla">Mianwali Bangla</option>
										<option value="Muzaffargarh">Muzaffargarh</option>
										<option value="Narowal">Narowal</option>
										<option value="Nankana Sahib">Nankana Sahib</option>
										<option value="Okara">Okara</option>
										<option value="Renala Khurd">Renala Khurd</option>
										<option value="Pakpattan">Pakpattan</option>
										<option value="Pattoki">Pattoki</option>
										<option value="Pir Mahal">Pir Mahal</option>
										<option value="Qaimpur">Qaimpur</option>
										<option value="Qila Didar Singh">Qila Didar Singh</option>
										<option value="Rabwah">Rabwah</option>
										<option value="Raiwind">Raiwind</option>
										<option value="Rajanpur">Rajanpur</option>
										<option value="Rahim Yar Khan">Rahim Yar Khan</option>
										<option value="Rawalpindi">Rawalpindi</option>
										<option value="Sadiqabad">Sadiqabad</option>
										<option value="Safdarabad">Safdarabad</option>
										<option value="Sahiwal">Sahiwal</option>
										<option value="Sangla Hill">Sangla Hill</option>
										<option value="Sarai Alamgir">Sarai Alamgir</option>
										<option value="Sargodha">Sargodha</option>
										<option value="Shakargarh">Shakargarh</option>
										<option value="Sheikhupura">Sheikhupura</option>
										<option value="Sialkot">Sialkot</option>
										<option value="Sohawa">Sohawa</option>
										<option value="Soianwala">Soianwala</option>
										<option value="Siranwali">Siranwali</option>
										<option value="Talagang">Talagang</option>
										<option value="Taxila">Taxila</option>
										<option value="Toba Tek Singh">Toba Tek Singh</option>
										<option value="Vehari">Vehari</option>
										<option value="Wah Cantonment">Wah Cantonment</option>
										<option value="Wazirabad">Wazirabad</option>
										<option disabled>Sindh Cities</option>
										<option value="Badin">Badin</option>
										<option value="Bhirkan">Bhirkan</option>
										<option value="Rajo Khanani">Rajo Khanani</option>
										<option value="Chak">Chak</option>
										<option value="Dadu">Dadu</option>
										<option value="Digri">Digri</option>
										<option value="Diplo">Diplo</option>
										<option value="Dokri">Dokri</option>
										<option value="Ghotki">Ghotki</option>
										<option value="Haala">Haala</option>
										<option value="Hyderabad">Hyderabad</option>
										<option value="Islamkot">Islamkot</option>
										<option value="Jacobabad">Jacobabad</option>
										<option value="Jamshoro">Jamshoro</option>
										<option value="Jungshahi">Jungshahi</option>
										<option value="Kandhkot">Kandhkot</option>
										<option value="Kandiaro">Kandiaro</option>
										<option value="Karachi">Karachi</option>
										<option value="Kashmore">Kashmore</option>
										<option value="Keti Bandar">Keti Bandar</option>
										<option value="Khairpur">Khairpur</option>
										<option value="Kotri">Kotri</option>
										<option value="Larkana">Larkana</option>
										<option value="Matiari">Matiari</option>
										<option value="Mehar">Mehar</option>
										<option value="Mirpur Khas">Mirpur Khas</option>
										<option value="Mithani">Mithani</option>
										<option value="Mithi">Mithi</option>
										<option value="Mehrabpur">Mehrabpur</option>
										<option value="Moro">Moro</option>
										<option value="Nagarparkar">Nagarparkar</option>
										<option value="Naudero">Naudero</option>
										<option value="Naushahro Feroze">Naushahro Feroze</option>
										<option value="Naushara">Naushara</option>
										<option value="Nawabshah">Nawabshah</option>
										<option value="Nazimabad">Nazimabad</option>
										<option value="Qambar">Qambar</option>
										<option value="Qasimabad">Qasimabad</option>
										<option value="Ranipur">Ranipur</option>
										<option value="Ratodero">Ratodero</option>
										<option value="Rohri">Rohri</option>
										<option value="Sakrand">Sakrand</option>
										<option value="Sanghar">Sanghar</option>
										<option value="Shahbandar">Shahbandar</option>
										<option value="Shahdadkot">Shahdadkot</option>
										<option value="Shahdadpur">Shahdadpur</option>
										<option value="Shahpur Chakar">Shahpur Chakar</option>
										<option value="Shikarpaur">Shikarpaur</option>
										<option value="Sukkur">Sukkur</option>
										<option value="Tangwani">Tangwani</option>
										<option value="Tando Adam Khan">Tando Adam Khan</option>
										<option value="Tando Allahyar">Tando Allahyar</option>
										<option value="Tando Muhammad Khan">Tando Muhammad Khan</option>
										<option value="Thatta">Thatta</option>
										<option value="Umerkot">Umerkot</option>
										<option value="Warah">Warah</option>
										<option disabled>Khyber Cities</option>
										<option value="Abbottabad">Abbottabad</option>
										<option value="Adezai">Adezai</option>
										<option value="Alpuri">Alpuri</option>
										<option value="Akora Khattak">Akora Khattak</option>
										<option value="Ayubia">Ayubia</option>
										<option value="Banda Daud Shah">Banda Daud Shah</option>
										<option value="Bannu">Bannu</option>
										<option value="Batkhela">Batkhela</option>
										<option value="Battagram">Battagram</option>
										<option value="Birote">Birote</option>
										<option value="Chakdara">Chakdara</option>
										<option value="Charsadda">Charsadda</option>
										<option value="Chitral">Chitral</option>
										<option value="Daggar">Daggar</option>
										<option value="Dargai">Dargai</option>
										<option value="Darya Khan">Darya Khan</option>
										<option value="Dera Ismail Khan">Dera Ismail Khan</option>
										<option value="Doaba">Doaba</option>
										<option value="Dir">Dir</option>
										<option value="Drosh">Drosh</option>
										<option value="Hangu">Hangu</option>
										<option value="Haripur">Haripur</option>
										<option value="Karak">Karak</option>
										<option value="Kohat">Kohat</option>
										<option value="Kulachi">Kulachi</option>
										<option value="Lakki Marwat">Lakki Marwat</option>
										<option value="Latamber">Latamber</option>
										<option value="Madyan">Madyan</option>
										<option value="Mansehra">Mansehra</option>
										<option value="Mardan">Mardan</option>
										<option value="Mastuj">Mastuj</option>
										<option value="Mingora">Mingora</option>
										<option value="Nowshera">Nowshera</option>
										<option value="Paharpur">Paharpur</option>
										<option value="Pabbi">Pabbi</option>
										<option value="Peshawar">Peshawar</option>
										<option value="Saidu Sharif">Saidu Sharif</option>
										<option value="Shorkot">Shorkot</option>
										<option value="Shewa Adda">Shewa Adda</option>
										<option value="Swabi">Swabi</option>
										<option value="Swat">Swat</option>
										<option value="Tangi">Tangi</option>
										<option value="Tank">Tank</option>
										<option value="Thall">Thall</option>
										<option value="Timergara">Timergara</option>
										<option value="Tordher">Tordher</option>
										<option disabled>Balochistan Cities</option>
										<option value="Awaran">Awaran</option>
										<option value="Barkhan">Barkhan</option>
										<option value="Chagai">Chagai</option>
										<option value="Dera Bugti">Dera Bugti</option>
										<option value="Gwadar">Gwadar</option>
										<option value="Harnai">Harnai</option>
										<option value="Jafarabad">Jafarabad</option>
										<option value="Jhal Magsi">Jhal Magsi</option>
										<option value="Kacchi">Kacchi</option>
										<option value="Kalat">Kalat</option>
										<option value="Kech">Kech</option>
										<option value="Kharan">Kharan</option>
										<option value="Khuzdar">Khuzdar</option>
										<option value="Killa Abdullah">Killa Abdullah</option>
										<option value="Killa Saifullah">Killa Saifullah</option>
										<option value="Kohlu">Kohlu</option>
										<option value="Lasbela">Lasbela</option>
										<option value="Lehri">Lehri</option>
										<option value="Loralai">Loralai</option>
										<option value="Mastung">Mastung</option>
										<option value="Musakhel">Musakhel</option>
										<option value="Nasirabad">Nasirabad</option>
										<option value="Nushki">Nushki</option>
										<option value="Panjgur">Panjgur</option>
										<option value="Pishin Valley">Pishin Valley</option>
										<option value="Quetta">Quetta</option>
										<option value="Sherani">Sherani</option>
										<option value="Sibi">Sibi</option>
										<option value="Sohbatpur">Sohbatpur</option>
										<option value="Washuk">Washuk</option>
										<option value="Zhob">Zhob</option>
										<option value="Ziarat">Ziarat</option>
									</select>
								</div>
								<div class="form-group required">
									<label for="input-payment-postcode" class="control-label">Post Code</label>
									<input type="text" class="form-control" id="input-payment-postcode" placeholder="Post Code" name="postcode" required>
								</div>
								
								<div class="form-group required">
									<label for="input-payment-country" class="control-label">Country</label>
									<select name="country" class="form-control">
										
										<option value="Pakistan">Pakistan</option>
										</select>
								</div>
								<div class="checkbox">
									<label>
									<input type="checkbox" checked="checked" value="1" name="shipping_address">
									My delivery and billing addresses are the same.</label>
								</div>
								</fieldset>
							</div>
					</div>
					</div>
					<div class="col-right col-sm-9">
					<div class="row">
						<div class="col-sm-12">
							<div class="panel panel-default no-padding">
								<div class="col-sm-6  checkout-payment-methods">
									<div class="panel-heading">
									<h4 class="panel-title"><i class="fa fa-credit-card"></i> Payment Method</h4>
									</div>
									<div class="panel-body">
										<p>Please select the preferred payment method to use on this order.</p>
										<div class="radio">
											<label><input type="radio" value="Cash on Delivery" checked="checked" name="payment_type">Cash On Delivery</label>
											<label><input type="radio" value="bank transfer" name="payment_type">Bank Transfer</label>
										</div>
										<div id="bank-section">
											<br>
											<p>Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won't be shipped until the funds have cleared in our account.</p>
											<h2>Our Bank Details</h2>
											<ul>
												<li>ACCOUNT NUMBER: 02070101767731</li>
												<li>NAME: Pak Company</li>
												<li>Bank Name: Meezan Bank</li>
											</ul>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-12">
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><i class="fa fa-ticket"></i> Do you Have a Coupon or Voucher?</h4>
								</div>
								<div class="panel-body row">
									<div class="col-sm-6 ">
										<div class="input-group">
											<input type="text" class="form-control" id="input-coupon" placeholder="Enter your coupon here" name="coupon">
											<span class="input-group-btn">
												<input type="button" class="btn btn-primary" data-loading-text="Loading..." id="button-coupon" value="Apply Coupon">
											</span>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-12">
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><i class="fa fa-shopping-cart"></i> Shopping cart</h4>
								</div>
								<div class="panel-body" id="checkoutPage-cartItems">
									
								</div>
							</div>
						</div>
						<div class="col-sm-12">
						<div class="panel panel-default">
							<div class="panel-heading">
							<h4 class="panel-title"><i class="fa fa-pencil"></i> Add Comments About Your Order</h4>
							</div>
							<div class="panel-body">
								<textarea rows="4" class="form-control" id="confirm_comment" name="comments"></textarea>
								<br>
								<label class="control-label" for="confirm_agree">
								<input type="checkbox" checked="checked" value="1" required="" class="validate required" id="confirm_agree" name="confirm agree">
								<span>I have read and agree to the <a class="agree" href="#"><b>Terms &amp; Conditions</b></a></span> </label>
								<div class="buttons">
								<div class="pull-right">
									<button type="submit" class="btn btn-primary" id="button-confirm">Confirm Order</button>
								</div>
								</div>
							</div>
						</div>
						</div>
					</div>
					</div>
				</div>
				</div>
				<!--Middle Part End -->
			</form>
		</div>
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
    
    <!-- Theme files -->
    
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
			// show cart items in header
			$.get('<?php echo e(route("myCartPage.getCart-onLoad")); ?>', function(response){
				$('#cart').empty().append(response);
			});

			$.get('<?php echo e(route("checkoutPage-cartItems.getItems-onLoad")); ?>', function(response){
				$('#checkoutPage-cartItems').empty().append(response);
				$('.total').text($('#total').val());
			});

			// $.get('<?php echo e(route("get-shipping-rate-by-weight")); ?>', function(data){
			// 	// alert(data);
			// 	// return;
			// 	var ship = $('#shipping_method').val(data);
			// 	var b = $('#sub-total').text();
			// 	var totalSum  = parseInt(data) + parseInt(b);
			// 	$('#total').text(totalSum);
			// });

			// var weight = $("#weight").val();
			// $.ajax({
			// 	url: "<?php echo e(route('get-shipping-rate-by-weight')); ?>",
			// 	type: "POST",   
			// 	data: {
			// 	"_token": "<?php echo e(csrf_token()); ?>",
			// 	weight: weight,
			// 	},
			// 	success: function(data){
			// 		alert(data);
			// 		return;
			// 		var ship = $('#shipping_method').val(data);
			// 		var b = $('#sub-total').text();
			// 		var totalSum  = parseInt(data) + parseInt(b);
			// 		$('#total').text(totalSum);
			// 	},
			// 	error: function(data){
			// 		alert('unable to pick shipping charges.....!');
			// 	}
			// });



			$('#bank-section').hide();
			$('input[name=payment_type]').change(function(){
				var value = $( 'input[name=payment_type]:checked' ).val();
				if(value == 'bank transfer'){
					$('#bank-section').show();
				}
				else{
					$('#bank-section').hide();
				}
			});

			$('#button-coupon').click(function(){
                 var val=$('#input-coupon').val();
                 $.ajax({
					url: "<?php echo e(route('apply.coupon')); ?>",
					type: "POST",   
					data: {
					"_token": "<?php echo e(csrf_token()); ?>",
					val: val,
					},
					success: function(data){
						data.percentage;
						var total  = $('$total').text();
						$('#total').text((total*data.percentage)/100);
						$('#total').val((total*data.percentage)/100);
						$("#button-coupon").attr("disabled", true);
					},
					error: function(data){
						alert('unable to apply Coupon!');
					}
				});
			});
			$('#password-div').hide();
			$('#login-div').hide();

			$('input[name=account]').change(function(){
				var value = $( 'input[name=account]:checked' ).val();
				if(value == 'register'){
					$('#password-div').show();
					$('#login-div').hide();
				}
				if(value == 'login'){
					$('#password-div').hide();
					$('#login-div').show();
				}
				if(value == 'guest'){
					$('#password-div').hide();
					$('#login-div').hide();
				}
			});

			// $('#type').change(function(){
			// 	var shipment = $('#type').val();
			// 	var weight = $('#weight').val();
			// 	var sub_total = $('#sub-total').text();
			// 	$.ajax({
			// 		url: "<?php echo e(route('get-shipping-rates')); ?>",
			// 		type: "POST",   
			// 		data: {
			// 		"_token": "<?php echo e(csrf_token()); ?>",
			// 		shipment: shipment,
			// 		weight: weight,
			// 		sub_total: sub_total,
			// 		},
			// 		success: function(data){
			// 			// alert(data);
			// 			var ship = $('#shipping_method').val(data);
			// 			var b = $('#sub-total').text();
			// 			var totalSum  = parseInt(data) + parseInt(b);
			// 			$('#total').text(totalSum);
			// 		},
			// 		error: function(data){
			// 			alert('unable to pick shipping charges.....!');
			// 		}
			// 	});
			// });

			// $('#city').change(function(){
			// 	var shipment = $('#type').val();
			// 	var weight = $('#weight').val();
			// 	var sub_total = $('#sub-total').text();
			// 	var city = $('#city').val();
			// 	$.ajax({
			// 		url: "<?php echo e(route('get-shipping-charges')); ?>",
			// 		type: "POST",   
			// 		data: {
			// 		"_token": "<?php echo e(csrf_token()); ?>",
			// 		city: city,
			// 		shipment: shipment,
			// 		weight: weight,
			// 		sub_total: sub_total,
			// 		},
			// 		success: function(data){
			// 			var ship = $('#shipping_method').val(data);
			// 			var b = $('#sub-total').text();
			// 			var totalSum  = parseInt(data) + parseInt(b);
			// 			$('#total').text(totalSum);
			// 		},
			// 		error: function(data){
			// 			alert('unable to pick shipping charges.....!');
			// 		}
			// 	});
			// });

		});
	</script>
		
</body>
</html><?php /**PATH C:\wamp64\www\pakcompany2\resources\views/front/checkout.blade.php ENDPATH**/ ?>