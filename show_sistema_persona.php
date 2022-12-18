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
$user_data = mysqli_fetch_assoc($result2)
?> 
<!DOCTYPE html>
<!-- partial:index.partial.html -->
<html lang="en">

<head>
<meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1">
  <title>Sistema</title>
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
          <?php echo "olá,$logado!" ?>
        </div>
        <div class="mdl-layout-spacer"></div>
    </header>

    <div class="mdl-layout__drawer">
      <span class="mdl-layout-title">Aluno</span>
      <nav class="mdl-navigation">
        <br>
        <nav class="mdl-navigation">
          <a class="mdl-navigation__link" href="entrar.php">Inicio</a>
          <br>
          <a class="mdl-navigation__link active" href="show_sistema_persona.php">Conta</a>
          <br>
          <?php
          echo "<a class='mdl-navigation__link' href='show_sistema_forms.php?cod=$user_data[cod]'>Formulário</a>";
          ?>
          <br>
          <a class="mdl-navigation__link" href="formulario.php">meta</a>
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
              <th>Editar</th>
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
          echo "<td></td>";
          echo "<td>
          <a class='btn btn-sm btn-primary' href='edit_regis.php?cod=$user_data[cod]'>
          <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pen' viewBox='0 0 16 16'>
            <path d='m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z'/>
          </svg>
          </a>
        </td>";
          echo "<tr>";
        
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
  </script>

</body>

</html>
<!-- partial -->

</body>

</html>