<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function logoIndex()
    {
        $settings = Setting::where('name','logo')->first();
        return view('dashboard.setting.index', compact('settings'));
    }

    public function logoStore(Request $request)
    {
        $data = $request->all();

        $logo = $data['logo'] ?? null;
        if ($logo) {
            $setting = Setting::updateOrCreate([
                'name' => 'logo'
            ], [
                'value' => $logo->getClientOriginalName()
            ]);

            if ($setting) {


                $setting->clearMediaCollectionExcept('setting', $setting->media()->where('attribute', 'main_images')->get());
                $this->addImageToCollection($setting, $logo, 'logo');
            }
            return redirect()->back()->with('success', __('lang.DataSaved'));
        }
        return redirect()->back()->with('error', __('lang.error'));
    }


    private function addImageToCollection($setting, $image, $attribute)
    {
        $media = $setting->addMedia($image)->toMediaCollection('setting');
        $media->attribute = $attribute;
        $media->save();
    }
}
