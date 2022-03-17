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
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
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

    /**
     * @brief Effectuer la requête SQL
     * @param string $sql_query
     */
    public function query(string $sql_query) : void
    {
        $this->statement = $this->db_handler->prepare($sql_query);
    }

    /**
     * @brief Bind la valeur inconnue si nécessaire
     * @param string $parameter
     * @param string $value
     */
    public function bind(string $parameter, string $value): void
    {
        $type = match (true) {
            is_int($value) => PDO::PARAM_INT,
            is_bool($value) => PDO::PARAM_BOOL,
            is_null($value) => PDO::PARAM_NULL,
            default => PDO::PARAM_STR,
        };

        $this->statement->bindValue($parameter, $value, $type);
    }

    /**
     * @brief Executer la requête
     * @return mixed
     */
    public function execute(): mixed
    {
        return $this->statement->execute();
    }

    /**
     * @brief Obtenir la réponse sous forme de tableau d'objets
     * @return mixed
     */
    public function fetchAll(): mixed
    {
        $this->execute();
        return $this->statement->fetchAll(PDO::FETCH_OBJ);
    }

    /**
     * @brief Obtenir la réponse sous forme d'un seul objet
     * @return mixed
     */
    public function fetch(): mixed
    {
        $this->execute();
        return $this->statement->fetch(PDO::FETCH_OBJ);
    }

}