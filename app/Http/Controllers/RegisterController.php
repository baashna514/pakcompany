<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use phpDocumentor\Reflection\PseudoTypes\False_;

class RegisterController extends Controller
{
   protected function create(Request $request)
    {
      

      $this->validate($request, [
              'name' => 'required',
              'password' => 'required',
            'email' => 'required|email|unique:users,email',
           ],
            [
                'name.required' => 'Full name is required.',
                'email.required' => 'Email is required.',
                'password.required' => 'Password is required.',
            ]
        );
         if($request->type==0){
             $type = false;
             $points=0;
             $status=0;
        }
            else
            {
               $type = 2;
             $status=1;
             $points=10;

             }

             if($request->file('cnic_front_image')){
              // dd($request->file('cnic_front_image'));
            $imageFront = $request->file('cnic_front_image');
            $frontcnic=rand(10, 1000).$imageFront->getClientOriginalName();
            $imageFront->move(public_path().'/vendor', $frontcnic);
            $cnic_front = $frontcnic;
            }
             else{
                $cnic_front = 'default-image.png';
            }
            if($request->file('cnic_back_image')){
            $imageBack = $request->file('cnic_back_image');
            $nameBack=rand(10, 1000).$imageBack->getClientOriginalName();
            $imageBack->move(public_path().'/vendor', $nameBack);
            $cnic_back = $nameBack;
            }
             else{
                $cnic_back = 'default-image.png';
            }
            if($request->file('user_image')){
            $imageUser = $request->file('user_image');
            $name=rand(10, 1000).$imageUser->getClientOriginalName();
            $imageUser->move(public_path().'/vendor', $name);
            $user_image = $name;
            }
             else{
                $user_image = 'default-image.png';
            }
            if($request->file('shop_logo')){
            $image = $request->file('shop_logo');
            $shoppic=rand(10, 1000).$image->getClientOriginalName();
            $image->move(public_path().'/vendor', $shoppic);
            $shop_logo = $shoppic;
            }
             else{
                $shop_logo = 'default-image.png';
            }

         User::create([
            'name' => $request->name,
            'shop_name' => $request->shop_name,
            'cnic' => $request->cnic,
            'shop_logo' => $shop_logo,
            'email' => $request->email,
            'address1' => $request->address1,
            'status' => $request->status,
            'user_image' => $user_image,
            'cnic_front_image' => $cnic_front,
            'cnic_back_image' => $cnic_back,
             'points'=>$points,
            'password' => Hash::make($request->password),
            'is_admin' => $type
        ]);

       if($request->type==2){
        $request->session()->flash('alert-success', 'Please Login...');
          return redirect()->route('login-account');
        }
       else{
             $request->session()->flash('alert-success', 'vendor created successfully');
        return back();

       }     
   }
    
}
