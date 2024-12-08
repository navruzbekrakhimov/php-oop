<?php
class Post{
    public static $pdo;
    public $id;
    public $title;
    public $body;
    public $created_at;

    // Postlarni olish
    public static function getAll()
    {
        $stmt = self::$pdo->prepare("SELECT * FROM posts");
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Post');
        $stmt->execute();
        return $stmt->fetchAll();
    }

    // ID orqali postni olish
    public static function getById($id)
    {
        $stmt = self::$pdo->prepare("SELECT * FROM posts WHERE id = ?");
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Post');
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    // Yangi postni yaratish
    public static function create($title, $body)
    {
        $stmt = self::$pdo->prepare("INSERT INTO posts (title, body) VALUES (:title, :body)");
        $stmt->execute(['title' => $title, 'body' => $body]);
        return $stmt->rowCount();
    }

    // Postni saqlash (yangilash yoki yaratish)
    public function save()
    {
        if ($this->id) {
            // Mavjud postni yangilash
            $stmt = self::$pdo->prepare("UPDATE posts SET title = :title, body = :body WHERE id = :id");
            $stmt->execute(['id' => $this->id, 'title' => $this->title, 'body' => $this->body]);
        } else {
            // Yangi postni yaratish
            $stmt = self::$pdo->prepare("INSERT INTO posts (title, body) VALUES (:title, :body)");
            $stmt->execute(['title' => $this->title, 'body' => $this->body]);
            $this->id = self::$pdo->lastInsertId(); // IDni yangilash
        }
    }
    public static function delete($id)
    {
        $stmt = self::$pdo->prepare("DELETE FROM posts WHERE id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->rowCount(); // O'chirilgan qatorlar sonini qaytaradi
    }
}
   

