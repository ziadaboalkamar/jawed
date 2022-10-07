<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Membership;
use App\Models\MembershipDescription;
use Illuminate\Http\Request;

class MembershipController extends Controller
{
    public function description()
    {
        # code...
        $membership = MembershipDescription::first();
        return view('front.descriptionMempership',[
            'membership' => $membership,
        ]);
    }

    public function index()
    {
        # code...
        $membership = MembershipDescription::first();

        return view('front.membership',[
            'membership' => $membership,
        ]);
    }

    public function store(Request $request)
    {
        # code...
        // dd($request->all());

        $request->validate([
            'f_name' => 'required|string|max:255',
            'm_name' => 'required|string|max:255',
            'l_name' => 'required|string|max:255',
            'city' => 'required|string',
            'job_name' => 'required|string',
            'job_address' => 'required|string',
            'id_number' => 'numeric|required',
            'id_date' => 'date|required',
            'id_source' => 'string|required',
            'phone' => 'required|string',
            'address' => 'required|string',
            'telephone' => 'required|string',
            'post_address' => 'required|string',
            'type' => 'required|string',
            'start_date' => 'required|date',
            'tranfer_file' => 'required|mimes:pdf,jpg',
        ]);

        $data = $request->except(['f_name', 'l_name', 'm_name', 'tranfer_file']);

        $tranfer_file = null;
        if($request->hasFile('tranfer_file') && $request->file('tranfer_file')->isValid()){
            $tranfer_file = $request->file('tranfer_file')->store('memberships','public');
        }

        $data['tranfer_file'] = $tranfer_file;
        $data['name'] =  $request->f_name. ' ' . $request->m_name . ' ' . $request->l_name;

        Membership::create($data);

        return redirect()->route('view.membership.index')->with('success','تم الارسال بنجاح');
    }
}
