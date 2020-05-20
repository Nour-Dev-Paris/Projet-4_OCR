<?php

namespace Projet4\model;
use \PDO;

class Manager // Connection à la BDD
{
    protected function dbConnect()
    {
        $db = new \PDO('mysql:host=127.0.0.1;dbname=projet4_blog;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        return $db;
    }
}