<style>
    #sub-menu:hover{
        box-shadow:0 0 5px rgba(0, 0, 0, 0.15);
        padding: 8px;
    }
    .search {
    position: relative;
    display: inline-block;
    }
    input {
  border: 1px solid transparent;
  background-color: #f1f1f1;
  padding: 10px;
  font-size: 16px;
  color: rgb(56, 54, 54);
}

input[type=text] {
  background-color: #f1f1f1;
  width: 100%;
  color: rgb(56, 54, 54);
}

input[type=submit] {
  background-color: DodgerBlue;
  color: rgb(56, 54, 54);
  cursor: pointer;
}

.autocomplete-items {
  position: absolute;
  border: 1px solid #d4d4d4;
  border-bottom: none;
  border-top: none;
  z-index: 99;
  top: 100%;
  left: 0;
  right: 0;
}

.autocomplete-items div {
  padding: 10px;
  cursor: pointer;
  background-color: #fff; 
  border-bottom: 1px solid #d4d4d4; 
  color: rgb(56, 54, 54);
}

/*when hovering an item:*/
.autocomplete-items div:hover {
  background-color: #e9e9e9; 
  color: rgb(36, 31, 31);
}

/*when navigating through the items using the arrow keys:*/
.autocomplete-active {
  background-color: DodgerBlue !important; 
  color: #ffffff; 
  color: rgb(36, 31, 31);
}

::-webkit-scrollbar-track
{
    -webkit-box-shadow: inset 0 0 6px rgba(85, 83, 83, 0.3);
    border-radius: 4px;
    background-color: #F5F5F5;
}

::-webkit-scrollbar
{
    width: 12px;
    background-color: #F5F5F5;
}

::-webkit-scrollbar-thumb
{
    border-radius: 4px;
    -webkit-box-shadow: inset 0 0 6px rgba(85, 83, 83, 0.3);
    background-color: #585656;
}

#search {
    width: 40%;
    /* color: #fff !important; */
    box-sizing: border-box;
    border: 1px solid #0c8d4d;
    border-radius: 4px;
    font-size: 16px;
    line-height: 2;
    background-color: white;
    background-image: url(https://cdn2.iconfinder.com/data/icons/font-awesome/1792/search-512.png);
    background-position: 10px 10px;
    background-repeat: no-repeat;
    padding: 0px 12px 0px 22px;
    -webkit-transition: width 0.4s ease-in-out;
    transition: width 0.4s ease-in-out;
    float: right;
    margin-right: 24px;
}
#search:focus {
  width: 40%;
  border: 1px solid #0c8d4d !important;
}



/* Desktops and laptops ----------- */
@media only screen 
and (min-width : 1224px) {
    #mobile-menu-section {
        display: none;
    }
}

@media only screen 
and (min-width : 1001px) {
    #mobile-menu-section {
        display: none;
    }
}

/* Large screens ----------- */
@media only screen 
and (min-width : 1824px) {
    #mobile-menu-section {
        display: none;
    }
}




/* Mobile Version */
@media (min-width:320px)  { 
    /* smartphones, iPhone, portrait 480x320 phones */ 
    /* #desktop-menu-section{
        display: none;
    } */
    .modtitle{
        padding: 10px;
    }
    .category-style .list-group>li a{
        color: #fff;
    }
    .box-category>ul>li:hover>a{
        color: #fff;
    }
    .box-category>ul>li ul{
        background: #6b6b6b;
    }
    .layer2{
        background: #888888 !important;
    }
    .layer3{
        background: #636363 !important;
    }
    .category-style .list-group>li li{
        border-bottom: 1px solid;
    }
}

@media only screen and (max-width: 1000px) {
  #desktop-menu-section{
        display: none;
    }
}
@media (min-width:481px)  { 
    /* portrait e-readers (Nook/Kindle), smaller tablets @ 600 or @ 640 wide. */ 
    .modtitle{
        padding: 10px;
    }
    .category-style .list-group>li a{
        color: #fff;
    }
    .box-category>ul>li:hover>a{
        color: #fff;
    }
    .box-category>ul>li ul{
        background: #6b6b6b;
    }
    .layer2{
        background: #888888 !important;
    }
    .layer3{
        background: #636363 !important;
    }
    .category-style .list-group>li li{
        border-bottom: 1px solid;
    }
}
.box-category>ul>li ul {
    margin-left: 8px;
}
@media (max-width: 767px){
    .megamenu-style-dev .navbar-default .horizontal .megamenu-wrapper {
        padding: 20px 14px 20px 8px!important;
    }
}
</style>
<?php
    $row = \App\ThemeSetting::first();
    $products = \App\Product::all();
    $pro = array();
    foreach($products as $product){
        $pro[]= $product->name;
    }

    $menus = \App\Category::with('subcategories', 'subcategory1', 'subcategory2')->get();
