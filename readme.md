#Desafio Técnico - API de Solicitação de Benefícios
Sistema de backend simulado para gestão de benefícios internos 

Desenvolvedor: Rodrigo Cesar Arend
- Estrutura de pastas
desafioTecnico/
- ├── index.php
- ├── controllers/
- │   └── beneficioController.php
- │   └── solicitacaoController.php
- ├── db_mock/
- │   └── beneficios.php
- ├── models/
- │   ├── aprovadorModel.php
- │   ├── beneficioModel.php
- │   ├── colaboradorModel.php
- │   ├── solicitacaoModel.php
- └── routes/
- └── routes.php
- ├── services/
│   └── beneficioService.php
- │   └── solicitacaoService.php


- Tecnologias
- •	API REST em PHP
- •	Simulação com dados em memória (sem banco)
- •	Estrutura modular (Controllers, Services, Models, Routes)


- O que será implementado:
- API REST em PHP com endpoints para:
- Listar benefícios
- Criar solicitação
- Aprovar solicitação
- Listar solicitações


- Modelagem: Colaborador, Benefício, Solicitação de Benefício, Aprovador.


- Regras de negócio:
- Um colaborador só pode solicitar um mesmo benefício 1x por mês. 
- Benefícios com aprovacao_dupla precisam de duas aprovações.

Rotas
- ‘POST /solicitacao’ – Criar nova solicitação
- ‘POST /solicitacao/aprovar’ – Aprovar/recusar solicitação
- ‘GET /solicitacao’ – Listar todas as solicitações
- ‘GET /beneficio’ – Listar todas os benefícios


- Como Rodar
- Necessário instalar um servidor local da linguagem PHP (como XAMPP)
- Inicie Servidor:
php -S localhost:8000 
- Testando 

Criar solicitação:

curl -X POST http://localhost:8000/solicitacao \
-H "Content-Type: application/json" \
-d '{"colaborador_id": "123", "beneficio_id": "3"}'

Aprovar solicitação:

curl -X POST http://localhost:8000/solicitacao/aprovar \
-H "Content-Type: application/json" \
-d '{"solicitacao_id": "123", "aprovador_id": "111"}'

Listar solicitações:
curl http://localhost:8000/solicitacao 	

Listar benefícios:
curl http://localhost:8000/beneficio


