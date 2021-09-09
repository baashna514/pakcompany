
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
            .product-item-container:hover{
                border-color: rgba(0,0,0,.2);
                box-shadow: 0 5px 20px rgb(0 0 0 / 35%);
                transition: 500ms ease all;
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
            <li><a href="{{ route('index') }}"><i class="fa fa-home"></i></a></li>
            <li><a href="">Products</a></li>
			<li><a href="">{{ $name }}</a></li>
		</ul>
		<div class="row">
			<!--Middle Part Start-->
            <div id="content" class="col-md-9 col-sm-8">
                <div class="products-category">
                    <h3 class="title-category ">Accessories</h3>
                    <div class="category-derc">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="banners">
                                    <div>
                                        <a  href="#"><img src="{{asset('public/front/image/catalog/demo/category/img-cate.jpg')}}" alt="img cate"><br></a>
                                    </div>
                                </div>
                            
                            </div>
                        </div>
                    </div>
                    <!-- Filters -->
                    <div class="product-filter product-filter-top filters-panel">
                        <div class="row">
                            <div class="col-md-5 col-sm-3 col-xs-12 view-mode">
                                
                                    <div class="list-view">
                                        <button class="btn btn-default grid active" data-view="grid" data-toggle="tooltip"  data-original-title="Grid"><i class="fa fa-th"></i></button>
                                        <button class="btn btn-default list" data-view="list" data-toggle="tooltip" data-original-title="List"><i class="fa fa-th-list"></i></button>
                                    </div>
                        
                            </div>
                            <div class="short-by-show form-inline text-right col-md-7 col-sm-9 col-xs-12">
                                <div class="form-group short-by">
                                    <label class="control-label" for="input-sort">Sort By:</label>
                                    <select id="input-sort" class="form-control"
                                    onchange="location = this.value;">
                                        <option value="" selected="selected">Default</option>
                                        <option value="">Name (A - Z)</option>
                                        <option value="">Name (Z - A)</option>
                                        <option value="">Price (Low &gt; High)</option>
                                        <option value="">Price (High &gt; Low)</option>
                                        <option value="">Rating (Highest)</option>
                                        <option value="">Rating (Lowest)</option>
                                        <option value="">Model (A - Z)</option>
                                        <option value="">Model (Z - A)</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="input-limit">Show:</label>
                                    <select id="input-limit" class="form-control" onchange="location = this.value;">
                                        <option value="" selected="selected">15</option>
                                        <option value="">25</option>
                                        <option value="">50</option>
                                        <option value="">75</option>
                                        <option value="">100</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- //end Filters -->
                    <!--changed listings-->
                    <div class="products-list row nopadding-xs so-filter-gird">
                        @if($products)
                            @foreach($products as  $product)
                                <div class="product-layout col-lg-15 col-md-4 col-sm-6 col-xs-12">
                                    <div class="product-item-container">
                                        <div class="left-block">
                                            <div class="product-image-container second_img">
                                                @php
                                                    $name = str_replace(' ', '-', $product->name);
                                                @endphp
                                                <a href="{{ route('product', ['name'=>$name, 'id'=>$product->id]) }}" target="_self" title="Chicken swinesha">
                                                    <img src="{{ asset('public/thumbnail/').'/'.$product->p_thumbnail }}" class="img-1 img-responsive" alt="image">
                                                    <img src="{{ asset('public/thumbnail/').'/'.$product->p_thumbnail }}" class="img-2 img-responsive" alt="image">
                                                </a>
                                            </div>
                                            <div class="box-label"> <span class="label-product label-sale"> -16% </span></div>
                                            <div class="button-group so-quickview cartinfo--left">
                                                <button type="button" class="addToCart btn-button" title="Add to cart" onclick="cart.add('60 ');">  <i class="fa fa-shopping-basket"></i>
                                                    <span>Add to cart </span>   
                                                </button>
                                                <button type="button" class="wishlist btn-button" title="Add to Wish List" onclick="wishlist.add('60');"><i class="fa fa-heart"></i><span>Add to Wish List</span>
                                                </button>
                                                <button type="button" class="compare btn-button" title="Compare this Product " onclick="compare.add('60');"><i class="fa fa-refresh"></i><span>Compare this Product</span>
                                                </button>
                                                <!--quickview-->                                                      
                                                <a class="iframe-link btn-button quickview quickview_handler visible-lg" href="{{ route('quick-view', ['id' => $product->id]) }}" title="Quick view" data-fancybox-type="iframe"><i class="fa fa-eye"></i><span>Quick view</span></a>                                                        
                                                <!--end quickview-->
                                            </div>
                                        </div>
                                        <div class="right-block">
                                            <div class="caption">
                                                <div class="rating">    
                                                    @if (($product->stock) == false)
                                                        <h5 class="text-danger stock-status">Out of Stock</h5>
                                                    @endif
                                                </div>
                                                <h4><a href="{{ route('product', ['name'=>$name, 'id'=>$product->id]) }}" title="Chicken swinesha" target="_self">{{Str::limit($product->name, 30)}}</a></h4>
                                                <div class="price"> <span class="price-new">${{$product->sale_price}}</span>
                                                    <span class="price-old">${{$product->price}}</span>
                                                </div>
                                                <div class="description item-desc">
                                                    <p>{{$product->p_description}} </p>
                                                </div>
                                                <div class="list-block">
                                                    {{-- <button class="addToCart btn-button" type="button" title="Add to Cart" onclick="cart.add('101', '1');"><i class="fa fa-shopping-basket"></i>
                                                    </button> --}}
                                                    <button class="wishlist btn-button" type="button" title="Add to Wish List" onclick="wishlist.add('101');"><i class="fa fa-heart"></i>
                                                    </button>
                                                    <button class="compare btn-button" type="button" title="Compare this Product" onclick="compare.add('101');"><i class="fa fa-refresh"></i>
                                                    </button>
                                                    <!--quickview-->                                                      
                                                    <a class="iframe-link btn-button quickview quickview_handler visible-lg" href="{{ route('quick-view', ['id' => $product->id]) }}" title="Quick view" data-fancybox-type="iframe"><i class="fa fa-eye"></i></a>                                                        
                                                    <!--end quickview-->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                    <!--// End Changed listings-->
                    <!-- Filters -->
                    <div class="product-filter product-filter-bottom filters-panel">
                        <div class="row">
                            <div class="col-sm-6 text-left"></div>
                            <div class="col-sm-6 text-right">Showing 1 to 15 of 15 (1 Pages)</div>
                        </div>
                    </div>
                    <!-- //end Filters -->
                    
                </div>
                
            </div>
            

            <!--Middle Part End-->

			<!--Right Part Start -->
			<aside class="col-sm-4 col-md-3 content-aside" id="column-left">
				
				<div class="module">
   <h3 class="modtitle">Filter </h3>
   <div class="modcontent ">
    <form id="idform" class="type_2" action="{{route('shopfilter')}}">
        @csrf
      <div class="table_layout filter-shopby">
          <div class="table_row">
              <!-- - - - - - - - - - - - - - Category filter - - - - - - - - - - - - - - - - -->
              <div class="table_cell" style="z-index: 103;">
                  <legend>Search</legend>
                  <input class="form-control" type="text" value="" size="50" autocomplete="off" placeholder="Search" name="search">
              </div><!--/ .table_cell -->
              <!-- - - - - - - - - - - - - - End of category filter - - - - - - - - - - - - - - - - -->
              <!-- - - - - - - - - - - - - - SUB CATEGORY - - - - - - - - - - - - - - - - -->
              <div class="table_cell">
                  <fieldset style="height: 500px;overflow-y: scroll;">
                      <legend>Sub Category</legend>
                      <ul class="checkboxes_list">
                          
                          @if($subcategories)
                           @foreach($subcategories as $subcategory)
                          <li>
                              <input type="checkbox" checked="" class="subcategory" value="{{$subcategory->id}}" name="subcategory[]" id="subcategory{{$subcategory->id}}">
                              <label for="subcategory{{$subcategory->id}}">{{$subcategory->name}}</label>
                          </li>
                          @endforeach
                          @endif
                      </ul>

                  </fieldset>

              </div><!--/ .table_cell -->
              <!-- - - - - - - - - - - - - - End SUB CATEGORY - - - - - - - - - - - - - - - - -->
              <!-- - - - - - - - - - - - - - Manufacturer - - - - - - - - - - - - - - - - -->
              <div class="table_cell">
                  <fieldset style="height: 400px;overflow-y: scroll;">
                      <legend>Brands</legend>
                      <ul class="checkboxes_list">
                          
                          @if($brands)
                           @foreach($brands as $brand)
                          <li>
                              <input type="checkbox" checked="" value="{{$brand->id}}" name="brand[]" id="brand{{$brand->id}}">
                              <label for="brand{{$brand->id}}">{{$brand->name}}</label>
                          </li>
                          @endforeach
                          @endif

                      </ul>

                  </fieldset>

              </div><!--/ .table_cell -->
              <!-- - - - - - - - - - - - - - End manufacturer - - - - - - - - - - - - - - - - -->

              <!-- - - - - - - - - - - - - - Price - - - - - - - - - - - - - - - - -->
              <div class="table_cell">
                      <legend>Price</legend> <input type="checkbox" id="priceCheck" name="">
                  
                  <fieldset class="table_cell12">
                      <div class="range">
                          Range :
                          <span class="min_val">$188.73</span> - 
                          <span class="max_val">$1235.15</span>
                          <input type="hidden" name="min_value" class="min_value" value="188.73">
                          <input type="hidden" name="max_value" class="max_value" value="1235.15">
                      </div>
                      <div id="slider" class="ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all">
                          <div class="ui-slider-range ui-widget-header ui-corner-all"></div>
                          <span class="ui-slider-handle ui-state-default ui-corner-all" ></span>
                          <span class="ui-slider-handle ui-state-default ui-corner-all" ></span>
                      </div>
                  </fieldset>
              </div><!--/ .table_cell -->

              <!-- - - - - - - - - - - - - - End price - - - - - - - - - - - - - - - - -->

              <!-- - - - - - - - - - - - - - Price - - - - - - - - - - - - - - - - -->

              <div class="table_cell">

                  <fieldset>

                      <legend>Color</legend>

                      <div class="row">

                          <div class="col-sm-6">
                              
                              <ul class="simple_vertical_list">

                                  <li>
                                      
                                      <input type="checkbox" name="" id="color_btn_1">
                                      <label for="color_btn_1" class="color_btn green">Green</label>

                                  </li>

                                  <li>

                                      <input type="checkbox" name="" id="color_btn_2">
                                      <label for="color_btn_2" class="color_btn yellow">Yellow</label>

                                  </li>

                                  <li>
                                      <input type="checkbox" name="" id="color_btn_3">
                                      <label for="color_btn_3" class="color_btn red">Red</label>

                                  </li>

                              </ul>

                          </div>

                          <div class="col-sm-6">
                              
                              <ul class="simple_vertical_list">

                                  <li>
                                      <input type="checkbox" name="" id="color_btn_4">
                                      <label for="color_btn_4" class="color_btn blue">Blue</label>
                                  </li>

                                  <li>
                                      <input type="checkbox" name="" id="color_btn_5">
                                      <label for="color_btn_5" class="color_btn grey">Grey</label>
                                  </li>

                                  <li>
                                      <input type="checkbox" name="" id="color_btn_6">
                                      <label for="color_btn_6" class="color_btn orange">Orange</label>
                                  </li>

                              </ul>

                          </div>

                      </div>

                  </fieldset>

              </div><!--/ .table_cell -->

              <!-- - - - - - - - - - - - - - End price - - - - - - - - - - - - - - - - -->

          </div><!--/ .table_row -->
          <footer class="bottom_box">
              <div class="buttons_row">
                  <button type="submit"  class="button_grey button_submit">Search</button>
                  <button type="reset" id="configreset" class="button_grey  filter_reset">Reset</button>
              </div>
                  <!--Back To Top-->
      <div class="back-to-top"><i class="fa fa-angle-up"></i></div>
  </footer>
      </div><!--/ .table_layout -->

      

  </form>
   </div>
   
</div>

			</aside>
			<!--Right Part End -->
			
			
		</div>
		<!--Middle Part End-->
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
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="{{ asset('public/front/js/custom.js')}}"></script> 
    <script>
        $(document).ready(function(){
            $.get('{{ route("myCartPage.getCart-onLoad") }}', function(response){
                $('#cart').empty().append(response);
            });
    
            $('[data-countdown]').each(function() {
            var $this = $(this), finalDate = $(this).data('countdown');
            $this.countdown(finalDate, function(event) {
                $this.html(event.strftime('%D days %H:%M:%S'));
            });
            });
        });
    </script>	
	<script type="text/javascript">
	// Check if Cookie exists
		if($.cookie('display')){
			view = $.cookie('display');
		}else{
			view = 'grid';
		}
		if(view) display(view);
        $( document ).ready(function() {
            $("input").removeAttr("checked");
            $('.table_cell12').hide();
            $(".min_value").prop('disabled', true);
            $(".max_value").prop('disabled', true);
        });
        
        $('#priceCheck').click(function(){
           
          if($("#priceCheck").prop('checked') == true){
               $('.table_cell12').show();
               $(".min_value").prop('disabled', false);
               $(".max_value").prop('disabled', false);
           }
           else{
                $('.table_cell12').hide();
            
           }
        });
        $('#configreset').click(function(){
            console.log("clicked ere");
            $("input").removeAttr("checked");
        });
	</script> 
</body>
</html>