<?php
include_once("config.php");

$result = mysqli_query($mysqli, "SELECT * FROM MaterialTrailRunning ORDER BY id ASC");
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">   
    <title>Panel de control</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet">
    <style>
        .page-item.active .page-link {
            background-color: #007bff !important;
            border-color: #007bff !important;
        }
		.container-table {
            max-width: 800px;
            margin: auto;
        }
    </style>
</head>
<body id="page-top">
<div id="wrapper">
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
            <div class="sidebar-brand-icon">
                <i class="fas fa-chart-line"></i>
            </div>
            <div class="sidebar-brand-text mx-3">Panel de Control</div>
        </a>
        <hr class="sidebar-divider my-0">
        <hr class="sidebar-divider">
        <div class="sidebar-heading">Opciones</div>
        <li class="nav-item">
            <a class="nav-link" href="index.php">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Inicio</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="add.html">
                <i class="fas fa-plus"></i>
                <span>Alta</span>
            </a>
        </li>
    </ul>
    <div id="content-wrapper" class="d-flex flex-column">
        <div id="content">
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                <ul class="navbar-nav ml-auto">
                    <div class="topbar-divider d-none d-sm-block"></div>
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small">Usuario</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                Perfil
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Salir
                            </a>
                        </div>
                    </li>
                </ul>
            </nav>
            <div class="container-fluid">
                <h1 class="h3 mb-4 text-gray-800">Listado de material</h1>
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Codigo</th>
                                        <th>Marca</th>
                                        <th>Tipo de prenda</th>
                                        <th>Stock</th>
                                        <th>Precio</th>
                                        <th>Reciclado o NO</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Codigo</th>
                                        <th>Marca</th>
                                        <th>Tipo de prenda</th>
                                        <th>Stock</th>
                                        <th>Precio</th>
                                        <th>Reciclado o NO</th>
                                        <th>Acciones</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php
                                        while($res = mysqli_fetch_array($result)) {
                                            echo "<tr>\n";
                                            echo "<td>".$res['id']."</td>\n";
                                            echo "<td>".$res['marca']."</td>\n";
                                            echo "<td>".$res['tipo_prenda']."</td>\n";
                                            echo "<td>".$res['en_stock']."</td>\n";
                                            echo "<td>".$res['precio']."</td>\n";
                                            echo "<td>".$res['material_reciclado']."</td>\n";
                                            echo "<td>
                                                    <a href=\"edit.php?id=$res[id]\" class=\"btn btn-primary btn-sm\">Editar</a>
                                                    <a href=\"delete.php?id=$res[id]\" class=\"btn btn-danger btn-sm\" onClick=\"return confirm('¿Está seguro que desea eliminar el registro?')\">Eliminar</a>
                                                  </td>\n";
                                            echo "</tr>\n";
                                        }
                                        mysqli_close($mysqli);
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <span>Created by the IES Miguel Herrero team &copy; 2024</span>
            </div>
        </footer>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
<script>
    $(document).ready(function() {
        $('#dataTable').DataTable();
    });
</script>
</body>
</html>
