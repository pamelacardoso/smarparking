<?php

$login_email = $_POST["login_email"];
$login_senha = $_POST["login_senha"];

$sql = "SELECT * FROM logins WHERE login_email = :login_email AND login_senha = :login_senha";
$conexao = new PDO('mysql:host=127.0.0.1;dbname=parking', 'root', '');

// Prepara a consulta SQL
$consulta = $conexao->prepare($sql);
$consulta->bindParam(':login_email', $login_email);
$consulta->bindParam(':login_senha', $login_senha);

// Executa a consulta
$consulta->execute();

// Obtém a primeira linha do resultado como um array associativo
$linha = $consulta->fetch();

if ($linha !== false) {
    if ($linha['login_status'] == 0) {
        $usuario_logado = $linha['login_email'];
        $perfil_usuario = $linha['login_perfil'];
        $login_id = $linha['login_id']; // Obtém o login_id da linha do banco de dados

        session_start();
        $_SESSION['usuario_logado'] = $usuario_logado;
        $_SESSION['login_perfil'] = $perfil_usuario;
        $_SESSION['login_id'] = $login_id; // Define o login_id na sessão
        header('Location: ../home.php');
    } else {
        // Usuário bloqueado
        echo "<script>alert('Usuário bloqueado. Entre em contato com o administrador.');
        window.location='../index.php';
        </script>";
    }
} else {
    // Usuário ou senha inválidos
    echo "<script>alert('Usuário ou senha inválidos.');
    window.location='../index.php';
    </script>";
}


?>

