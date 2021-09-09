<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Coupon;
class CouponController extends Controller
{

     public function view(){

     	$coupon =Coupon::all();
        return view('admin.coupon.view',compact('coupon'));
     }

    public function create(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'percentage' => 'required',
        ],
        [
            'name.required' => 'Coupon name is required',
            'percentage.required' => 'Percentage is required',
            
        ]
        );
        Coupon::create($request->all());
        $request->session()->flash('alert-success','coupon added');
      return redirect()->route('ds.coupon.view');

    }
    public function delete(Request $request,$id)
    {
    	Coupon::find($id)->delete();
    	$request->session()->flash('alert-success','coupon deleted succesfully');
    	 return redirect()->route('ds.coupon.view');

    }
    public function editCouponForm(Request $request){
        
    	$data =Coupon::find($request->id);
    	return Response()->json($data);
    }
    public function editCoupon(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'percentage' => 'required',
        ],
        [
            'name.required' => 'Coupon name is required',
            'percentage.required' => 'Percentage is required',
            
        ]
        );
    	 $data =Coupon::find($request->id);
         $data->update($request->all());
         $request->session()->flash('alert-success','coupon edit succesfully');
         return redirect()->route('ds.coupon.view');
    } 
}
