<x-layout.app :title="__('About Us') . ' - Rabyanah'">
    {{-- Hero Section with Archive Hero Styling --}}
    <section class="relative overflow-hidden" style="padding-top: clamp(160px, 20vw, 220px);">
        {{-- Gradient Background - Same warm beige as archive hero --}}
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
                <span class="text-gray-700 font-medium">{{ __('About Us') }}</span>
            </nav>

            {{-- Section Header --}}
            <div class="text-center max-w-3xl mx-auto pb-16 md:pb-24">
                <div class="flex items-center justify-center space-x-3 rtl:space-x-reverse mb-6">
                    <div class="w-12 h-[2px] bg-rabyanah-red-500"></div>
                    <span class="text-rabyanah-red-600 font-semibold tracking-wide uppercase text-sm">
                        {{ __('Who We Are') }}
                    </span>
                    <div class="w-12 h-[2px] bg-rabyanah-red-500"></div>
                </div>

                <h1 class="text-3xl md:text-4xl lg:text-5xl font-bold font-playfair text-gray-900 leading-tight mb-4">
                    {{ __('About Rabyanah') }}
                </h1>

                <p class="text-lg text-gray-600 leading-relaxed">
                    {{ __('A leading global food trade company committed to delivering premium quality products to markets worldwide.') }}
                </p>
            </div>
        </div>
    </section>

    {{-- Cover Image Section --}}
    @if($coverImage)
    <section class="relative -mt-8">
        <div class="container mx-auto px-4 lg:px-8">
            <div class="relative rounded-2xl overflow-hidden shadow-xl">
                <img src="{{ Storage::url($coverImage) }}"
                     alt="{{ __('About Rabyanah') }}"
                     class="w-full h-auto">
                <div class="absolute inset-0 bg-gradient-to-t from-black/20 via-transparent to-transparent"></div>
            </div>
        </div>
    </section>
    @endif

    {{-- Main Content Section --}}
    @if($content)
    <section class="py-16 lg:py-24 bg-white">
        <div class="container mx-auto px-4 lg:px-8">
            <div class="max-w-4xl mx-auto">
                <div class="about-content">
                    {!! $content !!}
                </div>
            </div>
        </div>
    </section>

    <style>
        .about-content {
            font-size: 1.125rem;
            line-height: 1.75;
            color: #4b5563;
        }
        .about-content h1 {
            font-size: 2.25rem;
            font-weight: 700;
            color: #111827;
            font-family: 'Playfair Display', serif;
            margin-top: 2rem;
            margin-bottom: 1.5rem;
        }
        .about-content h2 {
            font-size: 1.875rem;
            font-weight: 700;
            color: #111827;
            font-family: 'Playfair Display', serif;
            margin-top: 2.5rem;
            margin-bottom: 1.25rem;
            padding-bottom: 0.75rem;
            border-bottom: 1px solid #e5e7eb;
        }
        .about-content h2:first-child {
            margin-top: 0;
        }
        .about-content h3 {
            font-size: 1.5rem;
            font-weight: 700;
            color: #111827;
            font-family: 'Playfair Display', serif;
            margin-top: 2rem;
            margin-bottom: 1rem;
        }
        .about-content h4 {
            font-size: 1.25rem;
            font-weight: 700;
            color: #111827;
            margin-top: 1.5rem;
            margin-bottom: 0.75rem;
        }
        .about-content h5, .about-content h6 {
            font-size: 1.125rem;
            font-weight: 600;
            color: #374151;
            margin-top: 1.25rem;
            margin-bottom: 0.5rem;
        }
        .about-content p {
            margin-bottom: 1rem;
            color: #4b5563;
            line-height: 1.75;
        }
        .about-content a {
            color: #2563eb;
            font-weight: 500;
            text-decoration: none;
            transition: color 0.2s;
        }
        .about-content a:hover {
            text-decoration: underline;
        }
        .about-content strong {
            font-weight: 600;
            color: #111827;
        }
        .about-content em {
            font-style: italic;
            color: #374151;
        }
        .about-content u {
            text-decoration: underline;
            text-decoration-color: #9ca3af;
            text-underline-offset: 2px;
        }
        .about-content ul {
            list-style-type: disc;
            padding-left: 1.5rem;
            margin: 1rem 0;
        }
        .about-content ol {
            list-style-type: decimal;
            padding-left: 1.5rem;
            margin: 1rem 0;
        }
        .about-content li {
            margin-bottom: 0.5rem;
            color: #4b5563;
        }
        .about-content li p {
            margin-bottom: 0;
        }
        .about-content li::marker {
            color: #2563eb;
        }
        .about-content blockquote {
            border-left: 4px solid #2563eb;
            background-color: #f9fafb;
            padding: 1rem 1.5rem;
            margin: 1.5rem 0;
            border-radius: 0 0.5rem 0.5rem 0;
            font-style: italic;
            color: #374151;
        }
        .about-content code {
            background-color: #f3f4f6;
            color: #dc2626;
            padding: 0.125rem 0.375rem;
            border-radius: 0.25rem;
            font-size: 0.875rem;
            font-family: monospace;
        }
        .about-content pre {
            background-color: #111827;
            color: #f3f4f6;
            padding: 1rem;
            border-radius: 0.5rem;
            overflow-x: auto;
            margin: 1.5rem 0;
        }
        .about-content pre code {
            background: none;
            color: inherit;
            padding: 0;
        }
        .about-content hr {
            border: none;
            border-top: 1px solid #e5e7eb;
            margin: 2rem 0;
        }
        .about-content table {
            width: 100%;
            border-collapse: collapse;
            margin: 1.5rem 0;
        }
        .about-content th {
            background-color: #f3f4f6;
            color: #111827;
            font-weight: 600;
            padding: 0.75rem 1rem;
            text-align: left;
            border: 1px solid #e5e7eb;
        }
        .about-content td {
            padding: 0.75rem 1rem;
            border: 1px solid #e5e7eb;
            color: #4b5563;
        }
        .about-content img {
            border-radius: 0.5rem;
            box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1);
            margin: 1.5rem 0;
            max-width: 100%;
            height: auto;
        }
        .about-content figure {
            margin: 1.5rem 0;
        }
        .about-content figcaption {
            text-align: center;
            font-size: 0.875rem;
            color: #6b7280;
            margin-top: 0.5rem;
        }
        .about-content s, .about-content del {
            text-decoration: line-through;
            color: #9ca3af;
        }
        .about-content mark {
            background-color: #fef08a;
            padding: 0.125rem 0.25rem;
            border-radius: 0.125rem;
        }
        .about-content sub {
            font-size: 0.75rem;
            vertical-align: sub;
        }
        .about-content sup {
            font-size: 0.75rem;
            vertical-align: super;
        }
    </style>
    @endif

    {{-- Mission & Vision Section --}}
    @if($mission || $vision)
    <section class="py-16 lg:py-24 bg-gradient-to-b from-amber-50/60 via-orange-50/30 to-white">
        <div class="container mx-auto px-4 lg:px-8">
            {{-- Section Header --}}
            <div class="text-center max-w-3xl mx-auto mb-16">
                <div class="flex items-center justify-center space-x-3 rtl:space-x-reverse mb-4">
                    <div class="w-12 h-[2px] bg-rabyanah-blue-500"></div>
                    <span class="text-rabyanah-blue-600 font-semibold tracking-wide uppercase text-sm">
                        {{ __('Our Purpose') }}
                    </span>
                    <div class="w-12 h-[2px] bg-rabyanah-blue-500"></div>
                </div>
                <h2 class="text-3xl lg:text-4xl font-bold font-playfair text-gray-900">
                    {{ __('Mission & Vision') }}
                </h2>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-12 max-w-5xl mx-auto">
                {{-- Mission Card --}}
                @if($mission)
                <div class="group bg-white rounded-2xl p-8 lg:p-10 shadow-lg hover:shadow-xl transition-all duration-300 border border-gray-100">
                    <div class="flex items-start gap-8">
                        <div class="flex-shrink-0">
                            <svg class="w-10 h-10 text-rabyanah-blue-600 group-hover:scale-110 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold font-playfair text-gray-900 mb-4">{{ __('Our Mission') }}</h3>
                            <p class="text-gray-600 leading-relaxed">{{ $mission }}</p>
                        </div>
                    </div>
                </div>
                @endif

                {{-- Vision Card --}}
                @if($vision)
                <div class="group bg-white rounded-2xl p-8 lg:p-10 shadow-lg hover:shadow-xl transition-all duration-300 border border-gray-100">
                    <div class="flex items-start gap-8">
                        <div class="flex-shrink-0">
                            <svg class="w-10 h-10 text-rabyanah-red-600 group-hover:scale-110 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold font-playfair text-gray-900 mb-4">{{ __('Our Vision') }}</h3>
                            <p class="text-gray-600 leading-relaxed">{{ $vision }}</p>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </section>
    @endif
</x-layout.app>
