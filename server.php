<?php

include_once('scripts/lib/Autoload.php');
include_once('scripts/lib/Config.php');

startSession();

use Scripts\Lib\Db;

Db::checkConnection(getInfoDb()['db']);

$routers = explode('/', trim($_SERVER['SCRIPT_NAME'], '\\/'));
$req = $_SERVER['QUERY_STRING'];

$folderName = !empty($routers[0]) ? $routers[0] : 'Admin';
if (is_dir($folderName)) {
    array_shift($routers);
}

$className = !empty($routers[0]) ? str_replace('-', '', ucwords($routers[0], '-')) : 'User';
if (file_exists(strtolower($folderName) . '/controller/' . $className . '.php')) {
    array_shift($routers);
}

$controllerClass = ucwords($folderName . '\Controller\\' . $className);
$controllerInstance = new $controllerClass();
$controllerInstance->init();

$action = !empty($routers[0]) ? str_replace('-', '', $routers[0]) : 'openFormLogin';
if (method_exists($controllerClass, $action)) {
    array_shift($routers);
}

if (!empty($routers[0]) && $routers[0] != '') {
    $paramsStatus = (int) $routers[0];
    $status = $paramsStatus == 1 ? 'Success' : 'Error';
    $req .= $status . '/';
    array_shift($routers);
}

if (!empty($routers[0])) {
    $req .= $routers[0];
    array_shift($routers);
}

$controllerInstance->auth($action);
$controllerInstance->$action($req);
