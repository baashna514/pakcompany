<?php
    $carts = \App\Cart::where('user_id', session('user_id'))->orWhere('session_id', session('user_id'))->get();
	$count = 0;
    $sum = 0;
?>
<div class="table-responsive">
    <table class="table table-bordered">
        <thead>
            <tr>
                <td class="text-center">Image</td>
                <td class="text-left">Product Name</td>
                <td class="text-right">Unit Price</td>
                <td class="text-right">Quantity</td>
                <td class="text-right">Total</td>
            </tr>
        </thead>
        <tbody>
            <?php if(count($carts) > 0): ?>
                <?php
                    $weight = 0;
                ?>
                <?php $__currentLoopData = $carts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cart): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        $a = $cart->price;
                        $price = str_replace( ',', '', $a );  
                        $sum += $price * $cart->quantity;
                        $product = \App\Product::find($cart->product_id);
                        $weight += $product->weight * $cart->quantity;
                    ?>
                    <tr>
                        <td class="text-center"><a href=""><img width="60px" src="<?php if(strpos($cart->image, 'http') !== false): ?><?php echo e($cart->image); ?> <?php else: ?> <?php echo e(asset('public/thumbnail').'/'.$cart->image); ?><?php endif; ?>" alt="loading image" title="<?php echo e($cart->name); ?>" class="img-thumbnail"></a></td>
                        <td class="text-left"><a href=""><?php echo e($cart->name); ?></a></td>
                        <td class="text-right"><?php echo e($cart->price); ?></td>
                        <td class="text-right"><?php echo e($cart->quantity); ?></td>
                        <td class="text-right"><?php echo e($cart->total); ?></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        </tbody>
        <tfoot>
            <tr>
                <td class="text-right" colspan="3"><strong>Sub-Total:</strong></td>
                <td class="text-right" id="sub-total"><?php echo e($sum); ?></td>
            </tr>
            <tr>
                <td class="text-right" colspan="3"><strong>Weight:</strong></td>
                <td><input type="text" value="<?php echo e($weight); ?>" name="weight" id="weight" readonly style="text-align: right;background-color: #ffffff;font-size: 14px;padding:0px;"></td>
            </tr>
            <tr>
                <?php
                    $weight = (float)$weight;
                    $row = \App\ShippingRate::whereRaw('? between min and max', [$weight])->first();
                    // dd($ship);
                ?>
                <td class="text-right" colspan="3"><strong>Shipping Rate:</strong></td>
                <td><input type="text" value="<?php echo e($row->rate); ?>" name="shipping_charges" id="shipping_method" readonly style="text-align: right;background-color: #ffffff;font-size: 14px;padding:0px;"></td>
            </tr>
            <tr>
                <td class="text-right" colspan="3"><strong>Total:</strong></td>
                <td class="text-right" id="total"><?php echo e($sum); ?></td>
            </tr>
        </tfoot>
    </table>
</div><?php /**PATH C:\wamp64\www\pakcompany2\resources\views/front/includes/checkoutPage_cartItems.blade.php ENDPATH**/ ?>