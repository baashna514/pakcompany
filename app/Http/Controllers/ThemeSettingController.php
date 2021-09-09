<?php

namespace App\Http\Controllers;

use App\Category;
use App\Menu;
use App\Slider;
use App\ThemeSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\HomeImage;

class ThemeSettingController extends Controller
{
    public function general_setting(){
        $row = ThemeSetting::first();
        return view('admin.theme-settings.general-settings')->with('row', $row);
    }

    public function logo_setting(){
        $row = ThemeSetting::first();
        return view('admin.theme-settings.logo-settings')->with('row', $row);
    }

    public function logo_setting_action(Request $request){
        // dd(public_path().'\theme');
        $row = ThemeSetting::first();
        // dd($row);
        if($request->hd_logo){
            if($request->file('hd_logo')){
                $logo = $request->file('hd_logo');
                $logo_name = time().'.'.$logo->getClientOriginalExtension();
                $destinationPath = public_path().'/theme';
                // dd($destinationPath);
                $logo->move($destinationPath, $logo_name);
                ThemeSetting::where('id', $row->id)->update([
                    'hd_img_logo' => $logo_name,
                    'logo_type' => 'image',
                ]);
            }
        }
        $request->session()->flash('alert-success', 'Logo Updated.');
        return back();
    }

    public function favicon_setting(){
        $row = ThemeSetting::first();
        return view('admin.theme-settings.favicon-settings')->with('row', $row);
    }

    public function favicon_setting_action(Request $request){
        $this->validate($request, [
            'hd_favicon' => 'required',
        ]);
        $row = ThemeSetting::first();
        if($request->file('hd_favicon')){
            $image = $request->file('hd_favicon');
            $name=$image->getClientOriginalName();
            $image->move(public_path().'/theme', $name);
            ThemeSetting::find($row->id)->update([
                'hd_fevicon' => $name,
            ]);
            $request->session()->flash('alert-success', 'Favicon Uploaded.');
            return back();
        }
    }

    public function header_setting(){
        $row = ThemeSetting::first();
        return view('admin.theme-settings.header-settings')->with('row', $row);
    }

    public function header_setting_action(Request $request){
        $row = ThemeSetting::first();
        $data = $request->all();
        ThemeSetting::where('id', $row->id)->update([
            'hd_title' => $data['hd_title'],
            'hd_phone' => $data['hd_phone'],
            'hd_email' => $data['hd_email']
        ]);
        $request->session()->flash('alert-success', 'Header Setting Updated.');
        return back();
    }


    public function color_scheme(){
        $row = ThemeSetting::first();
        return view('admin.theme-settings.color-scheme')->with('row', $row);
    }

    public function color_scheme_action(Request $request){
        $row = ThemeSetting::first();
        $data = $request->all();
        if($request->hd_theme){
            ThemeSetting::where('id', $row->id)->update([
                'hd_theme' => $data['hd_theme']
            ]);
        }
        else{
            ThemeSetting::where('id', $row->id)->update([
                'hd_theme' => $row->hd_theme
            ]);
        }
        $request->session()->flash('alert-success', 'Color Scheme Updated.');
        return back();
    }

    public function site_logo_action(Request $request){
        $row = ThemeSetting::first();

        // update favicon
        if($request->file('hd_logo')){
            $image = $request->file('hd_logo');
            $name=$image->getClientOriginalName();
            $image->move(public_path().'/theme', $name);
            ThemeSetting::where('id', $row->id)->update([
                'hd_img_logo' => $name
            ]);
        }
        $request->session()->flash('alert-success', 'Site Logo Saved.');
        return back();
    }

    public function remove_favicon(Request $request){
        $row = ThemeSetting::first();
        unlink(public_path('theme').'/'.$row->hd_fevicon);
        ThemeSetting::where('id', $row->id)->update([
            'hd_fevicon' => null,
        ]);
        $request->session()->flash('alert-success', 'Favicon removed.');
        return back();
    }

    public function remove_logo(Request $request){
        $row = ThemeSetting::first();
        unlink(public_path('theme').'/'.$row->hd_img_logo);
        ThemeSetting::where('id', $row->id)->update([
            'hd_img_logo' => null,
        ]);
        $request->session()->flash('alert-success', 'Logo removed.');
        return back();
    }

    // Menu Functions Start
    public function menu_setting(){
        $menus = Menu::orderBy('id', 'ASC')->with('category')->get();
        $categories = Category::all();
        return view('admin.theme-settings.menu-settings2', ['menus' => $menus, 'categories' => $categories]);
    }

    public function add_menu(Request $request){
        // dd($request->all());
        $this->validate($request, [
            'category' => 'required',
        ],
        [
            'category.required' => 'Choose atleast one Category.',
        ]
        );
        $menu = new Menu();
        $menu->category_id = $request->category;

        if($request->file('icon')){
            $image = $request->file('icon');
            $name=$image->getClientOriginalName();
            $image->move(public_path().'/menu/', $name);
            $menu->icon = $name;
        }
        $menu->save();
        $request->session()->flash('alert-success', 'One Menu Saved.');
        return back();
    }

    public function menu_delete(Request $request, $id){
        $menu = Menu::find($id);
        $menu->delete();
        $request->session()->flash('alert-success', 'Item removed from Menu.');
        return back();
    }
    // Menu Functions End


    // Slider Functions Start
    public function slider_setting(){
        $sliders = Slider::all();
        return view('admin.theme-settings.slider-settings', compact('sliders'));
    }

    public function slider_setting_action(Request $request){
        $this->validate($request, [
            'slider' => 'required',
        ],
        [
            'slider.required' => 'Slider image is required.',
        ]
        );
        if($request->file('slider')){
            $image = $request->file('slider');
            $name=$image->getClientOriginalName();
            $image->move(public_path().'/slider/', $name);
        }
        $slider = new Slider();
        $slider->image = $name;
        $slider->save();
        $request->session()->flash('alert-success', 'New slider saved.');
        return back();
    }

    public function delete_slider($id, Request $request){
        $slider = Slider::find($id);
        unlink(public_path('slider').'/'.$slider->image);
        $slider->delete();
        $request->session()->flash('alert-success', 'Slider removed.');
        return back();
    }
    // Slider Functions Ends

    // home images Functions Start
    public function home_images(){
        $images = HomeImage::all();
        $categories = Category::all();
        return view('admin.theme-settings.home-images', compact('images','categories'));
    }
    public function home_images_delete($id){
        HomeImage::find($id)->delete();
        return redirect()->route('ds.theme-setting.home-images');
    }
    public function home_images_action(Request $request){
        $count = HomeImage::all();
          if(count($count)<3){
        $this->validate($request, [
            'image' => 'required',
            'cat_name' => 'required',
        ],
        [
            'image.required' => 'image is required.',
            'cat_name.required' => 'Category is required.',
        ]
        );
        $images = new HomeImage();
        if($request->file('image')){
            $image = $request->file('image');
            $name=$image->getClientOriginalName();
            $image->move(public_path().'/home/images/', $name);
            $images->image = $name;
        }
       $images->cat_name=$request->cat_name;
       $images->title=$request->title;
       $images->description=$request->description;
        $images->save();
        
        $request->session()->flash('alert-success', 'New Image Saved.');
        return back();
     }
     else{
           $request->session()->flash('alert-danger', 'You can only add three image ,Limit exceeded');
        return back();
     
     }
    }
    // home images Functions Ends
}
