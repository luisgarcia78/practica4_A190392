<?php

require_once "lib/nusoap.php";

function getEstados($datos){
    if($datos == "Estados"){
        return join(",", array(
            "Chiapas",
            "Tabasco",
            "Veracruz",
            "Oaxaca" ));
    }else{
        return "no hay Estados";
    }
}

$server = new soap_server();  //creacion intancia de soap
$server->register("getEstados");  //indica el metodo o funcion a devolver
if(!isset( $HTTP_RAW_POST_DATA))$HTTP_RAW_POST_DATA = file_get_contents('php://input');
    $server->service($HTTP_RAW_POST_DATA);
?>