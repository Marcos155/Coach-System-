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
//testes

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
          
          <div class="box-search" >
      <input type="search" class="form-control w-25" placeholder="pesquisar" id="pesquisar">
      <button class="btn btn-success" onclick="searchData()">
        <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-search'
          viewBox='0 0 16 16'>
          <path
            d='M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z' />
        </svg>
      </button>
    </div>
          <!--
          <div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable mdl-textfield--floating-label mdl-textfield--align-right">
            <span>Procurar</span>
            <label class="mdl-button mdl-js-button mdl-button--icon" for="fixed-header-drawer-exp">
              <i class="material-icons" onclick="searchData()">search</i>
            </label>
            <div class="mdl-textfield__expandable-holder">
              <input class="mdl-textfield__input" type="text" name="sample" id="fixed-header-drawer-exp" id="pesquisar">
            </div>
-->
    </header>
      <div class="mdl-layout__drawer">
        <span class="mdl-layout-title">Aluno</span>
        <nav class="mdl-navigation">
          <a class="mdl-navigation__link active" href="show_sistema_persona.php">Inicio</a>
          <br>
          <a class="mdl-navigation__link active" href="sair.php">Sair</a>
          <br>
          <a class="mdl-navigation__link active" href="home_pos_login.php">Conta</a>
        </nav>
      </div>
    </header>
      <main class="mdl-layout__content">
        <div class="page-content">
          <!-- content start -->
          <!--
          <div class="breadcrumbs">
            <a href="home_pos_login.php">Inicio</a>
            <i class="material-icons">arrow_forward</i>
            <a href="">Alunos</a>
            <i class="material-icons">arrow_forward</i>
            <a href="">Resultado Alunos</a>
          </div> -->

          <h2>Alunos</h2>
          <?php
                //echo "<h4>Bem Vindo <u>$logado</u> :) </h4>";
            ?>
          <p>Olá $logado preencha o formulario abaixo de acordo com o objetivo que almeja alcançar.</p>
          <form>
            <div class="form-group">
              <label for="exampleInputEmail1">Nome da meta</label>
              <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nome da meta">
              <small id="emailHelp" class="form-text text-muted">Preenhca de acordo com seu objetivo. Ex: perder peso, disciplina...</small>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Tempo de conclusão</label>
              <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
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
              </div>
            </div>
            <div class="form-check">
              <input type="checkbox" class="form-check-input" id="exampleCheck1">
              <label class="form-check-label" for="exampleCheck1">Check me out</label>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
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