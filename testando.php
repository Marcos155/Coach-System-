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
  $sql = "SELECT * FROM formulario_15_anos WHERE cod LIKE '%$data%' or nome LIKE '%$data%' or sobrenome LIKE '%$data%' or email LIKE '%$data%'  or saude LIKE '%$data%' or relacionamento LIKE '%$data%' or financeiro LIKE '%$data%'
  or espiritual LIKE '%$data%' or outro LIKE '%$data%'";
} else {
  $sql = /*"SELECT * FROM formulario ORDER BY cod DESC";*/"SELECT*from formulario_15_anos where formulario_15_anos.email = '$logado' ";
}
$result2 = $conexao_forms15->query($sql);


if (isset($_POST['submit'])) {

  /* formulário 15 anos */
  include_once('config.php');
    $nome= $_POST['nome'];
    $sobrenome= $_POST['sobrenome'];
    $email= $_POST['email'];
    $saude= $_POST['saude'];
    $relacionamento= $_POST['relacionamento'];
    $financeiro= $_POST['financeiro'];
    $espiritual= $_POST['espiritual'];
    $outro= $_POST['outro'];
  $result= mysqli_query($conexao_forms15,"INSERT INTO formulario_15_anos(nome,sobrenome,email,saude,relacionamento,financeiro,espiritual,outro) 
  VALUES ('$nome','$sobrenome','$email','$saude','$relacionamento','$financeiro','$espiritual','$outro')"); 
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

    /* relacionamento */
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
    $responsa=$_POST['responsa'];
    $data_inicio= $_POST['data_inicio'];
    $data_fim= $_POST['data_fim'];
    $obs= $_POST['obs'];
    $resultSaude= mysqli_query($conexao_forms15,"INSERT INTO relacionamento_12_meses(oque,porquem,onde,quando,porque,como,nome,sobrenome,objet,responsa,data_inicio,data_fim,obs) 
    VALUES ('$oque','$porquem','$onde','$quando','$porque','$como','$nome','$sobrenome','$objet','$responsa','$data_inicio','$data_fim','$obs')"); 
    header('show_sistema_persona.php');

    /* trabalho */
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
    $responsa=$_POST['responsa'];
    $data_inicio= $_POST['data_inicio'];
    $data_fim= $_POST['data_fim'];
    $obs= $_POST['obs'];
    $resultSaude= mysqli_query($conexao_forms15,"INSERT INTO trabalho_12_meses(oque,porquem,onde,quando,porque,como,nome,sobrenome,objet,responsa,data_inicio,data_fim,obs) 
    VALUES ('$oque','$porquem','$onde','$quando','$porque','$como','$nome','$sobrenome','$objet','$responsa','$data_inicio','$data_fim','$obs')"); 
    header('show_sistema_persona.php');

  /* dinheiro */
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
    $responsa=$_POST['responsa'];
    $data_inicio= $_POST['data_inicio'];
    $data_fim= $_POST['data_fim'];
    $obs= $_POST['obs'];
    $resultSaude= mysqli_query($conexao_forms15,"INSERT INTO dinheiro_12_meses(oque,porquem,onde,quando,porque,como,nome,sobrenome,objet,responsa,data_inicio,data_fim,obs) 
    VALUES ('$oque','$porquem','$onde','$quando','$porque','$como','$nome','$sobrenome','$objet','$responsa','$data_inicio','$data_fim','$obs')"); 
    header('show_sistema_persona.php');

  /* outro */
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
  $responsa=$_POST['responsa'];
  $data_inicio= $_POST['data_inicio'];
  $data_fim= $_POST['data_fim'];
  $obs= $_POST['obs'];
  $resultSaude= mysqli_query($conexao_forms15,"INSERT INTO outro_12_meses(oque,porquem,onde,quando,porque,como,nome,sobrenome,objet,responsa,data_inicio,data_fim,obs) 
  VALUES ('$oque','$porquem','$onde','$quando','$porque','$como','$nome','$sobrenome','$objet','$responsa','$data_inicio','$data_fim','$obs')"); 
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
          $sobrenome=$user_data ['sobrenome'];
          $email= $user_data ['email'];
          $saude= $user_data['saude'];
          $relacionamento= $user_data['relacionamento'];
          $financeiro= $user_data['financeiro'];
          $espiritual= $user_data['espiritual'];
          $outro= $user_data['outro'];
          $obs_andre=$user_data['obs_andre'];
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
$obs_andre= $user_data['obs_andre'];
?> 

<!doctype html>
<html>

<head>
  <meta charset='utf-8'>
  <meta name='viewport' content='width=device-width, initial-scale=1'>
  <link rel="shortcut icon" href="assets/images/favico.png" type="image/x-icon">
  <title>Formulários-<?php echo $nome ?></title>
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
    dialog::backdrop{
      background: rgb(0 0 0 / .5);
    }
    dialog{
      border:none;
      border-radius: .5rem;
      box-shadow: 0 0 1em rgb(0 0 0 / .3);
      width:80%;
    }
    #abrir_dialog{
      color:#fff;
      border-radius:5px;
      border:none;
      padding: 7px 8px 8px 8px;
      outline:none;
    }
    #fechar_dialog{
      color:#fff;
      border-radius:5px;
      border:none;
      outline:none;
    }
    #abrir_dialog:hover{
      opacity: 0.7;
      transition:all 0.5s;
    }
    #fechar_dialog:hover{
      opacity: 0.7;
      transition:all 0.5s;
    }
    input:hover{
      opacity: 0.7;
      transition:all 0.5s;
    }
    #titulo_dialog{
      font-weight:bold;
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
        <div> <a href="#" class="nav_logo"> <i class='bx bx-layer nav_logo-icon'></i> <span class="nav_logo-name"> <?php
              echo $nome ?></span> </a>
          <div class="nav_list"> 
            <?php
             /*echo "<a href='#' class='nav_link'> <i class='bx bx-grid-alt nav_icon'></i> <span
                class='nav_name'>Início</span> </a>";*/
              
              echo "<a href='show_sistema_persona.php?cod=$user_data[cod]' class='nav_link'> <i class='bx bx-user nav_icon'></i>
              <span class='nav_name'>Conta</span> </a>"; 
              
              echo "<a href='testando.php?cod=$user_data[cod]' class='nav_link active'> <i
              class='bx bx-message-square-detail nav_icon'></i> <span class='nav_name'>Formulário</span> </a>"; 
              
              echo "<a href='meta.php?cod=$user_data[cod]'' class='nav_link'> <i class='bx bxs-doughnut-chart'></i> <span class='nav_name'>Metas</span></a>" ;

              echo "<a href='https://wa.me/5561992656388' class='nav_link'><svg xmlns='http://www.w3.org/2000/svg' width='1.3em' height='1.3em' viewBox='0 0 24 24'><path fill='currentColor' d='M19.05 4.91A9.816 9.816 0 0 0 12.04 2c-5.46 0-9.91 4.45-9.91 9.91c0 1.75.46 3.45 1.32 4.95L2.05 22l5.25-1.38c1.45.79 3.08 1.21 4.74 1.21c5.46 0 9.91-4.45 9.91-9.91c0-2.65-1.03-5.14-2.9-7.01zm-7.01 15.24c-1.48 0-2.93-.4-4.2-1.15l-.3-.18l-3.12.82l.83-3.04l-.2-.31a8.264 8.264 0 0 1-1.26-4.38c0-4.54 3.7-8.24 8.24-8.24c2.2 0 4.27.86 5.82 2.42a8.183 8.183 0 0 1 2.41 5.83c.02 4.54-3.68 8.23-8.22 8.23zm4.52-6.16c-.25-.12-1.47-.72-1.69-.81c-.23-.08-.39-.12-.56.12c-.17.25-.64.81-.78.97c-.14.17-.29.19-.54.06c-.25-.12-1.05-.39-1.99-1.23c-.74-.66-1.23-1.47-1.38-1.72c-.14-.25-.02-.38.11-.51c.11-.11.25-.29.37-.43s.17-.25.25-.41c.08-.17.04-.31-.02-.43s-.56-1.34-.76-1.84c-.2-.48-.41-.42-.56-.43h-.48c-.17 0-.43.06-.66.31c-.22.25-.86.85-.86 2.07c0 1.22.89 2.4 1.01 2.56c.12.17 1.75 2.67 4.23 3.74c.59.26 1.05.41 1.41.52c.59.19 1.13.16 1.56.1c.48-.07 1.47-.6 1.67-1.18c.21-.58.21-1.07.14-1.18s-.22-.16-.47-.28z'/></svg> <span class='nav_name'>Mensagem</span></a>" ;
            ?>
          </div>
        </div> <a href="#" class="nav_link"> <i class='bx bx-log-out nav_icon' onclick="confirmaSair()"></i> <span class="nav_name">Sair</span>
        </a>
      </nav>
    </div>
    <!--Container Main start-->
    <div class="height-100 bg-light">
      <br><br>
      <h2> Olá, <?php echo $nome ?>&#128578;</h2><br>
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
      <!-- comentários do andré nos formulários -->
      <div>
          <?php
            echo "
            <a href='edit.php?cod=$user_data[cod]'>
              <input type='submit' class='btn' class='enviar_forms' style='background-color:rgb(255,0,0); color: #fff;' value='Editar formulário'>
            </a>";
            ?>
              <button id='abrir_dialog'>Comentários</button>
              <dialog>
                <h2 id='titulo_dialog'>Comentários do Coach</h2>
                <?php
                echo "<p>$obs_andre</p>";
                ?>
                <button id='fechar_dialog'>Ok</button>
              <dialog>
              
              
      </div>
      <!-- fim dos comentários do André nos formulários -->
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

              <a href='testando_relacionamento.php?cod=$user_data[cod]'>
                <input type='submit' class='btn' class='enviar_forms' style='background-color:	#DC143C; color: #fff;' value='Relacionamento'>
              </a>
              <a href='testando_trabalho.php?cod=$user_data[cod]'>
                <input type='submit' class='btn' class='enviar_forms' style='background-color:#FFA500; color: #fff;' value='Trabalho'>
              </a>
              <a href='testando_dinheiro.php?cod=$user_data[cod]'>
                <input type='submit' class='btn' class='enviar_forms' style='background-color:	#32CD32; color: #fff;' value='Dinheiro'>
              </a>
              <a  href='testando_outro.php?cod=$user_data[cod]'>
                <input type='submit' class='btn' class='enviar_forms' style='background-color:#8A2BE2; color: #fff;' value='Outros objetivos'>
              </a>
            ";   
          ?>
      </div>
      <br>
    </div>
    <!--Container Main end-->

    <script>
      function confirmaSair(){
    var confirma =confirm("<?php echo $nome ?>, tem certeza que deseja encerrar a sessão?");
    if (confirma==true){
        window.location.href="http://localhost/Coach-System-/sair.php";
       
    } 
};
    </script>


    <script>
      const button = document.querySelector("button");
      const modal = document.querySelector("dialog");
      const buttonClose = document.querySelector("dialog button");
      button.onclick=function(){
        modal.showModal();
      };
      buttonClose.onclick=function(){
        modal.close();
      };
    </script>


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