<?php
require_once './vendor/autoload.php';
include "./handler.php";

// $data = new \App\Controllers\TodoListController();
// $data->index();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ToDo List PHP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./public/css/styles.css">
</head>

<body>
    <div class="container-sm">
        <form action="./handler.php" method="POST">
            <div class="form-group">
                <label for="title">Titulo</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Escribe el titulo">
            </div>
            <div class="form-group">
                <label for="description">Descripcion</label>
                <textarea class="form-control" id="descripcion" name="descripcion" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Crear</button>
        </form>
    </div>
    <div class="tasks_list">
        <h2>Lista de Tareas</h2>
    </div>

    <div class="card">
    <?php foreach ($tasksModel as $task) : ?>
        <div class='card-body'>
            <h3 class='card-title'><?= $task['title'] ?></h3>
            <span><?= $task['id'] ?></span>
            <p class='card-text'><?= $task['descripcion'] ?></p>
            <form method='POST' action='./handler.php'>
                <input type='hidden' name='id' value='<?= $task['id'] ?>'>
                <button class='btn btn-warning' type='submit' name='edit'>Editar</button>
                <button type='submit' class='btn btn-danger' name='delete'>Borrar</button>
            </form>
        </div>
    <?php endforeach; ?>
</div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>