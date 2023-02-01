<?php
session_start();
include_once('config.php');
if ((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true)) {
  unset($_SESSION['email']);
  unset($_SESSION['senha']);
  header('Location:entrar.php');
}
$logado = $_SESSION['email'];

if (!empty($_GET['cod'])) {

  include_once('config.php');
  $cod = $_GET['cod'];
  /* relacionamento */
  $sqlselectRelacionamento = "SELECT * FROM meta_relacionamento WHERE cod=$cod";
  $resultRelacionamento = $conexao_forms15->query($sqlselectRelacionamento);

  /* saude */
  $sqlselectSaude = "SELECT * FROM meta_saude WHERE cod=$cod";
  $resultSaude = $conexao_forms15->query($sqlselectSaude);

  /* Trabalho */
  $sqlselectTrabalho = "SELECT * FROM meta_trabalho WHERE cod=$cod";
  $resultTrabalho = $conexao_forms15->query($sqlselectTrabalho);

  /* Dinheiro */
  $sqlselectDinheiro = "SELECT * FROM meta_dinheiro WHERE cod=$cod";
  $resultDinheiro = $conexao_forms15->query($sqlselectDinheiro);

  /* Outro */
  $sqlselectOutro = "SELECT * FROM meta_outro WHERE cod=$cod";
  $resultOutro = $conexao_forms15->query($sqlselectOutro);

  /* relacionamento */
  if ($resultRelacionamento->num_rows > 0) {
    while ($user_data = mysqli_fetch_assoc($resultRelacionamento)) {
      $nome = $user_data['nome'];
      $sobrenome = $user_data['sobrenome'];
      $email = $user_data['email'];

      $metaRelacionamento1 = $user_data['meta1'];
      $metaRelacionamento2 = $user_data['meta2'];
      $metaRelacionamento3 = $user_data['meta3'];
      $metaRelacionamento4 = $user_data['meta4'];
      $metaRelacionamento5 = $user_data['meta5'];

      $feitoRelacionamento1 = $user_data['feito1'];
      $feitoRelacionamento2 = $user_data['feito2'];
      $feitoRelacionamento3 = $user_data['feito3'];
      $feitoRelacionamento4 = $user_data['feito4'];
      $feitoRelacionamento5 = $user_data['feito5'];
    }
  }
  /* Saude */
  if ($resultSaude->num_rows > 0) {
    while ($user_data = mysqli_fetch_assoc($resultSaude)) {
      $nome = $user_data['nome'];
      $sobrenome = $user_data['sobrenome'];
      $email = $user_data['email'];

      $metaSaude1 = $user_data['meta1'];
      $metaSaude2 = $user_data['meta2'];
      $metaSaude3 = $user_data['meta3'];
      $metaSaude4 = $user_data['meta4'];
      $metaSaude5 = $user_data['meta5'];

      $feitoSaude1 = $user_data['feito1'];
      $feitoSaude2 = $user_data['feito2'];
      $feitoSaude3 = $user_data['feito3'];
      $feitoSaude4 = $user_data['feito4'];
      $feitoSaude5 = $user_data['feito5'];
    }
  }
  /* Trabalho */
  if ($resultTrabalho->num_rows > 0) {
    while ($user_data = mysqli_fetch_assoc($resultTrabalho)) {
      $nome = $user_data['nome'];
      $sobrenome = $user_data['sobrenome'];
      $email = $user_data['email'];

      $metaTrabalho1 = $user_data['meta1'];
      $metaTrabalho2 = $user_data['meta2'];
      $metaTrabalho3 = $user_data['meta3'];
      $metaTrabalho4 = $user_data['meta4'];
      $metaTrabalho5 = $user_data['meta5'];

      $feitoTrabalho1 = $user_data['feito1'];
      $feitoTrabalho2 = $user_data['feito2'];
      $feitoTrabalho3 = $user_data['feito3'];
      $feitoTrabalho4 = $user_data['feito4'];
      $feitoTrabalho5 = $user_data['feito5'];
    }
  }
  /* Dinheiro */
  if ($resultDinheiro->num_rows > 0) {
    while ($user_data = mysqli_fetch_assoc($resultDinheiro)) {
      $nome = $user_data['nome'];
      $sobrenome = $user_data['sobrenome'];
      $email = $user_data['email'];

      $metaDinheiro1 = $user_data['meta1'];
      $metaDinheiro2 = $user_data['meta2'];
      $metaDinheiro3 = $user_data['meta3'];
      $metaDinheiro4 = $user_data['meta4'];
      $metaDinheiro5 = $user_data['meta5'];

      $feitoDinheiro1 = $user_data['feito1'];
      $feitoDinheiro2 = $user_data['feito2'];
      $feitoDinheiro3 = $user_data['feito3'];
      $feitoDinheiro4 = $user_data['feito4'];
      $feitoDinheiro5 = $user_data['feito5'];
    }
  }
  /* Outro */
  if ($resultOutro->num_rows > 0) {
    while ($user_data = mysqli_fetch_assoc($resultOutro)) {
      $nome = $user_data['nome'];
      $sobrenome = $user_data['sobrenome'];
      $email = $user_data['email'];

      $metaOutro1 = $user_data['meta1'];
      $metaOutro2 = $user_data['meta2'];
      $metaOutro3 = $user_data['meta3'];
      $metaOutro4 = $user_data['meta4'];
      $metaOutro5 = $user_data['meta5'];

      $feitoOutro1 = $user_data['feito1'];
      $feitoOutro2 = $user_data['feito2'];
      $feitoOutro3 = $user_data['feito3'];
      $feitoOutro4 = $user_data['feito4'];
      $feitoOutro5 = $user_data['feito5'];
    }
  } else {
    header('Location: testando.php');
  }
} else {
  header('Location: testando.php');
}
/*
if((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true))
{
unset($_SESSION['email']);
unset($_SESSION['senha']);
header('Location:entrar.php');
}
$logado = $_SESSION['email'];
*/
if (!empty($_GET['search'])) {
  $dataRelacionamento = $_GET['search'];
  $sql = "SELECT * FROM meta_relacionamento WHERE cod LIKE '%$dataRelacionamento%' or nome LIKE '%$dataRelacionamento%' or sobrenome like '%$dataRelacionamento%' or email LIKE '%$dataRelacionamento%' or 
          meta LIKE '%$dataRelacionamento%' or feito like '%$dataRelacionamento%' ";
} else {
  $sql = "SELECT*from meta_relacionamento where meta_relacionamento.email = '$logado' ";
}

