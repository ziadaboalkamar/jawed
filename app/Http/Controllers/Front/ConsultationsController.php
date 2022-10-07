<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Consultation;
use App\Models\Websit;
use Illuminate\Http\Request;

class ConsultationsController extends Controller
{
    public function index()
    {
        # code...
        return view('front.consultations');
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
            'city' => 'required|string|max:255',
            'message' => 'required|string'
        ]);

        $data = $request->except(['f_name', 'm_name', 'l_name']);
        $data['name'] = $request->f_name. ' ' . $request->m_name . ' ' . $request->l_name;
        Consultation::create($data);

        return redirect()->route('view.consultation.index')->with('success','تم ارسال استشارتك بنجاح');
    }
}
