<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TeamRequest;
use App\Models\Team;

class TeamController extends Controller
{
    public function index()
    {
        $teams = Team::paginate(10);
        return view('dashboard.team.index', compact('teams'));
    }

    public function store(TeamRequest $request)
    {
        $data = $request->validated();
        $main_image = $data['main_image'] ?? null;
        $team = Team::create([
            'name' => $data['name'],
            'role' => $data['role']
        ]);

        if ($team) {
            if ($main_image) {
                $this->addImageToCollection($team, $main_image, 'main_image');
            }
        }
        return redirect()->back()->with('success', __('lang.DataSaved'));
    }

    public function edit($id)
    {
        $team = Team::find($id);
        if (!$team) {
            return response()->json([
                'message' => 'team item not found.'
            ], 404); // Return a 404 error if the item is not found
        }

        return response()->json($team);
    }

    public function update(TeamRequest $request,$teamId) {
        $data = $request->validated();
        $team = Team::find($teamId);
        if($team)
        {
            $team->update([
                'name' => $data['name'],
                'role' => $data['role']
            ]);
            $main_image = $data['main_image'] ?? null;
            if ($main_image) {
                $team->clearMediaCollection('team');
                $this->addImageToCollection($team, $main_image, 'main_image');
            }

            return redirect()->back()->with('success', __('lang.DataUpdated'));
        }
        return redirect()->back()->with('error', __('lang.error'));
    }

    public function destroy(Team $team)
    {
        $team->clearMediaCollection('team');
        $team->delete();
        return redirect()->back()->with('success', __('lang.DataDeleted'));
    }

    private function addImageToCollection($team, $image, $attribute)
    {
        $media = $team->addMedia($image)->toMediaCollection('team');
        $media->attribute = $attribute;
        $media->save();
    }
}
