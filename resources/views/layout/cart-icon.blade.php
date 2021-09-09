@php
    $carts = \App\Cart::where('user_id', session('user_id'))->get();
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
<i class="fa fa-shopping-cart"></i>
<span>{{ $num }}</span>