<?php

namespace App\Entity;

class User {
    
    private int $id;
    private string $name;

    public function getId() : int
    {
        return $this->id;
    }

    public function getName() : string
    {
        return $this->name;
    }

    public function setName(string $fullName) : self
    {
        $this->name = $fullName;
        return $this;
    }
}