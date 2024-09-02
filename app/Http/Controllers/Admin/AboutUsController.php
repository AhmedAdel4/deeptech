<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAboutRequest;
use App\Models\AboutUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;

class AboutUsController extends Controller
{
    public function index()
    {
        $about = AboutUs::first();
        return view('dashboard.aboutus.index', compact('about'));
    }

    public function store(StoreAboutRequest $request)
    {
        $data = $request->validated();

        // Extract images from request data
        $detail_image = $data['detail_image'] ?? null;
        $main_images = $data['main_images'] ?? null;
        unset($data['detail_image'], $data['main_images']);

        // Fetch or initialize AboutUs instance
        $about = AboutUs::first();
        // Update media collections if AboutUs instance already exists

        // Update or create AboutUs record
        $about = AboutUs::updateOrCreate([
            'id' => $about->id ?? 0
        ],[
            'main_title' => $data['main_title'],
            'opening_speech' => $data['opening_speech'],
            'details' => $data['details']
        ]);

        if ($about) {
            // Update main images
            if ($main_images && count($main_images) > 0) {
                $about->clearMediaCollectionExcept('about', $about->media()->where('attribute', 'detail_image')->get());
                foreach ($main_images as $image) {
                    $this->addImageToCollection($about, $image, 'main_images');
                }
            }

            // Update detail image
            if ($detail_image) {
                $about->clearMediaCollectionExcept('about', $about->media()->where('attribute', 'main_images')->get());
                $this->addImageToCollection($about, $detail_image, 'detail_image');
            }
        }
        return redirect()->back()->with('success', __('lang.DataSaved'));
    }

    /**
     * Helper function to add an image to a media collection
     *
     * @param AboutUs $about
     * @param mixed $image
     * @param string $attribute
     */
    private function addImageToCollection($about, $image, $attribute)
    {
        $media = $about->addMedia($image)->toMediaCollection('about');
        $media->attribute = $attribute;
        $media->save();
    }
}
