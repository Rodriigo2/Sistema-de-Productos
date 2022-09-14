<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Styles/styles.css">
    <title>Unidades de medida</title>
</head>
<body>
<div>
    <div class="header">
        <header>
            <h1>Unidades de medida</h1>
        </header>
    </div>
    <div class="nav">
        <nav>

        </nav>
    </div>
    <div class="main">
        <main>
            <div align="center" class="form-container">
                <h2>Formulario Unidad de Medida</h2>
                <form action="guardar_medida.php" method="post">
                    <table>
                    <tr><td><label for="desc_um">Descripción  U.medida</label></td>
                    <td><input type="text" name="desc_um" id="desc_um" placeholder="Ingrese la descripción" required></td></tr>
                    <tr><td><label for="abrev_um">Abreviatura</label></td>
                    <td><input type="text" name="abrev_um" id="abrev_um" placeholder="Ingrese la abreviatura" required></td></tr>
                    </table>

                    <input type="submit" name="btn-guardar" id="btn-guardar" value="Guardar unidad">
                </form>
            </div>
            <div class="listado">
            <table>
                <thead>
                <th align="left">#</th><th>Descripción </th><th>Abreviatura</th><th></th><th></th>
                </thead>
                <tbody>
                    <?php
                    include("../conexion/conexion.php");
                    $sql= "SELECT * FROM umedida order by cod_um";
                    $resultado=mysqli_query($con,$sql);

                    if(empty($resultado)){
                        echo "<tr><td>No hay datos que mostrar</td></tr>";
                    }else{
                        while($reg=mysqli_fetch_array($resultado)){
                            echo '<tr>';
                            echo '<td width=25%>'.$reg['cod_um'].'</td>';
                            echo '<td width=25%>'.$reg['desc_um'].'</td>';
                            echo '<td width=25%>'.$reg['abrev_um'].'</td>';
                            echo '<td width=12%><a href="modificar_medida.php?cod='.$reg['cod_um'].'"><img width="20px" src="img/edit.svg" alt="Editar"></a></td>';
                            echo '<td width=12%><a href="eliminar_medida.php?cod='.$reg['cod_um'].'"><img width="20px" src="img/delete.svg" alt="Eliminar"></a></td>';
                            echo '</tr>';
                        }
                    }
                    mysqli_close($con)

                    ?>
                </tbody>
            </table>
            </div>
        </main>
    </div>
    <div><a href="../producto/producto.php">Ir a productos</a></div>
</div>
</body>
</html>