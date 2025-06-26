<?php
use Htdocs\Src\Routes\Routes;
use Htdocs\Src\Controllers\DelimeterController;

$route = new Routes();
$delimeterController = new DelimeterController();

$route->add('GET', '/', [$delimeterController, 'mostrarHome']);
$route->add('GET', '/delimeter/calculo', [$delimeterController, 'mostrarCalculo']);
if($_SERVER['REQUEST_URI'] === '/usuario/cadastro') {
    include_once __DIR__ . '/usuario.php';
}

?>