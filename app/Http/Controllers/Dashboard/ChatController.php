<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Chat;
use Illuminate\Http\Request;
use DataTables;
use Session;

class ChatController extends Controller
{
    public function index(Request $request){
        if ($request->ajax()) {
            $data = Chat::select('chats.id','u1.name as user_one','u2.name as user_two')->join('users as u1','u1.id','=','chats.user_one')->join('users as u2','u2.id','=','chats.user_two')->get();
            return DataTables::of($data)->addIndexColumn()
                ->make(true);
        }

        return view('users');
    }

   

}
