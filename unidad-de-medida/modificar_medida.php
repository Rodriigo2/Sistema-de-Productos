<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Styles/styles.css">
    <title>Unidades de medida - Editar</title>
</head>
<body>
<div>
    <div class="header">
        <header>
            <h1> Editar Unidad de medida</h1>
        </header>
    </div>
    <div class="nav">
        <nav>

        </nav>
    </div>
    <div class="main">
        <main>
            <div align="center" class="form-container">
                <h2>Editar</h2>

                <?php
                $cod = $_GET['cod'];
                include("../conexion/conexion.php");
                $sql= "SELECT * FROM umedida where cod_um=$cod";
                $resultado=mysqli_query($con,$sql);
                $reg = mysqli_fetch_array($resultado);
                mysqli_close($con);
                ?>
                <form action="actualizar_medida.php" method="post">
                    <table>
                    <tr><td><label for="cod_um">Descripción  U.medida</label></td>
                    <td><input type="text" name="cod_um" id="cod_um" placeholder="Ingrese el código" required value="<?php echo $reg['cod_um'] ?>"></td></tr>
                    <tr><td><label for="desc_um">Descripción  U.medida</label></td>
                    <td><input type="text" name="desc_um" id="desc_um" placeholder="Ingrese la descripción" required value="<?php echo $reg['desc_um'] ?>"></td></tr>
                    <tr><td><label for="abrev_um">Abreviatura</label></td>
                    <td><input type="text" name="abrev_um" id="abrev_um" placeholder="Ingrese la abreviatura" required value="<?php echo $reg['abrev_um'] ?>"></td></tr>
                    </table>

                    <input type="submit" name="btn-actualizar" id="btn-actualizar" value="Actualizar unidad">
                </form>
            </div>
</body>
</html>