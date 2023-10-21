<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Hero;
use App\Models\About;
use App\Models\Service;
use App\Models\Category;
use App\Models\Feedback;
use App\Models\SkillItem;
use App\Models\Experience;
use App\Models\TyperTitle;
use App\Models\SkillSetting;
use Illuminate\Http\Request;
use App\Models\PortfolioItem;
use App\Models\FeedbackSetting;
use App\Models\PortfolioSetting;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index(){
        $hero = Hero::first();
        $typerTitles = TyperTitle::all();
        $services = Service::all();
        $about = About::first();
        $portfolioSetting = PortfolioSetting::first();
        $portfolioCategories = Category::all();
        $portfolioItems = PortfolioItem::all();
        $skillSetting = SkillSetting::first();
        $skillItem = SkillItem::all();
        $experience = Experience::first();
        $feedback = Feedback::all();
        $feedbackTitle = FeedbackSetting::first();
        return view('frontend.home', compact(
            'hero',
            'typerTitles',
            'services',
            'about',
            'portfolioSetting',
            'portfolioCategories',
            'portfolioItems',
            'skillSetting',
            'skillItem',
            'experience',
            'feedback',
            'feedbackTitle'
        ));
    }

    public function resumeDownload()
    {
        $about = About::first();
        return response()->download(public_path(env('ABOUTME_RESUME_UPLOAD_PATH').$about->resume));
    }

    public function showPortfolio($id){
        $showPortfolio = PortfolioItem::findOrFail($id);
        return view('frontend.portfolio_details', compact('showPortfolio'));
    }
}
