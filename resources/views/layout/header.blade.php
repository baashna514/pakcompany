<link rel="stylesheet" href="{{ asset('public/front/cart/css/reset.css') }}"> <!-- CSS reset -->
<link rel="stylesheet" href="{{ asset('public/front/cart/css/style.css') }}"> <!-- Gem style -->
<script src="{{ asset('public/front/cart/js/modernizr.js') }}"></script> <!-- Modernizr -->
{{-- <script src="{{ asset('public/js/common.js') }}"></script> --}}
<style>
   .menu-main li a img {
      vertical-align: text-top;
   }

            @media only screen and (min-width: 601px){
            .txt {
            padding: 200px;
            background-size: cover !important;
                     }}
            @media only screen and (max-width: 600px){
                        .header .logo a {
                        line-height: 36px;
                     
                           }
                     .logo {
                     width: 119px;}
                     .txt {
                        background-size: contain !important;
            /* padding: 30px; */
            padding: 45px !important;
                     }
               }

</style>
@php
    $row = \App\ThemeSetting::first();
@endphp
<div class="container">
   <div class="row v-center">
      <div class="header-item item-left">
         <div class="logo">
            <a href="{{ route('index') }}" title="Logo">
               @if ($row)
                   <img src="{{ asset('public/theme/'.'/'.$row->hd_img_logo) }}" alt="No Logo">
               @endif
            </a>
         </div>
      </div>
      <!-- menu start here -->
      <div class="header-item item-center">
         <div class="menu-overlay">
         </div>
         <nav class="menu">
            <div class="mobile-menu-head">
               <div class="go-back"><i class="fa fa-angle-left"></i></div>
               <div class="current-menu-title"></div>
               <div class="mobile-menu-close">&times;</div>
            </div>
            <ul class="menu-main">
               <li>
                  <a title="Home" href="{{ route('index') }}"><i class="fa fa-home"></i> Home</a>
               </li>
               @php
                  $menus = \App\Menu::orderBy('id', 'ASC')->with('category.subcategories')->get();
               @endphp
               @if ($menus)
                  @foreach ($menus as $key=>$menu)
                     @php
                        $cat = str_replace(' ', '-', $menu->category['name']);
                     @endphp
                     <li class="menu-item-has-children">
                        <a href="{{ route('category-products', ['name' =>$cat]) }}"><img src="{{ asset('public/menu').'/'.$menu->icon }}" alt="">{{ $menu->category['name'] }} <i class="fa fa-angle-down"></i></a>
                        <div class="sub-menu mega-menu mega-menu-column-4">
                           @if ($menu->category->subcategories)
                              @foreach ($menu->category->subcategories as $subcategory)
                                 @php
                                    $sub = str_replace(' ', '-', $subcategory->name);
                                 @endphp
                                 <div class="list-item text-center">
                                    <a href="{{ route('subcategory-products', ['name' =>$sub]) }}"">
                                    <img src="{{ asset('public/subcategories').'/'.$subcategory->image }}" alt="new Product">
                                    <h4 class="title">{{ $subcategory->name }}</h4>
                                    </a>
                                 </div>
                              @endforeach
                           @endif
                        </div>
                     </li>
                  @endforeach
               @endif
               <li class="menu-item-has-children">
                  <a href="#">More <i class="fa fa-angle-down"></i></a>
                  <div class="sub-menu">
                     <div class="list-item text-center">
                        <a href="{{ route('about') }}" title="About Us">
                        <h4 class="title">About Us</h4>
                        </a>
                     </div>
                     <div class="list-item text-center">
                        <a href="{{ route('ceo') }}" title="CEO Message">
                        <h4 class="title">CEO Message</h4>
                        </a>
                     </div>
                     <div class="list-item text-center" title="Contact Us">
                        <a href="{{ route('contact') }}">
                        <h4 class="title">Contact Us</h4>
                        </a>
                     </div>
                  </div>
               </li>

            </ul>
         </nav>
      </div>
      <!-- menu end here -->
      @php
         if(Auth::check()){
            if(Auth::user()->id){
               $carts = \App\Cart::where('user_id', session('user_id'))->orWhere('session_id', session('user_id'))->get();
            }
         }
         else{
            $carts = \App\Cart::where('user_id', session('user_id'))->orWhere('session_id', session('user_id'))->get();
         }
      @endphp
      @if (count($carts) > 0)
         @php
            $num = count($carts);
         @endphp
      @else
            @php
                  $num = 0;
            @endphp
      @endif
      <div class="header-item item-right">
         @if (Auth::check())
            @if(Auth::user()->is_admin == FALSE)
               @php
                  $count = count(\App\WishList::where('user_id', Auth::user()->id)->get());
               @endphp
                  <a href="{{ route('wishlist.display') }}" title="Wishlist"> 
                     <i class="fa fa-heart"></i>
                     <span>{{ $count }}</span>
                  </a>
            @endif
         @endif
         <a href="#0" id="cd-cart-trigger" title="Shopping Cart" id="cart-icon">
            <i class="fa fa-shopping-cart"></i>
            <span>{{ $num }}</span>
         </a>
         @if (!Auth::check())
            <a href="{{ route('login-form') }}" title="Login or Register">Login/Register</a>
         @else
            <a href="{{ route('user.logout') }}" title="Logout"><i class="fa fa-sign-out"></i>logout</a>
        @endif
        @if (Auth::check())
         <a href="{{ route('user.profile') }}" title="My Profile"><i class="fa fa-user"></i></a>
        @endif
         <!-- mobile menu trigger -->
         <div class="mobile-menu-trigger">
            <span></span>
         </div>
      </div>
   </div>
</div>
<script src="{{ asset('public/front/cart/js/main.js') }}"></script> <!-- Gem jQuery -->
<script>
   $('.fa-angle-down').click(function(e){
      e.preventDefault();
   });
</script>