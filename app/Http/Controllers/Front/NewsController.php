<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index(){
     $news = Blog::all();
        return view("front.news.index",compact("news"));
    }

    public function search(Request $request){

        $news = Blog::where("title","like","%{$request->search}%")->get();
        return view("front.news.index",compact("news"));
    }

    public function show($id){
        $news = Blog::find($id);
        return view("front.news.description",compact("news"));
    }
}
