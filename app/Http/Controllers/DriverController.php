<?php

namespace App\Http\Controllers;
use App\Driver;
use Illuminate\Http\Request;

class DriverController extends Controller
{
  public function view(){
    $driver =Driver::all(); 
    return view('admin.driver.view',compact('driver'));

  }
  public function create(Request $request)
  {   $request->validate(['name'=>'required','phone'=>'required|max:13']);
  	Driver::create($request->all());

  	$request->session()->flash('alert-success', 'Driver added successfully');
  	return redirect()->route('driver.view');
  }

	public function delete(Request $request,$id)
  {
  	Driver::find($id)->delete();

  	$request->session()->flash('alert-success', 'Driver deleted successfully');
  	return redirect()->route('driver.view');
  }

public function edit_form(Request $request)
  {
  	  $driver =Driver::find($request->id);
      return Response()->json($driver);
  }
  public function edit_post(Request $request)
 
  {   $request->validate(['name'=>'required','phone'=>'required|max:13']);

  	  $driver =Driver::find($request->id);
  	  $driver->update($request->all());
      $request->session()->flash('alert-success', 'Driver Edited successfully');
  	  return redirect()->route('driver.view');
  	}
}
