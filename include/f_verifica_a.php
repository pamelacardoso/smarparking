<?php
if ($_SESSION['login_perfil'] !== 'admin') {
    //Você não tem permissão para acessar esta página
    //alterar depois para redirecionar a página ou exibir uma mensagem de erro
    echo "<script>alert('Você não tem permissão para acessar esta página.');
    window.location='home.php';
    </script>";
}
?>
