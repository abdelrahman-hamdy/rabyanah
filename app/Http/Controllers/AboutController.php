<?php

namespace App\Http\Controllers;

use App\Models\SiteSetting;
use Illuminate\Support\Facades\Storage;

class AboutController extends Controller
{
    public function index()
    {
        $locale = app()->getLocale();

        // Get cover image and verify it exists
        $coverImage = SiteSetting::get('about_cover_image');
        if ($coverImage && ! Storage::disk('public')->exists($coverImage)) {
            $coverImage = null;
        }

        return view('pages.about', [
            'content' => $locale === 'ar'
                ? SiteSetting::get('about_content_ar')
                : SiteSetting::get('about_content'),
            'mission' => $locale === 'ar'
                ? SiteSetting::get('about_mission_ar')
                : SiteSetting::get('about_mission'),
            'vision' => $locale === 'ar'
                ? SiteSetting::get('about_vision_ar')
                : SiteSetting::get('about_vision'),
            'coverImage' => $coverImage,
        ]);
    }
}
