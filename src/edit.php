<?php
include_once("config.php");

if(isset($_POST['modifica'])) {
    $id = mysqli_real_escape_string($mysqli, $_POST['id']);
    $marca = mysqli_real_escape_string($mysqli, $_POST['marca']);
    $tipo_prenda = mysqli_real_escape_string($mysqli, $_POST['tipo_prenda']);
    $en_stock = mysqli_real_escape_string($mysqli, $_POST['en_stock']);
    $precio = mysqli_real_escape_string($mysqli, $_POST['precio']);
    $material_reciclado = mysqli_real_escape_string($mysqli, $_POST['material_reciclado']);

    if(empty($marca) || empty($tipo_prenda) || empty($en_stock) || empty($precio) || empty($material_reciclado)) {
        echo "<font color='red'>Por favor, complete todos los campos.</font><br/>";
    } else {
        $stmt = mysqli_prepare($mysqli, "UPDATE MaterialTrailRunning SET marca=?, tipo_prenda=?, en_stock=?, precio=?, material_reciclado=? WHERE id=?");
        mysqli_stmt_bind_param($stmt, "sssisi", $marca, $tipo_prenda, $en_stock, $precio, $material_reciclado, $id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_free_result($stmt);
        mysqli_stmt_close($stmt);

        header("Location: index.php");
    }
}

$id = $_GET['id'];
$id = mysqli_real_escape_string($mysqli, $id);

$stmt = mysqli_prepare($mysqli, "SELECT marca, tipo_prenda, en_stock, precio, material_reciclado FROM MaterialTrailRunning WHERE id=?");
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
mysqli_stmt_bind_result($stmt, $marca, $tipo_prenda, $en_stock, $precio, $material_reciclado);
mysqli_stmt_fetch($stmt);
mysqli_stmt_free_result($stmt);
mysqli_stmt_close($stmt);
mysqli_close($mysqli);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">   
    <title>Modificación material</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .container-table {
            max-width: 800px;
            margin: auto;
        }
    </style>
</head>

<body>
<div class="container container-table">
    <header>
        <h1>Panel de Control</h1>
    </header>
    
    <main>                
    <ul>
        <li><a href="index.php">Inicio</a></li>
        <li><a href="add.html">Alta</a></li>
    </ul>
    <h2>Modificación material</h2>
    <form action="edit.php" method="post">
        <div class="form-group">
            <label for="marca">Marca</label>
            <input type="text" class="form-control" name="marca" id="marca" value="<?php echo $marca;?>" required>
        </div>

        <div class="form-group">
            <label for="tipo_prenda">Tipo de prenda</label>
            <input type="text" class="form-control" name="tipo_prenda" id="tipo_prenda" value="<?php echo $tipo_prenda;?>" required>
        </div>

        <div class="form-group">
            <label for="en_stock">Stock</label>
            <input type="number" class="form-control" name="en_stock" id="en_stock" value="<?php echo $en_stock;?>" required>
        </div>

        <div class="form-group">
            <label for="precio">Precio</label>
            <input type="number" class="form-control" name="precio" id="precio" value="<?php echo $precio;?>" required>
        </div>

        <div class="form-group">
            <label for="material_reciclado">Reciclado o NO</label>
            <input type="text" class="form-control" name="material_reciclado" id="material_reciclado" value="<?php echo $material_reciclado;?>" required>
        </div>

        <input type="hidden" name="id" value="<?php echo $id;?>">
        <input type="submit" name="modifica" class="btn btn-primary" value="Guardar">
        <a href="index.php" class="btn btn-secondary">Cancelar</a>
    </form>
    </main>    
    <footer>
        Created by the IES Miguel Herrero team &copy; 2024
    </footer>
</div>
</body>
</html>