if (isset($_POST['submit_relacionamento'])) {
  $cod = $_POST['cod'];
  $feitoRelacionamento1 = $_POST['feito1'];
  $feitoRelacionamento2 = $_POST['feito2'];
  $feitoRelacionamento3 = $_POST['feito3'];
  $feitoRelacionamento4 = $_POST['feito4'];
  $feitoRelacionamento5 = $_POST['feito5'];

  $sqlupdate = "UPDATE meta_relacionamento SET feito1='$feitoRelacionamento1',feito2='$feitoRelacionamento2',feito3='$feitoRelacionamento3',
          feito4='$feitoRelacionamento4',feito5='$feitoRelacionamento5' WHERE cod='$cod' ";
  $result2 = $conexao_forms15->query($sqlupdate);
}
if (isset($_POST['submit_Saude'])) {
  $cod = $_POST['cod'];
  $feitoSaude1 = $_POST['feito1'];
  $feitoSaude2 = $_POST['feito2'];
  $feitoSaude3 = $_POST['feito3'];
  $feitoSaude4 = $_POST['feito4'];
  $feitoSaude5 = $_POST['feito5'];

  $sqlupdate = "UPDATE meta_saude SET feito1='$feitoSaude1',feito2='$feitoSaude2',feito3='$feitoSaude3',
          feito4='$feitoSaude4',feito5='$feitoSaude5' WHERE cod='$cod' ";
  $result2 = $conexao_forms15->query($sqlupdate);
}
if (isset($_POST['submit_Trabalho'])) {
  $cod = $_POST['cod'];
  $feitoTrabalho1 = $_POST['feito1'];
  $feitoTrabalho2 = $_POST['feito2'];
  $feitoTrabalho3 = $_POST['feito3'];
  $feitoTrabalho4 = $_POST['feito4'];
  $feitoTrabalho5 = $_POST['feito5'];

  $sqlupdate = "UPDATE meta_trabalho SET feito1='$feitoTrabalho1',feito2='$feitoTrabalho2',feito3='$feitoTrabalho3',
          feito4='$feitoTrabalho4',feito5='$feitoTrabalho5' WHERE cod='$cod' ";
  $result2 = $conexao_forms15->query($sqlupdate);
}
if (isset($_POST['submit_Dinheiro'])) {
  $cod = $_POST['cod'];
  $feitoDinheiro1 = $_POST['feito1'];
  $feitoDinheiro2 = $_POST['feito2'];
  $feitoDinheiro3 = $_POST['feito3'];
  $feitoDinheiro4 = $_POST['feito4'];
  $feitoDinheiro5 = $_POST['feito5'];

  $sqlupdate = "UPDATE meta_dinheiro SET feito1='$feitoDinheiro1',feito2='$feitoDinheiro2',feito3='$feitoDinheiro3',
          feito4='$feitoDinheiro4',feito5='$feitoDinheiro5' WHERE cod='$cod' ";
  $result2 = $conexao_forms15->query($sqlupdate);
}
if (isset($_POST['submit_Outro'])) {
  $cod = $_POST['cod'];
  $feitoOutro1 = $_POST['feito1'];
  $feitoOutro2 = $_POST['feito2'];
  $feitoOutro3 = $_POST['feito3'];
  $feitoOutro4 = $_POST['feito4'];
  $feitoOutro5 = $_POST['feito5'];

  $sqlupdate = "UPDATE meta_outro SET feito1='$feitoOutro1',feito2='$feitoOutro2',feito3='$feitoOutro3',
          feito4='$feitoOutro4',feito5='$feitoOutro5' WHERE cod='$cod' ";
  $result2 = $conexao_forms15->query($sqlupdate);
}
$result2 = $conexao_forms15->query($sql);
$user_data = mysqli_fetch_assoc($result2);
// gráficos (pizza)
$x = 0;
$y = 0;
$saude = 0;
$relacionamento = 0;
$trabalho = 0;
$dinheiro = 0;
$outro = 0;
//percorre o meta_saude

$result_niveis_saude = "SELECT * FROM meta_saude WHERE cod=$cod";
$resultado_niveis_saude = mysqli_query($conexao_forms15, $result_niveis_saude);
while ($row_niveis_saude = mysqli_fetch_assoc($resultado_niveis_saude)) {
  if ($row_niveis_saude['feito1'] == "on") {
    $x++;
    $saude++;
  }
  if ($row_niveis_saude['feito2'] == "on") {
    $x++;
    $saude++;
  }
  if ($row_niveis_saude['feito3'] == "on") {
    $x++;
    $saude++;
  }
  if ($row_niveis_saude['feito4'] == "on") {
    $x++;
    $saude++;
  }
  if ($row_niveis_saude['feito5'] == "on") {
    $x++;
    $saude++;
  }
  if ($row_niveis_saude['feito1'] == "" && $row_niveis_saude['meta1'] != "") {
    $y++;
  }
  if ($row_niveis_saude['feito2'] == "" && $row_niveis_saude['meta2'] != "") {
    $y++;
  }
  if ($row_niveis_saude['feito3'] == "" && $row_niveis_saude['meta3'] != "") {
    $y++;
  }
  if ($row_niveis_saude['feito4'] == "" && $row_niveis_saude['meta4'] != "") {
    $y++;
  }
  if ($row_niveis_saude['feito5'] == "" && $row_niveis_saude['meta5'] != "") {
    $y++;
  }
}
//percorre o meta_relacionamento

