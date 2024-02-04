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

    public function getAllData($filter = null)
    {
        try {
            $query = "SELECT * FROM tasks";

            if ($filter !== null) {
                if ($filter === 'completed') {
                    $query .= " WHERE completed = 1";
                } elseif ($filter === 'not_completed') {
                    $query .= " WHERE completed = 0";
                }
            }

            $query .= " ORDER BY creation_date DESC";

            $statement = $this->connection->getConnection()->query($query);
            return $statement->fetchAll(\PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo "Ha ocurrido un error al mostrar todas las tareas: " . $e->getMessage();
        }
    }

    public function getDataById($id)
    {
        try {
            $query = "SELECT * FROM tasks WHERE id = ?";
            $statement = $this->connection->getConnection()->prepare($query);
            $statement->execute([$id]);
            return $statement->fetch(\PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo "Ha ocurrido un error: " . $e->getMessage();
        }
    }

    public function createData($data)
    {
        try {
            $query = "INSERT INTO tasks (id, title, descripcion, creation_date, completed) VALUES (?, ?, ?, NOW(), 0)";
            $statement = $this->connection->getConnection()->prepare($query);
            $values = [$data['id'], $data['title'], $data['descripcion']];
            return $statement->execute($values);
        } catch (Exception $e) {
            echo "Ha ocurrido un error al crear la tarea: " . $e->getMessage();
        }
    }

    public function updateData($data)
    {
        try {
            $query = "UPDATE tasks SET title = ?, descripcion = ? WHERE id = ?";
            $statement = $this->connection->getConnection()->prepare($query);
            return $statement->execute([$data['title'], $data['descripcion'], $data['id']]);
        } catch (Exception $e) {
            echo "Ha ocurrido un error al actualizar la tarea:" . $e->getMessage();
        }
    }

    public function deleteData($id)
    {
        try {
            $query = "DELETE FROM tasks WHERE id = ?";
            $statement = $this->connection->getConnection()->prepare($query);
            return $statement->execute([$id]);
        } catch (Exception $e) {
            echo "Ha ocurrido un error al borrar la tarea: " . $e->getMessage();
        }
    }

    public function markAsCompleted($id)
    {
        try {
            $query = "UPDATE tasks SET completed = 1 WHERE id = ?";
            $statement = $this->connection->getConnection()->prepare($query);
            return $statement->execute([$id]);
        } catch (Exception $e) {
            echo "Ocurrio un error: " . $e->getMessage();
            return false;
        }
    }

    public function markAsNotCompleted($id)
    {
        try {
            $query = "UPDATE tasks SET completed = 0 WHERE id = ?";
            $statement = $this->connection->getConnection()->prepare($query);
            return $statement->execute([$id]);
        } catch (Exception $e) {
            echo "Ocurrio un error: " . $e->getMessage();
            return false;
        }
    }
}
