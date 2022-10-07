<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Initiative;
use Illuminate\Http\Request;

class MobadaraController extends Controller
{
    public function index(){
        $news = Initiative::all();
        return view("front.mobadrat.index",compact("news"));
    }

    public function search(Request $request){

        $news = Initiative::where("title","like","%{$request->search}%")->get();
        return view("front.mobadrat.index",compact("news"));
    }

    public function show($id){
        $news = Initiative::find($id);
        return view("front.mobadrat.description",compact("news"));
    }
}
