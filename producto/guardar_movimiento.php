<?php
$producto = $_POST['producto'];
$cantidad = $_POST['cantidad'];
$movimiento = $_POST['movimiento'];
$motivo = $_POST['motivo'];


if($producto[0]==-1){
    echo '<script>alert("Hubo un ERROR! Debe seleccionar un Producto."); history.go(-1)</script>';
    exit;
}
if($cantidad<=0){
    echo'<script>alert("Hubo un ERROR! La cantidad no puede ser un número negativo."); history.go(-1);</script>';
    exit;
}

if(trim($cantidad)==''){
    echo'<script>alert("Hubo un ERROR! La cantidad no puede ser vacío."); history.go(-1);</script>';
    exit;
}

if($movimiento[0]==-1){
    echo '<script>alert("Hubo un ERROR! Debe seleccionar un tipo de movimiento."); history.go(-1)</script>';
    exit;
}

if(strlen($motivo)>500){
    echo'<script>alert("Hubo un ERROR! El Motivo excede el límite de caracteres(500)."); history.go(-1);</script>';
    exit;
}

if(trim($motivo)==''){
    echo'<script>alert("Hubo un ERROR! El Motivo no puede ser vacío. Debe proporcionar un texto."); history.go(-1);</script>';
    exit;
}

include "../conexion/conexion.php";

$sql = "INSERT INTO registro(cod_producto, cant, tipo_mov, motivo) values ($producto[0],$cantidad,$movimiento[0],'$motivo')";
$res=mysqli_query($con,$sql);

if($res){
if($movimiento[0]==0){
    $sql1 = "UPDATE producto set stock=stock-$cantidad where cod_producto=$producto[0]";
    $resultado=mysqli_query($con,$sql1);
}else{
    $sql2 = "UPDATE producto set stock=stock+$cantidad where cod_producto=$producto[0]";
    $resultado=mysqli_query($con,$sql2);
}
echo'<script>alert("Se ha guardado correctamente");window.location="mov_stock.php";</script>';
}else{
    echo'<script>alert("ERROR al intentar guardar los datos. Verifique los mismos."); history.go(-1);</script>';
}

mysqli_close($con);
?>