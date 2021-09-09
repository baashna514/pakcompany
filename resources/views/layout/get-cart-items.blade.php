<style>
    .dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown-content a:hover {background-color: #f1f1f1}
.u-nav-item:hover .dropdown-content {
  display: block;
}

.badge {
  padding-left: 9px;
  padding-right: 9px;
  -webkit-border-radius: 9px;
  -moz-border-radius: 9px;
  border-radius: 9px;
}

.label-warning[href],
.badge-warning[href] {
  background-color: #c67605;
}
#lblCartCount {
    font-size: 12px;
    background: #ff0000;
    color: #fff;
    padding: 2px 5px;
    vertical-align: top;
    margin-left: 42px;
    margin-top: -40px;
}

.cart img {
    vertical-align: text-top;
    cursor: pointer;
    /* margin-top: 2px; */
    width: 33px;
    padding: 4px;
}

.dropdown-toggle::after {
    margin-left: 0px;
    content: none;
}

	.navbar .nav.cart > li > a span
	{
		background:#4DC7EC;
		padding:2px 5px;
		border-radius:3px;
		font-weight:400px;
		font-family:Montserrat;
		color:#fff;
		margin-left:20px;
	}
.navbar .nav.cart > li > a
	{
		background-position: 0px 2px;
	}

	.navbar .nav.cart > li > a span
	{
		margin:0px;
	}
	
	.cart
	{
		display:inline-block;
		border-left:1px solid #eee;
		float:right;
		margin-right:0px;
		margin-top:4px;
		padding-left:5px;
	}
	.cart img
	{
		vertical-align:text-top;
		cursor: pointer;
		margin-top: 2px;
		padding: 5px;
    	}
	.cart a 
	{
		color:#555;
		font-weight:600;
		font-size:12px;
	}
	.cart a:hover
	{
		text-decoration:none;
	}

	.cart .checkout
	{
		color:#999;
	}

	.cart .checkout a 
	{
		font-size:11px;
		color:#777;
		font-weight:normal;
	}

	.cart-info
{
	background: #fff;
}

.cart .cart-info
{
	/*width:260px;*/
}
.cart-totals .table td 
{
    text-align: right;
}

.cart-info tbody .quantity input[type="text"]
{
   width:auto;
}
.cart-info tbody .quantity input[type="image"]
{
   vertical-align:text-top;
}
.cart-info thead tr
{
   background:#FBFBFB;
   border-top:1px solid #f3f3f3;
}
.cart-info table.table th, table.table td
{
   border:1px solid #f3f3f3;
}
.cart-info thead th 
{
   color:#555;
   font-size:12px;
   font-weight:600;
}
.cart-info tbody .name a
{
   font-size:14px;
   color:#3A3A3A;
}
.cart-info tbody .name a:hover
{
   color:#336699;
}
.cart-info tbody td
{
   color:#777;
   font-size:12px;
   vertical-align:middle;
}
.cart-info.dropdown-menu, .cart-info.dropdown-menu .table tbody
{
	border:none;
	font-size:12px;
}

.cart-info.dropdown-menu table
{
	margin:0px;
}

.cart-info.dropdown-menu > table td
{
	border:none;
	border-bottom:1px solid #eee;
}

.cart-info.dropdown-menu
{
	border:1px solid #eee;
	box-shadow:none;
    z-index: 10001;
    background:#fff;
    padding-top:10px;
}

.cart-info.dropdown-menu  tbody .name a
{
	font-size:12px;
}


.cart-total
{
	padding:10px;
	background:#fafafa;
	text-align:right;
}

.cart-total, .cart-total .checkout
{
}


.cart-total table
{
	display:inline-block;
}


.cart-totals table.table tr , table.table td
{
  border:1px solid #f3f3f3;
  
}
.cart-totals .table th, .table td
{
   border-top:none;
   color:#777;
   font-size:12px;
}

.cart-totals p 
{
	text-align:right;
}

.cart-totals .btn
{
   padding:12px 35px;
}
.product-info #button-cart
{
	 padding: 12px 25px 12px;
	 font-size:11px;
	 color:#fff;
	 border:none;
	 font-weight:600;
}
.product .addcart a:hover
{
    text-decoration:none;
	color:#fff;
	background:#aaa;
}
.product .addcart 
{
    text-align:center;
    height:45px;
    display:none;
}
.product .addcart a 
{
    background:#4DC7EC;
	padding:8px 15px;
	color:#fff;
	font-family:'Open Sans';
	font-weight:600;
	font-size:11px;
	text-transform:uppercase;
}
.side_cart{
float: right;
    
    margin-right: -9%;
 }
