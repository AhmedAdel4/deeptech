<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ServiceRequest;
use App\Http\Requests\UpdateServiceRequest;
use App\Models\Service;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::paginate(10);
        return view('dashboard.service.index', compact('services'));
    }

    public function store(ServiceRequest $request)
    {
        $data = $request->validated();
        $service = Service::create($data);
        $detail_image = $data['detail_image'] ?? null;
        if($service)
        {
            if ($detail_image) {
                $this->addImageToCollection($service, $detail_image, 'detail_image');
            }
        }
        return redirect()->route('service.index')->with('success', __('lang.DataSaved'));
    }

    public function create()
    {
        return view('dashboard.service.create');
    }

    public function edit(Service $service)
    {
        return view('dashboard.service.edit',compact('service'));
    }

    public function update(UpdateServiceRequest $request)
    {
        $data = $request->validated();
        $service = Service::find($data['serviceId']);
        $service->update($data);
        $detail_image = $data['detail_image'] ?? null;
        if ($detail_image) {
            $service->clearMediaCollection('service');
            $this->addImageToCollection($service, $detail_image, 'detail_image');
        }
        return redirect()->back()->with('error', __('lang.error'));
    }

    public function destroy(Service $service)
    {
        $service->delete();
        return redirect()->back()->with('success', __('lang.DataDeleted'));
    }

    private function addImageToCollection($service, $image, $attribute)
    {
        $media = $service->addMedia($image)->toMediaCollection('service');
        $media->attribute = $attribute;
        $media->save();
    }
}
