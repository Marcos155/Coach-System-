<?php
session_start();
include_once('config.php');

//formulário
if ((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true)) {
  unset($_SESSION['email']);
  unset($_SESSION['senha']);
  header('Location:entrar.php');
}
$logado = $_SESSION['email'];
$cod = $_GET['cod'];
if (!empty($_GET['search'])) {
  $data = $_GET['search'];
  $sql = "SELECT * FROM saude_12_meses WHERE cod LIKE '%$data%' or oque LIKE '%$data%'  or porquem LIKE '%$data%'  or onde LIKE '%$data%' or quando LIKE '%$data%' or porque LIKE '%$data%'
  or como LIKE '%$data%' or nome LIKE '%$data%' or sobrenome LIKE '%$data%' or objet LIKE '%$data%' or opcao  LIKE '%$data%' or responsa LIKE '%$data%' or data_inicio LIKE '%$data%'
  or data_fim LIKE '%$data%' or obs LIKE '%$data%' or obs_andre LIKE '%$data%' ";
} else {
  
  $sql = /*"SELECT * FROM saude_12_meses ORDER BY cod DESC";*/"SELECT*from saude_12_meses where saude_12_meses.cod = $cod ";
}
$result2 = $conexao_formsSaude->query($sql);

if (isset($_POST['submit'])) {

  include_once('config.php');
    $oque= $_POST['oque'];
    $porquem= $_POST['porquem'];
    $onde= $_POST['onde'];
    $quando= $_POST['quando'];
    $porque= $_POST['porque'];
    $como= $_POST['como'];
    $nome= $_POST['nome'];
    $sobrenome= $_POST['sobrenome'];
    $objet= $_POST['objet'];
    $opcao= $_POST['opcao'];
    $responsa=$_POST['responsa'];
    $data_inicio= $_POST['data_inicio'];
    $data_fim= $_POST['data_fim'];
    $obs= $_POST['obs'];

    $resultSaude= mysqli_query($conexao_formsSaude,"INSERT INTO saude_12_meses(oque,porquem,onde,quando,porque,como,nome,sobrenome,objet,opcao,responsa,data_inicio,data_fim,obs) 
    VALUES ('$oque','$porquem','$onde','$quando','$porque','$como','$nome','$sobrenome','$objet','$opcao','$responsa','$data_inicio','$data_fim','$obs')"); 
    header('show_sistema_persona.php');
}
if(!empty($_GET['cod']))
  {
  
    include_once('config.php');

    $cod = $_GET['cod'];
    $sqlselect = "SELECT * FROM saude_12_meses WHERE cod=$cod";
    $result = $conexao_formsSaude->query($sqlselect);

    if($result->num_rows > 0)
    {
        while($user_data = mysqli_fetch_assoc($result))
        {
            $oque= $user_data['oque'];
            $porquem= $user_data['porquem'];
            $onde= $user_data['onde'];
            $quando= $user_data['quando'];
            $porque= $user_data['porque'];
            $como= $user_data['como'];
            $nome= $user_data['nome'];
            $sobrenome= $user_data['sobrenome'];
            $objet= $user_data['objet'];
            $opcao= $user_data['opcao'];
            $responsa=$user_data['responsa'];
            $data_inicio= $user_data['data_inicio'];
            $data_fim= $user_data['data_fim'];
            $obs= $user_data['obs'];
            $obs_andre= $user_data['obs_andre'];
        }

    }
    else{
        header('Location: testando.php');
    }
  }
  else
  {
    /*header('testando.php');*/
    $fallback = 'index.html';
    $anterior = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : $fallback;
    header("location: {$anterior}");
    exit;
  }
$user_data = mysqli_fetch_assoc($result2);
$nome= $user_data['nome'];
?> 

<!doctype html>
<html>

<head>
  <meta charset='utf-8'>
  <meta name='viewport' content='width=device-width, initial-scale=1'>
  <title>Conta</title>
  <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css' rel='stylesheet'>
  <link href='https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css' rel='stylesheet'>
  <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
  <link rel="stylesheet" href="assets/css/nav.css">
  <style>
        button{
      background-color: rgb(255, 0, 0);
      border-radius: 17px;
      border:none;
      padding: 6px 8px 6px 8px;
    }
    button a{
      color: #fff;
      text-decoration:none;
    }
    button a:hover{
      text-decoration:none;
      color: #fff;
    }
    button:hover{
      background-color: rgb(230, 0, 0);
      cursor:pointer;
    }
  </style>
</head>

<body className='snippet-body' style="background-color:#f8f9fa">

  <body id="body-pd">
    <header class="header" id="header">
      <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
      <div class="header_img"> <img src="https://i.imgur.com/hczKIze.jpg" alt=""> </div>
    </header>
    <div class="l-navbar" id="nav-bar">
      <nav class="nav">
        <div> <a href="#" class="nav_logo"> <i class='bx bx-layer nav_logo-icon'></i> <span class="nav_logo-name"> <?php
              echo $nome ?></span> </a>
          <div class="nav_list"> 
            <?php
              echo "<a href='#' class='nav_link'> <i class='bx bx-grid-alt nav_icon'></i> <span
                class='nav_name'>Início</span> </a>";
              
              echo "<a href='show_sistema_persona.php?cod=$user_data[cod]' class='nav_link'> <i class='bx bx-user nav_icon'></i>
              <span class='nav_name'>Conta</span> </a>"; 
              
              echo "<a href='testando.php?cod=$user_data[cod]' class='nav_link active'> <i
              class='bx bx-message-square-detail nav_icon'></i> <span class='nav_name'>Formulário</span> </a>"; 
              
              echo "<a href='meta.php' class='nav_link'> <i class='bx bxs-doughnut-chart'></i> <span class='nav_name'>Metas</span></a>" ;
              
              echo "<a href='#' class='nav_link'> <i class='bx bx-chat'></i> <span class='nav_name'>Mensagem</span></a>";
            ?>
          </div>
        </div> <a href="sair.php" class="nav_link"> <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">Sair</span>
        </a>
      </nav>
    </div>
    <!--Container Main start-->
    <div class="height-100 bg-light">
      <br><br>
      <h2> Olá <?php echo $nome ?></h2><br>
      <b>
        <p>essa é sua visão de futuro para daqui 12 meses.</p>
      </b>
      <h3><li>Saúde</li></h3>
      <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">O que?</label>
        <?php
        echo "<input type='text' class='form-control'  value=' $user_data[oque]' id='oque'>";
        ?>
        </div>
      <div class="mb-3">
      <label for="exampleFormControlTextarea1" class="form-label">Por quem?</label>
        <?php
        echo "<input type='text' class='form-control'  value='$user_data[porquem]' id='porquem'>";
        ?>
      </div>
      <div class="mb-3">
      <label for="exampleFormControlTextarea1" class="form-label">Onde?</label>
        <?php
        echo "<input type='text' class='form-control'  value=' $user_data[onde]' id='onde'>";
        ?>
      </div>
      <div class="mb-3">
      <label for="exampleFormControlTextarea1" class="form-label">Quando?</label>
        <?php
        echo "<input type='text' class='form-control' value=' $user_data[quando]' id='quando'>";
        ?>
      </div>
      <div class="mb-3">
      <label for="exampleFormControlTextarea1" class="form-label">Por quê?</label>
        <?php
        echo "<input type='text' class='form-control' value=' $user_data[porque]' id='porque'>";
        ?>
      </div>
      <div class="mb-3">
      <label for="exampleFormControlTextarea1" class="form-label">Como</label>
        <?php
        echo "<input type='text' class='form-control' value=' $user_data[como]' id='como'>";
        ?>
      </div>

<!--
      <p>Acredita que é possivel realizar a meta ?</p>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1"  name="option" checked>
  <label class="form-check-label" for="inlineCheckbox1">Sim</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2" name="option">
  <label class="form-check-label" for="inlineCheckbox2">Não</label>
</div><br><br> -->

      <p><b>Metas sobre saúde</b></p><br>
   <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">O que fazer para alcançar o objetivo ?</label>
        <?php
        echo "<input type='text' class='form-control' value=' $user_data[objet]' id='objet'>";
        ?><br>
      </div>
    <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Responsável:</label>
        <?php
        echo "<input type='text' class='form-control' value=' $user_data[responsa]' id='responsa'>";
        ?><br>
      </div>
<div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Data de início:</label>
        <?php
        echo "<input type='text' class='form-control' value=' $user_data[data_inicio]' id='data_inicio'>";
        ?><br>
      </div>
<div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Data de término:</label>
        <?php
        echo "<input type='text' class='form-control' value=' $user_data[data_fim]' id='data_fim'>";
        ?><br>
      </div>
<div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Observações:</label>
        <?php
        echo "<input type='text' class='form-control' value=' $user_data[obs]' id='obs'>";
        ?><br>
      </div>
<div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">complementos para o objetivo:</label>
        <?php
        echo "<input type='text' class='form-control' value=' $user_data[obs_andre]' id='obs_andre'>";
        ?><br>
      </div>
      <div>
          <?php
            echo "
            <a href='edit_saude.php?cod=$user_data[cod]'>
              <input type='submit' class='btn' class='enviar_forms' style='background-color:rgb(255,0,0); color: #fff;' value='Editar formulário'>
            </a>
            <a href='testando.php?cod=$user_data[cod]'>
              <input type='submit' class='btn' class='enviar_forms' style='background-color:rgb(255,0,0); color: #fff;' value='Voltar'>
            </a>
            ";   
          ?>
        </div>
          <br>
    </div>
    <!--Container Main end-->
    
    <script type='text/javascript'
      src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js'></script>
    <script type='text/javascript'>document.addEventListener("DOMContentLoaded", function (event) {

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
      });</script>
    <script type='text/javascript'>var myLink = document.querySelector('a[href="#"]');
      myLink.addEventListener('click', function (e) {
        e.preventDefault();
      });

    /* bloqueio inputs saúde */
    const input_saude = document.querySelector('#oque');
    input_saude.disabled=true;
      
    const input_saude2 = document.querySelector('#porquem');
      input_saude2.disabled=true;

    const input_saude3 = document.querySelector('#onde');
      input_saude3.disabled=true;

    const input_saude4 = document.querySelector('#quando');
      input_saude4.disabled=true;

    const input_saude5 = document.querySelector('#porque');
      input_saude5.disabled=true;

    const input_saude6 = document.querySelector('#como');
      input_saude6.disabled=true;
      /* forms metas/ações*/
      const input_saude7 = document.querySelector('#objet');
    input_saude7.disabled=true;
      
    const input_saude8 = document.querySelector('#responsa');
      input_saude8.disabled=true;

    const input_saude9 = document.querySelector('#data_inicio');
      input_saude9.disabled=true;

    const input_saude10 = document.querySelector('#data_fim');
      input_saude10.disabled=true;

    const input_saude11 = document.querySelector('#obs');
      input_saude11.disabled=true;

    const input_saude12 = document.querySelector('#obs-andre');
      input_saude12.disabled=true;

      </script>

  </body>

</html>