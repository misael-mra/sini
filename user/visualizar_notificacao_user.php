<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="coordenador"){
       header('Location: ../index.php?err=2');
    }
	$notificacao = $_GET["notificacao"];
?>
<?php
$responsavel_setor = $_SESSION['sess_username'];
include("conecta-puxa-dados-admin.php");
// puxar produtos do banco
$sql_code2 = "select * from notificacoes WHERE status_atual='Aberto' AND responsavel_setor='$responsavel_setor'";
$execute2 = $mysqli->query($sql_code2) or die($mysqli->error);
$produto2 = $execute2->fetch_assoc();
$num2 = $execute2->num_rows;
?>
<?php
include("conexao.php");
$sql_code = "select contador, unidade, local_ocorrencia, responsavel_setor, DataHora,status_atual,texto_notificacao,resposta_notificacao,DataHoraAber,DataHoraFim, notificador from notificacoes WHERE contador='$notificacao'";
$execute = $conn->query($sql_code) or die($conn->error);
$produto = $execute->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Minhas Notificações</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="../Assets/css/main.css">
    <link rel="stylesheet" href="../Assets/css/painel-padrao.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>

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
        <h5 class="text-center painel-title2" style="margin-bottom:0px"><strong>INFORMAÇÕES DA NOTIFICAÇÃO - Nº <?php echo $notificacao;?></strong></h5>
        <div class="panel panel-default ">
            <div class="painel-title3"><strong>Unidade:</strong></div>
            <div class="panel-body"><?php echo $produto['unidade'];?></div>
            <div class="painel-title3"><strong>Local Ocorrência:</strong></div>
            <div class="panel-body"><?php echo $produto['local_ocorrencia'];?></div>
            <div class="painel-title3"><strong>Notificador:</strong></div>
            <div class="panel-body"><?php echo $produto['notificador'];?></div>
            <div class="painel-title3"><strong>O que Aconteceu:</strong></div>
            <div class="panel-body"><?php echo $produto['texto_notificacao'];?></div>
            <div class="painel-title3"><strong>Abertura da Notificação:</strong></div>
            <div class="panel-body"><?php echo $produto['DataHora'];?></div>
            <div class="painel-title3"><strong>Resposta:</strong></div>
            <div class="panel-body"><?php echo $produto['resposta_notificacao'];?></div>
            <div class="painel-title3"><strong>Data da Classificação:</strong></div>
            <div class="panel-body"><?php echo $produto['DataHoraAber'];?></div>
            <div class="painel-title3"><strong>Data da Resposta:</strong></div>
            <div class="panel-body"><?php echo $produto['DataHoraFim'];?></div>
            <div class="painel-title3"><strong>Status da Notificação:</strong></div>
            <?php if ($produto['status_atual']=="Aberto"){?>

            <div class="panel-body" style="background-color:#ffbcbc;"> <?php echo $produto['status_atual']; ?></div>
            <?php } 
								elseif ($produto['status_atual']=="Feito") {?>
            <div class="panel-body" style="background-color:#abfdab;"> <?php echo $produto['status_atual']; ?></div>
            <?php } ?>

        </div>
    </div>
    <footer class="rodape" style="position: fixed;">
        <p class="text-footer">© 2024 ICEPES | CISNE - INSTITUTO CISNE DE ENSINO E PESQUISA. TODOS OS DIREITOS
            RESERVADOS.</p>
    </footer>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>

</html>