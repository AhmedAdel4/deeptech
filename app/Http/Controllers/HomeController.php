<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserMessageRequest;
use App\Models\AboutUs;
use App\Models\Blog;
use App\Models\Branch;
use App\Models\Carousel;
use App\Models\ContactUs;
use App\Models\Event;
use App\Models\Lecture;
use App\Models\Meeting;
use App\Models\Partner;
use App\Models\Post;
use App\Models\Project;
use App\Models\ProjectContacts;
use App\Models\Service;
use App\Models\Setting;
use App\Models\SocialLink;
use App\Models\Statistics;
use App\Models\Team;
use App\Models\User;
use App\Models\UserMessage;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        app()->setLocale('ar');
        $about = AboutUs::first();
        $carousels = Carousel::all();
        $teams = Team::all();
        $partners = Partner::all();
        $contact = ContactUs::first();
        $services = Service::all();
        $topServices = Service::take(3)->get();
        $socialLinks = SocialLink::pluck('url', 'platform')->toArray();
        $statistics = Statistics::pluck('value', 'title')->toArray();
        $logo = Setting::where('name', 'logo')->first();
        return view('front.home', compact('about', 'logo', 'carousels', 'teams', 'partners', 'contact', 'services', 'topServices', 'socialLinks', 'statistics'));
    }

    public function userMessage(UserMessageRequest $request)
    {
        $validated = $request->validated();
        UserMessage::create($validated);
        return response('OK', 200);
    }

    public function aboutDetails()
    {
        $about = AboutUs::first();
        $socialLinks = SocialLink::pluck('url', 'platform')->toArray();
        $contact = ContactUs::first();
        $services = Service::all();
        $logo = Setting::where('name', 'logo')->first();
        return view('front.about_detail', compact('about', 'logo', 'socialLinks', 'contact', 'services'));
    }

    public function serviceDetails(Service $service)
    {
        $socialLinks = SocialLink::pluck('url', 'platform')->toArray();
        $contact = ContactUs::first();
        $services = Service::all();
        $logo = Setting::where('name', 'logo')->first();
        return view('front.service_detail', compact('service', 'logo', 'socialLinks', 'contact', 'services'));
    }
}
