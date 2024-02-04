<?php

namespace App\Models;

use Exception;

class TodoListModel
{
    private $connection;

    public function __construct()
    {

        $this->connection = new ConnectionDB;
        $this->connection->connection();
    }

    public function getAllData()
    {
        $query = "SELECT * FROM tasks";
        $statement = $this->connection->getConnection()->query($query);
        return $statement->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getDataById($id)
    {
        $query = "SELECT * FROM tasks WHERE id = ?";
        $statement = $this->connection->getConnection()->prepare($query);
        $statement->execute([$id]);
        return $statement->fetch(\PDO::FETCH_ASSOC);
    }

    public function createData($data)
    {
        try {
            $query = "INSERT INTO tasks (id, title, descripcion) VALUES (?, ?, ?)";
            $statement = $this->connection->getConnection()->prepare($query);
            return $statement->execute([$data['id'], $data['title'], $data['descripcion']]);
        } catch (Exception $e) {
            echo "Ha ocurrido un error:" . $e->getMessage();
        }
    }

    public function updateData($data)
    {
        try {
            $query = "UPDATE tasks SET title = ?, descripcion = ? WHERE id = ?";
            $statement = $this->connection->getConnection()->prepare($query);
            return $statement->execute([$data['title'], $data['descripcion'], $data['id']]);
        } catch (Exception $e) {
            echo "Ha ocurrido un error:" . $e->getMessage();
        }
    }

    public function deleteData($id)
    {
        $query = "DELETE FROM tasks WHERE id = ?";
        $statement = $this->connection->getConnection()->prepare($query);
        return $statement->execute([$id]);
    }

    public function markAsCompleted($id)
    {
        $query = "UPDATE tasks SET completed = 1 WHERE id = ?";
        $statement = $this->connection->getConnection()->prepare($query);
        return $statement->execute([$id]);
    }

    public function markAsNotCompleted($id)
    
    {   
        $query = "UPDATE tasks SET completed = 0 WHERE id = ?";
        $statement = $this->connection->getConnection()->prepare($query);
        return $statement->execute([$id]);
    }


}
