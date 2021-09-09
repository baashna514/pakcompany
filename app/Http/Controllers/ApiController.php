<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Category;
use App\Gallery;
use App\Integration;
use App\Order;
use App\Product;
use App\Comment;
use App\Chat;
use App\User;
use App\product_size;
use App\Subcategory;
use Illuminate\Http\Request;
use DateTime;
use Auth;

class ApiController extends Controller
{
    public function get_categories_data(){
        $categories = Category::all();
        return Response()->json($categories);
    }

    public function get_subcategories_data(){
        $subcategories = Subcategory::with('category')->get();
        return Response()->json($subcategories);
    }

    public function get_brands_data(){
        $brands = Brand::with('category', 'subcategory')->get();
        return Response()->json($brands);
    }

    public function get_all_products_data(){
        $products = Product::with('category', 'subcategory', 'brand', 'gallery', 'product_size', 'color_product')->get();
        return Response()->json($products);
    }

    public function get_category_products_data($category_id){
        $category_products = Product::with('category', 'brand', 'gallery', 'product_size', 'color_product')->where('category_id', $category_id)->get();
        return Response()->json($category_products);
    }

    public function get_subcategory_products_data($subcategory_id){
        $subcategory_products = Product::with('category', 'brand', 'gallery', 'product_size', 'color_product')->where('subcategory_id', $subcategory_id)->get();
        return Response()->json($subcategory_products);
    }

    public function get_brand_products_data($brand_id){
        $brand_products = Product::with('category', 'subcategory', 'gallery', 'product_size', 'color_product')->where('brand_id', $brand_id)->get();
        return Response()->json($brand_products);
    }

    public function get_single_product_data($id){
        $product = Product::with('category', 'subcategory', 'brand', 'gallery', 'product_size', 'color_product')->find($id);
        return Response()->json($product);
    }

    public function get_product_sizes_data($product_id){
        $data = product_size::with('product')->where('product_id', $product_id)->first();
        return Response()->json($data);
    }

    public function get_product_gallery_data($product_id){
        $gallery = Gallery::where('product_id', $product_id)->get();
        return Response()->json($gallery);
    }

    public function get_all_orders_data(){
        $orders = Order::with('user')->get();
        return Response()->json($orders);
    }   

    public function get_single_order_data($order_id){
        $order = Order::with('user')->find($order_id);
        return Response()->json($order);
    }



    // Vendor API's Functions
    public function api_integration(){
        $integrations = Integration::orderBy('id', 'DESC')->where('user_id',Auth::id())->get();
        return view('admin.integration.integration', ['integrations' => $integrations]);
    }

    public function delete_integration(Request $request, $id){
        $integ = Integration::find($id);
        $integ->delete();
        $request->session()->flash('alert-success', 'One Integration deleted.');
        return back(); 
    }

    public function get_comment(Request $request){

         return Response()->json(Comment::all());
    }
    public function get_chat(Request $request){

         return Response()->json(Chat::all());
    }

