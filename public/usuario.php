<?php
use Htdocs\Src\Routes\Routes;
use Htdocs\Src\Models\Repository\UsuarioRepository;
use Htdocs\Src\Services\UsuarioService;
use Htdocs\Src\Controllers\UsuarioController;

$usuarioRepository = new UsuarioRepository();
$usuarioService = new UsuarioService($usuarioRepository);
$usuarioController = new UsuarioController($usuarioService);

$route = new Routes();
$route->add('POST', '/api/usuario', [$usuarioController, 'criar']);
$route->add('GET', '/', [$usuarioController, 'mostrarHome']);

$route->add('GET', '/usuario/cadastro', [$usuarioController, 'mostrarFormulario']);
$route->add('GET', '/usuario/login', [$usuarioController, 'mostrarLogin']);

$route->add('POST', '/usuario/login', [$usuarioController, 'login']);
$route->add('GET', '/usuario/logout', [$usuarioController, 'logout']);

$route->add('GET', '/usuario/editar', [$usuarioController, 'mostrarFormularioEditar']);
$route->add('POST', '/usuario/editar', [$usuarioController, 'editar']);
?>
