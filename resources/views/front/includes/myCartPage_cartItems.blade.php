@php
    $carts = \App\Cart::where('user_id', session('user_id'))->orWhere('session_id', session('user_id'))->get();
	$count = 0;
    $sum = 0;
@endphp
@if (count($carts) > 0)
    @foreach ($carts as $cart)
        @php
            $a = $cart->price;
            $price = str_replace( ',', '', $a );  
            $sum += $price * $cart->quantity;
        @endphp
        <tr>
            <td class="text-center">
            
                <a href=""><img width="70px" src="@if(strpos($cart->image, 'http') !== false){{$cart->image}} @else {{ asset('public/thumbnail').'/'.$cart->image }}@endif" alt="image loading" title="{{ $cart->name }}" class="img-thumbnail" /></a>
            </td>
            <td class="text-left">
                <a href="">{{ $cart->name }}</a><br />
            </td>
            <td class="text-left" width="200px">
                <div class="input-group btn-block quantity">
                    <input type="number" name="quantity" id="quantityChange" value="{{ $cart->quantity }}" class="form-control" />
                    <span class="input-group-btn">
                        <button type="submit" data-id="{{ $cart->id }}" data-toggle="tooltip" title="Update" class="btn btn-primary edit"><i class="fa fa-edit"></i></button>
                        <button type="button" data-id="{{ $cart->id }}" data-toggle="tooltip" title="Remove" class="btn btn-danger remove"><i class="fa fa-times-circle"></i></button>
                    </span>
                </div>
            </td>
            <td class="text-right">{{ $cart->price }}</td>
            <td class="text-right">{{ $cart->total }}</td>
        </tr>
    @endforeach
@endif
<input type="hidden" id="total" name="total" value="{{ $sum }}">