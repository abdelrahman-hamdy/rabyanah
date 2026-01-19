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
        <div class="text-center max-w-3xl mx-auto mb-16" data-animate>
            <div class="flex items-center justify-center space-x-3 rtl:space-x-reverse mb-6">
                <div class="w-12 h-[2px] bg-rabyanah-red-500"></div>
                <span class="text-rabyanah-red-400 font-semibold tracking-wide uppercase text-sm">
                    {{ __('Get In Touch') }}
                </span>
                <div class="w-12 h-[2px] bg-rabyanah-red-500"></div>
            </div>
            <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold font-playfair text-white leading-tight mb-4">
                {{ __("Let's Start a") }}
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-rabyanah-blue-400 to-white">{{ __('Conversation') }}</span>
            </h2>
            <p class="text-lg text-blue-100/70 leading-relaxed">
                {{ __('Ready to partner with us? We\'d love to hear from you. Send us a message and our team will respond within 24 hours.') }}
            </p>
        </div>

        <div class="grid lg:grid-cols-5 gap-8 lg:gap-12 items-start">
            <!-- Contact Info Cards -->
            <div class="lg:col-span-2 space-y-6" data-animate>
                <!-- Contact Card 1 - Location -->
                <div class="group bg-white/5 backdrop-blur-xl rounded-2xl p-6 border border-white/10 hover:bg-white/10 transition-all duration-500">
                    <div class="flex items-start space-x-4 rtl:space-x-reverse">
                        <div class="w-14 h-14 bg-gradient-to-br from-rabyanah-blue-500 to-rabyanah-blue-700 rounded-2xl flex items-center justify-center flex-shrink-0 shadow-lg shadow-rabyanah-blue-600/25 group-hover:scale-110 transition-transform duration-500">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                        </div>
                        <div>
                            <h4 class="font-bold text-white text-lg mb-1">{{ __('Our Location') }}</h4>
                            <p class="text-blue-100/70 leading-relaxed">{{ __('123 Business District, Dubai, UAE') }}</p>
                        </div>
                    </div>
                </div>

                <!-- Contact Card 2 - Phone -->
                <div class="group bg-white/5 backdrop-blur-xl rounded-2xl p-6 border border-white/10 hover:bg-white/10 transition-all duration-500">
                    <div class="flex items-start space-x-4 rtl:space-x-reverse">
                        <div class="w-14 h-14 bg-gradient-to-br from-rabyanah-red-500 to-rabyanah-red-700 rounded-2xl flex items-center justify-center flex-shrink-0 shadow-lg shadow-rabyanah-red-600/25 group-hover:scale-110 transition-transform duration-500">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                            </svg>
                        </div>
                        <div>
                            <h4 class="font-bold text-white text-lg mb-1">{{ __('Call Us') }}</h4>
                            <p class="text-blue-100/70 leading-relaxed">+971 4 123 4567</p>
                            <p class="text-blue-100/50 text-sm mt-1">{{ __('Mon-Fri: 9AM - 6PM') }}</p>
                        </div>
                    </div>
                </div>

                <!-- Contact Card 3 - Email -->
                <div class="group bg-white/5 backdrop-blur-xl rounded-2xl p-6 border border-white/10 hover:bg-white/10 transition-all duration-500">
                    <div class="flex items-start space-x-4 rtl:space-x-reverse">
                        <div class="w-14 h-14 bg-gradient-to-br from-rabyanah-blue-500 to-rabyanah-blue-700 rounded-2xl flex items-center justify-center flex-shrink-0 shadow-lg shadow-rabyanah-blue-600/25 group-hover:scale-110 transition-transform duration-500">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                        </div>
                        <div>
                            <h4 class="font-bold text-white text-lg mb-1">{{ __('Email Us') }}</h4>
                            <p class="text-blue-100/70 leading-relaxed">info@rabyanah.com</p>
                            <p class="text-blue-100/50 text-sm mt-1">{{ __('We reply within 24 hours') }}</p>
                        </div>
                    </div>
                </div>

                <!-- Social Media -->
                <div class="pt-4">
                    <p class="text-white/50 text-sm font-medium mb-4">{{ __('Follow Us') }}</p>
                    <div class="flex space-x-3 rtl:space-x-reverse">
                        <a href="#" class="w-12 h-12 bg-white/5 rounded-xl flex items-center justify-center text-white/60 hover:bg-rabyanah-blue-600 hover:text-white transition-all duration-300 border border-white/10">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/>
                            </svg>
                        </a>
                        <a href="#" class="w-12 h-12 bg-white/5 rounded-xl flex items-center justify-center text-white/60 hover:bg-rabyanah-blue-600 hover:text-white transition-all duration-300 border border-white/10">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                            </svg>
                        </a>
                        <a href="#" class="w-12 h-12 bg-white/5 rounded-xl flex items-center justify-center text-white/60 hover:bg-rabyanah-blue-600 hover:text-white transition-all duration-300 border border-white/10">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M4.98 3.5c0 1.381-1.11 2.5-2.48 2.5s-2.48-1.119-2.48-2.5c0-1.38 1.11-2.5 2.48-2.5s2.48 1.12 2.48 2.5zm.02 4.5h-5v16h5v-16zm7.982 0h-4.968v16h4.969v-8.399c0-4.67 6.029-5.052 6.029 0v8.399h4.988v-10.131c0-7.88-8.922-7.593-11.018-3.714v-2.155z"/>
                            </svg>
                        </a>
                        <a href="#" class="w-12 h-12 bg-white/5 rounded-xl flex items-center justify-center text-white/60 hover:bg-green-500 hover:text-white transition-all duration-300 border border-white/10">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Contact Form -->
            <div class="lg:col-span-3" data-animate>
                <div class="bg-white rounded-3xl p-8 lg:p-10 shadow-2xl shadow-black/20">
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
