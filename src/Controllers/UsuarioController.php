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
        $this->service->criar($usuario);

        // Se for requisição POST tradicional (formulário), redireciona para login
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && empty($_SERVER['HTTP_X_REQUESTED_WITH'])) {
            header('Location: /usuario/login');
            exit;
        }

        // Caso contrário, retorna JSON (para AJAX)
        echo json_encode(['success' => true]);
    }

    public function mostrar() {
        $usuarios = $this->service->listar();
        echo json_encode($usuarios);
    }
    public function mostrarFormulario(){
        $formPath = dirname(__DIR__, 2) . '/view/usuario/form.php';
        if (file_exists($formPath)) {
            include_once $formPath;
        } else {
            echo "Erro: Formulário não encontrado em $formPath";
        }
    }
    public function mostrarHome(){
        $formPath = dirname(__DIR__, 2) . '/view/usuario/index.php';
        if (file_exists($formPath)) {
            include_once $formPath;
        } else {
            echo "Erro: Início não encontrado em $formPath";
        }
    }
    public function mostrarLogin(){
        $formPath = dirname(__DIR__, 2) . '/view/usuario/login.php';
        if (file_exists($formPath)) {
            include_once $formPath;
        } else {
            echo "Erro: Login não encontrado em $formPath";
        }
    }
    public function entrar() {
        $data = json_decode(file_get_contents("php://input"));
        if (!$data) $data = (object)$_POST;

        // Verifica se os campos esperados estão presentes
        if (!isset($data->email_usuario) || !isset($data->senha_usuario)) {
            echo json_encode(['error' => 'Dados incompletos.']);
            return;
        }

        // Tenta login como usuario
        $usuario = $this->service->login($data->email_usuario, $data->senha_usuario);
        if ($usuario) {
            $_SESSION['usuario'] = $usuario;
            $_SESSION['usuario']['tipo'] = 'usuario';
            $_SESSION['usuario']['id'] = $usuario['id_usuario'] ?? $usuario['id'] ?? null;
            if ($_SERVER['REQUEST_METHOD'] === 'POST' && empty($_SERVER['HTTP_X_REQUESTED_WITH'])) {
                header('Location: /');
                exit;
            }
            echo json_encode(['success' => true, 'usuario' => $_SESSION['usuario']]);
            return;
        }

        // Tenta login como paciente
        $pacienteRepo = new \Htdocs\Src\Models\Repository\PacienteRepository();
        $paciente = $pacienteRepo->findByEmail($data->email_usuario);
        if ($paciente && password_verify($data->senha_usuario, $paciente['senha_usuario'])) {
            unset($paciente['senha_usuario']);
            $_SESSION['usuario'] = $paciente;
            $_SESSION['usuario']['tipo'] = 'paciente';
            $_SESSION['usuario']['id'] = $paciente['id_usuario'] ?? $paciente['id'] ?? null;
            if ($_SERVER['REQUEST_METHOD'] === 'POST' && empty($_SERVER['HTTP_X_REQUESTED_WITH'])) {
                header('Location: /paciente');
                exit;
            }
            echo json_encode(['success' => true, 'usuario' => $_SESSION['usuario']]);
            return;
        }

        // Tenta login como nutricionista
        $nutriRepo = new \Htdocs\Src\Models\Repository\NutricionistaRepository();
        $nutri = $nutriRepo->findByEmail($data->email_usuario);
        if ($nutri && password_verify($data->senha_usuario, $nutri['senha_usuario'])) {
            unset($nutri['senha_usuario']);
            $_SESSION['usuario'] = $nutri;
            $_SESSION['usuario']['tipo'] = 'nutricionista';
            $_SESSION['usuario']['id'] = $nutri['id_usuario'] ?? $nutri['id'] ?? null;
            if ($_SERVER['REQUEST_METHOD'] === 'POST' && empty($_SERVER['HTTP_X_REQUESTED_WITH'])) {
                header('Location: /nutricionista');
                exit;
            }
            echo json_encode(['success' => true, 'usuario' => $_SESSION['usuario']]);
            return;
        }

        // Tenta login como medico
        $medicoRepo = new \Htdocs\Src\Models\Repository\MedicoRepository();
        $medico = $medicoRepo->findByEmail($data->email_usuario);
        if ($medico && password_verify($data->senha_usuario, $medico['senha_usuario'])) {
            unset($medico['senha_usuario']);
            $_SESSION['usuario'] = $medico;
            $_SESSION['usuario']['tipo'] = 'medico';
            $_SESSION['usuario']['id'] = $medico['id_usuario'] ?? $medico['id'] ?? null;
            if ($_SERVER['REQUEST_METHOD'] === 'POST' && empty($_SERVER['HTTP_X_REQUESTED_WITH'])) {
                header('Location: /medico');
                exit;
            }
            echo json_encode(['success' => true, 'usuario' => $_SESSION['usuario']]);
            return;
        }

        // Nenhum login válido
        echo json_encode(['error' => 'Credenciais inválidas.']);
    }

    public function mostrarConta() {
        if (!isset($_SESSION['usuario'])) {
            header('Location: /usuario/login');
            exit;
        }
        $formPath = dirname(__DIR__, 2) . '/view/usuario/conta.php';
        if (file_exists($formPath)) {
            include_once $formPath;
        } else {
            echo "Erro: Conta não encontrada em $formPath";
        }
    }

    public function atualizarConta() {
        if (!isset($_SESSION['usuario'])) {
            header('Location: /usuario/login');
            exit;
        }
        $id = $_SESSION['usuario']['id_usuario'] ?? $_SESSION['usuario']['id'] ?? null;
        $nome = $_POST['nome_usuario'] ?? '';
        $email = $_POST['email_usuario'] ?? '';
        $senha = $_POST['senha_usuario'] ?? null;

        if ($id && $nome && $email) {
            $usuario = new \Htdocs\Src\Models\Entity\Usuario($id, $nome, $email, $senha ? password_hash($senha, PASSWORD_DEFAULT) : null);
            $this->service->getUsuarioRepository()->update($usuario);
            // Atualiza sessão
            $_SESSION['usuario']['nome_usuario'] = $nome;
            $_SESSION['usuario']['email_usuario'] = $email;
            header('Location: /conta?atualizado=1');
            exit;
        }
        header('Location: /conta?erro=1');
        exit;
    }

    public function deletarConta() {
        if (!isset($_SESSION['usuario'])) {
            header('Location: /usuario/login');
            exit;
        }
        $id = $_SESSION['usuario']['id_usuario'] ?? $_SESSION['usuario']['id'] ?? null;
        if ($id) {
            $this->service->getUsuarioRepository()->delete($id);
            session_destroy();
            header('Location: /');
            exit;
        }
        header('Location: /conta?erro=1');
        exit;
    }

    public function sairConta() {
        session_destroy();
        header('Location: /');
        exit;
    }
}
?>