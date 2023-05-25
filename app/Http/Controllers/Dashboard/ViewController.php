<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\View;
use Illuminate\Http\Request;
use DataTables;
use Session;

class ViewController extends Controller
{
    public function index(Request $request){
        if ($request->ajax()) {
            $data = View::select('id','hits','date','visit_time')->get();
            return DataTables::of($data)->addIndexColumn()
                ->make(true);
        }

        return view('users');
    }

   

}
