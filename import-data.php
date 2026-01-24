<?php
$data = json_decode(file_get_contents('data-export.json'), true);
$pdo = new PDO('mysql:host=localhost;dbname=u799534021_pod', 'u799534021_pod', 'PODadmin25$$');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$pdo->exec('SET FOREIGN_KEY_CHECKS=0');

// Import products
$pdo->exec('TRUNCATE TABLE products');
$cnt = 0;
foreach ($data['products'] as $p) {
    $g = $p['gallery'] ? json_encode($p['gallery']) : null;
    $sql = 'INSERT INTO products VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)';
    $stmt = $pdo->prepare($sql);
    $ca = date('Y-m-d H:i:s', strtotime($p['created_at']));
    $ua = date('Y-m-d H:i:s', strtotime($p['updated_at']));
    $stmt->execute([$p['id'],$p['name'],$p['name_ar'],$p['slug'],$p['description'],$p['description_ar'],$p['image'],$g,$p['brand_id'],$p['category_id'],$p['is_featured']?1:0,$p['is_active']?1:0,$p['sort_order'],$ca,$ua]);
    $cnt++;
}
echo $cnt . " products imported\n";

// Import site settings
if (!empty($data['site_settings'])) {
    $pdo->exec('TRUNCATE TABLE site_settings');
    foreach ($data['site_settings'] as $s) {
        $stmt = $pdo->prepare('INSERT INTO site_settings (id,`key`,value,created_at,updated_at) VALUES (?,?,?,?,?)');
        $ca = date('Y-m-d H:i:s', strtotime($s['created_at']));
        $ua = date('Y-m-d H:i:s', strtotime($s['updated_at']));
        $stmt->execute([$s['id'],$s['key'],$s['value'],$ca,$ua]);
    }
    echo count($data['site_settings']) . " site settings imported\n";
}

$pdo->exec('SET FOREIGN_KEY_CHECKS=1');
echo "Done!\n";
