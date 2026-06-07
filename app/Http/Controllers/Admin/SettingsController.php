<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function social()
    {
        $settings = SiteSetting::where('group', 'social')->orderBy('sort_order')->get();

        return view('admin.settings.social', compact('settings'));
    }

    public function updateSocial(Request $request)
    {
        $settings = SiteSetting::where('group', 'social')->get();

        $rules = [];
        foreach ($settings as $s) {
            $rules["values.{$s->key}"] = ['nullable', 'url', 'max:255'];
        }

        $validated = $request->validate($rules, [], array_combine(
            array_map(fn ($k) => "values.$k", $settings->pluck('key')->all()),
            $settings->pluck('label')->all()
        ));

        foreach ($settings as $s) {
            $value = $validated['values'][$s->key] ?? null;
            $s->update(['value' => $value ?: null]);
        }

        return redirect()
            ->route('admin.settings.social')
            ->with('success', 'Social media links updated successfully.');
    }
}
