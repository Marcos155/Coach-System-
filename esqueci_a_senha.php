<?php
    include('config.php');
    if(isset($_POST['submit']))
    {
      
 
      $email = $mysqli->escape_string($_POST['email']);
        
        if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
          $erro[]="E-mail inválido";
        }

        $sql_code="SELECT senha, cod FROM cadastro WHERE email='$email'";
        $sql_query=$mysqli->query($sql_code) or die($mysqli->error);
        $dado=$sql_query->fetch_assoc();
        $total=$sql_query->num_rows;

        if($total==0)
          $erro[]="Ops! E-mail informado não existe!";
        

        if(count($erro)==0 && $total > 0){
          $novasenha= substr(md5(time()),0,6);
          $nscriptografada = md5(md5($novasenha));
        
      if(mail($email,"Sua nova senha","Olá, essa é sua nova senha:".$novasenha)){
        $sql_code="UPDATE cadastro SET senha = '$nscriptografada' WHERE email = '$email' ";
        $sql_query = $mysqli->query($sql_code) or die ($mysqli->error);
      }
    
            

      }
    }
    

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="shortcut icon" href="assets/images/favico.png" type="image/x-icon">
  <title>Recuperar senha</title>
  <!-- <link rel="stylesheet" href="assets/css/style.css"> -->
  <link rel="stylesheet" href="assets/css/style-login.css">
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css'>
  <style>
    #enviar{
      background-color:rgba(255,0,0,1);
      text-transform: uppercase;
      color: #fff;
      font-size:0.9em;
      padding-bottom: 0.5em;
      padding-top:0.5em;
      padding-left:0.5em;
      padding-right:0.5em;
      cursor:pointer;
      border-radius: 10rem;
      
      border-color:#000;
    }
    input[type=submit]{
      border:1px solid #000;
      width:10rem;
    }
    .termos{
      font-weight: bold
    }
    img{
      
      margin: 5px 5px 5px 5px;
      
    }
  </style>
</head>
<body>
   
<div class="container" id="container">
  <div class="form-container sign-in-container">
    

      <form action="" method="post" >
        <h1>Recuperar senha</h1>
        <br>
        <input type="email" placeholder="Email" name="email" class="form-control" required/>
        <br>
        <div>
          <input type="submit" value="solicitar senha" name="submit" id="enviar">
        </div>
      </form>
    
    
    </div>
    <div class="overlay-container">
      <div class="overlay">
        <div class="overlay-panel overlay-right">
          <h1>Fala campeão(a)</h1>
          <p>Coloque o email cadastrado e receba um link para trocar sua senha </p>
        </div>
      </div>
    </div>
  </div>
</body>
</html>

