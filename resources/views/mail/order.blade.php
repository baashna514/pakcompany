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
	{{-- <h1 style="color: #0c8d4d">Your order has been placed!</h1> --}}
</center>
<?php
	$order = \App\Order::where('order_no', $Order_no)->first();
	$products = \App\ProductOrder::where('order_id', $order->id)->get();
?>
{{-- <p><h3>Hi {{$order->name}}</h3></p> --}}
<p style="padding: 30px; background:#0c8d4d;color:#fff;">{{$Order_no}}</p>
<p>Following new order has been placed.</p>
<p>[{{$Order_no}}] ({{$order->created_at->toDateString()}})</p>
{{-- <p>We're excited for you to receive your <b><i>{{$Order_no}}</i></b> and will notify you once it's on its way. We hope you had a great shopping experience! You can check your order status here.</p>
<p>Please note, we are unable to change your delivery address once your order is placed.​
</p> --}}
</div>	

<div id="block">
    <h3 style="color: #0c8d4d">Shipment Details</h2>
    <table>
    	<tr><td style="color: #0c8d4d;margin-right: 50px">Name</td><td>{{$order->name}}</td></tr>
    	<tr><td style="color: #0c8d4d;margin-right: 50px">Address</td><td>{{$order->address_1}}</td></tr>
    	<tr><td style="color: #0c8d4d;margin-right: 50px">Email</td><td>{{$order->email}}</td></tr>
    	<tr><td style="color: #0c8d4d;margin-right: 50px">Phone</td><td>{{$order->phone}}</td></tr>
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
			@php
				$sum = 0;
				$weight = 0;
			@endphp
			@foreach ($products as $product)
				@php
					$sum+=$product->total;
					$pro = \App\Product::find($product->product_id);
					$weight +=$pro->weight * $product->quantity;
				@endphp
				<tr>
					<td style="text-align:center;"><img src="{{asset('public/thumbnail').'/'.$product->image}}" style="width: 100px;" alt="Image Loading"></td>
					<td style="text-align:center;">{{$product->name}}</td>
					<td style="text-align:center;">{{$product->quantity}}</td>
					<td style="text-align:center;">{{$product->price}}</td>
				</tr>
			@endforeach
				<tr>
					<th colspan="3" style="color: #0c8d4d;">Subtotal: </th>
					<td> {{$sum}}</td>
				</tr>
				<tr>
					@php
						$weight = (float)$weight;
                    	$row = \App\ShippingRate::whereRaw('? between min and max', [$weight])->first();
					@endphp
					<th colspan="3" style="color: #0c8d4d;">Shipping Charges: </th>
					<td> {{$row->rate}}</td>
				</tr>
				<tr>
					<th colspan="3" style="color: #0c8d4d;">Total: </th>
					<td> {{$row->rate + $sum}}</td>
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
</html>