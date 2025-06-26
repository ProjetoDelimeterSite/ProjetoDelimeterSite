<?php
namespace Htdocs\Src\Services;

use Htdocs\Src\Models\Repository\NutricionistaRepository;
use Htdocs\Src\Models\Entity\Usuario;

class NutricionistaService {
    private $nutricionistaRepository;

    public function __construct(NutricionistaRepository $nutricionistaRepository) {
        $this->nutricionistaRepository = $nutricionistaRepository;
    }

    public function getNutricionistaRepository() {
        return $this->nutricionistaRepository;
    }

    public function criar(Usuario $usuario) {
        return $this->nutricionistaRepository->save($usuario);
    }

    public function listar() {
        return $this->nutricionistaRepository->findAll();
    }

    public function login($email, $senha) {
        $usuario = $this->nutricionistaRepository->findByEmail($email);
        if ($usuario && password_verify($senha, $usuario['senha_usuario'])) {
            unset($usuario['senha_usuario']);
            return $usuario;
        }
        return false;
    }
}
?>