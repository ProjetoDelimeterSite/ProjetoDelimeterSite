<?php
namespace Htdocs\Src\Services;

use Htdocs\Src\Models\Repository\UsuarioRepository;
use Htdocs\Src\Models\Entity\Usuario;

class UsuarioService {
    private $usuarioRepository;

    public function __construct(UsuarioRepository $usuarioRepository) {
        $this->usuarioRepository = $usuarioRepository;
    }

    public function criar(Usuario $usuario) {
        return $this->usuarioRepository->save($usuario);
    }

    public function listar() {
        return $this->usuarioRepository->findAll();
    }
}
?>