<?php
include("conecta-puxa-dados-admin.php");
// puxar produtos do banco
$sql_code = "select * from notificacoes WHERE Status='Aberto'";
$execute = $mysqli->query($sql_code) or die($mysqli->error);
$produto = $execute->fetch_assoc();
$num2 = $execute->num_rows;
?>

<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="admin"){
      header('Location: ../index.php?err=2');
    }
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Excluir usuário</title>
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
                    <li class="active"><a href="Admin-Home.php">Home</a></li>
                    <li><a class="dropdown-toggle" data-toggle="dropdown" href="#">Gerenciar Notificações<span
                                class="caret"></span></a>
                        <ul class="dropdown-menu multi-level">
                            <li><a href="nova-notificacao-admin.php">Abrir Notificação</a></li>
                            <li><a href="excluir-notificacao-admin.php">Deletar Notificação</a></li>
                            <li><a href="notificacoes_abertas.php">Notificações em Aberto <span
                                        class="badge badge-danger"><?php echo $num2;?></span></a></li>
                            <li><a href="notificacoes_concluidas.php">Notificações Concluídas</a></li>
                            <li><a href="visualizar-notificacoes-admin.php">Listar Notificações</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Usuários<span
                                class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="insere_usuario_res.php">Inserir Usuário</a></li>
                            <li><a href="remove_usuario_res.php">Remover Usuário</a></li>
                            <li><a href="visualizar-usuario.php">Ver Usuário</a></li>
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
        <h2>Preencha com o nome no sistema do técnico que deseja remover:</h2>
        <form method="POST" action="delete_tec.php">
            <div class="form-group">
                <label for="tecnicoex">Nome:</label>
                <input type="text" class="form-control" id="tecex"
                    placeholder="Nome no sistema do técnico a ser removido" name="tecex" required />
            </div>
            <button type="submit" class="btn btn-default">Remover Técnico</button>
</body>

</html>