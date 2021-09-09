<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin Panel</title>
    <!-- Favicon-->
    <link rel="icon" href="{{asset('public/admin/favicon.ico')}}" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="{{asset('public/admin/plugins/bootstrap/css/bootstrap.css')}}" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="{{asset('public/admin/plugins/node-waves/waves.css')}}" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="{{asset('public/admin/plugins/animate-css/animate.css')}}" rel="stylesheet" />

    <!-- JQuery DataTable Css -->
    <link href="{{asset('public/admin/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css')}}" rel="stylesheet">

    <!-- Custom Css -->
    <link href="{{asset('public/admin/css/style.css')}}" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="{{asset('public/admin/css/themes/all-themes.css')}}" rel="stylesheet" />

    <!-- Bootstrap Material Datetime Picker Css -->
    <link href="{{asset('public/admin/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css')}}" rel="stylesheet" />

    <!-- Bootstrap DatePicker Css -->
    <link href="{{asset('public/admin/plugins/bootstrap-datepicker/css/bootstrap-datepicker.css')}}" rel="stylesheet" />

    <!-- Wait Me Css -->
    <link href="{{asset('public/admin/plugins/waitme/waitMe.css')}}" rel="stylesheet" />

    <!-- Bootstrap Select Css -->
    <link href="{{asset('public/admin/plugins/bootstrap-select/css/bootstrap-select.css')}}" rel="stylesheet" />

    <!-- Image Upload and Preview Css -->
    <link href="{{asset('public/admin/plugins/file-upload/file-upload-with-preview.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet"/>
    <link href="{{asset('public/admin/plugins/multi-select/css/multi-select.css')}}" rel="stylesheet">
    
    {{-- <link rel="stylesheet" href="{{asset('public/admin/plugins/select2/select2.css')}}" /> --}}
    <style>
        .bootstrap-select{
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
                <h2>NEW PRODUCT</h2>
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
            <form action="{{ route('ds.product-management.new-product-action') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <!-- Exportable Table -->
                <div class="row clearfix">
                    <!-- Left Content -->
                    <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                        <!-- Product Basics -->
                        <div class="row clearfix">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="card">
                                    <div class="header">
                                        <h2>Product Basics</h2>
                                    </div>
                                    <div class="body">
                                        <div class="row clearfix">
                                            <div class="col-sm-10">
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <label for="p_name">Product</label>
                                                        <input type="text" value="" name="p_name" class="form-control" placeholder="product name"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-2">
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <label for="p_quantity">Quantity</label>
                                                        <input type="text" value="" name="p_quantity" class="form-control" placeholder="quantity"/>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row clearfix">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <label for="p_detail">Detail</label>
                                                        <textarea name="p_detail" id="p_detail" class="form-control" cols="100" rows="5" placeholder="product detail"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- #END# Product Basics -->

                        <!-- Product Data -->
                        <div class="row clearfix">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="card">
                                    <div class="header">
                                        <h2>Product Data</h2>
                                        {{-- <ul class="header-dropdown m-r--5" style="width:50%;">
                                            <select name="p_type" id="p_type" class="form-control">
                                                <option value="basic product">Simple Product</option>
                                                <option value="advance product">Variable Product</option>
                                            </select>
                                        </ul> --}}
                                    </div>
                                    <div class="body">
                                        <!-- Nav tabs -->
                                        <ul class="nav nav-tabs tab-nav-right" role="tablist">
                                            <li role="presentation" class="active"><a href="#general" data-toggle="tab">General</a></li>
                                            <li role="presentation"><a href="#attribute" data-toggle="tab">Attribute</a></li>
                                            {{-- <li role="presentation"><a href="#values" data-toggle="tab">Variations</a></li> --}}
                                        </ul>
            
                                        <!-- Tab panes -->
                                        <div class="tab-content">
                                            <div role="tabpanel" class="tab-pane fade in active" id="general">
                                                <div class="row clearfix">
                                                    <div class="col-sm-5">
                                                        <div class="form-group">
                                                            <div class="form-line">
                                                                <label for="p_regular_price">Regular Price</label>
                                                                <input type="text" value="" name="p_regular_price" class="form-control" placeholder="regular price"/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-5">
                                                        <div class="form-group">
                                                            <div class="form-line">
                                                                <label for="p_sale_price">Sale Price</label>
                                                                <input type="text" value="" name="p_sale_price" class="form-control" placeholder="sale price"/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <div class="form-group">
                                                            <div class="form-line">
                                                                <label for="">&nbsp;&nbsp;</label>
                                                                <button class="btn btn-primary form-control" id="btn-schedule">Schedule</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row clearfix" id="div-schedule">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <div class="form-line">
                                                                <label for="p_sale_from">Sale From</label>
                                                                <input type="date" value="" name="p_sale_from" class="form-control"/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <div class="form-line">
                                                                <label for="p_sale_to">Sale To</label>
                                                                <input type="date" value="" name="p_sale_to" class="form-control"/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div role="tabpanel" class="tab-pane fade" id="attribute">
                                                {{-- Color Tab Start --}}
                                                <div class="row clearfix">
                                                    <div class="col-xs-12 ol-sm-12 col-md-12 col-lg-12">
                                                        <div class="panel-group">
                                                            <div class="row">
                                                                <div class="col-sm-12">
                                                                    <div class="panel panel-default">
                                                                        <div class="panel-heading" role="tab" id="headingOne_1">
                                                                            <h4 class="panel-title">
                                                                                <a role="button" data-toggle="collapse" data-parent="#accordion_1" href="#collapseOne_1" aria-expanded="true" aria-controls="collapseOne_1">
                                                                                    Color
                                                                                </a>
                                                                            </h4>
                                                                        </div>
                                                                        <div id="collapseOne_1" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne_1">
                                                                            <div class="panel-body">
                                                                                <div class="row clearfix">
                                                                                    <div class="col-sm-12">
                                                                                        <table class="table">
                                                                                            <tr>
                                                                                                <td>Add Values for the Color Attribute</td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td>
                                                                                                    @php
                                                                                                        $values = \App\Value::where('attribute_id', 1)->get();
                                                                                                    @endphp
                                                                                                    <select name="color_attribute_values[]" id="color-attribute-values" class="form-control show-tick select2" multiple="multiple">
                                                                                                        <option>Select Values</option>
                                                                                                        @if ($values)
                                                                                                            @foreach($values as $value)
                                                                                                                <option value="{{ $value->id }}" style="background:{{ $value->name }};">{{ $value->name }}</option>
                                                                                                            @endforeach
                                                                                                        @endif
                                                                                                    </select>
                                                                                                </td>
                                                                                            </tr>
                                                                                        </table>
                                                                                        {{-- <input type="checkbox" id="for_variation" name="for_variation"> --}}
                                                                                        {{-- <label for="for_variation">Use for Variation</label><br> --}}
                                                                                        {{-- <a href="#" class="btn btn-success btn-save-color-attribute-values" data-id="1">Save Attribute</a> --}}
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                {{-- Color Tab Ends here --}}

                                                {{-- Size Tab Start --}}
                                                <div class="row clearfix">
                                                    <div class="col-xs-12 ol-sm-12 col-md-12 col-lg-12">
                                                        <div class="panel-group">
                                                            <div class="row">
                                                                <div class="col-sm-12">
                                                                    <div class="panel panel-default">
                                                                        <div class="panel-heading" role="tab" id="headingOne_2">
                                                                            <h4 class="panel-title">
                                                                                <a role="button" data-toggle="collapse" data-parent="#accordion_2" href="#collapseOne_2" aria-expanded="true" aria-controls="collapseOne_2">
                                                                                    Size
                                                                                </a>
                                                                            </h4>
                                                                        </div>
                                                                        <div id="collapseOne_2" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne_2">
                                                                            <div class="panel-body">
                                                                                <div class="row clearfix">
                                                                                    <div class="col-sm-12">
                                                                                            {{-- <table class="table">
                                                                                                <tr>
                                                                                                    <td>Add Values for the Size Attribute</td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td>
                                                                                                        @php
                                                                                                            $values = \App\Value::where('attribute_id', 2)->get();
                                                                                                        @endphp
                                                                                                        <select name="size_attribute_values[]" id="size-attribute-values" class="form-control show-tick select2" multiple="multiple">
                                                                                                            <option>Select Values</option>
                                                                                                            @if ($values)
                                                                                                                @foreach($values as $value)
                                                                                                                    <option value="{{ $value->id }}" style="background:{{ $value->name }};">{{ $value->name }}</option>
                                                                                                                @endforeach
                                                                                                            @endif
                                                                                                        </select>
                                                                                                    </td>
                                                                                                </tr>
                                                                                            </table> --}}
                                                                                            <button class="btn btn-success add_field_button" style="margin-bottom: 10px;">Add More Fields</button>
                                                                                            <table class="table table-bordered" id="table1">
                                                                                                <tr>
                                                                                                    <th>Labor Description</th>
                                                                                                    <th>Hours</th>
                                                                                                    <th>Rate</th>
                                                                                                    <th>Amount</th>
                                                                                                    <th>Action</th>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td>
                                                                                                        @php
                                                                                                            $values = \App\Value::where('attribute_id', 2)->get();
                                                                                                        @endphp
                                                                                                        <select name="" id="" class="form-control">
                                                                                                            @foreach ($values as $value)
                                                                                                                <option value="{{ $value->id }}">{{ $value->name }}</option>
                                                                                                            @endforeach
                                                                                                        </select>
                                                                                                    </td>
                                                                                                    <td><input type="text" name="hours[]" class="form-control" placeholder="price"></td>
                                                                                                    <td></td>
                                                                                                </tr>
                                                                                            </table>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                {{-- Size Tab Ends here --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- #END# Product Data -->

                        <!-- Product Description -->
                        <div class="row clearfix">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="card">
                                    <div class="header">
                                        <h2>Description</h2>
                                    </div>
                                    <div class="body">
                                        <div class="row clearfix">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <label for="p_description">Short Description</label>
                                                        <textarea class="form-control" name="p_description" id="p_description" cols="100" rows="3"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- #END# Product Description -->
                    </div>
                    <!-- #END# Left Content -->
                    <!-- Right Content -->
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                        <!-- Categories -->
                        <div class="row clearfix">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="card">
                                    <div class="header">
                                        <h2>
                                            Categories
                                        </h2>
                                    </div>
                                    <div class="body">
                                        <div class="row">
                                            <div class="col-lg-12" style="height: 170px;overflow: auto;">
                                                @foreach ($categories as $cat=>$category)
                                                <input type="checkbox" id="cat{{ $cat }}" value="{{ $category->id }}" name="p_category_list[]">
                                                <label for="cat{{ $cat }}"> {{ $category->name }}</label><br>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    <div class="footer">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                {{-- <a href="">+ Add New Category</a> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Categories End -->
                        <!-- Product Thumbnail -->
                        <div class="row clearfix">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="card">
                                    <div class="header">
                                        <h2>
                                            Product Thumbnail
                                            {{-- <small>New Product</small> --}}
                                        </h2>
                                    </div>
                                    <div class="body">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <div class="custom-file-container" data-upload-id="p_thumbnail">
                                                            <label style="color: #555;">Product Thumbnail:<a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image"></a></label>
                                                            <label class="custom-file-container__custom-file" >
                                                                <input type="file" name="p_thumbnail" class="custom-file-container__custom-file__custom-file-input">
                                                                <span class="custom-file-container__custom-file__custom-file-control"></span>
                                                            </label>
                                                            <div class="custom-file-container__image-preview"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Product Thumbnail End -->
                        <!-- Product Gallery -->
                        <div class="row clearfix">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="card">
                                    <div class="header">
                                        <h2>
                                            Product Gallery
                                            {{-- <small>New Product</small> --}}
                                        </h2>
                                    </div>
                                    <div class="body">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <div class="custom-file-container" data-upload-id="p_gallery">
                                                            <label style="color: #555;">Product Gallery:<a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image"></a></label>
                                                            <label class="custom-file-container__custom-file" >
                                                                <input type="file" name="p_gallery[]" class="custom-file-container__custom-file__custom-file-input" multiple>
                                                                <span class="custom-file-container__custom-file__custom-file-control"></span>
                                                            </label>
                                                            <div class="custom-file-container__image-preview"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Product Gallery End -->
                        <button type="submit" class="btn btn-success" style="width: 100%; margin-bottom:30px;">Submit</button>
                    </div>
                    <!-- #END# Right Content -->
                </div>
                <!-- #END# Exportable Table -->
            </form>
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
    {{-- <script src="{{asset('public/admin/plugins/jquery-datatable/extensions/export/buttons.html')}}5.min.js')}}"></script> --}}
    <script src="{{asset('public/admin/plugins/jquery-datatable/extensions/export/buttons.print.min.js')}}"></script>
    <!-- Custom Js -->
    <script src="{{asset('public/admin/js/admin.js')}}"></script>
    <script src="{{asset('public/admin/js/pages/tables/jquery-datatable.js')}}"></script>
    <!-- Demo Js -->
    <script src="{{asset('public/admin/js/demo.js')}}"></script>
    <script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>

    {{-- <script src="{{asset('public/admin/js/pages/forms/basic-form-elements.js')}}"></script> --}}

    <!-- Autosize Plugin Js -->
    <script src="{{asset('public/admin/plugins/autosize/autosize.js')}}"></script>

    <!-- Moment Plugin Js -->
    <script src="{{asset('public/admin/plugins/momentjs/moment.js')}}"></script>

    <!-- Bootstrap Material Datetime Picker Plugin Js -->
    <script src="{{asset('public/admin/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js')}}"></script>

    <!-- Bootstrap Datepicker Plugin Js -->
    <script src="{{asset('public/admin/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js')}}"></script>

    <!-- Image upload and preview Js -->
    <script src="{{asset('public/admin/plugins/file-upload/file-upload-with-preview.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <!-- Bootstrap Tags Input Plugin Js -->
    <script src="{{asset('public/admin/plugins/bootstrap-tagsinput/bootstrap-tagsinput.js')}}"></script>
    {{-- <script src="{{asset('public/admin/js/pages/forms/advanced-form-elements.js')}}"></script> --}}
    <script src="{{asset('public/admin/plugins/multi-select/js/jquery.multi-select.js')}}"></script>
    {{-- <script src="{{asset('public/admin/plugins/select2/select2.min.js')}}"></script> <!-- Select2 Js --> --}}
    <script>
        var p_thumbnail = new FileUploadWithPreview('p_thumbnail')
        var p_gallery = new FileUploadWithPreview('p_gallery')
    </script>
    <script>
        $(document).ready(function(){
            $('#select2').select2();
            CKEDITOR.replace('p_detail');
            $('#div-schedule').hide();
            // toogle schedule div
            $('#btn-schedule').on('click', function(e){
                e.preventDefault();
                $('#div-schedule').toggle();
            });
        });
    </script>
</body>

</html>
