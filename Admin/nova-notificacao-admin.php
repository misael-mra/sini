<?php
session_start();
$role = $_SESSION['sess_userrole'];
if (!isset($_SESSION['sess_username']) || $role != "admin") {
	header('Location: ../index.php?err=2');
}
?>
<?php
include("conecta-puxa-dados-admin.php");
// puxar notificacoes do banco
$sql_code = "select * from notificacoes WHERE Status='Aberto'";
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

    <div class="container painel-title">NOTIFICAÇÃO</div>
    <div class="container painel-notificacao">
        <form method="POST" action="processa-insere-notificacao.php">
            <div class="form-group col-xs-12 col-sm-12">
                <label for="sel1"><span class="text-danger">*</span> Unidade de Ocorrência:</label>
                <select class="form-control" id="local" name="local">
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
                            Setor Notificado: </label><select id="isnSetorNotificado"
                            name="conteudo:viewEdicao:isnSetorNotificado" class="form-control">
                            <option value="0">SELECIONE</option>
                            <option value="119">ALMOXARIFADO</option>
                            <option value="125">AMBULATÓRIO</option>
                            <option value="128">CENTRAL DE TRANSPORTE DE PACIENTES</option>
                            <option value="135">COORDENAÇÃO GERAL DE ENFERMAGEM</option>
                            <option value="133">DIREÇÃO DE GESTÃO E ATENDIMENTO</option>
                            <option value="132">DIREÇÃO DE PROCESSOS ASSISTENCIAIS</option>
                            <option value="131">DIREÇÃO GERAL</option>
                            <option value="120">FARMÁCIA</option>
                            <option value="113">MANUTENÇÃO</option>
                            <option value="134">NAC</option>
                            <option value="118">NÚCLEO ADM. CONTROLE PATRIMONIAL</option>
                            <option value="115">NÚCLEO ADM.FINANCEIRO</option>
                            <option value="116">NÚCLEO ADMINISTRATIVO HOTELARIA</option>
                            <option value="163">NÚCLEO ADMINISTRATIVO SETOR DE PESSOAL</option>
                            <option value="117">NÚCLEO ADM. SUPRIMENTO E LOGÍSTICA</option>
                            <option value="114">NÚCLEO GESTÃO PESSOAS</option>
                            <option value="161">OUVIDORIA</option>
                            <option value="136">SERVIÇO SOCIAL</option>
                            <option value="157">SESMT</option>
                        </select>
                    </div>
                </div>
                <!-- LOCAL DE OCORRENCIA -->
                <div class="p-0 sm:p-0 md:px-4 lg:px-4 col-xs-12 col-sm-12 col-md-3 col-lg-3">
                    <div id="cadastrarIsnUnidadeOcorrencia" class="form-group form-group-sm">
                        <label for="isnUnidadeOcorrencia" class="control-label"><span class="text-danger">*</span>
                            Local Ocorrência: </label><select id="isnUnidadeOcorrencia" name="isnUnidadeOcorrencia"
                            class="form-control">
                            <option value="0">SELECIONE</option>
                            <option value="119">ALMOXARIFADO</option>
                            <option value="125">AMBULATÓRIO</option>
                            <option value="128">CENTRAL DE TRANSPORTE DE PACIENTES</option>
                            <option value="135">COORDENAÇÃO GERAL DE ENFERMAGEM</option>
                            <option value="133">DIREÇÃO DE GESTÃO E ATENDIMENTO</option>
                            <option value="132">DIREÇÃO DE PROCESSOS ASSISTENCIAIS</option>
                            <option value="131">DIREÇÃO GERAL</option>
                            <option value="120">FARMÁCIA</option>
                            <option value="113">MANUTENÇÃO</option>
                            <option value="134">NAC</option>
                            <option value="118">NÚCLEO ADM. CONTROLE PATRIMONIAL</option>
                            <option value="115">NÚCLEO ADM.FINANCEIRO</option>
                            <option value="116">NÚCLEO ADMINISTRATIVO HOTELARIA</option>
                            <option value="163">NÚCLEO ADMINISTRATIVO SETOR DE PESSOAL</option>
                            <option value="117">NÚCLEO ADM. SUPRIMENTO E LOGÍSTICA</option>
                            <option value="114">NÚCLEO GESTÃO PESSOAS</option>
                            <option value="161">OUVIDORIA</option>
                            <option value="136">SERVIÇO SOCIAL</option>
                            <option value="157">SESMT</option>
                        </select>
                    </div>
                </div>
                <div class="form-group p-0 sm:p-0 md:px-4 lg:px-4 col-xs-12 col-sm-12 col-md-3 col-lg-3">
                    <label for="afetouPaciente" class="control-label"><span class="text-danger">*</span>
                        Grau do Incidente: </label><select id="afetouPaciente" name="afetouPaciente" size="1"
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
                            <input type="radio" name="afetouPaciente" id="afetouPaciente1" value="sim" autocomplete="off"> Sim
                        </label>
                        <label>
                            <input type="radio" name="afetouPaciente" id="afetouPaciente2" value="nao" autocomplete="off"
                                style="margin-left:50px;" checked> Não
                        </label>
                    </div>
                </div>

                <div class="form-group p-0 sm:p-0 md:px-4 lg:px-4 col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <label for="comment"><span class="text-danger">*</span> Nome do Paciente</label>
                    <input name="servico" class="form-control" id="comment" autocomplete="off" required></input>
                </div>
                <div class="form-group p-0 sm:p-0 md:px-4 lg:px-4 col-xs-12 col-sm-12 col-md-3 col-lg-3">
                    <label for="comment">Prontuário</label>
                    <input name="servico" class="form-control" id="comment"></input>
                </div>
            </div>
            <div class="form-group col-xs-12 col-sm-12">
                <label for="comment"><span class="text-danger">*</span> O que Aconteceu?</label>
                <H6>Descreva o evento (O quê, como, onde e quando ocorreu. Tente descrever o evento com o
                    máximo
                    possível de dados para podermos identificar a falha e melhorar nossos processos)</H6>
                <textarea name="servico" class="form-control" rows="4" id="comment" autocomplete="off"
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
    </head>
</body>

</html>