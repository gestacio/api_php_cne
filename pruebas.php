<?php

include 'Cne.php';

$cne = new CNE;

$respuesta = $cne->obtenerElector("V", "2948965");

echo $respuesta;


