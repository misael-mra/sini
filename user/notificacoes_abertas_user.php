<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="coordenador"){
      header('Location: ../index.php?err=2');
    }
?>
<?php
include("conexao.php");
$pagina = isset($_GET['pagina']) ? max(0, intval($_GET['pagina'])) : 0;
$itens_por_pagina = 10;
$responsavel_setor = $_SESSION['sess_username'];
$item = $pagina * $itens_por_pagina;
$sql_code = "select contador,unidade,setor,local_ocorrencia,grau_incidente,DataHora,afetou_paciente,nome_paciente,prontuario,status_atual,responsavel_setor from notificacoes WHERE status_atual='Aberto' AND responsavel_setor='$responsavel_setor'  ORDER BY contador DESC LIMIT $item, $itens_por_pagina";
$execute = $conn->query($sql_code) or die($conn->error);
$produto = $execute->fetch_assoc();
$num = $execute->num_rows;
$num_total = $conn->query("select contador,unidade,setor,local_ocorrencia,grau_incidente,DataHora,afetou_paciente,nome_paciente,prontuario,status_atual,responsavel_setor from notificacoes WHERE status_atual='Aberto' AND responsavel_setor='$responsavel_setor'")->num_rows;
$num_paginas = ceil($num_total/$itens_por_pagina);
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
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Notificações Abertas</title>
    <meta charset="utf-8"/>
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
                    <li><a href="nova_notificacao_user.php">Abrir Notificação</a></li>
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
    <div class="container" id="limitscrol">
        <h3>Responda suas Notificações</h3>
        <table class="table table-striped table table-bordered">
            <?php if($num > 0){ ?>
            <thead class="painel-title">
                <tr>
                    <th>Código</th>
                    <th>Unidade</th>
                    <th>Local Ocorrência</th>
                    <th>Setor Notificado</th>
                    <th>Abertura</th>
                    <th>Status</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php do{ ?>
                <tr>
                    <td><?php echo $produto['contador'];?></td>
                    <td><?php echo $produto['unidade'];?></td>
                    <td><?php echo $produto['local_ocorrencia'];?></td>
                    <td><?php echo $produto['setor']; ?></td>
                    <td><?php echo $produto['DataHora']; ?></td>
                    <?php if ($produto['status_atual']=="Aberto"){?>
                    <td style="background-color:#ffbcbc;"> <?php echo $produto['status_atual']; ?></td>
                    <?php } 
							 elseif ($produto['status_atual']=="Feito") {?>
                    <td style="background-color:#abfdab;"> <?php echo $produto['status_atual']; ?></td>
                    <?php } ?>
                    <td> <a class="btn btn-info btn-sm"
                            href="responder_notificacao_user.php?chamado=<?php echo $produto['contador'];?>"
                            data-toggle="tooltip" title="Responder Notificação"><span
                                class="glyphicon glyphicon-edit"></span> Responder</button></td>
                </tr>
                <?php } while($produto = $execute->fetch_assoc()); ?>
            </tbody>
        </table>
        <nav>
            <ul class="pagination">
                <li>
                    <a href="notificacoes_abertas_user.php?pagina=0" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                <?php 
				    for($i=0;$i<$num_paginas;$i++){
				    $estilo = "";
				    if($pagina == $i)
				    	$estilo = "class=\"active\"";
				    ?>
                <li <?php echo $estilo; ?>><a
                        href="notificacoes_abertas_user.php?pagina=<?php echo $i; ?>"><?php echo $i+1; ?></a></li>
                <?php } ?>
                <li>
                    <a href="notificacoes_abertas_user.php?pagina=<?php echo $num_paginas-1; ?>" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </nav>
        <?php } ?>
    </div>
    <footer class="rodape" style="position: fixed;">
        <p class="text-footer">© 2024 ICEPES | CISNE - INSTITUTO CISNE DE ENSINO E PESQUISA. TODOS OS DIREITOS
            RESERVADOS.</p>
    </footer>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script>
    $(document).ready(function() {
        $('[data-toggle="tooltip"]').tooltip();
    });
    </script>
</body>

</html>