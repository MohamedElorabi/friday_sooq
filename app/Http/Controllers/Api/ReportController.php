<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\ApiController;
use App\Models\Report;
use Illuminate\Http\Request;
class ReportController extends ApiController
{
   

    public function store(Request $request){
        $data = $request->validate([
            'object_id' => 'required',
            'type' => 'required|in:ad,user',
            'report' => 'required|max:1000',
        ]);
        $data['user_id'] = auth()->user()->id;
        $report = Report::create($data);
        return response()->json([
            'data' => $report,
            'success' => true,
        ],200);
    }
    
   
}
