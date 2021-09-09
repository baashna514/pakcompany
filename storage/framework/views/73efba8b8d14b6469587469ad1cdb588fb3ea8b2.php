<?php
    $carts = \App\Cart::where('user_id', session('user_id'))->orWhere('session_id', session('user_id'))->get();
	$count = 0;
    $sum = 0;
?>
<?php if(count($carts) > 0): ?>
    <?php $__currentLoopData = $carts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cart): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php
            $a = $cart->price;
            $price = str_replace( ',', '', $a );  
            $sum += $price * $cart->quantity;
        ?>
        <tr>
            <td class="text-center">
            
                <a href=""><img width="70px" src="<?php if(strpos($cart->image, 'http') !== false): ?><?php echo e($cart->image); ?> <?php else: ?> <?php echo e(asset('public/thumbnail').'/'.$cart->image); ?><?php endif; ?>" alt="image loading" title="<?php echo e($cart->name); ?>" class="img-thumbnail" /></a>
            </td>
            <td class="text-left">
                <a href=""><?php echo e($cart->name); ?></a><br />
            </td>
            <td class="text-left" width="200px">
                <div class="input-group btn-block quantity">
                    <input type="number" name="quantity" value="<?php echo e($cart->quantity); ?>" class="form-control" />
                    <span class="input-group-btn">
                        <button type="submit" data-id="<?php echo e($cart->id); ?>" data-toggle="tooltip" title="Update" class="btn btn-primary update"><i class="fa fa-clone"></i></button>
                        <button type="button" data-id="<?php echo e($cart->id); ?>" data-toggle="tooltip" title="Remove" class="btn btn-danger remove"><i class="fa fa-times-circle"></i></button>
                    </span>
                </div>
            </td>
            <td class="text-right"><?php echo e($cart->price); ?></td>
            <td class="text-right"><?php echo e($cart->total); ?></td>
        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>
<input type="hidden" id="total" name="total" value="<?php echo e($sum); ?>"><?php /**PATH C:\wamp64\www\pakcompany\resources\views/front/includes/myCartPage_cartItems.blade.php ENDPATH**/ ?>