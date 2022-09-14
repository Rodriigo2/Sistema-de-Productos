<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Styles/styles.css">
    <title>Editar Productos</title>
</head>
<body>
    <div>
        <div>
            <header><h1>Editar Productos</h1></header>
        </div>
        <div>
            <nav></nav>
        </div>
        <div align="center">
            <main>
                <div>
    <h2>Formulario editar producto</h2>
    <?php
    $cod = $_GET['cod'];
    include("../conexion/conexion.php");
    $sql= "SELECT * FROM producto where cod_producto=$cod";
    $resultado=mysqli_query($con,$sql);
    $reg = mysqli_fetch_array($resultado);
    mysqli_close($con);
    ?>
    <form action="actualizar_producto.php" method="post">
    <table>
    <tr><td><label for="cod_producto">Código de Producto</label></td>
    <td><input type="number" name="cod_producto" id="cod_producto" readonly placeholder="Ingrese Código" required value="<?php echo $reg['cod_producto'] ?>"></td></tr>
    <tr><td><label for="nombre">Nombre Producto</label></td>
    <td><input type="text" name="nombre" id="nombre" placeholder="Ingrese Nombre" required value="<?php echo $reg['nombre'] ?>"></td></tr>
    <tr><td><label for="peso">Peso</label></td>
    <td><input type="number" name="peso" id="peso" placeholder="Ingrese Peso" required value="<?php echo $reg['peso'] ?>"></td></tr>
    <tr><td><label for="stock">Stock</label></td>
    <td><input type="number" name="stock" id="stock" placeholder="Ingrese Stock" required value="<?php echo $reg['stock'] ?>"></td></tr>
    <tr><td><label for="precio">Precio</label></td>
    <td><input type="number" name="precio" id="precio" placeholder="Ingrese Precio" required value="<?php echo $reg['precio'] ?>"></td></tr>
    <tr><td><label for="cod_barra">Código de barra</label></td>
    <td><input type="number" name="cod_barra" id="cod_barra" placeholder="Ingrese Código de barra" value="<?php echo $reg['cod_barra'] ?>"></td></tr>
    <tr><td><label for="umedida">Unidad de medida</label></td>
    <td><select name="umedida[]" id="umedida">
    <option value="0">Seleccione una Unidad...</option>
    <?php
    include("../conexion/conexion.php");
    $sql = "SELECT * FROM umedida order by abrev_um";

    $res = mysqli_query($con,$sql);
    if(!empty($res)){
    while($regum=mysqli_fetch_array($res)){
        if($reg['u_medida']==$regum['cod_um']){
            $sel ='selected';
        }else{
            $sel='';
        }
        echo '<option value="'.$regum['cod_um'].'"'.$sel.'>'.$regum['abrev_um'].'</option>';
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
    while($regt=mysqli_fetch_array($res)){
        if($reg['cod_tipo']==$regt['cod_tipo']){
            $sel ='selected';
        }else{
            $sel='';
        }
        echo '<option value="'.$regt['cod_tipo'].'"'.$sel.'>'.$regt['desc_tipo'].'</option>';
                    }
                }
                    mysqli_close($con);

    ?>
    </select> <a href="../tipo_producto.php"><img width="18px" src="img/nuevo.svg" alt="Nuevo"></a></td></tr>
    <tr><td><label for="descripcion">Descripcion</label></td>
    <td><textarea name="descripcion" id="descripcion" cols="30" rows="10" placeholder="Descripción de Producto"><?php echo $reg['descripcion'] ?></textarea></td></tr>
    <tr><td><label for="imagen">Imagen producto</label></td>
    <td><img src="<?php echo $reg['imagen'];?>" alt="" width="50px" height="65px"></td></tr>
    </table>
    <input type="submit" name="btn-guardar" id="btn-guardar" value="Actualizar Producto">
    </form>
    <div>
        <a href="producto_listar.php"><button>Volver al listado de Productos</button></a>
    </div>
                </div>
            </main>
        </div>
    </div>
</body>
</html>