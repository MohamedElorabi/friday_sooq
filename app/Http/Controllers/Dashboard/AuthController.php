<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function get_admin_login()
    {
        if (Auth::guard('admin')->check())
        {
            return redirect(route('admin'));
        }
        else {
            return view('dashboard.auth.login');
        }
    }
    public function post_admin_login()
    {
//        dd(Hash::make('123'));
        $user = Admin::where('email', \request('email'))->first();
        $card = ['email'=>\request('email'), 'password'=>\request('password')];

        if (\auth()->guard('admin')->attempt($card, false))
        {
            \auth()->guard('admin')->login($user);
//            dd(75675);
            return redirect(route('categories'));
        } else {
            return back()->with('error','يوجد خطا في البيانات الرجاء التاكد من البريد الالكتروني وكلمه المرور');
        }
    }

    public function logout(){
        auth()->guard('admin')->logout();
        return redirect(url('admin/login'));
    }
}
