<?php

namespace App\Http\Controllers\ControlPanel;

use App\Http\Controllers\Controller;
use App\Models\Achievement;
use Illuminate\Http\Request;

class AchievementController extends Controller
{
    /**
    * this function for view website edit page
    *
    * @return \Illuminate\View\View
    */
   public function edit()
   {
       $achievement = Achievement::latest()->first();


       return view('control-panel.achievements.index',[
           'achievement' => $achievement,
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

       $achievement = Achievement::latest()->first();

       if(!$achievement){
           $request->validate([
               'data' => 'required',
           ]);

           Achievement::create($request->all());
           // $this->insertTags($data['features'], $therapeutic_dentistrie);
       }else{
           $request->validate([
            'data' => 'required',
           ]);

           $achievement->update($request->all());
       }

       return redirect()->route('achievement-edit')->with('success',__('Update Done!'));

   }
}
