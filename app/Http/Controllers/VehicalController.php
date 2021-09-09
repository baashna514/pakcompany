<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vehical;
use App\Driver;
class VehicalController extends Controller
{
    public function view(){
    $Vehical =Vehical::with('driver')->get(); 
    $drivers =Driver::all(); 
    return view('admin.Vehical.view',compact('Vehical','drivers'));

  }
  public function create(Request $request)
  {   $request->validate(['make'=>'required','model'=>'required|max:13']);
  	Vehical::create($request->all());

  	$request->session()->flash('alert-success', 'Vehical added successfully');
  	return redirect()->route('vehical.view');
  }

	public function delete(Request $request,$id)
  {
  	Vehical::find($id)->delete();

  	$request->session()->flash('alert-success', 'Vehical deleted successfully');
  	return redirect()->route('vehical.view');
  }

public function edit_form(Request $request)
  {   
  	  $vehical =Vehical::find($request->id);
      return $vehical;
  }
  public function edit_post(Request $request)
 
  {   $request->validate(['make'=>'required','model'=>'required|max:13']);

  	  $Vehical =Vehical::find($request->id);
  	  $Vehical->update($request->all());
      $request->session()->flash('alert-success', 'Vehical Edited successfully');
  	  return redirect()->route('vehical.view');
  	}
}
