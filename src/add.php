<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">   
    <title>Alta de material</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
<div class="container">
    <header>
        <h1 class="mt-5">Panel de Control</h1>
    </header>

    <main class="mt-4">                
        <?php
        include_once("config.php");

        if(isset($_POST['inserta'])) 
        {
            $id = mysqli_real_escape_string($mysqli, $_POST['id']);
            $marca = mysqli_real_escape_string($mysqli, $_POST['marca']);
            $tipo_prenda = mysqli_real_escape_string($mysqli, $_POST['tipo_prenda']);
            $en_stock = mysqli_real_escape_string($mysqli, $_POST['en_stock']);
            $precio = mysqli_real_escape_string($mysqli, $_POST['precio']);
            $material_reciclado = mysqli_real_escape_string($mysqli, $_POST['material_reciclado']);

            if(empty($marca) || empty($tipo_prenda) || empty($en_stock) || empty($precio) || empty($material_reciclado)) 
            {
                echo "<div class='alert alert-danger' role='alert'>Por favor, complete todos los campos.</div>";
            } else {
                $stmt = mysqli_prepare($mysqli, "INSERT INTO MaterialTrailRunning (marca, tipo_prenda, en_stock, precio, material_reciclado) VALUES (?, ?, ?, ?, ?)");
                mysqli_stmt_bind_param($stmt, "ssdds", $marca, $tipo_prenda, $en_stock, $precio, $material_reciclado);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_free_result($stmt);
                mysqli_stmt_close($stmt);

                echo "<div class='alert alert-success' role='alert'>Datos añadidos correctamente</div>";
                echo "<a href='index.php' class='btn btn-primary'>Ver resultado</a>";
            }
        }

        mysqli_close($mysqli);
        ?>
    </main>
    <footer class="mt-5">
        <p>Created by the IES Miguel Herrero team &copy; 2024</p>
    </footer>
</div>
</body>
</html>
