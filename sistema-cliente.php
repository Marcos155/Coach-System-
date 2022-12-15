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
  $sql = "SELECT * FROM cadastro WHERE cod LIKE '%$data%' or nome LIKE '%$data%' or email LIKE '%$data%' or 
    telefone LIKE '%$data%' or sexo LIKE '%$data%' or senha LIKE '%$data%' ";

} else {
  $sql = "SELECT * FROM cadastro ORDER BY cod DESC";
}


$result2 = $conexao_regis->query($sql);


if (isset($_POST['submit'])) {

  include_once('config.php');

  $nome = $_POST['username'];
  $email = $_POST['email'];
  $senha = $_POST['password'];
  $telefone = $_POST['phone'];
  $sexo = $_POST['sexo'];

  $result = mysqli_query($conexao_regis, "INSERT INTO cadastro(nome,email,senha,telefone,sexo) 
VALUES ('$nome','$email','$senha','$telefone','$sexo')");
}
//formulario
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
<!-- partial:index.partial.html -->
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
          <form>
            <div class="form-group">
              <label for="exampleInputEmail1">Meta</label>
              <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Qual sua meta?">
              <small id="emailHelp" class="form-text text-muted">Coloque aqui seu objetivo. Exemplo: perder peso</small>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Data de conclusão</label>
              <input type="date" class="form-control" id="exampleInputPassword1">
              <!--
              <div class="container">
                <div class="row justify-content-center">
                  <div class="col-md-6 text-center mb-5">
                    <h2 class="heading-section">Calendar #01</h2>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="calendar calendar-first" id="calendar_first">
                      <div class="calendar_header">
                          <button class="switch-month switch-left"> <i class="fa fa-chevron-left"></i></button>
                           <h2></h2>
                          <button class="switch-month switch-right"> <i class="fa fa-chevron-right"></i></button>
                      </div>
                      <div class="calendar_weekdays"></div>
                      <div class="calendar_content"></div>
                    </div>
                  </div>
                </div>
              </div>-->
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Status</label>
              <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Atualmente o que já fez para concluir seu objetivo?">
              <small id="emailHelp" class="form-text text-muted">Coloque aqui o que já fez ou está fazendo para alcançar sua meta</small>
            </div>
            <!--
            <div class="form-check">
              <input type="checkbox" class="form-check-input" id="exampleCheck1">
              <label class="form-check-label" for="exampleCheck1">Li e concordo com os termos</label>
            </div>-->
            
            <button type="submit" class="btn btn-primary" class="enviar_forms" style="background-color:rgb(255,0,0); border:none">Enviar</button>
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