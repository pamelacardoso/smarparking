<?php
// Inclui o arquivo que contém a definição da classe Turma
require_once "include/classes.php";

// Obtém o valor do parâmetro "id" passado na URL via método GET
$mov_id = $_GET['mov_id'];

// Cria um novo objeto da classe Turma passando o valor de $id como parâmetro
$mov = new Movimentacoes($mov_id);

require_once "include/f_vaga-check.php";

require_once "include/f_preco-saida.php";


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
    
    <title>Painel | SmartParking </title>
</head>

</body>
        <?php
        require_once('include/header2.php');
        require_once('include/f_vaga-check.php');
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
                                        <h4 class="panel-title text-center"><b>Finalizar ticket</b></h4>
                                    </div>
                                    <div class="panel-body">


                                    <div class="row justify-content-center">
                                        <div class="col-md-8 order-md-1">
                                            <form class="" method="POST" action="include/f_vaga-saida.php">

                                                <div class="row">
                                                    <div class="col-md-2 mb-3">
                                                        <label for="mov_id" class="form-label text-uppercase fw-bold">Ticket:</label>
                                                        <input type="text" class="form-control" id="mov_id" name="mov_id" value="<?= $mov->mov_id ?>" readonly>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4 mb-3">
                                                        <label for="mov_data_entrada" class="form-label text-uppercase fw-bold">Data Entrada:</label>
                                                        <input type="date" class="form-control" id="mov_data_entrada" name="mov_data_entrada" value="<?= $mov->mov_data_entrada ?>" readonly>
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <label for="mov_hora_entrada" class="form-label text-uppercase fw-bold">Hora Entrada:</label>
                                                        <input type="time" class="form-control" id="mov_hora_entrada" name="mov_hora_entrada" step="2" value="<?= $mov->mov_hora_entrada ?>" readonly>
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <label for="mov_placa" class="form-label text-uppercase fw-bold">Placa:</label>
                                                        <input type="text" class="form-control" id="mov_placa" name="mov_placa" value="<?= $mov->mov_placa ?>" readonly>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4 mb-3">
                                                        <label for="mov_data_saida" class="form-label text-uppercase fw-bold">Data Saída:</label>
                                                        <input type="date" class="form-control" id="mov_data_saida" name="mov_data_saida" value="<?php echo date("Y-m-d"); ?>">
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <label for="mov_hora_saida" class="form-label text-uppercase fw-bold">Hora Saída:</label>
                                                        <div class="input-group flex-nowrap">
                                                            <input type="time" class="form-control" id="mov_hora_saida" name="mov_hora_saida" placeholder="" step="1" value="<?php echo date("H:i:s"); ?>" required>
                                                            <button class="btn fw-bold text-uppercase ms-2" style="background-color: #f5f5f5; border-color: #ddd;" type="button" onclick="atualizarHora()">Atualizar</button>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 mb-3 mx-auto">
                                                        <label for="mov_preco" class="form-label text-uppercase fw-bold">Valor:</label>
                                                        <input type="text" class="form-control" id="mov_preco" name="mov_preco" value="<?= number_format($preco, 2, ',', '.'); ?>" readonly>
                                                    </div>

                                                </div>
                                                    <div class="row justify-content-center">
                                                        <div class="col-md-7 mb-3">
                                                            <button type="submit" class="btn"><a class="btn btnVoltar text-uppercase fw-bold" style="background-color: #f5f5f5; border-color: #ddd;" href="ticket-ativos.php">Voltar</a></button>
                                                        </div>
                                                        <div class="col-md-5 mb-3">
                                                            <button type="submit" class="btn text-uppercase fw-bold" style="background-color: #f5f5f5; border-color: #ddd; margin-left: 200px"><a style="text-decoration: none; ">Finalizar</a></button>
                                                        </div>
                                                    </div>

                                            </form>
                                        </div>
                                    </div>

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
               /* var horaAtual = new Date().toLocaleTimeString([], {
                    hour: '2-digit',
                    minute: '2-digit',
                    second: '2-digit'
                });
                document.getElementById("mov_hora_saida").value = horaAtual;*/
                location.reload();
            }



            
        </script>
    </footer>

    <script src="main.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="include/bootstrap.min.js"></script>
</body>

</html>