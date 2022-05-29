<?php
include "vendor/autoload.php";

$url="http://dneonline.com/calculator.asmx?WSDL";
$cliente=new nusoap_client($url,'wsdl');
$err=$cliente->getError();
if ($err) {
    echo "Error de conexion con webservice:$err";
    exit(0);
}
$parametros=array('intA'=>10,'intB'=>75);
$suma=$cliente->call('Add',$parametros);
//print_r($suma);
echo "<h1>La suma de {$parametros["intA"]} + {$parametros["intB"]} es {$suma["AddResult"]}</h1>";

$resta=$cliente->call('Subtract',$parametros);
echo "<h1>La resta de {$parametros["intA"]} - {$parametros["intB"]} es {$resta["SubtractResult"]}</h1>";