<?php

namespace App\Http\Controllers;

use App\Color;
use App\Value;
use Illuminate\Http\Request;

class AttributeController extends Controller
{
    

    public function color_action(Request $request){
        
        $attr = new Color();
        $attr->code = $request->code;
       $attr->save();
         $data =Color::latest()->first();
        return Response()->json($data);
    }

    public function delete_color(Request $request, $id){
        $attri = Color::find($id);
        $attri->values()->delete();
        $attri->delete();
        $request->session()->flash('alert-success', 'one attribute removed.');
        return back();
    }
}
