<?php

namespace App\Http\Controllers\Site;
use App\Http\Controllers\Controller;
use App\Models\Report;
use Illuminate\Http\Request;
use Session;

class ReportController extends Controller

{
   

    public function store(Request $request){
        $data = $request->validate([
            // 'object_id' => 'required',
            'type' => 'required|in:ad,user',
            'report' => 'required|max:1000',
        ]);
        $data['user_id'] = auth()->user()->id;
        $report = Report::create($data);
        Session::flash('success','تمت الاضافة بنجاح');
        return back();
    }
    
   
}
