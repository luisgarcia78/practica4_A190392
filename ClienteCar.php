<?php
require_once "lib/nusoap.php";

// Crear un objeto de cliente SOAP
$cliente = new nusoap_client("http://localhost:8080/practica4/ServerCar.php");

// Verificar errores en el cliente
$error = $cliente->getError();
if ($error) {
    echo "<h2>Error en el constructor:</h2><pre>" . $error . "</pre>";
}

// Llamar al método remoto del servicio web SOAP
$resultado = $cliente->call("getMarcasDeAutos", array("datos" => "Marcas de Autos"));

// Verificar si hay un fallo en la llamada
if ($cliente->fault) {
    echo "<h2>Fallo</h2><pre>";
    print_r($resultado);
    echo "</pre>";
} else {
    // Verificar errores después de la llamada
    $error = $cliente->getError();
    if ($error) {
        echo "<h2>Error</h2><pre>" . $error . "</pre>";
    } else {
        // Mostrar los resultados obtenidos del servicio web
        echo "<h2>Marcas de Autos</h2><pre>";
        echo $resultado;
        echo "</pre>";
    }
}
?>
