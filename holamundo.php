<?php
include "vendor/autoload.php";
$url="http://virtual.unicaes.edu.sv/webservice/ws.php?wsdl";
$cliente=new nusoap_client($url,'wsdl');
$err=$cliente->getError();
if ($err) {
    echo "Error de conexion con webservice:$err";
    exit(0);
}
$parametros=array('usuario'=>'Juan Lopez');
$result=$cliente->call('hola',$parametros);
echo $cliente->getError();
print_r($result);

$parametros=array('valor1'=>37,'valor2'=>24);
$result=$cliente->call('mayor',$parametros);
echo $cliente->getError();
print_r($result);