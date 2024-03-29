<?php
session_start();
$role = $_SESSION['sess_userrole'];
if (!isset($_SESSION['sess_username']) || $role != "coordenador") {
	header('Location: ../index.php?err=2');
}
?>
<?php
$responsavel_setor = $_SESSION['sess_username'];
include("conecta-puxa-dados-admin.php");
// puxar notificacoes do banco
$sql_code = "select * from notificacoes WHERE status_atual='Aberto' AND responsavel_setor='$responsavel_setor'";
$execute = $mysqli->query($sql_code) or die($mysqli->error);
$produto = $execute->fetch_assoc();
$num2 = $execute->num_rows;
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Abrir Notificação</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="../Assets/css/main.css">
    <link rel="stylesheet" href="../Assets/css/painel-notificacao.css">
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
                <a href="user_home.php"><img src="../Assets/img/logo-index.png" alt="logo" class="navbar-brand"
                        href="#"></a>
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

    <div class="container painel-title">NOTIFICAÇÃO</div>
    <div class="container painel-notificacao">
        <form method="POST" action="processa_nova_notificacao.php">
            <div class="form-group col-xs-12 col-sm-12">
                <label for="sel1"><span class="text-danger">*</span> Unidade de Ocorrência:</label>
                <select class="form-control" id="unidade" name="unidade">
                    <option>SELECIONE</option>
                    <option>UAPS AIRTON MONTE</option>
                    <option>UAPS FERNANDO FAÇANHA</option>
                    <option>UAPS CESAR CALS DE OLIVEIRA FILHO</option>
                    <option>UAPS ELIEZER STUDART</option>
                    <option>UAPS GEORGE BENEVIDES</option>
                    <option>UAPS FRANCISCO PEREIRA DE ALMEIDA</option>
                    <option>UAPS LUIZ RECAMONDE CAMPELO</option>
                    <option>UAPS FRANCISCO MONTEIRO</option>
                    <option>UAPS ABNER CAVALCANTE</option>
                    <option>UAPS ARGEU HERBSTER</option>
                    <option>UAPS GUARANY MONT'ALVERNE</option>
                    <option>UAPS GRACILIANO MUNIZ</option>
                    <option>UAPS DR. HENRIQUE MOTA NETO</option>
                    <option>UAPS JOÃO ELÍSIO</option>
                    <option>UAPS JOÃO MACHADO DOS SANTOS</option>
                    <option>UAPS JOÃO PESSOA</option>
                    <option>UAPS MACIEL DE BRITO</option>
                    <option>UAPS PARQUE SÃO JOSÉ</option>
                    <option>UAPS REGIS JUCÁ</option>
                    <option>UAPS MARCUS AURÉLIO</option>
                    <option>UAPS OSMAR VIANA</option>
                    <option>UAPS PEDRO SAMPAIO</option>
                    <option>UAPS DR. ACRÍSIO EUFRASINO DE PINHO</option>
                    <option>UAPS JANGURUSSU</option>
                </select>
            </div>
            <!-- LOCAL DE OCORRENCIA -->
            <div class="form-group">
                <div class="p-0 sm:p-0 md:px-4 lg:px-4 col-xs-12 col-sm-12 col-md-3 col-lg-3">
                    <div id="SetoNotificacao" class="form-group form-group-sm">
                        <label for="isnSetorNotificado" class="control-label"><span class="text-danger">*</span>
                            Setor Notificado: </label><select id="setor"
                            name="setor" class="form-control">
                            <option >SELECIONE</option>
                            <option >ALMOXARIFADO</option>
                            <option >AMBULATÓRIO</option>
                            <option >CENTRAL DE TRANSPORTE DE PACIENTES</option>
                            <option >COORDENAÇÃO GERAL DE ENFERMAGEM</option>
                            <option >DIREÇÃO DE GESTÃO E ATENDIMENTO</option>
                            <option >DIREÇÃO DE PROCESSOS ASSISTENCIAIS</option>
                            <option >DIREÇÃO GERAL</option>
                            <option >FARMÁCIA</option>
                            <option >MANUTENÇÃO</option>
                            <option >NAC</option>
                            <option >NÚCLEO ADM. CONTROLE PATRIMONIAL</option>
                            <option >NÚCLEO ADM.FINANCEIRO</option>
                            <option >NÚCLEO ADMINISTRATIVO HOTELARIA</option>
                            <option >NÚCLEO ADMINISTRATIVO SETOR DE PESSOAL</option>
                            <option >NÚCLEO ADM. SUPRIMENTO E LOGÍSTICA</option>
                            <option >NÚCLEO GESTÃO PESSOAS</option>
                            <option >OUVIDORIA</option>
                            <option >SERVIÇO SOCIAL</option>
                            <option >SESMT</option>
                        </select>
                    </div>
                </div>
                <!-- LOCAL DE OCORRENCIA -->
                <div class="p-0 sm:p-0 md:px-4 lg:px-4 col-xs-12 col-sm-12 col-md-3 col-lg-3">
                    <div id="cadastrarlocal" class="form-group form-group-sm">
                        <label for="local" class="control-label"><span class="text-danger">*</span>
                            Local Ocorrência: </label><select id="local" name="local"
                            class="form-control">
                            <option>SELECIONE</option>
                            <option>ALMOXARIFADO</option>
                            <option>AMBULATÓRIO</option>
                            <option>CENTRAL DE TRANSPORTE DE PACIENTES</option>
                            <option>COORDENAÇÃO GERAL DE ENFERMAGEM</option>
                            <option>DIREÇÃO DE GESTÃO E ATENDIMENTO</option>
                            <option>DIREÇÃO DE PROCESSOS ASSISTENCIAIS</option>
                            <option>DIREÇÃO GERAL</option>
                            <option>FARMÁCIA</option>
                            <option>MANUTENÇÃO</option>
                            <option>NAC</option>
                            <option>NÚCLEO ADM. CONTROLE PATRIMONIAL</option>
                            <option>NÚCLEO ADM.FINANCEIRO</option>
                            <option>NÚCLEO ADMINISTRATIVO HOTELARIA</option>
                            <option>NÚCLEO ADMINISTRATIVO SETOR DE PESSOAL</option>
                            <option>NÚCLEO ADM. SUPRIMENTO E LOGÍSTICA</option>
                            <option>NÚCLEO GESTÃO PESSOAS</option>
                            <option>OUVIDORIA</option>
                            <option>SERVIÇO SOCIAL</option>
                            <option>SESMT</option>
                        </select>
                    </div>
                </div>
                <div class="form-group p-0 sm:p-0 md:px-4 lg:px-4 col-xs-12 col-sm-12 col-md-3 col-lg-3">
                    <label for="grau_incidente" class="control-label"><span class="text-danger">*</span>
                        Grau do Incidente: </label><select id="grau_incidente" name="grau_incidente"
                        class="form-control">
                        <option>SELECIONE</option>
                        <option>Não conformidade</option>
                        <option>Incidente sem dano</option>
                        <option>Evento Adverso Leve</option>
                        <option>Evento Adverso Moderado</option>
                        <option>Evento Adverso Grave</option>
                        <option>Evento Adverso com Óbito</option>
                    </select>
                </div>
                <!-- DATA OCORRENCIA -->
                <div class="form-group p-0 sm:p-0 md:px-4 lg:px-4 col-xs-12 col-sm-12 col-md-3 col-lg-3">
                    <label for="dataOcorrencia" class="control-label"><span class="text-danger">*</span> Data
                        Ocorrência: </label>
                    <div class="input-group datetimestamppicker"><input id="dataOcorrencia" name="dataOcorrencia"
                            type="DateTime-Local" value="" class="form-control">
                        <span class="input-group-addon"></span>
                    </div>
                </div>
                <div class="form-group p-0 sm:p-0 md:px-4 lg:px-4 col-xs-12 col-sm-12 col-md-3 col-lg-3">
                    <label for="afetouPaciente" class="control-label"><span class="text-danger">*</span>
                        Envolveu o Paciente? </label><br>
                    <div class="btn-group">
                        <label>
                            <input type="radio" name="afetouPaciente" id="afetouPaciente1" value="Sim"
                                autocomplete="off"> Sim
                        </label>
                        <label>
                            <input type="radio" name="afetouPaciente" id="afetouPaciente2" value="Não"
                                autocomplete="off" style="margin-left:50px;" checked> Não
                        </label>
                    </div>
                </div>

                <div class="form-group p-0 sm:p-0 md:px-4 lg:px-4 col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <label for="comment">Nome do Paciente</label>
                    <input name="nome_paciente" class="form-control" id="comment" autocomplete="off"></input>
                </div>
                <div class="form-group p-0 sm:p-0 md:px-4 lg:px-4 col-xs-12 col-sm-12 col-md-3 col-lg-3">
                    <label for="comment">Prontuário</label>
                    <input name="prontuario" class="form-control" id="comment"></input>
                </div>
            </div>
            <div class="form-group col-xs-12 col-sm-12">
                <label for="comment"><span class="text-danger">*</span> O que Aconteceu?</label>
                <H6>Descreva o evento (O quê, como, onde e quando ocorreu. Tente descrever o evento com o
                    máximo
                    possível de dados para podermos identificar a falha e melhorar nossos processos)</H6>
                <textarea name="texto_notificacao" class="form-control" rows="4" id="comment" autocomplete="off"
                    required></textarea>
            </div>

            <!-- DATA OCORRENCIA 
            <div class="form-group col-xs-12 col-sm-12">
                <label for="servi">Técnico:</label>
                //<?php
				//	ini_set('default_charset', 'UTF-8');
				//	$conn = new mysqli('localhost', 'root', '', 'sine')
				//		or die('Cannot connect to db');
				//	$result = $conn->query("select id, Nome from tecnicos");
				//	echo "<select name='id'>"; //id
				//	while ($row = $result->fetch_assoc()) {
				//		unset($id, $name);
				//		$id = $row['id'];
				//		$name = $row['Nome'];
				//		echo '<option value="' . $name . '">' . $name . '</option>';
				//	}
				//	echo $return .= ' </select>';
				//	?>
            </div>	-->
            <div class="p-0 sm:p-0 md:px-4 lg:px-4 col-xs-12 col-sm-12 col-md-6 col-lg-6">
                <button type="submit" class="btn cp-0 sm:p-0 md:px-4 lg:px-4 col-xs-12 col-sm-12 col-md-8 col-lg-8"
                    id="btn-formulario">Enviar Notificação</button>
            </div>
        </form>
    </div>
    <footer class="rodape">
        <p class="text-footer">© 2024 ICEPES | CISNE - INSTITUTO CISNE DE ENSINO E PESQUISA. TODOS OS DIREITOS
            RESERVADOS.</p>
    </footer>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment-with-locales.min.js"></script>
    <script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.43/js/bootstrap-datetimepicker.min.js">
    </script>
    <script type="text/javascript" src="/bootstrap/pt-br.js"></script>
</body>

</html>