<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) ||$role!="coordenador"){
     header('Location: ../index.php?err=2');
    }
?>
<?php
include("conecta-puxa-dados-admin.php");
$responsavel_setor = $_SESSION['sess_username'];
$sql_code = "select * from notificacoes WHERE status_atual='Aberto' AND responsavel_setor='$responsavel_setor'";
$execute = $mysqli->query($sql_code) or die($mysqli->error);
$produto = $execute->fetch_assoc();
$num2 = $execute->num_rows;
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Área Usuário</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="../Assets/css/main.css">
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

    <div class="container conteudo-home">
        <h3>Sistema Interno de Notificações e Incidentes</h3><br>
        <h4>Bem vindo, <?php echo $_SESSION['sess_usersisname'];?></h4><br>
        <p>A notificação de incidentes é fundamental para identificar falhas, aprimorar os processos, fortalecer a
            segurança tanto do paciente quanto do colaborador e promover aprendizado institucional.</p>
    </div>
    <footer class="rodape">
        <p class="text-footer">© 2024 ICEPES | CISNE - INSTITUTO CISNE DE ENSINO E PESQUISA. TODOS OS DIREITOS
            RESERVADOS.</p>
    </footer>
</body>
</html>