<?php

// Define o fuso horário de São Paulo
$timezone = new DateTimeZone('America/Sao_Paulo');

// Obtém a data e hora atual com o fuso horário de São Paulo
$dataSaida = new DateTime('now', $timezone);

// Obtém a data e hora de entrada com o fuso horário de São Paulo
$dataEntrada = new DateTime($mov->mov_data_entrada . ' ' . $mov->mov_hora_entrada, $timezone);

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
