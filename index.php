<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web Php</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>
    <?php
    if (!empty($_GET['id'])) {
        include("conexion.php");
        $id = $_GET['id'];
        $sql = $conn->query("delete from persona1 where id=$id");
        if ($sql == 1) {
            echo "<p class='alert alert-primary text-center'>Registro eliminado con exito</p>";
        } else {
            echo "<p class='alert alert-primary'>Error al eliminar</p>";
        }
    }
    ?>
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-lg-4">
                <form action="registrarUsuario.php" method="POST" class="border p-2">
                    <div>
                        <label class="form-label" for="nombre">Nombre:</label>
                        <input class="form-control" name="name" type="text">
                    </div>
                    <div>
                        <label class="form-label" for="nombre">Apellido:</label>
                        <input class="form-control" name="lastName" type="text">
                    </div>
                    <div>
                        <label class="form-label" for="nombre">email:</label>
                        <input class="form-control" name="email" type="email" require>
                    </div>
                    <div>
                        <label class="form-label" for="edad">Edad:</label>
                        <input class="form-control" name="edad" type="number" min="0" max="150" required>
                    </div>
                    <div>
                        <label class="form-label" for="peso">Peso (kg):</label>
                        <input class="form-control" name="peso" type="number" step="0.01" min="0" required>
                    </div>
                    <div class="text-center my-2">
                        <button class="btn btn-secondary">Enviar</button>
                    </div>
                </form>

            </div>
            <div class="col-sm-12 col-lg-8">
                <table class="table table-striped table-hover text-center">
                    <thead class="table-danger">
                        <tr>
                            <th>#</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Email</th>
                            <th>Edad</th>
                            <th>Peso</th>
                            <th></th>
                        </tr>

                    </thead>
                    <tbody>
                        <?php
                        include "conexion.php";
                        $sql = $conn->query("select * from persona1");
                        while ($row = $sql->fetch_object()) { ?>
                            <tr>
                                <td><?= $row->id ?></td>
                                <td><?= $row->nombre ?></td>
                                <td><?= $row->apellido ?></td>
                                <td><?= $row->email ?></td>
                                <td><?= $row->edad ?></td>
                                <td><?= $row->peso ?></td>
                                <td>
                                    <a href="modificarUsuario.php?id=<?= $row->id ?>"><i class="bi bi-pencil-fill"></i></a>
                                    <a href="index.php?id=<?= $row->id ?>"><i class="bi bi-trash3"></i></a>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

</body>

</html>