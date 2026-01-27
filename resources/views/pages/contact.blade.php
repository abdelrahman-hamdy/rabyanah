<x-layout.app :title="__('Contact Us') . ' - Rabyanah'">
    {{-- Hero Section with Archive Hero Styling --}}
    <section class="relative overflow-hidden" style="padding-top: clamp(160px, 20vw, 220px);">
        {{-- Gradient Background - Same warm beige as about page --}}
        <div class="absolute inset-0 bg-gradient-to-b from-amber-50/80 via-orange-50/40 to-white"></div>

        {{-- Animated Background Elements --}}
        <div class="absolute inset-0 overflow-hidden">
            {{-- Gradient Orbs --}}
            <div class="absolute top-0 left-0 w-[600px] h-[600px] bg-amber-100/30 rounded-full blur-3xl -translate-x-1/2 -translate-y-1/2 animate-float-slow"></div>
            <div class="absolute bottom-0 right-0 w-[500px] h-[500px] bg-orange-100/20 rounded-full blur-3xl translate-x-1/3 translate-y-1/3 animate-float-reverse"></div>
            <div class="absolute top-1/2 left-1/2 w-[300px] h-[300px] bg-amber-50/40 rounded-full blur-2xl -translate-x-1/2 -translate-y-1/2 animate-pulse-slow"></div>

            {{-- Subtle Grid Pattern --}}
            <div class="absolute inset-0 opacity-[0.02]" style="background-image: url('data:image/svg+xml,%3Csvg width=\'60\' height=\'60\' viewBox=\'0 0 60 60\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cg fill=\'none\' fill-rule=\'evenodd\'%3E%3Cg fill=\'%23000000\' fill-opacity=\'1\'%3E%3Cpath d=\'M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z\'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>
        </div>

        <div class="container mx-auto px-4 lg:px-8 relative">
            {{-- Breadcrumbs --}}
            <nav class="flex items-center justify-center space-x-2 rtl:space-x-reverse text-sm mb-8">
                <a href="{{ route('home') }}" class="text-gray-500 hover:text-rabyanah-blue-600 transition-colors">
                    {{ __('Home') }}
                </a>
                <svg class="w-4 h-4 text-gray-400 rtl:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
                <span class="text-gray-700 font-medium">{{ __('Contact Us') }}</span>
            </nav>

            {{-- Section Header --}}
            <div class="text-center max-w-3xl mx-auto pb-16 md:pb-24">
                <div class="flex items-center justify-center space-x-3 rtl:space-x-reverse mb-6">
                    <div class="w-12 h-[2px] bg-rabyanah-red-500"></div>
                    <span class="text-rabyanah-red-600 font-semibold tracking-wide uppercase text-sm">
                        {{ __('Get In Touch') }}
                    </span>
                    <div class="w-12 h-[2px] bg-rabyanah-red-500"></div>
                </div>

                <h1 class="text-3xl md:text-4xl lg:text-5xl font-bold font-playfair text-gray-900 leading-tight mb-4">
                    {{ __('Contact Us') }}
                </h1>

                <p class="text-lg text-gray-600 leading-relaxed">
                    {{ __('Ready to partner with us? We\'d love to hear from you. Send us a message and our team will respond as soon as possible.') }}
                </p>
            </div>
        </div>
    </section>

    {{-- Contact Info Cards Section --}}
    <section class="relative py-16 lg:py-24">
        <div class="container mx-auto px-4 lg:px-8">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                {{-- Phone Card --}}
                <a href="tel:{{ preg_replace('/[^0-9+]/', '', $contactInfo['phone']) }}"
                   class="group bg-white rounded-2xl p-6 shadow-lg hover:shadow-xl transition-all duration-300 border border-gray-100 hover:-translate-y-1">
                    <div class="flex items-start gap-4">
                        <svg class="w-8 h-8 text-rabyanah-blue-600 flex-shrink-0 group-hover:scale-110 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                        </svg>
                        <div>
                            <h3 class="text-lg font-bold text-gray-900 mb-1">{{ __('Phone') }}</h3>
                            <p class="text-gray-600 font-medium" dir="ltr">{{ $contactInfo['phone'] }}</p>
                        </div>
                    </div>
                </a>

                {{-- Email Card --}}
                <a href="mailto:{{ $contactInfo['email'] }}"
                   class="group bg-white rounded-2xl p-6 shadow-lg hover:shadow-xl transition-all duration-300 border border-gray-100 hover:-translate-y-1">
                    <div class="flex items-start gap-4">
                        <svg class="w-8 h-8 text-rabyanah-red-600 flex-shrink-0 group-hover:scale-110 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                        <div>
                            <h3 class="text-lg font-bold text-gray-900 mb-1">{{ __('Email') }}</h3>
                            <p class="text-gray-600 font-medium">{{ $contactInfo['email'] }}</p>
                        </div>
                    </div>
                </a>

                {{-- Address Card --}}
                <a href="https://maps.google.com/?q={{ urlencode($contactInfo['address'] . ', ' . $contactInfo['city']) }}"
                   target="_blank"
                   class="group bg-white rounded-2xl p-6 shadow-lg hover:shadow-xl transition-all duration-300 border border-gray-100 hover:-translate-y-1">
                    <div class="flex items-start gap-4">
                        <svg class="w-8 h-8 text-green-600 flex-shrink-0 group-hover:scale-110 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                        <div>
                            <h3 class="text-lg font-bold text-gray-900 mb-1">{{ __('Address') }}</h3>
                            <p class="text-gray-600 font-medium">{{ $contactInfo['address'] }}</p>
                            <p class="text-gray-500 text-sm">{{ $contactInfo['city'] }}</p>
                        </div>
                    </div>
                </a>

                {{-- Working Hours Card --}}
                <div class="group bg-white rounded-2xl p-6 shadow-lg hover:shadow-xl transition-all duration-300 border border-gray-100 hover:-translate-y-1">
                    <div class="flex items-start gap-4">
                        <svg class="w-8 h-8 text-purple-600 flex-shrink-0 group-hover:scale-110 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <div>
                            <h3 class="text-lg font-bold text-gray-900 mb-1">{{ __('Working Hours') }}</h3>
                            <p class="text-gray-600 font-medium">{{ $contactInfo['working_hours'] }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Map & Form Section --}}
    <section class="py-16 lg:py-24 bg-white">
        <div class="container mx-auto px-4 lg:px-8">
            <div class="relative grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-16">
                {{-- Vertical Divider (Desktop Only) --}}
                <div class="hidden lg:block absolute left-1/2 top-0 bottom-0 -translate-x-1/2 w-px bg-gray-200"></div>

                {{-- Map Section --}}
                <div class="lg:pe-8">
                    <div class="flex items-center gap-3 mb-6">
                        <svg class="w-6 h-6 text-rabyanah-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                        <h3 class="text-2xl font-bold font-playfair text-gray-900">{{ __('Find Us') }}</h3>
                    </div>
                    <div class="rounded-2xl overflow-hidden border border-gray-200" style="height: 495px;">
                        <iframe
                            src="{{ $contactInfo['google_maps_url'] }}"
                            width="100%"
                            height="100%"
                            style="border:0;"
                            allowfullscreen=""
                            loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"
                            class="w-full h-full">
                        </iframe>
                    </div>
                </div>

                {{-- Contact Form Section --}}
                <div class="lg:ps-8">
                    <div class="flex items-center gap-3 mb-6">
                        <svg class="w-6 h-6 text-rabyanah-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                        </svg>
                        <h3 class="text-2xl font-bold font-playfair text-gray-900">{{ __('Send us a Message') }}</h3>
                    </div>

                    @if(session('success'))
                    <div class="bg-green-50 border border-green-200 text-green-700 px-5 py-4 rounded-xl mb-6 flex items-center gap-3">
                        <svg class="w-5 h-5 text-green-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <span>{{ session('success') }}</span>
                    </div>
                    @endif

                    <form action="{{ route('contact.store') }}" method="POST" class="space-y-6">
                        @csrf

                        <div class="grid sm:grid-cols-2 gap-6">
                            <div>
                                <label for="name" class="block text-sm font-semibold text-gray-700 mb-2">
                                    {{ __('Full Name') }} <span class="text-rabyanah-red-500">*</span>
                                </label>
                                <input type="text"
                                       id="name"
                                       name="name"
                                       required
                                       value="{{ old('name') }}"
                                       class="form-input @error('name') !border-red-500 !ring-red-500/10 @enderror"
                                       placeholder="{{ __('John Doe') }}">
                                @error('name')
                                <p class="mt-2 text-sm text-red-500 flex items-center gap-1">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                    <span>{{ $message }}</span>
                                </p>
                                @enderror
                            </div>

                            <div>
                                <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">
                                    {{ __('Email Address') }} <span class="text-rabyanah-red-500">*</span>
                                </label>
                                <input type="email"
                                       id="email"
                                       name="email"
                                       required
                                       value="{{ old('email') }}"
                                       class="form-input @error('email') !border-red-500 !ring-red-500/10 @enderror"
                                       placeholder="{{ __('john@example.com') }}">
                                @error('email')
                                <p class="mt-2 text-sm text-red-500 flex items-center gap-1">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                    <span>{{ $message }}</span>
                                </p>
                                @enderror
                            </div>
                        </div>

                        <div class="grid sm:grid-cols-2 gap-6">
                            <div>
                                <label for="phone" class="block text-sm font-semibold text-gray-700 mb-2">
                                    {{ __('Phone Number') }}
                                </label>
                                <input type="tel"
                                       id="phone"
                                       name="phone"
                                       value="{{ old('phone') }}"
                                       class="form-input"
                                       placeholder="{{ __('e.g. +971 50 123 4567') }}">
                            </div>

                            <div>
                                <label for="subject" class="block text-sm font-semibold text-gray-700 mb-2">
                                    {{ __('Subject') }}
                                </label>
                                <input type="text"
                                       id="subject"
                                       name="subject"
                                       value="{{ old('subject') }}"
                                       class="form-input"
                                       placeholder="{{ __('Partnership Inquiry') }}">
                            </div>
                        </div>

                        <div>
                            <label for="message" class="block text-sm font-semibold text-gray-700 mb-2">
                                {{ __('Message') }} <span class="text-rabyanah-red-500">*</span>
                            </label>
                            <textarea id="message"
                                      name="message"
                                      required
                                      rows="5"
                                      class="form-input resize-none @error('message') !border-red-500 !ring-red-500/10 @enderror"
                                      placeholder="{{ __('Tell us about your inquiry...') }}">{{ old('message') }}</textarea>
                            @error('message')
                            <p class="mt-2 text-sm text-red-500 flex items-center gap-1">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                <span>{{ $message }}</span>
                            </p>
                            @enderror
                        </div>

                        <button type="submit" class="btn-accent w-full group">
                            <span>{{ __('Send Message') }}</span>
                            <svg class="w-5 h-5 ml-2 rtl:ml-0 rtl:mr-2 rtl:rotate-180 group-hover:translate-x-1 rtl:group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                            </svg>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    {{-- FAQ Section --}}
    <section class="py-16 lg:py-24 bg-gray-50">
        <div class="container mx-auto px-4 lg:px-8">
            {{-- Section Header --}}
            <div class="text-center max-w-3xl mx-auto mb-12 lg:mb-16">
                <span class="inline-block px-4 py-1.5 bg-rabyanah-blue-50 text-rabyanah-blue-600 text-sm font-medium rounded-full mb-4">
                    {{ __('FAQ') }}
                </span>
                <h2 class="text-3xl lg:text-4xl font-bold font-playfair text-gray-900 mb-4">
                    {{ __('Frequently Asked Questions') }}
                </h2>
                <p class="text-gray-500 text-lg">
                    {{ __('Find quick answers to common questions about our services') }}
                </p>
            </div>

            @if(!empty($faqs))
            <div class="max-w-3xl mx-auto space-y-4" x-data="{ open: 1 }">
                @foreach($faqs as $index => $faq)
                <div class="bg-white rounded-2xl border transition-all duration-300"
                     :class="open === {{ $index + 1 }} ? 'border-rabyanah-blue-200 shadow-lg shadow-rabyanah-blue-500/10' : 'border-gray-100 shadow-sm hover:shadow-md hover:border-gray-200'">
                    <button @click="open = open === {{ $index + 1 }} ? null : {{ $index + 1 }}"
                            class="w-full flex items-center justify-between gap-6 p-6 text-left group">
                        <h3 class="text-lg font-semibold transition-colors duration-200"
                            :class="open === {{ $index + 1 }} ? 'text-rabyanah-blue-600' : 'text-gray-900 group-hover:text-rabyanah-blue-600'">
                            {{ $faq['question'] }}
                        </h3>
                        <span class="flex-shrink-0 w-10 h-10 rounded-full flex items-center justify-center transition-all duration-300"
                              :class="open === {{ $index + 1 }} ? 'bg-rabyanah-blue-600 text-white rotate-180' : 'bg-gray-100 text-gray-500 group-hover:bg-rabyanah-blue-50 group-hover:text-rabyanah-blue-600'">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </span>
                    </button>
                    <div x-show="open === {{ $index + 1 }}"
                         x-collapse
                         x-cloak>
                        <div class="px-6 pb-6 pt-0">
                            <p class="text-gray-600 leading-relaxed">{{ $faq['answer'] }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @else
            <div class="max-w-3xl mx-auto text-center py-8">
                <p class="text-gray-500">{{ __('No frequently asked questions available at the moment.') }}</p>
            </div>
            @endif
        </div>
    </section>
</x-layout.app>
