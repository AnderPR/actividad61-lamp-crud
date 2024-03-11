<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">	
	<title>Alta de material</title>
<!--	
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
-->	
</head>

<body>
<!--	
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
-->
<div>
	<header>
		<h1>Panel de Control</h1>
	</header>

	<main>

<?php
//Incluye fichero con parámetros de conexión a la base de datos
include_once("config.php");

/*Comprueba si hemos llegado a esta página PHP a través del formulario de altas. 
En este caso comprueba la información "inserta" procedente del botón Agregar del formulario de altas
Transacción de datos utilizando el método: POST
*/
if(isset($_POST['inserta'])) 
{
//Obtiene los datos (name, surname y age) a partir del formulario de alta por el método POST (Se envía a través del body del HTTP Request. No aparece en la URL)
	$id = mysqli_real_escape_string($mysqli, $_POST['id']);
	$marca = mysqli_real_escape_string($mysqli, $_POST['marca']);
	$tipo_prenda = mysqli_real_escape_string($mysqli, $_POST['tipo_prenda']);
	$en_stock = mysqli_real_escape_string($mysqli, $_POST['en_stock']);
	$precio = mysqli_real_escape_string($mysqli, $_POST['precio']);
	$material_reciclado = mysqli_real_escape_string($mysqli, $_POST['material_reciclado']);
/*Con mysqli_real_scape_string protege caracteres especiales en una cadena para ser usada en una sentencia SQL.
Esta función es usada para crear una cadena SQL legal que se puede usar en una sentencia SQL. 
Los caracteres codificados son NUL (ASCII 0), \n, \r, \, ', ", y Control-Z.*/

//Comprueba si existen campos vacíos
	if(empty($marca) || empty($tipo_prenda) || empty($en_stock) || empty($precio) || empty($material_reciclado)) 
	{
		if(empty($marca)) {
			echo "<font color='red'>Campo nombre vacío.</font><br/>";
		}

		if(empty($tipo_prenda)) {
			echo "<font color='red'>Campo apellido vacío.</font><br/>";
		}

		if(empty($en_stock)) {
			echo "<font color='red'>Campo edad vacío.</font><br/>";
		}
		
		if(empty($precio)) {
			echo "<font color='red'>Campo edad vacío.</font><br/>";
		}
		
		if(empty($material_reciclado)) {
			echo "<font color='red'>Campo edad vacío.</font><br/>";
		}
//Enlace a la página anterior
		echo "<a href='javascript:self.history.back();'>Volver atras</a>";
	} //fin si
	else 
	{
//Prepara una sentencia SQL para su ejecución. En este caso el alta de un registro de la BD.		
		$stmt = mysqli_prepare($mysqli, "INSERT INTO MaterialTrailRunning (marca,tipo_prenda,en_stock,precio,material_reciclado) VALUES(?,?,?,?,?)");
/*Enlaza variables como parámetros a una setencia preparada. 
i: La variable correspondiente tiene tipo entero
d: La variable correspondiente tiene tipo doble
s:	La variable correspondiente tiene tipo cadena
*/		
		mysqli_stmt_bind_param($stmt, "ssiis", $marca, $tipo_prenda, $en_stock, $precio, $material_reciclado);
//Ejecuta una consulta preparada		
		mysqli_stmt_execute( $stmt);
//Libera la memoria donde se almacenó el resultado		
		mysqli_stmt_free_result($stmt);
//Cierra la sentencia preparada		
		mysqli_stmt_close($stmt);
//Muestra mensaje exitoso		
		echo "<div>Datos añadidos correctamente</div>";
		echo "<a href='index.php'>Ver resultado</a>";
	}//fin sino
}

//Cierra la conexión
mysqli_close($mysqli);
?>

	</main>
	<footer>
    Created by the IES Miguel Herrero team &copy; 2024
  	</footer>
</div>
</body>
</html>