<?php

require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

$content = '<h2>Our Story</h2>
<p>Founded with a passion for quality and excellence, <strong>Rabyanah Food Trade Company</strong> has established itself as a leading name in premium food distribution across the Middle East. Our journey began with a simple vision: to connect the world\'s finest food brands with markets that appreciate quality and authenticity.</p>
<p>Over the years, we have built an extensive network of partnerships with leading international food manufacturers, enabling us to offer an unparalleled selection of high-quality products. From gourmet ingredients to everyday essentials, our portfolio reflects our commitment to excellence and our understanding of diverse culinary traditions.</p>

<h2>What Sets Us Apart</h2>
<p>At Rabyanah, we believe that quality is not just about the products we distribute—it\'s about the relationships we build. Our team of experienced professionals works closely with both suppliers and customers to ensure seamless operations, timely deliveries, and exceptional service at every step of the supply chain.</p>
<p>We maintain the highest standards of food safety and quality control, adhering to international certifications and best practices. Our state-of-the-art storage facilities and logistics infrastructure ensure that every product reaches its destination in perfect condition.</p>

<h3>Our Core Values</h3>
<ul>
<li><p><strong>Quality Excellence</strong> – We source only the finest products from trusted global brands</p></li>
<li><p><strong>Customer Focus</strong> – Your satisfaction is at the heart of everything we do</p></li>
<li><p><strong>Integrity</strong> – We conduct business with honesty and transparency</p></li>
<li><p><strong>Innovation</strong> – We continuously improve our services and product offerings</p></li>
</ul>

<h2>Our Commitment</h2>
<p>As we continue to grow, our commitment remains unchanged: to be the bridge between the world\'s best food producers and the markets they serve. We are dedicated to innovation, sustainability, and building lasting partnerships that benefit our customers, suppliers, and communities alike.</p>

<h3>Why Choose Rabyanah</h3>
<ol>
<li><p><strong>Premium Product Selection</strong> – Carefully curated range of high-quality food products</p></li>
<li><p><strong>Reliable Distribution</strong> – Efficient logistics ensuring timely delivery</p></li>
<li><p><strong>Expert Support</strong> – Dedicated team providing personalized service</p></li>
<li><p><strong>Trusted Partnerships</strong> – Long-standing relationships with renowned global brands</p></li>
</ol>';

App\Models\SiteSetting::where('key', 'about_content')->update(['value' => $content]);

echo "About content updated successfully!\n";
