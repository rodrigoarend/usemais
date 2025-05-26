<?php
class beneficioModel {
    public $id_beneficio;
    public $nome;
    public $tipo;
    public $descricao;
    public $aprov_duplo;

    public function __construct($id_beneficio, $nome, $tipo, $descricao = "", $aprov_duplo = false) {
        $this->id_beneficio = $id_beneficio;
        $this->nome = $nome;
        $this->tipo = $tipo;
        $this->descricao = $descricao;
        $this->aprov_duplo = $aprov_duplo;
    }
}

?>