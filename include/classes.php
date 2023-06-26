<?php

class Vaga{
    public $vaga_id;
    public $vaga_letra;
    public $vaga_num;
    public $vaga_geo_lat;
    public $vaga_geo_lgn;
    public $vaga_status;


    public function __construct($vaga_id = false)
	{
		if ($vaga_id){
            $this->vaga_id = $vaga_id;                
            $this->vaga_carregar();
        }
    }

    public function vaga_inserir(){

        $sql = "INSERT INTO vagas (vaga_letra, vaga_num, vaga_geo_lat, vaga_geo_lgn, vaga_status) VALUES (
            '{$this->vaga_letra}',
            '{$this->vaga_num}',
            '{$this->vaga_geo_lat}',
            '{$this->vaga_geo_lgn}',
            '{$this->vaga_status}')";
        include_once "conexao.php";
        $conexao->exec($sql);


        echo  "<script>alert('Vaga cadastrada com sucesso!');
        window.location='../ticket-novo.php';
        </script>";

        die();
    }

    public function vaga_listar()
	{
        // Define a string SQL para selecionar todos os registros da tabela
        $sql = "SELECT * FROM vagas";

        
        $conexao1 = new PDO('mysql:host=127.0.0.1;dbname=parking', 'root', '');

        // Executa a string SQL na conexão retornando um objeto de resultado
        $resultado = $conexao1->query($sql);

        // Extrai todos os registros do objeto e os armazena em um array
        $lista = $resultado->fetchAll();

        // Retorna o array contendo todos os registros da tabela "tb_turmas"
        return $lista;
	}


    public function vaga_carregar()
    {
        // Query SQL para buscar uma turma no banco de dados pelo id
        $sql = "SELECT * FROM vagas WHERE vaga_id=" . $this->vaga_id;
        include_once "conexao.php";

        // Execução da query e armazenamento do resultado em uma variável
        $resultado = $conexao->query($sql);
        // Recuperação da primeira linha do resultado como um array associativo
        $linha = $resultado->fetch();

        // Atribuição dos valores dos campos da turma recuperados do banco às propriedades do objeto
        $this->vaga_id = $linha['vaga_id'];
        $this->vaga_letra = $linha['vaga_letra'];
        $this->vaga_num = $linha['vaga_num'];
        $this->vaga_geo_lat = $linha['vaga_geo_lat'];
        $this->vaga_geo_lgn = $linha['vaga_geo_lgn'];
        $this->vaga_status = $linha['vaga_status'];
    }
    public function vaga_status_atualizar (){
        $sql = "UPDATE vagas SET 
        
            vaga_id = '$this->vaga_id' ,
            vaga_letra = '$this->vaga_letra' ,
            vaga_num = '$this->vaga_num' ,
            vaga_geo_lat = '$this->vaga_geo_lat' ,
            vaga_geo_lgn = '$this->vaga_geo_lgn' ,
            vaga_status = '$this->vaga_status'                   
             WHERE vaga_id = $this->vaga_id ";

        $conexao = new PDO('mysql:host=127.0.0.1;dbname=parking', 'root', '');
        $conexao->exec($sql);
    }


}

class Vgstatus{
    public $vgstatus_id;
    public $vgstatus_tipo;

    public function vgstatus_listar()
	{
        $sql2 = "SELECT * FROM vgstatus";
        include_once "conexao.php";
        $conexao2 = new PDO('mysql:host=127.0.0.1;dbname=parking', 'root', '');
        $resultado2 = $conexao2->query($sql2);
        $lista2 = $resultado2->fetchAll();
        return $lista2;
	}

}
class Movimentacoes{

    public $mov_id;
    public $mov_data_entrada;
    public $mov_hora_entrada;
    public $mov_placa;
    public $mov_data_saida;
    public $mov_hora_saida;
    public $mov_preco;
    public $mov_status;

    
    public function __construct($mov_id = false)
	{
		if ($mov_id){
            $this->mov_id = $mov_id;                
            $this->mov_carregar();
        }
    }

    public function entrada_inserir(){
        $sql = "INSERT INTO movimentacoes (mov_data_entrada, mov_hora_entrada, mov_placa, mov_status) VALUES (
            '{$this->mov_data_entrada}',
            '{$this->mov_hora_entrada}',
            '{$this->mov_placa}',
            '{$this->mov_status}')";
    
        include_once "conexao.php";
        $conexao->exec($sql);
    
