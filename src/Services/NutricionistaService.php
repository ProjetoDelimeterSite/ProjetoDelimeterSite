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
}
?>