<?php

namespace App\Imports;

use App\Product;
use App\product_size;
use App\Category;
use App\Subcategory;
use App\Brand;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Auth;
class ProductImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {  
        $cat_id=0;
        $sub_id=0;
        $brand_id=0;
         $category=Category::where('name','like','%'.$row['category'].'%')->get();
         if(count($category)>0){
            $cat_id=$category[0]->id;
         }
         else{
            $category=Category::create(['name'=>$row['category']]);
             $cat_id=$category->id;
         }
          $subcategory=Subcategory::where('name','like','%'.$row['subcategory'].'%')->get();
         if(count($subcategory)>0){
            $sub_id=$subcategory[0]->id;
         }
         else{
            $subcategory=Subcategory::create(['name'=>$row['subcategory'],'category_id'=>$cat_id]);
            $sub_id=$subcategory->id;

         } 
         $brand=Brand::where('name','like','%'.$row['brand'].'%')->get();
         if(count($brand)>0){
            $brand_id=$brand[0]->id;
         }
         else{
            $brand=Brand::create(['name'=>$row['brand'],'category_id'=>$cat_id,'subcategory_id'=>$sub_id]);
            $brand_id=$brand->id;

         }
       
       $product=Product::create([
            
           'name'     => $row['name'],
           'user_id' => Auth::id(),
           'p_detail'    => $row['detail'], 
           'p_description' => $row['description'],
           'category_id' => $cat_id,
           'subcategory_id' => $sub_id,
           'brand_id' => $brand_id
        
        ]);
        return new product_size(['size'=>$row['size'],'quantity'=>$row['quantity'],'product_id'=>$product->id]);
    }
}
