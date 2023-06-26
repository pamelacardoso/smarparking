<?php
// Incluir o arquivo de conexão com o banco de dados
$conexao = new PDO('mysql:host=127.0.0.1;dbname=parking', 'root', '');

// Consulta para contar o número total de vagas com status "funcionamento" onde 0 é ativo
$countVagasQuery = "SELECT COUNT(*) AS total_vagas FROM vagas WHERE vaga_status = '0'";
$totalVagas = $conexao->query($countVagasQuery)->fetchColumn();

// Consulta para contar o número total de vagas 
$countVagasTodosQuery = "SELECT COUNT(vaga_status) AS total_vagas FROM vagas";
$vagas = $conexao->query($countVagasTodosQuery)->fetchColumn();

// Consulta para contar o número total de carros na tabela "movimentacoes" onde 1 é vaga em uso
$countCarrosQuery = "SELECT COUNT(*) AS total_carros FROM movimentacoes WHERE mov_status = '1'";
$totalCarros = $conexao->query($countCarrosQuery)->fetchColumn();

// Calcular o número de vagas disponíveis
$vagasDisponiveis = $totalVagas - $totalCarros;

//Porcentagem de vagas ativas / total
$percentVagasTotal = number_format((($totalVagas/$vagas)*100),0);

//Porcentagem de vagas disponíveis / ativas
$percentVagasAtivas = number_format((($vagasDisponiveis/$totalVagas)*100),0);

//Contar total de usuários
$countUsuariosTodosQuery = "SELECT COUNT(login_id) AS total_usuario FROM logins WHERE login_status = '0'";
$totalUsuarios = $conexao->query($countUsuariosTodosQuery)->fetchColumn();


