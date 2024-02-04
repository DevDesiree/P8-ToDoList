<?php
$editedTask = $todoListController->edit($id);
include "./app/views/inc/header.php";
?>
<main>
    <div class="container-sm">
        <form method='POST' action='./handler.php'>
            <h2>Editar Tarea</h2>
            <input type='hidden' name='id' value='<?= $editedTask['id'] ?>'>
            <div class="form-group">
                <label for="titleEdit">Título*</label>
                <input type="text" class="form-control" id="titleEdit" name="titleEdit" value="<?= $editedTask['title'] ?>" placeholder="Campo obligatorio" required>
            </div>
            <div class="form-group">
                <label for="descripcionEdit">Descripción</label>
                <textarea class="form-control" id="descripcionEdit" name="descripcionEdit" rows="3"><?= $editedTask['descripcion'] ?></textarea>
            </div>
            <div class="content_edit_buttons">
                <button type="submit" class="btn btn-success" name="update">Actualizar Tarea</button>
                <a href="index.php" class="btn btn-danger">Cancelar</a>
            </div>
        </form>
    </div>
</main>

<?php
include "./app/views/inc/footer.php";
?>