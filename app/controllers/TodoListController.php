<?php

namespace App\Controllers;


use App\Models\TodoListModel;

class TodoListController
{
    private $todoListModel;


    public function __construct(TodoListModel $todoListModel)
    {

        $this->todoListModel = $todoListModel;
    }



    public function index()
    {
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
        $result = $this->todoListModel->getDataById($id);
        return $result;
    }

    public function update($id, $data)
    {
        $data['id'] = $id;
        $result = $this->todoListModel->update($data);

        if ($result) {
            return "La tarea se ha actualizado correctamente.";
        } else {
            return "Error al actualizar la tarea. Por favor, inténtalo de nuevo.";
        }
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
