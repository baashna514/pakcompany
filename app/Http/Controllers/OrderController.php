<?php

namespace App\Http\Controllers;

use App\Order;
use Auth;
use Illuminate\Http\Request;
use App\User;
use App\ProductOrder;
class OrderController extends Controller
{
    public function orders(){
        // $orders = Order::where('owner_id',Auth::id())->get();
        $orders = Order::all();
        return view('admin.orders.orders', compact('orders'));
    }

    public function track_order(Request $request){
        // dd($request->all());
        $curl_handle = curl_init();
        // For Direct Link Access use below commented link
        //curl_setopt($curl_handle, CURLOPT_URL, 'http://new.leopardscod.com/webservice/trackBookedPacket/?api_key=XXXX&api_password=XXXX&track_numbers=XXXXXXXX');  // For Get Mother/Direct Link

        curl_setopt($curl_handle, CURLOPT_URL, 'http://new.leopardscod.com/webservice/trackBookedPacket/format/json/');  // Write here Test or Production Link
        curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl_handle, CURLOPT_POST, 1);
        curl_setopt($curl_handle, CURLOPT_POSTFIELDS, array(
            'api_key' => '4B4718F692AA040E8D82A3396B4185F6',
            'api_password' => 'HP6910@PC',
            'track_numbers' => $request->tracking_no,                   // E.g. 'XXYYYYYYYY' OR 'XXYYYYYYYY,XXYYYYYYYY,XXYYYYYY' 10 Digits each number
        ));
        $buffer = curl_exec($curl_handle);
        // echo $buffer;
        $json = json_decode($buffer, true);
        $data = ($json['packet_list'][0]);
        // dd($data['track_number']);
        // foreach($data['Tracking Detail'] as $arr){
        //     dd( $arr['Status']);
        // }
        curl_close($curl_handle);
        return view('admin.orders.track-order')->with('data', $data);
    }

    public function customersOrders($id){
       $orders = Order::where('user_id',$id)->get();
        
        return view('admin.customer.orders', compact('orders'));
    }
    public function order_delete(Request $request, $id){
        $order = Order::find($id);
        $order->delete();
        $request->session()->flash('alert-success', 'Order removed.');
        return back();
    }
    public function productOrder($id){
        $products=ProductOrder::where('order_id',$id)->get();
        return view('admin.orders.product-orders',compact('products'));
    }
    public function update_order_status(Request $request){

        Order::where('id', $request->id)->update([
            'status' => $request->status,
        ]);
        $user_id=Order::where('id',$request->id)->select('user_id')->first();
        $user=User::where('id',$user_id->user_id)->select('email')->first();
        $orders= Order::where('status','Complete')->get()->groupBy('owner_id')->toArray();
        if(count($orders)>0){
            $id[]=array_keys($orders);
            $i=0;
            foreach ($orders as $key => $value) {
                $count =count($value);
                User::where('id',$id[0][$i])->update(['points'=>$count*10]);
                $i=$i+1;
            } 
        }
        $request->session()->flash('alert-success', 'Order status updated.');
        return back();
    }
public function update_order_Astatus(Request $request){

        Order::where('id', $request->id)->update([
            'status' => $request->status,
        ]);
        $user_id=Order::where('id',$request->id)->select('user_id')->first();
        $user=User::where('id',$user_id->user_id)->select('email')->first();
       
        
        $request->session()->flash('alert-success', 'Order status updated.');
        return back();
    }
    public function get_order_detail(Request $request){
        $order = Order::with('user')->find($request->id);
        echo "
        <form>
            <div class='row clearfix'>
                <div class='col-sm-6'>
                    <div class='form-group'>
                        <div class='form-line'>
                            <label>Order#</label>
                            <input type='text' value='".$order->order_no."' class='form-control'/>
                        </div>
                    </div>
                </div>
                <div class='col-sm-6'>
                    <div class='form-group'>
                        <div class='form-line'>
                            <label>Customer</label>
                            <input type='text' value='".$order->name."' class='form-control'/>
                        </div>
                    </div>
                </div>
            </div>
            <div class='row clearfix'>
                <div class='col-sm-4'>
                    <div class='form-group'>
                        <div class='form-line'>
                            <label>Email</label>
                            <input type='text' value='".$order->email."' class='form-control'/>
                        </div>
                    </div>
                </div>
                <div class='col-sm-4'>
                    <div class='form-group'>
                        <div class='form-line'>
                            <label>Phone</label>
                            <input type='text' value='".$order->phone."' class='form-control'/>
                        </div>
                    </div>
                </div>
                <div class='col-sm-4'>
                    <div class='form-group'>
                        <div class='form-line'>
                            <label>City</label>
                            <input type='text' value='".$order->city."' class='form-control'/>
                        </div>
                    </div>
                </div>
            </div>
            <div class='row clearfix'>
                <div class='col-sm-12'>
                    <div class='form-group'>
                        <div class='form-line'>
                            <label>Address</label>
                            <textarea class='form-control' cols='100' rows='3'>".$order->address_1."</textarea>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        ";
    }

    public function prinOrder($id){
        $order = Order::find($id);
        return view('admin.orders.print-order', ['order'=> $order]);
    }
}
