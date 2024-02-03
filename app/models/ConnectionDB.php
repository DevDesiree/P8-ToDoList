<?php

namespace App\Models;

include_once "./config/server.php";

class ConnectionDB
{
    private $server;
    private $username;
    private $password;
    private $database;
    private $connection;


    public function __construct()
    {
        $this->server = DB_SERVER;
        $this->username = DB_USER;
        $this->password = DB_PASSWORD;
        $this->database = DB_NAME;
    }

    public function connection()
    {

        try {
            $this->connection = new \PDO("mysql:host=$this->server;dbname=$this->database", $this->username, $this->password);
            $this->connection->prepare("SET NAMES 'utf8'");
        } catch (\PDOException $e) {
            echo "No se pudo obtener conexión con la Base de Datos" . $e->getMessage();
        }
    }

    public function getConnection()
    {
        return $this->connection;
    }
}


