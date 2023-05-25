<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\ApiController;
use App\Models\Chat;
use Illuminate\Http\Request;

class ChatController extends ApiController
{
    public function chats()
    {
        $chats = Chat::where('user_one',auth()->user()->id)->orWhere('user_two',auth()->user()->id)->with("user_one","user_two")->orderBy('chats.id','DESC')->get();
        $this->data['data'] = $chats;
        $this->data['status'] = true;
        return response()->json($this->data, 200);
    }
    public function post(Request $request){
        $data = $request->all();
        $data['user_one'] = auth()->user()->id;
        $chat = Chat::create($data);
        return response()->json([
            'data' => $chat,
            'success' => true,
        ],200);
        
    }
}
