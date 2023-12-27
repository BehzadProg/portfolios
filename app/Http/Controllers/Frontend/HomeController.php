<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Blog;
use App\Models\Hero;
use App\Models\About;
use App\Models\Service;
use App\Models\Category;
use App\Models\Feedback;
use App\Mail\contactMail;
use App\Models\SkillItem;
use App\Models\Experience;
use App\Models\TyperTitle;
use App\Models\BlogSetting;
use App\Models\SkillSetting;
use Illuminate\Http\Request;
use App\Models\PortfolioItem;
use App\Models\ContactSetting;
use App\Models\FeedbackSetting;
use App\Models\PortfolioSetting;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use TimeHunter\LaravelGoogleReCaptchaV3\Validations\GoogleReCaptchaV3ValidationRule;

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
        $blogs = Blog::latest()->take(5)->get();
        $blogTitle = BlogSetting::first();
        $contactTitle = ContactSetting::first();
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
            'feedbackTitle',
            'blogs',
            'blogTitle',
            'contactTitle'
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

    public function showBlog($id){
        $showBlog = Blog::findOrFail($id);
        $previousBlog = Blog::where('id' ,'<' , $showBlog->id)->orderBy('id' , 'desc')->first();
        $nextBlog = Blog::where('id' ,'>' , $showBlog->id)->orderBy('id' , 'asc')->first();
        return view('frontend.blog_details', compact('showBlog','previousBlog','nextBlog'));
    }

    public function blogs(){
        $blogs = Blog::latest()->paginate(9);
        return view('frontend.blog' , compact('blogs'));
    }

    public function contact(Request $request){

        $request->validate([
            'name' => 'required|max:200',
            'subject' => 'required|max:300',
            'email' => 'required|email',
            'message' => 'required|max:2000',
            'g-recaptcha-response' => [new GoogleReCaptchaV3ValidationRule('contact_us')]
        ]);

        Mail::send(new contactMail($request->all()));

        return response(['status' => 'success', 'message' => 'Mail Sended Successfully']);
    }
}
