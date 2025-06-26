<?php
namespace Htdocs\Src\Services;

use Htdocs\Src\Models\Repository\PacienteRepository;
use Htdocs\Src\Models\Entity\Usuario;

class PacienteService {
    private $pacienteRepository;

    public function __construct(PacienteRepository $pacienteRepository) {
        $this->pacienteRepository = $pacienteRepository;
    }

    public function getPacienteRepository() {
        return $this->pacienteRepository;
    }

    public function criar(Usuario $usuario) {
        return $this->pacienteRepository->save($usuario);
    }

    public function listar() {
        return $this->pacienteRepository->findAll();
    }

    public function login($email, $senha) {
        $usuario = $this->pacienteRepository->findByEmail($email);
        if ($usuario && password_verify($senha, $usuario['senha_usuario'])) {
            unset($usuario['senha_usuario']);
            return $usuario;
        }
        return false;
    }
}
?>