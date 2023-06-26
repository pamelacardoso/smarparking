<?php

require_once "classes.php";

$perfil_id = $_POST['perfil_id'];
$perfil_atualiza = new Perfil($perfil_id);

$perfil_atualiza->perfil_cep = $_POST['perfil_cep'];
$perfil_atualiza->perfil_logradouro = $_POST['perfil_logradouro'];
$perfil_atualiza->perfil_numero = $_POST['perfil_numero'];
$perfil_atualiza->perfil_bairro = $_POST['perfil_bairro'];
$perfil_atualiza->perfil_complemento = $_POST['perfil_complemento'];
$perfil_atualiza->perfil_municipio = $_POST['perfil_municipio'];
$perfil_atualiza->perfil_estado = $_POST['perfil_estado'];

$perfil_atualiza->login_email = $_POST['login_email'];
$perfil_atualiza->login_status = $_POST['login_status'];
$perfil_atualiza->login_perfil = $_POST['login_perfil'];

$perfil_atualiza->perfil_atualiza();


header('Location: ../usuario-visualizar.php');