?>
<header id="header" class=" typeheader-4">
    <!-- Header Top -->
    <div class="header-top hidden-compact">
        <div class="container">
            <div class="row">
                <div class="header-top-left col-lg-6 col-md-4 col-sm-6 col-xs-7">
                    <ul class="top-link list-inline lang-curr">
                        <li class="hidden-sm hidden-xs"><a href="mailto:pakcompany@hotmail.com"><i class="fa fa-envelope"></i> pakcompany@hotmail.com</a></li>
                        <li class="hidden-sm hidden-xs"><a href="callto:03216788889"><i class="fa fa-phone"></i> +92-321-678-8889</a></li>
                    </ul>
                </div>
                <div class="header-top-right collapsed-block col-lg-6 col-md-8 col-sm-6 col-xs-5">
                    <ul class="top-link list-inline">
                        <li class="checkout hidden-sm hidden-xs" id="show-wishlist-section">
                            
                        </li>
                        @if (Auth::user())  
                            <li class="checkout hidden-sm hidden-xs"><a href="{{ route('my-account') }}" class="btn-link" title="Compare List "><span ><i class="fa fa-user"></i> My Account</span></a>
                            </li>
                        @endif
                        @if(!Auth::check())
                        <li class="hidden-xs"><a href="{{ route('login-account') }}">Login/</a><a href="{{ route('register-account') }}">Register</a>
                        </li>
                        @else
                            <li class="hidden-sm hidden-xs"><a href="{{route('user.logout')}}" title="Logout"><i class="fa fa-sign-out"></i> Logout </a></li>
                        @endif
                    </ul>                    
                </div>
            </div>
        </div>
    </div>
    <!-- //Header Top -->
    <!-- Header center -->
    <div class="header-middle">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 header-social">
                    <ul>
                        <li style="margin-left: 5px;letter-spacing: 12px;"><a href="https://www.facebook.com/PakCompanyOfficial/" target="_blank" style="color:#585656;"><img src="{{asset('public/front/image/facebook.webp')}}" alt="facebook" title="Facebook" style="width: 40px;"></a>
                            <a href="https://www.instagram.com/pakcompanyofficial/" style="color:#585656;"><img src="{{asset('public/front/image/instagram.webp')}}" title="Instagram" alt="instagram" style="width: 40px;"></a>
                            <a href="https://wa.me/923334210917/?text=Hi..! How may i help you?" style="color:#585656;"><img src="{{asset('public/front/image/whatsapp.webp')}}" alt="whatsapp" title="Whatsapp" style="width: 40px;"></a>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-4 header-logo">
                    <div class="logo" style="text-align: center;margin-top: -40px;margin-bottom: -20px;"><a href="{{ route('index') }}"><img src="{{asset('public/theme').'/'.$row->hd_img_logo}}" title="Your Store" alt="Your Logo Here" style="width: 85%;margin-top:15px;"/></a></div>
                </div>
                <div class="col-lg-4">
                    <ul>
                        <li>
                            <div class="shopping_cart">
                                <div id="cart" class="btn-shopping-cart">
                                    
                                </div>
                            </div>
                        </li>
                        <li>
                            <form class="header-search" method="POST" action="{{route('main-search')}}">
                                <input type="text" id="search" name="search" placeholder="Search.." required>
                                @csrf
                                <button type="submit" class="btn btn-success" style="background-color: #0c8d4d;border-color: #effdf6;border-radius: 4px !important;color:#fff;">Search</button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
    <!-- //Header center -->

    <!-- Header Bottom -->
    <div class="header-bottom hidden-compact">
        <div class="container">
            <div class="row">
                
                <div class="bottom1 menu-vertical col-lg-2 col-md-3">
                    <!-- Secondary menu -->
                    @include('front.layout.menu')
                    <!-- // end Secondary menu -->
                </div>

                <!--Left Part Start -->
                {{-- <aside class="col-sm-4 col-md-3 content-aside" id="column-left">
                    <div class="module category-style">
                        <h3 class="modtitle">Categories</h3>
                        <div class="modcontent">
                            <div class="box-category">
                                <ul id="cat_accordion" class="list-group">
                                    <li class="hadchild"><a href="category.html" class="cutom-parent">Smartphone & Tablets</a>   <span class="button-view  fa fa-plus-square-o"></span>
                                        <ul style="display: block;">
                                            <li><a href="category.html">Men's Watches</a></li>
                                            <li><a href="category.html">Women's Watches</a></li>
                                            <li><a href="category.html">Kids' Watches</a></li>
                                            <li><a href="category.html">Accessories</a></li>
                                        </ul>
                                    </li>
                                    <li class="hadchild"><a class="cutom-parent" href="category.html">Electronics</a>   <span class="button-view  fa fa-plus-square-o"></span>
                                        <ul style="display: none;">
                                            <li><a href="category.html">Cycling</a></li>
                                            <li><a href="category.html">Running</a></li>
                                            <li><a href="category.html">Swimming</a></li>
                                            <li><a href="category.html">Football</a></li>
                                            <li><a href="category.html">Golf</a></li>
                                            <li><a href="category.html">Windsurfing</a></li>
                                        </ul>
                                    </li>
                                    <li class="hadchild"><a href="category.html" class="cutom-parent">Shoes</a>   <span class="button-view  fa fa-plus-square-o"></span>
                                        <ul style="display: none;">
                                            <li><a href="category.html">Sub Categories</a></li>
                                            <li><a href="category.html">Sub Categories</a></li>
                                            <li><a href="category.html">Sub Categories</a></li>
                                            <li><a href="category.html">Sub Categories</a></li>
                                            <li><a href="category.html">Sub Categories</a></li>
                                        </ul>
                                    </li>
                                    <li class="hadchild"><a href="category.html" class="cutom-parent">Watches</a>  <span class="button-view  fa fa-plus-square-o"></span>
                                        <ul style="display: none;">
                                            <li><a href="category.html">Men's Watches</a></li>
                                            <li><a href="category.html">Women's Watches</a></li>
                                            <li><a href="category.html">Kids' Watches</a></li>
                                            <li><a href="category.html">Accessories</a></li>
                                        </ul>
                                    </li>
                                    <li class="hadchild"><a href="category.html" class="cutom-parent">Jewellery</a>    <span class="button-view  fa fa-plus-square-o"></span>
                                        <ul style="display: none;">
                                            <li><a href="category.html">Sub Categories</a></li>
                                            <li><a href="category.html">Sub Categories</a></li>
                                            <li><a href="category.html">Sub Categories</a></li>
                                            <li><a href="category.html">Sub Categories</a></li>
                                            <li><a href="category.html">Sub Categories</a></li>
                                        </ul>
                                    </li>
                                    <li class=""><a href="category.html" class="cutom-parent">Health &amp; Beauty</a>  <span class="dcjq-icon"></span></li>
                                    <li class=""><a href="category.html" class="cutom-parent">Kids &amp; Babies</a>    <span class="dcjq-icon"></span></li>
                                    <li class=""><a href="category.html" class="cutom-parent">Sports</a>  <span class="dcjq-icon"></span></li>
                                    <li class=""><a href="category.html" class="cutom-parent">Home &amp; Garden</a><span class="dcjq-icon"></span></li>
                                    <li class=""><a href="category.html" class="cutom-parent">Wines &amp; Spirits</a>  <span class="dcjq-icon"></span></li>
                                </ul>
                            </div>
                            
                            
                        </div>
                    </div>
                    <div class="module product-simple">
                        <h3 class="modtitle">
                            <span>Latest products</span>
                        </h3>
                        <div class="modcontent">
                            <div class="extraslider" >
                                <!-- Begin extraslider-inner -->
                                <div class=" extraslider-inner">
                                    <div class="item ">
                                        <div class="product-layout item-inner style1 ">
                                            <div class="item-image">
                                                <div class="item-img-info">
                                                    <a href="#" target="_self" title="Mandouille short ">
                                                        <img src="image/catalog/demo/product/80/8.jpg" alt="Mandouille short">
                                                        </a>
                                                </div>
                                                
                                            </div>
                                            <div class="item-info">
                                                <div class="item-title">
                                                    <a href="#" target="_self" title="Mandouille short">Mandouille short </a>
                                                </div>
                                                <div class="rating">
                                                    <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                    <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                    <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                    <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                    <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                </div>
                                                <div class="content_price price">
                                                    <span class="price-new product-price">$55.00 </span>&nbsp;&nbsp;

                                                    <span class="price-old">$76.00 </span>&nbsp;

                                                </div>
                                            </div>
                                            <!-- End item-info -->
                                            <!-- End item-wrap-inner -->
                                        </div>
                                        <!-- End item-wrap -->
                                        <div class="product-layout item-inner style1 ">
                                            <div class="item-image">
                                                <div class="item-img-info">
                                                    <a href="#" target="_self" title="Xancetta bresao ">
                                                            <img src="image/catalog/demo/product/80/7.jpg" alt="Xancetta bresao">
                                                            </a>
                                                </div>
                                                
                                            </div>
                                            <div class="item-info">
                                                <div class="item-title">
                                                    <a href="#" target="_self" title="Xancetta bresao">
                                                                Xancetta bresao 
                                                            </a>
                                                </div>
                                                <div class="rating">
                                                    <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                    <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                    <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                    <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                    <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                </div>
                                                <div class="content_price price">
                                                    <span class="price-new product-price">$80.00 </span>&nbsp;&nbsp;

                                                    <span class="price-old">$89.00 </span>&nbsp;



                                                </div>
                                            </div>
                                            <!-- End item-info -->
                                            <!-- End item-wrap-inner -->
                                        </div>
                                        <!-- End item-wrap -->
                                        <div class="product-layout item-inner style1 ">
                                            <div class="item-image">
                                                <div class="item-img-info">
                                                    <a href="#" target="_self" title="Sausage cowbee ">
                                                                <img src="image/catalog/demo/product/80/6.jpg" alt="Sausage cowbee">
                                                                </a>
                                                </div>
                                            
                                            </div>
                                            <div class="item-info">
                                                <div class="item-title">
                                                    <a href="#" target="_self" title="Sausage cowbee">
                                                                Sausage cowbee 
                                                            </a>
                                                </div>
                                                <div class="rating">
                                                    <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                    <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                    <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                    <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                    <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                </div>
                                            
                                                <div class="content_price price">
                                                    <span class="price product-price">
                                                                    $66.00 
                                                                </span>
                                                </div>
                                            </div>
                                            <!-- End item-info -->
                                            <!-- End item-wrap-inner -->
                                        </div>
                                        <!-- End item-wrap -->
                                        <div class="product-layout item-inner style1 ">
                                            <div class="item-image">
                                                <div class="item-img-info">
                                                    <a href="#" target="_self" title="Chicken swinesha ">
                                                    <img src="image/catalog/demo/product/80/5.jpg" alt="Chicken swinesha">
                                                    </a>
                                                </div>
                                            
                                            </div>
                                            <div class="item-info">
                                                <div class="item-title">
                                                    <a href="#" target="_self" title="Chicken swinesha">
                                                                Chicken swinesha 
                                                            </a>
                                                </div>
                                                <div class="rating">
                                                    <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                    <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                    <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                    <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                    <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                </div>
                                                <div class="content_price price">
                                                    <span class="price-new product-price">$45.00 </span>&nbsp;&nbsp;

                                                    <span class="price-old">$56.00 </span>&nbsp;



                                                </div>
                                            </div>
                                            <!-- End item-info -->
                                            <!-- End item-wrap-inner -->
                                        </div>
                                        <!-- End item-wrap -->
                                    </div>
                                
                                </div>
                                <!--End extraslider-inner -->
                            </div>
                        </div>
                    </div>
                    <div class="module banner-left hidden-xs ">
                        <div class="banner-sidebar banners">
                        <div>
                            <a title="Banner Image" href="#"> 
                            <img src="image/catalog/banners/banner-sidebar.jpg" alt="Banner Image"> 
                            </a>
                        </div>
                        </div>
                    </div>
                </aside> --}}
                <!--Left Part End -->

                <!-- Main menu -->
                <div class="main-menu col-lg-10 col-md-9">
                    <div class="responsive so-megamenu megamenu-style-dev">
                        <nav class="navbar-default">
                            <div class=" container-megamenu  horizontal open ">
                                <div class="navbar-header">
                                    <button type="button" id="show-megamenu" data-toggle="collapse" class="navbar-toggle">
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                    </button>
                                </div>
                                <div class="megamenu-wrapper">
                                    <span id="remove-megamenu" class="fa fa-times"></span>
                                    <div class="megamenu-pattern">
                                        <div class="module category-style" id="mobile-menu-section">
                                            <h3 class="modtitle">Categories</h3>
                                            <div class="modcontent">
                                                <div class="box-category">
                                                    <ul id="cat_accordion" class="list-group">
                                                        @foreach ($menus as $category)
                                                            @php
                                                                $cat = str_replace(' ', '-', $category->name); 
                                                            @endphp
                                                            <li <?php if(count($category->subcategories)>0){ ?>class="hadchild" <?php } ?> ><a href="{{route('category-products-list',['name' => $cat, 'id' => $category->id])}}" class="cutom-parent">{{$category->name}}</a>   <span <?php if(count($category->subcategories)>0){ ?>class="button-view  fa fa-plus-square-o" <?php } ?> ></span>
                                                                @if($category->subcategories)
                                                                    <ul style="display: block;">
                                                                        @foreach ($category->subcategories as $subcategory)
                                                                            <li <?php if(count($subcategory->subcategory1)>0){ ?>class="hadchild" <?php } ?> ><a href="{{route('subcategory-products-list',['id' => encrypt($subcategory->id)])}}" class="cutom-parent">{{$subcategory->name}}</a>   <span <?php if(count($subcategory->subcategory1)>0){ ?>class="button-view  fa fa-plus-square-o" <?php }  else{ echo'class="dcjq-icon"'; }?> ></span>
                                                                                @if ($subcategory->subcategory1)
                                                                                    <ul style="display: none;" class="layer2">
                                                                                        @foreach ($subcategory->subcategory1 as $sub1)
                                                                                            <li <?php if(count($sub1->subcategory2)>0){ ?>class="hadchild" <?php } ?>><a href="{{route('subcategory1-products-list',['id' => encrypt($sub1->id)])}}" class="cutom-parent">{{$sub1->name}}</a>   <span <?php if(count($sub1->subcategory2)>0){ ?>class="button-view  fa fa-plus-square-o" <?php }  else{ echo'class="dcjq-icon"'; }?> ></span>
                                                                                                @if ($sub1->subcategory2)
                                                                                                    <ul style="display: none;" class="layer3">
                                                                                                        @foreach ($sub1->subcategory2 as $sub2)
                                                                                                        <li><a href="{{route('subcategory2-products-list',['id' => encrypt($sub2->id)])}}">{{$sub2->name}}</a></li>
                                                                                                        @endforeach
                                                                                                    </ul>
                                                                                                @endif
                                                                                            </li>
                                                                                        @endforeach
                                                                                    </ul>
                                                                                @endif
                                                                            </li>
                                                                        @endforeach
                                                                        {{-- <li><a href="category.html">Women's Watches</a></li> --}}
                                                                        {{-- <li><a href="category.html">Kids' Watches</a></li> --}}
                                                                        {{-- <li><a href="category.html">Accessories</a></li> --}}
                                                                    </ul>
                                                                @endif
                                                            </li>
                                                        @endforeach
                                                        {{-- <li class="hadchild"><a class="cutom-parent" href="category.html">Electronics</a>   <span class="button-view  fa fa-plus-square-o"></span>
                                                            <ul style="display: none;">
                                                                <li><a href="category.html">Cycling</a></li>
                                                            </ul>
                                                        </li>
                                                        <li class="hadchild"><a href="category.html" class="cutom-parent">Shoes</a>   <span class="button-view  fa fa-plus-square-o"></span>
                                                            <ul style="display: none;">
                                                                <li><a href="category.html">Sub Categories</a></li>
                                                            </ul>
                                                        </li>
                                                        <li class="hadchild"><a href="category.html" class="cutom-parent">Watches</a>  <span class="button-view  fa fa-plus-square-o"></span>
                                                            <ul style="display: none;">
                                                                <li><a href="category.html">Men's Watches</a></li>
                                                            </ul>
                                                        </li>
                                                        <li class="hadchild"><a href="category.html" class="cutom-parent">Jewellery</a>    <span class="button-view  fa fa-plus-square-o"></span>
                                                            <ul style="display: none;">
                                                                <li><a href="category.html">Sub Categories</a></li>
                                                            </ul>
                                                        </li> --}}
                                                        {{-- <li class=""><a href="category.html" class="cutom-parent">Health &amp; Beauty</a>  <span class="dcjq-icon"></span></li> --}}
                                                    </ul>
                                                </div>
                                                
                                                
                                            </div>
                                        </div>
                                        {{-- Home Menu --}}
                                        <div class="container-mega">
                                            <ul class="megamenu" data-transition="slide" data-animationtime="250">
                                                <li class="" id="Home">
                                                    <a href="{{ route('index') }}">Home</a>
                                                </li>
                                                <li class=""  id="About Us">
                                                    <p class="close-menu"></p>
                                                    <a href="{{ route('about') }}" class="clearfix">About Us</a>
                                                </li>
                                                <li class="" id="Shop">
                                                    <p class="close-menu"></p>
                                                    <a href="{{ route('products-list') }}" class="clearfix">Shop</a>
                                                </li>
                                                <li class="" id="Contact Us">
                                                    <p class="close-menu"></p>
                                                    <a href="{{route('contact')}}" class="clearfix">Contact Us</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </nav>
                    </div>
                </div>
                <!-- //end Main menu -->  
            </div>
        </div>

    </div>

</header>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function(){
        $.get('{{ route("main-header.get-wishlist") }}', function(response){
            $('#show-wishlist-section').empty().append(response);
        });
    });
</script>
<script>
    function autocomplete(inp, arr) {
      /*the autocomplete function takes two arguments,
      the text field element and an array of possible autocompleted values:*/
      var currentFocus;
      /*execute a function when someone writes in the text field:*/
      inp.addEventListener("input", function(e) {
          var a, b, i, val = this.value;
          /*close any already open lists of autocompleted values*/
          closeAllLists();
          if (!val) { return false;}
          currentFocus = -1;
          /*create a DIV element that will contain the items (values):*/
          a = document.createElement("DIV");
          a.setAttribute("id", this.id + "autocomplete-list");
          a.setAttribute("class", "autocomplete-items");
          /*append the DIV element as a child of the autocomplete container:*/
          this.parentNode.appendChild(a);
          /*for each item in the array...*/
          for (i = 0; i < arr.length; i++) {
            /*check if the item starts with the same letters as the text field value:*/
            if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
              /*create a DIV element for each matching element:*/
              b = document.createElement("DIV");
              /*make the matching letters bold:*/
              b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
              b.innerHTML += arr[i].substr(val.length);
              /*insert a input field that will hold the current array item's value:*/
              b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
              /*execute a function when someone clicks on the item value (DIV element):*/
              b.addEventListener("click", function(e) {
                  /*insert the value for the autocomplete text field:*/
                  inp.value = this.getElementsByTagName("input")[0].value;
                  /*close the list of autocompleted values,
                  (or any other open lists of autocompleted values:*/
                  closeAllLists();
              });
              a.appendChild(b);
            }
          }
      });
      /*execute a function presses a key on the keyboard:*/
      inp.addEventListener("keydown", function(e) {
          var x = document.getElementById(this.id + "autocomplete-list");
          if (x) x = x.getElementsByTagName("div");
          if (e.keyCode == 40) {
            /*If the arrow DOWN key is pressed,
            increase the currentFocus variable:*/
            currentFocus++;
            /*and and make the current item more visible:*/
            addActive(x);
          } else if (e.keyCode == 38) { //up
            /*If the arrow UP key is pressed,
            decrease the currentFocus variable:*/
            currentFocus--;
            /*and and make the current item more visible:*/
            addActive(x);
          } else if (e.keyCode == 13) {
            /*If the ENTER key is pressed, prevent the form from being submitted,*/
            e.preventDefault();
            if (currentFocus > -1) {
              /*and simulate a click on the "active" item:*/
              if (x) x[currentFocus].click();
            }
          }
      });
      function addActive(x) {
        /*a function to classify an item as "active":*/
        if (!x) return false;
        /*start by removing the "active" class on all items:*/
        removeActive(x);
        if (currentFocus >= x.length) currentFocus = 0;
        if (currentFocus < 0) currentFocus = (x.length - 1);
        /*add class "autocomplete-active":*/
        x[currentFocus].classList.add("autocomplete-active");
      }
      function removeActive(x) {
        /*a function to remove the "active" class from all autocomplete items:*/
        for (var i = 0; i < x.length; i++) {
          x[i].classList.remove("autocomplete-active");
        }
      }
      function closeAllLists(elmnt) {
        /*close all autocomplete lists in the document,
        except the one passed as an argument:*/
        var x = document.getElementsByClassName("autocomplete-items");
        for (var i = 0; i < x.length; i++) {
          if (elmnt != x[i] && elmnt != inp) {
            x[i].parentNode.removeChild(x[i]);
          }
        }
      }
      /*execute a function when someone clicks in the document:*/
      document.addEventListener("click", function (e) {
          closeAllLists(e.target);
      });
    }

    
    var countries = <?php echo json_encode($pro); ?>;
    autocomplete(document.getElementById("search"), countries);

    $('li').click(function(e) {
        $('li').removeClass("active");
        $(this).addClass("active");
    });
    // }

    
</script>