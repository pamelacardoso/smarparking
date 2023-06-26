<?php
require_once "classes.php";

/* VAGA */
$vaga = new Vaga();


$vaga->vaga_letra = $_POST['vaga_letra'];
$vaga->vaga_num = $_POST['vaga_num'];
$vaga->vaga_geo_lat = $_POST['vaga_geo_lat'];
$vaga->vaga_geo_lgn = $_POST['vaga_geo_lgn'];
$vaga->vaga_status = $_POST['vaga_status'];

$vaga->vaga_inserir();

header('Location: ../vaga-cadastro.php');

?>