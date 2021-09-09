@php
    if(Auth::check()){
        $carts = \App\Cart::where('user_id', session('user_id'))->orWhere('session_id', session('user_id'))->get();
    }
    else{
        $carts = \App\Cart::where('user_id', session('user_id'))->orWhere('session_id', session('user_id'))->get();
    }
@endphp
@if (count($carts) > 0)
    @foreach($carts as $key=>$product)
        <tr class="cart_table_item">
            <td class="product-remove">
            <a title="Remove this item" class="remove" data-id="{{ $product->id }}" href="#">
                <i class="fas fa-times"></i>
            </a>
            </td>
            <td class="product-thumbnail">
            <a href="">
                <img width="100" height="100" alt="" class="img-fluid" src="{{ asset('public/thumbnail').'/'.$product->image }}">
            </a>
            </td>
            <td class="product-name">
            <a href="" class="p-name">{{ $product->name }}</a>
            </td>
            <td class="product-price">
            <span class="amount price">{{ $product->price }}</span>
            </td>
            <td class="product-quantity">
            <div class="quantity">
                <input type="button" data-id="{{ $product->id }}" class="pls minus" value="-">
                <input type="text" class="input-text qty text" title="Qty" value="{{ $product->quantity }}" readonly name="quantity" min="1" step="1">
                <input type="button" data-id="{{ $product->id }}" class="plus pls altera" value="+">
            </div>
            </td>
            <td class="product-subtotal">
            <span class="amount total">{{ $product->total }}</span>
            </td>
        </tr>                                                      
    @endforeach
@else
<div class="row">
    <div class="col-lg-12">
        <span class="text-center">No item in cart</span>
    </div>
</div>
@endif

<script>
    $('.pls.altera').click(function() {
       var curr_quantity = $(this).prev().val();
       curr_quantity = parseInt(curr_quantity)+1;
       $(this).prev().val(curr_quantity);
   });
   $('.pls.minus').click(function() {
        var curr_quantity = $(this).next().val();
        if(curr_quantity < 1){
            return;
        }
       if(curr_quantity != 0) {
           curr_quantity = parseInt(curr_quantity)-1;
           $(this).next().val(curr_quantity);
       }
   });
</script>