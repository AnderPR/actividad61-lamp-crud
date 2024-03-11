<?php
// Incluir el archivo de configuración con los parámetros de conexión a la base de datos
include("config.php");

// Verificar si se ha recibido un ID válido a través del método GET
if(isset($_GET['id']) && is_numeric($_GET['id'])) {
    // Obtener el ID del dato a eliminar
    $id = $_GET['id'];

    // Preparar una sentencia SQL para eliminar el registro de la base de datos
    $stmt = mysqli_prepare($mysqli, "DELETE FROM MaterialTrailRunning WHERE id=?");

    // Verificar si la preparación de la sentencia fue exitosa
    if ($stmt === false) {
        die("Error en la preparación de la sentencia: " . mysqli_error($mysqli));
    }

    // Enlazar el ID como parámetro a la sentencia preparada
    mysqli_stmt_bind_param($stmt, "i", $id);

    // Ejecutar la consulta preparada
    if(mysqli_stmt_execute($stmt)) {
        // Si la eliminación fue exitosa, redirigir a la página principal
        header("Location: index.php");
        exit; // Finalizar el script después de redirigir
    } else {
        // Si la eliminación falla, mostrar un mensaje de error
        echo "Error al intentar eliminar el registro.";
    }

    // Cerrar la sentencia preparada
    mysqli_stmt_close($stmt);
} else {
    // Si no se recibió un ID válido, mostrar un mensaje de error
    echo "ID inválido.";
}

// Cerrar la conexión de la base de datos
mysqli_close($mysqli);
?>