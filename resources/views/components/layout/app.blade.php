@props([
    'title' => 'Rabyanah - Global Food Trade',
    'description' => null,
    'image' => null,
    'type' => 'website',
    'canonical' => null,
    'noindex' => false,
    'schemas' => [],
])

@php
    $siteFavicon = \App\Models\SiteSetting::get('site_favicon');
    $faviconUrl = $siteFavicon ? Storage::url($siteFavicon) : asset('favicon.svg');
    $faviconType = $siteFavicon ? 'image/png' : 'image/svg+xml';

    // Get organization schema for all pages
    $seoService = app(\App\Services\SeoService::class);
    $orgSchema = $seoService->getOrganizationSchema();
    $allSchemas = array_merge([$orgSchema], $schemas);
@endphp

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}" class="overscroll-none">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title }}</title>

    {{-- SEO Meta Tags --}}
    <x-seo.meta-tags
        :title="$title"
        :description="$description"
        :image="$image"
        :type="$type"
        :canonical="$canonical"
        :noindex="$noindex"
        :schemas="$allSchemas"
    />

    <!-- Favicon -->
    <link rel="icon" type="{{ $faviconType }}" href="{{ $faviconUrl }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Montserrat:wght@500;600;700&family=Playfair+Display:wght@600;700&display=swap" rel="stylesheet">

    <!-- Styles & Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Livewire Styles -->
    @livewireStyles
</head>
<body class="font-sans antialiased bg-white text-gray-900 overscroll-none">
    <!-- Navbar -->
    <x-layout.navbar />

    <!-- Main Content -->
    <main>
        {{ $slot }}
    </main>

    <!-- Footer -->
    <x-layout.footer />

    @stack('scripts')

    <!-- Livewire Scripts (includes Alpine.js) -->
    @livewireScripts
</body>
</html>
