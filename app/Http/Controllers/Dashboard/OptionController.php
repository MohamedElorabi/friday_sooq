<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Country;
use App\Models\Option;
use App\Models\Town;
use Illuminate\Http\Request;
use DataTables;
use Session;

class OptionController extends Controller
{
    public function index(Request $request){
        if ($request->ajax()) {
            $data = Option::select('id','name_ar')->get();
            return DataTables::of($data)->addIndexColumn()
                ->addColumn('action', function($row){
                     $btn = '<form action="https://tsawqsale.com/admin/option/delete/'.$row->id.'" method="POST">
                    '.csrf_field().'
                    '.method_field("DELETE").'
                    <button type="submit" class="delete btn btn-danger btn-sm"
                        onclick="return confirm(\'Are You Sure Want to Delete?\')"
                        >Delete</button>
                    </form>
                ';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('users');
    }
    
     public function destroy($id){
       
          Option::destroy($id);
        Session::flash('success','تم حذف الخدمه بنجاح..');
        return redirect()->back();
    }
}
