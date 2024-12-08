<?php

require_once 'config/bootstrap.php';

$posts =  Post::getAll();  


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OOP Blog</title>
</head>
<body>
    <h1>OOP Blog</h1>
    <a href="create.php">Creat post</a>
    <ul>
        <?php foreach ($posts as $post) : ?>
        <li>
            <a href="post.php?id=<?= $post->id ?>"><h4><?= $post->id . '-' . $post->title ?></h4></a>
            <p><?= $post->body ?></p>
        </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>