img::after{
    content: none;
}
</style>
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
<table class="table">
    <tr>
        <td>
            <li class="dropdown">
                @if ($carts)
                    @php
                        $num = count($carts);

                    @endphp
                @else
                        @php
                            $num = 0;
                        @endphp
                @endif
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" title="Cart"><i class="fa fa-shopping-cart" style="font-size: 21px;"></i><span>{{ $num }}</span></a>
                <div class="cart-info dropdown-menu">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Product</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $sum = 0;
                            @endphp
                            @if (count($carts) > 0)
                                @foreach($carts as $key=>$product)
                                @php
                                    $a = $product->price;
                                    $price = str_replace( ',', '', $a );  
                                    $sum += (int)$price * (int)$product->quantity;
                                @endphp
                                    <tr>
                                        <td class="image" style="border-bottom:none;"><img style="width: 50px;" alt="IMAGE" class="img-responsive" src="{{ asset('public/thumbnail/').'/'.$product->image }}"></td>
                                        <td class="name" style="border-bottom:none;"><h5 style=" margin-top: 15px;">{{ $product->name }}</h5></td>
                                        <td class="quantity" style="border-bottom:none;"><span style=" margin-top: 15px;">x&nbsp;{{ $product->quantity }}</span></td>
                                        <td class="total" style="border-bottom:none;"><b style="line-height:4;">{{ $product->total }}</b></td>
                                        <td class="remove" style="border-bottom:none;"><a href="#" type="button" class="btn btn-danger" data-id="{{ $product->id }}" style="margin-top: 10px;color: #fff;">Remove</a></td>											
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                        <tfoot style="background: #fafafa;">
                            <tr>
                                <td>
                                    <a href="{{ route('view-cart') }}" class="ajax_right" style="font-size: 14px;font-weight: bold;">View Cart</a>
                                </td>
                                <td>
                                    <a href="{{ route('checkout') }}" class="ajax_right" style="font-size: 14px;font-weight: bold;">Checkout</a>
                                </td>
                                <td></td>
                                <td style="font-size:14px;"><b>Sub-Total:&nbsp;&nbsp;</b></td>
                                <td style="font-size:14px;"><b>{{ $sum }}</b></td>
                            </tr>
                        </tfoot>									
                    </table>
                    {{-- <div class="cart-total">
                        <table>
                            <tbody>
                                <tr>
                                    <td>View Cart</td>
                                    <td>Checkout</td>
                                    <td></td>
                                    <td style="font-size:14px;"><b>Sub-Total:&nbsp;&nbsp;</b></td>
                                    <td style="font-size:14px;"><b>{{ $sum }}</b></td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="checkout" style="margin-top: 10px;"><a href="{{ route('view-cart') }}" class="ajax_right" style="font-size: 14px;font-weight: bold;">View Cart</a> | <a href="{{ route('checkout') }}" class="ajax_right" style="font-size: 14px;font-weight: bold;">Checkout</a></div>
                    </div> --}}
                </div> 
            </li>
        </td>
        @if (!Auth::user())
            <td>
                <li class="dropdown">
                    <a href="{{ route('login-form') }}" style="font-size:16px;">Login/Register</a>
                </li>
            </td>
        @endif
        <td>
            @if (Auth::user())
                @if(Auth::user()->is_admin == FALSE)
                    @php
                        $count = count(\App\WishList::where('user_id', Auth::user()->id)->get());
                    @endphp
                    <li class="dropdown">
                        <a href="{{ route('wishlist.display') }}" style="font-size: 16px;"> <i class="fa fa-heart"></i><span>{{ $count }}</span></a>
                    </li>
                @endif
            @endif
        </td>
        @if (Auth::user())
            <td>
                <li class="dropdown">
                    <a href="{{ route('user.logout') }}" class="dropdown-toggle" title="Sign out"><i class="fa fa-sign-out" style="font-size: 20px;"></i></a>
                </li>
            </td>
            <td>
                <li class="dropdown">
                    <a href="{{ route('user.profile') }}" class="dropdown-toggle" title="My Profile"><i class="fa fa-user" style="font-size: 20px;"></i></a>
                </li>
            </td>
        @else
            <!--<td>-->
            <!--    <li class="dropdown">-->
            <!--        <a href="" class="dropdown-toggle" title="Sign in" style="font-size:16px;">Login/Signup?</a>-->
            <!--    </li>-->
            <!--</td>-->
        @endif
    </tr>
    <input type="hidden" name="cart_count" id="cart-count" value="{{ $num }}">
</table>