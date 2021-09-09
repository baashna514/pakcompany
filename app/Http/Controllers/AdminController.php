<?php

namespace App\Http\Controllers;

use App\Subscriber;
use App\Product;
use App\Order;
use App\Category;
use Illuminate\Http\Request;
use Auth;
class AdminController extends Controller
{
    public function index(){
        $user_id=Auth::id();
    	$subscriber =Subscriber::all();
    	$product = Product::all();
    	$order = Order::all();
    	$category = Category::all();
    	$minProduct = Product::where('p_quantity','<',5)->where('user_id', Auth::user()->id)->with('category','subcategory')->paginate(10);
        return view('admin.dashboard.index',compact('subscriber','user_id','minProduct','product','order','category'));
    }

  
}
