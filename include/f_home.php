<?php 

include_once ('classes.php'); 

$perfil_usuario = ''; 

if (is_admin()) {
    $perfil_usuario = 'admin';
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
                                        <h3 class="panel-title"><b>Portal</b></h3>
                                    </div>
                                    <div class="panel-body">
                                        <div class="col-md-4">
                                            <a href="usuario-novo.php" style="text-decoration: none;">
                                            <div class="well dash-box" style="background: #40BFA9; color: #fff; margin-top: 0px; margin-bottom: 0px; padding-top: 0px; padding-bottom: 0px">
                                                <h6><span class="glyphicon glyphicon-user" aria-hidden="true"> Usuário | Cadastro</span></h6>
                                                <h4>Novo usuário</h4>
                                            </div> </a>
                                        </div>
                                        <div class="col-md-4">
                                            <a href="usuario-visualizar.php" style="text-decoration: none;">
                                            <div class="well dash-box" style="background: #40BFA9; color: #fff; margin-top: 0px; margin-bottom: 0px; padding-top: 0px; padding-bottom: 0px">
                                                <h6><span class="glyphicon glyphicon-user" aria-hidden="true"> Usuário | Consulta</span></h6>
                                                <h4>Visualizar usuários</h4>
                                            </div></a>
                                        </div>
                                        <div class="col-md-4">
                                            <a href="usuario-senha.php" style="text-decoration: none;">
                                            <div class="well dash-box" style="background: #40BFA9; color: #fff; margin-top: 0px; margin-bottom: 0px; padding-top: 0px; padding-bottom: 0px">
                                                <h6><span class="glyphicon glyphicon-user" aria-hidden="true"> Usuário | Tarefa</span></h6>
                                                <h4>Alterar senha</h4>
                                            </div></a>
                                        </div>
                                        <div class="clearfix" style="margin: 20px;"></div>

                                        <div class="col-md-4">
                                            <a href="ticket-novo.php" style="text-decoration: none;">
                                            <div class="well dash-box" style="background: #DEB427; color: #fff; margin-top: 0px; margin-bottom: 0px; padding-top: 0px; padding-bottom: 0px">
                                                <h6><span class="glyphicon glyphicon-road" aria-hidden="true"> Vagas | Cadastro</span></h6>
                                                <h4>Novo Ticket </h4>
                                            </div></a>
                                        </div>
                                        <div class="col-md-4">
                                        <a href="ticket-ativos.php" style="text-decoration: none;">
                                            <div class="well dash-box" style="background: #DEB427; color: #fff; margin-top: 0px; margin-bottom: 0px; padding-top: 0px; padding-bottom: 0px">
                                                <h6><span class="glyphicon glyphicon-road" aria-hidden="true"> Vagas | Consulta</span></h6>
                                                <h4>Tickets ativos</h4>
                                            </div></a>
                                        </div>
                                        <div class="col-md-4">
                                            <a href="ticket-todos.php" style="text-decoration: none;">
                                            <div class="well dash-box" style="background: #DEB427; color: #fff; margin-top: 0px; margin-bottom: 0px; padding-top: 0px; padding-bottom: 0px">
                                                <h6><span class="glyphicon glyphicon-road" aria-hidden="true"> Vagas | Consulta</span></h6>
                                                <h4>Tickets - Geral</h4>
                                            </div></a>
                                        </div>

                                        <div class="clearfix" style="margin: 10px;"></div>

                                        <div class="col-md-4">
                                            <a href="vagas-visualizar.php" style="text-decoration: none;">
                                            <div class="well dash-box" style="background: #DEB427; color: #fff; margin-top: 0px; margin-bottom: 0px; padding-top: 0px; padding-bottom: 0px">
                                                <h6><span class="glyphicon glyphicon-road" aria-hidden="true"> Vagas | Consulta </span></h6>
                                                <h4>Visualizar vagas</h4>
                                            </div></a>
                                        </div>
                                        <div class="clearfix" style="margin: 20px;"></div>

                                        <div class="col-md-4">
                                            <a href="precos-fatura.php" style="text-decoration: none;">
                                            <div class="well dash-box" style="background: #BF6F41; color: #fff; margin-top: 0px; margin-bottom: 0px; padding-top: 0px; padding-bottom: 0px">
                                                <h6><span class="glyphicon glyphicon-usd" aria-hidden="true"> Financeiro | Consulta </span></h6>
                                                <h4>Faturamento</h4>
                                            </div></a>
                                        </div>                                        
                                        <div class="col-md-4">
                                            <a href="precos-tabela.php" style="text-decoration: none;">
                                            <div class="well dash-box" style="background: #BF6F41; color: #fff; margin-top: 0px; margin-bottom: 0px; padding-top: 0px; padding-bottom: 0px">
                                                <h6><span class="glyphicon glyphicon-usd" aria-hidden="true"> Financeiro | Consulta </span></h6>
                                                <h4>Tabela de preços</h4>
                                            </div></a>
                                        </div>

                                    </div>
                                </div>
                                <!-- Final -->
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="title-panel"> Tickets ativos</h4>
                                    </div>
                                    <div class="panel-body">
                                        <table class="table table-striped table-hover">
                                            <tr>
                                                <th class="text-center">Nº Ticket</th>
                                                <th class="text-center">Data Entrada</th>
                                                <th class="text-center">Hora Entrada</th>
                                                <th class="text-center">Placa</th>
                                                <th class="text-center">Valor parcial</th>
                                                <th class="text-center">Status</th>
                                                <th class="text-center">Ação</th>
                                            </tr>
                                                <?php foreach ($lista as $linha) : ?>
                                                    <?php
                                                        // Extrai a data e a hora da entrada
                                                        $dataEntrada = date_create($linha['mov_data_entrada']);
                                                        $horaEntrada = date_create($linha['mov_hora_entrada']);

                                                        // Calcula o tempo decorrido em minutos
                                                        $entrada = new DateTime($dataEntrada->format('Y-m-d') . ' ' . $horaEntrada->format('H:i:s'));
                                                        $agora = new DateTime();
                                                        $intervalo = $entrada->diff($agora);
                                                        $totalMinutos = $intervalo->days * 24 * 60 + $intervalo->h * 60 + $intervalo->i;

                                                        // Calcula o preço com base no total de minutos
                                                        $preco = calcularPreco($totalMinutos);
                                                        ?>
                                                    <tr>
                                                    <td class="text-center">00<?php echo $linha['mov_id'] ?></td>
                                                        <td class="text-center"><?php echo date_format($dataEntrada, 'd/m/Y'); ?></td>
                                                        <td class="text-center"><?php echo $horaEntrada->format('H:i:s'); ?></td>
                                                        <td class="text-center"><?php echo $linha['mov_placa'] ?></td>
                                                        <td class="text-center"><?php echo 'R$ ' . number_format($preco, 2, ',', '.'); ?></td>
                                                        <td class="text-center"><?php echo $linha['mov_status'] ? 'Ticket ativo' : 'Ticket finalizado'; ?></td>
                                                        <td class="text-center">
                                                            <a href="ticket-saida.php?mov_id=<?= $linha['mov_id'] ?>"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
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

<?php
} elseif (is_colab()) {
    $perfil_usuario = 'colab';
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
                                        <h3 class="panel-title"><b>Portal</b></h3>
                                    </div>
                                    <div class="panel-body">

                                        <div class="col-md-4">
                                            <a href="ticket-novo.php" style="text-decoration: none;">
                                            <div class="well dash-box" style="background: #DEB427; color: #fff; margin-top: 0px; margin-bottom: 0px; padding-top: 0px; padding-bottom: 0px">
                                                <h6><span class="glyphicon glyphicon-road" aria-hidden="true"> Vagas | Cadastro</span></h6>
                                                <h4>Novo Ticket </h4>
                                            </div></a>
                                        </div>
                                        <div class="col-md-4">
                                        <a href="ticket-ativos.php" style="text-decoration: none;">
                                            <div class="well dash-box" style="background: #DEB427; color: #fff; margin-top: 0px; margin-bottom: 0px; padding-top: 0px; padding-bottom: 0px">
                                                <h6><span class="glyphicon glyphicon-road" aria-hidden="true"> Vagas | Consulta</span></h6>
                                                <h4>Tickets ativos</h4>
                                            </div></a>
                                        </div>
                                        <div class="col-md-4">
                                            <a href="ticket-todos.php" style="text-decoration: none;">
                                            <div class="well dash-box" style="background: #DEB427; color: #fff; margin-top: 0px; margin-bottom: 0px; padding-top: 0px; padding-bottom: 0px">
                                                <h6><span class="glyphicon glyphicon-road" aria-hidden="true"> Vagas | Consulta</span></h6>
                                                <h4>Tickets - Geral</h4>
                                            </div></a>
                                        </div>

                                        <div class="clearfix" style="margin: 10px;"></div>

                                        <div class="col-md-4">
                                            <a href="vagas-visualizar.php" style="text-decoration: none;">
                                            <div class="well dash-box" style="background: #DEB427; color: #fff; margin-top: 0px; margin-bottom: 0px; padding-top: 0px; padding-bottom: 0px">
                                                <h6><span class="glyphicon glyphicon-road" aria-hidden="true"> Vagas | Consulta </span></h6>
                                                <h4>Visualizar vagas</h4>
                                            </div></a>
                                        </div>
                                        <div class="clearfix" style="margin: 20px;"></div>                                      
                                        <div class="col-md-4">
                                            <a href="precos-tabela.php" style="text-decoration: none;">
                                            <div class="well dash-box" style="background: #BF6F41; color: #fff; margin-top: 0px; margin-bottom: 0px; padding-top: 0px; padding-bottom: 0px">
                                                <h6><span class="glyphicon glyphicon-usd" aria-hidden="true"> Financeiro | Consulta </span></h6>
                                                <h4>Tabela de preços</h4>
                                            </div></a>
                                        </div>

                                    </div>
                                </div>
                                <!-- Final -->
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="title-panel"> Tickets ativos</h4>
                                    </div>
                                    <div class="panel-body">
                                        <table class="table table-striped table-hover">
                                            <tr>
                                                <th class="text-center">Nº Ticket</th>
                                                <th class="text-center">Data Entrada</th>
                                                <th class="text-center">Hora Entrada</th>
                                                <th class="text-center">Placa</th>
                                                <th class="text-center">Valor parcial</th>
                                                <th class="text-center">Status</th>
                                                <th class="text-center">Ação</th>
                                            </tr>
                                                <?php foreach ($lista as $linha) : ?>
                                                    <?php
                                                        // Extrai a data e a hora da entrada
                                                        $dataEntrada = date_create($linha['mov_data_entrada']);
                                                        $horaEntrada = date_create($linha['mov_hora_entrada']);

                                                        // Calcula o tempo decorrido em minutos
                                                        $entrada = new DateTime($dataEntrada->format('Y-m-d') . ' ' . $horaEntrada->format('H:i:s'));
                                                        $agora = new DateTime();
                                                        $intervalo = $entrada->diff($agora);
                                                        $totalMinutos = $intervalo->days * 24 * 60 + $intervalo->h * 60 + $intervalo->i;

                                                        // Calcula o preço com base no total de minutos
                                                        $preco = calcularPreco($totalMinutos);
                                                        ?>
                                                    <tr>
                                                    <td class="text-center">00<?php echo $linha['mov_id'] ?></td>
                                                        <td class="text-center"><?php echo date_format($dataEntrada, 'd/m/Y'); ?></td>
                                                        <td class="text-center"><?php echo $horaEntrada->format('H:i:s'); ?></td>
                                                        <td class="text-center"><?php echo $linha['mov_placa'] ?></td>
                                                        <td class="text-center"><?php echo 'R$ ' . number_format($preco, 2, ',', '.'); ?></td>
                                                        <td class="text-center"><?php echo $linha['mov_status'] ? 'Ticket ativo' : 'Ticket finalizado'; ?></td>
                                                        <td class="text-center">
                                                            <a href="ticket-saida.php?mov_id=<?= $linha['mov_id'] ?>"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
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

    <?php
}

?>
