<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Hero;
use App\Models\About;
use App\Models\Service;
use App\Models\TyperTitle;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index(){
        $hero = Hero::first();
        $typerTitles = TyperTitle::all();
        $services = Service::all();
        $about = About::first();
        return view('frontend.home', compact('hero','typerTitles','services','about'));
    }

    public function resumeDownload()
    {
        $about = About::first();
        return response()->download(public_path(env('ABOUTME_RESUME_UPLOAD_PATH').$about->resume));
    }
}
