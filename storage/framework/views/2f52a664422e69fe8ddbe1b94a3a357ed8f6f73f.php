<!DOCTYPE html>
<html>
<head>
	<title>Email Template</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<style type="text/css">
th{
	color: blue;
}
#block{
	margin bottom: 30px;                                             
}
</style>
<body>
<div id="block">
<center>
<img style="width: 200px;height: 100px" src="https://pakcompany.com.pk/public/theme/logopak-removebg-preview.png">
	
</center>
<?php
	$order = \App\Order::where('order_no', $Order_no)->first();
	$products = \App\ProductOrder::where('order_id', $order->id)->get();
?>

<p style="padding: 30px; background:#0c8d4d;color:#fff;"><?php echo e($Order_no); ?></p>
<p>Following new order has been placed.</p>
<p>[<?php echo e($Order_no); ?>] (<?php echo e($order->created_at->toDateString()); ?>)</p>

</div>	

<div id="block">
    <h3 style="color: #0c8d4d">Shipment Details</h2>
    <table>
    	<tr><td style="color: #0c8d4d;margin-right: 50px">Name</td><td><?php echo e($order->name); ?></td></tr>
    	<tr><td style="color: #0c8d4d;margin-right: 50px">Address</td><td><?php echo e($order->address_1); ?></td></tr>
    	<tr><td style="color: #0c8d4d;margin-right: 50px">Email</td><td><?php echo e($order->email); ?></td></tr>
    	<tr><td style="color: #0c8d4d;margin-right: 50px">Phone</td><td><?php echo e($order->phone); ?></td></tr>
    </table>
</div>
<br><br><br>
<span>Here's a confirmation of what you bought in your order.</span>
<div id="block">
    <h3 style="color: #0c8d4d">Order Details</h2>
    <table class="table table-bordered">
		<thead>
			<tr>
				<td style="color: #0c8d4d;">IMAGE</th>
				<td style="color: #0c8d4d;text-align:center;">PRODUCT</th>
				<td style="color: #0c8d4d;text-align:center;">QTY</th>
				<td style="color: #0c8d4d;text-align:center;">PRICE</th>
			</tr>
		</thead>
		<tbody>
			<?php
				$sum = 0;
				$weight = 0;
			?>
			<?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<?php
					$sum+=$product->total;
					$pro = \App\Product::find($product->product_id);
					$weight +=$pro->weight * $product->quantity;
				?>
				<tr>
					<td style="text-align:center;"><img src="<?php echo e(asset('public/thumbnail').'/'.$product->image); ?>" style="width: 100px;" alt="Image Loading"></td>
					<td style="text-align:center;"><?php echo e($product->name); ?></td>
					<td style="text-align:center;"><?php echo e($product->quantity); ?></td>
					<td style="text-align:center;"><?php echo e($product->price); ?></td>
				</tr>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				<tr>
					<th colspan="3" style="color: #0c8d4d;">Subtotal: </th>
					<td> <?php echo e($sum); ?></td>
				</tr>
				<tr>
					<?php
						$weight = (float)$weight;
                    	$row = \App\ShippingRate::whereRaw('? between min and max', [$weight])->first();
					?>
					<th colspan="3" style="color: #0c8d4d;">Shipping Charges: </th>
					<td> <?php echo e($row->rate); ?></td>
				</tr>
				<tr>
					<th colspan="3" style="color: #0c8d4d;">Total: </th>
					<td> <?php echo e($row->rate + $sum); ?></td>
				</tr>
				<tr>
					<th colspan="3" style="color: #0c8d4d;">Payment Method: </th>
					<td> Cash on Delivery</td>
				</tr>
		</tbody>
    </table>
</div>
</div>
</body>
</html><?php /**PATH C:\wamp64\www\pakcompany2\resources\views/mail/order.blade.php ENDPATH**/ ?>