@php
    use App\Models\SiteSetting;
    use App\Models\Category;
    use Illuminate\Support\Facades\Storage;

    $siteLogo = SiteSetting::get('site_logo');
    $logoUrl = $siteLogo ? Storage::url($siteLogo) : asset('images/logo.svg');

    $isArabic = app()->getLocale() === 'ar';

    // Footer about text with fallback to company description
    $footerAboutText = $isArabic
        ? (SiteSetting::get('footer_about_text_ar') ?: SiteSetting::get('company_description_ar'))
        : (SiteSetting::get('footer_about_text') ?: SiteSetting::get('company_description'));

    // Social links - only get valid URLs
    $socialFacebook = SiteSetting::get('social_facebook');
    $socialTwitter = SiteSetting::get('social_twitter');
    $socialInstagram = SiteSetting::get('social_instagram');
    $socialLinkedin = SiteSetting::get('social_linkedin');
    $socialWhatsapp = SiteSetting::get('social_whatsapp');

    // Check if any social links exist
    $hasSocialLinks = $socialFacebook || $socialTwitter || $socialInstagram || $socialLinkedin || $socialWhatsapp;

    // Contact info
    $contactAddress = SiteSetting::get('contact_address');
    $contactCity = SiteSetting::get('contact_city');
    $contactPhone = SiteSetting::get('contact_phone');
    $contactEmail = SiteSetting::get('contact_email');
    $workingHours = SiteSetting::get('working_hours');

    // Get categories for footer
    $footerCategories = Category::where('is_active', true)->take(5)->get();
@endphp

