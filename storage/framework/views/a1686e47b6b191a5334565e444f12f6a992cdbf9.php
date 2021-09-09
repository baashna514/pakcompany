<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Pak Company Publishers</title>
    <link rel="stylesheet" href="<?php echo e(asset('public/print/style.css')); ?>" media="all" />
    <style>
        .address{
            max-width:150px;
            word-wrap:break-word;
        }
    </style>
  </head>
  <body>
    <header class="clearfix">
      <div id="logo">
        <img style="width: 200px;height: 100px" src="https://pakcompany.com.pk/public/theme/logopak-removebg-preview.png">
      </div>
      <div id="company">
          <h2 class="name">Pak Company Publishers</h2>
          <div>17-Urdu Bazar, Lahore, Pakistan</div>
          <div>+92-333-421-0917</div>
          <div><a href="mailto:admin@pakcompany.com.pk">admin@pakcompany.com.pk</a></div>
      </div>
      </div>
    </header>
    <main>
      <div id="details" class="clearfix">
        <div id="client">
          <div class="to">SHIPMENT TO:</div>   
            <h2 class="name"><?php echo e($order->name); ?></h2>
            <div class="address"><?php echo e($order->address_1); ?></div>
            <div class="name"><?php echo e($order->city); ?></div>
            <div class="email"><a href=""><?php echo e($order->phone); ?></a></div>
        </div>
        <div id="invoice">
          <h2><?php echo e($order->order_no); ?></h2>
          <div class="date">Date of Order: <?php echo e($order->created_at->toDateString()); ?></div>
        </div>
      </div>
      <table border="1" cellspacing="0" cellpadding="0">
        <thead>
          <tr>
                
                <th class="no">Product</th>
                <th class="no">Quantity</th>
                <th class="no">Price</th>
          </tr>
        </thead>
        <tbody>
          <?php
                $products = \App\ProductOrder::where('order_id', $order->id)->get();
                $sum = 0;
				$weight = 0;
          ?>
          <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <?php
                $sum+=$product->total;
                $pro = \App\Product::find($product->product_id);
                $weight +=$pro->weight * $product->quantity;
                $row = \App\ShippingRate::whereRaw('? between min and max', [$weight])->first();
          ?>
            <tr>
              
              <td class="qty" style="text-align: center;"><?php echo e($product->name); ?></td>
              <td class="qty" style="text-align: center;"><?php echo e($product->quantity); ?></td>
              <td class="qty" style="text-align: center;"><?php echo e($product->price); ?></td>
            </tr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
        <tfoot>
          <tr>
            <td colspan="1"></td>
            <td colspan="1"><b>Sub Total</b></td>
            <td><b><?php echo e($sum); ?></b></td>
          </tr>
          <tr>
            <td colspan="1"></td>
            <td colspan="1">Shipping Charges</td>
            <td><?php echo e($row->rate); ?></td>
          </tr>
          <tr>
            <td colspan="1"></td>
            <td colspan="1"><b>Total</b></td>
            <td><b><?php echo e($sum + $row->rate); ?></b></td>
          </tr>
          <tr>
            <td colspan="1"></td>
            <td colspan="1"><b>Payment Method</b></td>
            <td><b>Cash on Delivery</b></td>
          </tr>
        </tfoot>
      </table>
    </main>
    <div style="text-align: center;">
        
    </div>
  </body>
</html><?php /**PATH C:\wamp64\www\pakcompany2\resources\views/admin/orders/print-order.blade.php ENDPATH**/ ?>