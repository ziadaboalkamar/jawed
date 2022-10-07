<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\AboutUs;
use App\Models\Achievement;
use App\Models\Blog;
use App\Models\ClientOpinion;
use App\Models\Faq;
use App\Models\Library;
use App\Models\Partner;
use App\Models\Policy;
use App\Models\Report;
use App\Models\Service;
use App\Models\Slider;
use App\Models\Statistic;
use App\Models\Structure;
use Illuminate\Http\Request;

class HomeController extends Controller
{
   public function index(){
       $sliders = Slider::all();
       $about_us = AboutUs::first();
       $services = Service::latest()->take(4)->get();
       $blogs = Blog::latest()->take(3)->get();
       $faqs = Faq::latest()->take(4)->get();
       $clientOpiniones =ClientOpinion::all();
       $statistics = Statistic::latest()->take(4)->get();
       $partners = Partner::all();
       return view("front.index",compact("sliders","about_us","services","blogs","faqs","clientOpiniones","statistics","partners"));
   }
   public function aboutUs(){
       $about_us = AboutUs::first();
       $statistics = Statistic::latest()->take(4)->get();
       return view("front.about_us",compact("about_us","statistics"));
   }

    public function structure(){
        $structure = Structure::first();
        return view("front.structure",compact("structure"));
    }

    public function achievement(){
        $achievement = Achievement::first();
        return view("front.achievement",compact("achievement"));
    }
    public function policies(){
        $policies = Policy::all();
        return view("front.policies",compact("policies"));
    }
    public function reports(){
        $reports = Report::all();
        return view("front.reports",compact("reports"));
    }

    public function library(){
        $library = Library::all();
        return view("front.library",compact("library"));
    }
    public function partner(){
        $partners = Partner::all();
        return view("front.partner",compact("partners"));
    }

    public function faqs(){
        $faqs = Faq::all();
        return view("front.faq",compact("faqs"));
    }
}
