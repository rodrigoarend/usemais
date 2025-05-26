<?php
require_once './services/beneficioService.php';

class beneficioController {
    private $service;

    public function __construct() {
        $this->service = new beneficioService();
    }


    public function listarBeneficios() {
        echo json_encode($this->service->listarBeneficios());
    }
}

?>