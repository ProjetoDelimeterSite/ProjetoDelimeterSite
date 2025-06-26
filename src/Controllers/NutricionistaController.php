<?php
namespace Htdocs\Src\Controllers;

use Htdocs\Src\Services\NutricionistaService;

class NutricionistaController {
    private $service;

    public function __construct(NutricionistaService $service) {
        $this->service = $service;
    }

    public function criar() {
        $data = json_decode(file_get_contents("php://input"));
        if (!$data) $data = (object)$_POST;

        $nutricionista = new \Htdocs\Src\Models\Entity\Nutricionista(
            $data->id_usuario,
            $data->crm_nutricionista
        );
        echo json_encode($this->service->criar($nutricionista));
    }

    public function listar() {
        echo json_encode($this->service->listar());
    }
    
    public function mostrarFormulario(){
        $formPath = dirname(__DIR__, 2) . '/view/nutricionista/form.php';
        if (file_exists($formPath)) {
            include_once $formPath;
        } else {
            echo "Erro: Formulário não encontrado em $formPath";
        }
    }
    public function mostrarHome(){
        $formPath = dirname(__DIR__, 2) . '/view/nutricionista/index.php';
        if (file_exists($formPath)) {
            include_once $formPath;
        } else {
            echo "Erro: Início não encontrado em $formPath";
        }
    }

    public function mostrarLogin(){
        $formPath = dirname(__DIR__, 2) . '/view/nutricionista/login.php';
        if (file_exists($formPath)) {
            include_once $formPath;
        } else {
            echo "Erro: Login não encontrado em $formPath";
        }
    }

    public function entrar() {
        $data = json_decode(file_get_contents("php://input"));
        if (!$data) $data = (object)$_POST;

        $nutricionista = new \Htdocs\Src\Models\Entity\Nutricionista(
            $data->id_usuario,
            $data->crm_nutricionista
        );
        echo json_encode($this->service->entrar($nutricionista));
    }

    public function mostrarConta(){
        $id = $_SESSION['id_usuario'] ?? null;
        if ($id) {
            echo json_encode($this->service->mostrarConta($id));
        } else {
            echo json_encode(["error" => "Usuário não está logado."]);
        }
    }

    public function atualizarConta() {
        $data = json_decode(file_get_contents("php://input"));
        if (!$data) $data = (object)$_POST;

        $nutricionista = new \Htdocs\Src\Models\Entity\Nutricionista(
            $data->id_usuario,
            $data->crm_nutricionista
        );
        echo json_encode($this->service->atualizarConta($nutricionista));
    }

    public function deletarConta() {
        $id = json_decode(file_get_contents("php://input"))->id_usuario ?? null;
        if ($id) {
            echo json_encode($this->service->deletarConta($id));
        } else {
            echo json_encode(["error" => "ID do usuário não fornecido."]);
        }
    }

    public function sairConta() {
        session_start();
        session_destroy();
        echo json_encode(["success" => "Usuário deslogado com sucesso."]);
    }
}
?>