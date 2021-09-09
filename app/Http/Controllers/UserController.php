<?php

namespace App\Http\Controllers;
use App\User;
use App\Order;
use App\Product;
use App\Claim;
use App\ProductOrder;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use phpDocumentor\Reflection\PseudoTypes\False_;
class UserController extends Controller
{
	public function vendors_list(){
		$users=User::where('is_admin',2)->get();
		return view('admin.users.vendors-list',compact('users'));
	}
  public function customer_view(){
    $users=User::where('is_admin',2)->get();
    return view('admin.customer.view',compact('users'));
  }
  public function delete(Request $request){
       Product::where('user_id',$request->id)->delete();
      User::find($request->id)->delete();
      
      $request->session()->flash('alert-success', 'Please Login...');
        return back();
	}
	public function edit_form(Request $request){
		$users=User::find($request->id);
		return Response()->json($users);
		 
	}
	public function edit_action(Request $request){

		 $user=User::find($request->id);

		$user->update([
            'fname' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'is_admin'=> false,
        ]);
        $request->session()->flash('alert-success', 'User Updated');
        return redirect()->route('ds.users.view');
	}
	public function update_user_status(Request $request){
		 $request->validate([
                'status' => 'required',
            ],
            [
                'status.required'=> 'status  is required',
                
            ]
        );

        User::where('id', $request->id)->update([
            'status' => $request->status,
        ]);

        return "success";
    }
    public function view_profile($id){
      $user=User::find($id);
      $orders = ProductOrder::whereHas(
        'product', function($q) use ($id) {
          $q->where('user_id', '=' ,$id);
        }
      )->get();
      // dd($products_order);
      // $orders = Order::where('owner_id',$id)->get();
      $products=Product::where('user_id',$id)->get();
      $claims = Claim::with('claim_gallery', 'user')->where('owner_id', Auth::user()->id)->get();
      return view('admin.profile.view',compact('products','user','orders','claims'));
    }
    public function view_customer_profile($id){
      $user=User::find($id); 
      $orders = Order::where('user_id',$id)->get();
      $products=Product::where('user_id',$id)->get();
      $claims = Claim::with('claim_gallery', 'user')->where('owner_id', Auth::user()->id)->get();
      return view('admin.profile.view',compact('user','orders','claims','products'));
    }

    Public function offlineUser(Request $request)
    {
      User::find($request->id)->update(['days'=>$request->days,'offline'=>$request->offline]);
      Product::where('user_id',$request->id)->update(['status'=>$request->offline]);
      return back();
    }
   protected function edit(Request $request,$id)
    { 

      // $this->validate($request, [
      //         'name' => 'required',
      //       'email' => 'required|email|unique:users,email',
      //      ],
      //       [
      //           'name.required' => 'Full name is required.',
      //           'email.required' => 'Email is required.',
               
      //       ]
      //   );
            $user=User::find($id);
            
             if($request->file('cnic_front_image')){
            $imageFront = $request->file('cnic_front_image');
            $frontcnic=rand(10, 1000).$imageFront->getClientOriginalName();
            $imageFront->move(public_path().'/vendor', $frontcnic);
            $cnic_front = $frontcnic;
            }
             else{
                $cnic_front = $user->cnic_front_image;
            }
            if($request->file('cnic_back_image')){
            $imageBack = $request->file('cnic_back_image');
            $nameBack=rand(10, 1000).$imageBack->getClientOriginalName();
            $imageBack->move(public_path().'/vendor', $nameBack);
            $cnic_back = $nameBack;
            }
             else{
                $cnic_back = $user->cnic_back_image;
            }
            if($request->file('user_image')){
            $imageUser = $request->file('user_image');
            $name=rand(10, 1000).$imageUser->getClientOriginalName();
            $imageUser->move(public_path().'/vendor', $name);
            $user_image = $name;
            }
             else{
                $user_image = $user->user_image;
            }
            if($request->file('shop_logo')){
            $image = $request->file('shop_logo');
            $shoppic=rand(10, 1000).$image->getClientOriginalName();
            $image->move(public_path().'/vendor', $shoppic);
            $shop_logo = $shoppic;
            }
             else{
                $shop_logo = $user->shop_logo;
            }
         $user->update([
            'name' => $request->name,
            'shop_name' => $request->shop_name,
            'phone' => $request->phone,
            'cnic' => $request->cnic,
            'shop_logo' => $shop_logo,
            'email' => $request->email,
            'status' => $request->status,
            'user_image' => $user_image,
            'cnic_front_image' => $cnic_front,
            'cnic_back_image' => $cnic_back,
        ]);

       
             $request->session()->flash('alert-success', 'vendor updated successfully');
        return back();

       }      
}
