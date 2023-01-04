<?php

namespace App;

use App\Connection;
/**
 * 
 * la classe qui se charge de faire des requetes SQL
 */
abstract class QueryBuilder {
    
    private $connection;
    protected $table;

    public function __construct() 
    {
        $this->connection = Connection::getMyPDO();
    }

    public function select(string $order = "date DESC") 
    {
        $sql = "SELECT * from {$this->table}";
        if($order) {
            $sql .= " ORDER BY $order";
        }
        return $sql;
    }

    public function insert(string $author, string $contents)
    {
        $sql = "INSERT INTO {$this->table} SET author = :author, content = :content, created_at = NOW()";
        $query = $this->connection->prepare("INSERT INTO messages SET author = :author, content = :content, created_at = NOW()");
        $query->execute(compact('author', 'content'));
    }

    
}
