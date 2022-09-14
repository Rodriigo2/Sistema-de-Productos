<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualización de Precios</title>
</head>
<body>
    <div>
    <header><h1>Actualización de Precios</h1></header>
    <nav></nav>
    <main>
        <div>
            <h2>Por porcentaje</h2>
            <form action="precio_actxporc.php" method="Post">
            <table>
            <tr><td><label for="operacion[]">Operación</label></td>
            <td><select name="operacion[]" id="operacion[]">
            <option value="-1">Seleccione una opcion</option>
            <option value="0">Bajar Precio</option>
            <option value="1">Subir Precio</option>
            </select></td></tr>
            <tr><td><label for="porcentaje">Porcentaje</label></td>
            <td><input type="number" max=1 min=0 step="0.01" name="porcentaje" id="porcentaje" placeholder="%" required></td></tr>
            </table>
            <input type="submit" name="btn-actualizar" id="btn-actualizar" value="Actualizar Precio">
            </form>
    </div>
    <div>
        <hr>            
        <h2>Por tipo</h2>
            <form action="precio_actxtipo.php" method="Post">
            <table>
            <tr><td><label for="tipo[]">Tipo de producto</label></td>
    <td><select name="tipo[]" id="tipo">
    <option value="0">Seleccione un Tipo</option>
    <?php
    include("../conexion/conexion.php");
    $sql = "SELECT * FROM tipo order by desc_tipo";

    $res = mysqli_query($con,$sql);
    if(!empty($res)){
    while($reg=mysqli_fetch_array($res)){
        echo '<option value="'.$reg['cod_tipo'].'">'.$reg['desc_tipo'].'</option>';
                    }
                }
                    mysqli_close($con);

    ?>
    </select></td></tr>
            <tr><td><label for="operacion[]">Operación</label></td>
            <td><select name="operacion[]" id="operacion[]">
            <option value="-1">Seleccione una opcion</option>
            <option value="0">Bajar Precio</option>
            <option value="1">Subir Precio</option>
            </select></td></tr>
            <tr><td><label for="porcentaje[]">Porcentaje</label></td>
            <td><select name="porcentaje[]" id="porcentaje">
                <option value="-1">Seleccione el porcentaje</option>
                <?php
                for ($i=0; $i < 101 ; $i++) { 
                    echo '<option value="'.$i.'">'.$i.'%</option>';
                }
                ?>
            </select></td></tr>
            </table>
            <input type="submit" name="btn-actualizar" id="btn-actualizar" value="Actualizar Precio">
            </form>

        </div>
        <br>
        <a href="producto_listar.php"><button>Volver al Listado</button></a>
    </main>
    <footer></footer>
    </div>
</body>
</html>