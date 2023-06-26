<?php
require_once "classes.php";

/* PERFIL */
$perfil = new Perfil();


$perfil->perfil_nome = $_POST['perfil_nome'];
$perfil->perfil_sobrenome = $_POST['perfil_sobrenome'];
$perfil->perfil_cpf = $_POST['perfil_cpf'];
$perfil->perfil_data = $_POST['perfil_data'];
$perfil->perfil_telefone = $_POST['perfil_telefone'];
$perfil->perfil_cep = $_POST['perfil_cep'];
$perfil->perfil_logradouro = $_POST['perfil_logradouro'];
$perfil->perfil_numero = $_POST['perfil_numero'];
$perfil->perfil_bairro = $_POST['perfil_bairro'];
$perfil->perfil_complemento = $_POST['perfil_complemento'];
$perfil->perfil_municipio = $_POST['perfil_municipio'];
$perfil->perfil_estado = $_POST['perfil_estado'];
$perfil->perfil_perfil = $_POST['perfil_perfil'];
$perfil->perfil_email = $_POST['perfil_email'];
$perfil->perfil_senha = $_POST['perfil_senha'];


$perfil->perfil_inserir();
