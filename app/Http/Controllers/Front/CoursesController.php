<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\CourseUser;
use App\Models\User;
use Illuminate\Http\Request;

class CoursesController extends Controller
{
    public function index(){
        $courses  =Course::orderby("id","desc")->get();
        $latestCourses = Course::latest()->take(4)->get();
    return view("front.courses.index",compact("courses","latestCourses"));
    }
    public function search(Request $request){

        $courses  =Course::where("name","like","%{$request->search}%")->orderby("id","desc")->get();
        $latestCourses = Course::latest()->take(4)->get();
        return view("front.courses.search",compact("courses","latestCourses"));

    }
    public function show($id){
        $course=Course::find($id);
        return view("front.courses.description",compact("course"));
    }
    public function paymentView($id){
        $course=Course::find($id);
        return view("front.courses.paymentGatway",compact("course"));

    }
    public function paymentStore(Request $request,$id){
        $request->validate([
            'file' => 'required|mimes:pdf,jpg',

        ]);

        $file = null;
        if($request->hasFile('file') && $request->file('file')->isValid()){
            $file = $request->file('file')->store('diplomas','public');
        }
        $course_user = CourseUser::create([
            "payment_file" => $file,
            "payment_type" => '0',
            "status" => '0',
            "user_id"=>auth()->id(),
            "course_id" => $id
        ]);
        return redirect()->route("view.courses.show",$id)->with("success","تم تسجيلك بنجاح في انتظار قبول الادارة");

    }
}
