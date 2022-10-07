<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardClientController extends Controller
{
    public function index()
    {
        # code...
        $coursesCount = Auth::user()->courses()->count();
        $diplomasCount = Auth::user()->diplomas()->count();

        $courses = Auth::user()->courses;
        $diplomas = Auth::user()->diplomas;

        $user = Auth::user();

        return view('front.auth.dashboard', [
            'coursesCount' => $coursesCount,
            'diplomasCount' => $diplomasCount,
            'courses' => $courses,
            'diplomas' => $diplomas,
            'user' => $user
        ]);
    }
}