        // Recupera o mov_id do último registro inserido
        $mov_id = $conexao->lastInsertId();

        $data_entrada_formatada = date('d/m/Y', strtotime($this->mov_data_entrada));
        // Exemplo de impressão do ticket
        $ticket = "
            ************* SMARTPARKING **************
             
            ********** IMPRESSÃO DE TICKET **********
                                          Nº: {$mov_id}

            Data de Entrada: {$data_entrada_formatada}
            Hora de Entrada: {$this->mov_hora_entrada}
            Placa do Veículo: {$this->mov_placa}
            
            ||||| || |||||||||||| |||||| ||||||| || ||||| ||| |||||||||| |||||||||||||||||||
            ";
    
        echo "<script>
            var ticket = " . json_encode($ticket) . ";
            alert(ticket);
            window.location='../ticket-novo.php';
            </script>";


                // Configurações de conexão com o MongoDB
                $host = 'localhost'; // Altere o host se necessário
                $port = 27017; // Altere a porta se necessário
                $database = 'parking'; // Altere o nome do banco de dados
                $collection = 'logs'; // Altere o nome da coleção

                // Criação da conexão com o MongoDB
                $mongo = new MongoDB\Driver\Manager("mongodb://$host:$port");

                date_default_timezone_set('America/Sao_Paulo'); // Altere para o fuso horário desejado
                // Obtenha o usuário atual da sessão
                session_start();
                $current_user = $_SESSION['usuario_logado']; // Substitua 'user' pelo nome da chave da sessão que contém o usuário atual

                // Criação do documento para o log
                $logData = date('d-m-Y');
                $logHora = date('H:i:s');
                $logMessage = "Entrada de veículo efetuada";

                $documento = [
                    'data' => $logData,
                    'hora' => $logHora,
                    'mensagem' => $logMessage,
                    'usuario' => $current_user
                ];

                // Inserção do documento no MongoDB
                $bulkWrite = new MongoDB\Driver\BulkWrite();
                $bulkWrite->insert($documento);
                $mongo->executeBulkWrite("$database.$collection", $bulkWrite);


          echo  "<script>alert('Entrada cadastrada com sucesso!');
          window.location='../ticket-novo.php';
          </script>";


    }

    public function mov_carregar()
    {
        // Query SQL para buscar uma turma no banco de dados pelo id
        $sql = "SELECT * FROM movimentacoes WHERE mov_id=" . $this->mov_id;
        include_once "conexao.php";

        // Execução da query e armazenamento do resultado em uma variável
        $resultado = $conexao->query($sql);
        // Recuperação da primeira linha do resultado como um array associativo
        $linha = $resultado->fetch();

        // Atribuição dos valores dos campos da turma recuperados do banco às propriedades do objeto
        $this->mov_id = $linha['mov_id'];
        $this->mov_data_entrada = $linha['mov_data_entrada'];
        $this->mov_hora_entrada = $linha['mov_hora_entrada'];
        $this->mov_placa = $linha['mov_placa'];
        $this->mov_data_saida = $linha['mov_data_saida'];
        $this->mov_hora_saida = $linha['mov_hora_saida'];
        $this->mov_preco = $linha['mov_preco'];
        $this->mov_status = $linha['mov_status'];
    }

    public function saida_inserir(){
            $sql = "UPDATE movimentacoes SET 
            
                mov_data_entrada = '$this->mov_data_entrada' ,
                mov_hora_entrada = '$this->mov_hora_entrada' ,
                mov_placa = '$this->mov_placa' ,
                mov_data_saida = '$this->mov_data_saida' ,
                mov_hora_saida = '$this->mov_hora_saida' ,
                mov_preco = '$this->mov_preco' ,
                mov_status = '$this->mov_status'                   
                 WHERE mov_id = $this->mov_id ";

            $conexao = new PDO('mysql:host=127.0.0.1;dbname=parking', 'root', '');
            $conexao->exec($sql);

                // Configurações de conexão com o MongoDB
                $host = 'localhost'; // Altere o host se necessário
                $port = 27017; // Altere a porta se necessário
                $database = 'parking'; // Altere o nome do banco de dados
                $collection = 'logs'; // Altere o nome da coleção

                // Criação da conexão com o MongoDB
                $mongo = new MongoDB\Driver\Manager("mongodb://$host:$port");

                date_default_timezone_set('America/Sao_Paulo'); // Altere para o fuso horário desejado
                // Obtenha o usuário atual da sessão
                session_start();
                $current_user = $_SESSION['usuario_logado']; // Substitua 'user' pelo nome da chave da sessão que contém o usuário atual

                // Criação do documento para o log
                $logData = date('d-m-Y');
                $logHora = date('H:i:s');
                $logMessage = "Saída de veículo efetuada";

                $documento = [
                    'data' => $logData,
                    'hora' => $logHora,
                    'mensagem' => $logMessage,
                    'usuario' => $current_user
                ];

                // Inserção do documento no MongoDB
                $bulkWrite = new MongoDB\Driver\BulkWrite();
                $bulkWrite->insert($documento);
                $mongo->executeBulkWrite("$database.$collection", $bulkWrite);
    }

    public function movimentacoes_listar()
	{
        // Define a string SQL para selecionar todos os registros da tabela
        $sql = "SELECT * FROM movimentacoes";

        
        include_once "conexao.php";

        // Executa a string SQL na conexão retornando um objeto de resultado
        $resultado = $conexao->query($sql);

        // Extrai todos os registros do objeto e os armazena em um array
        $lista = $resultado->fetchAll();

        // Retorna o array contendo todos os registros da tabela "tb_turmas"
        return $lista;


	}

    public function movimentacoes_listar_ativos()
	{
        // Define a string SQL para selecionar todos os registros da tabela
        $sql = "SELECT * FROM movimentacoes WHERE mov_status = 1";

        
        include_once "conexao.php";

        // Executa a string SQL na conexão retornando um objeto de resultado
        $resultado = $conexao->query($sql);

        // Extrai todos os registros do objeto e os armazena em um array
        $lista = $resultado->fetchAll();

        // Retorna o array contendo todos os registros da tabela "tb_turmas"
        return $lista;
	}   

}

