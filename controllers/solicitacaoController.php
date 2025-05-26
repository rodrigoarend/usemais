<?php
require_once './services/solicitacaoService.php';

class solicitacaoController {
    private $service;

    public function __construct() {
        $this->service = new solicitacaoService();
    }

    public function criarSolicitacao() {
        $dados = json_decode(file_get_contents('php://input'), true);
        try {
            $novaSolicitacao = $this->service->criarSolicitacao($dados['colaborador_id'], $dados['beneficio_id']);
            echo json_encode($novaSolicitacao);
        } catch (Exception $e) {
            http_response_code(400);
            echo json_encode(['erro' => $e->getMessage()]);
        }
    }

    public function aprovarSolicitacao() {
        $dados = json_decode(file_get_contents('php://input'), true);
        $this->service->aprovarSolicitacao($dados['solicitacao_id'], $dados['aprovador_id']);
        echo json_encode(['mensagem' => 'Solicitação processada.']);
    }

    public function listarSolicitacoes() {
        echo json_encode($this->service->listarSolicitacoes());
    }
}

?>