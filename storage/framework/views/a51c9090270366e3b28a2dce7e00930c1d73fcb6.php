<?php
    if (Auth::user()) {
        $wishlist = \App\WishList::with('product')->where('user_id',Auth::user()->id)->get();
    }
    else{
        $wishlist = 0;
    }
    // echo count($wishlist);
?>
<a href="<?php echo e(route('wishlist')); ?>" class="btn-link" title="Wish List ">
    <?php if($wishlist): ?>
        <?php if(count($wishlist) > 0): ?>
            <span ><i class="fa fa-heart"></i> Wishlist (<?php echo e(count($wishlist)); ?>) </span>
        <?php else: ?>
            <span ><i class="fa fa-heart"></i> Wishlist (0) </span>
        <?php endif; ?>
    <?php endif; ?>
</a><?php /**PATH C:\wamp64\www\pakcompany2\resources\views/front/includes/get-wishlist.blade.php ENDPATH**/ ?>