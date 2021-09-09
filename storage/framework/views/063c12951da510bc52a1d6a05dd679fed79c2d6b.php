<?php
    $carts = \App\Cart::where('user_id', session('user_id'))->orWhere('session_id', session('user_id'))->get();
    $count = 0;
?>
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
                <?php if($carts): ?>
                    <?php if(count($carts) > 0): ?>
                        <?php
                            $count = count($carts);
                        ?>
                    <?php endif; ?>
                <?php endif; ?>
                <span class="items_cart"><?php echo e($count); ?></span><span class="items_cart2"> item(s)</span>
            </span>
        </div>
    </div>
</a>
<ul class="dropdown-menu pull-right shoppingcart-box" role="menu">
    <li>
        <table class="table table-striped">
            <tbody>
                <?php
                    $sum = 0;
                ?>
                <?php if($carts): ?>
                    <?php if(count($carts) > 0): ?>
                        <?php $__currentLoopData = $carts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cart): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                                $a = $cart->price;
                                $price = str_replace( ',', '', $a );  
                                $sum += $price * $cart->quantity;
                            ?>
                            <tr>
                                <td class="text-center" style="width:70px">
                                    <a href="">
                                        <img src="<?php if(strpos($cart->image, 'http') !== false): ?><?php echo e($cart->image); ?> <?php else: ?> <?php echo e(asset('public/thumbnail').'/'.$cart->image); ?><?php endif; ?>" style="width:70px" alt="image loading" title="<?php echo e($cart->name); ?>" class="preview">
                                    </a>
                                </td>
                                <td class="text-left"> <a class="cart_product_name" href=""><?php echo e($cart->name); ?></a> 
                                </td>
                                <td class="text-center">x<?php echo e($cart->quantity); ?></td>
                                <td class="text-center"><?php echo e($cart->total); ?></td>
                                <td class="text-right">
                                    <a href="" class="fa fa-edit"></a>
                                </td>
                                <input type="hidden" name="id" id="cart-id" value="<?php echo e($cart->id); ?>">
                                <td class="text-right">
                                    <a id="remove-cart-icon" class="fa fa-times fa-delete delete-header-cart-item"></a>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                <?php endif; ?>
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
                        <td class="text-right"><?php echo e($sum); ?></td>
                    </tr>
                </tbody>
            </table>
            <p class="text-right"> <a class="btn view-cart" href="<?php echo e(route('my-cart')); ?>"><i class="fa fa-shopping-cart"></i>View Cart</a>&nbsp;&nbsp;&nbsp; <a class="btn btn-mega checkout-cart" href="<?php echo e(route('checkout')); ?>"><i class="fa fa-share"></i>Checkout</a> 
            </p>
        </div>
    </li>
</ul><?php /**PATH /home/webeasydemos/public_html/pakcompany/resources/views/front/layout/header-cart.blade.php ENDPATH**/ ?>