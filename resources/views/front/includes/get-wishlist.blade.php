@php
    if (Auth::user()) {
        $wishlist = \App\WishList::with('product')->where('user_id',Auth::user()->id)->get();
    }
    else{
        $wishlist = 0;
    }
    // echo count($wishlist);
@endphp
<a href="{{ route('wishlist') }}" class="btn-link" title="Wish List ">
    @if ($wishlist)
        @if (count($wishlist) > 0)
            <span ><i class="fa fa-heart"></i> Wishlist ({{count($wishlist)}}) </span>
        @else
            <span ><i class="fa fa-heart"></i> Wishlist (0) </span>
        @endif
    @endif
</a>