<footer class="relative bg-gray-900 overflow-hidden">
    <!-- Decorative Elements -->
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="absolute top-0 right-1/4 w-[500px] h-[500px] bg-rabyanah-blue-600/5 rounded-full blur-3xl"></div>
        <div class="absolute bottom-0 left-1/4 w-[400px] h-[400px] bg-rabyanah-red-500/5 rounded-full blur-3xl"></div>
    </div>

    <!-- Main Footer -->
    <div class="relative container mx-auto px-4 lg:px-8 py-16 lg:py-20">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-12 gap-12 lg:gap-8">
            <!-- Company Info -->
            <div class="lg:col-span-4">
                <a href="{{ route('home') }}" class="inline-block mb-6">
                    <img src="{{ $logoUrl }}" alt="Rabyanah" class="h-14 w-auto brightness-0 invert">
                </a>
                @if($footerAboutText)
                    <p class="text-gray-400 mb-8 leading-relaxed max-w-sm">
                        {{ $footerAboutText }}
                    </p>
                @endif

                <!-- Social Media -->
                @if($hasSocialLinks)
                    <div>
                        <p class="text-white/50 text-sm font-medium mb-4">{{ __('Connect With Us') }}</p>
                        <div class="flex space-x-3 rtl:space-x-reverse">
                            @if($socialFacebook)
                                <a href="{{ $socialFacebook }}" target="_blank" rel="noopener" class="w-11 h-11 bg-white/5 rounded-xl flex items-center justify-center text-gray-400 hover:bg-[#1877f2] hover:text-white transition-all duration-300 border border-white/10">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                                    </svg>
                                </a>
                            @endif
                            @if($socialTwitter)
                                <a href="{{ $socialTwitter }}" target="_blank" rel="noopener" class="w-11 h-11 bg-white/5 rounded-xl flex items-center justify-center text-gray-400 hover:bg-rabyanah-blue-600 hover:text-white transition-all duration-300 border border-white/10">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/>
                                    </svg>
                                </a>
                            @endif
                            @if($socialInstagram)
                                <a href="{{ $socialInstagram }}" target="_blank" rel="noopener" class="w-11 h-11 bg-white/5 rounded-xl flex items-center justify-center text-gray-400 hover:bg-gradient-to-br hover:from-purple-500 hover:to-pink-500 hover:text-white transition-all duration-300 border border-white/10">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                                    </svg>
                                </a>
                            @endif
                            @if($socialLinkedin)
                                <a href="{{ $socialLinkedin }}" target="_blank" rel="noopener" class="w-11 h-11 bg-white/5 rounded-xl flex items-center justify-center text-gray-400 hover:bg-[#0077b5] hover:text-white transition-all duration-300 border border-white/10">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M4.98 3.5c0 1.381-1.11 2.5-2.48 2.5s-2.48-1.119-2.48-2.5c0-1.38 1.11-2.5 2.48-2.5s2.48 1.12 2.48 2.5zm.02 4.5h-5v16h5v-16zm7.982 0h-4.968v16h4.969v-8.399c0-4.67 6.029-5.052 6.029 0v8.399h4.988v-10.131c0-7.88-8.922-7.593-11.018-3.714v-2.155z"/>
                                    </svg>
                                </a>
                            @endif
                            @if($socialWhatsapp)
                                <a href="{{ $socialWhatsapp }}" target="_blank" rel="noopener" class="w-11 h-11 bg-white/5 rounded-xl flex items-center justify-center text-gray-400 hover:bg-green-500 hover:text-white transition-all duration-300 border border-white/10">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                                    </svg>
                                </a>
                            @endif
                        </div>
                    </div>
                @endif
            </div>

            <!-- Quick Links -->
            <div class="lg:col-span-2">
                <h3 class="text-white font-bold text-lg mb-6 relative">
                    {{ __('Quick Links') }}
                    <span class="absolute bottom-0 left-0 w-8 h-0.5 bg-rabyanah-red-500 -mb-2"></span>
                </h3>
                <ul class="space-y-4 mt-8">
                    <li>
                        <a href="{{ route('home') }}" class="text-gray-400 hover:text-white transition-colors flex items-center group">
                            <svg class="w-4 h-4 mr-2 rtl:mr-0 rtl:ml-2 text-rabyanah-blue-500 opacity-0 group-hover:opacity-100 transition-opacity" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                            {{ __('Home') }}
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('about') }}" class="text-gray-400 hover:text-white transition-colors flex items-center group">
                            <svg class="w-4 h-4 mr-2 rtl:mr-0 rtl:ml-2 text-rabyanah-blue-500 opacity-0 group-hover:opacity-100 transition-opacity" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                            {{ __('About Us') }}
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('products.index') }}" class="text-gray-400 hover:text-white transition-colors flex items-center group">
                            <svg class="w-4 h-4 mr-2 rtl:mr-0 rtl:ml-2 text-rabyanah-blue-500 opacity-0 group-hover:opacity-100 transition-opacity" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                            {{ __('Products') }}
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('home') }}#brands" class="text-gray-400 hover:text-white transition-colors flex items-center group">
                            <svg class="w-4 h-4 mr-2 rtl:mr-0 rtl:ml-2 text-rabyanah-blue-500 opacity-0 group-hover:opacity-100 transition-opacity" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                            {{ __('Our Brands') }}
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('contact') }}" class="text-gray-400 hover:text-white transition-colors flex items-center group">
                            <svg class="w-4 h-4 mr-2 rtl:mr-0 rtl:ml-2 text-rabyanah-blue-500 opacity-0 group-hover:opacity-100 transition-opacity" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                            {{ __('Contact Us') }}
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Product Categories -->
            @if($footerCategories->count() > 0)
                <div class="lg:col-span-3">
                    <h3 class="text-white font-bold text-lg mb-6 relative">
                        {{ __('Product Categories') }}
                        <span class="absolute bottom-0 left-0 w-8 h-0.5 bg-rabyanah-red-500 -mb-2"></span>
                    </h3>
                    <ul class="space-y-4 mt-8">
                        @foreach($footerCategories as $category)
                            <li>
                                <a href="{{ route('categories.show', $category->slug) }}" class="text-gray-400 hover:text-white transition-colors flex items-center group">
                                    <svg class="w-4 h-4 mr-2 rtl:mr-0 rtl:ml-2 text-rabyanah-blue-500 opacity-0 group-hover:opacity-100 transition-opacity" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                    </svg>
                                    {{ $isArabic && $category->name_ar ? $category->name_ar : $category->name }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Contact Info -->
            <div class="lg:col-span-3">
                <h3 class="text-white font-bold text-lg mb-6 relative">
                    {{ __('Contact Info') }}
                    <span class="absolute bottom-0 left-0 w-8 h-0.5 bg-rabyanah-red-500 -mb-2"></span>
                </h3>
                <ul class="space-y-5 mt-8">
                    @if($contactAddress || $contactCity)
                        <li class="flex items-start space-x-4 rtl:space-x-reverse">
                            <div class="w-10 h-10 bg-rabyanah-blue-600/20 rounded-xl flex items-center justify-center flex-shrink-0">
                                <svg class="w-5 h-5 text-rabyanah-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                            </div>
                            <div>
                                @if($contactAddress)
                                    <p class="text-gray-300">{{ $contactAddress }}</p>
                                @endif
                                @if($contactCity)
                                    <p class="text-gray-400">{{ $contactCity }}</p>
                                @endif
                            </div>
                        </li>
                    @endif
                    @if($contactPhone)
                        <li class="flex items-start space-x-4 rtl:space-x-reverse">
                            <div class="w-10 h-10 bg-rabyanah-red-600/20 rounded-xl flex items-center justify-center flex-shrink-0">
                                <svg class="w-5 h-5 text-rabyanah-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                </svg>
                            </div>
                            <div>
                                <p class="text-gray-300">{{ $contactPhone }}</p>
                                @if($workingHours)
                                    <p class="text-gray-400 text-sm">{{ $workingHours }}</p>
                                @endif
                            </div>
                        </li>
                    @endif
                    @if($contactEmail)
                        <li class="flex items-start space-x-4 rtl:space-x-reverse">
                            <div class="w-10 h-10 bg-rabyanah-blue-600/20 rounded-xl flex items-center justify-center flex-shrink-0">
                                <svg class="w-5 h-5 text-rabyanah-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                </svg>
                            </div>
                            <div>
                                <p class="text-gray-300">{{ $contactEmail }}</p>
                                <p class="text-gray-400 text-sm">{{ __('We reply within 24 hours') }}</p>
                            </div>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </div>

    <!-- Bottom Bar -->
    <div class="relative border-t border-white/10">
        <div class="container mx-auto px-4 lg:px-8 py-6">
            <p class="text-gray-500 text-sm text-center">
                &copy; {{ date('Y') }} Rabyanah. {{ __('All rights reserved.') }}
            </p>
        </div>
    </div>

    <!-- Scroll to Top Button -->
    <a href="#" onclick="window.scrollTo({top: 0, behavior: 'smooth'}); return false;" class="fixed bottom-8 right-8 rtl:right-auto rtl:left-8 w-12 h-12 bg-rabyanah-blue-600 text-white rounded-xl flex items-center justify-center shadow-lg shadow-rabyanah-blue-600/30 hover:bg-rabyanah-blue-700 transition-all duration-300 hover:-translate-y-1 z-50">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"/>
        </svg>
    </a>
</footer>
