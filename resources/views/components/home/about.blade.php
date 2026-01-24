@php
    $aboutYears = \App\Models\SiteSetting::get('about_years_experience', '40');
    $aboutCertification = \App\Models\SiteSetting::get('about_certification', 'ISO 22000');
@endphp

<section id="about" class="py-24 lg:py-32 bg-white overflow-hidden">
    <div class="container mx-auto px-4 lg:px-8">
        <!-- Section Header -->
        <div class="text-center max-w-3xl mx-auto mb-20" data-animate>
            <div class="flex items-center justify-center space-x-3 rtl:space-x-reverse mb-6">
                <div class="w-12 h-[2px] bg-rabyanah-red-500"></div>
                <span class="text-rabyanah-red-600 font-semibold tracking-wide uppercase text-sm">
                    {{ __('About Us') }}
                </span>
                <div class="w-12 h-[2px] bg-rabyanah-red-500"></div>
            </div>
            <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold font-playfair text-gray-900 leading-tight">
                {{ __('Your Trusted Partner in') }}
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-rabyanah-blue-600 to-rabyanah-blue-800">
                    {{ __('Global Food Trade') }}
                </span>
            </h2>
        </div>

        <!-- Main Content Grid -->
        <div class="grid lg:grid-cols-12 gap-8 lg:gap-12 items-center">
            <!-- Left Side - Image Composition -->
            <div class="lg:col-span-6 relative" data-animate>
                <div class="relative">
                    <!-- Main Image -->
                    <div class="relative z-10 rounded-[2rem] overflow-hidden shadow-2xl shadow-rabyanah-blue-900/20">
                        <img src="https://images.unsplash.com/photo-1606787366850-de6330128bfc?auto=format&fit=crop&w=800&q=80"
                             alt="{{ __('About Rabyanah') }}"
                             class="w-full aspect-[4/5] object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-rabyanah-blue-950/60 via-transparent to-transparent"></div>
                    </div>

                    <!-- Decorative Elements -->
                    <div class="absolute -top-6 -left-6 w-32 h-32 bg-rabyanah-red-500/10 rounded-full blur-2xl"></div>
                    <div class="absolute -bottom-6 -right-6 w-48 h-48 bg-rabyanah-blue-500/10 rounded-full blur-2xl"></div>

                    <!-- Experience Badge -->
                    <div class="absolute -bottom-8 -right-8 lg:-right-12 z-20">
                        <div class="bg-white rounded-2xl shadow-xl p-6 border border-gray-100">
                            <div class="text-center">
                                <div class="text-5xl font-bold text-rabyanah-blue-600 mb-1">{{ $aboutYears }}+</div>
                                <div class="text-gray-600 font-medium text-sm">{{ __('Years of') }}<br>{{ __('Excellence') }}</div>
                            </div>
                        </div>
                    </div>

                    <!-- Certification Badge -->
                    <div class="absolute top-8 -left-4 lg:-left-8 z-20">
                        <div class="bg-rabyanah-blue-600 text-white rounded-2xl shadow-xl p-4 flex items-center space-x-3 rtl:space-x-reverse">
                            <div class="w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/>
                                </svg>
                            </div>
                            <div>
                                <div class="font-bold">{{ $aboutCertification }}</div>
                                <div class="text-white/80 text-sm">{{ __('Certified') }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Side - Content -->
            <div class="lg:col-span-6 lg:pl-8" data-animate>
                <p class="text-xl text-gray-600 leading-relaxed mb-8">
                    {{ __('Rabyanah is a leading food trade company with over four decades of experience in sourcing, distributing, and delivering premium quality food products to markets across the globe.') }}
                </p>

                <p class="text-lg text-gray-500 leading-relaxed mb-10">
                    {{ __('Our commitment to quality, reliability, and customer satisfaction has made us a trusted partner for businesses worldwide. We work directly with producers and manufacturers to ensure the highest standards of food safety and quality.') }}
                </p>

                <!-- Features Grid -->
                <div class="grid sm:grid-cols-2 gap-6 mb-10">
                    <div class="group p-5 rounded-2xl bg-gray-50 hover:bg-rabyanah-blue-50 transition-colors duration-300">
                        <div class="w-12 h-12 bg-white rounded-xl flex items-center justify-center mb-4 shadow-sm group-hover:shadow-md transition-shadow">
                            <svg class="w-6 h-6 text-rabyanah-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12.75L11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 01-1.043 3.296 3.745 3.745 0 01-3.296 1.043A3.745 3.745 0 0112 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 01-3.296-1.043 3.745 3.745 0 01-1.043-3.296A3.745 3.745 0 013 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 011.043-3.296 3.746 3.746 0 013.296-1.043A3.746 3.746 0 0112 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 013.296 1.043 3.746 3.746 0 011.043 3.296A3.745 3.745 0 0121 12z"/>
                            </svg>
                        </div>
                        <h4 class="font-bold text-gray-900 mb-1">{{ __('Premium Quality') }}</h4>
                        <p class="text-gray-500 text-sm">{{ __('Rigorously tested and certified products') }}</p>
                    </div>

                    <div class="group p-5 rounded-2xl bg-gray-50 hover:bg-rabyanah-blue-50 transition-colors duration-300">
                        <div class="w-12 h-12 bg-white rounded-xl flex items-center justify-center mb-4 shadow-sm group-hover:shadow-md transition-shadow">
                            <svg class="w-6 h-6 text-rabyanah-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 21a9.004 9.004 0 008.716-6.747M12 21a9.004 9.004 0 01-8.716-6.747M12 21c2.485 0 4.5-4.03 4.5-9S14.485 3 12 3m0 18c-2.485 0-4.5-4.03-4.5-9S9.515 3 12 3m0 0a8.997 8.997 0 017.843 4.582M12 3a8.997 8.997 0 00-7.843 4.582m15.686 0A11.953 11.953 0 0112 10.5c-2.998 0-5.74-1.1-7.843-2.918m15.686 0A8.959 8.959 0 0121 12c0 .778-.099 1.533-.284 2.253m0 0A17.919 17.919 0 0112 16.5c-3.162 0-6.133-.815-8.716-2.247m0 0A9.015 9.015 0 013 12c0-1.605.42-3.113 1.157-4.418"/>
                            </svg>
                        </div>
                        <h4 class="font-bold text-gray-900 mb-1">{{ __('Global Network') }}</h4>
                        <p class="text-gray-500 text-sm">{{ __('Serving 30+ countries worldwide') }}</p>
                    </div>

                    <div class="group p-5 rounded-2xl bg-gray-50 hover:bg-rabyanah-blue-50 transition-colors duration-300">
                        <div class="w-12 h-12 bg-white rounded-xl flex items-center justify-center mb-4 shadow-sm group-hover:shadow-md transition-shadow">
                            <svg class="w-6 h-6 text-rabyanah-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285z"/>
                            </svg>
                        </div>
                        <h4 class="font-bold text-gray-900 mb-1">{{ __('Food Safety') }}</h4>
                        <p class="text-gray-500 text-sm">{{ __('International safety standards') }}</p>
                    </div>

                    <div class="group p-5 rounded-2xl bg-gray-50 hover:bg-rabyanah-blue-50 transition-colors duration-300">
                        <div class="w-12 h-12 bg-white rounded-xl flex items-center justify-center mb-4 shadow-sm group-hover:shadow-md transition-shadow">
                            <svg class="w-6 h-6 text-rabyanah-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72m.94 3.198l.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0112 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 016 18.719m12 0a5.971 5.971 0 00-.941-3.197m0 0A5.995 5.995 0 0012 12.75a5.995 5.995 0 00-5.058 2.772m0 0a3 3 0 00-4.681 2.72 8.986 8.986 0 003.74.477m.94-3.197a5.971 5.971 0 00-.94 3.197M15 6.75a3 3 0 11-6 0 3 3 0 016 0zm6 3a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0zm-13.5 0a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z"/>
                            </svg>
                        </div>
                        <h4 class="font-bold text-gray-900 mb-1">{{ __('Expert Team') }}</h4>
                        <p class="text-gray-500 text-sm">{{ __('Dedicated industry specialists') }}</p>
                    </div>
                </div>

                <!-- CTA -->
                <div class="flex flex-col sm:flex-row gap-4">
                    <a href="#contact" class="btn-primary">
                        <span>{{ __('Partner With Us') }}</span>
                        <svg class="w-5 h-5 ml-2 rtl:ml-0 rtl:mr-2 rtl:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                        </svg>
                    </a>
                    <a href="#brands" class="btn-secondary">
                        <span>{{ __('View Our Brands') }}</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