class Perfil{
    public $perfil_id;
    public $perfil_nome;
    public $perfil_sobrenome;
    public $perfil_cpf;
    public $perfil_data;
    public $perfil_telefone;
    public $perfil_cep;
    public $perfil_logradouro;
    public $perfil_numero;
    public $perfil_complemento;
    public $perfil_bairro;
    public $perfil_municipio;
    public $perfil_estado;
    public $perfil_perfil;
    public $perfil_email;
    public $perfil_senha;
    public $login_email;
    public $login_status;
    public $login_perfil;

    public function __construct($perfil_id = false)
	{
		if ($perfil_id){
            $this->perfil_id = $perfil_id; 
            $this->perfil_carregar();               
          
        }
    }
    	
    public function perfil_inserir(){

        $sql_p_inserir = "INSERT INTO perfil (perfil_nome, perfil_sobrenome, perfil_cpf, perfil_data, perfil_telefone, perfil_cep, perfil_logradouro, perfil_numero, perfil_complemento, perfil_bairro, perfil_municipio, perfil_estado) VALUES (
            '{$this->perfil_nome}',
            '{$this->perfil_sobrenome}',
            '{$this->perfil_cpf}',
            '{$this->perfil_data}',
            '{$this->perfil_telefone}',
            '{$this->perfil_cep}',
            '{$this->perfil_logradouro}',
            '{$this->perfil_numero}',
            '{$this->perfil_complemento}',
            '{$this->perfil_bairro}',
            '{$this->perfil_municipio}',
            '{$this->perfil_estado}'
            )";

