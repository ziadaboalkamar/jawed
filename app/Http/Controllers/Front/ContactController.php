<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Websit;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        # code...
        $setting = Websit::first();

        return view('front.contact',[
            'setting' =>$setting,
        ]);
    }

    public function store(Request $request)
    {
        # code...
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string',
            'message' => 'required|string'
        ]);

        Contact::create($request->all());

        return redirect()->route('view.contact.index')->with('success','تم ارسال الرسالة بنجاح');
    }
}
