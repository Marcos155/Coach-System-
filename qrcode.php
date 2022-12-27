<?php
session_start();
include_once('config.php');

if ((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true)) {
  unset($_SESSION['email']);
  unset($_SESSION['senha']);
  header('Location:entrar.php');
}
$logado = $_SESSION['email'];
?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Gerar Qr code</title>
  <link rel="stylesheet" href="./style.css">
  <link rel="shortcut icon" href="assets/images/favico.png" type="image/x-icon">
</head>
<body>
<!-- partial:index.partial.html -->
<html>
  <head>
  <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1">
  <title>Gerar QR Code</title>
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
      background-color: rgb(25, 25, 25);
    }
    .table-wrapper {
    max-height: 500px;
    overflow-y: auto;
}
  </style>
  <link rel="stylesheet" href="./assets/css/qrcode.css">
  </head>
  <body>
    <div class="mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header administration">
      <header class="mdl-layout__header">
        <div class="mdl-layout__header-row">
          <div class="current-user">
            <i class="material-icons">account_circle</i>
            <?php echo "olá, André" ?>
          </div>
          <div class="mdl-layout-spacer"></div>

      </header>
      <div class="mdl-layout__drawer">
        <span class="mdl-layout-title">Administração</span>
        <nav class="mdl-navigation">
          <a class="mdl-navigation__link" href="sistema.php">Conta-Alunos</a>
          <br>
          <a class="mdl-navigation__link" href="sistema_coach_forms.php">Formulário-Alunos</a>
          <br>
          <a class="mdl-navigation__link" href="coach_show_sistema_forms.php">Meta-Alunos</a>
          <br>
          <a class="mdl-navigation__link active" href="qrcode.php">Gerar QR Code</a>
          <br>
          <a class="mdl-navigation__link" href="sair.php">Sair</a>
        </nav>
      </div>
      <main class="mdl-layout__content">
        <div class="page-content">
          <h2><b>André</b></h2>
          <p>Aqui você pode gerar um <b>Qr code</b> que levará para a <b>página de registro</b>. Distribua esse código aos seus clientes.</p>
        </div>
        <br>
        
     <div class="container">
        <header>
            <h1>Gerar QR Code</h1>
            <p> código para página de registro</p>
        </header>
        <main class="form">
          <input type="text">
          <button onclick="GerarQRCode()">Gerar</button>
        </main>
        <footer class="qr-code">
          <img id="QRCodeImage" class="img" >
        </footer>
      </div>
        </div>
      </main>
      
    
  </div>
    <script src="qrcode.js"></script>
  </body>
</html>
<!-- partial -->
  
</body>
</html>