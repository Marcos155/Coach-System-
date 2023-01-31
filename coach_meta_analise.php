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
    header('Location: sistema_metas_coach.php');
  }
} else {
  header('Location: sistema_metas_coach.php');
}


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
  $total_XY_porce = $x + $y;
  $x_percent = ($x * 100) / $total_XY_porce;
} else {
  $x_percent = 0;
}
?>
<!doctype html>
<html>

<head>
  <meta charset='utf-8'>
  <meta name='viewport' content='width=device-width, initial-scale=1'>
  <link rel="shortcut icon" href="assets/images/favico.png" type="image/x-icon">
  <title>Meta-Alunos</title>
  <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css' rel='stylesheet'>
  <link href='https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css' rel='stylesheet'>
  <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
  <script defer src=https://kit.fontawesome.com/79b5047e4f.js crossorigin="anonymous"></script>
  <link rel="stylesheet" href="assets/css/nav.css">
  <link rel="stylesheet" href="assets/css/style-trelo.css">
  <style>
    .table-wrapper {
      max-height: 500px;
      overflow-y: auto;
    }

    .box-search {
      display: flex;
      justify-content: center;
      gap: .1%;
    }

    #pesquisar:focus {
      border-color: rgba(0, 0, 0, 0.4);
      box-shadow: none;
    }

    body {
      background-image: linear-gradient(to right, #f5f5f5 35%, rgb(202, 202, 202));
      background-attachment: fixed;
    }

    .btn {
      background: #000;
      color: #fff;
      outline: none;
      border: none;
    }

    .btn:hover {
      background-color: #f01e1e;
      color: rgb(247, 247, 247);
      transition: all 0.3s;
      border: none;
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
      background: #000;
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
      background-color: #000;
      border-radius: 2px;
    }

    h5 {
      text-indent: 1.6rem;
    }

    input {
      border-radius: 20px;
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

    @media (max-width: 600px) {
      .r {
        width: 50%;
      }
    }

    @media (max-width: 600px) {
      .a {
        width: 41% !important;
      }
    }
  </style>
</head>

<body className='snippet-body' style="background-color:#f8f9fa">

  <body id="body-pd">
    <header class="header" id="header">
      <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle" style="color:black"></i> </div>
    </header>
    <div class="l-navbar" id="nav-bar" style="background-color: darkgray;">
      <nav class="nav">
        <div> <a href="#" class="nav_logo"> <i class='bx bx-layer nav_logo-icon' style="color:black"></i> <span class="nav_logo-name" style="color:black"> <?php
                                                                                                                                                            echo "Administração" ?></span> </a>
          <div class="nav_list">
            <?php

            echo "<a href='sistema.php' class='nav_link'> <i class='bx bx-user nav_icon'></i>
              <span class='nav_name'>Conta-Alunos</span> </a>";

            echo "<a href='sistema_coach_forms.php' class='nav_link'> <i
              class='bx bx-message-square-detail nav_icon'></i> <span class='nav_name'>Formulário-Alunos</span> </a>";

            echo "<a href='sistema_metas_coach.php' class='nav_link active'> <i class='bx bxs-doughnut-chart'></i> <span class='nav_name'>Metas-Alunos</span></a>";

            echo "<a href='turmas.php' class='nav_link'><svg xmlns='http://www.w3.org/2000/svg' width='1.3em' height='1.3em' viewBox='0 0 24 24'><path fill='currentColor' d='M22 9V7h-2v2h-2v2h2v2h2v-2h2V9zM8 12c2.21 0 4-1.79 4-4s-1.79-4-4-4s-4 1.79-4 4s1.79 4 4 4zm0 1c-2.67 0-8 1.34-8 4v3h16v-3c0-2.66-5.33-4-8-4zm4.51-8.95C13.43 5.11 14 6.49 14 8s-.57 2.89-1.49 3.95C14.47 11.7 16 10.04 16 8s-1.53-3.7-3.49-3.95zm4.02 9.78C17.42 14.66 18 15.7 18 17v3h2v-3c0-1.45-1.59-2.51-3.47-3.17z'/></svg>
              <span class='nav_name'>Turmas</span></a>";

            echo "<a href='gerarQRCode.php' class='nav_link'> <svg xmlns='http://www.w3.org/2000/svg' width='20px' height='20px' preserveAspectRatio='xMidYMid meet' 
              viewBox='0 0 32 32'><path fill='currentColor' d='M5 5v8h2v2h2v-2h4V5H5zm8 8v2h2v2h-4v2H5v8h8v-8h6v-2h-2v-2h4v-2h2v2h2v-2h2V5h-8v8h-6zm12 2v2h2v-2h-2zm0 2h-2v2h2v-2zm0 2v2h2v-2h-2zm0 2h-2v-2h-2v2h-5v6h2v-4h4v2h2v-2h1v-2zm-3 4h-2v2h2v-2zm1-8v-2h-2v2h2zm-12 0v-2H9v2h2zm-4-2H5v2h2v-2zm8-10v4h-1v2h1v1h2V9h1V7h-1V5h-2zM7 7h4v4H7V7zm14 0h4v4h-4V7zM8 8v2h2V8H8zm14 0v2h2V8h-2zM7 21h4v4H7v-4zm1 1v2h2v-2H8zm17 3v2h2v-2h-2z'/></svg>
               <span class='nav_name'>Gerar QR Code</span> </a>";

            echo "<a href='edit_coach_regis.php' class='nav_link'> <svg xmlns='http://www.w3.org/2000/svg' width='1em' height='1em' viewBox='0 0 24 24'><path fill='none' stroke='currentColor' stroke-width='2' d='M16 15c4.009-.065 7-3.033 
               7-7c0-3.012-.997-2.015-2-1c-.991.98-3 3-3 3l-4-4s2.02-2.009 3-3c1.015-1.003 1.015-2-1-2c-3.967 0-6.947 2.991-7 7c.042.976 0 3 0 3c-1.885 1.897-4.34 4.353-6 6c-2.932 2.944 1.056 6.932 4 4c1.65-1.662 4.113-4.125 6-6c0 0 2.024-.042 3 0Z'/></svg>
               <span class='nav_name'>Alterar cadastro</span> </a>";
            ?>
          </div>
        </div> <a href="#" class="nav_link"> <i class='bx bx-log-out nav_icon' onclick="confirmaSair()"></i> <span class="nav_name">Sair</span>
        </a>
      </nav>
    </div>
    <!--Container Main start-->
    <div>
      <p>Analise do <b>andamento das metas</b> do aluno(a)</b>
      <h2><?php echo "<b> <big>$nome</big></b>"; ?></h2>
      </p>
      <br><br>
      <p><b>Porcentagem</b> de conclusão aluno(a)</b>
      <h2><?php echo "<b> <big>$nome</big></b>"; ?>: <?php echo number_format($x_percent, 2, '.', ''); ?>%</h2>
      </p>
      <br><br>
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
                <form action="" method="post">
                  <h2 id='titulo_dialog'>Metas sobre Saúde</h2><br>
                  <ul>
                    <li>
                      <?php echo "$metaSaude1"; ?>
                      <input type="checkbox" <?php echo ($feitoSaude1 == 'on') ? 'checked' : '' ?> name="feito1" disabled>
                    </li>
                    <br>
                    <li>
                      <?php echo "$metaSaude2"; ?>
                      <input type="checkbox" <?php echo ($feitoSaude2 == 'on') ? 'checked' : '' ?> name="feito2" disabled>
                    </li>
                    <br>
                    <li>
                      <?php echo "$metaSaude3"; ?>
                      <input type="checkbox" <?php echo ($feitoSaude3 == 'on') ? 'checked' : '' ?> name="feito3" disabled>
                    </li>
                    <br>
                    <li>
                      <?php echo "$metaSaude4"; ?>
                      <input type="checkbox" <?php echo ($feitoSaude4 == 'on') ? 'checked' : '' ?> name="feito4" disabled>
                    </li>
                    <br>
                    <li>
                      <?php echo "$metaSaude5"; ?>
                      <input type="checkbox" <?php echo ($feitoSaude5 == 'on') ? 'checked' : '' ?> name="feito5" disabled>
                    </li>
                  </ul>
                  <br><br>
                  <input type="submit" class="btn" class="enviar_forms" value="Ok" name="submit_Saude" id='fechar_dialogSaude'>
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
                  <?php echo "$metaRelacionamento1"; ?>
                  <input type="checkbox" <?php echo ($feitoRelacionamento1 == 'on') ? 'checked' : '' ?> disabled>
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
                <h2 id='titulo_dialog'>Metas sobre Relacionamento</h2><br>
                <ul>
                  <li>
                    <form action="" method="post">
                      <?php echo "$metaRelacionamento1"; ?>
                      <input type="checkbox" <?php echo ($feitoRelacionamento1 == 'on') ? 'checked' : '' ?> name="feito1" disabled>
                  </li>
                  <br>
                  <li>
                    <?php echo "$metaRelacionamento2"; ?>
                    <input type="checkbox" <?php echo ($feitoRelacionamento2 == 'on') ? 'checked' : '' ?> name="feito2" disabled>
                  </li>
                  <br>
                  <li>
                    <?php echo "$metaRelacionamento3"; ?>
                    <input type="checkbox" <?php echo ($feitoRelacionamento3 == 'on') ? 'checked' : '' ?> name="feito3" disabled>
                  </li>
                  <br>
                  <li>
                    <?php echo "$metaRelacionamento4"; ?>
                    <input type="checkbox" <?php echo ($feitoRelacionamento4 == 'on') ? 'checked' : '' ?> name="feito4" disabled>
                  </li>
                  <br>
                  <li>
                    <?php echo "$metaRelacionamento5"; ?>
                    <input type="checkbox" <?php echo ($feitoRelacionamento5 == 'on') ? 'checked' : '' ?> name="feito5" disabled>
                  </li>
                </ul>
                <br><br>
                <input type="submit" class="btn" class="enviar_forms" value="Ok" name="submit_relacionamento" id='fechar_dialogRelacionamento'>
                </form>
              </dialog>
            </article>
          </section>

          <!-- Trabalho -->
          <section class="list cores3 " style="background:#fbc53173">
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
                <h2 id='titulo_dialog'>Metas sobre Trabalho</h2><br>
                <ul>
                  <li>
                    <form action="" method="post">
                      <?php echo "$metaTrabalho1"; ?>
                      <input type="checkbox" <?php echo ($feitoTrabalho1 == 'on') ? 'checked' : '' ?> name="feito1" disabled>
                  </li>
                  <br>
                  <li>
                    <?php echo "$metaTrabalho2"; ?>
                    <input type="checkbox" <?php echo ($feitoTrabalho2 == 'on') ? 'checked' : '' ?> name="feito2" disabled>
                  </li>
                  <br>
                  <li>
                    <?php echo "$metaTrabalho3"; ?>
                    <input type="checkbox" <?php echo ($feitoTrabalho3 == 'on') ? 'checked' : '' ?> name="feito3" disabled>
                  </li>
                  <br>
                  <li>
                    <?php echo "$metaTrabalho4"; ?>
                    <input type="checkbox" <?php echo ($feitoTrabalho4 == 'on') ? 'checked' : '' ?> name="feito4" disabled>
                  </li>
                  <br>
                  <li>
                    <?php echo "$metaTrabalho5"; ?>
                    <input type="checkbox" <?php echo ($feitoTrabalho5 == 'on') ? 'checked' : '' ?> name="feito5" disabled>
                  </li>
                </ul>
                <br><br>
                <input type="submit" class="btn" class="enviar_forms" value="Ok" name="submit_Trabalho" id='fechar_dialogTrabalho'>
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
                <h2 id='titulo_dialog'>Metas sobre Dinheiro</h2><br>
                <ul>
                  <li>
                    <form action="" method="post">
                      <?php echo "$metaDinheiro1"; ?>
                      <input type="checkbox" <?php echo ($feitoDinheiro1 == 'on') ? 'checked' : '' ?> name="feito1" disabled>
                  </li>
                  <br>
                  <li>
                    <?php echo "$metaDinheiro2"; ?>
                    <input type="checkbox" <?php echo ($feitoDinheiro2 == 'on') ? 'checked' : '' ?> name="feito2" disabled>
                  </li>
                  <br>
                  <li>
                    <?php echo "$metaDinheiro3"; ?>
                    <input type="checkbox" <?php echo ($feitoDinheiro3 == 'on') ? 'checked' : '' ?> name="feito3" disabled>
                  </li>
                  <br>
                  <li>
                    <?php echo "$metaDinheiro4"; ?>
                    <input type="checkbox" <?php echo ($feitoDinheiro4 == 'on') ? 'checked' : '' ?> name="feito4" disabled>
                  </li>
                  <br>
                  <li>
                    <?php echo "$metaDinheiro5"; ?>
                    <input type="checkbox" <?php echo ($feitoDinheiro5 == 'on') ? 'checked' : '' ?> name="feito5" disabled>
                  </li>
                </ul>
                <br><br>
                <input type="submit" class="btn" class="enviar_forms" value="Ok" name="submit_Dinheiro" id='fechar_dialogDinheiro'>
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
                <h2 id='titulo_dialog'>Metas sobre Outro</h2><br>
                <ul>
                  <li>
                    <form action="" method="post">
                      <?php echo "$metaOutro1"; ?>
                      <input type="checkbox" <?php echo ($feitoOutro1 == 'on') ? 'checked' : '' ?> name="feito1" disabled>
                  </li>
                  <br>
                  <li>
                    <?php echo "$metaOutro2"; ?>
                    <input type="checkbox" <?php echo ($feitoOutro2 == 'on') ? 'checked' : '' ?> name="feito2" disabled>
                  </li>
                  <br>
                  <li>
                    <?php echo "$metaOutro3"; ?>
                    <input type="checkbox" <?php echo ($feitoOutro3 == 'on') ? 'checked' : '' ?> name="feito3" disabled>
                  </li>
                  <br>
                  <li>
                    <?php echo "$metaOutro4"; ?>
                    <input type="checkbox" <?php echo ($feitoOutro4 == 'on') ? 'checked' : '' ?> name="feito4" disabled>
                  </li>
                  <br>
                  <li>
                    <?php echo "$metaOutro5"; ?>
                    <input type="checkbox" <?php echo ($feitoOutro5 == 'on') ? 'checked' : '' ?> name="feito5" disabled>
                  </li>
                </ul>
                <br><br>
                <input type="submit" class="btn" class="enviar_forms" value="Ok" name="submit_Outro" id='fechar_dialogOutro'>
                </form>
              </dialog>
            </article>
          </section>

        </div>
      </div>
      <br><br><br>
      <h2 style="text-align: center;"><b>Conclusão das metas <?php echo $nome ?></b></h2 style="text-align: center;"><br><br><br>
      <div class="conteiner">
        <div class="row" style="justify-content: space-evenly; display: flex;">

          <?php
          if ($x > 0) {
            echo "
          <div class='col-4 a'>
            <h2 style='text-align:center'>>Conclusão de todas as metas</h2>
            <canvas id='conclusao'></canvas><br>
            <div style='display: inline-flex;color: red;'>
            <i class='fa-solid fa-lightbulb fa-xl'></i><p style='color: black; text-align:center'>Este gráfico serve para exibir quantas metas o aluno concluiu, e 
            quantas ainda faltam no total de todas as categorias</p>
            </div>
          </div>";
          }
          ?>
          <?php
          if ($x > 0) {
            echo "<div class='col-4 r'>
            <h2 style='text-align:center'>>Conclusão por metas</h2>
            <canvas id='metas-todas'></canvas><br>
            <div style='display: inline-flex;color: red;'>
            <i class='fa-solid fa-lightbulb fa-xl'></i>
            <p style='color: black; text-align:center'>Este gráfico serve para exibir quantas metas o aluno concluiu, separadas por categoria</p>
            </div>
          </div>";
          }
          ?>
        </div>
        <br><br><br>
      </div>
      <br><br><br>
      <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
      <script src="assets/js/style-trelo.js"></script>
      <script>
        new Chart(
          document.getElementById('metas-todas'), {
            type: 'doughnut',
            data: {
              labels: ['Saúde', 'Relacionamento', 'Trabalho', 'Dinheiro', 'Outro', ],
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

        new Chart(
          document.getElementById('conclusao'), {
            type: 'doughnut',
            data: {
              labels: ['Falta concluir', 'Concluído' ///
              ],
              datasets: [{
                label: 'Metas',
                data: [<?= $y ?>, <?= $x ?>], ///trazer os dados de conclusão das anotações, numero 6  é o falta concluir  

                backgroundColor: [
                  '#00b894',
                  '#0984e3',
                  '#ff9f40',
                  '#4bc0c06e',
                  '#FA8072',
                ],
                hoverBackgroundColor: [
                  '#00b894',
                  '#0984e3',
                  '#ff9f40',
                  '#4bc0c06e',
                  '#FA8072',
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
                indexAxis: 'x',
              }
            }
          });
      </script>

    </div>
    <!--Container Main end-->


    <script>
      function confirmaSair() {
        var confirma = confirm("André, tem certeza que deseja encerrar a sessão?");
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
      buttonRelacionamento.onclick = function() {
        modalRelacionamento.showModal();
      };
      buttonCloseRelacionamento.onclick = function() {
        modalRelacionamento.closeModal();
      };
      /* saúde */
      const buttonSaude = document.querySelector("#abrir_dialogSaude");
      const modalSaude = document.querySelector("#dialog_saude");
      const buttonCloseSaude = document.querySelector("dialog #fechar_dialogSaude");
      buttonSaude.onclick = function() {
        modalSaude.showModal();
      };
      buttonCloseSaude.onclick = function() {
        modalSaude.closeModal();
      };
      /* trabalho */
      const buttonTrabalho = document.querySelector("#abrir_dialogTrabalho");
      const modalTrabalho = document.querySelector("#dialog_trabalho");
      const buttonCloseTrabalho = document.querySelector("dialog #fechar_dialogTrabalho");
      buttonTrabalho.onclick = function() {
        modalTrabalho.showModal();
      };
      buttonCloseTrabalho.onclick = function() {
        modalTrabalho.closeModal();
      };
      /* dinheiro */
      const buttonDinheiro = document.querySelector("#abrir_dialogDinheiro");
      const modalDinheiro = document.querySelector("#dialog_dinheiro");
      const buttonCloseDinheiro = document.querySelector("dialog #fechar_dialogDinheiro");
      buttonDinheiro.onclick = function() {
        modalDinheiro.showModal();
      };
      buttonCloseDinheiro.onclick = function() {
        modalDinheiro.closeModal();
      };
      /* outro */
      const buttonOutro = document.querySelector("#abrir_dialogOutro");
      const modalOutro = document.querySelector("#dialog_outro");
      const buttonCloseOutro = document.querySelector("dialog #fechar_dialogOutro");
      buttonOutro.onclick = function() {
        modalOutro.showModal();
      };
      buttonCloseOutro.onclick = function() {
        modalOutro.closeModal();
      };
    </script>
    <script type='text/javascript' src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js'></script>
    <script type='text/javascript'>
      document.addEventListener("DOMContentLoaded", function(event) {

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
      myLink.addEventListener('click', function(e) {
        e.preventDefault();
      });
    </script>

  </body>

</html>