<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class SettingController extends Controller
{
    public function edit()
    {
        $setting = Setting::first();
        return view('settings.edit', compact('setting'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'site_name' => 'required|max:150',
            'tagline' => 'nullable|max:255',
            'primary_email' => 'required|email',
            'notification_emails' => 'nullable',
            'primary_phone' => 'nullable',
            'whatsapp_number' => 'nullable',
            'address' => 'nullable',
        ]);

        // comma separated emails → array
        $validated['notification_emails'] = array_map(
            'trim',
            explode(',', $request->notification_emails)
        );

        Setting::updateOrCreate(
            ['id' => 1],
            $validated
        );

        Alert::success('Saved', 'Settings updated successfully');
        return redirect()->back();
    }
}
