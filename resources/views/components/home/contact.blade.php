<section id="contact" class="py-24 lg:py-32 relative overflow-hidden">
    <!-- Background -->
    <div class="absolute inset-0 bg-gradient-to-br from-rabyanah-blue-950 via-rabyanah-blue-900 to-rabyanah-blue-950"></div>

    <!-- Decorative Elements -->
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="absolute top-0 left-1/4 w-[600px] h-[600px] bg-rabyanah-blue-600/20 rounded-full blur-3xl animate-pulse-slow"></div>
        <div class="absolute bottom-0 right-1/4 w-[500px] h-[500px] bg-rabyanah-red-500/10 rounded-full blur-3xl animate-pulse-slow" style="animation-delay: 2s;"></div>
        <div class="absolute top-1/2 left-0 w-[300px] h-[300px] bg-rabyanah-blue-400/10 rounded-full blur-2xl"></div>

        <!-- Grid Pattern -->
        <div class="absolute inset-0 opacity-5">
            <div class="absolute inset-0" style="background-image: linear-gradient(rgba(255,255,255,.1) 1px, transparent 1px), linear-gradient(90deg, rgba(255,255,255,.1) 1px, transparent 1px); background-size: 60px 60px;"></div>
        </div>
    </div>

    <div class="container mx-auto px-4 lg:px-8 relative">
        <!-- Section Header -->
        <div class="text-center max-w-3xl mx-auto mb-16">
            <div class="flex items-center justify-center space-x-3 rtl:space-x-reverse mb-6" data-animate="fade-up">
                <div class="w-12 h-[2px] bg-rabyanah-red-500" data-animate="draw-line" data-delay="200"></div>
                <span class="text-rabyanah-red-400 font-semibold tracking-wide uppercase text-sm">
                    {{ __('Get In Touch') }}
                </span>
                <div class="w-12 h-[2px] bg-rabyanah-red-500" data-animate="draw-line" data-delay="200"></div>
            </div>
            <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold font-playfair text-white leading-tight mb-4" data-animate="blur-in" data-delay="100">
                {{ __('Work With') }}
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-rabyanah-blue-400 to-white">{{ __('Us') }}</span>
            </h2>
            <p class="text-lg text-blue-100/70 leading-relaxed" data-animate="fade-up" data-delay="200">
                {{ __('Ready to partner with us? We\'d love to hear from you. Send us a message and our team will respond as soon as possible.') }}
            </p>
        </div>

        <div class="grid lg:grid-cols-2 gap-8 lg:gap-12 items-start">
            <!-- Map & Contact Info -->
            <div class="space-y-6" data-animate="fade-right" data-delay="300">
                <!-- Map -->
                <div class="rounded-2xl overflow-hidden border border-white/10 h-[485px]">
                    <iframe
                        src="{{ \App\Models\SiteSetting::get('google_maps_url', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3608.5834762766396!2d55.2707!3d25.2048') }}"
                        width="100%"
                        height="100%"
                        style="border:0;"
                        allowfullscreen=""
                        loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>

                <!-- Contact Info Cards -->
                <div class="grid grid-cols-3 gap-4">
                    <!-- Location -->
                    <a href="https://maps.google.com" target="_blank" class="group bg-white/5 backdrop-blur-xl rounded-2xl p-5 border border-white/10 hover:bg-white/10 transition-all duration-300 text-center">
                        <div class="w-12 h-12 mx-auto bg-gradient-to-br from-rabyanah-blue-500 to-rabyanah-blue-700 rounded-xl flex items-center justify-center mb-3 group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                        </div>
                        <h4 class="font-semibold text-white text-sm mb-1">{{ __('Location') }}</h4>
                        <p class="text-blue-100/60 text-xs leading-relaxed">{{ \App\Models\SiteSetting::get('contact_city', 'Dubai, UAE') }}</p>
                    </a>

                    <!-- Phone -->
                    @php $contactPhone = \App\Models\SiteSetting::get('contact_phone', '+971 4 123 4567'); @endphp
                    <a href="tel:{{ preg_replace('/[^0-9+]/', '', $contactPhone) }}" class="group bg-white/5 backdrop-blur-xl rounded-2xl p-5 border border-white/10 hover:bg-white/10 transition-all duration-300 text-center">
                        <div class="w-12 h-12 mx-auto bg-gradient-to-br from-rabyanah-red-500 to-rabyanah-red-700 rounded-xl flex items-center justify-center mb-3 group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                            </svg>
                        </div>
                        <h4 class="font-semibold text-white text-sm mb-1">{{ __('Phone') }}</h4>
                        <p class="text-blue-100/60 text-xs leading-relaxed">{{ $contactPhone }}</p>
                    </a>

                    <!-- Email -->
                    @php $contactEmail = \App\Models\SiteSetting::get('contact_email', 'info@rabyanah.com'); @endphp
                    <a href="mailto:{{ $contactEmail }}" class="group bg-white/5 backdrop-blur-xl rounded-2xl p-5 border border-white/10 hover:bg-white/10 transition-all duration-300 text-center">
                        <div class="w-12 h-12 mx-auto bg-gradient-to-br from-rabyanah-blue-500 to-rabyanah-blue-700 rounded-xl flex items-center justify-center mb-3 group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                        </div>
                        <h4 class="font-semibold text-white text-sm mb-1">{{ __('Email') }}</h4>
                        <p class="text-blue-100/60 text-xs leading-relaxed">{{ $contactEmail }}</p>
                    </a>
                </div>
            </div>

            <!-- Contact Form -->
            <div data-animate="fade-left" data-delay="400">
                <div class="bg-white rounded-3xl p-8 lg:p-10 shadow-2xl shadow-black/20 max-w-xl mx-auto lg:mx-0">
                    <div class="flex items-center space-x-3 rtl:space-x-reverse mb-8">
                        <div class="w-12 h-12 bg-rabyanah-blue-100 rounded-xl flex items-center justify-center">
                            <svg class="w-6 h-6 text-rabyanah-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-gray-900">{{ __('Send us a Message') }}</h3>
                            <p class="text-gray-500 text-sm">{{ __('Fill out the form below and we\'ll get back to you') }}</p>
                        </div>
                    </div>

                    @if(session('success'))
                    <div class="bg-green-50 border border-green-200 text-green-700 px-5 py-4 rounded-xl mb-6 flex items-center space-x-3 rtl:space-x-reverse">
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
                                <p class="mt-2 text-sm text-red-500 flex items-center space-x-1 rtl:space-x-reverse">
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
                                       placeholder="john@example.com">
                                @error('email')
                                <p class="mt-2 text-sm text-red-500 flex items-center space-x-1 rtl:space-x-reverse">
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
                                       placeholder="+971 50 123 4567">
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
                            <p class="mt-2 text-sm text-red-500 flex items-center space-x-1 rtl:space-x-reverse">
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
    </div>
</section>
