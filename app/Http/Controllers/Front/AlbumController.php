<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\PhotoAlbum;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    public function index(){
        $news = PhotoAlbum::all();
        return view("front.albums.index",compact("news"));
    }

    public function search(Request $request){

        $news = PhotoAlbum::where("name","like","%{$request->search}%")->get();
        return view("front.albums.index",compact("news"));
    }

    public function show($id){
        $news = PhotoAlbum::find($id);
        return view("front.albums.photo",compact("news"));
    }
}
