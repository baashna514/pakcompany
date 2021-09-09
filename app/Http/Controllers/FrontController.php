<?php
namespace App\Http\Controllers;
use App\Brand;
use App\Category;
use App\Subcategory;
use App\Menu;
use App\Order;
use App\Product;
use App\ThemeSetting;
use App\City;
use App\product_size;
use App\Coupon;
use App\ProductOrder;
use App\User;
use Illuminate\Http\Request;
use Auth;
use Session;
use App\HomeImage;
use App\WishList;
use Illuminate\Support\Facades\Hash;
use App\CouponUser;
use App\Cart;
use App\Chat;
use App\Claim;
use App\ClaimGallery;
use App\Commission;
use App\DayDeal;
use App\Mail\OrderMail;
use App\PageLayout;
use App\ShippingRate;
use App\TopCollection;
use App\UserCommissionList;
use App\Voucher;
use App\Slider;
use DB;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB as FacadesDB;
use Illuminate\Support\Facades\Mail;

class FrontController extends Controller
{
    public function index(){
        $featured_products = Product::with('product_size')->where('status', TRUE)->where('is_featured', TRUE)->inRandomOrder()->take(10)->get();
        $top_collections = TopCollection::take(8)->get();
        $layouts = PageLayout::with('category.products')->get();
        // $sliders = Slider::all();
        $sliders = Cache::remember('sliders', 120, function () {
            return DB::table('sliders')->get();
        });
        return view('front.index', compact(['sliders','featured_products','top_collections']), ['layouts' => $layouts]);
    }

    public function faq(){
        return view('front.faq');
    }

    public function sitemap(){
        return view('front.sitemap');
    }

    public function mainSearchResult(Request $request){
        $product = Product::whereName($request->search)->first();
        // dd($product);
        return redirect()->route('product', ['id'=>encrypt($product->id)]);
        // route('product', ['id'=>encrypt($product->id)])
    }

    public function mainHeaderGetWishlist(){
        return view('front.includes.get-wishlist');
    }

    public function category_product_list($name, $id){
        if($id){
            $products =Product::where('category_id',$id)->paginate(30);
          
        }
        else{
            $products =Product::paginate(30);
        }
        return view('front.category-products.category-products-list',compact('products'))->with('name', $name);
    }

    public function subcategory_product_list($id){
        if($id){
            $products =Product::where('subcategory_id',($id))->paginate(30);
        }
        return view('front.category-products.subcategory-products-list',compact('products'));
    }

    public function subcategory1_product_list($id){
        if($id){
            $products =Product::where('subcategory1_id',($id))->paginate(30);
        }
        return view('front.category-products.subcategory1-products-list',compact('products'));
    }

    public function subcategory2_product_list($id){
        if($id){
            $products =Product::where('subcategory2_id',($id))->paginate(30);
        }
        return view('front.category-products.subcategory2-products-list',compact('products'));
    }

    public function brand_product_list($name, $id){
        if($id){
            $products =Product::where('brand_id',$id)->paginate(30);
        }
        else{
            $products =Product::paginate(30);
        }
        return view('front.category-products.brand-products-list',compact('products'))->with('name', $name);
    }

    public function top_collection_products($title, $id){
        // dd(($id));
        if($id){
            $products = Product::where('category_id',($id))->paginate(30);
        }
        return view('front.category-products.top-collection-products-list',compact('products'))->with('name', $title);
    }

    public function layout_products($title, $id){
        if($id){
            $products =Product::where('category_id',$id)->paginate(30);
        }
        else{
            $products =Product::all();
        }
        return view('front.category-products.layout-products-list',compact('products'))->with('name', $title);
    }

    public function shop_page(){
        $products = Product::inRandomOrder()->paginate(20);
        return view('front.category-products.all-products-list',compact('products'));

    }

    public function allProductsPage($id=null, $name= null){
        if($id){
            $products =Product::where('subcategory_id',$id)->paginate(30);
        }
        else{
            $products =Product::paginate(30);
        }
        return view('front.all-product',compact('products'))->with('name', $name);
    }

    public function quick_view($id){
        $product = Product::with('category')->find($id);
        return view('front.quick-view')->with('product', $product);
    }

    public function register(){
        return view('front.register');
    }

    public function login(){
        return view('front.login');
    }

    public function my_cart(){
        return view('front.my-cart');
    }

    public function getCart_onLoad(){
        return view('front.layout.header-cart');
    }

