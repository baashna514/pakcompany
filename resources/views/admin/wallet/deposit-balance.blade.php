<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>MyShopik.com - A brand of WebEasy Pvt Limited | Admin Panel</title>
    <!-- Favicon-->
    @include('admin.layout.favicon')

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="{{asset('public/admin/plugins/bootstrap/css/bootstrap.css')}}" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="{{asset('public/admin/plugins/node-waves/waves.css')}}" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="{{asset('public/admin/plugins/animate-css/animate.css')}}" rel="stylesheet" />

    <!-- Bootstrap Material Datetime Picker Css -->
    <link href="{{asset('public/admin/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css')}}" rel="stylesheet" />

    <!-- Bootstrap DatePicker Css -->
    <link href="{{asset('public/admin/plugins/bootstrap-datepicker/css/bootstrap-datepicker.css')}}" rel="stylesheet" />

    <!-- Wait Me Css -->
    <link href="{{asset('public/admin/plugins/waitme/waitMe.css')}}" rel="stylesheet" />

    <!-- Bootstrap Select Css -->
    <link href="{{asset('public/admin/plugins/bootstrap-select/css/bootstrap-select.css')}}" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="{{asset('public/admin/css/style.css')}}" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="{{asset('public/admin/css/themes/all-themes.css')}}" rel="stylesheet" />

    <!-- Image Upload and Preview Css -->
    <link href="{{asset('public/admin/plugins/file-upload/file-upload-with-preview.min.css')}}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{asset('public/admin/fm.selectator.jquery.css')}}"/>
    <style>
        .price{
            font-weight: bold;
            font-size: 20px;
        }
        input[type="radio"][id^="myradio"]{
                display: none;
            }
            label {
                border: 1px solid #fff;
                padding: 10px;
                display: block;
                position: relative;
                margin: 10px;
                border: none;
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
                margin-left: 30px;
            }
            label::after{
                margin-left: 30px;
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
                margin-left: 30px;
            }
            :checked+label::after{
                margin-left: 30px;
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
    </style>
</head>

<body class="theme-indigo">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Search Bar -->
    <div class="search-bar">
        <div class="search-icon">
            <i class="material-icons">search</i>
        </div>
        <input type="text" placeholder="START TYPING...">
        <div class="close-search">
            <i class="material-icons">close</i>
        </div>
    </div>
    <!-- #END# Search Bar -->
    <!-- Top Bar -->
    @include('admin.layout.top-bar')
    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->
        @include('admin.layout.left-sidebar')
        <!-- #END# Left Sidebar -->
        <!-- Right Sidebar -->
        @include('admin.layout.right-sidebar')
        <!-- #END# Right Sidebar -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>MY WALLET</h2>
            </div>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="" style="margin-bottom: 20px;">
                            @include('admin.layout.messages')
                        </div>
                    </div>
                </div>
            </div>
            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                My Wallet
                                <small>Deposit Balance</small>
                            </h2>
                        </div>
                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-sm-12" style="text-align: center">
                                    <span>Available Balance</span>
                                    <p><h3>{{ $wallet->balance }} - PKR</h3></p>
                                    <p>
                                        <a href="#" id="btn-deposit" class="btn btn-primary">Deopsit</a>
                                    </p>
                                </div>
                            </div>
                            <div class="row" id="deposit-row">
                                <div class="row payment-icons" style="margin-left: -80px;margin-bottom: 50px;">
                                    <div class="col-lg-4"></div>
                                    <div class="col-lg-1">
                                        <input type="radio" value="jazzcash" id="myradio1" name="payment_method[]" />
                                        <label for="myradio1"><img id="jazzcash" src="{{ asset('public/admin/images/payment-methods/jazzcash.png') }}" alt="" style="width: 100px;padding:20px;"></label>
                                    </div>
                                    <div class="col-lg-1">
                                        <input type="radio" value="mastercard" id="myradio2" name="payment_method[]"/>
                                        <label for="myradio2"><img id="mastercard" src="{{ asset('public/admin/images/payment-methods/mastercard.png') }}" alt="" style="width: 100px;"></label>
                                    </div>
                                    <div class="col-lg-1">
                                        <input type="radio" value="paypal" id="myradio3" name="payment_method[]"/>
                                        <label for="myradio3"><img id="paypal" src="{{ asset('public/admin/images/payment-methods/paypal.jpg') }}" alt="" style="width: 100px;"></label>
                                    </div>
                                    <div class="col-lg-1">
                                        <input type="radio" value="visa" id="myradio4" name="payment_method[]"/>
                                        <label for="myradio4"><img id="visa" src="{{ asset('public/admin/images/payment-methods/visa.png') }}" alt="" style="width: 100px;"></label>
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
                    </div>
                </div>
            </div>
            <!-- #END# Exportable Table -->
        </div>
    </section>

    <!-- Jquery Core Js -->
    <script src="{{asset('public/admin/plugins/jquery/jquery.min.js')}}"></script>

    <!-- Bootstrap Core Js -->
    <script src="{{asset('public/admin/plugins/bootstrap/js/bootstrap.js')}}"></script>

    <!-- Select Plugin Js -->
    <script src="{{asset('public/admin/plugins/bootstrap-select/js/bootstrap-select.js')}}"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="{{asset('public/admin/plugins/jquery-slimscroll/jquery.slimscroll.js')}}"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="{{asset('public/admin/plugins/node-waves/waves.js')}}"></script>

    <!-- Jquery DataTable Plugin Js -->
    <script src="{{asset('public/admin/plugins/jquery-datatable/jquery.dataTables.js')}}"></script>
    <script src="{{asset('public/admin/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js')}}"></script>
    <script src="{{asset('public/admin/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('public/admin/plugins/jquery-datatable/extensions/export/buttons.flash.min.js')}}"></script>
    <script src="{{asset('public/admin/plugins/jquery-datatable/extensions/export/jszip.min.js')}}"></script>
    <script src="{{asset('public/admin/plugins/jquery-datatable/extensions/export/pdfmake.min.js')}}"></script>
    <script src="{{asset('public/admin/plugins/jquery-datatable/extensions/export/vfs_fonts.js')}}"></script>
    <script src="{{asset('public/admin/plugins/jquery-datatable/extensions/export/buttons.html')}}5.min.js')}}"></script>
    <script src="{{asset('public/admin/plugins/jquery-datatable/extensions/export/buttons.print.min.js')}}"></script>

    <!-- Custom Js -->
    <script src="{{asset('public/admin/js/admin.js')}}"></script>
    <script src="{{asset('public/admin/js/pages/tables/jquery-datatable.js')}}"></script>

    <!-- Demo Js -->
    <script src="{{asset('public/admin/js/demo.js')}}"></script>
    <!-- Image upload and preview Js -->
    <script src="{{asset('public/admin/plugins/file-upload/file-upload-with-preview.min.js')}}"></script>
    <script src="{{asset('public/admin/fm.selectator.jquery.js')}}"></script>
    <script>
        $('#product').selectator();
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
