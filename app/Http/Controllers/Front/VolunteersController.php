<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Volunteer;
use Illuminate\Http\Request;

class VolunteersController extends Controller
{
    public function index()
    {
        # code...
        return view('front.volunteer');
    }

    public function store(Request $request)
    {
        # code...
        $request->validate([
            'f_name' => 'required|string|max:255',
            'm_name' => 'required|string|max:255',
            'l_name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string',
            'domin' => 'required|string|max:255',
        ]);

        $data = $request->except(['f_name', 'm_name', 'l_name']);
        $data['full_name'] = $request->f_name. ' ' . $request->m_name . ' ' . $request->l_name;
        Volunteer::create($data);

        return redirect()->route('view.volunteer.index')->with('success','تم ارسال استشارتك بنجاح');
    }
}
