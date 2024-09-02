<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Branch;
use App\Models\ContactUs;
use App\Models\Event;
use App\Models\Lecture;
use App\Models\Meeting;
use App\Models\Post;
use App\Models\Project;
use App\Models\ProjectContacts;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('dashboard.dashboard');
    }
}
