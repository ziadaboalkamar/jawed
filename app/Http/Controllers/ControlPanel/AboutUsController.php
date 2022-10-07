<?php

namespace App\Http\Controllers\ControlPanel;

use App\Http\Controllers\Controller;
use App\Models\AboutUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutUsController extends Controller
{
     /**
     * this function for view website edit page
     *
     * @return \Illuminate\View\View
     */
    public function edit()
    {
        $about_us = AboutUs::latest()->first();


        return view('control-panel.about_us.edit',[
            'about_us' => $about_us,
        ]);
    }


    /**
     * this function for update website setting in database or create new setting
     *
     * @param Illuminate\Http\Request $request
     *
     * @return \Illuminate\View\View
     */
    public function update(Request $request){

        $about_us = AboutUs::latest()->first();

        if(!$about_us){
            $request->validate([
                'description' => 'required |string',
                'message' => 'required |string',
                'goals' => 'required |string',
                'vision' => 'required |string',
                'image' => 'required |mimes:jpg',
            ]);
            $data = $request->all();

            $image = null;

            if($request->hasFile('image') && $request->file('image')->isValid()){
                $image = $request->file('image')->store('about_us','public');
            }

            $data['image'] = $image;


            $aboutUs = AboutUs::create($data);
            // $this->insertTags($data['features'], $therapeutic_dentistrie);
        }else{
            $request->validate([
                'description' => 'required |string',
                'message' => 'required |string',
                'goals' => 'required |string',
                'vision' => 'required |string',
                'image' => 'nullable |mimes:jpg',
            ]);
            $data = $request->all();

            $image = $about_us->image;

            if($request->hasFile('image') && $request->file('image')->isValid()){
                Storage::disk('public')->delete($image);
                $image = $request->file('image')->store('about_us','public');
            }


            $data['image'] = $image;


            $aboutUs = $about_us;

            $aboutUs->update($data);
        }

        return redirect()->route('about-us-edit',[
            'about_us' => $aboutUs
        ])->with('success',__('Update Done!'));

    }
}
