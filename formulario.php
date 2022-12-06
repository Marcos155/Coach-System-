<?php
  session_start();
  include_once('config.php');

  if((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true))
      {
          unset($_SESSION['email']);
          unset($_SESSION['senha']);
          header('Location:login.php');
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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forms</title>
    <link rel="stylesheet" href="style_coach.css">
    <style>
      p{
        position: relative;
        top:0;
        left: 0;
        font-size: 16px;
        color: #fff;
        pointer-events: none;
        transition: .5s;
      }
    </style>
</head>

<body>
  <div class="login-box">
    <h2>Formulário</h2>
  
    <div class="d-flex">
        <a href="sair.php">sair</a>
    </div>
    <br>
    <form action="formulario.php" method="post">
    <div class="user-box">
        <input type="text" name="meta" required>
        <label>Meta </label>
      </div>
    
      <div class="user-box">
        <p>Data de Conclusão</p>
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