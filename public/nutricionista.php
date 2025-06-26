<?php
use Htdocs\Src\Routes\Routes;
use Htdocs\Src\Models\Repository\NutricionistaRepository;
use Htdocs\Src\Services\NutricionistaService;
use Htdocs\Src\Controllers\NutricionistaController;

$nutricionistaRepository = new NutricionistaRepository();
$nutricionistaService = new NutricionistaService($nutricionistaRepository);
$nutricionistaController = new NutricionistaController($nutricionistaService);

$route = new Routes();
$route->add('POST', '/api/nutricionista', [$nutricionistaController, 'criar']);
$route->add('GET', '/nutricionista', [$nutricionistaController, 'listar']);
$route->add('GET', '/nutricionista/cadastro', [$nutricionistaController, 'mostrarFormulario']);
?>