$result_niveis_relacionamento = "SELECT * FROM meta_relacionamento WHERE cod=$cod";
$resultado_niveis_relacionamento = mysqli_query($conexao_forms15, $result_niveis_relacionamento);
while ($row_niveis_relacionamento = mysqli_fetch_assoc($resultado_niveis_relacionamento)) {
  if ($row_niveis_relacionamento['feito1'] == "on") {
    $x++;
    $relacionamento++;
  }
  if ($row_niveis_relacionamento['feito2'] == "on") {
    $x++;
    $relacionamento++;
  }
  if ($row_niveis_relacionamento['feito3'] == "on") {
    $x++;
    $relacionamento++;
  }
  if ($row_niveis_relacionamento['feito4'] == "on") {
    $x++;
    $relacionamento++;
  }
  if ($row_niveis_relacionamento['feito5'] == "on") {
    $x++;
    $relacionamento++;
  }
  if ($row_niveis_relacionamento['feito1'] == "" && $row_niveis_relacionamento['meta1'] != "") {
    $y++;
  }
  if ($row_niveis_relacionamento['feito2'] == "" && $row_niveis_relacionamento['meta2'] != "") {
    $y++;
  }
  if ($row_niveis_relacionamento['feito3'] == "" && $row_niveis_relacionamento['meta3'] != "") {
    $y++;
  }
  if ($row_niveis_relacionamento['feito4'] == "" && $row_niveis_relacionamento['meta4'] != "") {
    $y++;
  }
  if ($row_niveis_relacionamento['feito5'] == "" && $row_niveis_relacionamento['meta5'] != "") {
    $y++;
  }
}
//percorre o meta_trabalho
$result_niveis_trabalho = "SELECT * FROM meta_trabalho WHERE cod=$cod";
$resultado_niveis_trabalho = mysqli_query($conexao_forms15, $result_niveis_trabalho);
while ($row_niveis_trabalho = mysqli_fetch_assoc($resultado_niveis_trabalho)) {
  if ($row_niveis_trabalho['feito1'] == "on") {
    $x++;
    $trabalho++;
  }
  if ($row_niveis_trabalho['feito2'] == "on") {
    $x++;
    $trabalho++;
  }
  if ($row_niveis_trabalho['feito3'] == "on") {
    $x++;
    $trabalho++;
  }
  if ($row_niveis_trabalho['feito4'] == "on") {
    $x++;
    $trabalho++;
  }
  if ($row_niveis_trabalho['feito5'] == "on") {
    $x++;
    $trabalho++;
  }
  if ($row_niveis_trabalho['feito1'] == "" && $row_niveis_trabalho['meta1'] != "") {
    $y++;
  }
  if ($row_niveis_trabalho['feito2'] == "" && $row_niveis_trabalho['meta2'] != "") {
    $y++;
  }
  if ($row_niveis_trabalho['feito3'] == "" && $row_niveis_trabalho['meta3'] != "") {
    $y++;
  }
  if ($row_niveis_trabalho['feito4'] == "" && $row_niveis_trabalho['meta4'] != "") {
    $y++;
  }
  if ($row_niveis_trabalho['feito5'] == "" && $row_niveis_trabalho['meta5'] != "") {
    $y++;
  }
}
//percorre o meta_dinheiro
$result_niveis_dinheiro = "SELECT * FROM meta_dinheiro WHERE cod=$cod";
$resultado_niveis_dinheiro = mysqli_query($conexao_forms15, $result_niveis_dinheiro);
while ($row_niveis_dinheiro = mysqli_fetch_assoc($resultado_niveis_dinheiro)) {
  if ($row_niveis_dinheiro['feito1'] == "on") {
    $x++;
    $dinheiro++;
  }
  if ($row_niveis_dinheiro['feito2'] == "on") {
    $x++;
    $dinheiro++;
  }
  if ($row_niveis_dinheiro['feito3'] == "on") {
    $x++;
    $dinheiro++;
  }
  if ($row_niveis_dinheiro['feito4'] == "on") {
    $x++;
    $dinheiro++;
  }
  if ($row_niveis_dinheiro['feito5'] == "on") {
    $x++;
    $dinheiro++;
  }
  if ($row_niveis_dinheiro['feito1'] == "" && $row_niveis_dinheiro['meta1'] != "") {
    $y++;
  }
  if ($row_niveis_dinheiro['feito2'] == "" && $row_niveis_dinheiro['meta2'] != "") {
    $y++;
  }
  if ($row_niveis_dinheiro['feito3'] == "" && $row_niveis_dinheiro['meta3'] != "") {
    $y++;
  }
  if ($row_niveis_dinheiro['feito4'] == "" && $row_niveis_dinheiro['meta4'] != "") {
    $y++;
  }
  if ($row_niveis_dinheiro['feito5'] == "" && $row_niveis_dinheiro['meta5'] != "") {
    $y++;
  }
}
//percorre o meta_outro
$result_niveis_outro = "SELECT * FROM meta_outro WHERE cod=$cod";
$resultado_niveis_outro = mysqli_query($conexao_forms15, $result_niveis_outro);
while ($row_niveis_outro = mysqli_fetch_assoc($resultado_niveis_outro)) {
  if ($row_niveis_outro['feito1'] == "on") {
    $x++;
    $outro++;
  }
  if ($row_niveis_outro['feito2'] == "on") {
    $x++;
    $outro++;
  }
  if ($row_niveis_outro['feito3'] == "on") {
    $x++;
    $outro++;
  }
  if ($row_niveis_outro['feito4'] == "on") {
    $x++;
    $outro++;
  }
  if ($row_niveis_outro['feito5'] == "on") {
    $x++;
    $outro++;
  }
  if ($row_niveis_outro['feito1'] == "" && $row_niveis_outro['meta1'] != "") {
    $y++;
  }
  if ($row_niveis_outro['feito2'] == "" && $row_niveis_outro['meta2'] != "") {
    $y++;
  }
  if ($row_niveis_outro['feito3'] == "" && $row_niveis_outro['meta3'] != "") {
    $y++;
  }
  if ($row_niveis_outro['feito4'] == "" && $row_niveis_outro['meta4'] != "") {
    $y++;
  }
  if ($row_niveis_outro['feito5'] == "" && $row_niveis_outro['meta5'] != "") {
    $y++;
  }
}
if ($x > 1) {
  $total_metas = $saude + $relacionamento + $trabalho + $dinheiro + $outro;
  $saude2 = ($saude * 100) / $total_metas;
  $relacionamento2 = ($relacionamento * 100) / $total_metas;
  $dinheiro2 = ($dinheiro * 100) / $total_metas;
  $trabalho2 = ($trabalho * 100) / $total_metas;
  $outro2 = ($outro * 100) / $total_metas;
} else {
  $saude2 = 0;
  $relacionamento2 = 0;
  $dinheiro2 = 0;
  $trabalho2 = 0;
  $outro2 = 0;
}
?>
<!doctype html>
<html>

