<?php
  session_start();
      // print_r($_SESSION);
  if((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true))
      {
          unset($_SESSION['email']);
          unset($_SESSION['senha']);
          header('Location:login.php');
      }
      $logado = $_SESSION['email'];
  if(isset($_POST['submit']))
  {
    // print_r('nome:' . $_POST['username']);
    // print_r('<br>');
    // print_r('meta:' . $_POST['meta']);
    // print_r('<br>');
    // print_r('data:' . $_POST['data']);
    // print_r('<br>');
    // print_r('status:' . $_POST['status']);
    
    include_once('config.php');

    $nome= $_POST['username'];
    $meta= $_POST['meta'];
    $data= $_POST['data'];
    $status= $_POST['status'];

    $result= mysqli_query($conexao_forms, "INSERT INTO formulario(nome,meta,data_conclusao,status_meta) 
    VALUES ('$nome','$meta','$data','$status')");

  }
 ?> 

<!DOCTYPE html>
<html lang="en" >
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forms</title>
    <link rel="stylesheet" href="style_coach.css">
</head>

<body>
  <div class="login-box">
    <h2>Formulário</h2>
  
    <div class="d-flex">
        <a href="sair.php">sair</a>
    </div>

    <form action="formulario.php" method="post">
      <div class="user-box">
        <input type="text" name="username" required>
        <label>Nome </label>
      </div>
      <div class="user-box">
        <input type="text" name="meta" required>
        <label>Meta </label>
      </div>
    
      <div class="user-box">
        <input type="date" name="data" required>
      </div>
    
      <div class="user-box">
        <input type="text" name="status" required>
        <label>Status </label>
      </div>

      <a class="botao">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <input type="submit" value="enviar" name="submit" id="enviar">
      </a>
  
    </form>
  </div>
</body>
</html>