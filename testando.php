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
  $sql = "SELECT * FROM formulario WHERE meta LIKE '%$data%' or nome LIKE '%$data%' or email LIKE '%$data%' or desc_meta LIKE '%$data%' or data_inicio LIKE '%$data%' or data_conclusao LIKE '%$data%' or 
    status_meta LIKE '%$data%' or cod LIKE '%$data%'";

} else {
  $sql = /*"SELECT * FROM formulario ORDER BY cod DESC";*/"SELECT*from formulario where formulario.email = '$logado' ";
}
$result2 = $conexao_forms->query($sql);

if (isset($_POST['submit'])) {

  include_once('config.php');

  $meta = $_POST['meta'];
  $nome = $_POST['nome'];
  $email = $_POST['email'];
  $desc_meta= $_POST['desc_meta'];
  $data_inicio = $_POST['data_inicio'];
  $data_conclusao = $_POST['data'];
  $status_meta = $_POST['status'];

  $result = mysqli_query($conexao_forms, "INSERT INTO formulario(meta,nome,email,desc_meta,data_inicio,data_conclusao,status_meta) 
  VALUES ('$meta','$nome','$email','$desc_meta','$data_inicio','$data_conclusao','$status_meta')");
}
if(!empty($_GET['cod']))
  {
  
    include_once('config.php');

    $cod = $_GET['cod'];
    $sqlselect = "SELECT * FROM formulario WHERE cod=$cod";
    $result = $conexao_forms->query($sqlselect);

    if($result->num_rows > 0)
    {
        while($user_data = mysqli_fetch_assoc($result))
        {
          $meta= $user_data['meta'];
          $nome= $user_data['nome'];
          $email= $user_data['email'];
          $desc_meta= $user_data['desc_meta'];
          $data_inicio= $user_data['data_inicio'];
          $data_conclusao= $user_data['data_conclusao'];
          $status_meta= $user_data['status_meta'];
        }

    }
    else{
        header('Location: show_sistema_persona.php');
    }
  }
  //else
  {
    /*header('Location: show_sistema_persona.php');*/
    /*$fallback = 'index.html';
    $anterior = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : $fallback;
    header("location: {$anterior}");
    exit;*/
  }
$user_data = mysqli_fetch_assoc($result2);


$nome= $user_data['nome'];
?> 
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1">
  <title>Formulário</title>
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
    label,
    p,
    button {
      color: #000;
      margin-left: 0.3vw;
    }

    .mdl-layout__header {
      background-color: rgb(255, 0, 0);
    }

    .espace {
      margin-right: 1rem;
      margin-left: 1rem;
    }
    .table-wrapper {
    max-height: 500px;
    overflow-y: auto;}
  </style>
</head>

<body>
  <div class="mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header administration">
    <header class="mdl-layout__header">
      <div class="mdl-layout__header-row">
        <div class="current-user">
          <i class="material-icons">account_circle</i>
          <?php echo "olá,$nome!" ?>
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
        <a class="mdl-navigation__link active" href="show_sistema_forms.php">Formulário</a>
          <br>
          <?php
              echo "<a class='mdl-navigation__link' href='edit_regis.php?cod=$user_data[cod]'>Completar cadastro</a>"
            ?>
          <br>
          <a class="mdl-navigation__link" href="show_sistema_persona.php">Conta</a>
          <br>
          <a class="mdl-navigation__link" href="meta.php">meta</a>
          <br>
          <a class="mdl-navigation__link" href="sair.php">Sair</a>
      </nav>
    </div>
    </header>
    <main class="mdl-layout__content">
    
      <div class="page-content">

          <?php echo  "esses foram os dados preenchidos em seu formulário."?>
        <?php
            //echo"<form action='show_sistema_forms.php?cod=$user_data[cod]' method='post'>";
            echo"<form action='show_sistema_forms.php' method='post'>";
          ?>
          <br>
          <div class="table-wrapper">
           <div class="form-group espace">
            <label for="exampleInputEmail1">Nome</label>
            <?php
             echo "<input type='text' class='form-control' aria-describedby='emailHelp' value=' $user_data[nome]'
              name='nome' id='nome'>";
              ?>
          </div>

        <div class="form-group espace">
          <label for="exampleInputEmail1">Email</label>
          <?php
          echo "<input type='email'  class='form-control' aria-describedby='emailHelp'  name='email' value=' $user_data[email]' id='email'/>"
          ?>
        </div>

          <div class="form-group espace">
            <label for="exampleInputEmail1">Meta</label>
            <?php
            echo "<input type='text' class='form-control' aria-describedby='emailHelp' name=1meta1  value=' $user_data[meta]' id='meta'>"
            ?>
          </div>
          
          <div class="form-group espace">
            <label for="exampleFormControlTextarea1">Defina sua meta</label>
            <?php
                echo"<input type='text' class='form-control' rows='3' name='desc_meta' value=' $user_data[desc_meta]' id='desc_meta'>"
            ?>
          </div>
          
          <div class="form-group espace">
            <label for="exampleInputPassword1">Data de inicio</label>
            <?php
               echo" <input type='text' class='form-control' name='data_inicio' value=' $user_data[data_inicio]' id='data_inicio'>"
            ?>
            
            <label for="exampleInputPassword1">Data de  previsão de conclusão</label>
            <?php
                echo"<input type='text' class='form-control' name='data' value=' $user_data[data_conclusao]' id='data_conclusao'>"
            ?>
          </div>
          <div class="form-group espace">
            <label for="exampleInputEmail1">Status</label>
            <?php
                echo"<input type='text' class='form-control' aria-describedby='emailHelp' name='status' value=' $user_data[status_meta]' id='status_meta'>"
              ?>
          </div>
    </div>
        </form>
        
    </main>

    <script>
      const input = document.querySelector('#status_meta');
      input.disabled=true;

      const input2 = document.querySelector('#data_conclusao');
      input2.disabled=true;

      const input3 = document.querySelector('#data_inicio');
      input3.disabled=true;

      const input4 = document.querySelector('#desc_meta');
      input4.disabled=true;

      const input5 = document.querySelector('#meta');
      input5.disabled=true;

      const input6 = document.querySelector('#email');
      input6.disabled=true;

      const input7 = document.querySelector('#nome');
      input7.disabled=true;
    </script>
</body>
</html>