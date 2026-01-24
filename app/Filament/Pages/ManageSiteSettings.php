<?php

namespace App\Filament\Pages;

use App\Models\SiteSetting;
use BackedEnum;
use Filament\Actions\Action;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;

class ManageSiteSettings extends Page
{
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedCog6Tooth;

    protected static string|\UnitEnum|null $navigationGroup = 'Settings';

    protected static ?int $navigationSort = 100;

    protected string $view = 'filament.pages.manage-site-settings';

    protected static ?string $title = 'Site Settings';

    protected static ?string $navigationLabel = 'Site Settings';

    public ?array $data = [];

    public function mount(): void
    {
        $this->form->fill([
            // General - Branding
            'site_logo' => SiteSetting::get('site_logo'),
            'site_favicon' => SiteSetting::get('site_favicon'),
            'admin_email' => SiteSetting::get('admin_email'),
            // General - Hero Section
            'hero_tagline' => SiteSetting::get('hero_tagline'),
            'hero_tagline_ar' => SiteSetting::get('hero_tagline_ar'),
            'hero_title_line1' => SiteSetting::get('hero_title_line1'),
            'hero_title_line1_ar' => SiteSetting::get('hero_title_line1_ar'),
            'hero_title_line2' => SiteSetting::get('hero_title_line2'),
            'hero_title_line2_ar' => SiteSetting::get('hero_title_line2_ar'),
            'hero_subtitle' => SiteSetting::get('hero_subtitle'),
            'hero_subtitle_ar' => SiteSetting::get('hero_subtitle_ar'),
            'hero_cta_primary' => SiteSetting::get('hero_cta_primary'),
            'hero_cta_primary_ar' => SiteSetting::get('hero_cta_primary_ar'),
            'hero_cta_secondary' => SiteSetting::get('hero_cta_secondary'),
            'hero_cta_secondary_ar' => SiteSetting::get('hero_cta_secondary_ar'),
            // General - Footer
            'footer_about_text' => SiteSetting::get('footer_about_text'),
            'footer_about_text_ar' => SiteSetting::get('footer_about_text_ar'),
            // Contact
            'contact_phone' => SiteSetting::get('contact_phone'),
            'contact_email' => SiteSetting::get('contact_email'),
            'contact_address' => SiteSetting::get('contact_address'),
            'contact_city' => SiteSetting::get('contact_city'),
            'google_maps_url' => SiteSetting::get('google_maps_url'),
            'working_hours' => SiteSetting::get('working_hours'),
            // Social Media
            'social_facebook' => SiteSetting::get('social_facebook'),
            'social_twitter' => SiteSetting::get('social_twitter'),
            'social_instagram' => SiteSetting::get('social_instagram'),
            'social_linkedin' => SiteSetting::get('social_linkedin'),
            'social_whatsapp' => SiteSetting::get('social_whatsapp'),
            // Company
            'company_description' => SiteSetting::get('company_description'),
            'company_description_ar' => SiteSetting::get('company_description_ar'),
            // Stats
            'stats_years_experience' => SiteSetting::get('stats_years_experience'),
            'stats_brands_count' => SiteSetting::get('stats_brands_count'),
            'stats_countries_count' => SiteSetting::get('stats_countries_count'),
            // Services Section
            'service_1_title' => SiteSetting::get('service_1_title'),
            'service_1_title_ar' => SiteSetting::get('service_1_title_ar'),
            'service_1_description' => SiteSetting::get('service_1_description'),
            'service_1_description_ar' => SiteSetting::get('service_1_description_ar'),
            'service_2_title' => SiteSetting::get('service_2_title'),
            'service_2_title_ar' => SiteSetting::get('service_2_title_ar'),
            'service_2_description' => SiteSetting::get('service_2_description'),
            'service_2_description_ar' => SiteSetting::get('service_2_description_ar'),
            'service_3_title' => SiteSetting::get('service_3_title'),
            'service_3_title_ar' => SiteSetting::get('service_3_title_ar'),
            'service_3_description' => SiteSetting::get('service_3_description'),
            'service_3_description_ar' => SiteSetting::get('service_3_description_ar'),
            'service_4_title' => SiteSetting::get('service_4_title'),
            'service_4_title_ar' => SiteSetting::get('service_4_title_ar'),
            'service_4_description' => SiteSetting::get('service_4_description'),
            'service_4_description_ar' => SiteSetting::get('service_4_description_ar'),
            // About Page
            'about_content' => SiteSetting::get('about_content'),
            'about_content_ar' => SiteSetting::get('about_content_ar'),
            'about_mission' => SiteSetting::get('about_mission'),
            'about_mission_ar' => SiteSetting::get('about_mission_ar'),
            'about_vision' => SiteSetting::get('about_vision'),
            'about_vision_ar' => SiteSetting::get('about_vision_ar'),
            'about_cover_image' => SiteSetting::get('about_cover_image'),
            // FAQ
            'faq_1_question' => SiteSetting::get('faq_1_question'),
            'faq_1_question_ar' => SiteSetting::get('faq_1_question_ar'),
            'faq_1_answer' => SiteSetting::get('faq_1_answer'),
            'faq_1_answer_ar' => SiteSetting::get('faq_1_answer_ar'),
            'faq_2_question' => SiteSetting::get('faq_2_question'),
            'faq_2_question_ar' => SiteSetting::get('faq_2_question_ar'),
            'faq_2_answer' => SiteSetting::get('faq_2_answer'),
            'faq_2_answer_ar' => SiteSetting::get('faq_2_answer_ar'),
            'faq_3_question' => SiteSetting::get('faq_3_question'),
            'faq_3_question_ar' => SiteSetting::get('faq_3_question_ar'),
            'faq_3_answer' => SiteSetting::get('faq_3_answer'),
            'faq_3_answer_ar' => SiteSetting::get('faq_3_answer_ar'),
            'faq_4_question' => SiteSetting::get('faq_4_question'),
            'faq_4_question_ar' => SiteSetting::get('faq_4_question_ar'),
            'faq_4_answer' => SiteSetting::get('faq_4_answer'),
            'faq_4_answer_ar' => SiteSetting::get('faq_4_answer_ar'),
            'faq_5_question' => SiteSetting::get('faq_5_question'),
            'faq_5_question_ar' => SiteSetting::get('faq_5_question_ar'),
            'faq_5_answer' => SiteSetting::get('faq_5_answer'),
            'faq_5_answer_ar' => SiteSetting::get('faq_5_answer_ar'),
            'faq_6_question' => SiteSetting::get('faq_6_question'),
            'faq_6_question_ar' => SiteSetting::get('faq_6_question_ar'),
            'faq_6_answer' => SiteSetting::get('faq_6_answer'),
            'faq_6_answer_ar' => SiteSetting::get('faq_6_answer_ar'),
        ]);
    }

