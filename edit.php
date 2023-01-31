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
    $result= mysqli_query($conexao_forms15, "INSERT INTO fomrulario_15_anos(mot_edit) 
    VALUES ('$mot_edit')");
    
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
              
                echo "<a href='show_sistema_persona.php?cod=$cod' class='nav_link'> <i class='bx bx-user nav_icon'></i>
                <span class='nav_name'>Conta</span> </a>"; 
                
                echo "<a href='testando.php?cod=$cod' class='nav_link active'> <i
                class='bx bx-message-square-detail nav_icon'></i> <span class='nav_name'>Formulário</span> </a>"; 
                
                echo "<a href='meta.php?cod=$cod'' class='nav_link'> <i class='bx bxs-doughnut-chart'></i> <span class='nav_name'>Metas</span></a>" ;

                echo "<a href='https://wa.me/5561992656388' class='nav_link'><svg xmlns='http://www.w3.org/2000/svg' width='1.3em' height='1.3em' viewBox='0 0 24 24'><path fill='currentColor' d='M19.05 4.91A9.816 9.816 0 0 0 12.04 2c-5.46 0-9.91 4.45-9.91 9.91c0 1.75.46 3.45 1.32 4.95L2.05 22l5.25-1.38c1.45.79 3.08 1.21 4.74 1.21c5.46 0 9.91-4.45 9.91-9.91c0-2.65-1.03-5.14-2.9-7.01zm-7.01 15.24c-1.48 0-2.93-.4-4.2-1.15l-.3-.18l-3.12.82l.83-3.04l-.2-.31a8.264 8.264 0 0 1-1.26-4.38c0-4.54 3.7-8.24 8.24-8.24c2.2 0 4.27.86 5.82 2.42a8.183 8.183 0 0 1 2.41 5.83c.02 4.54-3.68 8.23-8.22 8.23zm4.52-6.16c-.25-.12-1.47-.72-1.69-.81c-.23-.08-.39-.12-.56.12c-.17.25-.64.81-.78.97c-.14.17-.29.19-.54.06c-.25-.12-1.05-.39-1.99-1.23c-.74-.66-1.23-1.47-1.38-1.72c-.14-.25-.02-.38.11-.51c.11-.11.25-.29.37-.43s.17-.25.25-.41c.08-.17.04-.31-.02-.43s-.56-1.34-.76-1.84c-.2-.48-.41-.42-.56-.43h-.48c-.17 0-.43.06-.66.31c-.22.25-.86.85-.86 2.07c0 1.22.89 2.4 1.01 2.56c.12.17 1.75 2.67 4.23 3.74c.59.26 1.05.41 1.41.52c.59.19 1.13.16 1.56.1c.48-.07 1.47-.6 1.67-1.18c.21-.58.21-1.07.14-1.18s-.22-.16-.47-.28z'/></svg> <span class='nav_name'>Mensagem</span></a>" ;
            ?>
          </div>
        </div> <a href="#" class="nav_link"> <i class='bx bx-log-out nav_icon' onclick="confirmaSair()"></i> <span class="nav_name">Sair</span>
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
        <input type="text" class="form-control" id="saude"
         type="text" placeholder="Saúde" name="username" value="<?php echo $saude ?>"required maxlength="490">
         <label for="characters">Quantidade de caracteres: 490/ </label><span id="char_saude"></span><br>
      </div>
      <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Relacionamentos</label>
        <input type="text" class="form-control" id="relacionamento" type="email" placeholder="Relacionamento" name="email" value="<?php echo $relacionamento ?>"  required maxlength="490">
        <label for="characters">Quantidade de caracteres: 490/ </label><span id="char_relacionamento"></span><br>
      </div>
      <input type="hidden" name="cod" value="<?php echo $cod ?>">
      <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Financeiro</label>
        <input type="tel" class="form-control" id="financeiro"  placeholder="financeiro" name="phone" value="<?php echo $financeiro ?>" required maxlength="490">
        <label for="characters">Quantidade de caracteres: 490/ </label><span id="char_financeiro"></span><br>
      </div>
     
      <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Espiritual</label>
        <input type="text" class="form-control" id="espiritual" 
        placeholder="Espiritual"name="cidade" value="<?php echo $espiritual ?>" maxlength="490" required>
        <label for="characters">Quantidade de caracteres: 490/ </label><span id="char_espiritual"></span><br>
      </div>
      <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Outro</label>
        <input type="text" class="form-control" id="outro" 
        placeholder="Coloque aqui demais objetivos que deseje alcançar" name="estado" value="<?php echo $outro ?>" maxlength="790">
        <label for="characters_outro">Quantidade de caracteres: 790/ </label><span id="char_outro"></span><br>
      </div>
      <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Registre o motivo da edição</label>
        <input type="text" class="form-control" id="mot_edit" 
        placeholder="Por que está editando seu formulário?" 
        name="mot_edit" value="<?php echo $mot_edit ?>" required maxlength="300">
        <label for="characters">Quantidade de caracteres: 300/ </label><span id="char_mot_edit"></span><br>
      </div>
      
        <input type="submit" class="btn" class="enviar_forms" style="background-color:rgb(255,0,0); color: #fff;" value="Salvar" name="update" id="update">
        <br><br>
      </div>
 
      </form>

      <script>
        /* Saúde */
        var desc_saude = document.querySelector("#saude");
      desc_saude.addEventListener("keypress", function(e) {
      var maxChars_saude = 490;
      inputLength = desc_saude.value.length;
      document.getElementById('char_saude').innerText = inputLength
      if(inputLength >= maxChars_saude) {
      e.preventDefault();
      window.alert("<?php echo $nome ?>, você atingiu o máximo de caracteres permitidos!")
      }  
      });
        /* relacionamentos */
        var desc_relacionamento = document.querySelector("#relacionamento");
      desc_relacionamento.addEventListener("keypress", function(e) {
      var maxChars_relacionamento = 490;
      inputLength = desc_relacionamento.value.length;
      document.getElementById('char_relacionamento').innerText = inputLength
      if(inputLength >= maxChars_relacionamento) {
      e.preventDefault();
      window.alert("<?php echo $nome ?>, você atingiu o máximo de caracteres permitidos!")
      }  
      });
        /* financeiro */
        var desc_financeiro = document.querySelector("#financeiro");
      desc_financeiro.addEventListener("keypress", function(e) {
      var maxChars_financeiro = 490;
      inputLength = desc_financeiro.value.length;
      document.getElementById('char_financeiro').innerText = inputLength
      if(inputLength >= maxChars_financeiro) {
      e.preventDefault();
      window.alert("<?php echo $nome ?>, você atingiu o máximo de caracteres permitidos!")
      }  
      });
        /* esíritual */
        var desc_espiritual = document.querySelector("#espiritual");
      desc_espiritual.addEventListener("keypress", function(e) {
      var maxChars_espiritual = 490;
      inputLength = desc_espiritual.value.length;
      document.getElementById('char_espiritual').innerText = inputLength
      if(inputLength >= maxChars_espiritual) {
      e.preventDefault();
      window.alert("<?php echo $nome ?>, você atingiu o máximo de caracteres permitidos!")
      }  
      });
        /* outro */
        var desc_outro = document.querySelector("#outro");
      desc_outro.addEventListener("keypress", function(e) {
      var maxChars_outro = 790;
      inputLength = desc_outro.value.length;
      document.getElementById('char_outro').innerText = inputLength
      if(inputLength >= maxChars_outro) {
      e.preventDefault();
      window.alert("<?php echo $nome ?>, você atingiu o máximo de caracteres permitidos!")
      }  
      });
        /* motivo da edição */
        var desc = document.querySelector("#mot_edit");
      desc.addEventListener("keypress", function(e) {
      var maxChars = 300;
      inputLength = desc.value.length;
      document.getElementById('char_mot_edit').innerText = inputLength
      if(inputLength >= maxChars) {
      e.preventDefault();
      window.alert("<?php echo $nome ?>, você atingiu o máximo de caracteres permitidos!")
      }  
      });
      </script>
    <script>
      function confirmaSair(){
    var confirma =confirm("<?php echo $nome ?>, tem certeza que deseja encerrar a sessão?");
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

  </body>

</html>