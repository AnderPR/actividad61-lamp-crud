<?php
/*Define los parámetros de conexión a la base de datos.
Los parámetros se tomas del fichero de variables de entorno: .env
DB_HOST: Nombre o dirección del gestor de BD MariaDB
DB_NAME: Nombre de la BD
DB_USER: Usuario de la BD
DB_PASSWORD: Contraseña del usuario e la BD
*/

define('DB_HOST', 'mariadb');
define('DB_NAME', 'trail');
define('DB_USER', 'ander');
define('DB_PASSWORD', 'ander');

/*
Otra alternativa es definir directamente los parámetros de conexión:
define('DB_HOST', 'mariadb');
define('DB_NAME', 'database_name_here');
define('DB_USER', 'username_here');
define('DB_PASSWORD', 'password_here');
*/


//Abre una nueva conexión al servidor MySQL/MariaDB
$mysqli = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
//Devuelve una descripción del último error producido en la conexión a la BD
if (mysqli_connect_errno()) {
    printf('Falló la conexión: %s\n', mysqli_connect_error());
    exit();
}

?>