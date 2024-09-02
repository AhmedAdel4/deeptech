<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Statistics;
use Illuminate\Http\Request;

class StatisticsController extends Controller
{
    public function index()
    {
        $statistics = Statistics::pluck('value','title')->toArray();
        return view('dashboard.statistics.index', compact('statistics'));
    }



    public function store(Request $request)
    {
        $request->validate([
            'workers' => 'nullable|integer',
            'hours_of_support' => 'nullable|integer',
            'projects' => 'nullable|integer',
            'clients' => 'nullable|integer',
        ]);

        $titles = ['workers', 'hours_of_support', 'projects', 'clients'];

        // Loop through each platform and update or create the social link
        foreach ($titles as $title) {
            if ($request->has($title) && !empty($request->input($title))) {
                Statistics::updateOrCreate(
                    ['title' => $title],  // Matching condition
                    ['value' => $request->input($title)]  // New or updated data
                );
            }
        }

        return redirect()->route('statistics.index')->with('success', 'Social links updated successfully.');
    }
}
