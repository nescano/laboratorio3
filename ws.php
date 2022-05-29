<?php
include "vendor/autoload.php";
$server=new nusoap_server;
$server->configureWSDL('server','urn:server');
$server->wsdl->schemaTargetNamespace='urn:server';
$server->register(
    'hola',
    array('usuario'=>'xsd:string'),
    array('sturn'=>'xsd:string'),
    'urn:server',
    'urn:server#holaServer',
    'rpc',
    'encoded',
    'funcion hola mundo que necesita un parametro'
);
$server->register(
    'mayor',
    array('valor1'=>'xsd:int','valor2'=>'xsd:int'),
    array('return'=>'xsd:string'),
    'urn:server',
    'urn:server#mayorserver',
    'rpc',
    'encode',
    'funcion para calcular mayor de dos numeros'
);

$server->wsdl->addComplexType(
    'Persona',
    'complexType',
    'struct',
    'all',
    '',
    array('id_user'=>array('name'=>'id_user','type'=>'xsd:int'),
        'fullname'=>array('name'=>'fullname','type'=>'xsd:string'),
        'email'=>array('name'=>'email','type'=>'xsd:string'),
        'msg'=>array('name'=>'msg','type'=>'xsd:string'),
        'level'=>array('name'=>'level','type'=>'xsd:int')
    )
);

$server->register(
    'login',
    array('username'=>'xsd:string','password'=>'xsd:string'),
    array('return'=>'tns:Persona'),
    'urn:server',
    'urn:server#LoginServer',
    'rpc',
    'encoded',
    'funcion para validar usuario y password'
);

function login($username,$password){
    if (($username=="admin") && ($password=="catolica")){
        $valor=array(
            'id_user'=>1,
            'fullname'=>'juan lopez',
            'email'=>'juan@gmail.com',
            'msg'=>'usuario correcto',
            'level'=>1 
        );
    } else {
        $valor=array(
            'id_user'=>0,
            'fullname'=>'',
            'email'=>'',
            'msg'=>'usuario incorrecto',
            'level'=>0
        );
    }
    return $valor;
}


function mayor($valor1,$valor2){
    if ($valor1>$valor2){
        return "el mayor es $valor1";
    } else{
        return "el mayor es $valor2";
    }
}

function hola($usuario){
    return "bienvenido {$usuario}";
}

$server->service(file_get_contents("php://input"));