    public function post_register(Request $request, $id){
         
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
            'status' => $request->status,
            'user_image' => $user_image,
            'cnic_front_image' => $cnic_front,
            'cnic_back_image' => $cnic_back,
            'points'=>$points,
            'password' => Hash::make($request->password),
            'is_admin' => $type
        ]);

       if($request->type==2){
          return Response()->json('Customer registered');
        }
       else{
          return Response()->json('Vendor created successfully');
       }     
    }
       public function authenticate(Request $request)
    {    
        
        $credentials = $request->only('email', 'password');
      
        if (Auth::attempt($credentials)){
            return Response()->json(User::where("email",$request->email)->first());
        }
        else{
            return Response()->json('incorrect email or password');

        }
    }
    
    public function send_chat_messages(Request $request){
        $product = Product::find($request->product_id);
        $owner_id = $product->user_id;
        $user_id = Auth::user()->id;
        $message = $request->message;
        if(Auth::user()->is_admin == 0){
            $status = 'vendor';
        }
        if(Auth::user()->is_admin == 2){
            $status = 'user';
        }
        $chat = new Chat();
        $chat->product_id = $request->product_id;
        $chat->user_id = $user_id;
        $chat->owner_id = $owner_id;
        $chat->message = $message;
        $chat->status = $status;
        $chat->seen = 'no';
        $chat->save();
    }

    public function api_integration_action(Request $request){
        $this->validate($request, [
            'source' => 'required',
            'username' => 'required:unique:integrations',
            'api_key' => 'required',
        ]);
        $integration  = new Integration();
        $integration->source = $request->source;
        $integration->username = $request->username;
        $integration->key = $request->api_key;
        $integration->status = 'active';
        $integration->user_id = Auth::user()->id;
        $integration->save();

        // Categories
        // It's only needed if timezone in php.ini is not set correctly.
        date_default_timezone_set("UTC");
        // The current time. Needed to create the Timestamp parameter below.
        $now = new DateTime();
        // The parameters for the GET request. These will get signed.
        $cat_parameters = array(
        // The ID of the user making the call.
        'UserID' => $request->username,
        // The API version. Currently must be 1.0
        'Version' => '1.0',
        // The API method to call.
        'Action' => 'GetCategoryTree',
        // The format of the result.
        'Format' => 'JSON',
        'Offset' => '0',
        // The current time in ISO8601 format
        'Timestamp' => $now->format(DateTime::ISO8601)
        );
        // Sort cat_parameters by name.
        ksort($cat_parameters);
        // URL encode the cat_parameters.
        $encoded = array();
        foreach ($cat_parameters as $name => $value) {
        $encoded[] = rawurlencode($name) . '=' . rawurlencode($value);
        }
        // Concatenate the sorted and URL encoded cat_parameters into a string.
        $concatenated = implode('&', $encoded);
        // The API key for the user as generated in the Seller Center GUI.
        // Must be an API key associated with the UserID parameter.
        $cat_api_key = $request->api_key;
        // Compute signature and add it to the cat_parameters.
        $cat_parameters['Signature'] =
        rawurlencode(hash_hmac('sha256', $concatenated, $cat_api_key, false));

        // Replace with the URL of your API host.
        $cat_url = "https://api.sellercenter.daraz.pk/";
        // Build Query String
        $cat_queryString = http_build_query($cat_parameters, '', '&',PHP_QUERY_RFC3986);
        $curl_header = curl_init();
        curl_setopt($curl_header, CURLOPT_URL, $cat_url."?".$cat_queryString);
        // Save response to the variable $data
        curl_setopt($curl_header, CURLOPT_FOLLOWLOCATION,1);
        curl_setopt($curl_header, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($curl_header, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($curl_header, CURLOPT_SSL_VERIFYPEER, 0);
        $cat = curl_exec($curl_header);
        
        curl_close($curl_header);
        $categories_array = (json_decode($cat, true));
        foreach($categories_array as $cat_array){
              foreach($cat_array['Body'] as $category){
                $cat_id=$category['categoryId'];
                $cat_row = [];
                $cat_id=0;
                $db_category = Category::where('name',$category['name'])->first();
                if($db_category){
                    $subCat_row=[];
                $moreSubCat_row=[];
                if($category['children']!=[]){
                    foreach($category['children'] as $subcategory){

                        $db_subcategory = Subcategory::where('name', 'like',$subcategory['name'])->first();

                if($db_subcategory){
                           
                    if($subcategory['children']!=[]){
                            foreach($subcategory['children'] as $subcat){
                               $db_subcategory_sub = Subcategory::where('name', 'like',$subcat['name'])->first();
                               if(!$db_subcategory_sub){
                                $moreSubCat_row['name']=$subcat['name'];
                                $moreSubCat_row['slug']=$subcat['categoryId'];
                                $moreSubCat_row['category_id']=$cat_id;
                                Subcategory::insertGetId($moreSubCat_row);
                            }

                         }

                        }
                    continue;
                }
                else{
                    if($subcategory['children']!=[]){
                            foreach($subcategory['children'] as $subcat){
                               $db_subcategory_sub = Subcategory::where('name', 'like',$subcat['name'])->first();
                               if(!$db_subcategory_sub){
                                $moreSubCat_row['name']=$subcat['name'];
                                $moreSubCat_row['slug']=$subcat['categoryId'];
                                $moreSubCat_row['category_id']=$cat_id;
                                Subcategory::insertGetId($moreSubCat_row);
                              }
                            }
                        }
                    $subCat_row['name']=$subcategory['name'];
                    $subCat_row['slug']=$subcategory['categoryId'];
                    $subCat_row['category_id']=$cat_id;
                    Subcategory::insertGetId($subCat_row);
                }

                   }
                }
                    $cat_id=$db_category['id'];
                    continue;
                }
                else{
                    $subCat_row=[];
                $moreSubCat_row=[];
                if($category['children']!=[]){
                    foreach($category['children'] as $subcategory){

                        $db_subcategory = Subcategory::where('name', 'like',$subcategory['name'])->first();
                if($db_subcategory){
                    if($subcategory['children']!=[]){
                            foreach($subcategory['children'] as $subcat){
                               $db_subcategory_sub = Subcategory::whereName($subcat['name'])->first();
                            
                               if(!$db_subcategory_sub){
                        
                                $moreSubCat_row['name']=$subcat['name'];
                                $moreSubCat_row['slug']=$subcat['categoryId'];
                                $moreSubCat_row['category_id']=$cat_id;
                                Subcategory::insertGetId($moreSubCat_row);
                            }
                         }

                        }
                    continue;
                }
                else{
                    if($subcategory['children']!=[]){
                            foreach($subcategory['children'] as $subcat){
                               $db_subcategory_sub = Subcategory::where('name', 'like',$subcat['name'])->first();
                               if(!$db_subcategory_sub){
                                $moreSubCat_row['name']=$subcat['name'];
                                $moreSubCat_row['slug']=$subcat['categoryId'];
                                $moreSubCat_row['category_id']=$cat_id;
                                Subcategory::insertGetId($moreSubCat_row);
                            }
                          }
                        }
                    $subCat_row['name']=$subcategory['name'];
                    $subCat_row['slug']=$subcategory['categoryId'];
                    $subCat_row['category_id']=$cat_id;
                    Subcategory::insertGetId($subCat_row);
                }

                   }
                }
                    $cat_row['name'] = $category['name'];
                    $cat_row['slug'] = $category['categoryId'];
                    $cat_arr[] = $cat_row;
                   $cat_id= Category::insertGetId($cat_row);
               
                }
                
            }
           

            
        }


        // API Products
        // It's only needed if timezone in php.ini is not set correctly.
        date_default_timezone_set("UTC");
        // The current time. Needed to create the Timestamp parameter below.
        $now = new DateTime();
        // The parameters for the GET request. These will get signed.
        $parameters = array(
        // The ID of the user making the call.
        'UserID' => $request->username,
        // The API version. Currently must be 1.0
        'Version' => '1.0',
        // 'items_per_page' =>'300',
        // The API method to call.
        'Action' => 'GetProducts',
        // The format of the result.
        'Format' => 'JSON',
       // 'Offset'=>'10',
              
       'Limit' => '50',
       // 'Offset' =>'20', 
        // The current time in ISO8601 format
        'Timestamp' => $now->format(DateTime::ISO8601)
        );
        // Sort parameters by name.
        ksort($parameters);
        // URL encode the parameters.
        $encoded = array();
        foreach ($parameters as $name => $value) {
        $encoded[] = urlencode($name) . '=' . urlencode($value);
        }
        // Concatenate the sorted and URL encoded parameters into a string.
        $concatenated = implode('&', $encoded);
        // The API key for the user as generated in the Seller Center GUI.
        // Must be an API key associated with the UserID parameter.
        $api_key = $request->api_key;
        // Compute signature and add it to the parameters.
        $parameters['Signature'] =
        urlencode(hash_hmac('sha256', $concatenated, $api_key, false));

        // Replace with the URL of your API host.
        $url = "https://api.sellercenter.daraz.pk/";
        // Build Query String
        $queryString = http_build_query($parameters, '', '&',PHP_QUERY_RFC3986);
        // Open cURL connection

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url."?".$queryString);
        // Save response to the variable $data
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 36000);
        curl_setopt($ch, CURLOPT_TIMEOUT,36000);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION,1);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

        $data = curl_exec($ch);
        // Close Curl connection
        // dd($data);
        // dd("here1",$ch);
        curl_close($ch);
        $arr = (json_decode($data, true));
        $total_records=$arr['SuccessResponse']['Body']['TotalProducts'];
     if($total_records>50){
         // dd('here');
        for($offset=50;$offset<=$total_records;$offset+=50){
              
        // API Products
        // It's only needed if timezone in php.ini is not set correctly.
        date_default_timezone_set("UTC");
        // The current time. Needed to create the Timestamp parameter below.
        $now = new DateTime();
        // The parameters for the GET request. These will get signed.
        $parameters = array(
        // The ID of the user making the call.
        'UserID' => $request->username,
        // The API version. Currently must be 1.0
        'Version' => '1.0',
        // 'items_per_page' =>'300',
        // The API method to call.
        'Action' => 'GetProducts',
        // The format of the result.
        'Format' => 'JSON',
       // 'Offset'=>'10',
              
       'Limit' => '50',
       'Offset' =>$offset, 
        // The current time in ISO8601 format
        'Timestamp' => $now->format(DateTime::ISO8601)
        );
        // Sort parameters by name.
        ksort($parameters);
        // URL encode the parameters.
        $encoded = array();
        foreach ($parameters as $name => $value) {
        $encoded[] = urlencode($name) . '=' . urlencode($value);
        }
        // Concatenate the sorted and URL encoded parameters into a string.
        $concatenated = implode('&', $encoded);
        // The API key for the user as generated in the Seller Center GUI.
        // Must be an API key associated with the UserID parameter.
        $api_key = $request->api_key;
        // Compute signature and add it to the parameters.
        $parameters['Signature'] =
        urlencode(hash_hmac('sha256', $concatenated, $api_key, false));

        // Replace with the URL of your API host.
        $url = "https://api.sellercenter.daraz.pk/";
        // Build Query String
        $queryString = http_build_query($parameters, '', '&',PHP_QUERY_RFC3986);
        // Open cURL connection

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url."?".$queryString);
        // Save response to the variable $data
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 36000);
        curl_setopt($ch, CURLOPT_TIMEOUT,36000);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION,1);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

        $data = curl_exec($ch);
        // Close Curl connection
        curl_close($ch);
        $temp_arr = (json_decode($data, true));
         $arr['SuccessResponse']['Body']['Products'] =array_merge($arr['SuccessResponse']['Body']['Products'],$temp_arr['SuccessResponse']['Body']['Products']);

        }
    }
        $integration_id = Integration::where('username', $request->username)->pluck('id')->first();
        foreach($arr as $a){
            
            foreach(array_slice($a,1) as $products){
                $data = [];
                $gallery = [];
                foreach($products['Products'] as $product){
                    $row = [];
                    $row['name'] = $product['Attributes']['name'];
                    $row['p_description'] = $product['Attributes']['short_description'];
                    $row['user_id'] = Auth::user()->id;
                    $row['status'] = TRUE;
                    $row['integration_id'] = $integration_id;
                        $row['p_quantity'] = $product['Skus'][0]['quantity'];
                        $row['p_size'] = \json_encode($product['Skus'][0]['package_width'].'*'.$product['Skus'][0]['package_height'].'*'.$product['Skus'][0]['package_length']);
                        $row['price'] = $product['Skus'][0]['price'];
                        $row['sale_price'] = $product['Skus'][0]['special_price'];
                        if($product['Skus'][0]['Images']){
                        $row['p_thumbnail'] = $product['Skus'][0]['Images'][0];
                        }
                        $gallery = $product['Skus'][0]['Images'];
                    $subcat_id=Subcategory::where('category_id',$product['PrimaryCategory'])->orWhere('slug',$product['PrimaryCategory'])->first();
                    $brand = Brand::where('subcategory_id',$subcat_id['id'])->first();
                    if($brand==null){
                        $brand= Brand::create(['name' => $product['Attributes']['brand'], 'category_id' => $subcat_id['category_id'],'subcategory_id' => $subcat_id['id']]);
                    }
                    $row['category_id'] = $subcat_id['category_id'];
                    $row['subcategory_id'] = $subcat_id['id'];
                    $row['brand_id']=$brand->id;
                    // dd($product);
                    $temp=Product::whereName($row['name'])->get();
                    if(count($temp)>0){
                        continue;
                    }
                    else{
                        $pro_id = Product::insertGetId($row);
                        foreach($gallery as $key=>$image){
                            $gal = new Gallery();
                            $gal->product_id = $pro_id;
                            $gal->path = $image;
                            $gal->save();
                        }
                    }
                }
            }
        }
        $request->session()->flash('alert-success', 'API saved successfully.');
        return back();
    
    }
}
