<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista Productos</title>
</head>
<body>
    <div>
        <div>
            <header><h1>Listado de Productos</h1></header>
        </div>
        <div>
            <nav></nav>
        </div>
        <div>
            <main>
                <table border="1">
                    <thead>
                        <th>Código</th>
                        <th>Nombre Producto</th>
                        <th>Peso</th>
                        <th>Unidad de médida</th>
                        <th>Tipo de producto</th>
                        <th>Stock</th>
                        <th>Precio</th>
                        <th>Código de Barra</th>
                        <th>Descripción</th>
                        <th>Imagen</th>
                        <th></th>
                        <th></th>
                    </thead>
                    <tbody>
                <?php
            $sql="select producto.*,tipo.desc_tipo,umedida.abrev_um from producto inner join tipo on producto.cod_tipo=tipo.cod_tipo inner join umedida on producto.u_medida=umedida.cod_um order by nombre";
            include ("../conexion/conexion.php");
            $res = mysqli_query($con,$sql);
            if(empty($res)){

            }else{
                $filas=mysqli_num_rows($res);
                if($filas>0){
                    while($reg=mysqli_fetch_array($res)){
                        echo '<tr>';
                        echo '<td>'.$reg['cod_producto'].'</td>';
                        echo '<td>'.$reg['nombre'].'</td>';
                        echo '<td>'.$reg['peso'].'</td>';
                        echo '<td>'.$reg['abrev_um'].'</td>';
                        echo '<td>'.$reg['desc_tipo'].'</td>';
                        echo '<td>'.$reg['stock'].'</td>';
                        echo '<td>'.$reg['precio'].'</td>';
                        echo '<td>'.$reg['cod_barra'].'</td>';
                        echo '<td>'.$reg['descripcion'].'</td>';
                        echo '<td><img src='.$reg['imagen'].' alt="" width="75px" height="65px"></td>';
                        echo '<td width=5%><a href="modificar_producto.php?cod='.$reg['cod_producto'].'"><img width="20px" src="../unidad-de-medida/img/edit.svg" alt="Editar"></a></td>';
                        echo '<td width=5%><a href="eliminar_producto.php?cod='.$reg['cod_producto'].'"><img width="20px" src="../unidad-de-medida/img/delete.svg" alt="Eliminar"></a></td>';
                        echo '</tr>';
                        echo '</tr>';
                    }
                }
            }
            mysqli_close($con);
                ?>
        </tbody>
        </table>
            <a href="producto.php"><button>Ir a productos</button></a> |
            <a href="actualizar_precios.php"><button>Actualizar Precios</button></a>
            </main>
        </div>

        <div><footer></footer></div>
    </div>
    
</body>
</html>