<?php

session_start();

$id_login = $_SESSION['login_id'];

try {
    $conexao = new PDO('mysql:host=127.0.0.1;dbname=parking', 'root', '');
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Erro na conexão com o banco de dados: " . $e->getMessage();
    exit();
}

// Recupere o ID do login ativo
$login_id = $_SESSION['login_id'];

// Receba a nova senha do formulário
$senha = $_POST['login_senha'];

try {
    // Atualize a senha na tabela "logins" para o ID do login ativo
    $query = "UPDATE logins SET login_senha = :senha WHERE login_id = :id";
    $stmt = $conexao->prepare($query);
    $stmt->bindParam(':senha', $senha);
    $stmt->bindParam(':id', $login_id);
    $stmt->execute();

    // Verifique se a atualização foi bem-sucedida
    if ($stmt->rowCount() > 0) {
            $msg = "
            ************* SMARTPARKING **************

                    SENHA ALTERADA COM SUCESSO!!

            **********************************************
            ";

        echo "<script>
            var ticket = " . json_encode($msg) . ";
            alert(ticket);
            window.location='../home.php';
            </script>";
        // A senha foi atualizada com sucesso
    } else {
        // Ocorreu um erro ao atualizar a senha
        $msg = "
        ************* SMARTPARKING **************

            NÃO É POSSÍVEL USAR A MESMA SENHA.
                            TENTE NOVAMENTE.

        **********************************************
        ";

    echo "<script>
        var ticket = " . json_encode($msg) . ";
        alert(ticket);
        window.location='../usuario-senha.php';
        </script>";
    }
} catch (PDOException $e) {
    echo "Erro ao executar a consulta: " . $e->getMessage();
}

?>




