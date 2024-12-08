<?php
require_once 'config/bootstrap.php';

Post::$pdo = new PDO('mysql:host=localhost;dbname=oop_teach', 'root', '');

$post_id = $_GET['id'] ?? null;
if ($post_id) {
    $post = Post::getById($post_id);
} else {
    die("Post topilmadi!");
} 


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post <?= $post->id ?></title>

</head>

<body>
    <div>
        <h4><?= $post->id . '-' . $post->title ?></h4>
        <p><?= $post->body ?></p>
        <small><?=$post->created_at?>></small>
        <a href="edit.php?id=<?= $post->id ?>"><button>Tahrirlash</button></a>
        <a href='delete.php?id=<?= $post->id ?>' class="btn" onclick='return confirm("Rostdan ochirmoqchimisan")'><button>O'chirish</button></a>
    </div>
</body>

</html>