<?php
use Htdocs\Src\Routes\Routes;
use Htdocs\Src\Models\Repository\NutricionistaRepository;
use Htdocs\Src\Services\NutricionistaService;
use Htdocs\Src\Controllers\NutricionistaController;

$nutricionistaRepository = new NutricionistaRepository();
$nutricionistaService = new NutricionistaService($nutricionistaRepository);
$nutricionistaController = new NutricionistaController($nutricionistaService);

$route = new Routes();

$route->add('GET', '/', [$nutricionistaController, 'mostrarHome']);

$route->add('POST', '/api/nutricionista', [$nutricionistaController, 'criar']);
$route->add('GET', '/nutricionista/cadastro', [$nutricionistaController, 'mostrarFormulario']);

$route->add('POST', '/login/nutricionista', [$nutricionistaController, 'entrar']);
$route->add('GET', '/nutricionista/login', [$nutricionistaController, 'mostrarLogin']);

$route->add('GET', '/conta', [$nutricionistaController, 'mostrarConta']);
$route->add('POST', '/conta/atualizar', [$nutricionistaController, 'atualizarConta']);
$route->add('POST', '/conta/deletar', [$nutricionistaController, 'deletarConta']);
$route->add('GET', '/conta/sair', [$nutricionistaController, 'sairConta']);

if($_SERVER['REQUEST_URI'] === '/delimeter/sobre') {
    include_once __DIR__ . '/delimeter.php';
} elseif($_SERVER['REQUEST_URI'] === '/delimeter/calculo') {
    include_once __DIR__ . '/delimeter.php';
}
?>