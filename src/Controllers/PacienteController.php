<?php
namespace Htdocs\Src\Controllers;

use Htdocs\Src\Services\PacienteService;

class PacienteController {
    private $service;

    public function __construct(PacienteService $service) {
        $this->service = $service;
    }

    public function criar() {
        $data = json_decode(file_get_contents("php://input"));
        if (!$data) {
            $data = (object)$_POST;
        }

        $paciente = new \Htdocs\Src\Models\Entity\Paciente(
            $data->id_usuario,
            $data->cpf,
            $data->nis
        );

        echo json_encode(
            $this->service->criar($paciente)
        );
    }

    public function mostrarFormulario(){
        $formPath = dirname(__DIR__, 2) . '/view/paciente/form.php';
        if (file_exists($formPath)) {
            include_once $formPath;
        } else {
            echo "Erro: Formulário não encontrado em $formPath";
        }
    }
    public function mostrarHome(){
        $formPath = dirname(__DIR__, 2) . '/view/paciente/index.php';
        if (file_exists($formPath)) {
            include_once $formPath;
        } else {
            echo "Erro: Início não encontrado em $formPath";
        }
    }
    public function mostrarLogin(){
        $formPath = dirname(__DIR__, 2) . '/view/paciente/login.php';
        if (file_exists($formPath)) {
            include_once $formPath;
        } else {
            echo "Erro: Login não encontrado em $formPath";
        }
    }
    public function entrar() {
        $data = json_decode(file_get_contents("php://input"));
        if (!$data) {
            $data = (object)$_POST;
        }

        $paciente = new \Htdocs\Src\Models\Entity\Paciente(
            $data->id_usuario,
            $data->cpf,
            $data->nis
        );

        echo json_encode(
            $this->service->entrar($paciente)
        );
    }
    public function mostrarConta(){
        $id = $_SESSION['id_usuario'] ?? null;
        if (!$id) {
            echo json_encode(["erro" => "Usuário não está logado."]);
            return;
        }

        echo json_encode(
            $this->service->mostrarConta($id)
        );
    }
    public function atualizarConta() {
        $data = json_decode(file_get_contents("php://input"));
        if (!$data) {
            $data = (object)$_POST;
        }

        $paciente = new \Htdocs\Src\Models\Entity\Paciente(
            $data->id_usuario,
            $data->cpf,
            $data->nis
        );

        echo json_encode(
            $this->service->atualizarConta($paciente)
        );
    }
    public function deletarConta() {
        $id = json_decode(file_get_contents("php://input"))->id_usuario ?? null;
        if (!$id) {
            $id = $_POST['id_usuario'] ?? null;
        }

        if (!$id) {
            echo json_encode(["erro" => "ID do usuário não fornecido."]);
            return;
        }

        echo json_encode(
            $this->service->deletarConta($id)
        );
    }
    public function sairConta() {
        // Lógica para encerrar a sessão do paciente
        session_destroy();
        echo json_encode(["sucesso" => "Sessão encerrada."]);
    }
}
?>