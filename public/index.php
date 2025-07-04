<?php

require __DIR__ . '/../vendor/autoload.php';

// Inicia a sessão
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

use Htdocs\Src\Routes\Routes;

$route = new Routes();

// O frontend agora é React. Não renderize header/footer PHP aqui.
$route->dispatch($_SERVER['REQUEST_METHOD'], parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
?>