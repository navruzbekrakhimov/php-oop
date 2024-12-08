<?php

require_once 'config/bootstrap.php'; // PDO va boshqa kerakli fayllarni yuklash

if (isset($_GET['id'])) {
    $post_id = $_GET['id'];  // URL orqali post ID-si olinadi

    // Postni o'chirish
    $deleted = Post::delete($post_id);

    if ($deleted) {
        // Agar o'chirish muvaffaqiyatli bo'lsa, foydalanuvchini postlar ro'yxatiga yo'naltirish
        header("Location: index.php");
        exit;
    } 
} else {
    // Agar post ID si URL orqali kelmagan bo'lsa
    echo "Post ID mavjud emas.";
}

