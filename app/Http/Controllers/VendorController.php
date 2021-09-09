<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Subcategory;
use App\Brand;
use App\User;
use Auth;
class VendorController extends Controller
{
    public function vendorShop($name,$id){
    	$products =Product::where('user_id',$id)->where('status', TRUE)->paginate(30);
    	$user=User::where("id",$id)->first();
    	$subcategories=Subcategory::all();
        $brands=Brand::all();
        return view('front.vendor-shop',compact('products','user',
        	'subcategories','brands'));
    	
    }
    public function shop_setting(Request $request){
           
           $user=User::find(Auth::id());
            if($request->file('shop_banner')){
            $image = $request->file('shop_banner');
            $name=$image->getClientOriginalName();
            $image->move(public_path().'/vendor-banners/', $name);
            $user->shop_banner = $name;
        }
         else{
               $user->shop_banner= 'default-image.png';
            }
          $user->update(['shop_page_title'=>$request->shop_page_title,'shop_banner'=>$user->shop_banner]);
           return back();
    }
}
