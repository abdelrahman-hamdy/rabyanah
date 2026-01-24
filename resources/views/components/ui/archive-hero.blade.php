@props([
    'label' => '',
    'title' => '',
    'subtitle' => '',
    'breadcrumbs' => [],
])

{{-- Hero section with proper spacing for fixed navbar (h-24 = 96px) --}}
<section class="relative overflow-hidden pb-16 md:pb-24" style="padding-top: clamp(160px, 20vw, 220px);">
    <!-- Gradient Background - Same warm beige as home page -->
    <div class="absolute inset-0 bg-gradient-to-b from-amber-50/80 via-orange-50/40 to-white"></div>

    <!-- Animated Background Elements -->
    <div class="absolute inset-0 overflow-hidden">
        <!-- Gradient Orbs - Very subtle beige with floating animation -->
        <div class="absolute top-0 left-0 w-[600px] h-[600px] bg-amber-100/30 rounded-full blur-3xl -translate-x-1/2 -translate-y-1/2 animate-float-slow"></div>
        <div class="absolute bottom-0 right-0 w-[500px] h-[500px] bg-orange-100/20 rounded-full blur-3xl translate-x-1/3 translate-y-1/3 animate-float-reverse"></div>
        <div class="absolute top-1/2 left-1/2 w-[300px] h-[300px] bg-amber-50/40 rounded-full blur-2xl -translate-x-1/2 -translate-y-1/2 animate-pulse-slow"></div>

        <!-- Subtle Grid Pattern -->
        <div class="absolute inset-0 opacity-[0.02]" style="background-image: url('data:image/svg+xml,%3Csvg width=\'60\' height=\'60\' viewBox=\'0 0 60 60\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cg fill=\'none\' fill-rule=\'evenodd\'%3E%3Cg fill=\'%23000000\' fill-opacity=\'1\'%3E%3Cpath d=\'M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z\'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>
    </div>

    <div class="container mx-auto px-4 lg:px-8 relative">
        <!-- Breadcrumbs -->
        @if(count($breadcrumbs) > 0)
        <nav class="flex items-center justify-center space-x-2 rtl:space-x-reverse text-sm mb-8">
            <a href="{{ route('home') }}" class="text-gray-500 hover:text-rabyanah-blue-600 transition-colors">
                {{ __('Home') }}
            </a>
            @foreach($breadcrumbs as $crumb)
            <svg class="w-4 h-4 text-gray-400 rtl:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
            </svg>
            @if(isset($crumb['url']))
            <a href="{{ $crumb['url'] }}" class="text-gray-500 hover:text-rabyanah-blue-600 transition-colors">
                {{ $crumb['label'] }}
            </a>
            @else
            <span class="text-gray-700 font-medium">{{ $crumb['label'] }}</span>
            @endif
            @endforeach
        </nav>
        @endif

        <!-- Section Header -->
        <div class="text-center max-w-3xl mx-auto">
            @if($label)
            <div class="flex items-center justify-center space-x-3 rtl:space-x-reverse mb-6">
                <div class="w-12 h-[2px] bg-rabyanah-red-500"></div>
                <span class="text-rabyanah-red-600 font-semibold tracking-wide uppercase text-sm">
                    {{ $label }}
                </span>
                <div class="w-12 h-[2px] bg-rabyanah-red-500"></div>
            </div>
            @endif

            <h1 class="text-3xl md:text-4xl lg:text-5xl font-bold font-playfair text-gray-900 leading-tight mb-4">
                {!! $title !!}
            </h1>

            @if($subtitle)
            <p class="text-lg text-gray-600 leading-relaxed">
                {{ $subtitle }}
            </p>
            @endif
        </div>

        <!-- Slot for additional content (like category grid) -->
        {{ $slot }}
    </div>
</section>
