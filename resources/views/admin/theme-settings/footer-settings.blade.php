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
                <h2>FOOTER SETTING</h2>
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
                                <small>Footer Setting</small>
                            </h2>
                        </div>
                        <div class="body">
                            <form action="{{ route('ds.theme-setting.footer-setting-action') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row clearfix">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <div class="custom-file-container" data-upload-id="logo">
                                                    <label style="color: #555;">Footer Logo: (300 x 79 Pixels)<a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image"></a></label>
                                                    <label class="custom-file-container__custom-file" >
                                                        <input type="file" name="logo" class="custom-file-container__custom-file__custom-file-input">
                                                        <span class="custom-file-container__custom-file__custom-file-control"></span>
                                                    </label>
                                                    <div class="custom-file-container__image-preview"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <label>Logo:</label>
                                                @if ($row)
                                                    @if ($row->logo)
                                                        <img src="{{asset('public/theme/footer').'/'.$row->logo}}" alt="No Logo" class="form-control" style="width:100%;">  
                                                        <a href="{{ route('ds.theme-settings.remove-footer-logo') }}">Remove logo</a>
                                                    @endif
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <label for="address">Address:</label>
                                                <textarea name="address" id="address" class="form-control" cols="100" rows="2">
                                                    @if ($row)
                                                        @if($row->address)
                                                            {{ $row->address }}
                                                        @endif
                                                    @endif
                                                </textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <label for="developer_name">Footer Developer Name:</label>
                                                @if ($row)
                                                    @if ($row->developer_name)
                                                        <input type="text" value="{{ $row->developer_name }}" name="developer_name" class="form-control" placeholder="Developer Name Here"/>
                                                    @else
                                                        <input type="text" name="developer_name" class="form-control" placeholder="Developer Name Here"/>
                                                    @endif
                                                @else
                                                <input type="text" name="developer_name" class="form-control" placeholder="Developer Name Here"/>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <label for="developer_url">Footer Developer Site URL:</label>
                                                @if ($row)
                                                    @if ($row->developer_url)
                                                        <input type="text" value="{{ $row->developer_url }}" name="developer_url" class="form-control" placeholder="Developer Site URL Here"/>
                                                    @else
                                                        <input type="text" value="" name="developer_url" class="form-control" placeholder="Developer Site URL Here"/>
                                                    @endif
                                                @else
                                                <input type="text" value="" name="developer_url" class="form-control" placeholder="Developer Site URL Here"/>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <label for="phone">Phone:</label>
                                                @if ($row)
                                                   @if ($row->phone)
                                                    <input type="text" value="{{ $row->phone }}" name="phone" class="form-control" placeholder="Footer Phone Here"/>
                                                   @else
                                                    <input type="text" value="" name="phone" class="form-control" placeholder="Footer Phone Here"/>
                                                   @endif
                                                @else
                                                <input type="text" value="" name="phone" class="form-control" placeholder="Footer Phone Here"/>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <label for="email">Email:</label>
                                                @if ($row)
                                                    @if ($row->email)
                                                        <input type="text" value="{{ $row->email }}" name="email" class="form-control" placeholder="Footer Email Here"/>
                                                    @else
                                                        <input type="text" value="" name="email" class="form-control" placeholder="Footer Email Here"/>
                                                    @endif
                                                @else
                                                    <input type="text" value="" name="email" class="form-control" placeholder="Footer Email Here"/>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <label for="copyrights">Copyrights:</label>
                                                <textarea name="copyrights" class="form-control" cols="100" rows="2">
                                                    @if ($row)
                                                        @if ($row->copyrights)
                                                        {{ $row->copyrights }}
                                                        @endif
                                                    @endif
                                                </textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <label for="background_color">Background Color:</label>
                                                <input type="color" name="background_color" value="{{ $row->background_color }}" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <label for="title_color">Title Color:</label>
                                                <input type="color" name="title_color" value="{{ $row->title_color }}" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <label for="text_color">Text Color:</label>
                                                <input type="color" name="text_color" value="{{ $row->text_color }}" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <label for="facebook">Facebook Link:</label>
                                                <input type="text" name="facebook" value="{{ $row->facebook }}" placeholder="Paste profile link here" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <label for="twitter">Twitter Link:</label>
                                                <input type="text" name="twitter" value="{{ $row->twitter }}" placeholder="Paste profile link here" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <label for="google">Google Plus Link:</label>
                                                <input type="text" name="google" value="{{ $row->google }}" placeholder="Paste profile link here" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <label for="instagram">Instagram Link:</label>
                                                <input type="text" name="instagram" value="{{ $row->instagram }}" placeholder="Paste profile link here" class="form-control">
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
        var logo = new FileUploadWithPreview('logo')
    </script>
</body>
</html>
