<?php

namespace App\Controllers;


use App\Models\TodoListModel;
use Exception;

class TodoListController
{

    // private $server;
    // private $username;
    // private $password;
    // private $database;
    // private $connection;
    private $todoListModel;


    public function __construct(TodoListModel $todoListModel)
    {

        $this->todoListModel = $todoListModel;
    }



    public function index()
    {
        // $result = $this->connection->getConnection()->query("SELECT * FROM tasks");
        // return $result->fetch(\PDO::FETCH_ASSOC);

        $results = $this->todoListModel->getAllData();

        return $results;
    }


    public function create($data)
    {
        $results = $this->todoListModel->create($data);

        if ($results) {
            return "La tarea se ha añadido correctamente.";
        } else {
            return "Error al añadir la tarea. Por favor, inténtalo de nuevo.";
        }
    }

    public function store()
    {
    }

    public function edit($id)
    {
    }

    public function update($id)
    {
    }

    public function destroy($id)
    {
        $results = $this->todoListModel->delete($id);
        if ($results) {
            return "La tarea se ha borrado correctamente.";
        } else {
            return "Error al borrar la tarea Por favor, inténtalo de nuevo.";
        }
    }
}
