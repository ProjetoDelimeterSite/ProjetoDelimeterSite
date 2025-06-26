<?php
use Htdocs\Src\Routes\Routes;
use Htdocs\Src\Models\Repository\MedicoRepository;
use Htdocs\Src\Services\MedicoService;
use Htdocs\Src\Controllers\MedicoController;

$medicoRepository = new MedicoRepository();
$medicoService = new MedicoService($medicoRepository);
$medicoController = new MedicoController($medicoService);

$route = new Routes();
$route->add('POST', '/api/medico', [$medicoController, 'criar']);
$route->add('GET', '/medico', [$medicoController, 'listar']);
$route->add('GET', '/medico/cadastro', [$medicoController, 'mostrarFormulario']);
?>