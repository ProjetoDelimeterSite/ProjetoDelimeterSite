<?php
use Htdocs\Src\Routes\Routes;
use Htdocs\Src\Models\Repository\UsuarioRepository;
use Htdocs\Src\Services\UsuarioService;
use Htdocs\Src\Controllers\UsuarioController;

$usuarioRepository = new UsuarioRepository();
$usuarioService = new UsuarioService($usuarioRepository);
$usuarioController = new UsuarioController($usuarioService);

$route = new Routes();

$route->add('GET', '/', [$usuarioController, 'mostrarHome']);

$route->add('POST', '/api/usuario', [$usuarioController, 'criar']);
$route->add('GET', '/usuario/cadastro', [$usuarioController, 'mostrarFormulario']);
$route->add('POST', '/login/usuario', [$usuarioController, 'entrar']);
$route->add('GET', '/usuario/login', [$usuarioController, 'mostrarLogin']);
$route->add('GET', '/conta', [$usuarioController, 'mostrarConta']);
$route->add('POST', '/conta/atualizar', [$usuarioController, 'atualizarConta']);
$route->add('POST', '/conta/deletar', [$usuarioController, 'deletarConta']);
$route->add('GET', '/conta/sair', [$usuarioController, 'sairConta']);

// Rotas para paciente
use Htdocs\Src\Models\Repository\PacienteRepository;
use Htdocs\Src\Services\PacienteService;
use Htdocs\Src\Controllers\PacienteController;
$pacienteRepository = new PacienteRepository();
$pacienteService = new PacienteService($pacienteRepository);
$pacienteController = new PacienteController($pacienteService);

$route->add('GET', '/paciente/cadastro', [$pacienteController, 'mostrarFormulario']);
$route->add('GET', '/paciente/login', [$pacienteController, 'mostrarLogin']);
$route->add('GET', '/paciente', [$pacienteController, 'mostrarHome']);

// Rotas para nutricionista
use Htdocs\Src\Models\Repository\NutricionistaRepository;
use Htdocs\Src\Services\NutricionistaService;
use Htdocs\Src\Controllers\NutricionistaController;
$nutricionistaRepository = new NutricionistaRepository();
$nutricionistaService = new NutricionistaService($nutricionistaRepository);
$nutricionistaController = new NutricionistaController($nutricionistaService);

$route->add('GET', '/nutricionista/cadastro', [$nutricionistaController, 'mostrarFormulario']);
$route->add('GET', '/nutricionista/login', [$nutricionistaController, 'mostrarLogin']);
$route->add('GET', '/nutricionista', [$nutricionistaController, 'mostrarHome']);

// Rotas para médico
use Htdocs\Src\Models\Repository\MedicoRepository;
use Htdocs\Src\Services\MedicoService;
use Htdocs\Src\Controllers\MedicoController;
$medicoRepository = new MedicoRepository();
$medicoService = new MedicoService($medicoRepository);
$medicoController = new MedicoController($medicoService);

$route->add('GET', '/medico/cadastro', [$medicoController, 'mostrarFormulario']);
$route->add('GET', '/medico/login', [$medicoController, 'mostrarLogin']);
$route->add('GET', '/medico', [$medicoController, 'mostrarHome']);

include_once __DIR__ . '/especialPages.php'
?>
