<?php
class solicitacaoModel {
    public $id_solicitacao;
    public $id_colaborador;
    public $id_beneficio;
    public $data_solicitacao;
    public $status;
    public $id_aprovador;
    public $aprovacao;

    public function __construct($id_solicitacao, $id_colaborador, $id_beneficio, $data_solicitacao) {
        $this->id_solicitacao = $id_solicitacao;
        $this->id_colaborador = $id_colaborador;
        $this->id_beneficio = $id_beneficio;
        $this->data_solicitacao = $data_solicitacao;
        $this->status = 'aguardando';
        $this->id_aprovador = null;
        $this->aprovacao = [];
    }
}

?>