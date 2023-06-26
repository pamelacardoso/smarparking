<?php

require_once "classes.php";

$vaga_id = $_POST['vaga_id'];
$vaga = new Vaga($vaga_id);

$vaga->vaga_letra = $_POST['vaga_letra'];
$vaga->vaga_num = $_POST['vaga_num'];
$vaga->vaga_geo_lat = $_POST['vaga_geo_lat'];
$vaga->vaga_geo_lgn = $_POST['vaga_geo_lgn'];
$vaga->vaga_status = $_POST['vaga_status'];

/*0 é falso e 1 é verdadeiro (vaga inativada)*/

$vaga->vaga_status_atualizar();

// Redireciona a página para a listagem de turmas
header('Location: ../vagas-visualizar.php');
?>