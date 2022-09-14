<?php
$tipo = $_POST['tipo'];
$operacion = $_POST['operacion'];
$porcentaje = $_POST['porcentaje'];

if($operacion[0]<0){
    echo'<script>alert("Hubo un ERROR! Debe seleccionar una operación."); history.go(-1);</script>';
    exit;
}

if($tipo[0]<=0){
    echo'<script>alert("Hubo un ERROR! Debe seleccionar un tipo de producto."); history.go(-1);</script>';
    exit;
}

if($porcentaje[0]<0){
    echo'<script>alert("Hubo un ERROR! Debe seleccionar un porcentaje."); history.go(-1);</script>';
    exit;
}

include "../conexion/conexion.php";
$sql = "update producto set ";

$valor = $porcentaje[0]/100;
if($operacion[0]==0){

    $act= "precio = precio - (precio*$valor)";
}else{
    $act= "precio = precio + (precio*$valor)";
}
$sql = $sql.$act;

$sql=$sql."where cod_tipo=$tipo[0]";

$res = mysqli_query($con,$sql);

if($res){
    echo'<script>alert("Precios Actualizados con Éxito");window.location="actualizar_precios.php";</script>';
}else{
    echo'<script>alert("ERROR al intentar actualizar los precios. Verifique los mismos."); history.go(-1);</script>';
}



mysqli_close($con);



?>