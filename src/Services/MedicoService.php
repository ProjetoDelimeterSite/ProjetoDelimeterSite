<?php
namespace Htdocs\Src\Services;

use Htdocs\Src\Models\Repository\MedicoRepository;
use Htdocs\Src\Models\Entity\Usuario;

class MedicoService {
    private $medicoRepository;

    public function __construct(MedicoRepository $medicoRepository) {
        $this->medicoRepository = $medicoRepository;
    }

    public function getMedicoRepository() {
        return $this->medicoRepository;
    }

    public function criar(Usuario $usuario) {
        return $this->medicoRepository->save($usuario);
    }

    public function listar() {
        return $this->medicoRepository->findAll();
    }

    public function login($email, $senha) {
        $usuario = $this->medicoRepository->findByEmail($email);
        if ($usuario && password_verify($senha, $usuario['senha_usuario'])) {
            unset($usuario['senha_usuario']);
            return $usuario;
        }
        return false;
    }
}
?>