    public function myCartPage_cartItems_getItems_onLoad(){
        return view('front.includes.myCartPage_cartItems');
    }

    public function myCartPage_cartItems_deleteItems(Request $request){
       
        $cart = Cart::find($request->id);
        $cart->delete();
        return view('front.includes.myCartPage_cartItems');
    }
   public function deleteCartItems(Request $request){
       
        $cart = Cart::find($request->id);
        $cart->delete();
    }
    public function myCartPage_cartItems_updateItems(Request $request){
        $cart = Cart::find($request->id);
        Cart::where('id', $request->id)->update([
            'quantity' => $request->qty,
            'total' => $request->qty * $cart->price,
        ]);
        return view('front.includes.myCartPage_cartItems');
    }

    public function checkout(){
        return view('front.checkout');
    }
  public function delete_header_cart_item(Request $request){
        $cart = Cart::find($request->id);
        $cart->delete();
        return view('front.layout.header-cart');
    }

    public function checkoutPage_cartItems_getItems_onLoad(){
        return view('front.includes.checkoutPage_cartItems');
    }

    public function get_shipping_charges(Request $request){
        if($request->weight > 1){
            $row = ShippingRate::where('max', 1)->where('city', $request->city)->first();

        }
        else{
            $row = ShippingRate::whereRaw('? between min and max', [$request->weight])->where('city', $request->city)->first();
        }
        if($row){
            return $row->rate;
        }
        else{
            return 0;
        }
    }

    public function get_shipping_charges_by_weight(Request $request){
        $carts = Cart::where('user_id', session('user_id'))->orWhere('session_id', session('user_id'))->get();
        $weight = 0;
        foreach($carts as $cart){
            $product = \App\Product::find($cart->product_id);
            $weight += $product->weight * $cart->quantity;
        }
        // $weight = (double)$weight;
        // $row = ShippingRate::where(function ($query) use ($weight) {
        //     $query->where('min', '>=', $weight);
        //     $query->where('max', '<=', $weight);
        // })->first();
        $row = DB::table('shipping_rates')
                ->whereColumn([
                    ['min', '>=', $weight],
                    ['max', '>=', $weight]
                ])->first();
        // return $row;
        // $row = ShippingRate::whereRaw('? between min and max', [$weight])->first();
        if($row){
            return $row->rate;
        }
        else{
            return 0;
        }
    }

    public function getShippingRates(Request $request){
        $row = ShippingRate::whereRaw('? between min and max', [$request->weight])->where('type', $request->shipment)->first();
        if($row){
            return $row->rate;
        }
        else{
            return 0;
        }
    }

