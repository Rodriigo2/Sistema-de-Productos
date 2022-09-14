<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movimiento de  Stock</title>
</head>
<body>
    <div>
    <div>
        <header><h1>Movimiento de Stock</h1></header>
    </div>
    <div>
    <nav>

    </nav>
</div>
<div>
    <main>
        <form action="guardar_movimiento.php" method="POST">
        <table>
        <tr><td><label for="producto[]">Producto</label></td>
        <td><select name="producto[]" id="producto[]">
            <option value="-1">Seleccione un Producto...</option>
            <?php
            include "../conexion/conexion.php";
            $sql = "Select cod_producto, nombre from producto order by nombre";
            $res = mysqli_query($con, $sql);
            while($reg=mysqli_fetch_array($res)){
                echo '<option value="'.$reg['cod_producto'].'">'.$reg['nombre'].'</option>';
            }
            mysqli_close($con);
            ?>
        </select></td></tr>
        <tr><td><label for="cantidad">Cantidad</label></td>
        <td><input type="number" name="cantidad" id="cantidad" min="0.01" step="0.01" placeholder="Ingrese la cantidad..." required></td></tr>
        <tr><td><label for="movimiento[]">Movimiento</label></td>
        <td><select name="movimiento[]" id="movimiento[]">
            <option value="-1">Seleccione un Movimiento...</option>
            <option value="0">Egreso</option>
            <option value="1">Ingreso</option>
        </select></td></tr>
        <tr><td><label for="motivo">Motivo</label></td>
        <td><textarea name="motivo" id="motivo" cols="30" rows="10" placeholder="Motivo..."></textarea></td></tr>
        </table>
        <input type="submit" name="btn-save" id="btn-save" value="Registrar Movimiento de STOCK">
        </form>
        <br>
        <a href="producto.php"><button>Volver a Productos</button></a>
    </main>
</div>
<div>
    <footer>

    </footer>
</div>


    </div>
</body>
</html>