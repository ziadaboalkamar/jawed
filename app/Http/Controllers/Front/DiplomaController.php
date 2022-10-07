<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Diploma;
use App\Models\DiplomaUser;
use Illuminate\Http\Request;

class DiplomaController extends Controller
{
    public function index(){
        $courses  =Diploma::orderby("id","desc")->get();
        $latestCourses = Diploma::latest()->take(4)->get();
        return view("front.diploma.index",compact("courses","latestCourses"));
    }
    public function search(Request $request){

        $courses  =Diploma::where("name","like","%{$request->search}%")->orderby("id","desc")->get();
        $latestCourses = Diploma::latest()->take(4)->get();
        return view("front.diploma.search",compact("courses","latestCourses"));

    }
    public function show($id){
        $course=Diploma::find($id);
        return view("front.diploma.description",compact("course"));
    }
    public function paymentView($id){
        $diploma=Diploma::find($id);
        return view("front.diploma.paymentGatway",compact("diploma"));

    }
    public function paymentStore(Request $request,$id){
        $request->validate([
            'file' => 'required|mimes:pdf,jpg',

        ]);
        $data = $request->except('file');
        $file = null;
        if($request->hasFile('file') && $request->file('file')->isValid()){
            $file = $request->file('file')->store('diplomas','public');
        }
        $diploma_user = DiplomaUser::create([
           "payment_file" => $file,
            "payment_type" => '0',
            "status" => '0',
            "user_id"=>auth()->id(),
            "diploma_id" => $id
        ]);
        return redirect()->route("view.diploma.show",$id)->with("success","تم تسجيلك بنجاح في انتظار قبول الادارة");

    }
}
