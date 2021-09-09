<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\City;
use App\Weight;
use App\Order;
use App\Driver;
use App\OrderShipping;
use App\ProductOrder;
use App\User;
use App\ShippingRate;
use Auth;
use Illuminate\Support\Facades\Redirect;

class ShippingController extends Controller
{
     public function view(){

        return view('admin.shipping.shipping');
    }

    public function setCityPrice(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'price' => 'required',
        ],
        [
            'name.required' => 'Name is required',
            'price.required' => 'Price is required',
            
        ]
        );
        City::create($request->all());
        $request->session()->flash('alert-success', 'Shipping charges added.');
        return redirect()->route('ds.shipping.shipping');
    }  


    public function shipping(){
        $rates = ShippingRate::all();
        return view('admin.shipping.shipping',compact('rates'));

    }
    public function setWeightPrice(Request $request){
         $this->validate($request, [
            'min' => 'required',
            'max' => 'required',
            'price' => 'required',
        ],
        [
            'max.required' => 'Minimum weight is required',
            'min.required' => 'Maximum weight is required',
            'price.required' => 'Price is required',
            
        ]
        );
        Weight::create($request->all());
        return redirect()->route('ds.shipping.shipping');
    }  
    public function deleteWeight($id){
        Weight::find($id)->delete();
    	return redirect()->route('ds.shipping.shipping');
    }
    public function deleteCity($id, Request $request){
        City::find($id)->delete();
        $request->session()->flash('alert-success', 'One shipping charges removed.');
    	return redirect()->route('ds.shipping.shipping');
    }
    public function editWeightForm($id){
    	$data =Weight::find($id);
    	return Response()->json($data);
    }
    public function editWeight(Request $request){
        $this->validate($request, [
            'min' => 'required',
            'max' => 'required',
            'price' => 'required',
        ],
        [
            'max.required' => 'Minimum weight is required',
            'min.required' => 'Maximum weight is required',
            'price.required' => 'Price is required',
            
        ]
        );
    	$data =Weight::find($request->id);
        $data->update($request->all());
        $request->session()->flash('alert-success', 'Shipping charges updated.');
        return redirect()->route('ds.shipping.shipping');
    } 
      public function editCityForm($id){
    	$data =City::find($id);
    	return Response()->json($data);
    }
    public function editCity(Request $request){
          $this->validate($request, [
            'name' => 'required',
            'price' => 'required',
        ],
        [
            'name.required' => 'Name is required',
            'price.required' => 'Price is required',
            
        ]
        );
    	$data =City::find($request->id);
        $data->update($request->all());
        $request->session()->flash('alert-success', 'Shipping charges updated.');
        return redirect()->route('ds.shipping.shipping');
    } 

    public function shipping_orders_view(){
        $orders = Order::all();
        $drivers=Driver::all();
        return view('admin.shipping.order-shipping', compact('orders','drivers'));
    }
    public function placeShippment(Request $request){
        OrderShipping::create($request->all());
        return redirect()->route("ds.shipping.shipping_orders_view");
    }

    public function book_a_packet($id){
        $order_product = ProductOrder::with('product.user', 'order.user')->find($id);
        $order = Order::where('id', $order_product->order_id)->first();
        $products = ProductOrder::where('order_id', $order->id)->get();
        $owner = User::find($order_product->owner_id);
        $curl_handle = curl_init();
        curl_setopt($curl_handle, CURLOPT_URL, 'http://new.leopardscod.com/webservice/bookPacket/format/json/');  // Write here Test or Production Link
        curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl_handle, CURLOPT_POST, 1);
        curl_setopt($curl_handle, CURLOPT_POSTFIELDS, array(
            'api_key' => '4B4718F692AA040E8D82A3396B4185F6',
            'api_password' => 'HP6910@PC',
            'booked_packet_weight'          => 200,                 // Weight should in 'Grams' e.g. '2000'
            // 'booked_packet_vol_weight_w'    => int,                 // Optional Field (You can keep it empty), Volumetric Weight Width
            // 'booked_packet_vol_weight_h'    => int,                 // Optional Field (You can keep it empty), Volumetric Weight Height
            // 'booked_packet_vol_weight_l'    => int,                 // Optional Field (You can keep it empty), Volumetric Weight Length
            'booked_packet_no_piece'        => $order_product->quantity,                 // No. of Pieces should an Integer Value
            'booked_packet_collect_amount'  => $order_product->total + ($order->shipping_charges/count($products)),                 // Collection Amount on Delivery
            'booked_packet_order_id'        => 'DEMO#123',            // Optional Filed, (If any) Order ID of Given Product
            
            'origin_city'                   => 'self',            /** Params: 'self' or 'integer_value' e.g. 'origin_city' => 'self' or 'origin_city' => 789 (where 789 is Lahore ID)
                                                                    * If 'self' is used then Your City ID will be used.
                                                                    * 'integer_value' provide integer value (for integer values read 'Get All Cities' api documentation)
                                                                    */
            
            'destination_city'              => 'self',            /** Params: 'self' or 'integer_value' e.g. 'destination_city' => 'self' or 'destination_city' => 789 (where 789 is Lahore ID)
                                                                    * If 'self' is used then Your City ID will be used.
                                                                    * 'integer_value' provide integer value (for integer values read 'Get All Cities' api documentation) 
                                                                    */
            
            'shipment_name_eng'             => $owner->name,            // Params: 'self' or 'Type any other Name here', If 'self' will used then Your Company's Name will be Used here
            'shipment_email'                => $owner->email,            // Params: 'self' or 'Type any other Email here', If 'self' will used then Your Company's Email will be Used here
            'shipment_phone'                => $owner->phone,            // Params: 'self' or 'Type any other Phone Number here', If 'self' will used then Your Company's Phone Number will be Used here
            'shipment_address'              => $owner->address1,            // Params: 'self' or 'Type any other Address here', If 'self' will used then Your Company's Address will be Used here
            'consignment_name_eng'          => $order->name,            // Type Consignee Name here
            'consignment_email'             => $order->email,            // Optional Field (You can keep it empty), Type Consignee Email here
            'consignment_phone'             => $order->phone,            // Type Consignee Phone Number here
            // 'consignment_phone_two'         => 'string',            // Optional Field (You can keep it empty), Type Consignee Second Phone Number here
            // 'consignment_phone_three'       => 'string',            // Optional Field (You can keep it empty), Type Consignee Third Phone Number here
            'consignment_address'           => $order->address_1,            // Type Consignee Address here
            'special_instructions'          => $order_product->name,            // Type any instruction here regarding booked packet
            'shipment_type'                 => 'overnight',            // Optional Field (You can keep it empty so It will pick default value i.e. "overnight"), Type Shipment type name here
        ));
        $buffer = curl_exec($curl_handle);
        // echo $buffer;
        curl_close($curl_handle);
        $obj = json_decode($buffer);
        // Loop through the object
        foreach($obj as $key=>$value){
            if($key == 'slip_link'){
                $link =  $value;
            }
        }
        return Redirect::to($link);
    }

    public function booked_packets(){
        $params = http_build_query (array(
            'api_key' => '4B4718F692AA040E8D82A3396B4185F6',
            'api_password' => 'HP6910@PC',
            'from_date'     => '2021-01-01',                      // E.g. 2019-12-31
            'to_date'       => '2021-03-16'                       // E.g. 2019-12-31
        ));
        
        $curl_handle = curl_init();
        curl_setopt($curl_handle, CURLOPT_URL, "http://new.leopardscod.com/webservice/getBookedPacketLastStatus/format/json/?{$params}");
        curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 1);
        
        $buffer = curl_exec($curl_handle);
        $packets = json_decode($buffer);
        curl_close($curl_handle);
        return view('admin.shipping.booked-packets', ['packets'=>$packets]);
    }

    public function shippingCharges(Request $request){
        $this->validate($request, [
            // 'city' => 'required',
            'condition' => 'required',
            'min' => 'required',
            'max' => 'required',
            'rate' => 'required',
        ],
        [
            // 'city.required' => 'City is required',
            'condition.required' => 'Shipment condition is required',
            'min.required' => 'Minimum value is required',
            'max.required' => 'Maximum value is required',
            'rate.required' => 'Shipping Rate is required',
        ]
        );
        $shipping = new ShippingRate();
        $shipping->city = $request->city;
        $shipping->type = $request->type;
        $shipping->condition = $request->condition;
        $shipping->min = $request->min;
        $shipping->max = $request->max;
        $shipping->rate = $request->rate;
        $shipping->save();
        $request->session()->flash('alert-success', 'Shipping charges saved.');
        return back();
    }

}