    public function place_order(Request $request){
        // dd($request->all());
        $this->validate($request, [
            'fullname' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'country' => 'required',
            'address_1' => 'required',
            'city' => 'required',
        ],
        [
            'fullname.required' => 'Full name is required.',
            'email.required' => 'Email is required.',
            'phone.required' => 'Phone number is required.',
            'country.required' => 'Country name is required.',
            'address_1.required' => 'Address is required.',
            'city.required' => 'City name is required.',
        ]
        );
        // dd($request->all());
        $mytime = \Carbon\Carbon::now();
        $date = $mytime->toDateTimeString();
        if(Auth::user()){
            $carts = \App\Cart::where('user_id', Auth::user()->id)->orWhere('session_id', session('user_id'))->get();
        }
        else{
            $carts = \App\Cart::where('user_id', session('user_id'))->orWhere('session_id', session('user_id'))->get();
        }
        $orderNo = "ORDER#".rand ( 10000 , 99999 );
        if($request->account == 'register'){
            $account = new User();
            $account->name = $request->fullname;
            $account->email = $request->email;
            $account->phone = $request->phone;
            $account->password = $request->password;
            $account->address1 = $request->address_1;
            $account->address2 = $request->address_2;
            $account->city = $request->city;
            $account->postal_code = $request->postcode;
            $account->country = $request->country;
            $account->save();
        }

        // Order Row
        $order_row = new Order();
        $order_row->order_no = $orderNo;
        if(Auth::user()){
            $order_row->user_id = Auth::user()->id;
        }
        else{
            $order_row->user_id = session('user_id');
        }
        if($request->fullname){
            $order_row->name = $request->fullname;
        }
        if($request->coupon){
            $copoun = Coupon::whereName($request->coupon)->first();
            if($copoun){
                $order_row->coupon_id = $copoun->id;
            }
        }
        if($request->voucher){
            $voucher = Voucher::whereName($request->voucher)->first();
            if($voucher){
                $order_row->voucher_id = $voucher->id;
            }
        }
        $order_row->email = $request->email;
        $order_row->phone = $request->phone;
        $order_row->country = $request->country;
        $order_row->address_1 = $request->address_1;
        if($request->address_2){
            $order_row->address_2 = $request->address_2;
        }
        $order_row->city = $request->city;
        $order_row->zip = $request->postcode;
        if($request->shipping_charges){
            $order_row->shipping_charges = $request->shipping_charges;
        }
        $order_row->status = 'Pending';
        $order_row->comment = $request->comments;
        $order_row->payment_method = $request->payment_type;
        $order_row->save();

        foreach($carts as $key=>$cart){
            // Commission
            $product = Product::where('id', $cart['product_id'])->first();
            Product::where('id', $cart['product_id'])->update([
                'p_quantity' => (int)$product->p_quantity - (int)$cart['quantity'],
            ]);

            // Order Products 
            $owner_id = Product::where('id',$cart->product_id)->pluck('user_id')->first();
            // dd($owner_id);
            $p_row['user_id'] = $order_row->user_id;
            $p_row['product_id'] = $cart->product_id;
            $p_row['owner_id'] = $owner_id;
            $p_row['order_id'] = $order_row->id;
            $p_row['image'] = $cart->image;
            $p_row['name'] = $cart->product['name'];
            $p_row['quantity'] = $cart->quantity;
            $p_row['price'] = $cart->price;
            $p_row['size'] = $cart->size;
            $p_row['color'] = $cart->color;
            $p_row['total'] = $cart->total;
            ProductOrder::create($p_row);
        }

        Mail::to([$request->email, 'sales@pakcompany.com.pk'])->send(new OrderMail($order_row->order_no));
        Cart::where('user_id', session('user_id'))->orWhere('session_id', session('user_id'))->delete();
        $request->session()->flash('alert-success', 'Thank you for placing an Order!');
        return redirect()->route('thank-you-page');
    }

    public function thank_you_page(){
        return view('front.thank-you');
    }
    public function product($id, Request $request){
        $id = ($id);
        if($id == 0){
            $product = Product::with('category', 'subcategory', 'brand', 'product_size', 'gallery', 'color_product','comment')->whereName($request->name)->first();
        }
        else{
            $product = Product::with('category', 'subcategory', 'brand', 'product_size', 'gallery', 'color_product','comment')->find($id);
        }
        $chats = Chat::orderBy('created_at','desc')->get();
        $categories=Category::with('subcategories')->get();
        $relatedProduct =Product::where('brand_id',$product->brand_id)->where('id','!=',$id)->get();
        $latest= Product::orderBy('created_at','desc')->limit(5)->get();
        return view('front.product',compact('product','categories','relatedProduct','latest'), ['chats' => $chats]);
    }

    public function search_product(Request $request){
        $product = Product::with('category', 'subcategory', 'brand', 'product_size', 'gallery', 'color_product','comment')->whereName($request->name)->first();
        return encrypt($product->id);
    }

    public function get_size_price(Request $request){
        $product = product_size::where('product_id', $request->id)->first();
        $index = array_search($request->size, json_decode($product->size));
        $arr = json_decode($product->price);
        return $price = $arr[$index];
    }

    public function add_to_cart(Request $request){
        // return json_encode($request->all());
        $product = Product::with('category', 'subcategory', 'brand', 'product_size', 'gallery', 'color_product')->find($request->product_id);
        // return json_encode($product);
        $size = $request->size;
        $color = $request->color;
        $quantity = $request->quantity;
        $price = $product->price;
        // return json_encode($size.$color.$quantity.$price);
        $cart = new Cart();
        if(!Auth::user()){
            $user_id = rand(1000,10000);
        }
        else{
            $user_id = Auth::user()->id;
        }
        $cart = Cart::where('product_id',$request->product_id)->where('user_id', session('user_id'))->first();
        if($cart){
            $qty = $cart->quantity + $quantity;
            if(session('user_id')){
                    Cart::where('product_id',$request->product_id)->where('user_id', session('user_id'))->update([
                    'quantity' => $qty,
                    'total' => $qty * $cart->price,
                ]);
            }
            else{
                Session::put('user_id', $user_id);
                Cart::where('product_id',$request->product_id)->where('user_id', session('user_id'))->update([
                    'quantity' => $qty,
                    'total' => $qty * $cart->price,
                'user_id'=> Auth::check() ? Auth::user()->id:session('user_id'),
                ]);
            }
            
            return view('front.layout.header-cart');
        }
        else{
            if(session('user_id')){

            }
            else{
                Session::put('user_id', $user_id);
            }
            $cartArray = [
                "product_id" => $request->product_id,
                'user_id'=> Auth::check() ? Auth::user()->id:session('user_id'),
                "session_id" => session('user_id'),
                "image" => $product->p_thumbnail,
                "name" => $product->name,
                "quantity" => (int)$quantity,
                "price" => (int)$price,
                "size" => $size,
                "color" => $color,
                "total" => (int)$quantity * (int)$price,
            ];
            Cart::insert($cartArray);
            return view('front.layout.header-cart');
        }
    }

