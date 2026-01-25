<x-layout.app :title="$product->localized_name . ' - Rabyanah'">
    <!-- Breadcrumbs Section with warm background -->
    <section class="relative overflow-hidden" style="padding-top: clamp(140px, 18vw, 180px); padding-bottom: 40px;">
        <!-- Gradient Background - Same warm beige as home page -->
        <div class="absolute inset-0 bg-gradient-to-b from-amber-50/80 via-orange-50/40 to-white"></div>

        <!-- Animated Background Elements -->
        <div class="absolute inset-0 overflow-hidden">
            <div class="absolute top-0 left-0 w-[400px] h-[400px] bg-amber-100/30 rounded-full blur-3xl -translate-x-1/2 -translate-y-1/2"></div>
            <div class="absolute top-0 right-0 w-[300px] h-[300px] bg-orange-100/20 rounded-full blur-3xl translate-x-1/3 -translate-y-1/2"></div>
        </div>

        <div class="container mx-auto px-4 lg:px-8 relative">
            <nav class="flex items-center space-x-2 rtl:space-x-reverse text-sm">
                <a href="{{ route('home') }}" class="text-gray-500 hover:text-rabyanah-blue-600 transition-colors">
                    {{ __('Home') }}
                </a>
                <svg class="w-4 h-4 text-gray-400 rtl:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
                <a href="{{ route('products.index') }}" class="text-gray-500 hover:text-rabyanah-blue-600 transition-colors">
                    {{ __('Products') }}
                </a>
                @if($product->category)
                <svg class="w-4 h-4 text-gray-400 rtl:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
                <a href="{{ route('categories.show', $product->category->slug) }}" class="text-gray-500 hover:text-rabyanah-blue-600 transition-colors">
                    {{ $product->category->localized_name }}
                </a>
                @endif
                <svg class="w-4 h-4 text-gray-400 rtl:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
                <span class="text-gray-700 font-medium">{{ $product->localized_name }}</span>
            </nav>
        </div>
    </section>

    <!-- Product Details -->
    <section style="background-color: #ffffff; padding-top: 60px; padding-bottom: 80px;">
        <div class="container mx-auto px-4 lg:px-8">
            <div class="grid lg:grid-cols-2 gap-10 lg:gap-16">
                <!-- Product Images Gallery -->
                @php
                    $galleryImages = $product->gallery_urls;
                @endphp
                <div class="product-gallery-wrapper w-full max-w-full overflow-hidden">
                    @if(count($galleryImages) > 0)
                        <!-- Main Gallery Swiper -->
                        <div class="relative w-full max-w-full">
                            <div class="swiper product-gallery-main aspect-square w-full max-w-full overflow-hidden rounded-2xl">
                                <div class="swiper-wrapper">
                                    @foreach($galleryImages as $index => $image)
                                    <div class="swiper-slide">
                                        <a href="{{ $image }}"
                                           class="product-lightbox-trigger block w-full h-full"
                                           data-gallery="product-gallery"
                                           data-glightbox="title: {{ $product->localized_name }} - {{ __('Image') }} {{ $index + 1 }}">
                                            <img src="{{ $image }}"
                                                 alt="{{ $product->localized_name }} - {{ __('Image') }} {{ $index + 1 }}"
                                                 class="w-full h-full object-cover">
                                        </a>
                                    </div>
                                    @endforeach
                                </div>

                                <!-- Navigation Buttons -->
                                @if(count($galleryImages) > 1)
                                <button class="product-gallery-prev">
                                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                                    </svg>
                                </button>
                                <button class="product-gallery-next">
                                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                    </svg>
                                </button>
                                @endif
                            </div>

                            <!-- Expand/Lightbox Button -->
                            <button class="lightbox-trigger-btn" onclick="document.querySelector('.product-lightbox-trigger').click()">
                                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7"/>
                                </svg>
                            </button>
                        </div>

                        <!-- Thumbnails Swiper -->
                        @if(count($galleryImages) > 1)
                        <div class="swiper product-gallery-thumbs">
                            <div class="swiper-wrapper">
                                @foreach($galleryImages as $index => $image)
                                <div class="swiper-slide">
                                    <img src="{{ $image }}"
                                         alt="{{ $product->localized_name }} - {{ __('Thumbnail') }} {{ $index + 1 }}">
                                </div>
                                @endforeach
                            </div>
                        </div>
                        @endif
                    @else
                        <!-- Empty State -->
                        <div class="product-gallery-empty">
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                            </svg>
                        </div>
                    @endif
                </div>

                <!-- Product Info -->
                <div>
                    <!-- Category & Featured Badge -->
                    <div class="flex flex-wrap items-center gap-3 mb-6">
                        @if($product->category)
                        <a href="{{ route('categories.show', $product->category->slug) }}"
                           class="inline-flex items-center px-4 py-1.5 bg-rabyanah-blue-100 text-rabyanah-blue-700 rounded-full text-sm font-medium hover:bg-rabyanah-blue-200 transition-colors">
                            {{ $product->category->localized_name }}
                        </a>
                        @endif
                        @if($product->is_featured)
                        <span class="inline-flex items-center px-4 py-1.5 bg-rabyanah-red-100 text-rabyanah-red-700 rounded-full text-sm font-medium">
                            {{ __('Featured') }}
                        </span>
                        @endif
                    </div>

                    <!-- Name -->
                    <h1 class="text-3xl md:text-4xl font-bold font-playfair text-gray-900 mb-6">
                        {{ $product->localized_name }}
                    </h1>

                    <!-- Full Description -->
                    @if($product->localized_description)
                    <div class="mb-10">
                        <h2 class="text-xl font-semibold text-gray-900 mb-4">{{ __('Description') }}</h2>
                        <div class="prose prose-gray max-w-none text-gray-600 leading-relaxed">
                            {!! nl2br(e($product->localized_description)) !!}
                        </div>
                    </div>
                    @endif

                    <!-- Contact CTA -->
                    <div class="mt-8">
                        <button type="button"
                                onclick="openProductInquiryModal()"
                                class="cursor-pointer inline-flex items-center justify-center w-full sm:w-auto px-8 py-4 bg-rabyanah-blue-600 text-white font-semibold rounded-xl hover:bg-rabyanah-blue-700 transition-all duration-200 shadow-lg shadow-rabyanah-blue-600/20 hover:shadow-xl">
                            <svg class="w-5 h-5 mr-2 rtl:mr-0 rtl:ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                            </svg>
                            {{ __('Product Inquiry') }}
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Product Inquiry Modal -->
    <div id="productInquiryModal" class="fixed inset-0 z-[60] hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <!-- Backdrop -->
        <div id="modalBackdrop" class="fixed inset-0 bg-gray-900/70 backdrop-blur-sm transition-opacity duration-300 opacity-0" onclick="closeProductInquiryModal()"></div>

        <!-- Modal Panel -->
        <div class="fixed inset-0 z-10 overflow-y-auto" onclick="closeProductInquiryModal()">
            <div class="flex min-h-full items-center justify-center p-4">
                <div id="modalPanel" class="relative w-full transform overflow-hidden rounded-2xl bg-white shadow-2xl transition-all duration-300 ease-out opacity-0 scale-95 translate-y-4" style="max-width: 540px;" onclick="event.stopPropagation()">
                    <!-- Close Button -->
                    <button type="button"
                            onclick="closeProductInquiryModal()"
                            class="absolute top-4 right-4 rtl:right-auto rtl:left-4 z-10 rounded-full p-2 text-gray-400 hover:text-gray-600 hover:bg-gray-100 transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>

                    <!-- Modal Content -->
                    <div class="p-6 sm:p-8">
                        <!-- Header -->
                        <div class="flex items-center gap-4 mb-6">
                            <div class="w-12 h-12 bg-rabyanah-blue-100 rounded-xl flex items-center justify-center flex-shrink-0">
                                <svg class="w-6 h-6 text-rabyanah-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                                </svg>
                            </div>
                            <div class="text-right rtl:text-right ltr:text-left">
                                <h3 id="modal-title" class="text-xl font-bold text-gray-900">{{ __('Product Inquiry') }}</h3>
                                <p class="text-gray-500 text-sm">{{ $product->localized_name }}</p>
                            </div>
                        </div>

                        <!-- Success Message (hidden by default) -->
                        <div id="inquirySuccessMessage" class="hidden bg-green-50 border border-green-200 text-green-700 px-5 py-4 rounded-xl mb-6">
                            <div class="flex items-center gap-3">
                                <svg class="w-5 h-5 text-green-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                <span>{{ __('Thank you for your inquiry! We will get back to you soon.') }}</span>
                            </div>
                        </div>

                        <!-- Form -->
                        <form id="productInquiryForm" class="space-y-5">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <input type="hidden" name="type" value="product_inquiry">
                            <input type="hidden" name="subject" value="{{ __('Product Inquiry') }}: {{ $product->name }}">

                            <div class="grid sm:grid-cols-2 gap-4">
                                <div>
                                    <label for="inquiry_name" class="block text-sm font-semibold text-gray-700 mb-2">
                                        {{ __('Full Name') }} <span class="text-rabyanah-red-500">*</span>
                                    </label>
                                    <input type="text"
                                           id="inquiry_name"
                                           name="name"
                                           required
                                           class="form-input"
                                           placeholder="{{ __('Your name') }}">
                                    <p class="inquiry-error hidden mt-1 text-sm text-red-500" data-field="name"></p>
                                </div>

                                <div>
                                    <label for="inquiry_email" class="block text-sm font-semibold text-gray-700 mb-2">
                                        {{ __('Email Address') }} <span class="text-rabyanah-red-500">*</span>
                                    </label>
                                    <input type="email"
                                           id="inquiry_email"
                                           name="email"
                                           required
                                           class="form-input"
                                           placeholder="email@example.com">
                                    <p class="inquiry-error hidden mt-1 text-sm text-red-500" data-field="email"></p>
                                </div>
                            </div>

                            <div>
                                <label for="inquiry_phone" class="block text-sm font-semibold text-gray-700 mb-2">
                                    {{ __('Phone Number') }}
                                </label>
                                <input type="tel"
                                       id="inquiry_phone"
                                       name="phone"
                                       class="form-input"
                                       placeholder="+971 50 123 4567">
                            </div>

                            <div>
                                <label for="inquiry_message" class="block text-sm font-semibold text-gray-700 mb-2">
                                    {{ __('Your Message') }} <span class="text-rabyanah-red-500">*</span>
                                </label>
                                <textarea id="inquiry_message"
                                          name="message"
                                          required
                                          rows="4"
                                          class="form-input resize-none"
                                          placeholder="{{ __('Tell us about your inquiry regarding this product...') }}"></textarea>
                                <p class="inquiry-error hidden mt-1 text-sm text-red-500" data-field="message"></p>
                            </div>

                            <button type="submit"
                                    id="inquirySubmitBtn"
                                    class="btn-accent w-full group">
                                <span id="inquirySubmitText">{{ __('Send Inquiry') }}</span>
                                <svg id="inquirySubmitIcon" class="w-5 h-5 ml-2 rtl:ml-0 rtl:mr-2 rtl:rotate-180 group-hover:translate-x-1 rtl:group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                                </svg>
                                <svg id="inquiryLoadingIcon" class="hidden w-5 h-5 ml-2 rtl:ml-0 rtl:mr-2 animate-spin" fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                </svg>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        function openProductInquiryModal() {
            const modal = document.getElementById('productInquiryModal');
            const backdrop = document.getElementById('modalBackdrop');
            const panel = document.getElementById('modalPanel');

            // Show modal container
            modal.classList.remove('hidden');
            document.body.style.overflow = 'hidden';

            // Trigger animation after a tiny delay (for CSS transition to work)
            requestAnimationFrame(() => {
                backdrop.classList.remove('opacity-0');
                backdrop.classList.add('opacity-100');
                panel.classList.remove('opacity-0', 'scale-95', 'translate-y-4');
                panel.classList.add('opacity-100', 'scale-100', 'translate-y-0');
            });

            // Reset form and hide success message
            document.getElementById('productInquiryForm').reset();
            document.getElementById('inquirySuccessMessage').classList.add('hidden');
            document.getElementById('productInquiryForm').classList.remove('hidden');

            // Clear any previous errors
            document.querySelectorAll('.inquiry-error').forEach(el => {
                el.classList.add('hidden');
                el.textContent = '';
            });
        }

        function closeProductInquiryModal() {
            const modal = document.getElementById('productInquiryModal');
            const backdrop = document.getElementById('modalBackdrop');
            const panel = document.getElementById('modalPanel');

            // Animate out
            backdrop.classList.remove('opacity-100');
            backdrop.classList.add('opacity-0');
            panel.classList.remove('opacity-100', 'scale-100', 'translate-y-0');
            panel.classList.add('opacity-0', 'scale-95', 'translate-y-4');

            // Hide modal after animation completes
            setTimeout(() => {
                modal.classList.add('hidden');
                document.body.style.overflow = '';
            }, 300);
        }

        // Close modal on Escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && !document.getElementById('productInquiryModal').classList.contains('hidden')) {
                closeProductInquiryModal();
            }
        });

        // Handle form submission
        document.getElementById('productInquiryForm').addEventListener('submit', async function(e) {
            e.preventDefault();

            const form = this;
            const submitBtn = document.getElementById('inquirySubmitBtn');
            const submitText = document.getElementById('inquirySubmitText');
            const submitIcon = document.getElementById('inquirySubmitIcon');
            const loadingIcon = document.getElementById('inquiryLoadingIcon');
            const successMessage = document.getElementById('inquirySuccessMessage');

            // Clear previous errors
            document.querySelectorAll('.inquiry-error').forEach(el => {
                el.classList.add('hidden');
                el.textContent = '';
            });

            // Show loading state
            submitBtn.disabled = true;
            submitText.textContent = '{{ __("Sending...") }}';
            submitIcon.classList.add('hidden');
            loadingIcon.classList.remove('hidden');

            try {
                const formData = new FormData(form);
                const response = await fetch('{{ route("contact.store") }}', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                        'Accept': 'application/json',
                        'X-Requested-With': 'XMLHttpRequest'
                    },
                    body: formData
                });

                const data = await response.json();

                if (response.ok && data.success) {
                    // Show success message
                    form.classList.add('hidden');
                    successMessage.classList.remove('hidden');

                    // Close modal after delay
                    setTimeout(() => {
                        closeProductInquiryModal();
                        // Reset form state after closing
                        setTimeout(() => {
                            form.classList.remove('hidden');
                            successMessage.classList.add('hidden');
                            form.reset();
                        }, 300);
                    }, 2500);
                } else if (data.errors) {
                    // Show validation errors
                    Object.keys(data.errors).forEach(field => {
                        const errorEl = document.querySelector(`.inquiry-error[data-field="${field}"]`);
                        if (errorEl) {
                            errorEl.textContent = data.errors[field][0];
                            errorEl.classList.remove('hidden');
                        }
                    });
                }
            } catch (error) {
                console.error('Error:', error);
                alert('{{ __("An error occurred. Please try again.") }}');
            } finally {
                // Reset button state
                submitBtn.disabled = false;
                submitText.textContent = '{{ __("Send Inquiry") }}';
                submitIcon.classList.remove('hidden');
                loadingIcon.classList.add('hidden');
            }
        });
    </script>
    @endpush

    <!-- Related Products -->
    @if($relatedProducts->count() > 0)
    <section style="background-color: #f9fafb; padding-top: 80px; padding-bottom: 80px;">
        <div class="container mx-auto px-4 lg:px-8">
            <!-- Section Header -->
            <div class="text-center" style="margin-bottom: 50px;">
                <div class="flex items-center justify-center space-x-3 rtl:space-x-reverse mb-4">
                    <div class="w-10 h-[2px] bg-rabyanah-red-500"></div>
                    <span class="text-rabyanah-red-600 font-semibold tracking-wide uppercase text-sm">
                        {{ __('More Products') }}
                    </span>
                    <div class="w-10 h-[2px] bg-rabyanah-red-500"></div>
                </div>
                <h2 class="text-2xl md:text-3xl font-bold font-playfair text-gray-900">
                    {{ __('Related Products') }}
                </h2>
            </div>

            <!-- Products Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6 lg:gap-8">
                @foreach($relatedProducts as $relatedProduct)
                <x-ui.product-card :product="$relatedProduct" />
                @endforeach
            </div>

            <!-- View All in Category -->
            @if($product->category)
            <div class="text-center mt-12">
                <a href="{{ route('categories.show', $product->category->slug) }}"
                   class="inline-flex items-center text-rabyanah-blue-600 hover:text-rabyanah-blue-700 font-semibold group transition-colors">
                    {{ __('View All in') }} {{ $product->category->localized_name }}
                    <svg class="w-5 h-5 ml-2 rtl:ml-0 rtl:mr-2 transform group-hover:translate-x-1 rtl:group-hover:-translate-x-1 rtl:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                    </svg>
                </a>
            </div>
            @endif
        </div>
    </section>
    @endif
</x-layout.app>
