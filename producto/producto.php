<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Styles/styles.css">
    <title>Productos</title>
</head>
<body>
    <div>
        <div>
            <header><h1>Productos</h1></header>
        </div>
        <div>
            <nav></nav>
        </div>
        <div align="center">
            <main>
                <div>
    <h2>Formulario carga de producto</h2>
    <form action="guardar_producto.php" method="post">
    <table>
    <tr><td><label for="nombre">Nombre Producto</label></td>
    <td><input type="text" name="nombre" id="nombre" placeholder="Ingrese Nombre" required></td></tr>
    <tr><td><label for="peso">Peso</label></td>
    <td><input type="number" name="peso" id="peso" placeholder="Ingrese Peso" required></td></tr>
    <tr><td><label for="umedida">Unidad de medida</label></td>
    <td><select name="umedida[]" id="umedida">
    <option value="0">Seleccione una Unidad...</option>
    <?php
    include("../conexion/conexion.php");
    $sql = "SELECT * FROM umedida order by abrev_um";

    $res = mysqli_query($con,$sql);
    if(!empty($res)){
    while($reg=mysqli_fetch_array($res)){
        echo '<option value="'.$reg['cod_um'].'">'.$reg['abrev_um'].'</option>';
                    }
                }
                    mysqli_close($con);

    ?>
    </select><a href="../unidad-de-medida/umedida.php"><img width="18px" src="img/nuevo.svg" alt="Nuevo"></a></td></tr>
    <tr><td><label for="tipo">Tipo</label></td>
    <td><select name="tipo[]" id="tipo">
    <option value="0">Seleccione un Tipo...</option>
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
    </select> <a href="../tipo_producto.php"><img width="18px" src="img/nuevo.svg" alt="Nuevo"></a></td></tr>
    <tr><td><label for="stock">Stock</label></td>
    <td><input type="number" name="stock" id="stock" placeholder="Ingrese Stock" required></td></tr>
    <tr><td><label for="precio">Precio</label></td>
    <td><input type="number" name="precio" id="precio" placeholder="Ingrese Precio" required></td></tr>
    <tr><td><label for="cod_barra">Código de barra</label></td>
    <td><input type="number" name="cod_barra" id="cod_barra" placeholder="Ingrese Código de barra"></td></tr>
    <tr><td><label for="descripcion">Descripción</label></td>
    <td><textarea name="descripcion" id="descripcion" cols="30" rows="10" placeholder="Descripción de Producto"></textarea></td></tr>
    </table>
    <input type="submit" name="btn-guardar" id="btn-guardar" value="Guardar Producto">
    </form>
    <div>
        <a href="producto_listar.php"><button>Ver listado de Productos</button></a>
        <a href="mov_stock.php"><button>Movimiento Stock de productos</button></a>
    </div>
                </div>
            </main>
        </div>
    </div>
</body>
</html>