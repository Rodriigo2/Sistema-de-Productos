<?php
$cod_um = $_POST['cod_um'];
$desc = $_POST["desc_um"];
$abrev = $_POST["abrev_um"];

if($cod_um<=0){
    echo'<script>alert("Código No Válido! No puede ser menor o igual a cero"); history.go(-1);</script>';
    exit;
}

if(trim($desc)==""){
    echo'<script>alert("Descripción No Válida! NO puede ser vacía."); history.go(-1);</script>';
    exit;
}

if(trim($cod_um)==""){
    echo'<script>alert("Código No Válido! NO puede ser vacía."); history.go(-1);</script>';
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

$sql="Select * from umedida where cod_um='$cod_um'";
$res_sel = mysqli_query($con,$sql);
$nro_filas_dev=mysqli_num_rows($res_sel);
if($nro_filas_dev !=0){
    echo'<script>alert("Ya existe un código de medida con los datos provistos"); history.go(-1);</script>';
    exit;
}

$desc = trim($desc);
$abrev=trim($abrev);

$sql = "UPDATE umedida SET desc_um='$desc', abrev_um='$abrev' where cod_um=$cod_um";

$resultado=mysqli_query($con,$sql);


if($resultado){
    echo'<script>alert("Actualización de datos Éxitosa.");window.location="umedida.php";</script>';
}else{
    echo'<script>alert("ERROR al intentar Actualizar los datos. Verifique los mismos."); history.go(-1);</script>';
}

mysqli_close($con);

?>