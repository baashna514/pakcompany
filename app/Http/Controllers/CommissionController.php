<?php

namespace App\Http\Controllers;
use App\Commission;
use App\User;
use App\Category;
use App\UserCommissionList;
use Illuminate\Http\Request;
use App\Voilet;
class CommissionController extends Controller
{
     public function view(){
     	$commission=Commission::with('user')->get();
     	$vendors=User::where('is_admin',0)->get();
    	return view("admin.commission.view",compact('commission','vendors'));
    }
    public function create(Request $request){
       $this->validate($request, [
              'vendor_id' => 'required',
              'percentage' => 'required|int',
             ],
            [
                'vendor_id.required' => 'Please select at least one category',
                'percentage.required' => 'percentage is required.',
             ]
       );
       foreach($request->vendor_id as $user){
        	Commission::updateOrCreate(['user_id'=>$user],['user_id'=>$user,'percentage'=>$request->percentage]);
       }
    	return redirect()->route('ds.commission.view');
    }
    public function delete($id){
           Commission::find($id)->delete();
       return redirect()->route('ds.commission.view');

    }
    public function userCommissiondelete($id){
           UserCommissionList::find($id)->delete();  
           return redirect()->route('ds.commission.userList');

    }
    public function userCommissionView()
      {
      	$userCommission=UserCommissionList::with('product','user')->get();

      	return view('admin.commission.user',compact('userCommission'));
      }

      public function adminBalance(){
             $t_deduction=UserCommissionList::sum('deduction');
             Voilet::updateOrCreate(['user_id'=>1],['user_id'=>1,'amount'=>$t_deduction]);
      }

}
