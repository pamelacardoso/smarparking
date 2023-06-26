<?php

// Função para calcular o preço com base no total de minutos
function calcularPreco($totalMinutos)
{
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

    return $preco;
}