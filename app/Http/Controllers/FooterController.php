<?php

namespace App\Http\Controllers;
use App\Footer;

use Illuminate\Http\Request;

class FooterController extends Controller
{

    public function footer_setting(){
        $row = Footer::first();
        return view('admin.theme-settings.footer-settings')->with('row', $row);
    }

    public function footer_setting_action(Request $request){
        // dd($request->all());
        $footer = Footer::first();
        if($footer){
            if($request->file('logo')){
                $image = $request->file('logo');
                $name=$image->getClientOriginalName();
                $image->move(public_path().'/theme/footer', $name);
            }
            else{
                $name = $footer->logo;
            }
            Footer::where('id', $footer->id)->update([
                'logo' => $name,
                'address' => $request->address,
                'developer_name' => $request->developer_name,
                'developer_url' => $request->developer_url,
                'phone' => $request->phone,
                'email' => $request->email,
                'copyrights' => $request->copyrights,
                'background_color' => $request->background_color,
                'title_color' => $request->title_color,
                'text_color' => $request->text_color,
                'facebook' => $request->facebook,
                'twitter' => $request->twitter,
                'google' => $request->google,
                'instagram' => $request->instagram,
            ]);
        }
        else{
            $footer = new Footer();
            if($request->file('logo')){
                $image = $request->file('logo');
                $name=$image->getClientOriginalName();
                $image->move(public_path().'/theme/footer', $name);
                $footer->logo = $name;
            }
            $footer->address = $request->address;
            $footer->developer_name = $request->developer_name;
            $footer->developer_url = $request->developer_url;
            $footer->phone = $request->phone;
            $footer->email = $request->email;
            $footer->copyrights = $request->copyrights;
            $footer->baclground_color = $request->baclground_color;
            $footer->title_color = $request->title_color;
            $footer->text_color = $request->text_color;
            $footer->facebook = $request->facebook;
            $footer->twitter = $request->twitter;
            $footer->google = $request->google;
            $footer->instagram = $request->instagram;
            $footer->save();
        }
        $request->session()->flash('alert-success', 'Footer Setting saved.');
        return back();
    }

    public function remove_logo(Request $request){
        // dd(public_path('theme/footer'));
        $row = Footer::first();
        unlink(public_path('theme/footer').'/'.$row->logo);
        Footer::where('id', $row->id)->update([
            'logo' => null,
        ]);

        $request->session()->flash('alert-success', 'Logo removed.');
        return back();
    }
}
