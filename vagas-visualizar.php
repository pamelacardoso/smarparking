<?php
require_once "include/classes.php";
$lista_movimentacoes = new Movimentacoes();
$lista = $lista_movimentacoes->movimentacoes_listar_ativos();
//print_r($lista);
//die();

require_once "include/f_vaga-check.php";

require_once "include/classes.php";
$lista_vaga = new Vaga();
$lista = $lista_vaga->vaga_listar();
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
                                        <h4 class="panel-title text-center"><b>Visualizar vagas</b></h4> <br>
                                        <div class="mb-9 row">
                                            <div class="col-md-4 mx-auto">
                                                <input type="text" id="search-input" class="form-control" placeholder="Digite sua busca">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel-body">
                                        <table class="table table-striped table-hover" >
                                        <tr>
                                            <th class="text-center align-middle">Código Vaga</th>
                                            <th class="text-center align-middle">Índice Letra</th>
                                            <th class="text-center align-middle">Índice Número</th>
                                            <th class="text-center align-middle">Latitude</th>
                                            <th class="text-center align-middle">Longitude</th>
                                            <th class="text-center align-middle">Status</th>
                                            <th class="text-center align-middle">Localização</th>
                                            <th class="text-center align-middle">Ação</th>
                                        </tr>
                                        <?php foreach ($lista as $linha) : ?>
                                            <tr>
                                                <td class="text-center align-middle"><?php echo $linha['vaga_id'] ?></td>
                                                <td class="text-center align-middle"><?php echo $linha['vaga_letra'] ?></td>
                                                <td class="text-center align-middle"><?php echo $linha['vaga_num'] ?></td>
                                                <td class="text-center align-middle"><?php echo $linha['vaga_geo_lat'] ?></td>
                                                <td class="text-center align-middle"><?php echo $linha['vaga_geo_lgn'] ?></td>
                                                <td class="text-center align-middle"><?php echo $linha['vaga_status'] ? 'Pausada' : 'Em funcionamento'; ?></td>
                                                <td class="text-center align-middle">
                                                    <div id="map-<?php echo $linha['vaga_id']; ?>" style="width: 150px; height: 100px;"></div>
                                                </td>
                                                <td class="text-center align-middle map-container">
                                                    <a href="vagas-atualizar.php?vaga_id=<?= $linha['vaga_id'] ?>"><svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                                            <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z" />
                                                        </svg></a>
                                                </td>
                                            </tr>
                                        <?php endforeach ?>
                                        </table>

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

    </footer>

    <script src="main.js"></script>

    <script src="include/bootstrap.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#search-input').on('input', function() {
                var searchTerm = $(this).val().toLowerCase();
                $('table.table tr').each(function() {
                    var ticketText = $(this).text().toLowerCase();
                    if (ticketText.indexOf(searchTerm) === -1) {
                        $(this).hide();
                    } else {
                        $(this).show();
                    }
                });
            });
        });
    </script>

        <script>
            function initMap() {
                <?php foreach ($lista as $linha) : ?>
                    var lat = <?php echo $linha['vaga_geo_lat']; ?>;
                    var lng = <?php echo $linha['vaga_geo_lgn']; ?>;
                    var latLng = new google.maps.LatLng(lat, lng);
                    var mapOptions = {
                        zoom: 19,
                        mapTypeId: 'satellite', // Define o tipo de mapa como satélite
                        center: latLng,
                        disableDefaultUI: true // Desativa os controles padrão, incluindo o zoom
                    };
                    var map = new google.maps.Map(document.getElementById('map-<?php echo $linha['vaga_id']; ?>'), mapOptions);
                    var marker = new google.maps.Marker({
                        position: latLng,
                        map: map
                    });
                <?php endforeach ?>
            }
            google.maps.event.addDomListener(window, 'load', initMap);
        </script>
</body>

</html>