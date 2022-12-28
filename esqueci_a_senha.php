<?php
    if(isset($_POST['submit']))
    {
      
      include_once('config.php');
  
      $email= $_POST['email'];
      
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
      <form action="mailto: eradesvilarinho@gmail.com" method="post" enctype="text/plain">
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

