<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreContactUsRequest;
use App\Models\ContactUs;


class ContactUsController extends Controller
{
    public function index()
    {
        $contact = ContactUs::first();
        return view('dashboard.contactUs.index', compact('contact'));
    }

    public function store(StoreContactUsRequest $request)
    {
        $data = $request->validated();

        $contact = ContactUs::first();
        // Update media collections if ContactUs instance already exists

        // Update or create ContactUs record
        $contact = ContactUs::updateOrCreate([
            'id' => $contact->id ?? 0
        ],[
            'email' => $data['email'],
            'phone' => $data['phone'],
            'address' => $data['address']
        ]);
        return redirect()->back()->with('success', __('lang.DataSaved'));
    }
}
