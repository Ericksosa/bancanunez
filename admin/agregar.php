<?php

session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location:index.php");
} else {
    if ($_SESSION['usuario'] == "ok") {
        $nombreusu = $_SESSION["nombreusu"];
    }
}

?>
<?php include("config/bd.php") ?>
<?php
$SQL = $conexion->prepare("SELECT * FROM info_pantalla.sorteos order by Hora ASC;");
$SQL->execute();
$loterias = $SQL->fetchAll(PDO::FETCH_ASSOC);
$txtAccion = (isset($_POST['accion'])) ? $_POST['accion'] : "";
$txtprimera = (isset($_POST['primera'])) ? $_POST['primera'] : "";
$txtsegunda = (isset($_POST['segunda'])) ? $_POST['segunda'] : "";
$txttercera = (isset($_POST['tercera'])) ? $_POST['tercera'] : "";
$txtopciones = (isset($_POST['opciones'])) ? $_POST['opciones'] : "";



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="shortcut icon" href="../img/logo.png" type="image/x-icon">
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-8967621872641231" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Actualizar Loterías</title>
</head>

<body>
    <?php $url = "http://" . $_SERVER['HTTP_HOST']; ?>
    <nav class="navbar navbar-expand navbar-light bg-light">
        <div class="nav navbar-nav">
            <a class="nav-item nav-link" href="<?php echo $url; ?>/admin/template/cerrar.php">Cerrar Sesión</a>

        </div>
    </nav>
    <div class="col-md-5" style="margin: auto;">

        <div class="card">
            <div class="card-header">
                Actualizar Lotería
            </div>

            <div class="card-body">

                <form method="POST" enctype="multipart/form-data">




                    <div class="form-group">
                        <label for="txtNombre"> Lotería:</label>
                        <select class="form-control" name="opciones" id="">
                            <?php foreach ($loterias as $lot) { ?>
                                <option value="<?php echo $lot['idSorteos'] ?>">
                                    <?php echo $lot['Loteria'] . " " . date("g:i a", strtotime($lot['Hora'])) ?>
                                </option>


                            <?php } ?>
                        </select>
                    </div>


                    <div class="form-group">

                    </div>
                    <div class="form-group">
                        <label for="txtNombre"> Primer Número: </label>
                        <input type="number" class="form-control" name="primera" id="primera" placeholder="Ingrese el numero">
                    </div>
                    <div class="form-group">
                        <label for="txtNombre"> Segundo Número: </label>
                        <input type="number" class="form-control" name="segunda" id="segunda" placeholder="Ingrese el numero">
                    </div>
                    <div class="form-group">
                        <label for="txtNombre"> Tercer Número:</label>
                        <input type="number" class="form-control" name="tercera" id="tercera" placeholder="Ingrese el numero">
                    </div>


                    <?php

                    switch ($txtAccion) {
                        case 'Modificar':

                            $SQL = $conexion->prepare("UPDATE sorteos SET primera=:primera, segunda=:segunda, tercera=:tercera, color='verde' WHERE idSorteos= :id");
                            $SQL->bindParam(':primera', $txtprimera);
                            $SQL->bindParam(':segunda', $txtsegunda);
                            $SQL->bindParam(':tercera', $txttercera);
                            $SQL->bindParam(':id', $txtopciones);
                            $SQL->execute();
                            break;
                    }

                    ?>



                    <div class="btn-group" role="group" aria-label="">
                        <button type="submit" name="accion" <?php echo ($txtAccion == "Seleccionar") ? "disabled" : "" ?> value="Modificar" class="btn btn-success" onclick="alerta()">Actualizar</button>

                        <button type="submit" name="accion" <?php echo ($txtAccion == "Seleccionar") ? "disabled" : "" ?> value="Cancelar" class="btn btn-danger">Cancelar</button>
                    </div>

                </form>
            </div>

        </div>

    </div>

    <?php if ($_POST) { ?>
    <script>
        const alerta = setTimeout(function() {



            Swal.fire(
                'Excelente!',
                'La loteria ha sido actualizada correctamente!',
                'success'
            )
        }, 500);
    </script>
<?php }  ?>
</body>

</html>