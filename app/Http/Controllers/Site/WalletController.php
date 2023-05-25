<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class WalletController extends Controller
{
    public function index()
    {
        return view('site.user.wallet.index');
    }



}
