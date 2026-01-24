<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use App\Models\Product;
use App\Models\SiteSetting;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(): View
    {
        $contactInfo = [
            'phone' => SiteSetting::get('contact_phone', '+971 4 123 4567'),
            'email' => SiteSetting::get('contact_email', 'info@rabyanah.com'),
            'address' => SiteSetting::get('contact_address', '123 Business District'),
            'city' => SiteSetting::get('contact_city', 'Dubai, UAE'),
            'working_hours' => SiteSetting::get('working_hours', 'Mon-Fri: 9AM - 6PM'),
            'google_maps_url' => SiteSetting::get('google_maps_url', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3608.5834762766396!2d55.2707!3d25.2048'),
        ];

        $socialLinks = [
            'twitter' => SiteSetting::get('social_twitter', '#'),
            'instagram' => SiteSetting::get('social_instagram', '#'),
            'linkedin' => SiteSetting::get('social_linkedin', '#'),
            'whatsapp' => SiteSetting::get('social_whatsapp', '#'),
            'facebook' => SiteSetting::get('social_facebook', '#'),
        ];

        // Fetch FAQs based on locale
        $locale = app()->getLocale();
        $faqs = [];

        for ($i = 1; $i <= 6; $i++) {
            $questionKey = $locale === 'ar' ? "faq_{$i}_question_ar" : "faq_{$i}_question";
            $answerKey = $locale === 'ar' ? "faq_{$i}_answer_ar" : "faq_{$i}_answer";

            $question = SiteSetting::get($questionKey);
            $answer = SiteSetting::get($answerKey);

            // Only add FAQ if both question and answer exist
            if ($question && $answer) {
                $faqs[] = [
                    'question' => $question,
                    'answer' => $answer,
                ];
            }
        }

        return view('pages.contact', compact('contactInfo', 'socialLinks', 'faqs'));
    }

    public function store(Request $request): RedirectResponse|JsonResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['nullable', 'string', 'max:50'],
            'subject' => ['nullable', 'string', 'max:255'],
            'message' => ['required', 'string', 'max:5000'],
            'product_id' => ['nullable', 'exists:products,id'],
            'type' => ['nullable', 'string', 'in:general,product_inquiry'],
        ]);

        // If it's a product inquiry, get the product name
        if (! empty($validated['product_id'])) {
            $product = Product::find($validated['product_id']);
            $validated['product_name'] = $product?->name;
            $validated['type'] = 'product_inquiry';
        }

        ContactMessage::create($validated);

        // Return JSON for AJAX requests
        if ($request->expectsJson() || $request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => __('Thank you for your inquiry! We will get back to you soon.'),
            ]);
        }

        return back()->with('success', __('Thank you for your message! We will get back to you soon.'));
    }
}
