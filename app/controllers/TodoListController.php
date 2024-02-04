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
        $filter = isset($_GET['filter']) ? $_GET['filter'] : null;
        $results = $this->todoListModel->getAllData($filter);
        return $results;
    }


    public function create($data)
    {   
        $results = $this->todoListModel->createData($data);
        
        return $results;
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
        $result = $this->todoListModel->updateData($data);
        return $result;
    }

    public function destroy($id)
    {
        $results = $this->todoListModel->deleteData($id);
        return $results;
    }

    public function markedTask($id)
    {
        return $this->todoListModel->markAsCompleted($id);
    }

    public function notMarkedTask($id)
    {
        return $this->todoListModel->markAsNotCompleted($id);
    }

}
