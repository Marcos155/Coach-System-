<?php
  session_start();
  include_once('config.php');
  if((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true))
      {
          unset($_SESSION['email']);
          unset($_SESSION['senha']);
          header('Location:entrar.php');
      }
      $logado = $_SESSION['email'];
  
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
          $saude= $user_data['saude'];
          $relacionamento= $user_data['relacionamento'];
          $financeiro= $user_data['financeiro'];
          $espiritual= $user_data['espiritual'];
          $outro= $user_data['outro'];
          $nome= $user_data['nome'];
          $email= $user_data['email'];
          $mot_edit=$user_data['mot_edit'];
          $obs_andre=$user_data['obs_andre'];
        }

    }
    else{
        header('Location: testando.php');
    }
  }
  else
  {
    header('Location: testando.php');
    /*$fallback = 'index.html';
    $anterior = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : $fallback;
    header("location: {$anterior}");
    exit;*/
  }
  if(isset($_POST['submit']))
  {
    
    include_once('config.php');
    $saude= $_POST['saude'];
    $relacionamento= $_POST['relacionamento'];
    $financeiro= $_POST['financeiro'];
    $espiritual= $_POST['espiritual'];
    $outro= $_POST['outro'];
    $nome= $_POST['nome'];
    $email= $_POST['email'];
    $result= mysqli_query($conexao_forms15, "INSERT INTO fomrulario_15_anos(obs_andre) 
    VALUES ('$obs_andre')");
    
    header('Location:edit.php');
  }
?>
<!doctype html>
<html>

<head>
  <meta charset='utf-8'>
  <meta name='viewport' content='width=device-width, initial-scale=1'>
  <title>Formulário <?php echo $nome?></title>
  <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css' rel='stylesheet'>
  <link href='https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css' rel='stylesheet'>
  <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
  <link rel="stylesheet" href="assets/css/nav.css">
  <style>
        .table-wrapper {
    max-height: 500px;
    overflow-y: auto;
    }

    .box-search{
            display: flex;
            justify-content: center;
            gap: .1%;
        }
    #pesquisar:focus{
      border-color: rgba(0,0,0,0.4);
      box-shadow:none;
    }
    .link_voltar{
      text-decoration:none;
      color: #000;
      
    }
    .link_voltar:hover{
      text-decoration:none;
      color: #000;
      font-weight: bold;
      
    }
    body{
    /*background: linear-gradient(90deg,#f5f5f5 35%, rgb(202, 202, 202) 100%);*/
    background-image: linear-gradient(to right, #f5f5f5 35%,rgb(202, 202, 202));
}
.btn:hover{
    background-color: #f01e1e;
    color: rgb(247, 247, 247);
    transition: all 0.3s;
    border: none;
}
.btn{
  background-color: #000;
  color: #fff;
}
input[type="submit"]{
  outline:none;
}
  </style>

</head>

<body className='snippet-body' style="background-color:#f8f9fa">

  <body id="body-pd">
  <header class="header" id="header">
      <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle" style="color:black"></i> </div>
      <div class="header_img"> <img src="https://i.imgur.com/hczKIze.jpg" alt=""> </div>
    </header>
    <div class="l-navbar" id="nav-bar" style="background-color: darkgray;">
    <nav class="nav">
        <div> <a href="#" class="nav_logo"> <i class='bx bx-layer nav_logo-icon' style="color:black"></i> <span class="nav_logo-name" style="color:black"> <?php
              echo "Administração" ?></span> </a>
          <div class="nav_list"> 
            <?php
              echo "<a href='sistema.php' class='nav_link'> <i class='bx bx-user nav_icon'></i>
              <span class='nav_name'>Conta-Alunos</span> </a>"; 
              
              echo "<a href='sistema_coach_forms.php' class='nav_link active'> <i
              class='bx bx-message-square-detail nav_icon'></i> <span class='nav_name'>Formulário-Alunos</span> </a>"; 
              
              echo "<a href='sistema_metas_coach.php' class='nav_link'> <i class='bx bxs-doughnut-chart'></i> <span class='nav_name'>Metas-Alunos</span></a>" ;
              
              echo "<a href='#' class='nav_link'> <i class='bx bx-chat'></i> <span class='nav_name'>Mensagem</span></a>";

              echo "<a href='qrcode.php' class='nav_link'> <svg xmlns='http://www.w3.org/2000/svg' width='20px' height='20px' preserveAspectRatio='xMidYMid meet' 
              viewBox='0 0 32 32'><path fill='currentColor' d='M5 5v8h2v2h2v-2h4V5H5zm8 8v2h2v2h-4v2H5v8h8v-8h6v-2h-2v-2h4v-2h2v2h2v-2h2V5h-8v8h-6zm12 2v2h2v-2h-2zm0 2h-2v2h2v-2zm0 2v2h2v-2h-2zm0 2h-2v-2h-2v2h-5v6h2v-4h4v2h2v-2h1v-2zm-3 4h-2v2h2v-2zm1-8v-2h-2v2h2zm-12 0v-2H9v2h2zm-4-2H5v2h2v-2zm8-10v4h-1v2h1v1h2V9h1V7h-1V5h-2zM7 7h4v4H7V7zm14 0h4v4h-4V7zM8 8v2h2V8H8zm14 0v2h2V8h-2zM7 21h4v4H7v-4zm1 1v2h2v-2H8zm17 3v2h2v-2h-2z'/></svg>
               <span class='nav_name'>Gerar QR Code</span> </a>"; 
            ?>
          </div>
        </div> <a href="#" class="nav_link"> <i class='bx bx-log-out nav_icon' onclick="confirmaSair()"></i> <span class="nav_name">Sair</span>
        </a>
      </nav>
    </div>


    <div >
    <?php
        echo " formulário para daqui 15 anos do aluno(a)
        <h2><b>$nome</b></h2>"
        ?><br>
      <h3><li>Visão de futuro 15 anos</li></h3>
      <?php
        //echo"<form action='show_sistema_forms.php?cod=$user_data[cod]' method='post'>";
        echo"<form action='save_obsAndre.php' method='post' name='forms'>";
      ?>
      <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Saúde:</label>
        <input type="text" class="form-control" id="saude"
         type="text" placeholder="saúde" name="username" value="<?php echo $saude ?>" 
        required>
      </div>
      <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Relacionamentos:</label>
        <input type="text" class="form-control" id="relacionamento"
        placeholder="Email para contato" type="email" placeholder="Email" name="email" 
        value="<?php echo $relacionamento ?>"  required>
      </div>
      <input type="hidden" name="cod" value="<?php echo $cod ?>">
      <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Financeiro:</label>
        <input type="tel" class="form-control"   placeholder="financeiro" id="financeiro"
              name="phone" value="<?php echo $financeiro ?>" required>
      </div>
     
      <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Espiritual:</label>
        <input type="text" class="form-control"  
        placeholder="espiritual" id="espiritual"
              name="cidade" value="<?php echo $espiritual ?>" >
      </div>
      <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Demais objetivos:</label>
        <input type="text" class="form-control"  id="outro"
        placeholder="demais objetivos" 
              name="estado" value="<?php echo $outro ?>" >
      </div>
      <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Motivo da edição do formulário</label>
        <input type="text" class="form-control"  id="mot_edit"
        placeholder="Por que está editando seu formulário?" 
        name="mot_edit" value="<?php echo $mot_edit ?>" required>
      </div>
      <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label"><b>Complementos para o objetivo:</b></label>
        <input type="text" class="form-control"  id="ParaCompletar"
        placeholder="Faça observações a cerca dos objetivos desse aluno" maxlength="490"
        name="obs_andre" value="<?php echo $obs_andre ?>">
        <label for="characters">Quantidade de caracteres: </label><span id="characters"></span><br>
      </div>
      <a href='sistema_coach_forms.php'>
            <input type='submit' class='btn' class='enviar_forms' value='Voltar'>
        </a>
        <input type="submit" class="btn" class="enviar_forms" value="Salvar observação" name="update"
          id="update"><br><br>
        
    </div>
 
      </form>


      <script>
var desc = document.querySelector("#ParaCompletar");
      desc.addEventListener("keypress", function(e) {
      var maxChars = 490;
      inputLength = desc.value.length;
      /* conta os caracteres */
      document.getElementById('characters').innerText = inputLength
      if(inputLength >= maxChars) {
      e.preventDefault();
      window.alert("André, você atingiu o máximo de caracteres permitidos!")
      }  
      });
      function confirmaSair(){
    var confirma =confirm("Tem certeza que deseja encerrar a sessão?");
    if (confirma==true){
        window.location.href="http://localhost/Coach-System-/sair.php";
    } 
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
         
      </script>
      <script>
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

      const input6 = document.querySelector('#mot_edit');
      input6.disabled=true;
    </script>

  </body>

</html>