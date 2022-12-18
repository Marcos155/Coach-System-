<?php
  if(isset($_POST['submit']))
  {
    
    include_once('config.php');

    $email= $_POST['email'];
    $senha= $_POST['password'];
  }
 ?> 
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <link rel="shortcut icon" href="assets/images/favico.png" type="image/x-icon">
  <title>login</title>
  <!--
  <link rel="stylesheet" href="assets/css/style.css">
-->
  <style>
    #img_senha{
        position: absolute;
        top: 0;
        right: 20px;
        transform: translate(-50%);
        background: url('./assets/images/fecha.png');
        background-size: cover;
        width: 25px;
        height: 25px;
        cursor: pointer;
    }
    #img_senha.hide{
        background: url('./assets/images/abre.png');
        background-size: cover;
}
  </style>
</head>
<body>
<!-- partial:index.partial.html -->
    <div class="login-box">
    <h2>Login</h2>
    
    <form action="teste.php" method="post">
        <div class="user-box">
            <input type="text" name="email" required>
            <label>Email</label>
        </div>
        
        
        <div class="user-box">
            <input type="password" name="password" id="senha" required>
            <label>Senha</label>
            <div onclick="mostrarsenha()" id="img_senha"></div>
        </div>
        
        
        <div class="remember-password" id="remember" data-link="register.php">Esqueci minha senha
        </div>
        <div class="register" id="register" data-link="register.php">Cadastrar
        </div><br><br>
        <a class="botao">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <input type="submit" value="conectar" name="submit" id="enviar"> 
        </a>
    </form>
    
</div>
<!-- partial -->
    <script> 
    document.getElementById('remember').addEventListener('click', function () {
    var href = this.dataset.link;
    window.location = href;
    });
    document.getElementById('register').addEventListener('click', function () {
    var href = this.dataset.link;
    window.location = href;
    });
    function mostrarsenha(){
        var tipo = document.getElementById("senha");
        if (tipo.type == "password"){
            tipo.type = "text";
            img_senha.classList.add('hide')
        }
        else{
            tipo.type = "password";
            img_senha.classList.remove('hide')
        }
    }
    </script>
</body>
</html>