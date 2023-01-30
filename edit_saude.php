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
    $sqlselect = "SELECT * FROM saude_12_meses WHERE cod=$cod";
    /*$result = $conexao_formsSaude->query($sqlselect);*/
    $result = $conexao_forms15->query($sqlselect);

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
          $mot_edit=$user_data['mot_edit'];

        }

    }
    else{
        header('Location: testando_saude.php');
    }
  }
  else
  {
    header('Location: testando_saude.php');
    /*$fallback = 'index.html';
    $anterior = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : $fallback;
    header("location: {$anterior}");
    exit;*/
  }
  if(isset($_POST['submit']))
  {
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
    $mot_edit=$_POST['mot_edit'];
    $result= mysqli_query($conexao_forms15, "INSERT INTO saude_12_meses(mot_edit) 
    VALUES ('$mot_edit')");
    
    header('Location:edit_saude.php');
  }
?>
<!doctype html>
<html>

<head>
  <meta charset='utf-8'>
  <meta name='viewport' content='width=device-width, initial-scale=1'>
  <link rel="shortcut icon" href="assets/images/favico.png" type="image/x-icon">
  <title>Editar formulário</title>
  <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css' rel='stylesheet'>
  <link href='https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css' rel='stylesheet'>
  <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
  <link rel="stylesheet" href="assets/css/nav.css">
  <style>
    .btn:hover{
      opacity: 0.7;
      transition:all 0.5s;
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
              /*echo "<a href='#' class='nav_link'> <i class='bx bx-grid-alt nav_icon'></i> <span
                class='nav_name'>Início</span> </a>";*/
              
                echo "<a href='show_sistema_persona.php?cod=$cod' class='nav_link'> <i class='bx bx-user nav_icon'></i>
                <span class='nav_name'>Conta</span> </a>"; 
                
                echo "<a href='testando.php?cod=$cod' class='nav_link active'> <i
                class='bx bx-message-square-detail nav_icon'></i> <span class='nav_name'>Formulário</span> </a>"; 
                
                echo "<a href='meta.php?cod=$cod'' class='nav_link'> <i class='bx bxs-doughnut-chart'></i> <span class='nav_name'>Metas</span></a>" ;
            ?>
          </div>
        </div> <a href="#" class="nav_link"> <i class='bx bx-log-out nav_icon' onclick="confirmaSair()"></i> <span class="nav_name">Sair</span>
        </a>
      </nav>
    </div>


    <div class="height-100 bg-light">
      <br><br>
      <h2><?php echo $nome ?>, edite aqui sua meta de saúde para daqui a 12 meses &#128578;</h2><br>
      <?php
        //echo"<form action='show_sistema_forms.php?cod=$user_data[cod]' method='post'>";
        echo"<form action='save_edit_saude.php' method='post' name='forms'>";
      ?>
      <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">O que?</label>
        <input type="text" maxlength="250" class="form-control" id="oque" type="text" placeholder="Ex: Estar na faixa do 65Kg"  name="oque" value="<?php echo $oque ?>" 
        required>
        <label for="char_oque">Quantidade de caracteres: 250/ </label><span id="char_oque"></span>
      </div>
      <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Por quem?</label>
        <input type="text" class="form-control" id="porquem" type="text" placeholder="Alguma pessoa em especial ?" name="porquem" 
        value="<?php echo $porquem ?>"  maxlength="250" required>
        <label for="char_porquem">Quantidade de caracteres: 250/ </label><span id="char_porquem"></span>
      </div>
      <input type="hidden" name="cod" value="<?php echo $cod ?>">
      <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Onde?</label>
        <input type="text" class="form-control" id="onde" maxlength="250"
        placeholder="Onde precisa estar para alcançar esse objetivo ?" name="onde" value="<?php echo $onde ?>" required>
        <label for="char_onde">Quantidade de caracteres: 250/ </label><span id="char_onde"></span>
      </div>
     
      <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Quando?</label>
        <input type="date" class="form-control" id="exampleFormControlTextarea1" 
        placeholder="Em qual época quer alcançar?" name="quando" value="<?php echo $quando ?>" required >
      </div>
      <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Por quê?</label>
        <input type="text" class="form-control" id="porque"  maxlength="250"
        placeholder="Motivo do objetivo" name="porque" value="<?php echo $porque ?>" required>
        <label for="char_porque">Quantidade de caracteres: 250/ </label><span id="char_porque">
      </div>
      
      <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Como?</label>
        <input type="text" class="form-control" id="como" maxlength="250"
        placeholder="Como fazer ?" name="como" value="<?php echo $como ?>" required>
        <label for="char_como">Quantidade de caracteres: 250/ </label><span id="char_como"></span>
      </div>

      <p>Acredita que é possivel realizar a meta ?</p>
            <input type="radio" value="sim" name="opcao" <?php echo ($opcao == 'sim') ? 'checked' : ''?> class="form-check-input" required>
            <label for="sim">Sim</label>
            <input type="radio"  value="nao" name ="opcao" <?php echo ($opcao == 'nao') ? 'checked' : ''?> class="form-check-input" required>
            <label for="nao">Não</label>
            <br><br>
      <p><b>Metas sobre saúde</b></p><br>
   <div class="mb-3">
 <label for="exampleFormControlTextarea1" class="form-label">O que fazer para alcançar o objetivo ?</label>
        <input type="text" maxlength="150" class="form-control" id="objet" placeholder="Como alcançar esse objetivo?" name="objet" value="<?php echo $objet ?>" required>
          <label for="char_objet">Quantidade de caracteres: 150/ </label><span id="char_objet"></span><br>
      </div>
    <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Responsável:</label>
        <input type="text" maxlength="150" class="form-control" id="responsa" placeholder="Quem é o responsável por alcançar esse objetivo?" name="responsa" value="<?php echo $responsa ?>" required>
          <label for="char_responsa">Quantidade de caracteres: 150/ </label><span id="char_responsa"></span><br>
      </div>
<div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Data de início:</label>
        <input type="date" class="form-control" id="exampleFormControlTextarea1"
          placeholder="Em qual época quer alcançar?" name="data_inicio" value="<?php echo $data_inicio ?>" required><br>
      </div>
<div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Data de término:</label>
        <input type="date" class="form-control" id="exampleFormControlTextarea1"
          placeholder="Em qual época quer alcançar?" name="data_fim" value="<?php echo $data_fim ?>" required><br>
      </div>
<div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Observações:</label>
        <input type="text" class="form-control" id="obs" placeholder="Deixe aqui observações acerca desse objetivo" name="obs" value="<?php echo $obs ?>" maxlength="250">
        <label for="char_obs">Quantidade de caracteres: 250/ </label><span id="char_obs"></span><br>
      </div>
      <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Registre o motivo da edição</label>
        <input type="text" class="form-control" id="mot_edit" placeholder="Por que está editando seu formulário?" name="mot_edit" value="<?php echo $mot_edit ?>" required>
        <label for="characters">Quantidade de caracteres: 300/ </label><span id="char_mot_edit"></span><br>
      </div>
        <input type="submit" class="btn" class="enviar_forms" style="background-color:rgb(255,0,0); color: #fff;" value="Salvar" name="update" id="update">
        <br><br>
    </div>
 
      </form>

      <script>
  /* obs */
  var desc_obs = document.querySelector("#obs");
      desc_obs.addEventListener("keypress", function(e) {
      var maxChars_obs = 250;
      inputLength = desc_obs.value.length;
      document.getElementById('char_obs').innerText = inputLength
      if(inputLength >= maxChars_obs) {
      e.preventDefault();
      window.alert("<?php echo $nome ?>, você atingiu o máximo de caracteres permitidos!")
      }  
      });
        /* responsa */
        var desc_responsa = document.querySelector("#responsa");
      desc_responsa.addEventListener("keypress", function(e) {
      var maxChars_responsa = 1500;
      inputLength = desc_responsa.value.length;
      document.getElementById('char_responsa').innerText = inputLength
      if(inputLength >= maxChars_responsa) {
      e.preventDefault();
      window.alert("<?php echo $nome ?>, você atingiu o máximo de caracteres permitidos!")
      }  
      });
        /* objet */
        var desc_objet = document.querySelector("#objet");
      desc_objet.addEventListener("keypress", function(e) {
      var maxChars_objet = 150;
      inputLength = desc_objet.value.length;
      document.getElementById('char_objet').innerText = inputLength
      if(inputLength >= maxChars_objet) {
      e.preventDefault();
      window.alert("<?php echo $nome ?>, você atingiu o máximo de caracteres permitidos!")
      }  
      });
      /* porque */
  var desc_porque = document.querySelector("#porque");
      desc_porque.addEventListener("keypress", function(e) {
      var maxChars_porque = 250;
      inputLength = desc_porque.value.length;
      document.getElementById('char_porque').innerText = inputLength
      if(inputLength >= maxChars_porque) {
      e.preventDefault();
      window.alert("<?php echo $nome ?>, você atingiu o máximo de caracteres permitidos!")
      }  
      });
        /* como */
        var desc_como = document.querySelector("#como");
      desc_como.addEventListener("keypress", function(e) {
      var maxChars_como = 250;
      inputLength = desc_como.value.length;
      document.getElementById('char_como').innerText = inputLength
      if(inputLength >= maxChars_como) {
      e.preventDefault();
      window.alert("<?php echo $nome ?>, você atingiu o máximo de caracteres permitidos!")
      }  
      });
        /* onde */
        var desc_onde = document.querySelector("#onde");
      desc_onde.addEventListener("keypress", function(e) {
      var maxChars_onde = 250;
      inputLength = desc_onde.value.length;
      document.getElementById('char_onde').innerText = inputLength
      if(inputLength >= maxChars_onde) {
      e.preventDefault();
      window.alert("<?php echo $nome ?>, você atingiu o máximo de caracteres permitidos!")
      }  
      });
      /* porquem */
      var desc_porquem = document.querySelector("#porquem");
      desc_porquem.addEventListener("keypress", function(e) {
      var maxChars_porquem = 250;
      inputLength = desc_porquem.value.length;
      document.getElementById('char_porquem').innerText = inputLength
      if(inputLength >= maxChars_porquem) {
      e.preventDefault();
      window.alert("<?php echo $nome ?>, você atingiu o máximo de caracteres permitidos!")
      }  
      });
      /* oque */
      var desc_oque = document.querySelector("#oque");
      desc_oque.addEventListener("keypress", function(e) {
      var maxChars_oque = 250;
      inputLength = desc_oque.value.length;
      document.getElementById('char_oque').innerText = inputLength
      if(inputLength >= maxChars_oque) {
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