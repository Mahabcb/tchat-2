<?php

namespace App\Repository;

use App\Connection;
use App\QueryBuilder;

class MessageRepository extends QueryBuilder
{
    private $db;

    public function __construct() 
    {
        $this->db = Connection::getMyPDO();
    }

    protected $table = "messages";

    
    public function findAll(?string $order = ""): array
    {
        $sql = $this->select($order);
        return $this->db->query($sql)->fetchAll();

    }

    public function find(int $id): array
    {
        $query = $this->db->prepare("SELECT * FROM {$this->table} WHERE id = :id");
        $query->execute(['id' => $id]);
        $item = $query->fetch();
        return $item;
    }

    public function addMessages(string $message, string $author)
    {
        $query = $this->db->prepare("INSERT INTO {$this->table} (message, author, date) VALUES (:message, :author, NOW())");
        $query->execute(['message' => $message, 'author' => $author]);
        header('Location: index.php');
        exit();
    }
}
