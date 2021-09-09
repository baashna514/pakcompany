<style>
    a.u-button-style.u-button-style.u-text-hover-palette-2-base:hover, a.u-button-style.u-button-style.u-text-hover-palette-2-base[class*="u-border-"]:hover, a.u-button-style.u-button-style.u-text-hover-palette-2-base:focus, a.u-button-style.u-button-style.u-text-hover-palette-2-base[class*="u-border-"]:focus, a.u-button-style.u-button-style.u-button-style.u-text-active-palette-2-base:active, a.u-button-style.u-button-style.u-button-style.u-text-active-palette-2-base[class*="u-border-"]:active, a.u-button-style.u-button-style.u-button-style.u-text-active-palette-2-base.active, a.u-button-style.u-button-style.u-button-style.u-text-active-palette-2-base[class*="u-border-"].active, :not(.level-2) > .u-nav > .u-nav-item > a.u-nav-link.u-text-hover-palette-2-base:hover, :not(.level-2) > .u-nav > .u-nav-item > a.u-nav-link.u-nav-link.u-text-active-palette-2-base.active, .u-popupmenu-items.u-text-hover-palette-2-base .u-nav-link:hover, .u-popupmenu-items.u-popupmenu-items.u-text-hover-palette-2-base .u-nav-link.active{
        color: #150c67 !important;
    }
</style>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<div class="u-custom-menu u-nav-container">
    <ul class="u-nav u-unstyled u-nav-1">
        @php
            $menus = \App\Menu::orderBy('id', 'ASC')->with('category.subcategories')->get();
        @endphp
        @if ($menus)
            @foreach ($menus as $key=>$menu)
                @php
                    $cat = str_replace(' ', '-', $menu->category['name']);
                @endphp
                <li class="u-nav-item">
                    <a class="u-button-style u-nav-link <?php if($key == 0) { echo 'u-text-active-palette-1-base'; } ?> u-text-hover-palette-2-base" href="{{ route('category-products', ['name' =>$cat]) }}" style="padding: 10px 10px;">
                        <img src="{{ asset('public/menu').'/'.$menu->icon }}" alt="">
                        {{ $menu->category['name'] }}
                    </a>
                    @if ($menu->category->subcategories)
                        <div class="dropdown-content">
                            @foreach ($menu->category->subcategories as $subcategory)
                            @php
                                $sub = str_replace(' ', '-', $subcategory->name);
                            @endphp
                                <a href="{{ route('subcategory-products', ['name' =>$sub]) }}">{{ $subcategory->name }}</a>
                            @endforeach
                        </div>
                    @endif
                </li>
            @endforeach
        @endif
    </ul>
    <!-- start menu cart --> 
    @php
        $sum = 0;
        $carts = \App\Cart::where('user_id', session('user_id'))->get();
        if ($carts) {
            $sum = count($carts);
        }
    @endphp
   <div class="side_cart">
    <ul class="nav navbar-right cart" style="float: right;margin-top: 0px;">
        <li class="dropdown" id="show-cart-section" style="margin-top: 25px; !important">
            
        </li>
      </ul>
   </div>
    <!-- end menu cart -->
</div>
<div class="u-custom-menu u-nav-container-collapse">
    <div class="u-black u-container-style u-inner-container-layout u-opacity u-opacity-95 u-sidenav">
        <div class="u-menu-close"></div>
        <ul class="u-align-center u-nav u-popupmenu-items u-unstyled u-nav-2">
            @if ($menus)
                @foreach ($menus as $key=>$menu)
                @php
                    $cat = str_replace(' ', '-', $menu->category['name']);
                @endphp
                    <li class="u-nav-item">
                        <a class="u-button-style u-nav-link" href="{{ route('category-products', ['name' =>$cat]) }}" style="padding: 10px 20px;">
                            <img src="{{ asset('public/menu').'/'.$menu->icon }}" alt="">
                            {{ $menu->category['name'] }}
                        </a>
                        @if ($menu->category->subcategories)
                            <div class="dropdown-content">
                                @foreach ($menu->category->subcategories as $subcategory)
                                @php
                                    $sub = str_replace(' ', '-', $subcategory->name);
                                @endphp
                                    <a href="{{ route('subcategory-products', ['name' =>$sub]) }}">{{ $subcategory->name }}</a>
                                @endforeach
                            </div>
                        @endif
                    </li>
                @endforeach
            @endif
            <li class="u-nav-item">
                <a href="{{ route('view-cart') }}" class="class="u-button-style u-nav-link" style="color: #fff"><i class="fa fa-shopping-cart" style="font-size: 28px; color:#fff;    padding-top: 13px;"></i> Cart</a>
            </li>
            @if (Auth::user())
                @if (Auth::user()->is_admin == FALSE)
                    <li class="u-nav-item">
                        <a href="{{ route('wishlist.display') }}" class="class="u-button-style u-nav-link" style="color: #fff"><i class="fa fa-heart" style="font-size: 28px; color:#fff;    padding-top: 13px;"></i> Wishlist</a>
                    </li>
                @endif
            @endif
        </ul>
    </div>
    <div class="u-black u-menu-overlay u-opacity u-opacity-70"></div>
</div>