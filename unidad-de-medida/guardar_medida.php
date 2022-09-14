<?php
$desc = $_POST["desc_um"];
$abrev = $_POST["abrev_um"];

if(trim($desc)==""){
    echo'<script>alert("Descripción No Válida! NO puede ser vacía."); history.go(-1);</script>';
    exit;
}

if(trim($abrev)==""){
    echo'<script>alert("Abreviatura No Válida! NO puede ser vacía."); history.go(-1);</script>';
    exit;
}

if(strlen($abrev)>4){
    echo'<script>alert("La Abreviatura excede el límite de caracteres(4)."); history.go(-1);</script>';
    exit;
}

if(strlen($abrev)>30){
    echo'<script>alert("La descripción excede el límite de caracteres(30)."); history.go(-1);</script>';
    exit;
}

include("../conexion/conexion.php");

$desc = trim($desc);
$abrev=trim($abrev);

$sql = "INSERT into umedida(desc_um,abrev_um) values ('$desc','$abrev')";

$resultado=mysqli_query($con,$sql);


if($resultado){
    echo'<script>window.location="umedida.php";</script>';
}else{
    echo'<script>alert("ERROR al intentar guardar los datos. Verifique los mismos."); history.go(-1);</script>';
}

mysqli_close($con);

?>