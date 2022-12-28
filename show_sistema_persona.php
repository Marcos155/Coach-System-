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
    telefone LIKE '%$data%' or sexo LIKE '%$data%' or senha LIKE '%$data%' or cidade LIKE '%$cidade%' or estado LIKE '%$estado%' ";

} else {
  $sql = /*"SELECT * FROM cadastro ORDER BY cod DESC";*/ "SELECT*from cadastro where cadastro.email = '$logado' ";
}
$result2 = $conexao_regis->query($sql);
if (isset($_POST['submit'])) {

  include_once('config.php');

  $nome = $_POST['username'];
  $email = $_POST['email'];
  $senha = $_POST['password'];
  $cidade = $_POST['cidade'];
  $estado = $_POST['estado'];
  $telefone = $_POST['phone'];
  $sexo = $_POST['sexo'];

  $result = mysqli_query($conexao_regis, "INSERT INTO cadastro(nome,email,senha,cidade,estado,telefone,sexo) 
VALUES ('$nome','$email','$senha','$cidade','$estado','$telefone','$sexo')");
}


$user_data = mysqli_fetch_assoc($result2);
$nome= $user_data['nome'];

?> 
<!DOCTYPE html>
<!-- partial:index.partial.html -->
<html lang="en">

<head>
<meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1">
  <title>Cadastro</title>
  <link rel="stylesheet" href="./style.css">
  <link rel="shortcut icon" href="assets/images/favico.png" type="image/x-icon">
  <link rel="stylesheet" href="https://code.getmdl.io/1.1.3/material.teal-deep_purple.min.css">
  <script defer src="https://code.getmdl.io/1.1.3/material.min.js"></script>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:300,400,700|Roboto:300,300i,400,400i,500,700,900"
    rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <style>
    .mdl-layout__header {
      background-color: rgb(255, 0, 0);
    }
    .table-wrapper {
    max-height: 500px;
    overflow-y: auto; }
   
  </style>
</head>

<body>
  <div class="mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header administration">
    <header class="mdl-layout__header">
      <div class="mdl-layout__header-row">
        <div class="current-user">
          <i class="material-icons">account_circle</i>
          <?php 
            echo "olá, $nome";
          ?>
        </div>
        <div class="mdl-layout-spacer"></div>
    </header>

    <div class="mdl-layout__drawer">
      <span class="mdl-layout-title">
        <?php
          echo $nome; 
        ?>
      </span>
      <nav class="mdl-navigation">
        <br>
        <nav class="mdl-navigation">
          <?php
            echo "<a class='mdl-navigation__link' href='show_sistema_forms.php?cod=$user_data[cod]'>Formulário</a>";
          ?>
          <br>
          <?php
              echo "<a class='mdl-navigation__link' href='edit_regis.php?cod=$user_data[cod]'>Completar cadastro</a>"
            ?>
          <br>
          <?php
             echo "<a class='mdl-navigation__link active' href='show_sistema_persona.php?cod=$user_data[cod]'>Conta</a>"
             ?>
          <br>
            <a class="mdl-navigation__link" href="meta.php">meta</a>
          <br>
            <a class="mdl-navigation__link" href="sair.php">Sair</a>
        </nav>
    </div>
    <main class="mdl-layout__content">
      <div class="page-content">

        <div class="m-5">
          <h1>Cadastro</h1>
        </div>
        <div class="table-wrapper">
        <table class="table">
          <thead class="thead-light">
            <tr>
              <th scope="row">Código</th>
              <th scope="col">Nome</th>
              <th scope="col">Email</th>
              <th scope="col">Telefone</th>
              <th scope="col">Sexo</th>
              <th scope="col">Senha</th>
              <th scope="col">Cidade</th>
              <th scope="col">Estado</th>
            </tr>
          </thead>
          <tbody>
            <?php
        
          echo "<tr>";
          echo "<td>" . $user_data['cod'] . "</td>";
          echo "<td>" . $user_data['nome'] . "</td>";
          echo "<td>" . $user_data['email'] . "</td>";
          echo "<td>" . $user_data['telefone'] . "</td>";
          echo "<td>" . $user_data['sexo'] . "</td>";
          echo "<td>" . $user_data['senha'] . "</td>";
          echo"<td>"  . $user_data['cidade'] . "</td>";
          echo "<td>" . $user_data['estado'] . "</td>";
          echo "</tr>";
        ?>
          </tbody>
        </table>
        </div>
      </div>
      </div>
  </div>
  </main>
  </div>

  <script>
    $(document).ready(function () {

      $(".search-block").hide();
      $(".expander-title").click(function () {
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


    /*testes*/
   
  </script>
</body>
</html>
<!-- partial -->
</body>
</html>