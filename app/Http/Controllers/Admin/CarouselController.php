<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAboutRequest;
use App\Http\Requests\StoreCarouselRequest;
use App\Http\Requests\UpdateCarouselRequest;
use App\Models\AboutUs;
use App\Models\Carousel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;

class CarouselController extends Controller
{
    public function index()
    {
        $carousels = Carousel::paginate(10);
        return view('dashboard.carousel.index', compact('carousels'));
    }

    public function store(StoreCarouselRequest $request)
    {
        $data = $request->validated();
        $main_image = $data['main_image'] ?? null;
        // Update or create AboutUs record
        $carousel = Carousel::create([
            'text' => $data['text'],
            'main_title' => $data['main_title']
        ]);

        if ($carousel) {
            // Update main images
            if ($main_image) {
                $this->addImageToCollection($carousel, $main_image, 'main_image');
            }
        }
        return redirect()->back()->with('success', __('lang.DataSaved'));
    }

    public function edit($id)
    {
        $carousel = Carousel::find($id);
        if (!$carousel) {
            return response()->json([
                'message' => 'Carousel item not found.'
            ], 404); // Return a 404 error if the item is not found
        }

        return response()->json($carousel);
    }

    public function update(UpdateCarouselRequest $request,$carouselId) {
        $data = $request->validated();
        $carousel = Carousel::find($carouselId);
        if($carousel)
        {
            $carousel->update([
                'text' => $data['text'],
                'main_title' => $data['main_title']
            ]);
            $main_image = $data['main_image'] ?? null;
            if ($main_image) {
                $carousel->clearMediaCollection('carousel');
                $this->addImageToCollection($carousel, $main_image, 'main_image');
            }

            return redirect()->back()->with('success', __('lang.DataUpdated'));
        }
        return redirect()->back()->with('error', __('lang.error'));
    }

    public function destroy(Carousel $carousel)
    {
        $carousel->clearMediaCollection('carousel');
        $carousel->delete();
        return redirect()->back()->with('success', __('lang.DataDeleted'));
    }

    private function addImageToCollection($carousel, $image, $attribute)
    {
        $media = $carousel->addMedia($image)->toMediaCollection('carousel');
        $media->attribute = $attribute;
        $media->save();
    }
}
