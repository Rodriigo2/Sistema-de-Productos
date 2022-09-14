<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Styles/styles.css">
    <title>Tipo producto</title>
</head>
<body>
<div class="container">
    <div class="container-title">
    <h1>Tipo de Productos</h1>
    </div>
    <div class="container-nav">
        <nav></nav>
    </div>
    <div class="container-form" align="center">
    <form method="Post" action="guardar_tipo.php">
    <h2>Formulario Cargar Tipo</h2>
    <label for="txt_tipo">Tipo de producto</label>
    <input type="text" name="txt_tipo" id="txt_tipo" placeholder="Ingrese Nuevo Tipo"><br>

    <input type="submit" name="btn_tipo" id="btn_tipo" value="Guardar Tipo de Producto">
    </form>
    <br>
    <div class="container-lista">
    <table>
        <thead> <th>Código</th><th>Tipo de Producto</th></thead>
        <tbody>
    <?php
    include ('conexion/conexion.php');
    $sql = "SELECT * FROM tipo order by cod_tipo";
    $res = mysqli_query($con, $sql);
    $nro_filas_dev=mysqli_num_rows($res);
    if($nro_filas_dev !=0){
        while($fila=mysqli_fetch_array($res)){
            echo '<tr><td>'.$fila['cod_tipo'].'</td><td>'.$fila['desc_tipo'].'</td></tr>';
        }
    }
    mysqli_close($con);
    ?>
    </tbody>
    </table>
    </div>
    </div>
    <div>
        <a href="producto/producto.php">Ir a productos</a>
    </div>
</div>    
</body>
</html>