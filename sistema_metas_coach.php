<?php
session_start();
include_once('config.php');

//cadastro
if ((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true)) {
  unset($_SESSION['email']);
  unset($_SESSION['senha']);
  header('Location:entrar.php');
}
$logado = $_SESSION['email'];

if (!empty($_GET['search'])) {
  $data = $_GET['search'];
  if($data!=1 && $data!='adm@gmail.com' && $data!='André Fernandes'){
  $sql = "SELECT * FROM cadastro WHERE cod LIKE '%$data%' or nome LIKE '%$data%' or email LIKE '%$data%' or 
    telefone LIKE '%$data%' or sexo LIKE '%$data%' or cidade LIKE '%$data%' or estado LIKE '%$data%' or sobrenome LIKE '%$data%' or nome_turma LIKE '%$data%' ";
  }else{
    $sql = "SELECT * FROM cadastro WHERE cod>1 ORDER BY cod DESC";
  }
} else {
  $sql = "SELECT * FROM cadastro WHERE cod>1 ORDER BY cod DESC";
}

$result2 = $conexao_forms15->query($sql);


// gráficos (pizza)
$x = 0;
$y = 0;
$saude = 0;
$relacionamento = 0;
$trabalho = 0;
$dinheiro = 0;
$outro = 0;
//percorre o meta_saude

$result_niveis_saude = "SELECT * FROM meta_saude";
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

