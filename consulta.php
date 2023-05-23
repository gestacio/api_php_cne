<?php

$res = file_get_contents("http://www.cne.gov.ve/web/registro_electoral/ce.php?nacionalidad=V&cedula=20490008");
$res = str_replace(">", "<>", $res);
$splitCode = explode("<", $res);

$cedula = $splitCode[110];
$nombre = $splitCode[132];
$estado = $splitCode[154];
$municipio = $splitCode[174];
$parroquia = $splitCode[194];
$centro = $splitCode[216];
$direccion = $splitCode[240];

$registrado = array(
    'cedula' => $cedula,
    'nombre' => $nombre,
    'estado' => $estado,
    'municipio' => $municipio,
    'parroquia' => $parroquia,
    'centro' => $centro,
    'direccion' => $direccion
);

$texto = <<<API
$cedula
$nombre
$estado
$municipio
$parroquia
$centro
$direccion
API;


$texto = str_replace(">", "", $texto);
$texto = strtolower($texto);
$texto = ucwords($texto);

echo json_encode($registrado);
?>