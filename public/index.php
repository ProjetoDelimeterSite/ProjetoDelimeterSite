<?php 
try{
    include_once dirname(__DIR__) . '/view/includes/header.php';
} catch (Exception $e) {
    echo "Erro ao incluir o header: " . $e->getMessage();
    exit(1);
}
?>
<?php

$autoloadPath = dirname(__DIR__) . '/vendor/autoload.php';
if (file_exists($autoloadPath)) {
    include_once $autoloadPath;
} else {
    echo "Erro: Autoload do Composer não encontrado em $autoloadPath";
    exit(1);
}

try{
    if (isset($_SESSION['usuario'])) {
        include_once dirname(__DIR__) . '/public/' . $_SESSION['usuario']['tipo'] . '.php';
        // $route = new \Htdocs\Src\Routes\Route($_SESSION['usuario']['tipo']);
    } else {
        include_once dirname(__DIR__) . '/public/usuario.php';
    }
} catch (Exception $e) {
    echo "Erro ao incluir o usuario: " . $e->getMessage();
    exit(1);
}
// Descobre método e path da requisição
$method = $_SERVER['REQUEST_METHOD'];
$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Faz o dispatch da rota
if (isset($route)) {
    $route->dispatch($method, $path);
}
?>
<?php
try{
    include_once dirname(__DIR__) . '/view/includes/footer.php';
} catch (Exception $e) {
    echo "Erro ao incluir o footer: " . $e->getMessage();
    exit(1);
}
?>