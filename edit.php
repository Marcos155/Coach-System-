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
    
    header('Location:edit.php');
  }
?>
<!doctype html>
<html>

<head>
  <meta charset='utf-8'>
  <meta name='viewport' content='width=device-width, initial-scale=1'>
  <title>Editar formulário</title>
  <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css' rel='stylesheet'>
  <link href='https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css' rel='stylesheet'>
  <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
  <link rel="stylesheet" href="assets/css/nav.css">

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
              /*echo "<a href='#' class='nav_link'> <i class='bx bx-grid-alt nav_icon'></i> <span
                class='nav_name'>Início</span> </a>";*/
              
              echo "<a href='show_sistema_persona.php' class='nav_link'> <i class='bx bx-user nav_icon'></i>
              <span class='nav_name'>Conta</span> </a>"; 
              
              echo "<a href='testando.php' class='nav_link active'> <i
              class='bx bx-message-square-detail nav_icon'></i> <span class='nav_name'>Formulário</span> </a>"; 
              
              echo "<a href='meta.php' class='nav_link'> <i class='bx bxs-doughnut-chart'></i> <span class='nav_name'>Metas</span></a>" ;
              
              echo "<a href='#' class='nav_link'> <i class='bx bx-chat'></i> <span class='nav_name'>Mensagem</span></a>";
            ?>
          </div>
        </div> <a href="sair.php" class="nav_link"> <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">Sair</span>
        </a>
      </nav>
    </div>


    <div class="height-100 bg-light">
      <br><br>
      <h2><?php echo $nome ?>, edite aqui sua meta para daqui a 15 anos &#128578;</h2><br>
      <?php
        //echo"<form action='show_sistema_forms.php?cod=$user_data[cod]' method='post'>";
        echo"<form action='save_edit.php' method='post' name='forms'>";
      ?>
      <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Saúde</label>
        <input type="text" class="form-control" id="exampleFormControlTextarea1"
         type="text" placeholder="saúde" name="username" value="<?php echo $saude ?>" 
        required>
      </div>
      <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Relacionamentos</label>
        <input type="text" class="form-control" id="exampleFormControlTextarea1"
        placeholder="Email para contato" type="email" placeholder="Email" name="email" 
        value="<?php echo $relacionamento ?>"  required>
      </div>
      <input type="hidden" name="cod" value="<?php echo $cod ?>">
      <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Financeiro</label>
        <input type="tel" class="form-control" id="exampleFormControlTextarea1"  placeholder="financeiro" 
              name="phone" value="<?php echo $financeiro ?>" required>
      </div>
     
      <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Espiritual</label>
        <input type="text" class="form-control" id="exampleFormControlTextarea1" 
        placeholder="espiritual"
              name="cidade" value="<?php echo $espiritual ?>" >
      </div>
      <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Outro</label>
        <input type="text" class="form-control" id="exampleFormControlTextarea1" 
        placeholder="demais objetivos" 
              name="estado" value="<?php echo $outro ?>" >
      </div>
      
        <input type="submit" class="btn" class="enviar_forms" style="background-color:rgb(255,0,0); color: #fff;" value="Salvar" name="update"
       
          id="update">
    </div>
 
      </form>
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

  </body>

</html>