    public function form(Schema $schema): Schema
    {
        return $schema
            ->statePath('data')
            ->components([
                Tabs::make('Settings')
                    ->tabs([
                        Tab::make('General')
                            ->icon('heroicon-o-cog-6-tooth')
                            ->schema([
                                Section::make('Site Branding')
                                    ->description('Logo and favicon for your website')
                                    ->schema([
                                        FileUpload::make('site_logo')
                                            ->label('Site Logo')
                                            ->image()
                                            ->directory('branding')
                                            ->visibility('public')
                                            ->imageResizeMode('contain')
                                            ->imageResizeTargetWidth('400')
                                            ->imageResizeTargetHeight('200')
                                            ->helperText('Recommended: PNG or SVG with transparent background. Will fall back to default SVG logo if not set.'),
                                        FileUpload::make('site_favicon')
                                            ->label('Site Favicon')
                                            ->image()
                                            ->directory('branding')
                                            ->visibility('public')
                                            ->imageResizeMode('contain')
                                            ->imageResizeTargetWidth('64')
                                            ->imageResizeTargetHeight('64')
                                            ->helperText('Recommended: 64x64 PNG or ICO file. Will fall back to default favicon if not set.'),
                                    ])
                                    ->columns(2),

                                Section::make('Admin Settings')
                                    ->description('Administrative configuration')
                                    ->schema([
                                        TextInput::make('admin_email')
                                            ->label('Admin Email (for receiving messages)')
                                            ->email()
                                            ->placeholder('admin@rabyanah.com')
                                            ->helperText('Contact form submissions will be sent to this email'),
                                    ]),

                                Section::make('Hero Section Copywriting')
                                    ->description('Text content for the homepage hero section')
                                    ->schema([
                                        TextInput::make('hero_tagline')
                                            ->label('Tagline Badge (English)')
                                            ->placeholder('Global Food Excellence Since 1990'),
                                        TextInput::make('hero_tagline_ar')
                                            ->label('Tagline Badge (Arabic)')
                                            ->placeholder('التميز الغذائي العالمي منذ 1990'),
                                        TextInput::make('hero_title_line1')
                                            ->label('Main Title - Line 1 (English)')
                                            ->placeholder('Premium Food'),
                                        TextInput::make('hero_title_line1_ar')
                                            ->label('Main Title - Line 1 (Arabic)')
                                            ->placeholder('غذاء فاخر'),
                                        TextInput::make('hero_title_line2')
                                            ->label('Main Title - Line 2 (English)')
                                            ->placeholder('Trade Partner')
                                            ->helperText('This text appears in accent color'),
                                        TextInput::make('hero_title_line2_ar')
                                            ->label('Main Title - Line 2 (Arabic)')
                                            ->placeholder('شريك التجارة'),
                                        Textarea::make('hero_subtitle')
                                            ->label('Subtitle (English)')
                                            ->rows(2)
                                            ->placeholder('Connecting the world\'s finest food brands with markets across the globe.'),
                                        Textarea::make('hero_subtitle_ar')
                                            ->label('Subtitle (Arabic)')
                                            ->rows(2)
                                            ->placeholder('نربط أفضل العلامات التجارية الغذائية في العالم بالأسواق عبر الكرة الأرضية.'),
                                        TextInput::make('hero_cta_primary')
                                            ->label('Primary Button Text (English)')
                                            ->placeholder('Explore Products'),
                                        TextInput::make('hero_cta_primary_ar')
                                            ->label('Primary Button Text (Arabic)')
                                            ->placeholder('استكشف المنتجات'),
                                        TextInput::make('hero_cta_secondary')
                                            ->label('Secondary Button Text (English)')
                                            ->placeholder('Partner With Us'),
                                        TextInput::make('hero_cta_secondary_ar')
                                            ->label('Secondary Button Text (Arabic)')
                                            ->placeholder('كن شريكنا'),
                                    ])
                                    ->columns(2),

                                Section::make('Footer About Text')
                                    ->description('Short company description for the footer')
                                    ->schema([
                                        Textarea::make('footer_about_text')
                                            ->label('Footer About Text (English)')
                                            ->rows(3)
                                            ->placeholder('A leading global food trade company committed to delivering premium quality products...'),
                                        Textarea::make('footer_about_text_ar')
                                            ->label('Footer About Text (Arabic)')
                                            ->rows(3)
                                            ->placeholder('شركة رائدة في تجارة المواد الغذائية العالمية...'),
                                    ]),
                            ]),

                        Tab::make('Contact Information')
                            ->icon('heroicon-o-phone')
                            ->schema([
                                Section::make('Contact Details')
                                    ->description('Contact information displayed on the website')
                                    ->schema([
                                        TextInput::make('contact_phone')
                                            ->label('Phone Number')
                                            ->tel()
                                            ->placeholder('+971 4 123 4567'),
                                        TextInput::make('contact_email')
                                            ->label('Email Address')
                                            ->email()
                                            ->placeholder('info@rabyanah.com'),
                                        TextInput::make('contact_address')
                                            ->label('Address')
                                            ->placeholder('123 Business District'),
                                        TextInput::make('contact_city')
                                            ->label('City')
                                            ->placeholder('Dubai, UAE'),
                                        TextInput::make('working_hours')
                                            ->label('Working Hours')
                                            ->placeholder('Mon-Fri: 9AM - 6PM'),
                                    ])
                                    ->columns(2),

                                Section::make('Google Maps')
                                    ->description('Embed URL for the map shown in contact section')
                                    ->schema([
                                        Textarea::make('google_maps_url')
                                            ->label('Google Maps Embed URL')
                                            ->placeholder('https://www.google.com/maps/embed?pb=...')
                                            ->rows(2)
                                            ->columnSpanFull(),
                                    ]),
                            ]),

                        Tab::make('Social Media')
                            ->icon('heroicon-o-share')
                            ->schema([
                                Section::make('Social Media Links')
                                    ->description('Links to social media profiles')
                                    ->schema([
                                        TextInput::make('social_facebook')
                                            ->label('Facebook URL')
                                            ->url()
                                            ->placeholder('https://facebook.com/rabyanah'),
                                        TextInput::make('social_twitter')
                                            ->label('Twitter/X URL')
                                            ->url()
                                            ->placeholder('https://twitter.com/rabyanah'),
                                        TextInput::make('social_instagram')
                                            ->label('Instagram URL')
                                            ->url()
                                            ->placeholder('https://instagram.com/rabyanah'),
                                        TextInput::make('social_linkedin')
                                            ->label('LinkedIn URL')
                                            ->url()
                                            ->placeholder('https://linkedin.com/company/rabyanah'),
                                        TextInput::make('social_whatsapp')
                                            ->label('WhatsApp Link')
                                            ->url()
                                            ->placeholder('https://wa.me/971412345678'),
                                    ])
                                    ->columns(2),
                            ]),

                        Tab::make('Company Info')
                            ->icon('heroicon-o-building-office')
                            ->schema([
                                Section::make('Company Description')
                                    ->description('Description shown in footer and about sections')
                                    ->schema([
                                        Textarea::make('company_description')
                                            ->label('Description (English)')
                                            ->rows(3)
                                            ->placeholder('A leading global food trade company...'),
                                        Textarea::make('company_description_ar')
                                            ->label('Description (Arabic)')
                                            ->rows(3)
                                            ->placeholder('شركة رائدة في تجارة المواد الغذائية...'),
                                    ]),
                            ]),

                        Tab::make('Stats & Services')
                            ->icon('heroicon-o-chart-bar')
                            ->schema([
                                Section::make('Hero Section Stats')
                                    ->description('Statistics displayed in the hero section')
                                    ->schema([
                                        TextInput::make('stats_years_experience')
                                            ->label('Years of Experience')
                                            ->numeric()
                                            ->placeholder('35'),
                                        TextInput::make('stats_brands_count')
                                            ->label('Global Brands Count')
                                            ->numeric()
                                            ->placeholder('50'),
                                        TextInput::make('stats_countries_count')
                                            ->label('Countries Served')
                                            ->numeric()
                                            ->placeholder('22'),
                                    ])
                                    ->columns(3),

                                Section::make('Service 1')
                                    ->schema([
                                        TextInput::make('service_1_title')
                                            ->label('Title (English)')
                                            ->placeholder('Global Distribution'),
                                        TextInput::make('service_1_title_ar')
                                            ->label('Title (Arabic)')
                                            ->placeholder('التوزيع العالمي'),
                                        Textarea::make('service_1_description')
                                            ->label('Description (English)')
                                            ->rows(2)
                                            ->placeholder('Worldwide delivery network...'),
                                        Textarea::make('service_1_description_ar')
                                            ->label('Description (Arabic)')
                                            ->rows(2)
                                            ->placeholder('شبكة توصيل عالمية...'),
                                    ])
                                    ->columns(2)
                                    ->collapsible(),

                                Section::make('Service 2')
                                    ->schema([
                                        TextInput::make('service_2_title')
                                            ->label('Title (English)')
                                            ->placeholder('Quality Assurance'),
                                        TextInput::make('service_2_title_ar')
                                            ->label('Title (Arabic)')
                                            ->placeholder('ضمان الجودة'),
                                        Textarea::make('service_2_description')
                                            ->label('Description (English)')
                                            ->rows(2)
                                            ->placeholder('Premium quality products...'),
                                        Textarea::make('service_2_description_ar')
                                            ->label('Description (Arabic)')
                                            ->rows(2)
                                            ->placeholder('منتجات عالية الجودة...'),
                                    ])
                                    ->columns(2)
                                    ->collapsible(),

                                Section::make('Service 3')
                                    ->schema([
                                        TextInput::make('service_3_title')
                                            ->label('Title (English)')
                                            ->placeholder('Brand Partnership'),
                                        TextInput::make('service_3_title_ar')
                                            ->label('Title (Arabic)')
                                            ->placeholder('شراكات العلامات التجارية'),
                                        Textarea::make('service_3_description')
                                            ->label('Description (English)')
                                            ->rows(2)
                                            ->placeholder('Exclusive brand partnerships...'),
                                        Textarea::make('service_3_description_ar')
                                            ->label('Description (Arabic)')
                                            ->rows(2)
                                            ->placeholder('شراكات حصرية...'),
                                    ])
                                    ->columns(2)
                                    ->collapsible(),

                                Section::make('Service 4')
                                    ->schema([
                                        TextInput::make('service_4_title')
                                            ->label('Title (English)')
                                            ->placeholder('Custom Solutions'),
                                        TextInput::make('service_4_title_ar')
                                            ->label('Title (Arabic)')
                                            ->placeholder('حلول مخصصة'),
                                        Textarea::make('service_4_description')
                                            ->label('Description (English)')
                                            ->rows(2)
                                            ->placeholder('Tailored solutions...'),
                                        Textarea::make('service_4_description_ar')
                                            ->label('Description (Arabic)')
                                            ->rows(2)
                                            ->placeholder('حلول مصممة...'),
                                    ])
                                    ->columns(2)
                                    ->collapsible(),
                            ]),

                        Tab::make('About Page')
                            ->icon('heroicon-o-information-circle')
                            ->schema([
                                Section::make('Cover Image')
                                    ->description('Hero image for the about page')
                                    ->schema([
                                        FileUpload::make('about_cover_image')
                                            ->label('Cover Image')
                                            ->image()
                                            ->disk('public')
                                            ->directory('about')
                                            ->visibility('public')
                                            ->imageResizeMode('cover')
                                            ->imageCropAspectRatio('16:9')
                                            ->imageResizeTargetWidth('1920')
                                            ->imageResizeTargetHeight('1080'),
                                    ]),

                                Section::make('Main Content')
                                    ->description('Main content displayed on the about page')
                                    ->schema([
                                        RichEditor::make('about_content')
                                            ->label('About Us Content (English)')
                                            ->toolbarButtons([
                                                'bold',
                                                'italic',
                                                'underline',
                                                'strike',
                                                'h2',
                                                'h3',
                                                'bulletList',
                                                'orderedList',
                                                'link',
                                            ])
                                            ->columnSpanFull(),
                                        RichEditor::make('about_content_ar')
                                            ->label('About Us Content (Arabic)')
                                            ->toolbarButtons([
                                                'bold',
                                                'italic',
                                                'underline',
                                                'strike',
                                                'h2',
                                                'h3',
                                                'bulletList',
                                                'orderedList',
                                                'link',
                                            ])
                                            ->columnSpanFull(),
                                    ]),

                                Section::make('Mission & Vision')
                                    ->description('Company mission and vision statements')
                                    ->schema([
                                        Textarea::make('about_mission')
                                            ->label('Mission Statement (English)')
                                            ->rows(3)
                                            ->placeholder('Our mission is to...'),
                                        Textarea::make('about_mission_ar')
                                            ->label('Mission Statement (Arabic)')
                                            ->rows(3)
                                            ->placeholder('مهمتنا هي...'),
                                        Textarea::make('about_vision')
                                            ->label('Vision Statement (English)')
                                            ->rows(3)
                                            ->placeholder('Our vision is to...'),
                                        Textarea::make('about_vision_ar')
                                            ->label('Vision Statement (Arabic)')
                                            ->rows(3)
                                            ->placeholder('رؤيتنا هي...'),
                                    ])
                                    ->columns(2),
                            ]),

                        Tab::make('FAQ')
                            ->icon('heroicon-o-question-mark-circle')
                            ->schema([
                                Section::make('Frequently Asked Questions')
                                    ->description('FAQ items displayed on the contact page. Leave empty to hide.')
                                    ->schema([
                                        Section::make('FAQ Item 1')
                                            ->schema([
                                                TextInput::make('faq_1_question')
                                                    ->label('Question (English)')
                                                    ->placeholder('What products do you offer?'),
                                                TextInput::make('faq_1_question_ar')
                                                    ->label('Question (Arabic)')
                                                    ->placeholder('ما هي المنتجات التي تقدمونها؟'),
                                                Textarea::make('faq_1_answer')
                                                    ->label('Answer (English)')
                                                    ->rows(2)
                                                    ->placeholder('We offer a wide range of premium food products...'),
                                                Textarea::make('faq_1_answer_ar')
                                                    ->label('Answer (Arabic)')
                                                    ->rows(2)
                                                    ->placeholder('نقدم مجموعة واسعة من المنتجات الغذائية الفاخرة...'),
                                            ])
                                            ->columns(2)
                                            ->collapsible(),

                                        Section::make('FAQ Item 2')
                                            ->schema([
                                                TextInput::make('faq_2_question')
                                                    ->label('Question (English)')
                                                    ->placeholder('Do you ship internationally?'),
                                                TextInput::make('faq_2_question_ar')
                                                    ->label('Question (Arabic)')
                                                    ->placeholder('هل تقومون بالشحن دولياً؟'),
                                                Textarea::make('faq_2_answer')
                                                    ->label('Answer (English)')
                                                    ->rows(2)
                                                    ->placeholder('Yes, we have an extensive distribution network...'),
                                                Textarea::make('faq_2_answer_ar')
                                                    ->label('Answer (Arabic)')
                                                    ->rows(2)
                                                    ->placeholder('نعم، لدينا شبكة توزيع واسعة...'),
                                            ])
                                            ->columns(2)
                                            ->collapsible(),

                                        Section::make('FAQ Item 3')
                                            ->schema([
                                                TextInput::make('faq_3_question')
                                                    ->label('Question (English)')
                                                    ->placeholder('How can I become a partner?'),
                                                TextInput::make('faq_3_question_ar')
                                                    ->label('Question (Arabic)')
                                                    ->placeholder('كيف يمكنني أن أصبح شريكاً؟'),
                                                Textarea::make('faq_3_answer')
                                                    ->label('Answer (English)')
                                                    ->rows(2)
                                                    ->placeholder('We are always looking for new partners...'),
                                                Textarea::make('faq_3_answer_ar')
                                                    ->label('Answer (Arabic)')
                                                    ->rows(2)
                                                    ->placeholder('نحن نبحث دائماً عن شركاء جدد...'),
                                            ])
                                            ->columns(2)
                                            ->collapsible(),

                                        Section::make('FAQ Item 4')
                                            ->schema([
                                                TextInput::make('faq_4_question')
                                                    ->label('Question (English)')
                                                    ->placeholder('What is the minimum order quantity?'),
                                                TextInput::make('faq_4_question_ar')
                                                    ->label('Question (Arabic)')
                                                    ->placeholder('ما هو الحد الأدنى لكمية الطلب؟'),
                                                Textarea::make('faq_4_answer')
                                                    ->label('Answer (English)')
                                                    ->rows(2)
                                                    ->placeholder('Minimum order quantities vary by product...'),
                                                Textarea::make('faq_4_answer_ar')
                                                    ->label('Answer (Arabic)')
                                                    ->rows(2)
                                                    ->placeholder('تختلف الحد الأدنى لكميات الطلب حسب المنتج...'),
                                            ])
                                            ->columns(2)
                                            ->collapsible(),

                                        Section::make('FAQ Item 5')
                                            ->schema([
                                                TextInput::make('faq_5_question')
                                                    ->label('Question (English)')
                                                    ->placeholder('Question 5...'),
                                                TextInput::make('faq_5_question_ar')
                                                    ->label('Question (Arabic)')
                                                    ->placeholder('السؤال 5...'),
                                                Textarea::make('faq_5_answer')
                                                    ->label('Answer (English)')
                                                    ->rows(2)
                                                    ->placeholder('Answer 5...'),
                                                Textarea::make('faq_5_answer_ar')
                                                    ->label('Answer (Arabic)')
                                                    ->rows(2)
                                                    ->placeholder('الإجابة 5...'),
                                            ])
                                            ->columns(2)
                                            ->collapsible()
                                            ->collapsed(),

                                        Section::make('FAQ Item 6')
                                            ->schema([
                                                TextInput::make('faq_6_question')
                                                    ->label('Question (English)')
                                                    ->placeholder('Question 6...'),
                                                TextInput::make('faq_6_question_ar')
                                                    ->label('Question (Arabic)')
                                                    ->placeholder('السؤال 6...'),
                                                Textarea::make('faq_6_answer')
                                                    ->label('Answer (English)')
                                                    ->rows(2)
                                                    ->placeholder('Answer 6...'),
                                                Textarea::make('faq_6_answer_ar')
                                                    ->label('Answer (Arabic)')
                                                    ->rows(2)
                                                    ->placeholder('الإجابة 6...'),
                                            ])
                                            ->columns(2)
                                            ->collapsible()
                                            ->collapsed(),
                                    ]),
                            ]),
                    ])
                    ->columnSpanFull(),
            ]);
    }

