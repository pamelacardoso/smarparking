<?php
//Verificar em aberto

$countFaturaAbertoQuery = "SELECT COUNT(*) AS qtd_fatura_aberto FROM movimentacoes WHERE mov_status = '1' ";
$qtdFaturaAberto = $conexao->query($countFaturaAbertoQuery)->fetchColumn();

// Consulta para obter o total da coluna "mov_preco" para as linhas onde "mov_status" é igual a 1
$totalFaturaAbertoQuery = "SELECT SUM(mov_preco) AS total_fatura_ano FROM movimentacoes WHERE mov_status = '1'";
$totalFaturaAberto = $conexao->query($totalFaturaAbertoQuery)->fetchColumn();

// Consulta para obter os dados da tabela "movimentacoes" onde "mov_status" é igual a 1
$movimentacoesQuery = "SELECT mov_data_entrada, mov_hora_entrada FROM movimentacoes WHERE mov_status = '1'";
$result = $conexao->query($movimentacoesQuery);

// Variável para armazenar o total do preço
$totalPreco = 0;

// Loop através das linhas retornadas pela consulta
while ($mov = $result->fetch(PDO::FETCH_ASSOC)) {
    // Resto do código para calcular o preço

    // Define o fuso horário de São Paulo
    $timezone = new DateTimeZone('America/Sao_Paulo');

    // Obtém a data e hora atual com o fuso horário de São Paulo
    $dataSaida = new DateTime('now', $timezone);

    // Obtém a data e hora de entrada com o fuso horário de São Paulo
    $dataEntrada = new DateTime($mov['mov_data_entrada'] . ' ' . $mov['mov_hora_entrada'], $timezone);

    // Calcula a diferença entre a data e hora de entrada e a data e hora de saída
    $diferenca = $dataSaida->diff($dataEntrada);

    // Calcula o total de minutos, horas e dias da diferença
    $totalMinutos = $diferenca->days * 24 * 60 + $diferenca->h * 60 + $diferenca->i;

    // Calcula o preço com base no total de minutos
    $preco = 0; // valor inicial do preço

    if ($totalMinutos <= 30) {
        $preco = 1;
    } elseif ($totalMinutos <= 60) {
        $preco = 2;
    } elseif ($totalMinutos <= 90) {
        $preco = 3;
    } elseif ($totalMinutos <= 120) {
        $preco = 4;
    } elseif ($totalMinutos <= 150) {
        $preco = 5;
    } elseif ($totalMinutos <= 180) {
        $preco = 6;
    } else {
        $minutosExcedentes = $totalMinutos - 180;
        $precoExcedente = ceil($minutosExcedentes / 30);
        $preco = 6 + $precoExcedente;
    }

    // Adiciona o preço ao total
    $totalPreco += $preco;
}

// O total do preço calculado está armazenado em $totalPreco


//***************************************************************************** */
$currentYear = date('Y'); // Obtém o ano atual

$countFaturaAnoQuery = "SELECT COUNT(*) AS qtd_fatura_ano FROM movimentacoes WHERE mov_status = '0' AND YEAR(mov_data_saida) = {$currentYear}";
$qtdFaturaAno = $conexao->query($countFaturaAnoQuery)->fetchColumn();

$totalFaturaAnoQuery = "SELECT SUM(mov_preco) AS total_fatura_ano FROM movimentacoes WHERE mov_status = '0' AND YEAR(mov_data_saida) = {$currentYear}";
$totalFaturaAno = $conexao->query($totalFaturaAnoQuery)->fetchColumn();

$currentMonth = date('m'); // Obtém o mês atual

$countFaturaMesQuery = "SELECT COUNT(*) AS qtd_fatura_mes FROM movimentacoes WHERE mov_status = '0' AND MONTH(mov_data_saida) = {$currentMonth}";
$qtdFaturaMes = $conexao->query($countFaturaMesQuery)->fetchColumn();

$totalFaturaMesQuery = "SELECT SUM(mov_preco) AS total_fatura_mes FROM movimentacoes WHERE mov_status = '0' AND MONTH(mov_data_saida) = {$currentMonth}";
$totalFaturaMes = $conexao->query($totalFaturaMesQuery)->fetchColumn();

$currentDay = date('d'); // Obtém o dia atual

$countFaturaDiaQuery = "SELECT COUNT(*) AS qtd_fatura_dia FROM movimentacoes WHERE mov_status = '0' AND DAY(mov_data_saida) = {$currentDay}";
$qtdFaturaDia = $conexao->query($countFaturaDiaQuery)->fetchColumn();

$totalFaturaDiaQuery = "SELECT SUM(mov_preco) AS total_fatura_dia FROM movimentacoes WHERE mov_status = '0' AND DAY(mov_data_saida) = {$currentDay}";
$totalFaturaDia = $conexao->query($totalFaturaDiaQuery)->fetchColumn();



?>