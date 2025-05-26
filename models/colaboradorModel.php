<?php
class colaboradorModel {
    public $id_colaborador;
    public $nome;

    public function __construct($id_colaborador, $nome) {
        $this->id_colaborador = $id_colaborador;
        $this->nome = $nome;
    }
}

?>