<?php
use Htdocs\Src\Routes\Routes;
use Htdocs\Src\Controllers\DelimeterController;

$route = new Routes();
$delimeterController = new DelimeterController();

$route->add('GET', '/', [$delimeterController, 'mostrarHome']);
$route->add('GET', '/delimeter/calculo', [$delimeterController, 'mostrarCalculo']);
$route->add('GET', '/usuario/cadastro', [$usuarioController, 'mostrarFormulario']);
// Adicione outras rotas conforme necessário

?>