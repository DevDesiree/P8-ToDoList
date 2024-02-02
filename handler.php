<?php

use App\Controllers\TodoListController;
use App\Models\TodoListModel;

require_once 'vendor/autoload.php';
include_once "./config/server.php";

$tasksModel = new TodoListModel();
$todoListController = new TodoListController($tasksModel);



if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['title']) && (isset($_POST['descripcion']))) {
        $data = [
            'title' => $_POST['title'],
            'descripcion' => $_POST['descripcion'],
        ];
        $result = $todoListController->create($data);
        echo $result;
    } elseif (isset($_POST['update'])) {
        $id = $_POST['id'];
        $result = $todoListController->update($id, $data);
        echo $result;
    } elseif (isset($_POST['delete'])) {
        $id = $_POST['id'];
        $result = $todoListController->destroy($id);
        echo $result;
    } else {
        echo "Acción no reconocida";
    }
    header("location: index.php");
}

$tasksModel = $todoListController->index();