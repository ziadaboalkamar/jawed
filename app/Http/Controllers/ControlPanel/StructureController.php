<?php

namespace App\Http\Controllers\ControlPanel;

use App\Http\Controllers\Controller;
use App\Models\Structure;
use Illuminate\Http\Request;

class StructureController extends Controller
{
    /**
    * this function for view website edit page
    *
    * @return \Illuminate\View\View
    */
   public function edit()
   {
       $structure = Structure::latest()->first();


       return view('control-panel.structure.index',[
           'structure' => $structure,

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

       $structure = Structure::latest()->first();

       if(!$structure){
           $request->validate([
               'data' => 'required',
           ]);

           Structure::create($request->all());
           // $this->insertTags($data['features'], $therapeutic_dentistrie);
       }else{
           $request->validate([
            'data' => 'required',
           ]);

           $structure->update($request->all());
       }

       return redirect()->route('structure-edit')->with('success',__('Update Done!'));

   }
}
