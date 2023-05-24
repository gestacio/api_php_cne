<?php

$res = file_get_contents("http://www.cne.gov.ve/web/registro_electoral/ce.php?nacionalidad=V&cedula=25221952");
// $res = str_replace("<", "", $res);
$res = str_replace(">", "<>", $res);
$splitCode = explode("<", $res);

// var_dump($splitCode);
$registrada = $splitCode[80];

if (!($registrada === ">DATOS DEL ELECTOR")) {
    echo json_encode(['Error:' => "Esta cedula de identidad no se encuentra inscrito en el Registro Electoral."]);
} else {
    $registrado = array();

    $cedula = format_response($splitCode[110]);
    $nombre = format_response($splitCode[132]);
    $estado = format_response($splitCode[154]);
    $municipio = format_response($splitCode[174]);
    $parroquia = format_response($splitCode[194]);
    $centro = format_response($splitCode[216]);
    $direccion = format_response($splitCode[240]);

    $contribuyente = array(
        'Cedula' => $cedula,
        'Nombre' => $nombre,
        'Estado' => $estado,
        'Municipio' => $municipio,
        'Parroquia' => $parroquia,
        'Centro' => $centro,
        'Direccion' => $direccion,
    );
  
    echo json_encode($contribuyente);
}

function format_response(string $parameter) {
    return $parameter = ucwords(strtolower(str_replace(">", "", $parameter)));
}