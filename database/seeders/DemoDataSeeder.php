<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Category;
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
        // Skip if brands already seeded by BrandSeeder
        if (Brand::count() > 0) {
            return;
        }

        $brands = [
            ['name' => 'Al Marai', 'description' => 'Leading dairy brand in the Middle East.'],
            ['name' => 'Sadia', 'description' => 'Global leader in frozen foods and poultry.'],
            ['name' => 'Al Kabeer', 'description' => 'Premium frozen meat and poultry products.'],
            ['name' => 'Americana', 'description' => 'Trusted food brand with diverse product range.'],
            ['name' => 'Nadec', 'description' => 'Saudi dairy and food company.'],
            ['name' => 'Goody', 'description' => 'Quality canned and processed foods.'],
            ['name' => 'Al Watania', 'description' => 'Premium poultry and meat products.'],
            ['name' => 'Seara', 'description' => 'Brazilian frozen food excellence.'],
            ['name' => 'Sunflower', 'description' => 'Premium cooking oils and fats.'],
            ['name' => 'Al Ain', 'description' => 'Fresh dairy and beverages.'],
            ['name' => 'Bayara', 'description' => 'Premium nuts, dried fruits, and spices.'],
            ['name' => 'Basmati King', 'description' => 'Finest basmati rice from India.'],
        ];

        foreach ($brands as $brand) {
            Brand::create([
                ...$brand,
                'active' => true,
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
}
