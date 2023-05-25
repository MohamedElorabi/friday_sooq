<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Contact;
use Illuminate\Http\Request;
use DataTables;
use App\Http\Requests\dashboard\CountryRequest;
use App\Http\Controllers\IMAGE_CONTROLLER;
use Session;


class ContactController extends Controller
{
    public function index(Request $request){
        if ($request->ajax()) {
            $data = Contact::select('id','name','email','subject','massege')->get();
            return DataTables::of($data)->addIndexColumn()
                ->make(true);
        }

        return view('users');
    }
    
    public function show($id){
        $info = Contact::find($id);
        return view('dashboard.contact.show',compact('info'));
    }


   

}
