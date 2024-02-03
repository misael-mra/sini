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
    <title>Inserir Usuário</title>
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
    <div class="container painel-title">CADASTRAR USUÁRIO</div>
    <div class="container painel-padrao">
        <form method="POST" action="processa_cad_tecnic.php">
            <div class="form-group p-0 sm:p-0 md:px-4 lg:px-4 col-xs-12 col-sm-12 col-md-4 col-lg-4">
                <label for="nomecomptec"><span class="text-danger">*</span> Nome Completo</label>
                <input type="text" class="form-control" id="nomecomptec" placeholder="Nome completo" name="nomecomptec"
                    required />
            </div>
            <div class="form-group p-0 sm:p-0 md:px-4 lg:px-4 col-xs-12 col-sm-12 col-md-4 col-lg-4">
                <label for="email">Email</label>
                <input type="text" class="form-control" id="email" placeholder="Email" name="email" autocomplete="off"
                    required />
            </div>
            <div class="form-group p-0 sm:p-0 md:px-4 lg:px-4 col-xs-12 col-sm-12 col-md-4 col-lg-4">
                <label for="telefone">Telefone</label>
                <input type="text" class="form-control" id="telefone" placeholder="Telefone" name="telefone" required />
            </div>
            <div class="form-group p-0 sm:p-0 md:px-4 lg:px-4 col-xs-12 col-sm-12 col-md-6 col-lg-6">
                <label for="sel1"><span class="text-danger">*</span> Unidade</label>
                <select class="form-control" id="unidadeUsuario" name="unidadeUsuario">
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
            <div class="form-group p-0 sm:p-0 md:px-4 lg:px-4 col-xs-12 col-sm-12 col-md-3 col-lg-3">
                <label for="setorUsuario" class="control-label"><span class="text-danger">*</span>
                    Setor </label><select id="setorUsuario" name="setorUsuario" class="form-control">
                    <option value="0">SELECIONE</option>
                    <option value="1">ALMOXARIFADO</option>
                    <option value="2">AMBULATÓRIO</option>
                    <option value="3">CENTRAL DE TRANSPORTE DE PACIENTES</option>
                    <option value="4">COORDENAÇÃO GERAL DE ENFERMAGEM</option>
                    <option value="5">DIREÇÃO DE GESTÃO E ATENDIMENTO</option>
                    <option value="6">DIREÇÃO DE PROCESSOS ASSISTENCIAIS</option>
                    <option value="7">DIREÇÃO GERAL</option>
                    <option value="8">FARMÁCIA</option>
                    <option value="9">MANUTENÇÃO</option>
                    <option value="10">NAC</option>
                    <option value="11">NÚCLEO ADM. CONTROLE PATRIMONIAL</option>
                    <option value="12">NÚCLEO ADM.FINANCEIRO</option>
                    <option value="13">NÚCLEO ADMINISTRATIVO HOTELARIA</option>
                    <option value="14">NÚCLEO ADMINISTRATIVO SETOR DE PESSOAL</option>
                    <option value="15">NÚCLEO ADM. SUPRIMENTO E LOGÍSTICA</option>
                    <option value="16">NÚCLEO GESTÃO PESSOAS</option>
                    <option value="17">OUVIDORIA</option>
                    <option value="18">SERVIÇO SOCIAL</option>
                    <option value="19">SESMT</option>
                </select>
            </div>
            <div class="form-group p-0 sm:p-0 md:px-4 lg:px-4 col-xs-12 col-sm-12 col-md-3 col-lg-3">
                <label for="CoordSetor" class="control-label">
                    Responsável pelo setor? </label><br>
                <div class="btn-group">
                    <label>
                        <input type="radio" name="CoordSetor" id="CoordSetor1" value="sim" autocomplete="off">
                        SIM
                    </label>
                    <label>
                        <input type="radio" name="CoordSetor" id="CoordSetor2" value="nao" autocomplete="off"
                            style="margin-left:56px;" checked> NÃO
                    </label>
                </div>
            </div>
            <div class="separador p-0 sm:p-0 md:px-4 lg:px-4 col-xs-12 col-sm-12 col-md-12 col-lg-12">
            </div>
            <div class="form-group p-0 sm:p-0 md:px-4 lg:px-4 col-xs-12 col-sm-12 col-md-6 col-lg-6">
                <label for="usuarioCad"><span class="text-danger">*</span> Usuário</label>
                <input type="text" class="form-control" id="usuarioCad" placeholder="Usuário" name="usuarioCad"
                    required />
            </div>
            <div class="form-group p-0 sm:p-0 md:px-4 lg:px-4 col-xs-12 col-sm-12 col-md-6 col-lg-6">
                <label for="usuarioCad"><span class="text-danger">*</span> Senha</label>
                <input type="text" class="form-control" id="senhaCad" placeholder="Senha" name="senhaCad" required />
            </div>
            <div class="p-0 sm:p-0 md:px-4 lg:px-4 col-xs-12 col-sm-12 col-md-6 col-lg-6">
                <button type="submit" class="btn p-0 sm:p-0 md:px-4 lg:px-4 col-xs-12 col-sm-12 col-md-8 col-lg-8"
                    id="btn-formulario">Cadastrar</button>
            </div>
        </form>
    </div>
</body>

</html>