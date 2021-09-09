<?php

namespace App\Http\Controllers;

use App\Chat;
use App\Product;
use Illuminate\Http\Request;
use Auth;

class ChatController extends Controller
{
    public function get_chat_messages(){
        return view('front.includes.get-chat-messages');
    }

    public function send_chat_messages(Request $request){
        $product = Product::find($request->product_id);
        $owner_id = $product->user_id;
        $user_id = Auth::user()->id;
        $message = $request->message;
        if(Auth::user()->is_admin == 0){
            $status = 'vendor';
        }
        if(Auth::user()->is_admin == 2){
            $status = 'user';
        }
        $chat = new Chat();
        $chat->product_id = $request->product_id;
        $chat->user_id = $user_id;
        $chat->owner_id = $owner_id;
        $chat->message = $message;
        $chat->status = $status;
        $chat->seen = 'no';
        $chat->save();
        return view('front.includes.get-chat-messages');
    }

    // Admin Chat functions
    public function chat_list(){
        $chats = Chat::orderBy('created_at', 'asc')->where('status', 'user')->distinct('user_id')->pluck('user_id');
        return view('admin.chat.chat-list', ['chats' => $chats]);   
    }

    public function get_inbox_chat_messages(){
        return view('admin.layout.inbox-chat');   
    }

    public function get_admin_chat_message(Request $request){
        Chat::where(['user_id'=> $request->user_id, 'owner_id' => Auth::id()])->update([
            'seen' => 'yes'
        ]);
        $chats = Chat::where(['user_id'=> $request->user_id, 'owner_id' => Auth::id()])->get();
        return view('admin.layout.get-chat-messages', ['chats' => $chats]);
    }

    public function send_admin_chat_message(Request $request){
        $user_id = $request->user_id;
        $message = $request->message;
        if(Auth::user()->is_admin == 0){
            $status = 'vendor';
        }
        if(Auth::user()->is_admin == 1){
            $status = 'vendor';
        }
        if(Auth::user()->is_admin == 2){
            $status = 'user';
        }
        $chat = new Chat();
        $chat->product_id = $request->product_id;
        $chat->user_id = $user_id;
        $chat->owner_id = Auth::user()->id;
        $chat->message = $message;
        $chat->status = $status;
        $chat->save();
        $chats = Chat::where(['user_id'=> $request->user_id, 'owner_id' => Auth::id()])->get();
        return view('admin.layout.get-chat-messages', ['chats' => $chats]);
    }
}
