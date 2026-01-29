@props([
    'title' => null,
    'description' => null,
    'image' => null,
    'type' => 'website',
    'canonical' => null,
    'noindex' => false,
    'schemas' => [],
])

@php
    $seoService = app(\App\Services\SeoService::class);
    $defaults = $seoService->getDefaultMeta();

    $pageTitle = $title ?? $defaults['title'];
    $pageDescription = $description ?? $defaults['description'];
    $pageImage = $image ?? $defaults['image'];
    $pageType = $type ?? $defaults['type'];
    $pageCanonical = $canonical ?? url()->current();

    $siteName = \App\Models\SiteSetting::get('site_name', 'Rabyanah');
    $locale = app()->getLocale();
    $ogLocale = $locale === 'ar' ? 'ar_AE' : 'en_US';
    $alternateLocale = $locale === 'ar' ? 'en_US' : 'ar_AE';
@endphp

{{-- Basic Meta Tags --}}
<meta name="description" content="{{ $pageDescription }}">
@if($noindex)
<meta name="robots" content="noindex, nofollow">
@else
<meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1">
@endif

{{-- Canonical URL --}}
<link rel="canonical" href="{{ $pageCanonical }}">

{{-- Hreflang Tags for Multilingual --}}
<link rel="alternate" hreflang="{{ $locale }}" href="{{ $pageCanonical }}">
<link rel="alternate" hreflang="x-default" href="{{ $pageCanonical }}">

{{-- Open Graph Tags --}}
<meta property="og:type" content="{{ $pageType === 'product' ? 'product' : 'website' }}">
<meta property="og:title" content="{{ $pageTitle }}">
<meta property="og:description" content="{{ $pageDescription }}">
<meta property="og:image" content="{{ $pageImage }}">
<meta property="og:image:width" content="1200">
<meta property="og:image:height" content="630">
<meta property="og:url" content="{{ $pageCanonical }}">
<meta property="og:site_name" content="{{ $siteName }}">
<meta property="og:locale" content="{{ $ogLocale }}">
<meta property="og:locale:alternate" content="{{ $alternateLocale }}">

{{-- Twitter Card Tags --}}
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="{{ $pageTitle }}">
<meta name="twitter:description" content="{{ $pageDescription }}">
<meta name="twitter:image" content="{{ $pageImage }}">

{{-- JSON-LD Structured Data --}}
@foreach($schemas as $schema)
@if(!empty($schema))
<script type="application/ld+json">
{!! json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}
</script>
@endif
@endforeach
