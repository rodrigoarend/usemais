<?php
require_once './models/solicitacaoModel.php';

class solicitacaoService {
    private $solicitacoes = [];
    private $beneficios;

    public function __construct() {
        $this->beneficios = include './db_mock/beneficios.php';
    }

    private function getBeneficioPorId($id) {
        foreach ($this->beneficios as $benef) {
            if ($benef->id == $id) return $benef;
        }
        return null;
    }

    public function criarSolicitacao($colaborador_id, $beneficio_id) {
        if (!$this->liberadoSolicitar($colaborador_id, $beneficio_id)) {
            throw new Exception("Solicitação já realizada para o mês atual.");
        }

        $id_solicitacao = uniqid();
        $solicitacao = new solicitacaoModel($id_solicitacao, $colaborador_id, $beneficio_id, date('Y-m-d'));
        $this->solicitacoes[] = $solicitacao;
        return $solicitacao;
    }

    public function liberadoSolicitar($colaborador_id, $beneficio_id) {
        $mesAtual = date('m');
        //Regra de negócio: 1x por mês
        foreach ($this->solicitacoes as $s) {
            if ($s->colaborador_id === $colaborador_id && $s->beneficio_id === $beneficio_id && date('m', strtotime($s->data_solicitacao)) === $mesAtual) {
                return false;
            }
        }
        return true;
    }

    public function aprovarSolicitacao($solicitacao_id, $aprovador_id) {
        foreach ($this->solicitacoes as $solic) {
            if ($solic->id === $solicitacao_id && $solic->status === 'aguardando') {
                if (!in_array($aprovador_id, $solic->aprovacoes)) {
                    $solic->aprovacoes[] = $aprovador_id;
                }

                $beneficio = $this->getBeneficioPorId($solic->beneficio_id);
                $precisaDupla = $beneficio->aprov_duplo;

                //Regra de negócio: aprovacao dupla
                if ((!$precisaDupla && count($solic->aprovacoes) >= 1) || ($precisaDupla && count($solic->aprovacoes) >= 2)) {
                    $solic->status = 'aprovado';
                }else{
                    $solic->status = 'reprovado';
                }
            }
        }
    }

    public function listarSolicitacoes() {
        return $this->solicitacoes;
    }
}

?>