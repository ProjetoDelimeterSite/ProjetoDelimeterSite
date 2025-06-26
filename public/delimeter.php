<?php
use Htdocs\Src\Routes\Routes;
use Htdocs\Src\Controllers\DelimeterController;

$route->add('POST', '/api/delimeter', [$usuarioController, 'criar']);
$route->add('GET', '/', [$usuarioController, 'mostrarHome']);
$route->add('GET', '/delimeter/cadastro', [$usuarioController, 'mostrarFormulario']);


?>