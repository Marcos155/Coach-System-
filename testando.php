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
  $sql = "SELECT * FROM formulario WHERE cod LIKE '%$data%' or meta LIKE '%$data%' or nome LIKE '%$data%' or email LIKE '%$data%' or desc_meta LIKE '%$data%' or 
  data_inicio LIKE '%$data%' or data_conclusao LIKE '%$data%' or status_meta LIKE '%$data%' or saude LIKE '%$data%' or relacionamento LIKE '%$data%' or financeiro LIKE '%$data%'
  or espiritual LIKE '%$data%' or outro LIKE '%$data%'";
} else {
  $sql = /*"SELECT * FROM formulario ORDER BY cod DESC";*/"SELECT*from formulario where formulario.email = '$logado' ";
}
$result2 = $conexao_forms->query($sql);

if (isset($_POST['submit'])) {

  include_once('config.php');
  $meta= $_POST['meta'];
    $nome= $_POST['nome'];
    $email= $_POST['email'];
    $desc_meta= $_POST['desc_meta'];
    $data_inicio= $_POST['data_inicio'];
    $data= $_POST['data'];
    $status= $_POST['status'];
    $saude= $_POST['saude'];
    $relacionamento= $_POST['relacionamento'];
    $financeiro= $_POST['financeiro'];
    $espiritual= $_POST['espiritual'];
    $outro= $_POST['outro'];

  $result= mysqli_query($conexao_forms, "INSERT INTO formulario(meta,nome,email,desc_meta,data_inicio,data_conclusao,status_meta,saude,relacionamento,financeiro,espiritual,outro) 
  VALUES ('$meta','$nome','$email','$desc_meta','$data_inicio','$data','$status','$saude','$relacionamento','$financeiro','$espiritual','$outro')"); 
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
          $meta= $user_data ['meta'];
          $nome=$user_data ['nome'];
          $email= $user_data ['email'];
          $desc_meta= $user_data ['desc_meta'];
          $data_inicio= $user_data ['data_inicio'];
          $data= $user_data ['data_conclusao'];
          $status= $user_data ['status_meta'];
          $saude= $user_data['saude'];
          $relacionamento= $user_data['relacionamento'];
          $financeiro= $user_data['financeiro'];
          $espiritual= $user_data['espiritual'];
          $outro= $user_data['outro'];
        }

    }
    else{
        header('Location: show_sistema_persona.php');
    }
  }
  else
  {
    /*header('Location: show_sistema_persona.php');*/
    $fallback = 'index.html';
    $anterior = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : $fallback;
    header("location: {$anterior}");
    exit;
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
   /* .table-wrapper {
    max-height: 500px;
    overflow-y: auto;}*/
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
        <a class="mdl-navigation__link active" href="testando.php">Formulário</a>
          <br>
          <?php
              //echo "<a class='mdl-navigation__link' href='edit_regis.php?cod=$user_data[cod]'>Completar cadastro</a>"
            ?>
          <a class="mdl-navigation__link" href="show_sistema_persona.php">Conta</a>
          <br>
          <a class="mdl-navigation__link" href="meta.php">meta</a>
          <br>
          <a class="mdl-navigation__link" href="notas.php">Notas</a>
          <br>
          <a class="mdl-navigation__link" href="sair.php">Sair</a>
      </nav>
    </div>
    </header>
    <main class="mdl-layout__content">
    
      <div class="page-content">
      <!-- formulário de 15 anos -->
      <?php //echo  "esses foram os dados preenchidos em seu formulário para daqui a 15 anos."?>
        <?php
            //echo"<form action='show_sistema_forms.php?cod=$user_data[cod]' method='post'>";
            //echo"<form action='testando.php' method='post'>";
          ?>
          <br>
          <!--
          <div class="table-wrapper">
           <div class="form-group espace">
            <label for="exampleInputEmail1">Saúde</label>
            <?php
              /*echo "<input type='text' class='form-control' aria-describedby='emailHelp' value=' $user_data[saude]'
              name='saude' id='saude'>";*/
              ?>
          </div>

        <div class="form-group espace">
          <label for="exampleInputEmail1">Relacionamentos</label>
          <?php
            //echo "<input type='text'  class='form-control' aria-describedby='emailHelp'  name='relacionamento' value=' $user_data[relacionamento]' id='relacionamento'/>"
          ?>
        </div>

          <div class="form-group espace">
            <label for="exampleInputEmail1">financeiro</label>
            <?php
            //echo "<input type='text' class='form-control' aria-describedby='emailHelp' name=1meta1  value=' $user_data[financeiro]' id='financeiro' name='financeiro'>"
            ?>
          </div>
          
          <div class="form-group espace">
            <label for="exampleFormControlTextarea1">espiritualmente</label>
            <?php
               // echo"<input type='text' class='form-control' rows='3' name='desc_meta' value=' $user_data[espiritual]' id='espiritual' name='espiritual'>"
            ?>
          </div>
          
          <div class="form-group espace">
            <label for="exampleInputPassword1">Demais objetivos</label>
            <?php
              // echo" <input type='text' class='form-control' name='data_inicio' value=' $user_data[outro]' id='outro' name='outro'>"
            ?>
          </div>
        </div>
        </form>-->

      <!-- formulário antigo -->

          <?php echo  "esses foram os dados preenchidos em seu formulário."?>
        <?php
            //echo"<form action='show_sistema_forms.php?cod=$user_data[cod]' method='post'>";
            echo"<form action='testando.php' method='post'>";
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
          
          <!-- novo formulário -->
          <div class="form-group espace">
            <label for="exampleInputEmail1">Saude</label>
            <?php
             echo "<input type='text' class='form-control' aria-describedby='emailHelp' value=' $user_data[saude]'
              name='saude' id='saude'>";
              ?>
          </div>
          <div class="form-group espace">
            <label for="exampleInputEmail1">Relacionamento</label>
            <?php
             echo "<input type='text' class='form-control' aria-describedby='emailHelp' value=' $user_data[relacionamento]'
              name='relacionamento' id='relacionamento'>";
              ?>
          </div>
          <div class="form-group espace">
            <label for="exampleInputEmail1">Financeiro</label>
            <?php
             echo "<input type='text' class='form-control' aria-describedby='emailHelp' value=' $user_data[financeiro]'
              name='financeiro' id='financeiro'>";
              ?>
          </div>
          <div class="form-group espace">
            <label for="exampleInputEmail1">Espiritual</label>
            <?php
             echo "<input type='text' class='form-control' aria-describedby='emailHelp' value=' $user_data[espiritual]'
              name='espiritual' id='espiritual'>";
              ?>
          </div>
          <div class="form-group espace">
            <label for="exampleInputEmail1">Outro</label>
            <?php
             echo "<input type='text' class='form-control' aria-describedby='emailHelp' value=' $user_data[outro]'
              name='outro' id='outro'>";
              ?>
          </div>
          <!-- fim do novo formulário -->

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
            <label for="exampleFormControlTextarea1">Definição da meta</label>
            <?php
                echo"<input type='text' class='form-control' rows='3' name='desc_meta' value=' $user_data[desc_meta]' id='desc_meta'>"
            ?>
          </div>
          
          <div class="form-group espace">
            <label for="exampleInputPassword1">Data de inicio</label>
            <?php
               echo" <input type='text' class='form-control' name='data_inicio' value=' $user_data[data_inicio]' id='data_inicio'>"
            ?>
            <label for="exampleInputPassword1">Data de conclusão</label>
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
      </div>
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

    /*formulario 15 anos*/
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
    </script>
</body>
</html>