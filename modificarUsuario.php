<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>

    <div class="container">
        <div class="row m-auto">
            <div class="col-5 m-auto">
                <form action="updateUser.php" method="POST" class="border p-2">
                    <div>
                        <input type="text" name="idUser" value="<?= $_GET['id'] ?>" hidden>
                    </div>
                    <?php
                    include "conexion.php";
                    $id = $_GET['id'];
                    $sql = $conn->query("select * from persona1 where id =$id");
                    while ($row = $sql->fetch_object()) { ?>

                        <div>
                            <label class="form-label" for="nombre">Nombre:</label>
                            <input class="form-control" value="<?= $row->nombre ?>" name="name" type="text">
                        </div>
                        <div>
                            <label class="form-label" for="nombre">Apellido:</label>
                            <input class="form-control" value="<?=$row->apellido?>" name="lastName" type="text">
                        </div>
                        <div>
                            <label class="form-label" for="nombre">email:</label>
                            <input class="form-control" value="<?=$row->email?>" name="email" type="email" require>
                        </div>
                        <div>
                            <label class="form-label" for="edad">Edad:</label>
                            <input class="form-control" value="<?=$row->edad?>" name="edad" type="number" min="0" max="150" required>
                        </div>
                        <div>
                            <label class="form-label" for="peso">Peso (kg):</label>
                            <input class="form-control" value="<?=$row->peso?>" name="peso" type="number" step="0.01" min="0" required>
                        </div>

                    <?php }

                    ?>
                    <div class="text-center my-2">
                        <button class="btn btn-secondary">Modificar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>