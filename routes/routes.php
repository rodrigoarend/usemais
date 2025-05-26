<?php
require_once './controllers/solicitacaoController.php';
require_once './controllers/beneficioController.php';

$metodo = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

$controllerSolicitacao = new solicitacaoController();
$controllerBeneficio = new beneficioController();

if ($metodo === 'POST' && $uri === '/solicitacao') {
    $controllerSolicitacao->criarSolicitacao();
} else if ($metodo === 'POST' && $uri === '/solicitacao/aprovar') {
    $controllerSolicitacao->aprovarSolicitacao();
} else if ($metodo === 'GET' && $uri === '/solicitacao') {
    $controllerSolicitacao->listarSolicitacoes();
} else if ($metodo === 'GET' && $uri === '/beneficio') {
    $controllerBeneficio->listarBeneficios();
} else {
    http_response_code(404);
    echo json_encode(["erro" => "Rota Incorreta"]);
}

?>