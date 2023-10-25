<?php

namespace App\Http\Controllers\Admin;

use App\Models\Blog;
use App\Models\Feedback;
use Illuminate\Http\Request;
use App\Models\PortfolioItem;
use App\Http\Controllers\Controller;
use App\Models\SkillItem;

class DashboardController extends Controller
{
    public function index(){
        $porfolioCount = PortfolioItem::count();
        $feedbackCount = Feedback::count();
        $blogCount = Blog::count();
        $skillCount = SkillItem::count();
        return view('admin.dashboard' , compact('porfolioCount','feedbackCount','blogCount','skillCount'));
    }
}
