<?php

$classeRegistroDaInterfaceWeb = $_POST["classeRegistroDaInterfaceWeb"];
$classeObjeto = new ReflectionClass($classeRegistroDaInterfaceWeb);

$objeto = $classeObjeto->newInstance();
$instancias = $objeto->criaObjetoDaInterfaceWeb( $_POST );

$objeto = $instancias["objeto"];
$classeDAO = $instancias["dao"];

$classeDAO = new ReflectionClass( $classeDAO );
$dao = $classeDAO->newInstance();
$result = $dao->cadastrar( $objeto );

print json_encode($result);