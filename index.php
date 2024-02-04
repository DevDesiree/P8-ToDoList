<?php
require_once './vendor/autoload.php';
include "./handler.php";

include "./app/views/inc/header.php";
?>

<body>
    <main>
        <div class="container-sm">
            <form action="./handler.php" method="POST">
                <h2>Crear Nueva Tarea</h2>
                <div class="form-group">
                    <label for="title">Título</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Escribe el título de tu tarea">
                </div>
                <div class="form-group">
                    <label for="description">Descripción</label>
                    <textarea class="form-control" id="descripcion" name="descripcion" rows="3" placeholder="Escribe la descripción de tu tarea"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Crear Tarea</button>
            </form>
        </div>
        <div class="tasks_list">
            <h2>Lista de Tareas</h2>
        </div>

        <div class="container-sm">
            <?php
            $currentFilter = isset($_GET['filter']) ? $_GET['filter'] : 'all';
            ?>

            <div class="filter_buttons">
                <a href="?filter=all" class="btn btn-secondary <?= ($currentFilter == 'all') ? 'active' : '' ?>">Mostrar Todas</a>
                <a href="?filter=completed" class="btn btn-secondary <?= ($currentFilter == 'completed') ? 'active' : '' ?>">Completadas</a>
                <a href="?filter=not_completed" class="btn btn-secondary <?= ($currentFilter == 'not_completed') ? 'active' : '' ?>">No Completadas</a>
            </div>
            <table class="table table-dark table-bordered table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Titulo</th>
                        <th>Descripción</th>
                        <th>Creación</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($tasksModel as $task) : ?>
                        <tr class="<?= $task['completed'] ? 'completed_task' : '' ?>">
                            <td><?= $task['id'] ?></td>
                            <td><?= $task['title'] ?></td>
                            <td><?= $task['descripcion'] ?></td>
                            <td><?= $task['creation_date'] ?></td>
                            <td><?= $task['completed'] ? 'Completado' : 'Por Completar' ?></td>
                            <td>
                                <form method='POST' action='./handler.php' class="form_edit">
                                    <input type="hidden" name="action" value="complete">
                                    <input type="checkbox" class="form-check-input" name="completed" <?= $task['completed'] ? 'checked' : '' ?> onchange="this.form.submit()">
                                    <input type='hidden' name='id' value='<?= $task['id'] ?>'>
                                    <button class='btn btn-warning' type='submit' name='edit'>Editar</button>
                                    <button type='submit' class='btn btn-danger' name='delete'>Borrar</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>


    </main>

    <?php
    include "./app/views/inc/footer.php";
    ?>