<head>
  <meta charset='utf-8'>
  <meta name='viewport' content='width=device-width, initial-scale=1'>
  <link rel="shortcut icon" href="assets/images/favico.png" type="image/x-icon">
  <title>Meta-
    <?php echo $nome ?>
  </title>
  <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css' rel='stylesheet'>
  <link href='https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css' rel='stylesheet'>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css'>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css'>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css'>
  <link href="assets/css/carousel_img.css" rel="stylesheet">
  <!-- <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script> -->
  <script defer src=https://kit.fontawesome.com/79b5047e4f.js crossorigin="anonymous"></script>
  <link rel="stylesheet" href="assets/css/nav.css">
  <link rel="stylesheet" href="assets/css/style-trelo.css">
  <style>
    .table-wrapper {
      max-height: 500px;
      overflow-y: auto;
    }

    dialog::backdrop {
      background: rgb(0 0 0 / .5);
    }

    dialog {
      border: none;
      border-radius: .5rem;
      box-shadow: 0 0 1em rgb(0 0 0 / .3);
      width: 80%;
    }

    #abrir_dialog {
      color: #000;
      border-radius: 5px;
      border: none;
      padding: 7px 14px 7px 14px;
      outline: none;
    }

    #fechar_dialog {
      color: #fff;
      border-radius: 5px;
      border: none;
      outline: none;
      background: #f01e1e;
    }

    #abrir_dialog:hover {
      padding: 6px 13px 6px 13px;
      opacity: 0.7;

    }

    #fechar_dialog:hover {
      background: #f01e1e;
      opacity: 0.7;
      transition: all 0.5s;
    }

    input:hover {
      opacity: 0.7;
      transition: all 0.5s;
    }

    #titulo_dialog {
      font-weight: bold;
    }

    input[type=checkbox] {
      position: absolute;
      cursor: pointer;
      left: 1.1rem;
      height: 20px;
      width: 20px;

      border-radius: 2px;
    }

    h5 {
      text-indent: 1.6rem;
    }

    ul {
      list-style: none;
    }

    .cores1:hover {
      background-color: #00a8ff !important;
    }

    .cores2:hover {
      background-color: #9c88ff !important;
    }

    .cores3:hover {
      background-color: #fbc531 !important;
    }

    .cores4:hover {
      background-color: #4cd137 !important;
    }

    .cores5:hover {
      background-color: #487eb0 !important;
      /* transform: scale(1.1); */
    }
  </style>
</head>

