<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="tecnico"){
     header('Location: ../index.php?err=2');
    }
	$chamado = $_GET["chamado"];
	
?>
<?php
include("conexao.php");
$pagina = isset($_GET['pagina']) ? max(0, intval($_GET['pagina'])) : 0;
$itens_por_pagina = 10;
$tecnico = $_SESSION['sess_username'];
$sql_code = "select contador,Local, Tecnico, DataHora,Status,servico from notificacoes WHERE  contador='$chamado'";
$execute = $conn->query($sql_code) or die($conn->error);
$produto = $execute->fetch_assoc();
$num = $execute->num_rows;
$num_total = $conn->query("select contador,Local, Tecnico, DataHora,Status,servico from notificacoes WHERE  Tecnico='$tecnico'")->num_rows;
$num_paginas = ceil($num_total/$itens_por_pagina);
?>
<?php
include("conecta-puxa-dados-admin.php");
// puxar produtos do banco
$sql_code2 = "select * from notificacoes WHERE Status='Aberto' AND Tecnico='$tecnico'";
$execute2 = $mysqli->query($sql_code2) or die($mysqli->error);
$produto2 = $execute2->fetch_assoc();
$num2 = $execute2->num_rows;
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Responder Notificação</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="../Assets/css/main.css">
    <link rel="stylesheet" href="../Assets/css/painel-padrao.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment-with-locales.min.js"></script>
    <script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.43/js/bootstrap-datetimepicker.min.js">
    </script>
    <script type="text/javascript" src="/bootstrap/pt-br.js"></script>
</head>

<body>
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <img src="../Assets/img/logo-index.png" alt="logo" class="navbar-brand" href="#">
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="user_home.php">Home</a></li>
                    <li>
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Minhas Notificações<span
                                class="caret"></span></a>

                        <ul class="dropdown-menu multi-level">
                            <li><a href="notificacoes_abertas_user.php">Notificações Abertas <span
                                        class="badge badge-danger"><?php echo $num2;?></span></a></li>
                            <li><a href="notificacoes_concluidas_user.php">Notificações Concluídas</a></li>
                            <li><a href="visualizar_notificacoes_user.php">Listar Notificações</a></li>
                        </ul>
                    </li>

                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span>Sair</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <h2>Dados do Chamado <?php echo $chamado;?></h2>
        <div class="panel panel-default">
            <div class="panel-heading"><strong>Local do chamado:</strong></div>
            <div class="panel-body"><?php echo $produto['Local'];?></div>
            <div class="panel-heading"><strong>Serviço Solicitado:</strong></div>
            <div class="panel-body"><?php echo $produto['servico'];?></strong></div>
            <div class="panel-heading"><strong>Data e Hora da abertura do Chamado:</strong></div>
            <div class="panel-body"><?php echo $produto['DataHora'];?></div>
        </div>
    </div>
    <div class="container">
        <h2>Preencha:</h2>
        <form method="POST" action="processa_notificacao.php">
            <div class="form-group">
                <input type="hidden" name="var" id="var" value="<?php print $chamado ?>" />
                <label for="comment">Serviço Executados:</label>
                <textarea name="servicoexe" class="form-control" rows="5" id="servicoexe"></textarea>
            </div>
            <label for="datetimepicker1">Data e Hora Inicio do Atendimento:</label>
            <div class="row">
                <div class='col-sm-6'>
                    <div class="form-group">
                        <div class='input-group date' id='datetimepicker1'>
                            <input type='text' class="form-control" name="dateFrom" required />
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div>
                </div>
                <script type="text/javascript">
                $(function() {
                    $('#datetimepicker1').datetimepicker({
                        //format: 'DD/MM/YYYY',
                        locale: 'pt-br'
                    });
                });
                </script>
            </div>
            <label for="datetimepicker1">Data e Hora Final do Atendimento:</label>
            <div class="row">
                <div class='col-sm-6'>
                    <div class="form-group">
                        <div class='input-group date' id='datetimepicker2'>
                            <input type='text' class="form-control" name="dateFrom2" required />
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div>
                </div>
                <script type="text/javascript">
                $(function() {
                    $('#datetimepicker2').datetimepicker({
                        //format: 'DD/MM/YYYY',
                        locale: 'pt-br'
                    });
                });
                </script>
            </div>
            <button type="submit" class="btn btn-default">Salvar Chamado</button>
        </form>
    </div>
</body>

</html>