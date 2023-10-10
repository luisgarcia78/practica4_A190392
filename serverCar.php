<?php

require_once "lib/nusoap.php";

function getMarcasDeAutos($datos){
    if($datos == "Marcas de Autos"){
        return join(",", array(
            "Toyota",
            "Ford",
            "Honda",
            "Chevrolet" ));
    }else{
        return "No hay marcas de autos disponibles.";
    }
}

$server = new soap_server();  // Creación de instancia de soap
$server->register("getMarcasDeAutos");  // Indica el método o función a devolver

if(!isset($HTTP_RAW_POST_DATA)) $HTTP_RAW_POST_DATA = file_get_contents('php://input');
$server->service($HTTP_RAW_POST_DATA);
?>