<body className='snippet-body' style="background-color:#f8f9fa">

  <body id="body-pd">
    <header class="header" id="header">
      <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
    </header>
    <div class="l-navbar" id="nav-bar">
      <nav class="nav">
        <div> <a href="#" class="nav_logo"> <i class='bx bx-layer nav_logo-icon'></i> <span class="nav_logo-name">
              <?php
              echo $nome ?>
            </span> </a>
          <div class="nav_list">
            <?php
            /*echo "<a href='#' class='nav_link'> <i class='bx bx-grid-alt nav_icon'></i> <span
            class='nav_name'>Início</span> </a>";*/

            echo "<a href='show_sistema_persona.php?cod=$user_data[cod]' class='nav_link'> <i class='bx bx-user nav_icon'></i>
              <span class='nav_name'>Conta</span> </a>";

            echo "<a href='testando.php?cod=$user_data[cod]' class='nav_link'> <i
              class='bx bx-message-square-detail nav_icon'></i> <span class='nav_name'>Formulário</span> </a>";

            echo "<a href='meta.php?cod=$user_data[cod]' class='nav_link active'> <i class='bx bxs-doughnut-chart'></i> <span class='nav_name'>Metas</span></a>";

            echo "<a href='https://wa.me/5561992656388' class='nav_link'><svg xmlns='http://www.w3.org/2000/svg' width='1.3em' height='1.3em' viewBox='0 0 24 24'><path fill='currentColor' d='M19.05 4.91A9.816 9.816 0 0 0 12.04 2c-5.46 0-9.91 4.45-9.91 9.91c0 1.75.46 3.45 1.32 4.95L2.05 22l5.25-1.38c1.45.79 3.08 1.21 4.74 1.21c5.46 0 9.91-4.45 9.91-9.91c0-2.65-1.03-5.14-2.9-7.01zm-7.01 15.24c-1.48 0-2.93-.4-4.2-1.15l-.3-.18l-3.12.82l.83-3.04l-.2-.31a8.264 8.264 0 0 1-1.26-4.38c0-4.54 3.7-8.24 8.24-8.24c2.2 0 4.27.86 5.82 2.42a8.183 8.183 0 0 1 2.41 5.83c.02 4.54-3.68 8.23-8.22 8.23zm4.52-6.16c-.25-.12-1.47-.72-1.69-.81c-.23-.08-.39-.12-.56.12c-.17.25-.64.81-.78.97c-.14.17-.29.19-.54.06c-.25-.12-1.05-.39-1.99-1.23c-.74-.66-1.23-1.47-1.38-1.72c-.14-.25-.02-.38.11-.51c.11-.11.25-.29.37-.43s.17-.25.25-.41c.08-.17.04-.31-.02-.43s-.56-1.34-.76-1.84c-.2-.48-.41-.42-.56-.43h-.48c-.17 0-.43.06-.66.31c-.22.25-.86.85-.86 2.07c0 1.22.89 2.4 1.01 2.56c.12.17 1.75 2.67 4.23 3.74c.59.26 1.05.41 1.41.52c.59.19 1.13.16 1.56.1c.48-.07 1.47-.6 1.67-1.18c.21-.58.21-1.07.14-1.18s-.22-.16-.47-.28z'/></svg> <span class='nav_name'>Mensagem</span></a>";

            ?>
          </div>
        </div> <a href="#" class="nav_link"> <i class='bx bx-log-out nav_icon' onclick="confirmaSair()"></i> <span
            class="nav_name">Sair</span>
        </a>
      </nav>
    </div>
    <!--Container Main start-->
    <div class="height-100 bg-light">

      <h2> Olá,
        <?php echo $nome ?>&#128578;
      </h2>
      <section class="game-section">
        <h2 class="line-title">Leia sempre que puder</h2>
        <div class="owl-carousel custom-carousel owl-theme">
          <div class="item active" style="background-image: url(assets/images/leão.jpg);">
            <div class="item-desc">
              <h3>Foco</h3>
              <p>Pensamentos conduzem a sentimentos. Sentimentos conduzem a ações. Ações conduzem a resultados.<br> T.
                Harv Eker</p>
            </div>
          </div>
          <div class="item" style="background-image: url(assets/images/lobo.jpg);">
            <div class="item-desc">
              <h3>Sabedoria</h3>
              <p>Se o problema possui solução, não devemos nos preocupar com ele, e se não possui solução,
                de nada adianta nos preocuparmos <br> Epicteto</p>
            </div>
          </div>
          <div class="item" style="background-image: url(assets/images/gaviao.jpg);">
            <div class="item-desc">
              <h3>Dissernimento</h3>
              <p>Se você não sabe para onde ir, qualquer caminho serve. <br>Lewis Carroll</p>
            </div>
          </div>
          <div class="item" style="background-image: url(assets/images/paisagem.jpg);">
            <div class="item-desc">
              <h3>Paciência</h3>
              <p>A paciência é árvore de raiz amarga, mas seus frutos muito doces. Toda pessoa de sucesso já abidicou de
                alguma coisa,
                já se sacrificou por algo. E sacrifício não é quando você é obrigado a fazer, sacrifício é por vontade
                própria.<br>
                Thiago Nigro
              </p>
            </div>
          </div>
          <div class="item" style="background-image: url(assets/images/paisagem1.jpg);">
            <div class="item-desc">
              <h3>Determinação</h3>
              <p>Os fracos não tentam. Os covardes desistem. Somente os fortes conquistam</p>
            </div>
          </div>
          <div class="item" style="background-image: url(assets/images/paisagem2.jpg);">
            <div class="item-desc">
              <h3>Coragem</h3>
              <p>Coragem é a resistência ao medo, domínio do medo, e não a ausência do medo.<br>Mark Twain
              </p>
            </div>
          </div>
        </div>
    </div><br><br><br>
    <b>
      <h2 class="text-center">essas são suas metas para alcançar seu objetivo</h2>
    </b>
    <b>
      <h3>Metas já registradas</h3>
    </b><br>
    <div class="table-wrapper">
      <div style="display: flex; justify-content: space-evenly;">

        <!-- 12 meses -->

        <!-- saude -->
        <section class="list cores1" style="background:#00a8ff80;">
          <header>Objetivos: 12 meses (Saúde)</header>
          <article class="card" id='abrir_dialogSaude'>
            <ul>
              <li>
                <?php echo "$metaSaude1"; ?>
                <input type="checkbox" <?php echo ($feitoSaude1 == 'on') ? 'checked' : '' ?> disabled>
              </li>
              <br>
              <li>
                <?php echo "$metaSaude2"; ?>
                <input type="checkbox" <?php echo ($feitoSaude2 == 'on') ? 'checked' : '' ?> disabled>
              </li>
              <br>
              <li>
                <?php echo "$metaSaude3"; ?>
                <input type="checkbox" <?php echo ($feitoSaude3 == 'on') ? 'checked' : '' ?> disabled>
              </li>
              <br>
              <li>
                <?php echo "$metaSaude4"; ?>
                <input type="checkbox" <?php echo ($feitoSaude4 == 'on') ? 'checked' : '' ?> disabled>
              </li>
              <br>
              <li>
                <?php echo "$metaSaude5"; ?>
                <input type="checkbox" <?php echo ($feitoSaude5 == 'on') ? 'checked' : '' ?> disabled>
              </li>
            </ul>
            <dialog id="dialog_saude">
              <form action="meta.php" method="post" name="forms">
                <h2 id='titulo_dialog'>Metas sobre Saúde</h2><br>
                <ul>
                  <li>
                    <form action="meta.php" method="post">
                      <?php echo "$metaSaude1"; ?>
                      <input type="checkbox" <?php echo ($feitoSaude1 == 'on') ? 'checked' : '' ?> name="feito1">
                  </li>
                  <br>
                  <li>
                    <?php echo "$metaSaude2"; ?>
                    <input type="checkbox" <?php echo ($feitoSaude2 == 'on') ? 'checked' : '' ?> name="feito2">
                  </li>
                  <br>
                  <li>
                    <?php echo "$metaSaude3"; ?>
                    <input type="checkbox" <?php echo ($feitoSaude3 == 'on') ? 'checked' : '' ?> name="feito3">
                  </li>
                  <br>
                  <li>
                    <?php echo "$metaSaude4"; ?>
                    <input type="checkbox" <?php echo ($feitoSaude4 == 'on') ? 'checked' : '' ?> name="feito4">
                  </li>
                  <br>
                  <li>
                    <?php echo "$metaSaude5"; ?>
                    <input type="checkbox" <?php echo ($feitoSaude5 == 'on') ? 'checked' : '' ?> name="feito5">
                  </li>
                </ul>
                <br><br>
                <input type="hidden" name="cod" value="<?php echo $cod ?>">
                <input type="submit" class="btn" class="enviar_forms" value="Ok" name="submit_Saude"
                  id='fechar_dialogSaude'>
              </form>
            </dialog>
          </article>

        </section>

        <!-- relacionamento -->
        <section class="list cores2" style="background:#9c88ff75;">
          <header>Objetivos: 12 meses (Relacionamentos)</header>
          <article class="card" id='abrir_dialogRelacionamento'>
            <ul>
              <li>
                <form action="meta.php" method="post">
                  <?php echo "$metaRelacionamento1"; ?>
                  <input type="checkbox" <?php echo ($feitoRelacionamento1 == 'on') ? 'checked' : '' ?> disabled>
                </form>
              </li>
              <br>
              <li>
                <?php echo "$metaRelacionamento2"; ?>
                <input type="checkbox" <?php echo ($feitoRelacionamento2 == 'on') ? 'checked' : '' ?> disabled>
              </li>
              <br>
              <li>
                <?php echo "$metaRelacionamento3"; ?>
                <input type="checkbox" <?php echo ($feitoRelacionamento3 == 'on') ? 'checked' : '' ?> disabled>
              </li>
              <br>
              <li>
                <?php echo "$metaRelacionamento4"; ?>
                <input type="checkbox" <?php echo ($feitoRelacionamento4 == 'on') ? 'checked' : '' ?> disabled>
              </li>
              <br>
              <li>
                <?php echo "$metaRelacionamento5"; ?>
                <input type="checkbox" <?php echo ($feitoRelacionamento5 == 'on') ? 'checked' : '' ?> disabled>
              </li>
            </ul>
            <dialog id="dialog_relacionamento">
              <form action="meta.php" method="post" name="forms">
                <h2 id='titulo_dialog'>Metas sobre Relacionamento</h2><br>
                <ul>
                  <li>
                    <form action="meta.php" method="post">
                      <?php echo "$metaRelacionamento1"; ?>
                      <input type="checkbox" <?php echo ($feitoRelacionamento1 == 'on') ? 'checked' : '' ?> name="feito1">
                  </li>
                  <br>
                  <li>
                    <?php echo "$metaRelacionamento2"; ?>
                    <input type="checkbox" <?php echo ($feitoRelacionamento2 == 'on') ? 'checked' : '' ?> name="feito2">
                  </li>
                  <br>
                  <li>
                    <?php echo "$metaRelacionamento3"; ?>
                    <input type="checkbox" <?php echo ($feitoRelacionamento3 == 'on') ? 'checked' : '' ?> name="feito3">
                  </li>
                  <br>
                  <li>
                    <?php echo "$metaRelacionamento4"; ?>
                    <input type="checkbox" <?php echo ($feitoRelacionamento4 == 'on') ? 'checked' : '' ?> name="feito4">
                  </li>
                  <br>
                  <li>
                    <?php echo "$metaRelacionamento5"; ?>
                    <input type="checkbox" <?php echo ($feitoRelacionamento5 == 'on') ? 'checked' : '' ?> name="feito5">
                  </li>
                </ul>
                <br><br>
                <input type="hidden" name="cod" value="<?php echo $cod ?>">
                <input type="submit" class="btn" class="enviar_forms" value="Ok" name="submit_relacionamento"
                  id='fechar_dialogRelacionamento'>
              </form>
            </dialog>
          </article>
        </section>

        <!-- Trabalho -->
        <section class="list cores3" style="background:#fbc53173">
          <header>Objetivos: 12 meses (Trabalho)</header>
          <article class="card" id='abrir_dialogTrabalho'>
            <ul>
              <li>
                <?php echo "$metaTrabalho1"; ?>
                <input type="checkbox" <?php echo ($feitoTrabalho1 == 'on') ? 'checked' : '' ?> disabled>
              </li>
              <br>
              <li>
                <?php echo "$metaTrabalho2"; ?>
                <input type="checkbox" <?php echo ($feitoTrabalho2 == 'on') ? 'checked' : '' ?> disabled>
              </li>
              <br>
              <li>
                <?php echo "$metaTrabalho3"; ?>
                <input type="checkbox" <?php echo ($feitoTrabalho3 == 'on') ? 'checked' : '' ?> disabled>
              </li>
              <br>
              <li>
                <?php echo "$metaTrabalho4"; ?>
                <input type="checkbox" <?php echo ($feitoTrabalho4 == 'on') ? 'checked' : '' ?> disabled>
              </li>
              <br>
              <li>
                <?php echo "$metaTrabalho5"; ?>
                <input type="checkbox" <?php echo ($feitoTrabalho5 == 'on') ? 'checked' : '' ?> disabled>
              </li>
            </ul>
            <dialog id="dialog_trabalho">
              <form action="meta.php" method="post" name="forms">
                <h2 id='titulo_dialog'>Metas sobre Trabalho</h2><br>
                <ul>
                  <li>
                    <form action="meta.php" method="post">
                      <?php echo "$metaTrabalho1"; ?>
                      <input type="checkbox" <?php echo ($feitoTrabalho1 == 'on') ? 'checked' : '' ?> name="feito1">
                  </li>
                  <br>
                  <li>
                    <?php echo "$metaTrabalho2"; ?>
                    <input type="checkbox" <?php echo ($feitoTrabalho2 == 'on') ? 'checked' : '' ?> name="feito2">
                  </li>
                  <br>
                  <li>
                    <?php echo "$metaTrabalho3"; ?>
                    <input type="checkbox" <?php echo ($feitoTrabalho3 == 'on') ? 'checked' : '' ?> name="feito3">
                  </li>
                  <br>
                  <li>
                    <?php echo "$metaTrabalho4"; ?>
                    <input type="checkbox" <?php echo ($feitoTrabalho4 == 'on') ? 'checked' : '' ?> name="feito4">
                  </li>
                  <br>
                  <li>
                    <?php echo "$metaTrabalho5"; ?>
                    <input type="checkbox" <?php echo ($feitoTrabalho5 == 'on') ? 'checked' : '' ?> name="feito5">
                  </li>
                </ul>
                <br><br>
                <input type="hidden" name="cod" value="<?php echo $cod ?>">
                <input type="submit" class="btn" class="enviar_forms" value="Ok" name="submit_Trabalho"
                  id='fechar_dialogTrabalho'>
              </form>
            </dialog>
          </article>
        </section>

        <!-- Dinheiro -->
        <section class="list cores4" style="background:#4cd13773">
          <header>Objetivos: 12 meses (Dinheiro)</header>
          <article class="card" id='abrir_dialogDinheiro'>
            <ul>
              <li>
                <?php echo "$metaDinheiro1"; ?>
                <input type="checkbox" <?php echo ($feitoDinheiro1 == 'on') ? 'checked' : '' ?> disabled>
              </li>
              <br>
              <li>
                <?php echo "$metaDinheiro2"; ?>
                <input type="checkbox" <?php echo ($feitoDinheiro2 == 'on') ? 'checked' : '' ?> disabled>
              </li>
              <br>
              <li>
                <?php echo "$metaDinheiro3"; ?>
                <input type="checkbox" <?php echo ($feitoDinheiro3 == 'on') ? 'checked' : '' ?> disabled>
              </li>
              <br>
              <li>
                <?php echo "$metaDinheiro4"; ?>
                <input type="checkbox" <?php echo ($feitoDinheiro4 == 'on') ? 'checked' : '' ?> disabled>
              </li>
              <br>
              <li>
                <?php echo "$metaDinheiro5"; ?>
                <input type="checkbox" <?php echo ($feitoDinheiro5 == 'on') ? 'checked' : '' ?> disabled>
              </li>
            </ul>
            <dialog id="dialog_dinheiro">
              <form action="meta.php" method="post" name="forms">
                <h2 id='titulo_dialog'>Metas sobre Dinheiro</h2><br>
                <ul>
                  <li>
                    <form action="meta.php" method="post">
                      <?php echo "$metaDinheiro1"; ?>
                      <input type="checkbox" <?php echo ($feitoDinheiro1 == 'on') ? 'checked' : '' ?> name="feito1">
                  </li>
                  <br>
                  <li>
                    <?php echo "$metaDinheiro2"; ?>
                    <input type="checkbox" <?php echo ($feitoDinheiro2 == 'on') ? 'checked' : '' ?> name="feito2">
                  </li>
                  <br>
                  <li>
                    <?php echo "$metaDinheiro3"; ?>
                    <input type="checkbox" <?php echo ($feitoDinheiro3 == 'on') ? 'checked' : '' ?> name="feito3">
                  </li>
                  <br>
                  <li>
                    <?php echo "$metaDinheiro4"; ?>
                    <input type="checkbox" <?php echo ($feitoDinheiro4 == 'on') ? 'checked' : '' ?> name="feito4">
                  </li>
                  <br>
                  <li>
                    <?php echo "$metaDinheiro5"; ?>
                    <input type="checkbox" <?php echo ($feitoDinheiro5 == 'on') ? 'checked' : '' ?> name="feito5">
                  </li>
                </ul>
                <br><br>
                <input type="hidden" name="cod" value="<?php echo $cod ?>">
                <input type="submit" class="btn" class="enviar_forms" value="Ok" name="submit_Dinheiro"
                  id='fechar_dialogDinheiro'>
              </form>
            </dialog>
          </article>
        </section>

        <!-- Outro -->
        <section class="list cores5" style="background:#487eb070;">
          <header>Objetivos: 12 meses (Demais objetivos)</header>
          <article class="card" id='abrir_dialogOutro'>
            <ul>
              <li>
                <?php echo "$metaOutro1"; ?>
                <input type="checkbox" <?php echo ($feitoOutro1 == 'on') ? 'checked' : '' ?> disabled>
              </li>
              <br>
              <li>
                <?php echo "$metaOutro2"; ?>
                <input type="checkbox" <?php echo ($feitoOutro2 == 'on') ? 'checked' : '' ?> disabled>
              </li>
              <br>
              <li>
                <?php echo "$metaOutro3"; ?>
                <input type="checkbox" <?php echo ($feitoOutro3 == 'on') ? 'checked' : '' ?> disabled>
              </li>
              <br>
              <li>
                <?php echo "$metaOutro4"; ?>
                <input type="checkbox" <?php echo ($feitoOutro4 == 'on') ? 'checked' : '' ?> disabled>
              </li>
              <br>
              <li>
                <?php echo "$metaOutro5"; ?>
                <input type="checkbox" <?php echo ($feitoOutro5 == 'on') ? 'checked' : '' ?> disabled>
              </li>
            </ul>
            <dialog id="dialog_outro">
              <form action="meta.php" method="post" name="forms">
                <h2 id='titulo_dialog'>Metas sobre Outro</h2><br>
                <ul>
                  <li>
                    <form action="meta.php" method="post">
                      <?php echo "$metaOutro1"; ?>
                      <input type="checkbox" <?php echo ($feitoOutro1 == 'on') ? 'checked' : '' ?> name="feito1">
                  </li>
                  <br>
                  <li>
                    <?php echo "$metaOutro2"; ?>
                    <input type="checkbox" <?php echo ($feitoOutro2 == 'on') ? 'checked' : '' ?> name="feito2">
                  </li>
                  <br>
                  <li>
                    <?php echo "$metaOutro3"; ?>
                    <input type="checkbox" <?php echo ($feitoOutro3 == 'on') ? 'checked' : '' ?> name="feito3">
                  </li>
                  <br>
                  <li>
                    <?php echo "$metaOutro4"; ?>
                    <input type="checkbox" <?php echo ($feitoOutro4 == 'on') ? 'checked' : '' ?> name="feito4">
                  </li>
                  <br>
                  <li>
                    <?php echo "$metaOutro5"; ?>
                    <input type="checkbox" <?php echo ($feitoOutro5 == 'on') ? 'checked' : '' ?> name="feito5">
                  </li>
                </ul>
                <br><br>
                <input type="hidden" name="cod" value="<?php echo $cod ?>">
                <input type="submit" class="btn" class="enviar_forms" value="Ok" name="submit_Outro"
                  id='fechar_dialogOutro'>
              </form>
            </dialog>
          </article>
        </section>

      </div>
    </div>
    <br><br><br>
    <h2 style="text-align: center;"><b>Conclusão das metas</b></h2 style="text-align: center;"> <br><br><br>

    <div class="conteiner">
      <div class="row" style="justify-content: space-evenly; display: flex;">

        <?php
        if ($x > 0) {
          echo "<div class='col-4 a'>
            <h2 style='text-align:center'>Conclusão por meta</h2>
            <canvas id='metas-todas'></canvas><br>

            <div style='display: inline-flex;color: red;'>
            <i class='fa-solid fa-lightbulb fa-xl'></i><p style='color: black; text-align:center'>Este gráfico serve para ver o total de metas. Ex: 
            se você tem 5 metas de saúde e concluiu as 5, então você concluiu todas as metas de saúde.</p>
            </div>
          </div>";

          echo "<div class='col-4 r'>
            <h2 style='text-align:center'>% de conclusão por meta</h2>
            <canvas id='metas-percent'></canvas><br>

            <div style='display: inline-flex;color: red;'>
            <i class='fa-solid fa-lightbulb fa-xl'></i><p style='color: black; text-align:center'>% por cada meta. Ex: se você tem 5 metas de saude 
            e concluiu três então você concluiu 60% das metas de saúde</p>
            </div>
          </div>";
        }
        ?>
      </div><br><br><br>
      <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
      <script src="assets/js/style-trelo.js"></script>
      <script>
        new Chart(
          document.getElementById('metas-percent'), {
          type: 'doughnut',
          data: {
            labels: ['Saúde', 'Relacionamento', 'Trabalho', 'Dinheiro', 'Outro',],
            datasets: [{
              label: 'Metas (%)',
              data: [<?= number_format($saude2, 2, '.', '') ?>, <?= number_format($relacionamento2, 2, '.', '') ?>, <?= number_format($trabalho2, 2, '.', '') ?>, <?= number_format($dinheiro2, 2, '.', '') ?>, <?= number_format($outro2, 2, '.', '') ?>],


              backgroundColor: [
                '#00a8ff',
                '#9c88ff',
                '#fbc531',
                '#4cd137',
                '#487eb0',
              ],
              hoverBackgroundColor: [
                '#00a8ff',
                '#9c88ff',
                '#fbc531',
                '#4cd137',
                '#487eb0',
              ],
              borderColor: [
                '#fff',
              ],
              borderWidth: 1,
              hoverBorderWidth: 10,
            }]
          },
          options: {
            scales: {
              indexAxis: 'x'
            }
          }
        });

        new Chart(
          document.getElementById('metas-todas'), {
          type: 'doughnut',
          data: {
            labels: ['Saúde', 'Relacionamento', 'Trabalho', 'Dinheiro', 'Outro',],
            datasets: [{
              label: 'Metas',
              data: [<?= $saude ?>, <?= $relacionamento ?>, <?= $trabalho ?>, <?= $dinheiro ?>, <?= $outro ?>],
              backgroundColor: [
                '#00a8ff',
                '#9c88ff',
                '#fbc531',
                '#4cd137',
                '#487eb0',
              ],
              hoverBackgroundColor: [
                '#00a8ff',
                '#9c88ff',
                '#fbc531',
                '#4cd137',
                '#487eb0',
              ],
              borderColor: [
                '#fff',
              ],
              borderWidth: 1,
              hoverBorderWidth: 10,
            }]
          },
          options: {
            scales: {
              indexAxis: 'x'
            }
          }
        });
      </script>
      <br><br><br>


    </div>
    <!--Container Main end-->

    <script>
      function confirmaSair() {
        var confirma = confirm("<?php echo $nome ?>, tem certeza que deseja encerrar a sessão?");
        if (confirma == true) {
          window.location.href = "http://localhost/Coach-System-/sair.php";

        }
      };
    </script>

    <script>
      /* relacioanamento */
      const buttonRelacionamento = document.querySelector("#abrir_dialogRelacionamento");
      const modalRelacionamento = document.querySelector("#dialog_relacionamento");
      const buttonCloseRelacionamento = document.querySelector("dialog #fechar_dialogRelacionamento");
      buttonRelacionamento.onclick = function () {
        modalRelacionamento.showModal();
      };
      buttonCloseRelacionamento.onclick = function () {
        modalRelacionamento.closeModal();
      };
      /* saúde */
      const buttonSaude = document.querySelector("#abrir_dialogSaude");
      const modalSaude = document.querySelector("#dialog_saude");
      const buttonCloseSaude = document.querySelector("dialog #fechar_dialogSaude");
      buttonSaude.onclick = function () {
        modalSaude.showModal();
      };
      buttonCloseSaude.onclick = function () {
        modalSaude.closeModal();
      };
      /* trabalho */
      const buttonTrabalho = document.querySelector("#abrir_dialogTrabalho");
      const modalTrabalho = document.querySelector("#dialog_trabalho");
      const buttonCloseTrabalho = document.querySelector("dialog #fechar_dialogTrabalho");
      buttonTrabalho.onclick = function () {
        modalTrabalho.showModal();
      };
      buttonCloseTrabalho.onclick = function () {
        modalTrabalho.closeModal();
      };
      /* dinheiro */
      const buttonDinheiro = document.querySelector("#abrir_dialogDinheiro");
      const modalDinheiro = document.querySelector("#dialog_dinheiro");
      const buttonCloseDinheiro = document.querySelector("dialog #fechar_dialogDinheiro");
      buttonDinheiro.onclick = function () {
        modalDinheiro.showModal();
      };
      buttonCloseDinheiro.onclick = function () {
        modalDinheiro.closeModal();
      };
      /* outro */
      const buttonOutro = document.querySelector("#abrir_dialogOutro");
      const modalOutro = document.querySelector("#dialog_outro");
      const buttonCloseOutro = document.querySelector("dialog #fechar_dialogOutro");
      buttonOutro.onclick = function () {
        modalOutro.showModal();
      };
      buttonCloseOutro.onclick = function () {
        modalOutro.closeModal();
      };
    </script>
    <script type='text/javascript'
      src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js'></script>
    <script type='text/javascript'>
      document.addEventListener("DOMContentLoaded", function (event) {

        const showNavbar = (toggleId, navId, bodyId, headerId) => {
          const toggle = document.getElementById(toggleId),
            nav = document.getElementById(navId),
            bodypd = document.getElementById(bodyId),
            headerpd = document.getElementById(headerId)

          // Validate that all variables exist
          if (toggle && nav && bodypd && headerpd) {
            toggle.addEventListener('click', () => {
              // show navbar
              nav.classList.toggle('show')
              // change icon
              toggle.classList.toggle('bx-x')
              // add padding to body
              bodypd.classList.toggle('body-pd')
              // add padding to header
              headerpd.classList.toggle('body-pd')
            })
          }
        }

        showNavbar('header-toggle', 'nav-bar', 'body-pd', 'header')

        /*===== LINK ACTIVE =====*/
        const linkColor = document.querySelectorAll('.nav_link')

        function colorLink() {
          if (linkColor) {
            linkColor.forEach(l => l.classList.remove('active'))
            this.classList.add('active')
          }
        }
        linkColor.forEach(l => l.addEventListener('click', colorLink))

        // Your code to run since DOM is loaded and ready
      });
    </script>
    <script type='text/javascript'>
      var myLink = document.querySelector('a[href="#"]');
      myLink.addEventListener('click', function (e) {
        e.preventDefault();
      });


    </script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js'></script>
    <script src="assets/js/carousel_img.js"></script>

  </body>

</html>