<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class EcommerceController extends Controller
{
   public function index(){
       $ecommerce = Product::all();
       return view("front.ecommerce.index",compact("ecommerce"));
   }
    public function search(Request $request){

        $ecommerce = Product::where("name","like","%{$request->search}%")->get();
        return view("front.ecommerce.index",compact("ecommerce"));
    }

    public function show($id){
        $news = Product::find($id);
        return view("front.ecommerce.description",compact("news"));
    }
}
