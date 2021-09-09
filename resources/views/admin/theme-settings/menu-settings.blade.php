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

    <!-- Colorpicker Css -->
    <link href="{{asset('public/admin/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.css')}}" rel="stylesheet" />

    <!-- Dropzone Css -->
    <link href="{{asset('public/admin/plugins/dropzone/dropzone.css')}}" rel="stylesheet">

    <!-- Multi Select Css -->
    <link href="{{asset('public/admin/plugins/multi-select/css/multi-select.css')}}" rel="stylesheet">

    <!-- Bootstrap Spinner Css -->
    <link href="{{asset('public/admin/plugins/jquery-spinner/css/bootstrap-spinner.css')}}" rel="stylesheet">

    <!-- Bootstrap Tagsinput Css -->
    <link href="{{asset('public/admin/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css')}}" rel="stylesheet">

    <!-- Bootstrap Select Css -->
    <link href="{{asset('public/admin/plugins/bootstrap-select/css/bootstrap-select.css')}}" rel="stylesheet" />

    <!-- noUISlider Css -->
    <link href="{{asset('public/admin/plugins/nouislider/nouislider.min.css')}}" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="{{asset('public/admin/css/style.css')}}" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="{{asset('public/admin/css/themes/all-themes.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="{{asset('public/admin/plugins/select2/select2.css')}}" />
    <style>
        .ms-selection{
            /* display: none; */
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
                <h2>MENU SETTING</h2>
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
            <!-- Multi Select -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Theme Setting
                                <small>Menu Setting</small>
                            </h2>
                        </div>
                        <div class="body">
                            <span class="text-left">Categories</span>
                            <span class="text-right">Menu</span>
                            <form action="{{ route('ds.theme-setting.menu-setting.add-menu') }}" method="POST">
                                @csrf
                                <select id="optgroup" class="ms" name="menu[]" multiple="multiple">
                                    @foreach ($categories as $key=>$item)
                                        <option value="{{ $item->id }}" <?= $item->menu == TRUE ? ' selected="selected"' : ''; ?> >{{ $item->name }}</option>
                                    @endforeach
                                </select>
                                <button type="submit" class="btn btn-primary" style="margin-top: 20px;">Submit</button>
                            </form>
                            
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Multi Select -->

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

    <!-- Bootstrap Colorpicker Js -->
    <script src="{{asset('public/admin/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js')}}"></script>

    <!-- Dropzone Plugin Js -->
    <script src="{{asset('public/admin/plugins/dropzone/dropzone.js')}}"></script>

    <!-- Input Mask Plugin Js -->
    <script src="{{asset('public/admin/plugins/jquery-inputmask/jquery.inputmask.bundle.js')}}"></script>

    <!-- Multi Select Plugin Js -->
    <script src="{{asset('public/admin/plugins/multi-select/js/jquery.multi-select.js')}}"></script>

    <!-- Jquery Spinner Plugin Js -->
    <script src="{{asset('public/admin/plugins/jquery-spinner/js/jquery.spinner.js')}}"></script>

    <!-- Bootstrap Tags Input Plugin Js -->
    <script src="{{asset('public/admin/plugins/bootstrap-tagsinput/bootstrap-tagsinput.js')}}"></script>

    <!-- noUISlider Plugin Js -->
    <script src="{{asset('public/admin/plugins/nouislider/nouislider.js')}}"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="{{asset('public/admin/plugins/node-waves/waves.js')}}"></script>

    <!-- Custom Js -->
    <script src="{{asset('public/admin/js/admin.js')}}"></script>
    <script src="{{asset('public/admin/js/pages/forms/advanced-form-elements.js')}}"></script>

    <!-- Demo Js -->
    <script src="{{asset('public/admin/js/demo.js')}}"></script>
    <script src="{{asset('public/admin/plugins/select2/select2.min.js')}}"></script> <!-- Select2 Js -->
</body>

</html>
