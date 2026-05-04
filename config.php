<?php
// إعدادات قاعدة البيانات - قم بتغييرها حسب استضافتك
$host = 'localhost';
$db   = 'omar_center_db';
$user = 'root'; // اسم مستخدم قاعدة البيانات
$pass = '';     // كلمة مرور قاعدة البيانات

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("فشل الاتصال بقاعدة البيانات. يرجى التأكد من إعدادات config.php");
}
$conn->set_charset("utf8");
?>
