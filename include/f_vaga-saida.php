<?php

require_once "classes.php";

$mov_id = $_POST['mov_id'];
$saida = new Movimentacoes($mov_id);

$saida->mov_data_entrada = $_POST['mov_data_entrada'];
$saida->mov_hora_entrada = $_POST['mov_hora_entrada'];
$saida->mov_placa = $_POST['mov_placa'];
$saida->mov_data_saida = $_POST['mov_data_saida'];
$saida->mov_hora_saida = $_POST['mov_hora_saida'];
$saida->mov_preco = $_POST['mov_preco'];
$saida->mov_status = 0;

/*0 é falso e 1 é verdadeiro (vaga ocupada)*/

$saida->saida_inserir();


header('Location: ../home.php');
?>