    public function category_product($id=null, $name=null){
        if($id){
            $products =Product::where('category_id',$id)->get();
        }
        else{
            $products =Product::all();
        }
        $subcategories=Subcategory::all();
        $brands=Brand::all();
        return view('front.all-product',compact('products','subcategories','brands'))->with('name', $name);
        // return view('front.category-product');
    }

    public function add_wishlist(Request $request){
           
        if(Auth::user()){
            $wish =WishList::where('product_id',$request->id)->distinct('product_id')->get();
            if(count($wish)>0){ 
                foreach($wish as $w){
                   if($w->user_id != Auth::id()){
                    WishList::create(['product_id'=>$request->id,'user_id' =>Auth::id()]);
                        // return "Product added to wish List.";
                        return view('front.includes.get-wishlist');
                   }
                   else{
                        return "This product is already added to your wish list";
                   }
                }
            }
            else{
                WishList::create(['product_id'=>$request->id,'user_id' =>Auth::id()]);
                return view('front.includes.get-wishlist');
                // return "Product added to wish List";
            }
        }
        else{
            Session::put('wishListProduct', $request->id);
            return "please login to add this to wish list";
        }
   }

    public function wishlist(){
        if(Auth::check()){
            $wishlist=WishList::with('product')->where('user_id',Auth::id())->get();
            return view('front.wishlist',compact('wishlist'));
        }
        else{  
            return redirect('login-new-account');
        }
        // return view('front.wishlist');
    }

    public function compare(){
        return view('front.compare');
    }

    public function get_products(Request $request){
   
        $products =Product::select('id','name')->where('name','like','%'.$request->name.'%')->get();
         return Response()->json($products);
    
    }

    // public function compare(Request $request,$id){
    //     $row = ThemeSetting::first();
    //     $menus = Menu::with(['category.subcategories'])->get();
    //     // dd($menus);
    //     $categories = Category::with('subcategories')->get();
    //     $product1=Product::find($id);
    //     $data=Product::all();
    //     $product2="";
    //     return view('compare', ['menus' => $menus, 'categories' => $categories, 'product1' => $product1,'data' => $data,'product2' => $product2,])->with('row', $row);
    // }

    public function compareProduct(Request $request){
            
             $row = ThemeSetting::first();
             $menus = Menu::with(['category.subcategories'])->get();
            // dd($menus);
             $categories = Category::with('subcategories')->get();
             $product1=Product::where('name',$request->product1)->with('product_size')->first();
             
             $product2=Product::where('id',$request->product2)->with('product_size')->first();
             $data=Product::all();
             return view('compare', ['menus' => $menus, 'categories' => $categories, 'product1' => $product1,'product2' => $product2,'data' => $data])->with('row', $row);       

    }

    public function get_cart_items(){
        return view('layout.get-slide-cart-session-items');
    }

    public function delete_cart_item(Request $request){
        $cart = Cart::find($request->id);
        $cart->delete();
        return view('layout.get-slide-cart-session-items');
    }

    public function delete_item_from_cart(Request $request){
        $cart = Cart::find($request->id);
        $cart->delete();
        return view('layout.cart-items');
    }

    public function products(){
        $row = ThemeSetting::first();
        $menus = Menu::with(['category.subcategories'])->get();
        $categories = Category::with('subcategories')->get();
        $products = Product::with(['product_size'])->get();
        return view('products', ['menus' => $menus, 'categories' => $categories, 'products' => $products])->with('row', $row);
    }

