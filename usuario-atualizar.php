<?php

require_once "include/classes.php";

$perfil_id = $_GET['perfil_id'];

$perfil = new Perfil($perfil_id);

require_once "include/f_vaga-check.php";

?>

<!DOCTYPE html>
<html lang="PT-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="include/vagas-dash.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="http://cdn.ckeditor.com/4.6.1/standard/ckeditor.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.21.2/dist/bootstrap-table.min.css">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    
    <script src="include/function-header.js"></script>

    <title>Painel | SmartParking </title>
</head>

</body>
        <?php
        require_once('include/header2.php');
        require_once ('include/f_verifica_a.php');

        ?>
                <!--
                <section id="breadcrumb">
                    <div class="container">
                        <ol class="breadcrumb d-flex align-items-center justify-content-center" style="height: 02vh;">
                            <li class="active text-start"> </li>
                        </ol>
                    </div>
                </section> -->
                <!-- Painel esquerda -->
                <section id="main">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="list-group">
                                    <a href="home.php" class="list-group-item" style="background-color: #f5f5f5; border-color: #ddd;" ><span class="glyphicon glyphicon-cog" aria-hidden="true" ></span> Dashboard</a>

                                    <a href="home.php" class="list-group-item"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Vagas Total <span class="badge"><?php echo $vagas ?> </span></a>

                                    <a href="home.php" class="list-group-item"><span class="glyphicon glyphicon-stats" aria-hidden="true"></span> Vagas Ativas <span class="badge" style="background: #337ab7;"><?php echo $totalVagas ?> </span></a>

                                    <a href="home.php" class="list-group-item"><span class="glyphicon glyphicon-ok-circle" aria-hidden="true"></span> Vagas Disponíveis <span class="badge" style="background: #7BB062;"><?php echo $vagasDisponiveis ?></span></a>

                                    <a href="home.php" class="list-group-item"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Usuários <span class="badge" ><?php echo $totalUsuarios ?></span></a>
                                    
                                </div>
                                <div class="well" style="background-color: #f5f5f5; border-color: #ddd;">
                                    <h4>Vagas Disponíveis</h4>
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" aria-valuenow="<?php echo $percentVagasAtivas ?>%" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $percentVagasAtivas ?>%;"> <?php echo $percentVagasAtivas ?>% 
                                        </div>
                                    </div>
                                    <h4>Vagas Ativas</h4>
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" aria-valuenow="<?php echo $percentVagasTotal ?>%" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $percentVagasTotal ?>%;"> <?php echo $percentVagasTotal ?>% 
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Painel direita -->
                            <div class="col-md-9">
                                <div class="panel panel-default">
                                    <div class="panel-heading" style="background-color: #f5f5f5; border-color: #ddd;">
                                        <h4 class="panel-title text-center"><b>Atualizar usuário</b></h4>
                                    </div>
                                    <div class="panel-body">
                                        <form class="" method="POST" action="include/f_perfil-atualiza.php">
                                            <div class="row">
                                                <div class="col-md-2 mb-3">
                                                    <label for="perfil_id" class="form-label text-uppercase fw-bold">ID</label>
                                                    <input type="number" class="form-control text-center" id="perfil_id" name="perfil_id" value="<?= $perfil->perfil_id?>" readonly>
                                                </div>
                                                <div class="col-md-4 mb-3">
                                                    <label for="perfil_nome" class="form-label text-uppercase fw-bold">Nome</label>
                                                    <input type="text" class="form-control" id="perfil_nome" name="perfil_nome" value="<?= $perfil->perfil_nome ?>" readonly>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label for="perfil_sobrenome" class="form-label text-uppercase fw-bold">Sobrenome</label>
                                                    <input type="text" class="form-control" id="perfil_sobrenome" name="perfil_sobrenome" value="<?= $perfil->perfil_sobrenome ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4 mb-3">
                                                    <label for="perfil_cpf" class="form-label text-uppercase fw-bold">CPF</label>
                                                    <input type="number" class="form-control" id="perfil_cpf" name="perfil_cpf" value="<?= $perfil->perfil_cpf ?>" readonly>
                                                </div>
                                                <div class="col-md-4 mb-3">
                                                    <label for="perfil_data" class="form-label text-uppercase fw-bold">Data de Nascimento</label>
                                                    <input type="date" class="form-control" id="perfil_data" name="perfil_data" value="<?= $perfil->perfil_data ?>" readonly>
                                                </div>
                                                <div class="col-md-4 mb-3">
                                                    <label for="perfil_data" class="form-label text-uppercase fw-bold">Telefone</label>
                                                    <input type="tel" class="form-control" id="perfil_telefone" name="perfil_telefone" onkeyup="handlePhone(event)" value="<?=$perfil->perfil_telefone ?>" >
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4 mb-3">
                                                    <label for="perfil_cep" class="form-label text-uppercase fw-bold">CEP</label>
                                                    <input type="text" class="form-control" id="perfil_cep" name="perfil_cep" value="<?= $perfil->perfil_cep ?>" required onblur="pesquisacep(this.value)">
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label for="perfil_logradouro" class="form-label text-uppercase fw-bold">Logradouro</label>
                                                    <input type="text" class="form-control" id="perfil_logradouro" name="perfil_logradouro" value="<?= $perfil->perfil_logradouro ?>">
                                                </div>
                                                <div class="col-md-2 mb-3">
                                                    <label for="perfil_numero" class="form-label text-uppercase fw-bold">Nº</label>
                                                    <input type="text" class="form-control" id="perfil_numero" name="perfil_numero" value="<?= $perfil->perfil_numero ?>">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4 mb-3">
                                                    <label for="perfil_bairro" class="form-label text-uppercase fw-bold">Bairro</label>
                                                    <input type="text" class="form-control" id="perfil_bairro" name="perfil_bairro" value="<?= $perfil->perfil_bairro ?>">
                                                </div>
                                                <div class="col-md-2 mb-3">
                                                    <label for="perfil_complemento" class="form-label text-uppercase fw-bold">Complemento</label>
                                                    <input type="text" class="form-control" id="perfil_complemento" name="perfil_complemento" value="<?= $perfil->perfil_complemento ?>">
                                                </div>
                                                <div class="col-md-4 mb-3">
                                                    <label for="perfil_municipio" class="form-label text-uppercase fw-bold">Cidade</label>
                                                    <input type="text" class="form-control" id="perfil_municipio" name="perfil_municipio" value="<?= $perfil->perfil_municipio ?>">
                                                </div>
                                                <div class="col-md-2 mb-3">
                                                    <label for="perfil_estado" class="form-label text-uppercase fw-bold">Estado</label>
                                                    <input type="text" class="form-control" id="perfil_estado" name="perfil_estado" value="<?= $perfil->perfil_estado ?>">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-2 mb-3">
                                                    <label for="login_perfil" class="form-label text-uppercase fw-bold">Perfil</label>
                                                    <select class="form-control" id="login_perfil" name="login_perfil" required>
                                                        <option value="admin" <?= ($perfil->login_perfil == "admin") ? "selected" : "" ?>>admin</option>
                                                        <option value="colab" <?= ($perfil->login_perfil == "colab") ? "selected" : "" ?>>colab</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label for="perfil_email" class="form-label text-uppercase fw-bold">E-mail:</label>
                                                    <input type="email" class="form-control" id="login_email" name="login_email" value="<?= $perfil->login_email ?>"required>
                                                    <div class="invalid-feedback">
                                                        É obrigatório inserir um E-mail válido.
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mb-3">
                                                    <label for="login_status" class="form-label text-uppercase fw-bold">Status:</label>
                                                    <select class="form-control" id="login_status" name="login_status" required>
                                                        <option value="0" <?= $perfil->login_status == 0 ? 'selected' : ''; ?>>Usuário ativo</option>
                                                        <option value="1" <?= $perfil->login_status == 1 ? 'selected' : ''; ?>>Usuário bloqueado</option>
                                                    </select>
                                                    <div class="invalid-feedback">
                                                        É obrigatório selecionar um Status válido.
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-6 mb-3">
                                                    <button type="submit" class="btn"><a class="btn btnVoltar text-uppercase fw-bold" style="background-color: #f5f5f5; border-color: #ddd;"href="usuario-visualizar.php">Voltar</a></button>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <button type="reset" class="btn text-uppercase fw-bold" style="background-color: #f5f5f5; border-color: #ddd; margin-left: 35px">Limpar dados</button>
                                                    <button type="submit" class="btn text-uppercase fw-bold" style="background-color: #f5f5f5; border-color: #ddd; margin-left: 40px">Atualizar</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
    <footer>
    <?php
      require_once('include/footer.php');
      ?>

        <script>
            function atualizarHora() {
                var horaAtual = new Date().toLocaleTimeString([], {
                    hour: '2-digit',
                    minute: '2-digit',
                    second: '2-digit'
                });
                document.getElementById("mov_hora_entrada").value = horaAtual;
            }
        </script>
    </footer>

    <script src="main.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="include/bootstrap.min.js"></script>
</body>

</html>