$result_niveis_relacionamento = "SELECT * FROM meta_relacionamento";
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
$result_niveis_trabalho = "SELECT * FROM meta_trabalho";
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
$result_niveis_dinheiro = "SELECT * FROM meta_dinheiro";
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
$result_niveis_outro = "SELECT * FROM meta_outro";
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
  $saude = ($saude * 100) / $total_metas;
  $relacionamento = ($relacionamento * 100) / $total_metas;
  $dinheiro = ($dinheiro * 100) / $total_metas;
  $trabalho = ($trabalho * 100) / $total_metas;
  $outro = ($outro * 100) / $total_metas;

  $total_XY_porce = $x + $y;
  $x = ($x * 100) / $total_XY_porce;
  $y = ($y * 100) / $total_XY_porce;
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
      /*background: linear-gradient(90deg,#f5f5f5 35%, rgb(202, 202, 202) 100%);*/
      background-image: linear-gradient(to right, #f5f5f5 35%, rgb(202, 202, 202));
    }

    .btn:hover {
      background-color: #f01e1e;
      color: rgb(247, 247, 247);
      transition: all 0.3s;
      border: none;
    }

    @media (max-width: 600px) {
      .r {
        width: 50% !important;
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

            echo "<a href='sistema_metas_coach.php' class='nav_link active'> <i class='bx bxs-doughnut-chart'></i> <span class='nav_name'>Meta-Alunos</span></a>";

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
      <h2><b>André</b></h2>

      <p>você aqui você pode <b>analisar</b> como estão indo as <b>metas de seus alunos</b></p>

      <br><br><br>
      <h3><b>Cadastrar</b> Metas</h3>
      <div class="box-search">
        <input type="search" class="form-control w-25" placeholder="Pesquisar" id="pesquisar">
        <button onclick="searchData()" class="btn btn-dark">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
          </svg>
        </button>
      </div>
      <br>
      <br>

      <div class="table-wrapper">
        <table class="table">
          <thead class="thead-light">
            <tr>
              <th scope="col">turma</th>
              <th scope="col">Código</th>
              <th scope="col">Nome</th>
              <th scope="col">Sobrenome</th>
              <th scope="col">Saúde</th>
              <th scope="col">Relacionamento</th>
              <th scope="col">Dinheiro</th>
              <th scope="col">Trabalho</th>
              <th scope="col">Outro</th>
              <th scope="col">Análise</th>
            </tr>
          </thead>
          <tbody>
            <?php
            while ($user_data = mysqli_fetch_assoc($result2)) {
              echo "<tr>";
              echo "<td>" . $user_data['nome_turma'] . "</td>";
              echo "<td>" . $user_data['cod'] . "</td>";
              echo "<td>" . $user_data['nome'] . "</td>";
              echo "<td>" . $user_data['sobrenome'] . "</td>";
              echo "
        <td>
          <a class='btn btn-sm btn-dark' href='coach_meta_saude.php?cod=$user_data[cod]' placeholer='editar' class='btn btn-secondary' data-toggle='tooltip' data-placement='right' title='Ver formulário'>
            Cadastrar
          </a>
        </td>
        <td>
          <a class='btn btn-sm btn-dark' href='coach_meta_relacionamento.php?cod=$user_data[cod]' placeholer='editar' class='btn btn-secondary' data-toggle='tooltip' data-placement='right' title='Ver formulário'>
            Cadastrar
          </a>
        </td>
        <td>
          <a class='btn btn-sm btn-dark' href='coach_meta_dinheiro.php?cod=$user_data[cod]' placeholer='editar' class='btn btn-secondary' data-toggle='tooltip' data-placement='right' title='Ver formulário'>
            Cadastrar
          </a>
        </td>
        <td>
          <a class='btn btn-sm btn-dark' href='coach_meta_trabalho.php?cod=$user_data[cod]' placeholer='editar' class='btn btn-secondary' data-toggle='tooltip' data-placement='right' title='Ver formulário'>
            Cadastrar
          </a>
        </td>
        <td>
          <a class='btn btn-sm btn-dark' href='coach_meta_outro.php?cod=$user_data[cod]' placeholer='editar' class='btn btn-secondary' data-toggle='tooltip' data-placement='right' title='Ver formulário'>
            Cadastrar
          </a>
        </td> 
        <td>
          <a class='btn btn-sm btn-dark' href='coach_meta_analise.php?cod=$user_data[cod]' placeholer='editar' class='btn btn-secondary' data-toggle='tooltip' data-placement='right' title='Ver andamento'>
            Analisar
          </a>
        </td> ";
              echo "<tr>";
            }
            ?>
          </tbody>
        </table>
      </div>
      <br><br><br><br>
      <h3><b>Analisar</b> Metas</h3>
      <br>
      <b>
        <p>Veja aqui os dados de desempenhos das turmas e alunos</p>
      </b>
      <br><br>
      <div class="conteiner">
        <div class="row" style="justify-content: space-evenly; display: flex;">

          <?php
          if ($x > 0) {
            echo "
          <div class='col-4 a'>
            <h2 style='text-align:center'>% de conclusão geral</h2>
            <canvas id='conclusao'></canvas><br>
            <div style='display: inline-flex;color: red;'>
            <i class='fa-solid fa-lightbulb fa-xl'></i><p style='color: black;text-align:center'>Este gráfico serve para exibir quantas metas os alunos ja concluíram, e 
            quantas ainda faltam no total de todas as categorias</p>
            </div>
          </div>";

            echo " <div class='col-4 r'>
            <h2 style='text-align:center'>% de conclusão por metas</h2>
            <canvas id='metas-todas'></canvas><br>
            <div style='display: inline-flex;color: red;'>
            <i class='fa-solid fa-lightbulb fa-xl'></i><p style='color: black; text-align:center'>Este gráfico serve para exibir quantas metas os alunos ja concluíram, 
            separadas por categoria</p>
            </div>
          </div>
        </div>";
          }
          ?>
          <br><br><br>

          <!-- <h2 style="text-align: center;">% de conclusão das atividades</h2> -->
          <!-- <div class="row" style="justify-content: center;">
          <div class="col-5 r">
            <h2 style="text-align: center;">% de conclusão alunos</h2>
            <canvas id="conclusao"></canvas>
          </div>
        </div> -->
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
                  label: 'Metas (%)',
                  data: [<?= number_format($saude, 2, '.', '') ?>, <?= number_format($relacionamento, 2, '.', '') ?>, <?= number_format($trabalho, 2, '.', '') ?>, <?= number_format($dinheiro, 2, '.', '') ?>,
                    <?= number_format($outro, 2, '.', '') ?>
                  ],

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
                  indexAxis: 'y'
                }

              }
            });


          new Chart(
            document.getElementById('conclusao'), {
              type: 'doughnut',
              data: {
                labels: ['Falta concluir(%)', 'Concluído(%)' ///
                ],
                datasets: [{
                  label: 'Metas',
                  data: [<?= number_format($y, 2, '.', '') ?>, <?= number_format($x, 2, '.', '') ?>], ///trazer os dados de conclusão das anotações, numero 6 falta é o falta concluir  
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

        /* do antigo sistema */
        $(document).ready(function() {

          $(".search-block").hide();
          $(".expander-title").click(function() {
            $(this).next(".search-block").slideToggle("fast");
          });

        });

        var search = document.getElementById('pesquisar');
        search.addEventListener("keydown", function(event) {
          if (event.key === "Enter") {
            searchData();
          }
        });

        function searchData() {
          window.location = 'sistema_metas_coach.php?search=' + search.value;
        };


        $(document).ready(function() {

          $(".search-block").hide();
          $(".expander-title").click(function() {
            $(this).next(".search-block").slideToggle("fast");
          });

        });
      </script>

  </body>

</html>