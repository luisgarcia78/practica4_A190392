<?php
require_once "lib/nusoap.php";
$cliente = new nusoap_client("http://localhost:8080/practica4/Server.php");

$error = $cliente->getError();
if($error){
    echo "<h2>contructor error</h<pre>".$error."</pre>";
}

$result = $cliente->call("getEstados",array("datos" => "Estados"));

if($cliente->fault){
    echo "<h2>Fault</h2><pre>";
    print_r($result);
    echo "</pre>";
}
else{
    $error = $cliente->getError();

    if($error){
        echo "<h2>Error</h2><pre>".$error."</pre>";
    }
    else{
        echo "<h2>Estados</h2><pre>";
        echo $result;
        echo "</pre>";
    }
}
?>