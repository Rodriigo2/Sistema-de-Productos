<?php
$cod_um = $_GET['cod'];


if($cod_um<=0){
    echo'<script>alert("Código No Válido! No puede ser menor o igual a cero"); history.go(-1);</script>';
    exit;
}

if(trim($cod_um)==""){
    echo'<script>alert("Código No Válido! NO puede ser vacía."); history.go(-1);</script>';
    exit;
}

include("../conexion/conexion.php");


$sql = "DELETE FROM umedida where cod_um=$cod_um";

$resultado=mysqli_query($con,$sql);


if($resultado){
    echo'<script>window.location="umedida.php";</script>';
}else{
    echo'<script>alert("ERROR al intentar Eliminar los datos. Verifique los mismos."); history.go(-1);</script>';
}

mysqli_close($con);

?>