
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
        <link href="{{asset('public/admin/plugins/file-upload/file-upload-with-preview.min.css')}}" rel="stylesheet" type="text/css" />
    
         <!-- Google web fonts
        ============================================ -->
        <link href='https://fonts.googleapis.com/css?family=Roboto:300,400,400i,500,500i,700' rel='stylesheet' type='text/css'>
        <style type="text/css">
            body{font-family:'Roboto', sans-serif}
            input[type="radio"][id^="myradio"]{
                display: none;
            }
            label {
                border: 1px solid #fff;
                padding: 10px;
                display: block;
                position: relative;
                margin: 10px;
                cursor: pointer;
                -webkit-touch-callout: none;
                -webkit-user-select: none;
                -khtml-user-select: none;
                -moz-user-select: none;
                -ms-user-select: none;
                user-select: none;
            }
            label::before {
                background-color: white;
                color: white;
                content: " ";
                display: block;
                border-radius: 50%;
                border: 1px solid grey;
                position: absolute;
                top: -5px;
                left: -5px;
                width: 25px;
                height: 25px;
                text-align: center;
                line-height: 28px;
                transition-duration: 0.4s;
                transform: scale(0);
            }
            label img {
                transition-duration: 0.2s;
                transform-origin: 50% 50%;
            }
            :checked+label {
                border-color: #ddd;
            }
            :checked+label::before {
                content: "✓";
                background-color: grey;
                transform: scale(1);
            }
            :checked+label img {
                transform: scale(0.9);
                box-shadow: 0 0 5px #333;
                z-index: -1;
            }
            .form-line label{
                border: none;
                font-size: 14px;
            }
            label.claim{
                border: none;
                margin: 0px;
                padding: 0px;
            }
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
			<li><a href="#">My Account</a></li>
		</ul>
        @php
            if(Auth::user()){
                $wallet = \App\Wallet::with('wallet_transactions')->where('user_id', Auth::user()->id)->first();
            }
            else{
                $wallet = NULL;
            }
        @endphp
		<div class="row">			
            <div id="content" class="col-sm-12 item-article">
                <div class="row box-1-about">
                    <div class="col-md-12 welcome-about-us">
                        <div class="title-about-us">
                            <h2>My Account</h2>
                        </div>
                        <div class="">
                            @include('admin.layout.messages')
                        </div>
                        <div class="col-lg-12"></div>
                        <div class="col-lg-12"></div>
                        <div class="content-about-us">
                            <!--Tabs Part Start-->
                            <ul class="nav nav-tabs">
                                <li class="active"><a data-toggle="tab" href="#tab-3">My Wallet</a>
                                </li>
                                <li><a data-toggle="tab" href="#tab-1">Wallet Transactions</a>
                                </li>
                                <li><a data-toggle="tab" href="#tab-2">Claims</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="tab-3">
                                    <div class="row" style="text-align: center;">
                                        <div class="col-lg-12">
                                            <p>
                                                Available balance
                                            </p>
                                            <p>
                                                @if ($wallet)
                                                <h3>{{ $wallet->balance }} - PKR</h3>
                                                @else
                                                <h3>0 - PKR</h3> 
                                                @endif
                                            </p>
                                            <p>
                                                <a href="#" id="btn-deposit" class="btn btn-primary">Deopsit</a>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row" id="deposit-row">
                                        <div class="row payment-icons" style="text-align: center;">
                                            <div class="col-lg-4"></div>
                                            <div class="col-lg-1">
                                                <input type="radio" value="jazzcash" id="myradio1" name="payment_method[]" />
                                                <label for="myradio1"><img id="jazzcash" src="{{ asset('public/admin/images/payment-methods/jazzcash.png') }}" alt="" style="width: 100px;"></label>
                                            </div>
                                            <div class="col-lg-1">
                                                <input type="radio" value="mastercard" id="myradio2" name="payment_method[]"/>
                                                <label for="myradio2"><img id="mastercard" src="{{ asset('public/admin/images/payment-methods/mastercard.jpg') }}" alt="" style="width: 100px;"></label>
                                            </div>
                                            <div class="col-lg-1">
                                                <input type="radio" value="paypal" id="myradio3" name="payment_method[]"/>
                                                <label for="myradio3"><img id="paypal" src="{{ asset('public/admin/images/payment-methods/paypal.jpg') }}" alt="" style="width: 100px;"></label>
                                            </div>
                                            <div class="col-lg-1">
                                                <input type="radio" value="visa" id="myradio4" name="payment_method[]"/>
                                                <label for="myradio4"><img id="visa" src="{{ asset('public/admin/images/payment-methods/visa.webp') }}" alt="" style="width: 100px;"></label>
                                            </div>
                                            <div class="col-lg-4"></div>
                                        </div>
                                        <div class="row" style="margin-left: 0px;margin-right: 0px;padding:10px">
                                            <div class="col-lg-12">
                                                <div class="row" id="jazzcash-row" style="background: #f4f4f5ad;border-radius: 4px;padding: 15px;">
                                                    <form action="{{ route('wallet.add-balance-to-wallet') }}" method="post">
                                                        @csrf
                                                        <input type="hidden" class="type" name="type">
                                                        <div class="col-lg-4">
                                                            <div class="form-group">
                                                                <div class="form-line">
                                                                    <label for="amount">Amount</label>
                                                                    <input type="number" name="amount" class="form-control" placeholder="enter amount"/>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <div class="form-group">
                                                                <div class="form-line">
                                                                    <label for="jazzcash_number">Jazz Cash Number</label>
                                                                    <input type="number" name="jazzcash_number" class="form-control" placeholder="enter jazz cash number"/>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <div class="form-group">
                                                                <div class="form-line">
                                                                    <label for="cnic_number">CNIC Number</label>
                                                                    <input type="number" name="cnic_number" class="form-control" placeholder="enter CNIC number"/>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <button type="submit" class="btn btn-primary btn-submit" style="margin-left: 15px;">Submit</button>
                                                    </form>
                                                </div>
                                                <div class="row" id="mastercard-row" style="background: #f4f4f5ad;border-radius: 4px;padding: 15px;">
                                                    <form action="{{ route('wallet.add-balance-to-wallet') }}" method="post">
                                                        @csrf
                                                        <input type="hidden" class="type" name="type">
                                                        <div class="col-lg-2">
                                                            <div class="form-group">
                                                                <div class="form-line">
                                                                    <label for="amount">Amount</label>
                                                                    <input type="number" name="amount" class="form-control" placeholder="enter amount"/>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <div class="form-group">
                                                                <div class="form-line">
                                                                    <label for="card_number">Card Number</label>
                                                                    <input type="number" name="card_number" class="form-control" placeholder="enter card number"/>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-2">
                                                            <div class="form-group">
                                                                <div class="form-line">
                                                                    <label for="exp_month">Expiry Month</label>
                                                                    <select name="exp_month" class="form-control">
                                                                        <option >Choose Month</option>
                                                                        <option value="01">01</option>
                                                                        <option value="02">02</option>
                                                                        <option value="03">03</option>
                                                                        <option value="04">04</option>
                                                                        <option value="05">05</option>
                                                                        <option value="06">06</option>
                                                                        <option value="07">07</option>
                                                                        <option value="08">08</option>
                                                                        <option value="09">09</option>
                                                                        <option value="10">10</option>
                                                                        <option value="11">11</option>
                                                                        <option value="12">12</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-2">
                                                            <div class="form-group">
                                                                <div class="form-line">
                                                                    <label for="exp_year">Expiry Year</label>
                                                                    <select name="exp_year" class="form-control">
                                                                        <option>Choose Year</option>
                                                                        <option value="2020">2020</option>
                                                                        <option value="2021">2021</option>
                                                                        <option value="2022">2022</option>
                                                                        <option value="2023">2023</option>
                                                                        <option value="2024">2024</option>
                                                                        <option value="2025">2025</option>
                                                                        <option value="2026">2026</option>
                                                                        <option value="2027">2027</option>
                                                                        <option value="2028">2028</option>
                                                                        <option value="2029">2029</option>
                                                                        <option value="2030">2030</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-2">
                                                            <div class="form-group">
                                                                <div class="form-line">
                                                                    <label for="csc">CSC</label>
                                                                    <input type="number" name="csc" class="form-control" placeholder="enter CSC"/>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <div class="form-line">
                                                                    <label for="f_name">First Name</label>
                                                                    <input type="number" name="f_name" class="form-control" placeholder="enter CSC"/>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <div class="form-line">
                                                                    <label for="l_name">Last Name</label>
                                                                    <input type="number" name="l_name" class="form-control" placeholder="enter CSC"/>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <button type="submit" class="btn btn-primary btn-submit" style="margin-left: 15px;">Submit</button>
                                                    </form>
                                                </div>
                                                <div class="row" id="paypal-row" style="background: #f4f4f5ad;border-radius: 4px;padding: 15px;">
                                                    <form action="{{ route('wallet.add-balance-to-wallet') }}" method="post">
                                                        @csrf
                                                        <input type="hidden" class="type" name="type">
                                                        <div class="col-lg-2">
                                                            <div class="form-group">
                                                                <div class="form-line">
                                                                    <label for="amount">Amount</label>
                                                                    <input type="number" name="amount" class="form-control" placeholder="enter amount"/>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <div class="form-group">
                                                                <div class="form-line">
                                                                    <label for="card_number">Card Number</label>
                                                                    <input type="number" name="card_number" class="form-control" placeholder="enter card number"/>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-2">
                                                            <div class="form-group">
                                                                <div class="form-line">
                                                                    <label for="exp_month">Expiry Month</label>
                                                                    <select name="exp_month" class="form-control">
                                                                        <option>Choose Month</option>
                                                                        <option value="01">01</option>
                                                                        <option value="02">02</option>
                                                                        <option value="03">03</option>
                                                                        <option value="04">04</option>
                                                                        <option value="05">05</option>
                                                                        <option value="06">06</option>
                                                                        <option value="07">07</option>
                                                                        <option value="08">08</option>
                                                                        <option value="09">09</option>
                                                                        <option value="10">10</option>
                                                                        <option value="11">11</option>
                                                                        <option value="12">12</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-2">
                                                            <div class="form-group">
                                                                <div class="form-line">
                                                                    <label for="exp_year">Expiry Year</label>
                                                                    <select name="exp_year" class="form-control">
                                                                        <option>Choose Year</option>
                                                                        <option value="2020">2020</option>
                                                                        <option value="2021">2021</option>
                                                                        <option value="2022">2022</option>
                                                                        <option value="2023">2023</option>
                                                                        <option value="2024">2024</option>
                                                                        <option value="2025">2025</option>
                                                                        <option value="2026">2026</option>
                                                                        <option value="2027">2027</option>
                                                                        <option value="2028">2028</option>
                                                                        <option value="2029">2029</option>
                                                                        <option value="2030">2030</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-2">
                                                            <div class="form-group">
                                                                <div class="form-line">
                                                                    <label for="csc">CSC</label>
                                                                    <input type="number" name="csc" class="form-control" placeholder="enter CSC"/>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <div class="form-line">
                                                                    <label for="f_name">First Name</label>
                                                                    <input type="number" name="f_name" class="form-control" placeholder="enter CSC"/>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <div class="form-line">
                                                                    <label for="l_name">Last Name</label>
                                                                    <input type="number" name="l_name" class="form-control" placeholder="enter CSC"/>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <button type="submit" class="btn btn-primary btn-submit" style="margin-left: 15px;">Submit</button>
                                                    </form>
                                                </div>
                                                <div class="row" id="visa-row" style="background: #f4f4f5ad;border-radius: 4px;padding: 15px;">
                                                    <form action="{{ route('wallet.add-balance-to-wallet') }}" method="post">
                                                        @csrf
                                                        <input type="hidden" class="type" name="type">
                                                        <div class="col-lg-2">
                                                            <div class="form-group">
                                                                <div class="form-line">
                                                                    <label for="amount">Amount</label>
                                                                    <input type="number" name="amount" class="form-control" placeholder="enter amount"/>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <div class="form-group">
                                                                <div class="form-line">
                                                                    <label for="card_number">Card Number</label>
                                                                    <input type="number" name="card_number" class="form-control" placeholder="enter card number"/>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-2">
                                                            <div class="form-group">
                                                                <div class="form-line">
                                                                    <label for="exp_month">Expiry Month</label>
                                                                    <select name="exp_month" class="form-control">
                                                                        <option>Choose Month</option>
                                                                        <option value="01">01</option>
                                                                        <option value="02">02</option>
                                                                        <option value="03">03</option>
                                                                        <option value="04">04</option>
                                                                        <option value="05">05</option>
                                                                        <option value="06">06</option>
                                                                        <option value="07">07</option>
                                                                        <option value="08">08</option>
                                                                        <option value="09">09</option>
                                                                        <option value="10">10</option>
                                                                        <option value="11">11</option>
                                                                        <option value="12">12</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-2">
                                                            <div class="form-group">
                                                                <div class="form-line">
                                                                    <label for="exp_year">Expiry Year</label>
                                                                    <select name="exp_year" class="form-control">
                                                                        <option>Choose Year</option>
                                                                        <option value="2020">2020</option>
                                                                        <option value="2021">2021</option>
                                                                        <option value="2022">2022</option>
                                                                        <option value="2023">2023</option>
                                                                        <option value="2024">2024</option>
                                                                        <option value="2025">2025</option>
                                                                        <option value="2026">2026</option>
                                                                        <option value="2027">2027</option>
                                                                        <option value="2028">2028</option>
                                                                        <option value="2029">2029</option>
                                                                        <option value="2030">2030</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-2">
                                                            <div class="form-group">
                                                                <div class="form-line">
                                                                    <label for="csc">CSC</label>
                                                                    <input type="number" name="csc" class="form-control" placeholder="enter CSC"/>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <div class="form-line">
                                                                    <label for="f_name">First Name</label>
                                                                    <input type="number" name="f_name" class="form-control" placeholder="enter CSC"/>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <div class="form-line">
                                                                    <label for="l_name">Last Name</label>
                                                                    <input type="number" name="l_name" class="form-control" placeholder="enter CSC"/>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <button type="submit" class="btn btn-primary btn-submit" style="margin-left: 15px;">Submit</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="tab-1">
                                    <div class="overflow-owl-slider1">
                                        <div class="wrapper-owl-slider1">
                                            <div class="row slider-ourmember">
                                                <div class="item-about col-lg-12 col-md-12 col-sm-12">
                                                    <div class="item respl-item">
                                                        <div class="table-responsive">
                                                            <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                                                <thead>
                                                                    <tr>
                                                                        <th>SR#</th>
                                                                        <th>Date</th>
                                                                        <th>Transaction</th>
                                                                        <th>Payment Method</th>
                                                                        <th>Number</th>
                                                                    </tr>
                                                                </thead>
                                                                <tfoot>
                                                                    <tr>
                                                                        <th>SR#</th>
                                                                        <th>Date</th>
                                                                        <th>Transaction</th>
                                                                        <th>Payment Method</th>
                                                                        <th>Number</th>
                                                                    </tr>
                                                                </tfoot>
                                                                <tbody>
                                                                    @if ($wallet)
                                                                        @if ($wallet->wallet_transactions)
                                                                            @foreach ($wallet->wallet_transactions as $key=>$transaction)
                                                                                <tr>
                                                                                    <td style="text-align: center;">{{ $key+1 }}</td>
                                                                                    <td style="text-align: center;">{{ $transaction->created_at->toDateString() }}</td>
                                                                                    <td style="text-align: center;">{{ $transaction->amount }}</td>
                                                                                    <td style="text-align: center;">{{ $transaction->payment_type }}</td>
                                                                                    <td style="text-align: center;">{{ $transaction->number }}</td>
                                                                                </tr>
                                                                            @endforeach
                                                                        @endif
                                                                    @endif
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="tab-2">
                                    <div class="row slider-ourmember">
                                        <div class="item-about col-lg-4 col-md-4 col-sm-4">
                                            <div class="item respl-item">
                                                <form action="{{ route('my-account.claim-action') }}" method="post" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="col-sm-12 customer-login">
                                                        <div class="well">
                                                            <h2><i class="fa fa-file-text-o" aria-hidden="true"></i> Place your Claim</h2>
                                                            <div class="form-group" style="margin-top: 20px;">
                                                                <label class="claim">Reason</label>
                                                                <input type="text" name="reason" class="form-control" placeholder="reason for claim" required/>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="claim">Order No.</label>
                                                                <input type="text" name="order_no" class="form-control" placeholder="order no." required/>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="claim">Product Price</label>
                                                                <input type="text" name="price" class="form-control" placeholder="product price" required/>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="claim">Description</label>
                                                                <textarea name="description" class="form-control" cols="100" rows="3" placeholder="explain your claim" required></textarea>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="claim">Images</label>
                                                                <input type="file" name="gallery[]" class="form-control" multiple required/>
                                                            </div>
                                                            <button type="submit" class="btn btn-primary">Submit</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="item-about col-lg-8 col-md-8 col-sm-8">
                                            @php
                                                if(Auth::user()){
                                                    $claims = \App\Claim::with('claim_gallery')->where('user_id', Auth::user()->id)->get();
                                                }
                                                else{
                                                    $claims = NULL;
                                                }
                                            @endphp
                                            <div class="item respl-item">
                                                <div class="table-responsive">
                                                    <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                                        <thead>
                                                            <tr>
                                                                <th>SR#</th>
                                                                <th>Date</th>
                                                                <th>Order#</th>
                                                                <th>Price</th>
                                                                <th>description</th>
                                                            </tr>
                                                        </thead>
                                                        <tfoot>
                                                            <tr>
                                                                <th>SR#</th>
                                                                <th>Date</th>
                                                                <th>Order#</th>
                                                                <th>Price</th>
                                                                <th>description</th>
                                                            </tr>
                                                        </tfoot>
                                                        <tbody>
                                                            @if ($claims)
                                                                {{-- @if ($claims->claim_gallery) --}}
                                                                    @foreach ($claims as $key=>$claim)
                                                                        <tr>
                                                                            <td style="text-align: center;">{{ $key+1 }}</td>
                                                                            <td style="text-align: center;">{{ $claim->created_at->toDateString() }}</td>
                                                                            <td style="text-align: center;">{{ $claim->order_no }}</td>
                                                                            <td style="text-align: center;">{{ $claim->price }}</td>
                                                                            <td style="text-align: center;">{{ $claim->description }}</td>
                                                                        </tr>
                                                                    @endforeach
                                                                {{-- @endif --}}
                                                            @endif
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            <!--Tabs Part End-->
                        </div>
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
    <script src="{{asset('public/admin/plugins/file-upload/file-upload-with-preview.min.js')}}"></script>
    <script>
        var p_thumbnail = new FileUploadWithPreview('p_thumbnail')
    </script>
    <script>
        $(document).ready(function(){
            $('#deposit-row').hide();
            $('#jazzcash-row').hide();
            $('#mastercard-row').hide();
            $('#paypal-row').hide();
            $('#visa-row').hide();
            $('#btn-deposit').click(function(){
                $('#deposit-row').toggle();
            });
            $('#myradio1').click(function(){
                $('#jazzcash-row').show();
                $('#mastercard-row').hide();
                $('#paypal-row').hide();
                $('#visa-row').hide();
            });
            $('#myradio2').click(function(){
                $('#jazzcash-row').hide();
                $('#mastercard-row').show();
                $('#paypal-row').hide();
                $('#visa-row').hide();
            });
            $('#myradio3').click(function(){
                $('#jazzcash-row').hide();
                $('#mastercard-row').hide();
                $('#paypal-row').show();
                $('#visa-row').hide();
            });
            $('#myradio4').click(function(){
                $('#jazzcash-row').hide();
                $('#mastercard-row').hide();
                $('#paypal-row').hide();
                $('#visa-row').show();
            });

            $('.btn-submit').click(function(e){
                var type = $('input[type="radio"][id^="myradio"]:checked').val();
                $('.type').val(type);
            });
        });
    </script>
	
</body>
</html>