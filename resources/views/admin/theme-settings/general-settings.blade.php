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
    <style>
        .custom-file-container__image-preview {
            box-sizing: border-box;
            transition: all 0.2s ease;
            margin-top: 30px;
            margin-bottom: 30px;
            height: 100px;
            width: 100%;
            border-radius: 4px;
            background-size: contain;
            background-position: center center;
            background-repeat: no-repeat;
            background-color: #fff;
            overflow: auto;
            padding: 10px;
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
                <h2>GENERAL SETTING</h2>
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
            <!-- Input -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Theme Settings
                                <small>General Setting</small>
                            </h2>
                        </div>
                        <div class="body">
                            {{-- <div class="" style="margin-bottom: 20px;">
                                @include('admin.layout.messages')
                            </div> --}}
                            <form action="{{ route('ds.theme-setting.top-header-action') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row clearfix">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <div class="custom-file-container" data-upload-id="hd_favicon">
                                                    <label style="color: #555;">Website Favicon:<a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image"></a></label>
                                                    <label class="custom-file-container__custom-file" >
                                                        <input type="file" name="hd_favicon" class="custom-file-container__custom-file__custom-file-input">
                                                        <span class="custom-file-container__custom-file__custom-file-control"></span>
                                                    </label>
                                                    <div class="custom-file-container__image-preview"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <label for="hd_txt_logo">Favicon:</label>
                                                <img src="{{ asset('public/theme').'/'.$row->hd_fevicon }}" alt="No Favicon" style="width:110px;">
                                                @if($row->hd_fevicon)
                                                    <a href="{{ route('ds.theme-settings.remove-favicon') }}">Remove favicon</a>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <div class="custom-file-container" data-upload-id="hd_logo">
                                                    <label style="color: #555;">Website Image Logo:<a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image"></a></label>
                                                    <label class="custom-file-container__custom-file" >
                                                        <input type="file" name="hd_logo" class="custom-file-container__custom-file__custom-file-input">
                                                        <span class="custom-file-container__custom-file__custom-file-control"></span>
                                                    </label>
                                                    <div class="custom-file-container__image-preview"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <label for="hd_txt_logo">Logo:</label>
                                                <img src="{{ asset('public/theme').'/'.$row->hd_img_logo }}" alt="No Logo" style="width:130px;">
                                                @if($row->hd_img_logo) 
                                                    <a href="{{ route('ds.theme-settings.remove-logo') }}">Remove logo</a>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <label for="hd_theme">Website Color Theme:</label>
                                                <select name="hd_theme" id="hd_theme" class="form-control">
                                                    <option value="">Choose Color Theme</option>
                                                    <option value="default">Default</option>
                                                    <option value="green">Green</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <label for="hd_txt_logo">Website Text Logo:</label>
                                                <input type="text" value="{{ $row->hd_txt_logo }}" name="hd_txt_logo" class="form-control" placeholder="Website Text Logo"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <label for="hd_txt_logo_tagline">Website Text Logo Tagline:</label>
                                                <input type="text" value="{{ $row->hd_txt_logo_tagline }}" name="hd_txt_logo_tagline" class="form-control" placeholder="Website Text Logo Tagline"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-sm-5">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <label for="hd_title">Website Title:</label>
                                                <input type="text" value="{{ $row->hd_title }}" name="hd_title" class="form-control" placeholder="Website Title"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <label for="hd_phone">Header Phone:</label>
                                                <input type="text" value="{{ $row->hd_phone }}" name="hd_phone" class="form-control" placeholder="Company Contact Number"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <label for="hd_email">Header Email:</label>
                                                <input type="email" value="{{ $row->hd_email }}" name="hd_email" class="form-control" placeholder="Company Email"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <label for="hd_address">Address:</label>
                                                <textarea name="hd_address" id="hd_address" class="form-control" cols="100" rows="2">{{ $row->hd_address }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <label for="hd_developer_name">Footer Developer Name:</label>
                                                <input type="text" value="{{ $row->hd_developer_name }}" name="hd_developer_name" class="form-control" placeholder="Developer Name Here"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <label for="hd_developer_site_url">Footer Developer Site URL:</label>
                                                <input type="text" value="{{ $row->hd_developer_site_url }}" name="hd_developer_site_url" class="form-control" placeholder="Developer Site URL Here"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-sm-12">
                                        <button type="submit" class="btn btn-default">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Input -->
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

    <!-- Autosize Plugin Js -->
    <script src="{{asset('public/admin/plugins/autosize/autosize.js')}}"></script>

    <!-- Moment Plugin Js -->
    <script src="{{asset('public/admin/plugins/momentjs/moment.js')}}"></script>

    <!-- Bootstrap Material Datetime Picker Plugin Js -->
    <script src="{{asset('public/admin/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js')}}"></script>

    <!-- Bootstrap Datepicker Plugin Js -->
    <script src="{{asset('public/admin/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js')}}"></script>

    <!-- Custom Js -->
    <script src="{{asset('public/admin/js/admin.js')}}"></script>
    <script src="{{asset('public/admin/js/pages/forms/basic-form-elements.js')}}"></script>

    <!-- Demo Js -->
    <script src="{{asset('public/admin/js/demo.js')}}"></script>

    <!-- Image upload and preview Js -->
    <script src="{{asset('public/admin/plugins/file-upload/file-upload-with-preview.min.js')}}"></script>
    <script>
        var secondUpload = new FileUploadWithPreview('hd_favicon')
        var secondUpload = new FileUploadWithPreview('hd_logo')
    </script>
</body>
</html>