    public function view_product_detail($name){
        // dd(session('cart'));
        if (strpos($name, '-') !== false) {
            $name = str_replace('-', ' ', $name);
        }
        $product = Product::with(['product_size', 'gallery'])->whereName($name)->first();
        $row = ThemeSetting::first();
        return view('product')->with('product', $product)->with('row', $row);
    }

    public function category_products($name){
        $name = str_replace('-', ' ', $name);
        $category = Category::whereName($name)->first();
        $products = $category->products;
        $row = ThemeSetting::first();
        return view('category-products', compact('products'))->with('row', $row)->with('category_name', $name);
    }
    
    public function subcategory_products($name){
        $name = str_replace('-', ' ', $name);
        $subcategory = Subcategory::whereName($name)->first();
        // dd($products);
        $products = $subcategory->product;
        $row = ThemeSetting::first();
        return view('subcategory-products', compact('products'))->with('row', $row)->with('category_name', $name);
    }

    public function cart(){
        $row = ThemeSetting::first();
        return view('shop-cart', compact('row'));
    }

    public function update_cart(Request $request){
        $cart = Cart::find($request->id);
        Cart::where('id', $request->id)->update([
            'quantity' => $request->qty,
            'total' => $request->qty * $cart->price,
        ]);
        return view('layout.cart-items');
    }

    public function cart_items(){
        return view('layout.cart-items');
    }

    
    public function sign_up_account(Request $request){
        $this->validate($request, [
            's_email' => 'required',
            's_password' => 'required',
        ]);
        $user = new User();
        $user->email = $request->s_email;
        $user->password = Hash::make($request->s_password);
        $user->save();
        $user_data = array(
            'email' => $request->get('s_email'),
            'password' => $request->get('s_password'),
        );
        if(Auth::attempt($user_data)){
            return back();
        }
    }

    public function login_user(Request $request){
        $this->validate($request, [
            'l_email' => 'required',
            'l_password' => 'required',
        ]);
        $user_data = array(
            'email' => $request->get('l_email'),
            'password' => $request->get('l_password'),
        );
        if(Auth::attempt($user_data)){
            return back();
        }
    }

    public function user_logout(Request $request){
        Auth::logout();
        return back();
    }


    public function login_form(){
        $row = ThemeSetting::first();
        return view('login-form', compact('row'));
    }

//     public function wishlist(Request $request,$product_id){

//         if(Auth::user() ){
//              $wish =WishList::where('product_id',$product_id)->distinct('product_id')->get();
             
//             if(count($wish)>0){ 
//                    foreach($wish as $w){
//                    if($w->user_id != Auth::id())
//                    {
//                     WishList::create(['product_id'=>$product_id,'user_id' =>Auth::id()]);
//                     $request->session()->flash('alert-success', 'Product added to wish List.');
//                     return redirect()->back();
//                    }
//                    else{
//                     $request->session()->flash('alert-danger', 'This product is already added to your wish list');
//                     return redirect()->back();
//                    }
//                   }
//               }
//               else{
//                 WishList::create(['product_id'=>$product_id,'user_id' =>Auth::id()]);
//                 $request->session()->flash('alert-success', 'Product added to wish List.');
//                 return redirect()->back();
//               }
//         }
//         else{
//             Session::put('wishListProduct', $product_id);
//             $request->session()->flash('alert-danger', 'please login to add this to wish list');
//             return redirect()->route('login-form');
//         }
//    }
   public function display_wishList(){
        if(Auth::check()){
            $wishlist=WishList::with('product')->get();
            // dd($wishlist);
            $row = ThemeSetting::first();
            return view('wishlist',compact('wishlist'), compact('row'));
        }
        else{  
            return redirect('user/login');
        }
    }

    public function remove_wishlist(Request $request, $id){
        $wishlist = WishList::find($id);
        $wishlist->delete();
        $request->session()->flash('alert-success', 'Product removed from wishlist.');
        return redirect()->back();
    }

    public function user_profile(){
        if(Auth::user()){
            $row = ThemeSetting::first();
            return view('user-profile', compact('row'));
        }
    }

    public function applyCoupon(Request $request)
    {
        $data=Coupon::whereName($request->val)->select('percentage')->first();
        return Response()->json($data);
    }

