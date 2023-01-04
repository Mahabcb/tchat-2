<?php

namespace App;

use PDO;

abstract class Connection
{
    private static $instance = null;
    private const PDO_OPTIONS = [
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    ];

    /**
     * On utilise un singleton pour éviter d'instancier plusieurs pour un même utilisateur
     * @return PDO
     */
    public static function getMyPDO(): PDO
    {
        if(self::$instance === null){
            self::$instance = new PDO('mysql:host=localhost;dbname=chat', 'maha', 'root', self::PDO_OPTIONS);
        }
        return self::$instance;
    }
}



