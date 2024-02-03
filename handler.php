<?php

use App\Controllers\TodoListController;
use App\Models\TodoListModel;

require_once 'vendor/autoload.php';
include_once "./config/server.php";

$todoListModel = new TodoListModel();
$todoListController = new TodoListController($todoListModel);



if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if ($_POST['titleEdit'] && $_POST['descripcionEdit']) {
        $id = $_POST['id'];
        $data = [
            'title' => $_POST['titleEdit'],
            'descripcion' => $_POST['descripcionEdit'],
        ];
        $result = $todoListController->update($id, $data);
        header("location: index.php");
    } elseif (isset($_POST['title']) && (isset($_POST['descripcion']))) {
        $data = [
            'title' => $_POST['title'],
            'descripcion' => $_POST['descripcion'],
        ];
        $result = $todoListController->create($data);
        header("location: index.php");
    } elseif (isset($_POST['edit'])) {
        $id = $_POST['id'];
        $editedTask = $todoListController->edit($id);
        include "app/views/editView.php";
    } elseif (isset($_POST['delete'])) {
        $id = $_POST['id'];
        $result = $todoListController->destroy($id);
        header("location: index.php");
    } else {
        echo "Acción no reconocida";
    }
}

$tasksModel = $todoListController->index();
