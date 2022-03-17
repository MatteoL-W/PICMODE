<?php

namespace Models;

use PDO;
use PDOException;

class Database
{
    // Inspired by https://github.com/crjoseabraham/php-mvc/blob/version-2.0/src/models/Database.php

    private string $host = DB_HOST;
    private string $user = DB_USER;
    private string $password = DB_PASS;
    private string $name = DB_NAME;

    private PDO $db_handler;
    private $statement;
    private string $error;

    public function __construct()
    {
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->name;
        $options = [
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        ];

        // On essaie de créer une instance de PDO.
        try {
            $this->db_handler = new PDO($dsn, $this->user, $this->password, $options);
        } catch (PDOException $e) {
            $this->error = $e->getMessage();
            echo $this->error;
            die(1);
        }
    }
}