<?php

namespace App\Http\Controllers;
use App\Category;
use App\Subcategory;
use Auth;
use App\Brand;
use App\Subcategory1;
use App\Subcategory2;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function view_brand(){
      
        $category= Category::all();
        $subcategory= Subcategory::all();
        $brand= Brand::with('category','subcategory')->get();

        return view('admin.brand.view',compact('category','subcategory','brand'));
    }
    public function getSubcategoriesByCategory(Request $request){
    	$subcategory= Subcategory::where('category_id',$request->id)->get();
    	return $subcategory;
    }

    public function getSubcategory1BySubcategory(Request $request){
        $subcategory= Subcategory1::where('subcategory_id',$request->id)->get();
    	return $subcategory;
    }

    public function getSubcategory2BySubcategory(Request $request){
        $subcategory= Subcategory2::where('subcategory1_id',$request->id)->get();
    	return $subcategory;
    } 
    public function add_new_brand(Request $request){
        $request->validate([
                'name' => 'required',
                'cat_id' =>'required',
                'subcategory_id' =>'required',

            ],
            [
                'name.required'=> ' name is required',
                'cate_id.required'=> 'Please Select Category',
                'subcategory_id.required'=> 'Please Select SubCategory',
            ]
        );
         $brand = new Brand();
         
        // if($request->file('image')){
        //     $image = $request->file('image');
        //     $name=$image->getClientOriginalName();
        //     $image->move(public_path().'/brand', $name);
        //     $brand->image = $name;
        // }
        //  else{
        //         $brand->image = 'default-image.png';
        //     }
        if (strpos($request->category, ' ') !== false) {
            $slug = str_replace(' ', '-', $request->category);
        }
        else{
            $slug = $request->category;
        }
       $brand->name=$request->name;
       $brand->category_id = $request->cat_id;
       $brand->subcategory_id = $request->subcategory_id;
       
       
       $brand->save();
       $request->session()->flash('alert-success', 'New Subcategory added.');
        return back();
    }

    public function brand_delete($id, Request $request){
        $brand =Brand::find($id);
          $brand->delete();
        
        $request->session()->flash('alert-success', 'One subcategory removed.');
        return back();
    }
    public function edit_brand_form(Request $request){
        $brand = Brand::find($request->id);
        return $brand;
    }
    public function edit_brand_action(Request $request){
       $request->validate([
                'name' => 'required',
                'cat_id' =>'required',
                'subcategory_id' =>'required',

            ],
            [
                'name.required'=> 'SubCategory name is required',
                'cate_id.required'=> 'Please Select Category',
                'subcategory_id.required'=> 'Please Select SubCategory',
            ]
        );
        $brand = Brand::find($request->id);
        
        if($request->file('image')){
            $image = $request->file('image');
            $name=$image->getClientOriginalName();
            $image->move(public_path().'/subcategories', $name);
            $brand->image = $name;
        }
         else{
                $brand->image= 'default-image.png';
            }
      
        $brand->update(['name'=>$request->name,'category_id'=>$request->cat_id,'subcategory_id'=>$request->subcategory_id,'image',$brand->image]);
        
        return redirect()->route('ds.product-management.brands');
    }

}
