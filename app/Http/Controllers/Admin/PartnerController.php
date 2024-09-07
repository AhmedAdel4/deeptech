<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PartnerRequest;
use App\Models\Partner;
use Illuminate\Http\Request;

class PartnerController extends Controller
{
    /**
     * Display a listing of the partners.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $partners = Partner::paginate(10);
        return view('dashboard.partners.index', compact('partners'));
    }

    public function store(PartnerRequest $request)
    {
        $data = $request->validated();
        $main_image = $data['main_image'] ?? null;
        $partner = Partner::create([
            'name' => $data['name']
        ]);

        if ($partner) {
            if ($main_image) {
                $this->addImageToCollection($partner, $main_image, 'main_image');
            }
        }
        return redirect()->back()->with('success', __('lang.DataSaved'));
    }

    public function edit($id)
    {
        $partner = Partner::find($id);
        if (!$partner) {
            return response()->json([
                'message' => 'team item not found.'
            ], 404); // Return a 404 error if the item is not found
        }

        return response()->json($partner);
    }

    public function update(PartnerRequest $request, $partnerId)
    {
        $data = $request->validated();
        $partner = Partner::find($partnerId);
        if ($partner) {
            $partner->update([
                'name' => $data['name']
            ]);
            $main_image = $data['main_image'] ?? null;
            if ($main_image) {
                $partner->clearMediaCollection('partner');
                $this->addImageToCollection($partner, $main_image, 'main_image');
            }

            return redirect()->back()->with('success', __('lang.DataUpdated'));
        }
        return redirect()->back()->with('error', __('lang.error'));
    }

    public function destroy(Partner $partner)
    {
        $partner->clearMediaCollection('partner');
        $partner->delete();
        return redirect()->back()->with('success', __('lang.DataDeleted'));
    }

    private function addImageToCollection($partner, $image, $attribute)
    {
        $media = $partner->addMedia($image)->toMediaCollection('partner');
        $media->attribute = $attribute;
        $media->save();
    }
}
