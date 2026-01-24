<?php

namespace Database\Seeders;

use App\Models\SiteSetting;
use Illuminate\Database\Seeder;

class SiteSettingsSeeder extends Seeder
{
    public function run(): void
    {
        $settings = [
            // General - Branding & Admin
            [
                'key' => 'admin_email',
                'value' => 'admin@rabyanah.com',
                'group' => 'general',
            ],
            // General - Hero Section
            [
                'key' => 'hero_tagline',
                'value' => 'Global Food Excellence Since 1990',
                'group' => 'general',
            ],
            [
                'key' => 'hero_tagline_ar',
                'value' => 'التميز الغذائي العالمي منذ 1990',
                'group' => 'general',
            ],
            [
                'key' => 'hero_title_line1',
                'value' => 'Premium Food',
                'group' => 'general',
            ],
            [
                'key' => 'hero_title_line1_ar',
                'value' => 'غذاء فاخر',
                'group' => 'general',
            ],
            [
                'key' => 'hero_title_line2',
                'value' => 'Trade Partner',
                'group' => 'general',
            ],
            [
                'key' => 'hero_title_line2_ar',
                'value' => 'شريك التجارة',
                'group' => 'general',
            ],
            [
                'key' => 'hero_subtitle',
                'value' => "Connecting the world's finest food brands with markets across the globe. Quality, trust, and excellence in every partnership.",
                'group' => 'general',
            ],
            [
                'key' => 'hero_subtitle_ar',
                'value' => 'نربط أفضل العلامات التجارية الغذائية في العالم بالأسواق عبر الكرة الأرضية. الجودة والثقة والتميز في كل شراكة.',
                'group' => 'general',
            ],
            [
                'key' => 'hero_cta_primary',
                'value' => 'Explore Products',
                'group' => 'general',
            ],
            [
                'key' => 'hero_cta_primary_ar',
                'value' => 'استكشف المنتجات',
                'group' => 'general',
            ],
            [
                'key' => 'hero_cta_secondary',
                'value' => 'Partner With Us',
                'group' => 'general',
            ],
            [
                'key' => 'hero_cta_secondary_ar',
                'value' => 'كن شريكنا',
                'group' => 'general',
            ],

            // Contact Information
            [
                'key' => 'contact_phone',
                'value' => '+971 4 123 4567',
                'group' => 'contact',
            ],
            [
                'key' => 'contact_email',
                'value' => 'info@rabyanah.com',
                'group' => 'contact',
            ],
            [
                'key' => 'contact_address',
                'value' => '123 Business District',
                'group' => 'contact',
            ],
            [
                'key' => 'contact_city',
                'value' => 'Dubai, UAE',
                'group' => 'contact',
            ],
            [
                'key' => 'working_hours',
                'value' => 'Mon-Fri: 9AM - 6PM',
                'group' => 'contact',
            ],
            [
                'key' => 'google_maps_url',
                'value' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3608.5834762766396!2d55.2707!3d25.2048!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMjXCsDEyJzE3LjMiTiA1NcKwMTYnMTQuNSJF!5e0!3m2!1sen!2sae!4v1234567890',
                'group' => 'contact',
            ],

            // Social Media
            [
                'key' => 'social_twitter',
                'value' => '#',
                'group' => 'social',
            ],
            [
                'key' => 'social_instagram',
                'value' => '#',
                'group' => 'social',
            ],
            [
                'key' => 'social_linkedin',
                'value' => '#',
                'group' => 'social',
            ],
            [
                'key' => 'social_whatsapp',
                'value' => '#',
                'group' => 'social',
            ],

            // Company Info
            [
                'key' => 'company_description',
                'value' => 'A leading global food trade company committed to delivering premium quality products to markets worldwide. Four decades of excellence in food distribution.',
                'group' => 'company',
            ],
            [
                'key' => 'company_description_ar',
                'value' => 'شركة رائدة في تجارة المواد الغذائية العالمية ملتزمة بتقديم منتجات عالية الجودة للأسواق في جميع أنحاء العالم. أربعة عقود من التميز في توزيع المواد الغذائية.',
                'group' => 'company',
            ],

            // Stats (Hero Section)
            [
                'key' => 'stats_years_experience',
                'value' => '35',
                'group' => 'stats',
            ],
            [
                'key' => 'stats_brands_count',
                'value' => '50',
                'group' => 'stats',
            ],
            [
                'key' => 'stats_countries_count',
                'value' => '22',
                'group' => 'stats',
            ],

            // About Section
            [
                'key' => 'about_years_experience',
                'value' => '40',
                'group' => 'stats',
            ],
            [
                'key' => 'about_certification',
                'value' => 'ISO 22000',
                'group' => 'stats',
            ],

            // FAQ Section
            [
                'key' => 'faq_1_question',
                'value' => 'What products do you offer?',
                'group' => 'faq',
            ],
            [
                'key' => 'faq_1_question_ar',
                'value' => 'ما هي المنتجات التي تقدمونها؟',
                'group' => 'faq',
            ],
            [
                'key' => 'faq_1_answer',
                'value' => 'We offer a wide range of premium food products including dairy, beverages, snacks, frozen foods, and more from trusted global brands.',
                'group' => 'faq',
            ],
            [
                'key' => 'faq_1_answer_ar',
                'value' => 'نقدم مجموعة واسعة من المنتجات الغذائية الفاخرة بما في ذلك منتجات الألبان والمشروبات والوجبات الخفيفة والأطعمة المجمدة والمزيد من العلامات التجارية العالمية الموثوقة.',
                'group' => 'faq',
            ],
            [
                'key' => 'faq_2_question',
                'value' => 'Do you ship internationally?',
                'group' => 'faq',
            ],
            [
                'key' => 'faq_2_question_ar',
                'value' => 'هل تقومون بالشحن دولياً؟',
                'group' => 'faq',
            ],
            [
                'key' => 'faq_2_answer',
                'value' => 'Yes, we have an extensive distribution network spanning multiple countries. Contact us for specific shipping inquiries to your region.',
                'group' => 'faq',
            ],
            [
                'key' => 'faq_2_answer_ar',
                'value' => 'نعم، لدينا شبكة توزيع واسعة تمتد عبر عدة دول. تواصل معنا للاستفسارات المحددة حول الشحن إلى منطقتك.',
                'group' => 'faq',
            ],
            [
                'key' => 'faq_3_question',
                'value' => 'How can I become a partner?',
                'group' => 'faq',
            ],
            [
                'key' => 'faq_3_question_ar',
                'value' => 'كيف يمكنني أن أصبح شريكاً؟',
                'group' => 'faq',
            ],
            [
                'key' => 'faq_3_answer',
                'value' => 'We\'re always looking for new partners. Fill out the contact form above or reach out to us directly via email to discuss partnership opportunities.',
                'group' => 'faq',
            ],
            [
                'key' => 'faq_3_answer_ar',
                'value' => 'نحن نبحث دائماً عن شركاء جدد. املأ نموذج الاتصال أعلاه أو تواصل معنا مباشرة عبر البريد الإلكتروني لمناقشة فرص الشراكة.',
                'group' => 'faq',
            ],
            [
                'key' => 'faq_4_question',
                'value' => 'What is the minimum order quantity?',
                'group' => 'faq',
            ],
            [
                'key' => 'faq_4_question_ar',
                'value' => 'ما هو الحد الأدنى لكمية الطلب؟',
                'group' => 'faq',
            ],
            [
                'key' => 'faq_4_answer',
                'value' => 'Minimum order quantities vary by product and region. Please contact our sales team for specific requirements and pricing information.',
                'group' => 'faq',
            ],
            [
                'key' => 'faq_4_answer_ar',
                'value' => 'تختلف الحد الأدنى لكميات الطلب حسب المنتج والمنطقة. يرجى التواصل مع فريق المبيعات لدينا للحصول على المتطلبات المحددة ومعلومات الأسعار.',
                'group' => 'faq',
            ],
        ];

        foreach ($settings as $setting) {
            SiteSetting::updateOrCreate(
                ['key' => $setting['key']],
                ['value' => $setting['value'], 'group' => $setting['group']]
            );
        }
    }
}
