<?php
  if(isset($_POST['submit']))
  {
    
    include_once('config.php');

    $nome= $_POST['username'];
    $email= $_POST['email'];
    $senha= $_POST['password'];
    $tele= $_POST['phone'];
    $sexo= $_POST['sexo'];

    $result= mysqli_query($conexao_regis, "INSERT INTO cadastro(nome,email,senha,telefone,sexo) 
    VALUES ('$nome','$email','$senha','$tele','$sexo')");

    header('Location:login.php');

  }
 ?> 
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>register</title>
  <link rel="stylesheet" href="style_coach.css">
  <style>
    .escolha{
      color: #fff;
    }
    #img_senha{
        position: absolute;
        top: 0;
        right: 20px;
        transform: translate(-50%);
        background: url('./img/fecha.png');
        background-size: cover;
        width: 25px;
        height: 25px;
        cursor: pointer;
    }
    #img_senha.hide{
        background: url('./img/abre.png');
        background-size: cover;
    }
  </style>
</head>
<body>
<!-- partial:index.partial.html -->
<div class="login-box">
  <h2>Cadastro</h2>
  <form action="register.php" method="post">
    <div class="user-box">
      <input type="text" name="username" required>
      <label>Nome</label>
    </div>
    <div class="user-box">
      <input type="text" name="email" required>
      <label>Email</label>
    </div>
    
    <div class="user-box">
      <input type="text" name="phone" required>
      <label>Telefone</label>
    </div>
    
    <div class="user-box">
      <label>Sexo</label>
    </div>
    <br>
    <br>
    <input type="radio" id="feminino" name="sexo" value="feminino" required>
    <label class="escolha">Feminino</label>
    
    <input type="radio" id="masculino" name="sexo" value="masculino" required>
    <label class="escolha">Masculino</label>
  
    <input type="radio" id="outro" name="sexo" value="outro" required>
    <label class="escolha">Outro</label>
    <br>
    <br>
    
    <div class="user-box">
      <input type="password" name="password"  id="senha" required>
      <label>Senha</label>
      <div onclick="mostrarsenha()" id="img_senha"></div>
    </div>	
    
    <a class="botao">
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      <input type="submit" value="continuar" name="submit" id="enviar">
    </a>
  </form>
</div>
<!-- partial -->
  <script>
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