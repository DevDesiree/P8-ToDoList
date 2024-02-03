<?php

namespace App\Models;

use Exception;

class TodoListModel
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

        $this->connection = new ConnectionDB(
            $this->server,
            $this->username,
            $this->password,
            $this->database
        );

        $this->connection->connection();
    }

    public function getAllData()
    {
        $query = "SELECT * FROM tasks";
        $statement = $this->connection->getConnection()->query($query);
        return $statement->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function create($data)
    {
        try {
            $query = "INSERT INTO tasks (id, title, descripcion) VALUES (?, ?, ?)";
            $statement = $this->connection->getConnection()->prepare($query);
            return $statement->execute([$data['id'], $data['title'], $data['descripcion']]);
        } catch (Exception $e) {
            echo "Ha ocurrido un error:" . $e->getMessage();
        }
    }

    public function update($id, $data)
    {
    }

    public function delete($id)
    {
        $query = "DELETE FROM tasks WHERE id = ?";
        $statement = $this->connection->getConnection()->prepare($query);
        return $statement->execute([$id]);

    }
}