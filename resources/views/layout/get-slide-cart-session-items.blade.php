<h2>Cart</h2>
<ul class="cd-cart-items">
    @php
        $sum = 0;
        if(session('user_id')){
            $carts = \App\Cart::where('user_id', session('user_id'))->orWhere('session_id', session('user_id'))->get();
            if($carts){
                $cart_count = count($carts); 
            }
            else{
                $cart_count = 0;
            }
        }
        else{
            $carts = \App\Cart::where('user_id', Auth::user()->id)->orWhere('session_id', session('user_id'))->get();
            if($carts){
                $cart_count = count($carts); 
            }
            else{
                $cart_count = 0;
            }
        }
    @endphp
    @if (count($carts) > 0)
        @foreach($carts as $key=>$product)
            @php
                $a = $product->price;
                $price = str_replace( ',', '', $a );  
                $sum += $price * $product->quantity;
            @endphp
            <li>
                <div>
                    <img src="{{ asset('public/thumbnail').'/'.$product->image }}" style="width: 50px;" alt="">
                </div>
                <span class="cd-qty">{{ $product->quantity }}x</span> {{ $product->name }}
                <div class="cd-price">{{ $product->total }}</div>
                <a href="#0" data-id="{{ $product->id }}" class="cd-item-remove cd-img-replace">Remove</a>
            </li>
        @endforeach
    @else
        <span style="padding: 10px;">There's no item in cart</span>
    @endif
</ul>
<!-- cd-cart-items -->
<div class="cd-cart-total">
    <p>Total <span>{{ $sum }}</span></p>
</div> <!-- cd-cart-total -->
<a href="{{ route('checkout') }}" class="checkout-btn">Checkout</a>
<p class="cd-go-to-cart"><a href="{{ route('view-cart') }}">Go to cart page</a></p>
<input type="hidden" name="cart_count" id="cart-count" value="{{ $cart_count }}">