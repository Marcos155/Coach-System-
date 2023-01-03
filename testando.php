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
if (!empty($_GET['search'])) {
  $data = $_GET['search'];
  $sql = "SELECT * FROM formulario_15_anos WHERE cod LIKE '%$data%' or nome LIKE '%$data%' or email LIKE '%$data%'  or saude LIKE '%$data%' or relacionamento LIKE '%$data%' or financeiro LIKE '%$data%'
  or espiritual LIKE '%$data%' or outro LIKE '%$data%'";
} else {
  $sql = /*"SELECT * FROM formulario ORDER BY cod DESC";*/"SELECT*from formulario_15_anos where formulario_15_anos.email = '$logado' ";
}
$result2 = $conexao_forms15->query($sql);


if (isset($_POST['submit'])) {

  include_once('config.php');
    $nome= $_POST['nome'];
    $email= $_POST['email'];
    $saude= $_POST['saude'];
    $relacionamento= $_POST['relacionamento'];
    $financeiro= $_POST['financeiro'];
    $espiritual= $_POST['espiritual'];
    $outro= $_POST['outro'];
  $result= mysqli_query($conexao_forms15,"INSERT INTO formulario_15_anos(nome,email,saude,relacionamento,financeiro,espiritual,outro) 
  VALUES ('$nome','$email','$saude','$relacionamento','$financeiro','$espiritual','$outro')"); 
  header('show_sistema_persona.php');

      /* saúde */
      include_once('config.php');
      $oque= $_POST['oque'];
      $porquem= $_POST['porquem'];
      $onde= $_POST['onde'];
      $quando= $_POST['quando'];
      $porque= $_POST['porque'];
      $como= $_POST['como'];
      $nome= $_POST['nome'];
  
      $resultSaude= mysqli_query($conexao_formsSaude,"INSERT INTO saude_12_meses(oque,porquem,onde,quando,porque,como,nome) 
      VALUES ('$oque','$porquem','$onde','$quando','$porque','$como','$nome')"); 
      header('show_sistema_persona.php');
}
if(!empty($_GET['cod']))
  {
  
    include_once('config.php');

    $cod = $_GET['cod'];
    $sqlselect = "SELECT * FROM formulario_15_anos WHERE cod=$cod";
    $result = $conexao_forms15->query($sqlselect);
    if($result->num_rows > 0)
    {
        while($user_data = mysqli_fetch_assoc($result))
        {
          $nome=$user_data ['nome'];
          $email= $user_data ['email'];
          $saude= $user_data['saude'];
          $relacionamento= $user_data['relacionamento'];
          $financeiro= $user_data['financeiro'];
          $espiritual= $user_data['espiritual'];
          $outro= $user_data['outro'];
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
        <p>essa é sua visão de futuro para daqui 15 anos.</p>
      </b>
      <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Saúde</label>
        <?php
        echo "<input type='text' class='form-control'  value=' $user_data[saude]' id='saude'>";
        ?>
        </div>
      <div class="mb-3">
      <label for="exampleFormControlTextarea1" class="form-label">Relacionamentos</label>
        <?php
        echo "<input type='text' class='form-control'  value='$user_data[relacionamento]' id='relacionamento'>";
        ?>
      </div>
      <div class="mb-3">
      <label for="exampleFormControlTextarea1" class="form-label">Financeiro</label>
        <?php
        echo "<input type='text' class='form-control'  value=' $user_data[financeiro]' id='financeiro'>";
        ?>
      </div>
      <div class="mb-3">
      <label for="exampleFormControlTextarea1" class="form-label">Espiritual</label>
        <?php
        echo "<input type='text' class='form-control' value=' $user_data[espiritual]' id='espiritual'>";
        ?>
      </div>
      <div class="mb-3">
      <label for="exampleFormControlTextarea1" class="form-label">Demais objetivos</label>
        <?php
        echo "<input type='text' class='form-control' value=' $user_data[outro]' id='outro'>";
        ?>
      </div>
      <div>
          <?php
            echo "
            <a href='edit.php?cod=$user_data[cod]'>
              <input type='submit' class='btn' class='enviar_forms' style='background-color:rgb(255,0,0); color: #fff;' value='Editar formulário'>
            </a>";   
          ?>
      </div>
      <br><br>
      <b>
        <p>Veja aqui sua visão de futuro para daqui 12 meses:</p>
      </b>
      <div>
          <?php
            echo "
              <a href='testando_saude.php?cod=$user_data[cod]'>
                <input type='submit' class='btn' class='enviar_forms' style='background-color:	#4169E1; color: #fff;' value='Saúde'>
              </a>
              <a href='#'>
                <input type='submit' class='btn' class='enviar_forms' style='background-color:	#DC143C; color: #fff;' value='Relacionamento'>
              </a>
              <a href='#'>
                <input type='submit' class='btn' class='enviar_forms' style='background-color:#FFA500; color: #fff;' value='Trabalho'>
              </a>
              <a href='#'>
                <input type='submit' class='btn' class='enviar_forms' style='background-color:	#32CD32; color: #fff;' value='Dinheiro'>
              </a>
              <a href='#'>
                <input type='submit' class='btn' class='enviar_forms' style='background-color:#8A2BE2; color: #fff;' value='Outros Objetivos'>
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


      /* bloqueio dos inputs  15 anos*/
    const input = document.querySelector('#saude');
    input.disabled=true;
      
    const input2 = document.querySelector('#relacionamento');
      input2.disabled=true;

    const input3 = document.querySelector('#financeiro');
      input3.disabled=true;

    const input4 = document.querySelector('#espiritual');
      input4.disabled=true;

    const input5 = document.querySelector('#outro');
      input5.disabled=true;
    
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


      </script>

  </body>

</html>