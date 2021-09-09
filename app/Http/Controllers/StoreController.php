<?php

namespace App\Http\Controllers;

use App\Category;
use App\DayDeal;
use App\PageLayout;
use App\Product;
use App\Subcategory;
use App\TopCollection;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Chart\Layout;

class StoreController extends Controller
{
    public function top_collections(){
        $collections = TopCollection::all();
        $categories = Category::all();
        return view('admin.store-settings.top-collections', compact('collections'), compact('categories'));
    }

    public function top_collections_action(Request $request){
        // dd($request->all());
        $request->validate([
            'subcategory' => 'required',
            'title' => 'required',
            'image' => 'required',
        ],
        [
            'subcategory.required'=> 'Choose one Collection.',
            'title.required'=> 'Title is required.',
            'image.required'=> 'Image is required.',
        ]
        );
        $collection = new TopCollection();
        $collection->category_id = $request->subcategory;
        $collection->title = $request->title;
        if($request->file('image')){
            $p_thumbnail = $request->file('image');
            $name=$p_thumbnail->getClientOriginalName();
            $p_thumbnail->move(public_path().'/top-collection/', $name);
            $collection->image = $name;
        }
        $collection->save();
        $request->session()->flash('alert-success', 'One new Collection is added.');
        return back();
    }

    public function top_collection_delete(Request $request, $id){
        $collection = TopCollection::find($id);
        unlink(public_path('top-collection').'/'.$collection->image);
        $collection->delete();
        $request->session()->flash('alert-success', 'One new Collection is removed.');
        return back();
    }

    public function deals_of_the_day(){
        $products = Product::with('product_size')->where('status', TRUE)->get();
        $deals_of_the_day = DayDeal::with('product')->get();
        return view('admin.store-settings.deals-of-the-day', compact('products'), compact('deals_of_the_day'));
    }

    public function deals_of_the_day_action(Request $request){
        $request->validate([
            'product_id' => 'required',
            'new_price' => 'required',
            // 'from' => 'required',
            // 'to' => 'required',
        ],
        [
            'product_id.required'=> 'Choose one product.',
            'new_price.required'=> 'Price is required.',
            // 'from.required'=> 'Deal starting date is required.',
            // 'to.required'=> 'Deal ending date is required.',
        ]
        );
        DayDeal::create($request->all());
        $request->session()->flash('alert-success', 'One new Deal of the Day is added.');
        return back();
    }

    public function page_layout(){
        $categories = Category::all();
        $layouts = PageLayout::with('category')->get();
        return view('admin.store-settings.page-layout', ['categories' => $categories, 'layouts' => $layouts]);
    }

    public function page_layout_action(Request $request){
        $request->validate([
            'title' => 'required',
            'category_id' => 'required',
            'img' => 'required',
        ],
        [
            'title.required'=> 'Section title is required.',
            'category_id.required'=> 'Choose one category.',
            'img.required'=> 'Image is required.',
        ]
        );
        if($request->file('img')){
            $p_thumbnail = $request->file('img');
            $name=$p_thumbnail->getClientOriginalName();
            $p_thumbnail->move(public_path().'/thumbnail/', $name);
        }
        $layout = new PageLayout();
        $layout->title = $request->title;
        $layout->category_id = $request->category_id;
        $layout->img = $name;
        $layout->save();
        // PageLayout::create($request->all());
        $request->session()->flash('alert-success', 'One new Section is added.');
        return back();
    }

    public function page_layout_delete(Request $request, $id){
        $layout = PageLayout::find($id);
        unlink(public_path('thumbnail').'/'.$layout->img);
        $layout->delete();
        $request->session()->flash('alert-success', 'One Layout Section is removed.');
        return back();
    }
}
