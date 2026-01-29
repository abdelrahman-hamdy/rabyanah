<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Response;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Cache;

class SitemapController extends Controller
{
    public function index(): Response
    {
        $sitemap = Cache::remember('sitemap_index', 3600, function () {
            return $this->generateSitemapIndex();
        });

        return response($sitemap, 200, [
            'Content-Type' => 'application/xml',
        ]);
    }

    public function products(): Response
    {
        $sitemap = Cache::remember('sitemap_products', 3600, function () {
            return $this->generateProductsSitemap();
        });

        return response($sitemap, 200, [
            'Content-Type' => 'application/xml',
        ]);
    }

    public function categories(): Response
    {
        $sitemap = Cache::remember('sitemap_categories', 3600, function () {
            return $this->generateCategoriesSitemap();
        });

        return response($sitemap, 200, [
            'Content-Type' => 'application/xml',
        ]);
    }

    public function pages(): Response
    {
        $sitemap = Cache::remember('sitemap_pages', 3600, function () {
            return $this->generatePagesSitemap();
        });

        return response($sitemap, 200, [
            'Content-Type' => 'application/xml',
        ]);
    }

    private function generateSitemapIndex(): string
    {
        $baseUrl = config('app.url');

        $productLastMod = Product::active()->max('updated_at');
        $categoryLastMod = Category::active()->max('updated_at');

        $xml = '<?xml version="1.0" encoding="UTF-8"?>'."\n";
        $xml .= '<sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">'."\n";

        $xml .= '  <sitemap>'."\n";
        $xml .= "    <loc>{$baseUrl}/sitemap-pages.xml</loc>"."\n";
        $xml .= '    <lastmod>'.now()->toW3cString().'</lastmod>'."\n";
        $xml .= '  </sitemap>'."\n";

        $xml .= '  <sitemap>'."\n";
        $xml .= "    <loc>{$baseUrl}/sitemap-products.xml</loc>"."\n";
        $xml .= '    <lastmod>'.($productLastMod ? Carbon::parse($productLastMod)->toW3cString() : now()->toW3cString()).'</lastmod>'."\n";
        $xml .= '  </sitemap>'."\n";

        $xml .= '  <sitemap>'."\n";
        $xml .= "    <loc>{$baseUrl}/sitemap-categories.xml</loc>"."\n";
        $xml .= '    <lastmod>'.($categoryLastMod ? Carbon::parse($categoryLastMod)->toW3cString() : now()->toW3cString()).'</lastmod>'."\n";
        $xml .= '  </sitemap>'."\n";

        $xml .= '</sitemapindex>';

        return $xml;
    }

    private function generateProductsSitemap(): string
    {
        $baseUrl = config('app.url');
        $products = Product::active()->select(['slug', 'updated_at', 'gallery'])->get();

        $xml = '<?xml version="1.0" encoding="UTF-8"?>'."\n";
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" ';
        $xml .= 'xmlns:image="http://www.google.com/schemas/sitemap-image/1.1" ';
        $xml .= 'xmlns:xhtml="http://www.w3.org/1999/xhtml">'."\n";

        foreach ($products as $product) {
            $xml .= '  <url>'."\n";
            $xml .= "    <loc>{$baseUrl}/products/{$product->slug}</loc>"."\n";
            $xml .= '    <lastmod>'.$product->updated_at->toW3cString().'</lastmod>'."\n";
            $xml .= '    <changefreq>weekly</changefreq>'."\n";
            $xml .= '    <priority>0.8</priority>'."\n";
            $xml .= '    <xhtml:link rel="alternate" hreflang="en" href="'.$baseUrl.'/products/'.$product->slug.'"/>'."\n";
            $xml .= '    <xhtml:link rel="alternate" hreflang="ar" href="'.$baseUrl.'/products/'.$product->slug.'"/>'."\n";

            // Add product image if available
            if ($product->image_url) {
                $xml .= '    <image:image>'."\n";
                $xml .= '      <image:loc>'.htmlspecialchars($product->image_url).'</image:loc>'."\n";
                $xml .= '    </image:image>'."\n";
            }

            $xml .= '  </url>'."\n";
        }

        $xml .= '</urlset>';

        return $xml;
    }

    private function generateCategoriesSitemap(): string
    {
        $baseUrl = config('app.url');
        $categories = Category::active()->select(['slug', 'updated_at', 'image'])->get();

        $xml = '<?xml version="1.0" encoding="UTF-8"?>'."\n";
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" ';
        $xml .= 'xmlns:xhtml="http://www.w3.org/1999/xhtml">'."\n";

        foreach ($categories as $category) {
            $xml .= '  <url>'."\n";
            $xml .= "    <loc>{$baseUrl}/categories/{$category->slug}</loc>"."\n";
            $xml .= '    <lastmod>'.$category->updated_at->toW3cString().'</lastmod>'."\n";
            $xml .= '    <changefreq>weekly</changefreq>'."\n";
            $xml .= '    <priority>0.7</priority>'."\n";
            $xml .= '    <xhtml:link rel="alternate" hreflang="en" href="'.$baseUrl.'/categories/'.$category->slug.'"/>'."\n";
            $xml .= '    <xhtml:link rel="alternate" hreflang="ar" href="'.$baseUrl.'/categories/'.$category->slug.'"/>'."\n";
            $xml .= '  </url>'."\n";
        }

        $xml .= '</urlset>';

        return $xml;
    }

    private function generatePagesSitemap(): string
    {
        $baseUrl = config('app.url');

        $pages = [
            ['loc' => '', 'priority' => '1.0', 'changefreq' => 'daily'],
            ['loc' => '/products', 'priority' => '0.9', 'changefreq' => 'daily'],
            ['loc' => '/about', 'priority' => '0.6', 'changefreq' => 'monthly'],
            ['loc' => '/contact', 'priority' => '0.6', 'changefreq' => 'monthly'],
        ];

        $xml = '<?xml version="1.0" encoding="UTF-8"?>'."\n";
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" ';
        $xml .= 'xmlns:xhtml="http://www.w3.org/1999/xhtml">'."\n";

        foreach ($pages as $page) {
            $fullUrl = $baseUrl.$page['loc'];
            $xml .= '  <url>'."\n";
            $xml .= "    <loc>{$fullUrl}</loc>"."\n";
            $xml .= '    <lastmod>'.now()->toW3cString().'</lastmod>'."\n";
            $xml .= "    <changefreq>{$page['changefreq']}</changefreq>"."\n";
            $xml .= "    <priority>{$page['priority']}</priority>"."\n";
            $xml .= '    <xhtml:link rel="alternate" hreflang="en" href="'.$fullUrl.'"/>'."\n";
            $xml .= '    <xhtml:link rel="alternate" hreflang="ar" href="'.$fullUrl.'"/>'."\n";
            $xml .= '  </url>'."\n";
        }

        $xml .= '</urlset>';

        return $xml;
    }
}
