
<?php

$editedTask = $todoListController->edit($id);
?>

<form method='POST' action='./handler.php'>
    <input type='hidden' name='id' value='<?= $editedTask['id'] ?>'>
    <div class="form-group">
        <label for="title">Titulo</label>
        <input type="text" class="form-control" id="titleEdit" name="titleEdit" value="<?= $editedTask['title'] ?>">
    </div>
    <div class="form-group">
        <label for="description">Descripcion</label>
        <textarea class="form-control" id="descripcionEdit" name="descripcionEdit" rows="3"><?= $editedTask['descripcion'] ?></textarea>
    </div>
    <button type="submit" class="btn btn-primary" name="update">Actualizar</button>
</form>
