@php
    $carts = \App\Cart::where('user_id', session('user_id'))->orWhere('session_id', session('user_id'))->get();
    $count = 0;
@endphp
<a data-loading-text="Loading..." class="btn-group top_cart dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
    <div class="shopcart">
        <span class="icon-c">
            <i class="fa fa-shopping-bag"></i>
        </span>
        <div class="shopcart-inner">
            <p class="text-shopping-cart">
                My cart
            </p>
            <span class="total-shopping-cart cart-total-full">
                @if ($carts)
                    @if (count($carts) > 0)
                        @php
                            $count = count($carts);
                        @endphp
                    @endif
                @endif
                <span class="items_cart">{{ $count }}</span><span class="items_cart2"> item(s)</span>
            </span>
        </div>
    </div>
</a>
<ul class="dropdown-menu pull-right shoppingcart-box" role="menu">
    <li>
        <table class="table table-striped">
            <tbody>
                @php
                    $sum = 0;
                @endphp
                @if ($carts)
                    @if (count($carts) > 0)
                        @foreach ($carts as $cart)
                            @php
                                $a = $cart->price;
                                $price = str_replace( ',', '', $a );  
                                $sum += $price * $cart->quantity;
                            @endphp
                            <tr>
                                <td class="text-center" style="width:70px">
                                    <a href="">
                                        <img src="@if(strpos($cart->image, 'http') !== false){{$cart->image}} @else {{ asset('public/thumbnail').'/'.$cart->image }}@endif" style="width:70px" alt="image loading" title="{{ $cart->name }}" class="preview">
                                    </a>
                                </td>
                                <td class="text-left"> <a class="cart_product_name" href="">{{ $cart->name }}</a> 
                                </td>
                                <td class="text-center">x{{ $cart->quantity }}</td>
                                <td class="text-center">{{ $cart->total }}</td>
                                <td class="text-right">
                                    <a href="" class="fa fa-edit"></a>
                                </td>
                                <input type="hidden" name="id" id="cart-id"  value="{{$cart->id}}">
                                <td class="text-right">
                                    <a class="fa fa-times fa-delete delete-header-cart-item" data-id="{{$cart->id}}"></a>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                @endif
            </tbody>
        </table>
    </li>
    <li>
        <div>
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <td class="text-left"><strong>Total</strong>
                        </td>
                        <td class="text-right">{{ $sum }}</td>
                    </tr>
                </tbody>
            </table>
            <p class="text-right"> <a class="btn view-cart" href="{{ route('my-cart') }}"><i class="fa fa-shopping-cart"></i>View Cart</a>&nbsp;&nbsp;&nbsp; <a class="btn btn-mega checkout-cart" href="{{ route('checkout') }}"><i class="fa fa-share"></i>Checkout</a> 
            </p>
        </div>
    </li>
</ul>