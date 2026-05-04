<?php
require 'config.php';

// جلب اسم الموقع من القاعدة
$site_name_query = $conn->query("SELECT site_name FROM settings WHERE id = 1");
$site_name = $site_name_query->fetch_assoc()['site_name'];

// جلب المنتجات
$products_query = $conn->query("SELECT * FROM products ORDER BY id DESC");
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title><?php echo htmlspecialchars($site_name); ?></title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <nav>
        <div class="logo"><?php echo htmlspecialchars($site_name); ?></div>
        <div>
            <a href="index.php">الرئيسية</a>
            <a href="admin.php" style="color: var(--neon-purple);">لوحة الإدارة</a>
        </div>
    </nav>

    <h2 style="text-align:center; margin-top:2rem;">المنتجات المتوفرة</h2>
    
    <div class="products">
        <?php while($product = $products_query->fetch_assoc()): ?>
        <div class="product-card">
            <div class="product-img">
                <img src="<?php echo htmlspecialchars($product['image_url']); ?>" alt="صورة المنتج">
            </div>
            <div class="product-info">
                <h4><?php echo htmlspecialchars($product['name']); ?></h4>
                <span class="price"><?php echo htmlspecialchars($product['price']); ?> ريال</span>
                <button class="buy-btn">أضف للسلة</button>
            </div>
        </div>
        <?php endwhile; ?>
    </div>
</body>
</html>
