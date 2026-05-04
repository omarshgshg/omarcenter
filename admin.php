<?php
require 'config.php';

// تحديث اسم الموقع
if(isset($_POST['update_name'])) {
    $new_name = $conn->real_escape_string($_POST['site_name']);
    $conn->query("UPDATE settings SET site_name = '$new_name' WHERE id = 1");
    $msg = "تم تحديث اسم الموقع!";
}

// إضافة منتج جديد
if(isset($_POST['add_product'])) {
    $name = $conn->real_escape_string($_POST['product_name']);
    $price = $conn->real_escape_string($_POST['product_price']);
    $image = $conn->real_escape_string($_POST['product_image']); // مسار الصورة أو رابطها
    
    $conn->query("INSERT INTO products (name, price, image_url) VALUES ('$name', '$price', '$image')");
    $msg = "تمت إضافة المنتج بنجاح!";
}

$site_name_query = $conn->query("SELECT site_name FROM settings WHERE id = 1");
$current_name = $site_name_query->fetch_assoc()['site_name'];
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>لوحة الإدارة - عمر سنتر</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <nav>
        <div class="logo">لوحة التحكم</div>
        <div><a href="index.php">العودة للمتجر</a></div>
    </nav>

    <div class="admin-container">
        <?php if(isset($msg)) echo "<h3 style='color:var(--neon-blue); text-align:center;'>$msg</h3><br>"; ?>

        <div class="admin-form">
            <h3>تغيير اسم الموقع (اللوجو)</h3>
            <form method="POST">
                <input type="text" name="site_name" value="<?php echo htmlspecialchars($current_name); ?>" required>
                <button type="submit" name="update_name" class="admin-btn">حفظ التغيير</button>
            </form>
        </div>

        <div class="admin-form">
            <h3>إضافة منتج جديد</h3>
            <form method="POST">
                <label>اسم المنتج:</label>
                <input type="text" name="product_name" required>
                
                <label>السعر:</label>
                <input type="number" step="0.01" name="product_price" required>
                
                <label>رابط أو مسار الصورة:</label>
                <input type="text" name="product_image" placeholder="مثال: images/ps5.jpg" required>
                
                <button type="submit" name="add_product" class="admin-btn">إضافة المنتج</button>
            </form>
        </div>
    </div>
</body>
</html>
