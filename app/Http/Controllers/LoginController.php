<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\WishList;
use Laravel\Socialite\Facades\Socialite;
use Session;
use App\Cart;
use App\User;
class LoginController extends Controller
{
    public function Callback($provider){
        $userSocial =   Socialite::driver($provider)->stateless()->user();
        $users =   User::where(['email' => $userSocial->getEmail()])->first();
        if($users){
            Auth::login($users);
            return redirect('/');
        }
        else{
            $user = User::create([
                'name' => $userSocial->getName(),
                'email' => $userSocial->getEmail(),
                'user_image' => $userSocial->getAvatar(),
                'is_admin' =>2,
                'provider_id' => $userSocial->getId(),
                'provider' => $provider,
            ]);
            return redirect()->route('index');
        }
    }

    public function authenticate(Request $request)
    {    
       
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:6|max:15',

        ],
        [
            'email.required' => 'User email is required',
            'password.required' => 'Password is required',
        ]
        );
        $credentials = $request->only('email', 'password');
          
        if (Auth::attempt($credentials)){
            if($request->url()==url('/').'/vendor/login'){
               
                return redirect()->route('ds.dashboard');
            }  
            if($request->url()==url('/').'/admin/login'){
               
                return redirect()->route('ds.dashboard');
            }
            if($request->url()==url('/').'/user/login' || $request->url()==url('/').'/checkout' || $request->url()==url('/').'/user/login'){
                
                if(session('user_id')){
                    Cart::where('user_id',session('user_id'))->update(['user_id'=>Auth::id()]);
                    // Session::flush('user_id');
                }

                if($request->session()->has('wishListProduct')){
                    $wish =WishList::where('product_id',Session::get('wishListProduct'))->distinct('product_id')->get();
                    if(count($wish)>0){ 
                        foreach($wish as $w){
                            if($w->user_id != Auth::id()){
                                WishList::create(['product_id'=>Session::get('wishListProduct'),'user_id' =>Auth::id()]);
                                $request->session()->flash('alert-success', 'Product added to wish List.');
                            }
                            else{
                                $request->session()->flash('alert-danger', 'This product is already added to your wish list');
                            }
                        }
                    }
                    else{
                        WishList::create(['product_id'=>Session::get('wishListProduct'),'user_id' =>Auth::id()]);
                        $request->session()->flash('alert-success', 'Product added to wish List.');
                    }
                }
            return redirect()->route("index");
            

            }
            return redirect()->route("index");
        }
        else{
            $request->session()->flash('alert-error', 'Email or Passwords are not matched.');
        	return redirect()->back();
        }
    }
    
    public function logout(Request $request){
        // session()->flush();
        Auth::logout();
        // unset(Auth::user()->key);
        if($request->url()==url('/').'/admin/logout'){
                  return redirect()->route('admin.login');
         }
         if($request->url()==url('/user/logout')){
            return redirect()->route("index");
         }
        return redirect()->route('admin.login');
    }
    public function redirect($provider){
        return Socialite::driver($provider)->redirect();
    }

}