        $sql_l_inserir = "INSERT INTO logins (login_email, login_senha, login_perfil) VALUES ( 
            '{$this->perfil_email}',
            '{$this->perfil_senha}',
            '{$this->perfil_perfil}')";

        $conexao_p_inserir = new PDO('mysql:host=127.0.0.1;dbname=parking', 'root', '');
        $conexao_p_inserir->exec($sql_p_inserir);
        $conexao_l_inserir = new PDO('mysql:host=127.0.0.1;dbname=parking', 'root', '');
        $conexao_l_inserir->exec($sql_l_inserir);


        // Configurações de conexão com o MongoDB
        $host = 'localhost'; // Altere o host se necessário
        $port = 27017; // Altere a porta se necessário
        $database = 'parking'; // Altere o nome do banco de dados
        $collection = 'logs'; // Altere o nome da coleção

        // Criação da conexão com o MongoDB
        $mongo = new MongoDB\Driver\Manager("mongodb://$host:$port");

        date_default_timezone_set('America/Sao_Paulo'); // Altere para o fuso horário desejado
        // Obtenha o usuário atual da sessão
        session_start();
        $current_user = $_SESSION['usuario_logado']; // Substitua 'user' pelo nome da chave da sessão que contém o usuário atual

        // Criação do documento para o log
        $logData = date('d-m-Y');
        $logHora = date('H:i:s');
        $logMessage = "Criação de perfil efetuada";

        $documento = [
            'data' => $logData,
            'hora' => $logHora,
            'mensagem' => $logMessage,
            'perfil_nome' => $this->perfil_nome,
            'usuario' => $current_user
        ];

        // Inserção do documento no MongoDB
        $bulkWrite = new MongoDB\Driver\BulkWrite();
        $bulkWrite->insert($documento);
        $mongo->executeBulkWrite("$database.$collection", $bulkWrite);

        echo  "<script>alert('Perfil cadastrado com sucesso!');
        window.location='../home.php';
        </script>";

        die();
    }
    public function perfil_carregar()
    {
        $sql = "SELECT perfil.*, logins.login_email, logins.login_status, logins.login_perfil
                FROM perfil
                JOIN logins ON perfil.perfil_id = logins.login_id
                WHERE perfil.perfil_id = :perfil_id";
    
        $conexao = new PDO('mysql:host=127.0.0.1;dbname=parking', 'root', '');
    
        // Prepara a consulta SQL
        $consulta = $conexao->prepare($sql);
        // Define o valor do parâmetro :perfil_id
        $consulta->bindParam(':perfil_id', $this->perfil_id);
        // Executa a consulta
        $consulta->execute();
    
        // Recupera a primeira linha do resultado como um array associativo
        $linha = $consulta->fetch(PDO::FETCH_ASSOC);
    
        // Atribui os valores dos campos da tabela "perfil" às propriedades do objeto
        $this->perfil_id = $linha['perfil_id'];
        $this->perfil_nome = $linha['perfil_nome'];
        $this->perfil_sobrenome = $linha['perfil_sobrenome'];
        $this->perfil_cpf = $linha['perfil_cpf'];
        $this->perfil_data = $linha['perfil_data'];
        $this->perfil_telefone = $linha['perfil_telefone'];
        $this->perfil_cep = $linha['perfil_cep'];
        $this->perfil_logradouro = $linha['perfil_logradouro'];
        $this->perfil_numero = $linha['perfil_numero'];
        $this->perfil_complemento = $linha['perfil_complemento'];
        $this->perfil_bairro = $linha['perfil_bairro'];
        $this->perfil_municipio = $linha['perfil_municipio'];
        $this->perfil_estado = $linha['perfil_estado'];
    
        // Atribui os valores dos campos da tabela "logins" às propriedades do objeto
        $this->login_email = $linha['login_email'];
        $this->login_status = $linha['login_status'];
        $this->login_perfil = $linha['login_perfil'];
    }
    
    public function perfil_listar()
	{
        // Define a string SQL para selecionar todos os registros da tabela
        $sql_perfil_listar = "SELECT perfil.perfil_id, perfil.perfil_nome, perfil.perfil_sobrenome, logins.login_email, logins.login_perfil, logins.login_status
                            FROM logins
                            JOIN perfil ON logins.login_id = perfil.perfil_id
                            ORDER BY perfil.perfil_nome;";

        
        include_once "conexao.php";

        // Executa a string SQL na conexão retornando um objeto de resultado
        $resultado_perfil_listar = $conexao->query($sql_perfil_listar);

        // Extrai todos os registros do objeto e os armazena em um array
        $listap = $resultado_perfil_listar->fetchAll();

        // Retorna o array contendo todos os registros da tabela "tb_turmas"
        return $listap;


	}
    
    public function perfil_atualiza(){
        $sql_perfil_atualiza = "UPDATE perfil
        SET perfil_cep = :perfil_cep,
            perfil_logradouro = :perfil_logradouro,
            perfil_numero = :perfil_numero,
            perfil_complemento = :perfil_complemento,
            perfil_bairro = :perfil_bairro,
            perfil_municipio = :perfil_municipio,
            perfil_estado = :perfil_estado
        WHERE perfil_id = :perfil_id";

        $sql_logins_atualiza = "UPDATE logins
                SET login_email = :login_email,
                    login_status = :login_status,
                    login_perfil = :login_perfil
                WHERE login_id = :login_id";

        $conexao = new PDO('mysql:host=127.0.0.1;dbname=parking', 'root', '');

        // Prepara a consulta SQL para atualizar os campos na tabela "perfil"
        $consulta_perfil = $conexao->prepare($sql_perfil_atualiza);
        $consulta_perfil->bindValue(':perfil_cep', $this->perfil_cep);
        $consulta_perfil->bindValue(':perfil_logradouro', $this->perfil_logradouro);
        $consulta_perfil->bindValue(':perfil_numero', $this->perfil_numero);
        $consulta_perfil->bindValue(':perfil_complemento', $this->perfil_complemento);
        $consulta_perfil->bindValue(':perfil_bairro', $this->perfil_bairro);
        $consulta_perfil->bindValue(':perfil_municipio', $this->perfil_municipio);
        $consulta_perfil->bindValue(':perfil_estado', $this->perfil_estado);
        $consulta_perfil->bindValue(':perfil_id', $this->perfil_id);

        // Executa a consulta para atualizar os campos na tabela "perfil"
        $consulta_perfil->execute();

        // Prepara a consulta SQL para atualizar os campos na tabela "logins"
        $consulta_logins = $conexao->prepare($sql_logins_atualiza);
        $consulta_logins->bindValue(':login_email', $this->login_email);
        $consulta_logins->bindValue(':login_status', $this->login_status);
        $consulta_logins->bindValue(':login_perfil', $this->login_perfil);
        $consulta_logins->bindValue(':login_id', $this->perfil_id);

        // Executa a consulta para atualizar os campos na tabela "logins"
        $consulta_logins->execute();


        // Configurações de conexão com o MongoDB
        $host = 'localhost'; // Altere o host se necessário
        $port = 27017; // Altere a porta se necessário
        $database = 'parking'; // Altere o nome do banco de dados
        $collection = 'logs'; // Altere o nome da coleção

        // Criação da conexão com o MongoDB
        $mongo = new MongoDB\Driver\Manager("mongodb://$host:$port");

        date_default_timezone_set('America/Sao_Paulo'); // Altere para o fuso horário desejado
        // Obtenha o usuário atual da sessão
        session_start();
        $current_user = $_SESSION['usuario_logado']; // Substitua 'user' pelo nome da chave da sessão que contém o usuário atual

        // Criação do documento para o log
        $logData = date('d-m-Y');
        $logHora = date('H:i:s');
        $logMessage = "Alteração de perfil efetuada";

        $documento = [
            'data' => $logData,
            'hora' => $logHora,
            'mensagem' => $logMessage,
            'id_perfil' => $this->perfil_id,
            'usuario' => $current_user
             
        ];

        // Inserção do documento no MongoDB
        $bulkWrite = new MongoDB\Driver\BulkWrite();
        $bulkWrite->insert($documento);
        $mongo->executeBulkWrite("$database.$collection", $bulkWrite);
    }

    public function login_id(){
        echo $_SESSION['usuario_logado'];
        $usuario_logado = $_SESSION['usuario_logado'];
        $conn = new PDO('mysql:host=127.0.0.1;dbname=parking', 'root', '');

        // Prepare a consulta para obter o perfil_id
        $sql = "SELECT login_id FROM logins WHERE login_email = :usuario";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':usuario', $usuario_logado);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($row) {
            $login_id = $row['login_id'];

            // Use o perfil_id como desejar
            echo "Perfil ID: " . $login_id;
        } else {
            echo "Perfil não encontrado";
        }
    }
}

function is_colab(){
    $lp = $_SESSION['login_perfil'] ?? null;
    if (is_null($lp)){
        return false;
    } else {
        if ($lp == 'colab') {
            return true;
        } else {
            return false;
        }
    }
}

function is_admin(){
    $lp = $_SESSION['login_perfil'] ?? null;
    if (is_null($lp)){
        return false;
    } else {
        if ($lp == 'admin') {
            return true;
        } else {
            return false;
        }
    }
}

class Preco {
    public $preco_id;
    public $preco_tempo;
    public $preco_valor;

    public function preco_listar()
	{
        $sql_preco_listar = "SELECT*
                            FROM precos";

        include_once "conexao.php";

        $resultado_preco_listar = $conexao->query($sql_preco_listar);

        $listapreco = $resultado_preco_listar->fetchAll();

        return $listapreco;


	}
}