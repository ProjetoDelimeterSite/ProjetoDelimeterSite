<?php

if ($_SERVER['REQUEST_URI'] === '/delimeter/sobre') {
    include_once __DIR__ . '/delimeter.php';
} elseif ($_SERVER['REQUEST_URI'] === '/delimeter/calculo') {
    include_once __DIR__ . '/delimeter.php';
} elseif ($_SERVER['REQUEST_URI'] === '/paciente/cadastro') {
    $pacienteController->mostrarFormulario();
} elseif ($_SERVER['REQUEST_URI'] === '/nutricionista/cadastro') {
    $nutricionistaController->mostrarFormulario();
} elseif ($_SERVER['REQUEST_URI'] === '/medico/cadastro') {
    $medicoController->mostrarFormulario();
} elseif ($_SERVER['REQUEST_URI'] === '/paciente/login') {
    $pacienteController->mostrarLogin();
} elseif ($_SERVER['REQUEST_URI'] === '/nutricionista/login') {
    $nutricionistaController->mostrarLogin();
} elseif ($_SERVER['REQUEST_URI'] === '/medico/login') {
    $medicoController->mostrarLogin();
} elseif ($_SERVER['REQUEST_URI'] === '/paciente') {
    $pacienteController->mostrarHome();
} elseif ($_SERVER['REQUEST_URI'] === '/nutricionista') {
    $nutricionistaController->mostrarHome();
} elseif ($_SERVER['REQUEST_URI'] === '/medico') {
    $medicoController->mostrarHome();
}

?>