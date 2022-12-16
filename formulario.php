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

      $sql = "SELECT * FROM formulario ORDER BY cod DESC";
      $result = $conexao_forms->query($sql);


  if(isset($_POST['submit']))
  {
    
    include_once('config.php');
    $meta= $_POST['meta'];
    $data= $_POST['data'];
    $status= $_POST['status'];

    $result= mysqli_query($conexao_forms, "INSERT INTO formulario(meta,data_conclusao,status_meta) 
    VALUES ('$meta','$data','$status')"); 

  }
 ?> 
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Sistema</title>
  <link rel="stylesheet" href="./style.css">
  <link rel="shortcut icon" href="assets/images/favico.png" type="image/x-icon">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js" type="text/javascript"></script>
  <link rel="stylesheet" href="assets/css/bootstrap.css">
</head>
<body>

<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>sistema</title>
    <link rel="stylesheet" href="https://code.getmdl.io/1.1.3/material.teal-deep_purple.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script defer src="https://code.getmdl.io/1.1.3/material.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:300,400,700|Roboto:300,300i,400,400i,500,700,900" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/calender.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <style>
      button{
       position: absolute;
       left:50%;
       top:60%;
       transform: translate(-50%,-50%);
      }
      label{
        color:#000;
      }
      .mdl-layout__header{
        background-color: rgb(255,0,0);
      }
    </style>
  </head>
  <body>
    <div class="mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header administration">
      <header class="mdl-layout__header">
        <div class="mdl-layout__header-row">
          <div class="current-user">
            <i class="material-icons">account_circle</i>
            <?php echo "olá,$logado!" ?>
          </div>
          <div class="mdl-layout-spacer"></div>
      </header>
      <div class="mdl-layout__drawer">
        <span class="mdl-layout-title">Aluno</span>
        <nav class="mdl-navigation">
          <a class="mdl-navigation__link active" href="sair.php">Sair</a>
          <br>
          <a class="mdl-navigation__link active" href="show_sistema_persona.php">Inicio</a>
          <br>
          <a class="mdl-navigation__link active" href="show_sistema_persona.php">Conta</a>
        </nav>
      </div>
    </header>
      <main class="mdl-layout__content">
        <div class="page-content">

          <p>Olá <?php echo "$logado"?>, preencha o formulario abaixo de acordo com o objetivo que almeja alcançar.</p>
          <form action="formulario.php" method="post">
            <div class="form-group">
              <label for="exampleInputEmail1">Meta</label>
              <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Qual sua meta?" name="meta" required>
              <small id="emailHelp" class="form-text text-muted">Coloque aqui seu objetivo. Exemplo: perder peso</small>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Data de conclusão</label>
              <input type="date" class="form-control" id="exampleInputPassword1"  name="data" required>

            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Status</label>
              <input name="status" required type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Atualmente o que já fez para concluir seu objetivo?">
              <small id="emailHelp" class="form-text text-muted">Coloque aqui o que já fez ou está fazendo para alcançar sua meta</small>
            </div>

            <button name="submit" type="submit" class="btn btn-primary" class="enviar_forms" style="background-color:rgb(255,0,0); border:none">Enviar</button>
          </form>
      </main>

    <script>
      $(document).ready(function(){

        $(".search-block").hide();
        $(".expander-title").click(function(){
          $(this).next(".search-block").slideToggle("fast");
        });

      });
      var search = document.getElementById('pesquisar');
  search.addEventListener("keydown", function (event) {
    if (event.key === "Enter") {
      searchData();
    }
  });
  function searchData() {
    window.location = 'sistema.php?search=' + search.value;
  }

  $(document).ready(function () {

    $(".search-block").hide();
    $(".expander-title").click(function () {
      $(this).next(".search-block").slideToggle("fast");
    });

  });
    </script>
<script src="js/jquery.min.js"></script>
<script src="js/popper.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/main.js"></script>
  </body>
</html>
<!-- partial -->
  
</body>
</html>