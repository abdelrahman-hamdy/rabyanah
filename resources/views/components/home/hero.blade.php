@props(['slides' => []])

<section id="home" class="relative min-h-screen bg-gradient-to-br from-rabyanah-blue-950 via-rabyanah-blue-900 to-rabyanah-blue-800 overflow-hidden">
    <!-- Animated Background Elements -->
    <div class="absolute inset-0 overflow-hidden">
        <!-- Gradient Orbs -->
        <div class="absolute top-0 left-0 w-[800px] h-[800px] bg-rabyanah-blue-600/20 rounded-full blur-3xl -translate-x-1/2 -translate-y-1/2 animate-pulse-slow"></div>
        <div class="absolute bottom-0 right-0 w-[600px] h-[600px] bg-rabyanah-red-600/10 rounded-full blur-3xl translate-x-1/3 translate-y-1/3"></div>
        <div class="absolute top-1/2 left-1/2 w-[400px] h-[400px] bg-rabyanah-blue-400/10 rounded-full blur-2xl -translate-x-1/2 -translate-y-1/2"></div>

        <!-- Subtle Grid Pattern -->
        <div class="absolute inset-0 opacity-[0.03]" style="background-image: url('data:image/svg+xml,%3Csvg width=\'60\' height=\'60\' viewBox=\'0 0 60 60\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cg fill=\'none\' fill-rule=\'evenodd\'%3E%3Cg fill=\'%23ffffff\' fill-opacity=\'1\'%3E%3Cpath d=\'M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z\'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>
    </div>

    <!-- Main Content -->
    <div class="relative container mx-auto px-4 lg:px-8 min-h-screen flex items-center">
        <div class="grid lg:grid-cols-2 gap-12 lg:gap-20 items-center py-32 lg:py-0 w-full">
            <!-- Left Content -->
            <div class="text-center lg:text-left rtl:lg:text-right order-2 lg:order-1">
                <!-- Tagline Badge -->
                <div class="inline-flex items-center space-x-2 rtl:space-x-reverse bg-white/10 backdrop-blur-sm border border-white/20 rounded-full px-5 py-2.5 mb-8">
                    <span class="w-2 h-2 bg-rabyanah-red-500 rounded-full animate-pulse"></span>
                    <span class="text-white/90 text-sm font-medium tracking-wide">{{ __('Global Food Excellence Since 1985') }}</span>
                </div>

                <!-- Main Heading -->
                <h1 class="font-playfair text-4xl md:text-5xl lg:text-6xl xl:text-7xl font-bold text-white leading-[1.1] mb-6">
                    {{ __('Premium Food') }}
                    <span class="block mt-2">
                        <span class="text-transparent bg-clip-text bg-gradient-to-r from-rabyanah-red-400 to-rabyanah-red-500">{{ __('Trade Partner') }}</span>
                    </span>
                </h1>

                <!-- Subheading -->
                <p class="text-lg md:text-xl text-white/70 leading-relaxed max-w-xl mx-auto lg:mx-0 mb-10">
                    {{ __('Connecting the world\'s finest food brands with markets across the globe. Quality, trust, and excellence in every partnership.') }}
                </p>

                <!-- CTA Buttons -->
                <div class="flex flex-col sm:flex-row items-center justify-center lg:justify-start gap-4 mb-16">
                    <a href="#products"
                       class="group w-full sm:w-auto inline-flex items-center justify-center space-x-3 rtl:space-x-reverse bg-white text-rabyanah-blue-900 px-8 py-4 rounded-full font-semibold text-base hover:bg-rabyanah-red-500 hover:text-white transition-all duration-300 shadow-2xl shadow-black/20">
                        <span>{{ __('Explore Products') }}</span>
                        <svg class="w-5 h-5 rtl:rotate-180 group-hover:translate-x-1 rtl:group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                        </svg>
                    </a>
                    <a href="#contact"
                       class="group w-full sm:w-auto inline-flex items-center justify-center space-x-3 rtl:space-x-reverse border-2 border-white/30 text-white px-8 py-4 rounded-full font-semibold text-base hover:bg-white/10 hover:border-white/50 transition-all duration-300">
                        <span>{{ __('Partner With Us') }}</span>
                    </a>
                </div>

                <!-- Stats Row -->
                <div class="grid grid-cols-3 gap-6 lg:gap-10">
                    <div class="text-center lg:text-left rtl:lg:text-right">
                        <div class="text-3xl lg:text-4xl font-bold text-white mb-1">40+</div>
                        <div class="text-sm text-white/50 font-medium">{{ __('Years Experience') }}</div>
                    </div>
                    <div class="text-center lg:text-left rtl:lg:text-right border-l border-r border-white/10 px-4">
                        <div class="text-3xl lg:text-4xl font-bold text-white mb-1">50+</div>
                        <div class="text-sm text-white/50 font-medium">{{ __('Global Brands') }}</div>
                    </div>
                    <div class="text-center lg:text-left rtl:lg:text-right">
                        <div class="text-3xl lg:text-4xl font-bold text-white mb-1">30+</div>
                        <div class="text-sm text-white/50 font-medium">{{ __('Countries Served') }}</div>
                    </div>
                </div>
            </div>

            <!-- Right Side - Visual Element -->
            <div class="relative order-1 lg:order-2">
                <!-- Main Image Container -->
                <div class="relative">
                    <!-- Decorative Ring -->
                    <div class="absolute inset-0 border-2 border-white/10 rounded-[3rem] rotate-6 scale-95"></div>
                    <div class="absolute inset-0 border border-rabyanah-red-500/30 rounded-[3rem] -rotate-3 scale-90"></div>

                    <!-- Main Content Card -->
                    <div class="relative bg-gradient-to-br from-white/10 to-white/5 backdrop-blur-xl rounded-[2.5rem] p-8 lg:p-12 border border-white/20">
                        <!-- Product Showcase Grid -->
                        <div class="grid grid-cols-2 gap-4">
                            <!-- Product Category Cards -->
                            <div class="bg-white/10 backdrop-blur rounded-2xl p-6 hover:bg-white/20 transition-all duration-300 group cursor-pointer">
                                <div class="w-14 h-14 bg-gradient-to-br from-amber-400 to-amber-600 rounded-xl flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z"/>
                                    </svg>
                                </div>
                                <h3 class="text-white font-semibold mb-1">{{ __('Grains') }}</h3>
                                <p class="text-white/50 text-sm">{{ __('Premium Quality') }}</p>
                            </div>

                            <div class="bg-white/10 backdrop-blur rounded-2xl p-6 hover:bg-white/20 transition-all duration-300 group cursor-pointer mt-8">
                                <div class="w-14 h-14 bg-gradient-to-br from-emerald-400 to-emerald-600 rounded-xl flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25"/>
                                    </svg>
                                </div>
                                <h3 class="text-white font-semibold mb-1">{{ __('Oils') }}</h3>
                                <p class="text-white/50 text-sm">{{ __('Pure & Natural') }}</p>
                            </div>

                            <div class="bg-white/10 backdrop-blur rounded-2xl p-6 hover:bg-white/20 transition-all duration-300 group cursor-pointer">
                                <div class="w-14 h-14 bg-gradient-to-br from-sky-400 to-sky-600 rounded-xl flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 7.5l-2.25-1.313M21 7.5v2.25m0-2.25l-2.25 1.313M3 7.5l2.25-1.313M3 7.5l2.25 1.313M3 7.5v2.25m9 3l2.25-1.313M12 12.75l-2.25-1.313M12 12.75V15m0 6.75l2.25-1.313M12 21.75V19.5m0 2.25l-2.25-1.313m0-16.875L12 2.25l2.25 1.313M21 14.25v2.25l-2.25 1.313m-13.5 0L3 16.5v-2.25"/>
                                    </svg>
                                </div>
                                <h3 class="text-white font-semibold mb-1">{{ __('Dairy') }}</h3>
                                <p class="text-white/50 text-sm">{{ __('Farm Fresh') }}</p>
                            </div>

                            <div class="bg-white/10 backdrop-blur rounded-2xl p-6 hover:bg-white/20 transition-all duration-300 group cursor-pointer mt-8">
                                <div class="w-14 h-14 bg-gradient-to-br from-rose-400 to-rose-600 rounded-xl flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.75 3.104v5.714a2.25 2.25 0 01-.659 1.591L5 14.5M9.75 3.104c-.251.023-.501.05-.75.082m.75-.082a24.301 24.301 0 014.5 0m0 0v5.714c0 .597.237 1.17.659 1.591L19.8 15.3M14.25 3.104c.251.023.501.05.75.082M19.8 15.3l-1.57.393A9.065 9.065 0 0112 15a9.065 9.065 0 00-6.23.693L5 14.5m14.8.8l1.402 1.402c1.232 1.232.65 3.318-1.067 3.611A48.309 48.309 0 0112 21c-2.773 0-5.491-.235-8.135-.687-1.718-.293-2.3-2.379-1.067-3.61L5 14.5"/>
                                    </svg>
                                </div>
                                <h3 class="text-white font-semibold mb-1">{{ __('Spices') }}</h3>
                                <p class="text-white/50 text-sm">{{ __('Exotic Flavors') }}</p>
                            </div>
                        </div>

                        <!-- Floating Badge -->
                        <div class="absolute -bottom-6 -right-6 bg-rabyanah-red-500 text-white px-6 py-3 rounded-2xl shadow-xl shadow-rabyanah-red-500/30">
                            <div class="flex items-center space-x-2 rtl:space-x-reverse">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z" clip-rule="evenodd"/>
                                </svg>
                                <span class="font-bold">{{ __('Certified Quality') }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scroll Indicator -->
    <div class="absolute bottom-8 left-1/2 -translate-x-1/2 flex flex-col items-center space-y-2 animate-bounce">
        <span class="text-white/40 text-xs font-medium tracking-widest uppercase">{{ __('Scroll') }}</span>
        <svg class="w-5 h-5 text-white/40" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"/>
        </svg>
    </div>
</section>
