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

        $id_usuario = $_SESSION['usuario']['id_usuario'] ?? $_SESSION['usuario']['id'] ?? null;
        $crm = $data->crm_nutricionista ?? null;

        if (!$id_usuario || !$crm) {
            echo json_encode(['error' => 'Dados incompletos para vincular nutricionista.']);
            return;
        }

        $nutricionista = new \Htdocs\Src\Models\Entity\Nutricionista(
            $id_usuario,
            $crm
        );
        $this->service->criar($nutricionista);

        // Redireciona para o painel do nutricionista após o vínculo
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && empty($_SERVER['HTTP_X_REQUESTED_WITH'])) {
            $_SESSION['usuario']['tipo'] = 'nutricionista';
            header('Location: /nutricionista');
            exit;
        }

        echo json_encode(['success' => true]);
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
        $id_usuario = $_SESSION['usuario']['id_usuario'] ?? $_SESSION['usuario']['id'] ?? $_SESSION['usuario_id'] ?? null;
        if (!$id_usuario) {
            header('Location: /usuario/login');
            exit;
        }
        $nutricionista = $this->service->getNutricionistaRepository()->findById($id_usuario);
        if (!$nutricionista) {
            header('Location: /nutricionista/cadastro');
            exit;
        }
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

    // O login do nutricionista é feito via UsuarioController, não precisa duplicar aqui

    public function mostrarConta(){
        $id = $_SESSION['usuario']['id_usuario'] ?? $_SESSION['usuario']['id'] ?? null;
        if ($id) {
            echo json_encode($this->service->mostrarConta($id));
        } else {
            echo json_encode(["error" => "Usuário não está logado."]);
        }
    }

    public function atualizarConta() {
        $data = json_decode(file_get_contents("php://input"));
        if (!$data) $data = (object)$_POST;

        $id_usuario = $_SESSION['usuario']['id_usuario'] ?? $_SESSION['usuario']['id'] ?? null;
        $crm = $data->crm_nutricionista ?? null;

        if (!$id_usuario || !$crm) {
            echo json_encode(['error' => 'Dados incompletos para atualizar nutricionista.']);
            return;
        }

        $nutricionista = new \Htdocs\Src\Models\Entity\Nutricionista(
            $id_usuario,
            $crm
        );
        $this->service->atualizarConta($nutricionista);

        // Compatível com rota exclusiva, não redireciona para /conta
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && empty($_SERVER['HTTP_X_REQUESTED_WITH'])) {
            header('Location: /nutricionista/conta/atualizar?sucesso=1');
            exit;
        }

        echo json_encode(['success' => true]);
    }

    public function deletarConta() {
        $id = $_SESSION['usuario']['id_usuario'] ?? $_SESSION['usuario']['id'] ?? null;
        if ($id) {
            $this->service->deletarConta($id);
            session_destroy();
            // Compatível com rota exclusiva, não redireciona para /
            if ($_SERVER['REQUEST_METHOD'] === 'POST' && empty($_SERVER['HTTP_X_REQUESTED_WITH'])) {
                header('Location: /nutricionista/login');
                exit;
            }
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(["error" => "ID do usuário não fornecido."]);
        }
    }

    public function sairConta() {
        session_destroy();
        // Compatível com rota exclusiva, não redireciona para /
        if ($_SERVER['REQUEST_METHOD'] === 'GET' && empty($_SERVER['HTTP_X_REQUESTED_WITH'])) {
            header('Location: /nutricionista/login');
            exit;
        }
        echo json_encode(["success" => "Usuário deslogado com sucesso."]);
    }
}
?>