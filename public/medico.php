<?php
use Htdocs\Src\Routes\Routes;
use Htdocs\Src\Models\Repository\MedicoRepository;
use Htdocs\Src\Services\MedicoService;
use Htdocs\Src\Controllers\MedicoController;

$medicoRepository = new MedicoRepository();
$medicoService = new MedicoService($medicoRepository);
$medicoController = new MedicoController($medicoService);

$route = new Routes();

$route->add('GET', '/', [$medicoController, 'mostrarHome']);

$route->add('POST', '/api/medico', [$medicoController, 'criar']);
$route->add('GET', '/medico/cadastro', [$medicoController, 'mostrarFormulario']);

$route->add('POST', '/login/medico', [$medicoController, 'entrar']);
$route->add('GET', '/medico/login', [$medicoController, 'mostrarLogin']);

$route->add('GET', '/conta', [$medicoController, 'mostrarConta']);
$route->add('POST', '/conta/atualizar', [$medicoController, 'atualizarConta']);
$route->add('POST', '/conta/deletar', [$medicoController, 'deletarConta']);
$route->add('GET', '/conta/sair', [$medicoController, 'sairConta']);

include_once __DIR__ . '/especialPages.php';
?>