    protected function getHeaderActions(): array
    {
        return [
            Action::make('save')
                ->label('Save Settings')
                ->action('save'),
        ];
    }

    public function save(): void
    {
        $data = $this->form->getState();

        foreach ($data as $key => $value) {
            $group = $this->getGroupForKey($key);
            SiteSetting::set($key, $value, $group);
        }

        Notification::make()
            ->title('Settings saved successfully')
            ->success()
            ->send();
    }

    private function getGroupForKey(string $key): string
    {
        if (str_starts_with($key, 'site_') || str_starts_with($key, 'admin_') || str_starts_with($key, 'hero_') || str_starts_with($key, 'footer_')) {
            return 'general';
        }

        if (str_starts_with($key, 'contact_') || str_starts_with($key, 'google_') || str_starts_with($key, 'working_')) {
            return 'contact';
        }

        if (str_starts_with($key, 'social_')) {
            return 'social';
        }

        if (str_starts_with($key, 'company_')) {
            return 'company';
        }

        if (str_starts_with($key, 'stats_') || str_starts_with($key, 'service')) {
            return 'services';
        }

        if (str_starts_with($key, 'about_')) {
            return 'about';
        }

        if (str_starts_with($key, 'faq_')) {
            return 'faq';
        }

        return 'general';
    }
}
