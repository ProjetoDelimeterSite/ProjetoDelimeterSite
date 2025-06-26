<?php
namespace Htdocs\Src\Controllers;

use Htdocs\Src\Services\UsuarioService;

class UsuarioController {
    private $service;

    public function __construct(UsuarioService $service) {
        $this->service = $service;
    }

    public function criar() {
        $data = json_decode(file_get_contents("php://input"));
        if (!$data) $data = (object)$_POST;

        // Verifica se os campos esperados estão presentes
        if (!isset($data->nome_usuario) || !isset($data->email_usuario) || !isset($data->senha_usuario)) {
            echo json_encode(['error' => 'Dados incompletos.']);
            return;
        }

        $usuario = new \Htdocs\Src\Models\Entity\Usuario(
            null,
            $data->nome_usuario,
            $data->email_usuario,
            password_hash($data->senha_usuario, PASSWORD_DEFAULT)
        );
        echo json_encode($this->service->criar($usuario));
    }

    public function mostrar() {
        $usuarios = $this->service->listar();
        echo json_encode($usuarios);
    }
    public function mostrarFormulario(){
        $formPath = dirname(__DIR__, 2) . '/view/delimeter/form.php';
        if (file_exists($formPath)) {
            include_once $formPath;
        } else {
            echo "Erro: Formulário não encontrado em $formPath";
        }
    }
    public function mostrarHome(){
        $formPath = dirname(__DIR__, 2) . '/view/delimeter/index.php';
        if (file_exists($formPath)) {
            include_once $formPath;
        } else {
            echo "Erro: Início não encontrado em $formPath";
        }
    }
}
?>