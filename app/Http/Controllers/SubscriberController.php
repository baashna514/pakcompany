<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subscriber;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;
class SubscriberController extends Controller
{
    public function addSubscriber(Request $request){
        $this->validate($request, [
            'email' => 'required',
        ],
        [
            'email.required' => 'Email is required',
        ]
        );
	    Mail::to($request->email)->send(new SendMail());
    	Subscriber::create($request->all());
    	return redirect()->back();
    }
    
    public function viewSubscriber(){
    	$subscriber=Subscriber::all();
    	return view('admin.subscriber.view',compact('subscriber'));
    } 
    public function delete($id){
        Subscriber::find($id)->delete();
        return redirect()->route('ds.subscriber.view');

    }
}
