<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Category;
use App\Models\HeroSlide;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DemoDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->seedCategories();
        $this->seedBrands();
        $this->seedProducts();
        $this->seedHeroSlides();
    }

    private function seedCategories(): void
    {
        $categories = [
            [
                'name' => 'Dairy Products',
                'name_ar' => 'منتجات الألبان',
                'description' => 'Fresh and high-quality dairy products including milk, cheese, and yogurt.',
                'description_ar' => 'منتجات ألبان طازجة وعالية الجودة تشمل الحليب والجبن والزبادي.',
                'sort_order' => 1,
            ],
            [
                'name' => 'Meat & Poultry',
                'name_ar' => 'اللحوم والدواجن',
                'description' => 'Premium quality meat and poultry products from trusted sources.',
                'description_ar' => 'لحوم ودواجن عالية الجودة من مصادر موثوقة.',
                'sort_order' => 2,
            ],
            [
                'name' => 'Seafood',
                'name_ar' => 'المأكولات البحرية',
                'description' => 'Fresh and frozen seafood from around the world.',
                'description_ar' => 'مأكولات بحرية طازجة ومجمدة من جميع أنحاء العالم.',
                'sort_order' => 3,
            ],
            [
                'name' => 'Grains & Cereals',
                'name_ar' => 'الحبوب والقمح',
                'description' => 'High-quality grains, rice, and cereal products.',
                'description_ar' => 'حبوب وأرز ومنتجات حبوب عالية الجودة.',
                'sort_order' => 4,
            ],
            [
                'name' => 'Oils & Fats',
                'name_ar' => 'الزيوت والدهون',
                'description' => 'Premium cooking oils and fats for culinary excellence.',
                'description_ar' => 'زيوت طهي ودهون ممتازة للتميز في الطهي.',
                'sort_order' => 5,
            ],
            [
                'name' => 'Canned Foods',
                'name_ar' => 'الأغذية المعلبة',
                'description' => 'Wide variety of preserved and canned food products.',
                'description_ar' => 'تشكيلة واسعة من المنتجات الغذائية المحفوظة والمعلبة.',
                'sort_order' => 6,
            ],
            [
                'name' => 'Beverages',
                'name_ar' => 'المشروبات',
                'description' => 'Refreshing beverages including juices and soft drinks.',
                'description_ar' => 'مشروبات منعشة تشمل العصائر والمشروبات الغازية.',
                'sort_order' => 7,
            ],
            [
                'name' => 'Spices & Seasonings',
                'name_ar' => 'التوابل والبهارات',
                'description' => 'Authentic spices and seasonings from around the globe.',
                'description_ar' => 'توابل وبهارات أصلية من جميع أنحاء العالم.',
                'sort_order' => 8,
            ],
        ];

        foreach ($categories as $category) {
            Category::create([
                ...$category,
                'slug' => Str::slug($category['name']),
                'is_active' => true,
            ]);
        }
    }

    private function seedBrands(): void
    {
        $brands = [
            [
                'name' => 'Al Marai',
                'name_ar' => 'المراعي',
                'description' => 'Leading dairy brand in the Middle East.',
                'description_ar' => 'العلامة التجارية الرائدة للألبان في الشرق الأوسط.',
                'website_url' => 'https://www.almarai.com',
                'is_featured' => true,
                'sort_order' => 1,
            ],
            [
                'name' => 'Sadia',
                'name_ar' => 'ساديا',
                'description' => 'Global leader in frozen foods and poultry.',
                'description_ar' => 'رائد عالمي في الأغذية المجمدة والدواجن.',
                'website_url' => 'https://www.sadia.com',
                'is_featured' => true,
                'sort_order' => 2,
            ],
            [
                'name' => 'Al Kabeer',
                'name_ar' => 'الكبير',
                'description' => 'Premium frozen meat and poultry products.',
                'description_ar' => 'منتجات لحوم ودواجن مجمدة ممتازة.',
                'website_url' => 'https://www.alkabeer.com',
                'is_featured' => true,
                'sort_order' => 3,
            ],
            [
                'name' => 'Americana',
                'name_ar' => 'أمريكانا',
                'description' => 'Trusted food brand with diverse product range.',
                'description_ar' => 'علامة غذائية موثوقة بتشكيلة متنوعة من المنتجات.',
                'website_url' => 'https://www.americana-group.com',
                'is_featured' => true,
                'sort_order' => 4,
            ],
            [
                'name' => 'Nadec',
                'name_ar' => 'نادك',
                'description' => 'Saudi dairy and food company.',
                'description_ar' => 'شركة سعودية للألبان والأغذية.',
                'website_url' => 'https://www.nadec.com.sa',
                'is_featured' => true,
                'sort_order' => 5,
            ],
            [
                'name' => 'Goody',
                'name_ar' => 'قودي',
                'description' => 'Quality canned and processed foods.',
                'description_ar' => 'أغذية معلبة ومصنعة عالية الجودة.',
                'website_url' => 'https://www.goody.com.sa',
                'is_featured' => false,
                'sort_order' => 6,
            ],
            [
                'name' => 'Al Watania',
                'name_ar' => 'الوطنية',
                'description' => 'Premium poultry and meat products.',
                'description_ar' => 'دواجن ولحوم ممتازة.',
                'website_url' => null,
                'is_featured' => false,
                'sort_order' => 7,
            ],
            [
                'name' => 'Seara',
                'name_ar' => 'سيارا',
                'description' => 'Brazilian frozen food excellence.',
                'description_ar' => 'تميز برازيلي في الأغذية المجمدة.',
                'website_url' => 'https://www.seara.com.br',
                'is_featured' => false,
                'sort_order' => 8,
            ],
            [
                'name' => 'Sunflower',
                'name_ar' => 'عباد الشمس',
                'description' => 'Premium cooking oils and fats.',
                'description_ar' => 'زيوت طهي ودهون ممتازة.',
                'website_url' => null,
                'is_featured' => false,
                'sort_order' => 9,
            ],
            [
                'name' => 'Al Ain',
                'name_ar' => 'العين',
                'description' => 'Fresh dairy and beverages.',
                'description_ar' => 'ألبان ومشروبات طازجة.',
                'website_url' => null,
                'is_featured' => false,
                'sort_order' => 10,
            ],
            [
                'name' => 'Bayara',
                'name_ar' => 'بيارا',
                'description' => 'Premium nuts, dried fruits, and spices.',
                'description_ar' => 'مكسرات وفواكه مجففة وتوابل ممتازة.',
                'website_url' => null,
                'is_featured' => false,
                'sort_order' => 11,
            ],
            [
                'name' => 'Basmati King',
                'name_ar' => 'ملك البسمتي',
                'description' => 'Finest basmati rice from India.',
                'description_ar' => 'أفضل أرز بسمتي من الهند.',
                'website_url' => null,
                'is_featured' => false,
                'sort_order' => 12,
            ],
        ];

        foreach ($brands as $brand) {
            Brand::create([
                ...$brand,
                'slug' => Str::slug($brand['name']),
                'is_active' => true,
            ]);
        }
    }

    private function seedProducts(): void
    {
        $categories = Category::all()->keyBy('name');
        $brands = Brand::all()->keyBy('name');

        $products = [
            // Dairy Products
            [
                'name' => 'Fresh Full Cream Milk',
                'name_ar' => 'حليب طازج كامل الدسم',
                'short_description' => 'Premium quality fresh milk from grass-fed cows.',
                'short_description_ar' => 'حليب طازج عالي الجودة من أبقار تتغذى على العشب.',
                'description' => 'Our Fresh Full Cream Milk is sourced from the finest dairy farms. Rich in calcium and essential nutrients, it\'s perfect for daily consumption, cooking, and baking.',
                'description_ar' => 'حليبنا الطازج كامل الدسم مصدره أفضل مزارع الألبان. غني بالكالسيوم والعناصر الغذائية الأساسية، مثالي للاستهلاك اليومي والطهي والخبز.',
                'category' => 'Dairy Products',
                'brand' => 'Al Marai',
                'is_featured' => true,
                'sort_order' => 1,
            ],
            [
                'name' => 'Greek Style Yogurt',
                'name_ar' => 'زبادي يوناني',
                'short_description' => 'Thick and creamy Greek-style yogurt.',
                'short_description_ar' => 'زبادي يوناني كثيف وكريمي.',
                'description' => 'Indulge in our thick, creamy Greek-style yogurt. Perfect for breakfast, smoothies, or as a healthy snack. High in protein and probiotics.',
                'description_ar' => 'استمتع بزبادينا اليوناني الكثيف والكريمي. مثالي للفطور والعصائر أو كوجبة خفيفة صحية. غني بالبروتين والبروبيوتيك.',
                'category' => 'Dairy Products',
                'brand' => 'Nadec',
                'is_featured' => true,
                'sort_order' => 2,
            ],
            [
                'name' => 'Cheddar Cheese Block',
                'name_ar' => 'جبنة شيدر قالب',
                'short_description' => 'Aged cheddar cheese with rich flavor.',
                'short_description_ar' => 'جبنة شيدر معتقة بنكهة غنية.',
                'description' => 'Premium aged cheddar cheese with a sharp, distinctive flavor. Perfect for sandwiches, cooking, or cheese boards.',
                'description_ar' => 'جبنة شيدر ممتازة معتقة بنكهة حادة ومميزة. مثالية للسندويشات والطهي أو أطباق الجبن.',
                'category' => 'Dairy Products',
                'brand' => 'Al Marai',
                'is_featured' => false,
                'sort_order' => 3,
            ],
            // Meat & Poultry
            [
                'name' => 'Premium Chicken Breast',
                'name_ar' => 'صدور دجاج ممتازة',
                'short_description' => 'Boneless, skinless chicken breast fillets.',
                'short_description_ar' => 'شرائح صدور دجاج بدون عظم وبدون جلد.',
                'description' => 'High-quality boneless chicken breast fillets. Hormone-free and raised in controlled environments. Perfect for grilling, baking, or stir-frying.',
                'description_ar' => 'شرائح صدور دجاج عالية الجودة بدون عظم. خالية من الهرمونات ومربى في بيئات محكومة. مثالية للشوي والخبز أو القلي السريع.',
                'category' => 'Meat & Poultry',
                'brand' => 'Sadia',
                'is_featured' => true,
                'sort_order' => 4,
            ],
            [
                'name' => 'Beef Burger Patties',
                'name_ar' => 'شرائح برجر لحم بقري',
                'short_description' => '100% beef burger patties, ready to cook.',
                'short_description_ar' => 'شرائح برجر 100% لحم بقري، جاهزة للطهي.',
                'description' => 'Juicy 100% beef burger patties made from premium cuts. Pre-seasoned and ready to grill. Pack of 8 patties.',
                'description_ar' => 'شرائح برجر لحم بقري 100% عصيرية مصنوعة من قطع ممتازة. متبلة مسبقاً وجاهزة للشوي. عبوة من 8 شرائح.',
                'category' => 'Meat & Poultry',
                'brand' => 'Al Kabeer',
                'is_featured' => true,
                'sort_order' => 5,
            ],
            [
                'name' => 'Lamb Minced Meat',
                'name_ar' => 'لحم ضأن مفروم',
                'short_description' => 'Fresh minced lamb meat.',
                'short_description_ar' => 'لحم ضأن مفروم طازج.',
                'description' => 'Premium quality minced lamb meat. Perfect for kebabs, kofta, and traditional dishes. Fresh and never frozen.',
                'description_ar' => 'لحم ضأن مفروم عالي الجودة. مثالي للكباب والكفتة والأطباق التقليدية. طازج وغير مجمد.',
                'category' => 'Meat & Poultry',
                'brand' => 'Al Kabeer',
                'is_featured' => false,
                'sort_order' => 6,
            ],
            // Seafood
            [
                'name' => 'Atlantic Salmon Fillet',
                'name_ar' => 'شرائح سلمون أطلسي',
                'short_description' => 'Premium Atlantic salmon fillets.',
                'short_description_ar' => 'شرائح سلمون أطلسي ممتازة.',
                'description' => 'Fresh Atlantic salmon fillets, rich in Omega-3. Perfect for grilling, baking, or pan-searing. Sustainably sourced.',
                'description_ar' => 'شرائح سلمون أطلسي طازجة، غنية بالأوميغا-3. مثالية للشوي أو الخبز أو القلي. مصدرها مستدام.',
                'category' => 'Seafood',
                'brand' => 'Seara',
                'is_featured' => true,
                'sort_order' => 7,
            ],
            [
                'name' => 'Jumbo Shrimp',
                'name_ar' => 'روبيان جامبو',
                'short_description' => 'Large peeled and deveined shrimp.',
                'short_description_ar' => 'روبيان كبير مقشر ومنظف.',
                'description' => 'Premium jumbo shrimp, cleaned and ready to cook. Perfect for stir-fries, pasta, or grilling. IQF frozen for freshness.',
                'description_ar' => 'روبيان جامبو ممتاز، منظف وجاهز للطهي. مثالي للقلي السريع أو الباستا أو الشوي. مجمد بشكل فردي للحفاظ على الطزاجة.',
                'category' => 'Seafood',
                'brand' => 'Seara',
                'is_featured' => false,
                'sort_order' => 8,
            ],
            // Grains & Cereals
            [
                'name' => 'Premium Basmati Rice',
                'name_ar' => 'أرز بسمتي ممتاز',
                'short_description' => 'Extra long grain aromatic basmati rice.',
                'short_description_ar' => 'أرز بسمتي عطري طويل الحبة.',
                'description' => 'Aged extra long grain basmati rice from the foothills of the Himalayas. Perfect for biryani, pilaf, and everyday meals.',
                'description_ar' => 'أرز بسمتي معتق طويل الحبة من سفوح جبال الهيمالايا. مثالي للبرياني والأرز المطبوخ والوجبات اليومية.',
                'category' => 'Grains & Cereals',
                'brand' => 'Basmati King',
                'is_featured' => true,
                'sort_order' => 9,
            ],
            [
                'name' => 'Egyptian Rice',
                'name_ar' => 'أرز مصري',
                'short_description' => 'Short grain Egyptian rice.',
                'short_description_ar' => 'أرز مصري قصير الحبة.',
                'description' => 'Premium short grain Egyptian rice, perfect for stuffed vegetables, mahshi, and traditional Middle Eastern dishes.',
                'description_ar' => 'أرز مصري ممتاز قصير الحبة، مثالي للمحشي والأطباق الشرق أوسطية التقليدية.',
                'category' => 'Grains & Cereals',
                'brand' => 'Goody',
                'is_featured' => false,
                'sort_order' => 10,
            ],
            // Oils & Fats
            [
                'name' => 'Pure Sunflower Oil',
                'name_ar' => 'زيت عباد الشمس النقي',
                'short_description' => '100% pure refined sunflower oil.',
                'short_description_ar' => 'زيت عباد شمس نقي 100% مكرر.',
                'description' => 'High-quality refined sunflower oil. Light taste, high smoke point. Perfect for frying, baking, and salad dressings.',
                'description_ar' => 'زيت عباد شمس مكرر عالي الجودة. طعم خفيف ونقطة دخان عالية. مثالي للقلي والخبز وتتبيلات السلطة.',
                'category' => 'Oils & Fats',
                'brand' => 'Sunflower',
                'is_featured' => false,
                'sort_order' => 11,
            ],
            [
                'name' => 'Extra Virgin Olive Oil',
                'name_ar' => 'زيت زيتون بكر ممتاز',
                'short_description' => 'Cold-pressed extra virgin olive oil.',
                'short_description_ar' => 'زيت زيتون بكر ممتاز معصور على البارد.',
                'description' => 'Premium cold-pressed extra virgin olive oil. Rich flavor, perfect for salads, dipping bread, and Mediterranean cuisine.',
                'description_ar' => 'زيت زيتون بكر ممتاز معصور على البارد. نكهة غنية، مثالي للسلطات وتغميس الخبز والمطبخ المتوسطي.',
                'category' => 'Oils & Fats',
                'brand' => 'Goody',
                'is_featured' => true,
                'sort_order' => 12,
            ],
            // Canned Foods
            [
                'name' => 'Premium Tuna Chunks',
                'name_ar' => 'قطع تونة ممتازة',
                'short_description' => 'Chunk light tuna in sunflower oil.',
                'short_description_ar' => 'قطع تونة خفيفة في زيت عباد الشمس.',
                'description' => 'Premium quality chunk light tuna in sunflower oil. Rich in protein and Omega-3. Perfect for sandwiches and salads.',
                'description_ar' => 'قطع تونة خفيفة عالية الجودة في زيت عباد الشمس. غنية بالبروتين والأوميغا-3. مثالية للسندويشات والسلطات.',
                'category' => 'Canned Foods',
                'brand' => 'Goody',
                'is_featured' => false,
                'sort_order' => 13,
            ],
            [
                'name' => 'Baked Beans in Tomato Sauce',
                'name_ar' => 'فاصوليا مطبوخة بصلصة الطماطم',
                'short_description' => 'Classic baked beans in rich tomato sauce.',
                'short_description_ar' => 'فاصوليا مطبوخة كلاسيكية في صلصة طماطم غنية.',
                'description' => 'Hearty baked beans in a delicious tomato sauce. High in fiber and protein. Perfect for breakfast or as a side dish.',
                'description_ar' => 'فاصوليا مطبوخة شهية في صلصة طماطم لذيذة. غنية بالألياف والبروتين. مثالية للفطور أو كطبق جانبي.',
                'category' => 'Canned Foods',
                'brand' => 'Goody',
                'is_featured' => false,
                'sort_order' => 14,
            ],
            // Beverages
            [
                'name' => 'Fresh Orange Juice',
                'name_ar' => 'عصير برتقال طازج',
                'short_description' => '100% pure squeezed orange juice.',
                'short_description_ar' => 'عصير برتقال معصور نقي 100%.',
                'description' => 'Freshly squeezed 100% orange juice with no added sugar. Rich in Vitamin C. Perfect for a healthy start to your day.',
                'description_ar' => 'عصير برتقال معصور طازج 100% بدون سكر مضاف. غني بفيتامين C. مثالي لبداية صحية ليومك.',
                'category' => 'Beverages',
                'brand' => 'Al Ain',
                'is_featured' => false,
                'sort_order' => 15,
            ],
            [
                'name' => 'Mixed Fruit Nectar',
                'name_ar' => 'نكتار فواكه مشكلة',
                'short_description' => 'Delicious blend of tropical fruits.',
                'short_description_ar' => 'مزيج لذيذ من الفواكه الاستوائية.',
                'description' => 'A refreshing blend of tropical fruits including mango, pineapple, and passion fruit. Perfect for any occasion.',
                'description_ar' => 'مزيج منعش من الفواكه الاستوائية تشمل المانجو والأناناس وفاكهة العاطفة. مثالي لأي مناسبة.',
                'category' => 'Beverages',
                'brand' => 'Al Marai',
                'is_featured' => false,
                'sort_order' => 16,
            ],
            // Spices & Seasonings
            [
                'name' => 'Premium Saffron Threads',
                'name_ar' => 'خيوط زعفران ممتازة',
                'short_description' => 'Pure Spanish saffron threads.',
                'short_description_ar' => 'خيوط زعفران إسبانية نقية.',
                'description' => 'Premium quality Spanish saffron threads. Intense aroma and color. Perfect for rice dishes, desserts, and traditional recipes.',
                'description_ar' => 'خيوط زعفران إسبانية عالية الجودة. رائحة ولون مكثف. مثالية لأطباق الأرز والحلويات والوصفات التقليدية.',
                'category' => 'Spices & Seasonings',
                'brand' => 'Bayara',
                'is_featured' => true,
                'sort_order' => 17,
            ],
            [
                'name' => 'Mixed Spice Blend',
                'name_ar' => 'خلطة بهارات مشكلة',
                'short_description' => 'Traditional Middle Eastern spice blend.',
                'short_description_ar' => 'خلطة بهارات شرق أوسطية تقليدية.',
                'description' => 'Authentic blend of cumin, coriander, turmeric, and other aromatic spices. Perfect for meat dishes and rice.',
                'description_ar' => 'خلطة أصيلة من الكمون والكزبرة والكركم وتوابل عطرية أخرى. مثالية لأطباق اللحوم والأرز.',
                'category' => 'Spices & Seasonings',
                'brand' => 'Bayara',
                'is_featured' => false,
                'sort_order' => 18,
            ],
        ];

        foreach ($products as $product) {
            Product::create([
                'name' => $product['name'],
                'name_ar' => $product['name_ar'],
                'slug' => Str::slug($product['name']),
                'short_description' => $product['short_description'],
                'short_description_ar' => $product['short_description_ar'],
                'description' => $product['description'],
                'description_ar' => $product['description_ar'],
                'category_id' => $categories[$product['category']]->id ?? null,
                'brand_id' => $brands[$product['brand']]->id ?? null,
                'is_featured' => $product['is_featured'],
                'is_active' => true,
                'sort_order' => $product['sort_order'],
            ]);
        }
    }

    private function seedHeroSlides(): void
    {
        $slides = [
            [
                'title' => 'Global Food Excellence',
                'title_ar' => 'تميز غذائي عالمي',
                'subtitle' => 'Premium quality food products sourced from around the world. Trust Rabyanah for excellence in every bite.',
                'subtitle_ar' => 'منتجات غذائية عالية الجودة من جميع أنحاء العالم. ثق في ربيانة للتميز في كل لقمة.',
                'button_text' => 'Explore Products',
                'button_text_ar' => 'استكشف المنتجات',
                'button_url' => '#products',
                'sort_order' => 1,
            ],
            [
                'title' => 'Quality You Can Trust',
                'title_ar' => 'جودة يمكنك الوثوق بها',
                'subtitle' => 'From farm to table, we ensure the highest standards of quality and freshness for your family.',
                'subtitle_ar' => 'من المزرعة إلى المائدة، نضمن أعلى معايير الجودة والطزاجة لعائلتك.',
                'button_text' => 'Our Brands',
                'button_text_ar' => 'علاماتنا التجارية',
                'button_url' => '#brands',
                'sort_order' => 2,
            ],
            [
                'title' => 'Your Partner in Food Trade',
                'title_ar' => 'شريكك في تجارة الغذاء',
                'subtitle' => 'With decades of experience, Rabyanah connects you to the world\'s finest food products.',
                'subtitle_ar' => 'بعقود من الخبرة، ربيانة تربطك بأفضل المنتجات الغذائية في العالم.',
                'button_text' => 'Contact Us',
                'button_text_ar' => 'تواصل معنا',
                'button_url' => '#contact',
                'sort_order' => 3,
            ],
        ];

        foreach ($slides as $slide) {
            HeroSlide::create([
                ...$slide,
                'is_active' => true,
            ]);
        }
    }
}
