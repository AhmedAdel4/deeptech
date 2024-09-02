<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SocialLink;
use Illuminate\Http\Request;

class SocialLinkController extends Controller
{
    public function index()
    {
        $socialLinks = SocialLink::pluck('url', 'platform')->toArray();
        return view('dashboard.social_links.index', compact('socialLinks'));
    }



    public function store(Request $request)
    {
        $request->validate([
            'facebook' => 'nullable|url',
            'twitter' => 'nullable|url',
            'linkedin' => 'nullable|url',
            'instagram' => 'nullable|url',
        ]);

        $platforms = ['facebook', 'twitter', 'linkedin', 'instagram'];

        // Loop through each platform and update or create the social link
        foreach ($platforms as $platform) {
            if ($request->has($platform) && !empty($request->input($platform))) {
                SocialLink::updateOrCreate(
                    ['platform' => $platform],  // Matching condition
                    ['url' => $request->input($platform)]  // New or updated data
                );
            }
        }

        return redirect()->route('social_links.index')->with('success', 'Social links updated successfully.');
    }
}
