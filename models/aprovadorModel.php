<?php
class aprovadorModel {
    public $id_aprovador;
    public $nome;

    public function __construct($id_aprovador, $nome) {
        $this->id_aprovador = $id_aprovador;
        $this->nome = $nome;
    }
}

?>