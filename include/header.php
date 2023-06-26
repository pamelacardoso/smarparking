<?php

session_start();

if (!isset($_SESSION['usuario_logado'])) {
    //Você não tem acesso a esta funcionalidade
    //alterar depois para redirecionar a página
    echo  "<script>alert('Faça o login para acessar esta página.');
    window.location='index.php';
    </script>";
} elseif ($_SESSION['login_perfil'] !== 'admin' && $_SESSION['login_perfil'] !== 'colab') {
    //Você não tem permissão para acessar esta página
    //alterar depois para redirecionar a página ou exibir uma mensagem de erro
    echo "<script>alert('Você não tem permissão para acessar esta página.');
    window.location='index.php';
    </script>";
}
?>

<?php
date_default_timezone_set('America/Sao_Paulo');

?>

<head>
    <meta charset="utf-8">
    <style>
        .dropdown:hover .dropdown-menu {
            display: block;
            position: absolute;
            transform: translate3d(5px, 28px, 0px);
            top: 0px;
            left: 0px;
            will-change: transform;
        }

        .dropdown {
            display: inline-block;
            list-style: none;
        }
        
        .navbar-brand {
            flex-grow: 1; /* Permite que o logo ocupe todo o espaço disponível */
        }
        
        .nav-links {
            display: flex;
            align-items: center;
        }
        
        .nav-links .dropdown {
            margin-right: 00px; /* Espaçamento entre o dropdown e os outros elementos */
        }
    </style>
</head>

    <div class="w-100">
        <nav class="navbar bg-body-tertiary">
            <a class="navbar-brand ms-5" href="home.php"><img src="img/logo_new.png" alt="" width="100px"></a>
            <li class="nav-item dropdown me-5">
                <a class="nav-link btn dropdown-toggle rounded fw-bold ms-1 p-2 text-center text-uppercase" href="#" id="navbarDropdownMenuLink" style="background-color: #7BB062; color: white; width: 180px;">
                    Olá, <?php echo $_SESSION['usuario_logado'] ?>
                </a>
                <div class="dropdown-menu" style="margin-top: 10px;" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item mt-2 text-uppercase fw-bold" style="background-color: #7BB062; color: white;" href="include/f_logout.php">Sair</a>

                </div>
            </li>

        </nav>
    </div>