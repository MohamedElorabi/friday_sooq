<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Mail\Mail as MailMail;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class Contact_usController extends Controller
{
    public function index(){

        return view('site.contact_us');
    }

    public function store(Request $request)
    {
        $data =  $request->all();
        $contacts = Contact::create($data);
        Mail::to('elorabi199@gmail.com')->send(new MailMail($data));
        return redirect()->back()->with('success', 'تم إرسال الرسالة بنجاح');
    }
}
