<?php
require_once 'config/bootstrap.php';

// POST so'rovi orqali tahrirlashni saqlash
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Yangi Post obyektini yaratish
    $post = new Post();
    $post->id = $_GET['id'];  // URL orqali olingan post ID-si
    $post->title = $_POST['title'];  // Formadan olingan title
    $post->body = $_POST['body'];    // Formadan olingan body

    // Postni saqlash
    $post->save();  // Obyekt metodidan foydalanish

    // Tahrirlangan postga o'tish
    header("Location: index.php?id=" . $post->id);
    exit;
}

// Postni ko'rsatish uchun olingan ID orqali fetch qilish
$post_id = $_GET['id'];
$post = Post::getById($post_id);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Post</title>
</head>
<body>
    <h2>Edit Post</h2>
    <form action="" method="POST">
        <label for="title">Title:</label><br>
        <input type="text" id="title" name="title" value="<?= htmlspecialchars($post->title) ?>" required><br><br>
        
        <label for="body">Body:</label><br>
        <textarea id="body" name="body" required cols="30" rows="10" ><?= htmlspecialchars($post->body) ?></textarea><br><br>

        <button type="submit">Save Changes</button>
    </form>
</body>
</html>
