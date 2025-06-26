<?php
use Htdocs\Src\Routes\Routes;
use Htdocs\Src\Models\Repository\PacienteRepository;
use Htdocs\Src\Services\PacienteService;
use Htdocs\Src\Controllers\PacienteController;

$pacienteRepository = new PacienteRepository();
$pacienteService = new PacienteService($pacienteRepository);
$pacienteController = new PacienteController($pacienteService);

$route = new Routes();

$route->add('GET', '/', [$pacienteController, 'mostrarHome']);

$route->add('POST', '/api/paciente', [$pacienteController, 'criar']);
$route->add('GET', '/paciente/cadastro', [$pacienteController, 'mostrarFormulario']);

$route->add('POST', '/login/paciente', [$pacienteController, 'entrar']);
$route->add('GET', '/paciente/login', [$pacienteController, 'mostrarLogin']);

$route->add('GET', '/conta', [$pacienteController, 'mostrarConta']);
$route->add('POST', '/conta/atualizar', [$pacienteController, 'atualizarConta']);
$route->add('POST', '/conta/deletar', [$pacienteController, 'deletarConta']);
$route->add('GET', '/conta/sair', [$pacienteController, 'sairConta']);

if($_SERVER['REQUEST_URI'] === '/delimeter/sobre') {
    include_once __DIR__ . '/delimeter.php';
} elseif($_SERVER['REQUEST_URI'] === '/delimeter/calculo') {
    include_once __DIR__ . '/delimeter.php';
}
?>