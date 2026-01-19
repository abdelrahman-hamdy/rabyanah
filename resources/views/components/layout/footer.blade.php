<footer class="relative bg-gray-900 overflow-hidden">
    <!-- Decorative Elements -->
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="absolute top-0 right-1/4 w-[500px] h-[500px] bg-rabyanah-blue-600/5 rounded-full blur-3xl"></div>
        <div class="absolute bottom-0 left-1/4 w-[400px] h-[400px] bg-rabyanah-red-500/5 rounded-full blur-3xl"></div>
    </div>

    <!-- Newsletter Section -->
    <div class="relative border-b border-white/10">
        <div class="container mx-auto px-4 lg:px-8 py-16">
            <div class="bg-gradient-to-r from-rabyanah-blue-600 to-rabyanah-blue-700 rounded-3xl p-8 lg:p-12 relative overflow-hidden">
                <!-- Decorative -->
                <div class="absolute top-0 right-0 w-64 h-64 bg-white/5 rounded-full -translate-y-1/2 translate-x-1/2"></div>
                <div class="absolute bottom-0 left-0 w-48 h-48 bg-white/5 rounded-full translate-y-1/2 -translate-x-1/2"></div>

                <div class="relative flex flex-col lg:flex-row lg:items-center lg:justify-between gap-8">
                    <div class="lg:max-w-lg">
                        <h3 class="text-2xl lg:text-3xl font-bold text-white mb-2">
                            {{ __('Stay Updated') }}
                        </h3>
                        <p class="text-blue-100/80">
                            {{ __('Subscribe to our newsletter for the latest products, industry news, and exclusive offers.') }}
                        </p>
                    </div>
                    <form class="flex flex-col sm:flex-row gap-4 w-full lg:w-auto">
                        <input type="email"
                               placeholder="{{ __('Enter your email') }}"
                               class="flex-1 lg:w-80 px-6 py-4 bg-white/10 border border-white/20 rounded-xl text-white placeholder-white/50 focus:outline-none focus:border-white/40 focus:ring-2 focus:ring-white/20 transition-all">
                        <button type="submit" class="px-8 py-4 bg-white text-rabyanah-blue-600 font-semibold rounded-xl hover:bg-gray-100 transition-all duration-300 shadow-lg shadow-black/10 hover:-translate-y-0.5 whitespace-nowrap">
                            {{ __('Subscribe') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Footer -->
    <div class="relative container mx-auto px-4 lg:px-8 py-16 lg:py-20">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-12 gap-12 lg:gap-8">
            <!-- Company Info -->
            <div class="lg:col-span-4">
                <a href="{{ route('home') }}" class="inline-block mb-6">
                    <img src="{{ asset('images/logo.svg') }}" alt="Rabyanah" class="h-14 w-auto brightness-0 invert">
                </a>
                <p class="text-gray-400 mb-8 leading-relaxed max-w-sm">
                    {{ __('A leading global food trade company committed to delivering premium quality products to markets worldwide. Four decades of excellence in food distribution.') }}
                </p>

                <!-- Social Media -->
                <div>
                    <p class="text-white/50 text-sm font-medium mb-4">{{ __('Connect With Us') }}</p>
                    <div class="flex space-x-3 rtl:space-x-reverse">
                        <a href="#" class="w-11 h-11 bg-white/5 rounded-xl flex items-center justify-center text-gray-400 hover:bg-rabyanah-blue-600 hover:text-white transition-all duration-300 border border-white/10">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/>
                            </svg>
                        </a>
                        <a href="#" class="w-11 h-11 bg-white/5 rounded-xl flex items-center justify-center text-gray-400 hover:bg-gradient-to-br hover:from-purple-500 hover:to-pink-500 hover:text-white transition-all duration-300 border border-white/10">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                            </svg>
                        </a>
                        <a href="#" class="w-11 h-11 bg-white/5 rounded-xl flex items-center justify-center text-gray-400 hover:bg-[#0077b5] hover:text-white transition-all duration-300 border border-white/10">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M4.98 3.5c0 1.381-1.11 2.5-2.48 2.5s-2.48-1.119-2.48-2.5c0-1.38 1.11-2.5 2.48-2.5s2.48 1.12 2.48 2.5zm.02 4.5h-5v16h5v-16zm7.982 0h-4.968v16h4.969v-8.399c0-4.67 6.029-5.052 6.029 0v8.399h4.988v-10.131c0-7.88-8.922-7.593-11.018-3.714v-2.155z"/>
                            </svg>
                        </a>
                        <a href="#" class="w-11 h-11 bg-white/5 rounded-xl flex items-center justify-center text-gray-400 hover:bg-green-500 hover:text-white transition-all duration-300 border border-white/10">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Quick Links -->
            <div class="lg:col-span-2">
                <h3 class="text-white font-bold text-lg mb-6 relative">
                    {{ __('Quick Links') }}
                    <span class="absolute bottom-0 left-0 w-8 h-0.5 bg-rabyanah-red-500 -mb-2"></span>
                </h3>
                <ul class="space-y-4 mt-8">
                    <li>
                        <a href="#home" class="text-gray-400 hover:text-white transition-colors flex items-center group">
                            <svg class="w-4 h-4 mr-2 rtl:mr-0 rtl:ml-2 text-rabyanah-blue-500 opacity-0 group-hover:opacity-100 transition-opacity" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                            {{ __('Home') }}
                        </a>
                    </li>
                    <li>
                        <a href="#about" class="text-gray-400 hover:text-white transition-colors flex items-center group">
                            <svg class="w-4 h-4 mr-2 rtl:mr-0 rtl:ml-2 text-rabyanah-blue-500 opacity-0 group-hover:opacity-100 transition-opacity" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                            {{ __('About Us') }}
                        </a>
                    </li>
                    <li>
                        <a href="#products" class="text-gray-400 hover:text-white transition-colors flex items-center group">
                            <svg class="w-4 h-4 mr-2 rtl:mr-0 rtl:ml-2 text-rabyanah-blue-500 opacity-0 group-hover:opacity-100 transition-opacity" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                            {{ __('Products') }}
                        </a>
                    </li>
                    <li>
                        <a href="#brands" class="text-gray-400 hover:text-white transition-colors flex items-center group">
                            <svg class="w-4 h-4 mr-2 rtl:mr-0 rtl:ml-2 text-rabyanah-blue-500 opacity-0 group-hover:opacity-100 transition-opacity" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                            {{ __('Our Brands') }}
                        </a>
                    </li>
                    <li>
                        <a href="#contact" class="text-gray-400 hover:text-white transition-colors flex items-center group">
                            <svg class="w-4 h-4 mr-2 rtl:mr-0 rtl:ml-2 text-rabyanah-blue-500 opacity-0 group-hover:opacity-100 transition-opacity" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                            {{ __('Contact Us') }}
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Product Categories -->
            <div class="lg:col-span-3">
                <h3 class="text-white font-bold text-lg mb-6 relative">
                    {{ __('Product Categories') }}
                    <span class="absolute bottom-0 left-0 w-8 h-0.5 bg-rabyanah-red-500 -mb-2"></span>
                </h3>
                <ul class="space-y-4 mt-8">
                    <li>
                        <a href="#" class="text-gray-400 hover:text-white transition-colors flex items-center group">
                            <svg class="w-4 h-4 mr-2 rtl:mr-0 rtl:ml-2 text-rabyanah-blue-500 opacity-0 group-hover:opacity-100 transition-opacity" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                            {{ __('Dairy Products') }}
                        </a>
                    </li>
                    <li>
                        <a href="#" class="text-gray-400 hover:text-white transition-colors flex items-center group">
                            <svg class="w-4 h-4 mr-2 rtl:mr-0 rtl:ml-2 text-rabyanah-blue-500 opacity-0 group-hover:opacity-100 transition-opacity" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                            {{ __('Grains & Cereals') }}
                        </a>
                    </li>
                    <li>
                        <a href="#" class="text-gray-400 hover:text-white transition-colors flex items-center group">
                            <svg class="w-4 h-4 mr-2 rtl:mr-0 rtl:ml-2 text-rabyanah-blue-500 opacity-0 group-hover:opacity-100 transition-opacity" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                            {{ __('Canned Foods') }}
                        </a>
                    </li>
                    <li>
                        <a href="#" class="text-gray-400 hover:text-white transition-colors flex items-center group">
                            <svg class="w-4 h-4 mr-2 rtl:mr-0 rtl:ml-2 text-rabyanah-blue-500 opacity-0 group-hover:opacity-100 transition-opacity" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                            {{ __('Beverages') }}
                        </a>
                    </li>
                    <li>
                        <a href="#" class="text-gray-400 hover:text-white transition-colors flex items-center group">
                            <svg class="w-4 h-4 mr-2 rtl:mr-0 rtl:ml-2 text-rabyanah-blue-500 opacity-0 group-hover:opacity-100 transition-opacity" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                            {{ __('Snacks & Confectionery') }}
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Contact Info -->
            <div class="lg:col-span-3">
                <h3 class="text-white font-bold text-lg mb-6 relative">
                    {{ __('Contact Info') }}
                    <span class="absolute bottom-0 left-0 w-8 h-0.5 bg-rabyanah-red-500 -mb-2"></span>
                </h3>
                <ul class="space-y-5 mt-8">
                    <li class="flex items-start space-x-4 rtl:space-x-reverse">
                        <div class="w-10 h-10 bg-rabyanah-blue-600/20 rounded-xl flex items-center justify-center flex-shrink-0">
                            <svg class="w-5 h-5 text-rabyanah-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                        </div>
                        <div>
                            <p class="text-gray-300">{{ __('123 Business District') }}</p>
                            <p class="text-gray-400">{{ __('Dubai, UAE') }}</p>
                        </div>
                    </li>
                    <li class="flex items-start space-x-4 rtl:space-x-reverse">
                        <div class="w-10 h-10 bg-rabyanah-red-600/20 rounded-xl flex items-center justify-center flex-shrink-0">
                            <svg class="w-5 h-5 text-rabyanah-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                            </svg>
                        </div>
                        <div>
                            <p class="text-gray-300">+971 4 123 4567</p>
                            <p class="text-gray-400 text-sm">{{ __('Mon-Fri: 9AM - 6PM') }}</p>
                        </div>
                    </li>
                    <li class="flex items-start space-x-4 rtl:space-x-reverse">
                        <div class="w-10 h-10 bg-rabyanah-blue-600/20 rounded-xl flex items-center justify-center flex-shrink-0">
                            <svg class="w-5 h-5 text-rabyanah-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                        </div>
                        <div>
                            <p class="text-gray-300">info@rabyanah.com</p>
                            <p class="text-gray-400 text-sm">{{ __('We reply within 24 hours') }}</p>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Bottom Bar -->
    <div class="relative border-t border-white/10">
        <div class="container mx-auto px-4 lg:px-8 py-6">
            <div class="flex flex-col md:flex-row justify-between items-center space-y-4 md:space-y-0">
                <p class="text-gray-500 text-sm">
                    &copy; {{ date('Y') }} Rabyanah. {{ __('All rights reserved.') }}
                </p>
                <div class="flex items-center space-x-6 rtl:space-x-reverse text-sm">
                    <a href="#" class="text-gray-500 hover:text-white transition-colors">{{ __('Privacy Policy') }}</a>
                    <span class="text-gray-700">|</span>
                    <a href="#" class="text-gray-500 hover:text-white transition-colors">{{ __('Terms of Service') }}</a>
                    <span class="text-gray-700">|</span>
                    <a href="#" class="text-gray-500 hover:text-white transition-colors">{{ __('Cookie Policy') }}</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Scroll to Top Button -->
    <a href="#home" class="fixed bottom-8 right-8 rtl:right-auto rtl:left-8 w-12 h-12 bg-rabyanah-blue-600 text-white rounded-xl flex items-center justify-center shadow-lg shadow-rabyanah-blue-600/30 hover:bg-rabyanah-blue-700 transition-all duration-300 hover:-translate-y-1 z-50">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"/>
        </svg>
    </a>
</footer>