    public function get_coupon(Request $request)
    {       
        if(Auth::check()){
            $coupon = Coupon::whereName($request->coupon)->first();
            $check= CouponUser::where('user_id',Auth::id())->where('coupon_id',$coupon->id)->first();
            if($coupon && $check){
                if($check->coupon_id==$coupon->id){
                    $message ="You have already use this token";
                    return Response()->json([$coupon,$message]);
                }
                else{
                    CouponUser::create(['coupon_id'=>$coupon->id,'user_id' =>Auth::id()]);
                    return Response()->json($coupon);
                }
            }
            else{
                CouponUser::create(['coupon_id'=>$coupon->id,'user_id' =>Auth::id()]);
                return Response()->json($coupon);
            }
        }
        else{  
            return 0;
        }
   }
   public function contactUs(){
        $row = ThemeSetting::first();
        $menus = Menu::with(['category.subcategories'])->get();
        $categories = Category::with('subcategories')->get();
        $images=HomeImage::limit(3)->get();
        return view('contact-us', ['menus' => $menus, 'images' => $images, 'categories' => $categories])->with('row', $row);

    }
    public function ceo(){
        $row = ThemeSetting::first();
        $menus = Menu::with(['category.subcategories'])->get();
        
        $categories = Category::with('subcategories')->get();
        $images=HomeImage::limit(3)->get();
        return view('ceo', ['menus' => $menus, 'images' => $images, 'categories' => $categories])->with('row', $row);

    }
    public function about(){
        $row = ThemeSetting::first();
        $menus = Menu::with(['category.subcategories'])->get();
        
        $categories = Category::with('subcategories')->get();
        $images=HomeImage::limit(3)->get();
        return view('about-us', ['menus' => $menus, 'images' => $images, 'categories' => $categories])->with('row', $row);

    }
    public function shopfilter(Request $request){
        $products=Product::with('subcategory')->
                when(!empty(request()->get('subcategory')),function($query){     
                   return $query->orWhereIn('subcategory_id',request()->get('subcategory'));
                }
                )->
                when(!empty(request()->get('search')),function($query){     
                    return $query->where('name','like','%'.request()->get('search').'%');
                }
                )->
                when(!empty(request()->get('max_value')),function($query){     
                   return $query->orWhereBetween('price',array(request()->get('min_value'),request()->get('max_value')));
                }
                )->
                when(!empty(request()->get('brand')),function($query){      
                   return $query->orWhereIn('brand_id',request()->get('brand'));
                }
        )->get();
                $subcategories=Subcategory::all();
               $brands=Brand::all();

        return view('front.category-product',compact('products','subcategories','brands'));
    }

    public function my_account(){
        return view('my-account.my-account');
    }

    public function claim_action(Request $request){
        // dd($request->all());
        $this->validate($request, [
            'reason' => 'required',
            'order_no' => 'required',
            'price' => 'required',
            'description' => 'required',
            // 'images' => 'required',
        ],
        [
            'reason.required' => 'Claim reason is required',
            'order_no.required' => 'Order number is required',
            'price.required' => 'Product Price is required',
            'description.required' => 'Claim description Price is required',
            // 'images.required' => 'Product images are required',
        ]
        );
        $order = Order::where('order_no', $request->order_no)->first();
        if($order){
            $product = Product::whereName($order->product)->first();
            if($product){
                $owner = $product->user_id;
            }
        }
        $claim = new Claim();
        $claim->user_id = Auth::user()->id;
        $claim->owner_id = $owner;
        $claim->reason = $request->reason;
        $claim->order_no = $request->order_no;
        $claim->price = $request->price;
        $claim->description = $request->description;
        $claim->save();
        if($request->gallery){
            // upload multiple image
            if($request->file('gallery')){
                $images = $request->file('gallery');
                $row = [];
                foreach($images as $image)
                {
                    $image_to_store = [];
                    $image_to_store['claim_id'] = $claim->id;
                    $name=$image->getClientOriginalName();
                    $image->move(public_path().'/Claims/', $name);  
                    $image_to_store['image'] = $name;  
                    $row[] = $image_to_store;
                }
                ClaimGallery::insert($row);
            }
        }
        $request->session()->flash('alert-success', 'Your Claim has been submitted.');
        return redirect()->back();
    }
  public function contact(Request $request){
        
       $this->validate($request, [
            'email' => 'required',
        ],
        [
            'email.required' => 'Email is required',
            
        ]
        );
        // Mail::to('sufian.devdigs@gmail.com')->send(new SendMail($request->all()));
      
        return redirect()->back();
   
    
  }

}
