<?php
include "vendor/autoload.php";

$url="https://www.w3schools.com/xml/tempconvert.asmx?WSDL";
$cliente=new nusoap_client($url,'wsdl');
$err=$cliente->getError();
if ($err) {
    echo "Error de conexion con webservice:$err";
    exit(0);
}
$parametros=array('Fahrenheit'=>'70');
$result=$cliente->call('FahrenheitToCelsius',$parametros);
print_r($result);

$parametros=array('Celsius'=>'34');
$result=$cliente->call('CelsiusToFahrenheit',$parametros);
print_r($result);
