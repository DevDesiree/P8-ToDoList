<?php
$editedTask = $todoListController->edit($id);
include "./app/views/inc/header.php";
?>
<main>
    <div class="container-sm">
        <form method='POST' action='./handler.php'>
            <input type='hidden' name='id' value='<?= $editedTask['id'] ?>'>
            <div class="form-group">
                <label for="titleEdit">Titulo</label>
                <input type="text" class="form-control" id="titleEdit" name="titleEdit" value="<?= $editedTask['title'] ?>">
            </div>
            <div class="form-group">
                <label for="descripcionEdit">Descripcion</label>
                <textarea class="form-control" id="descripcionEdit" name="descripcionEdit" rows="3"><?= $editedTask['descripcion'] ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary" name="update">Actualizar</button>
        </form>
    </div>
</main>

<?php
include "./app/views/inc/footer.php";
?>