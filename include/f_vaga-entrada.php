<?php
require_once "classes.php";

/* ENTRADA */

$entrada = new Movimentacoes();

$entrada->mov_data_entrada = $_POST['mov_data_entrada'];
$entrada->mov_hora_entrada = $_POST['mov_hora_entrada'];
$entrada->mov_placa = $_POST['mov_placa'];
$entrada->mov_status = 1;

/*0 é falso e 1 é verdadeiro (vaga ocupada)*/

$entrada->entrada_inserir()
?>