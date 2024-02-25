<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Nova Notificação</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="../Assets/css/main.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>

<body>

    <!-- The Modal2 -->
    <div class="modal fade" id="myModal2">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Atenção</h4>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    Notificação registrada com sucesso!
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <a class="btn btn-success" href="user_home.php">
                        Entendido
                    </a>
                </div>
            </div>
        </div>
    </div>
    <?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="coordenador"){
       header('Location: ../index.php?err=2');
    }
?>
    <?php
    include_once("conexao.php");
	$unidade = $_POST['unidade'];
    $setor = $_POST['setor'];
    $local = $_POST['local'];
    $grau_incidente = $_POST['grau_incidente'];
    $dataOcorrencia = $_POST['dataOcorrencia'];
    $afetouPaciente = $_POST['afetouPaciente'];
    $nome_paciente = $_POST['nome_paciente'];
    $prontuario = $_POST['prontuario'];
	$texto_notificacao = $_POST['texto_notificacao'];
	$status = "Aberto";
    $notificador = $_SESSION['sess_usersisname'];
    $nova_notifica = "INSERT INTO notificacoes (unidade,setor,local_ocorrencia,grau_incidente,DataHora,afetou_paciente,nome_paciente,prontuario,status_atual,texto_notificacao, notificador) 
    VALUES ('$unidade','$setor','$local','$grau_incidente','$dataOcorrencia','$afetouPaciente','$nome_paciente','$prontuario','$status', '$texto_notificacao', '$notificador')";
    $nova_notificacao = mysqli_query($conn, $nova_notifica);
    if(mysqli_affected_rows($conn) != 0){
		echo '<script type="text/javascript"> $("#myModal2").modal("show")</script>';
		}else{
				echo "ERRO";    
            }
?>

</body>

</html>