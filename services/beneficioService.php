<?php
require_once './models/beneficioModel.php';

class beneficioService
{
    private $beneficios;

    public function __construct()
    {
        $this->beneficios = include './db_mock/beneficios.php';
    }

    public function listarBeneficios()
    {
        return $this->beneficios;
    }

}
?>