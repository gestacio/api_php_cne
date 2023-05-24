<?php

include 'Cne.php';
include 'BuscarCNE.php';

$cne = new BuscarCNE;

$respuesta = $cne->obtenerElector("V", "20490008");

echo $respuesta;


